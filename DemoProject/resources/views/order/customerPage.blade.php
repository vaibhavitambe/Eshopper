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
        <h3 class="box-title">Customers Table</h3>
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
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Pincode</th>
          </tr>
          @foreach($customerDetails as $custom)
            <tr>
              <td>{{ $custom->user_id }}</td>
              <td>{{ $custom->name }}</td>
              <td>{{ $custom->email }}</td>
              <td>{{ $custom->address }}</td>
              <td>{{ $custom->city }}</td>
              <td>{{ $custom->state }}</td>
              <td>{{ $custom->country }}</td>
              <td>{{ $custom->pincode }}</td>
            </tr>
          @endforeach
        </table>
      </div>
</div>   
 </div>
</div>
    {!! $customerDetails->links() !!} 
@endsection



