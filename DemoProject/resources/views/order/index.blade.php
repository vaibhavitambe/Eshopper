@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Order Listing
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Order Listing</a></li>
        </ol>
      </section>
      <br>

<br><br><br>
  <div class="row">
      @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <p>{!! session('flash_message_success')!!}</p>
        </div>
      @endif

      @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background-color: #f4d2d2">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <p>{!! session('flash_message_error')!!}</p>
        </div>
      @endif  
    </div>


<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Order Listing Table</h3>
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
            <th>Order ID</th>
            <th>User ID</th>
            <th>Payment Method</th>
            <th>Order Status</th>
            <th>Action</th>
          </tr>
          @foreach ($orderDetails as $order)
          <tr id="tr_{{$order->id}}">
            <td>{{ $order->id }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->order_status }}</td>
            <td>
          <a class="btn btn-xs btn-primary" href="{{ route('order.edit',$order->id) }}">Edit</a>
        </td>
      </tr>
    @endforeach
</table>
  </div>
</div>   
 </div>
</div>
    {!! $orderDetails->links() !!}  
@endsection



