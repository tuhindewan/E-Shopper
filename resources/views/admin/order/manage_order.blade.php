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
				<h2><i class="halflings-icon user"></i><span class="break"></span>Order List</h2>
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
						  <th>Order ID</th>
						  <th>Customer Name</th>
						  <th>Order Total</th>
						  <th>Status</th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	<?php $i = 1;?>
					@foreach($orders as $order)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $order->order_id }}</td>
						<td>{{ $order->user_name }}</td>
						<td class="center">{{ $order->order_total }}</td>
						<td class="center">{{ $order->order_status }}</td>
						<td class="center">
							<a class="btn btn-danger" href="">
								<i class="halflings-icon white thumbs-down "></i>                                            
							</a>
							
							<a class="btn btn-info" href="">
								<i class="halflings-icon white edit"></i>                                            
							</a>
							<a class="btn btn-danger" id="category_delete" href="">
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