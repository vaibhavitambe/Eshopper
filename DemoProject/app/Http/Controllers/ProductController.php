<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Product;
use App\Banner;
use App\ProductImage;
use App\Attribute;
use App\Attributevalue;
use App\ProductAssoc;
use App\Category;
use App\ProductCategory;
use File;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::with('childs')->get();
        $products = Product::latest()->paginate(2);
        return view('products.index', compact('products','pro'))->with('i',(request()->input('page',1) -1) *5);
    }

    public function myformAjax($id)
    {
        $values = Attributevalue::where("product_attribute_id",$id)->pluck("attribute_value","id");
        return json_encode($values);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::pluck("name","id");
        $attrn = Attribute::all()->sortBy('name')->all();
        $attvalue = Attributevalue::all()->sortBy('attribute_value')->all();
        return view('products.create', compact('attrn','attvalue','attributes','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $product= new Product();

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->short_description = $request->shortdes;
        $product->long_description = $request->longdes;
        $product->price = $request->price;
        $product->special_price = $request->specialprice;
        $product->special_price_from = $request->specialpricefrom;
        $product->special_price_to = $request->specialpriceto;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->meta_title = $request->metatitle;
        $product->meta_description = $request->metades;
        $product->meta_keywords = $request->metakey;
        $product->is_featured = $request->statusfeat;
        $product->category_id = $request->categ;
        $product->save();

        if( $request->hasFile('image')) 
        {
          $files =  $request->file('image');

            foreach ($files as $image) 
            {
                $imagesobj= new ProductImage();
               
                $filename = $image->getClientOriginalName();
            
                $image->move(public_path().'/uploads/', $filename);

                $imagesobj->image_name=$filename;
                $imagesobj->product_id = $product->id;
                $imagesobj->status = $request->status;
                $imagesobj->save();
            }
        }

        $attrinput =  $request->product_attribute;
        $attrin = $request->product_attribute_value;
        foreach ($attrinput as $key => $item )
        {
            $attr = new ProductAssoc();
            $attr->product_id = $product->id;
            $attr->product_attribute_id = $attrinput[$key];
            $attr->product_attribute_value_id = $attrin[$key];
        
            $attr->save();
        }
            $categr = new ProductCategory();
            $categr->product_id = $product->id;
            $categr->category_id = $request->categ;

            $categr->save();
       
        

       return redirect()->route('products.index')->with('success','Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pro = Product::with('childs')->get();
        $proimg = Product::with('childs')->find($id);
        $categories = Category::all();
        
        $products = Product::all();
        $product = Product::find($id);
        $categ = ProductCategory::find($id);
        $img = ProductImage::find($id);

        $attributes = Attribute::pluck("name","id");
        $attrn = Attribute::all()->sortBy('name')->all();
        $attvalue = Attributevalue::all()->sortBy('attribute_value')->all();
        
        return view('products.edit',compact('product','img','pro','products','attributes','attrn','attvalue','categories','categ','proimg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proimg = Product::with('childs')->find($id);

        if( $request->hasFile('image')) 
        {
            $userimage = $proimg->image_name;
            echo "<pre>";
            print_r($userimage); exit(); "</pre>";
            if (File::exists($userimage)) 
            { 
                 unlink($userimage);
            }

            $image = Input::file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/', $filename);
            $proimg->image_name=$filename;
            $proimg->product_id = $product->id;
            $proimg->status = $request->status;
                

        }
        // $proimg->save();

        // Product::find($id)->update($request->all());
        // return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
