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
			<a href="#">Add Product</a>
		</li>
	</ul>
	
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
			</div>
			@include('layout.message')
			<div class="box-content">
				<form class="form-horizontal" action="{{ url('/save-product') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
				  <fieldset>
					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Name </label>
					  <div class="controls">
						<input type="text" class="input-xlarge"  name="product_name">
					  </div>
					</div> 
					  <div class="control-group">
						<label class="control-label" for="selectError3">Product Category</label>
						<div class="controls">
						  <select id="selectError3" name="category_id">
							<option>Selet Category </option>
						@foreach($categories as $category)
							<option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
						@endforeach
						  </select>
						</div>
					  </div>
					    <div class="control-group">
					  	<label class="control-label" for="selectError3">Manufacture Name</label>
					  	<div class="controls">
					  	  <select id="selectError3" name="manufacture_id">
					  	@foreach($manufactures as $manufacture)
					  		<option value="{{ $manufacture->manufacture_id }}">{{ $manufacture->manufacture_name }}</option>
					  	@endforeach	
					  	  </select>
					  	</div>
					    </div>       
					<div class="control-group">
					  <label class="control-label" for="textarea2">Product Short Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="product_short_description" id="textarea2" rows="3"></textarea>
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="textarea2">Product Long Description</label>
					  <div class="controls">
						<textarea class="cleditor" name="product_long_description" id="textarea2" rows="3"></textarea>
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Price </label>
					  <div class="controls">
						<input type="text" class="input-xlarge"  name="product_price">
					  </div>
					</div> 

					<div class="control-group">
					  <label class="control-label" for="fileInput">Image</label>
					  <div class="controls">
						<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
					  </div>
					</div>

					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Size </label>
					  <div class="controls">
						<input type="text" class="input-xlarge"  name="product_size">
					  </div>
					</div> 

					<div class="control-group">
					  <label class="control-label" for="typeahead">Product Color </label>
					  <div class="controls">
						<input type="text" class="input-xlarge"  name="product_color">
					  </div>
					</div> 
					<div class="control-group">
					  <label class="control-label" for="typeahead">Publication Status </label>
					  <div class="controls">
						<input type="checkbox" class="input-xlarge"  name="publication_status" value="1">
					  </div>
					</div>
					<div class="form-actions">
					  <button type="submit" class="btn btn-primary">Add Product</button>
					  <button type="reset" class="btn">Cancel</button>
					</div>
				  </fieldset>
				</form>   

			</div>
		</div><!--/span-->

	</div><!--/row-->

@endsection