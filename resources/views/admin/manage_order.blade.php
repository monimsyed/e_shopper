@extends('admin.admin_layout')

@section('admin_content')

<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Tables</a></li>
</ul>
<p class="alert-success">
  <?php
  if(Session::get('message'))
  {
    echo Session::get('message');
    Session::put('message', null);
  }
  ?>
</p>
<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>All Categories</h2>
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
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Order total</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($all_order_info as $all_order_info)
        <tbody>
        <tr>
          <td>{{ $all_order_info->order_id }}</td>
          <td class="center">{{ $all_order_info->customer_name }}</td>
          <td class="center">{{ $all_order_info->order_total }}</td>
          <td class="center">
            @if($all_order_info->order_status!='pending')
            <span class="label label-success">Processed</span>
            @else
            <span class="label label-danger">Pending</span>
            @endif
          </td>
          <td class="center">
            @if($all_order_info->order_status!='pending')
            <a class="btn btn-danger" href="{{URL::to('/unactive-order/'.$all_order_info->order_id)}}">
              <i class="halflings-icon white thumbs-down"></i>
            </a>
            @else
            <a class="btn btn-success" href="{{URL::to('/active-order/'.$all_order_info->order_id)}}">
              <i class="halflings-icon white thumbs-up"></i>
            </a>
            @endif
            <a class="btn btn-info" href="{{URL::to('/view-order/'.$all_order_info->order_id)}}">
              <i class="halflings-icon white edit"></i>
            </a>
            <a class="btn btn-danger" href="{{URL::to('/delete-order/'.$all_order_info->order_id)}}"
              id="delete">
              <i class="halflings-icon white trash"></i>
            </a>
          </td>
        </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
