@extends('admin.admin')

@section('content')
<section class="content-header">
  <h1>
    CMS Managment
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">CMS Managment</a></li>
    <li class="active">New CMS</li>
  </ol>
</section>
<br>

	<form action="{{ route('cms.store') }}" method="POST" id="cmsForm" class="msg">
	
		{{ csrf_field() }}

		<div class="alert alert-success print-success-msg" style="display:none">
    		<ul></ul>
		</div>
		<div class="alert alert-danger print-error-msg" style="display:none">
    		<ul></ul>
		</div>


    <div class="col-sm-6">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" placeholder="Enter Title" name="title" required="">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" placeholder="Enter Content" name="content" required="">
        </div>

        <div class="form-group">
            <label for="metatitle">Meta Title</label>
            <input type="text" class="form-control" placeholder="Enter Meta Title" name="metatitle" required="">
        </div>

        <div class="form-group">
            <label for="metades">Meta Description</label>
            <textarea type="textarea" class="form-control" placeholder="Enter Meta Description" name="metades" required=""></textarea>
        </div>

        <div class="form-group">
            <label for="metakey">Meta Keywords</label>
            <input type="text" class="form-control" placeholder="Enter Keywords" name="metakey" required="">
        </div>
        <div class="modal-footer">
            <a class="btn btn-success" href="{{ route('cms.index') }}">Back</a>
            <button type="submit" class="btn btn-primary">Add</button>
        </div> 
    </div>   
	</form>	

@endsection