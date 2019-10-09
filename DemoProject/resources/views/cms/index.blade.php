@extends('admin.admin')

@section('content')
<section class="content-header">
        <h1>
          Cms Managment
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Cms Managment</a></li>
          <li class="active">New Cms</li>
        </ol>
      </section>
      <br>

<a class="btn btn-success" href="{{ route('cms.create')}}" style="margin-left: 20px;">Add New</a>

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
        <h3 class="box-title">Products Table</h3>
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
            <th>Title</th>
            <th>Content</th>
            <th>Meta Title</th>
            <th>Meta Description</th>
            <th>Meta Keywords</th>
            <th>Actions</th>
          </tr>
    @foreach ($cmsPages as $page)
      <tr id="tr_{{$page->id}}">
        <td>{{ $page->title }}</td>
        <td>{{ $page->content }}</td>
        <td>{{ $page->meta_title }}</td>
        <td>{{ $page->meta_description }}</td>
        <td>{{ $page->meta_keywords }}</td>
        <td>
          <a class="btn btn-xs btn-primary" href="{{ route('cms.edit',$page->id) }}">Edit</a>

          {!! Form::open(['method' => 'DELETE','route' => ['cms.destroy', $page->id],'id' => 'FormDeleteTime','style'=>'display:inline']) !!}

          {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}

          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
</table>
  </div>
</div>   
 </div>
</div>
      
@endsection



