@extends('layout.admin_layout')

@section('admin.dashboard')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Tables</a></li>
	</ul>

	@include('layout.message')
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Slider List</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>SL</th>
						  <th>Product Image</th>
						  <th>Status</th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	<?php $i = 1;?>
					@foreach($sliders as $slider)
					<tr>
						<td>{{ $i++ }}</td>
						<td class="center"><img src="{{ URL::to($slider->slider_image) }}" style="height: 60px;width: 160px;"></td>
						<td class="center">
							@if($slider->publication_status == 1)
							<span class="label label-success">Active</span>
							@else
							<span class="label label-danger">Inactive</span>
							@endif
						</td>
						<td class="center">
							@if($slider->publication_status == 1)
							<a class="btn btn-danger" href="{{ URL::to('/inactive_slider/'.$slider->slider_id) }}">
								<i class="halflings-icon white thumbs-down "></i>                                            
							</a>
							@else
							<a class="btn btn-success" href="{{ URL::to('/active_slider/'.$slider->slider_id) }}">
								<i class="halflings-icon white thumbs-up"/>                                        
							</a>
							@endif
							<a class="btn btn-danger" id="category_delete" href="{{ URL::to('/delete_slider/'.$slider->product_id) }}">
								<i class="halflings-icon white trash"></i> 
								
							</a>
						</td>
					</tr>
					@endforeach
				  </tbody>
			  </table>            
			</div>
		</div><!--/span-->
	
	</div><!--/row-->
	
@endsection