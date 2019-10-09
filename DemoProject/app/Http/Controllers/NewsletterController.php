<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsLetter;

class NewsletterController extends Controller
{
    public function viewNewsLetter()
    {
    	$newsletter = NewsLetter::get();
    	return view('subscriber.view-newsletter')->with(compact('newsletter'));
    }

    public function updateNewsLetter($id, $status)
    {
    	NewsLetter::where('id',$id)->update(['status'=>$status]);
    	return redirect()->back()->with('flash_message_success','Newsletter status has been updated.');
    }

    public function deleteNewsLetter($id)
    {
    	NewsLetter::where('id',$id)->delete();
    	return redirect()->back()->with('flash_message_success','Newsletter Email has been deleted.');
    }
}
