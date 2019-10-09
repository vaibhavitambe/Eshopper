@extends('admin.admin')

@section('content')

<section class="content-header">
  <h1>
    Edit Order
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Order Managment</a></li>
    <li class="active">Edit Order</li>
  </ol>
</section>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoo0ps!!!</strong> There were some problems with your input.<br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{!! Form::model($order, ['method' => 'PATCH','route' =>['order.update', $order ->id]]) !!}
<div class="box-body">
  <div class="col-sm-6">
    <div class="form-group">
      <label>Order Status</label><br>
      <select name="status" class="form-control">
          <option value="{{$order->order_status}}" disabled selected>{{$order->order_status}}</option>
          <option value="Pending">Pending</option>
          <option value="Dispatched">Dispatched</option>
          <option value="Processed">Processed</option>
          <option value="Shipped">Shipped</option>
          <option value="Delivered">Delivered</option>
      </select> 
    </div>
  </div>    
</div> 
<div class="form-group">
  <a class="btn btn-success" href="{{ route('order.index') }}">Back</a>
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</div>
{!! Form::close() !!}
@endsection