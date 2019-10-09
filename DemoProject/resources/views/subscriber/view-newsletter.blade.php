@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          NewsLetter Subscriber
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">NewsLetter Subscriber</a></li>
          <li class="active">New NewsLetter Subscriber</li>
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
<br>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">NewsLetter Subscriber Table</h3>

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
      <th>User ID</th>
      <th>Email</th>
      <th>Status</th>
      <th>Created On</th>
      <th width="100px">Actions</th>
    </tr>

    @foreach($newsletter as $newsletters)
    <tr>
        <td>{{ $newsletters->id }}</td>
        <td>{{ $newsletters->email }}</td>
        <td>
          @if($newsletters->status==1)
          <a href="{{ url('update-newsletter-status/'.$newsletters->id.'/0') }}"><span style="color: green;">Active</span></a>
          @else
          <a href="{{ url('update-newsletter-status/'.$newsletters->id.'/1') }}"><span style="color: red;">Inactive</span></a>
          @endif
          </td>
          <td>{{ $newsletters->created_at }}</td>
          <td>
            <a href="{{ url('delete-newsletter-email/'.$newsletters->id.'') }}">Delete</a>
          </td>
    </tr>
   @endforeach
  </table>
  </div>
</div>
          
        </div>
      </div>


    @endsection

