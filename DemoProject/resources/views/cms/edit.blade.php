@extends('admin.admin')

@section('content')

<section class="content-header">
  <h1>
    Edit CMS
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">CMS Managment</a></li>
    <li class="active">Edit CMS</li>
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

{!! Form::model($cmsPage, ['method' => 'PATCH','route' =>['cms.update', $cmsPage ->id]]) !!}
<div class="box-body">
  <div class="col-sm-6">
    <div class="form-group">
      <label>Title</label>
      {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      <label>Content</label>
      {!! Form::text('content',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      <label>Meta Title</label>
      {!! Form::text('meta_title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      <label>Meta Description </label>
      {!! Form::text('meta_description',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      <label>Meta Keywords</label>
      {!!Form::text('meta_keywords',null,['class'=>'form-control'])!!}
    </div>
  </div>    
</div> 
<div class="form-group">
  <a class="btn btn-success" href="{{ route('cms.index') }}">Back</a>
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</div>
{!! Form::close() !!}
@endsection