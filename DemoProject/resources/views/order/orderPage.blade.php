@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Order Managment
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Order Managment</a></li>
        </ol>
      </section>
      <br>

<br><br>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Order Details Table</h3>
        <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Shipping Method</th>
            <th>Payment Details</th>
          </tr>
          @foreach($orderDetails as $order)
          <tr>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->name }}</td>
            <td>
              @foreach($order->userOrders as $product)
                {{ $product->product_name }}<br>
              @endforeach
            </td>
            <td>{{ $order->payment_method }}</td>
            <td></td>
          </tr>
          @endforeach
        </table>
      </div>
</div>   
 </div>
</div>
    {{ $orderDetails->links() }}
@endsection



