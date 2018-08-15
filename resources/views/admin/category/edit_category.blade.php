@extends('layout.admin_layout')

@section('admin.dashboard')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a>
			<i class="icon-angle-right"></i> 
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="#">Update Category</a>
		</li>
	</ul>
	
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
			</div>
			@include('layout.message')
			<div class="box-content">
				<form class="form-horizontal" action="{{ url('/update_category',$data->category_id) }}" method="post">
					{{ csrf_field() }}
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Category Name </label>
					  <div class="controls">
						<input type="text" class="input-xlarge"  name="category_name" value="{{ $data->category_name }}">
					  </div>
					</div>        
					<div class="control-group">
					  <label class="control-label" for="textarea2">Category Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="category_description" id="textarea2" rows="3">{{ $data->category_description }}</textarea>
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Save</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->

@endsection