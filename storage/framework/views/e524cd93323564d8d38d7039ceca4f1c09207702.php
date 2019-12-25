<?php $__env->startSection('admin_content'); ?>

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
      <h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2>
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
            <th>Slider ID</th>
            <th>Slider Image</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php $__currentLoopData = $all_slider_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_slider_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tbody>
        <tr>
          <td><?php echo e($all_slider_info->slider_id); ?></td>

          <td class="center"><img src="<?php echo e(URL::to($all_slider_info->slider_image)); ?>" style="height: 80px; width: 80px;" alt=""></td>
          <td class="center">
            <?php if($all_slider_info->publication_status==1): ?>
            <span class="label label-success">Active</span>
            <?php else: ?>
            <span class="label label-danger">Inactive</span>
            <?php endif; ?>
          </td>
          <td class="center">
            <?php if($all_slider_info->publication_status==1): ?>
            <a class="btn btn-danger" href="<?php echo e(URL::to('/unactive-slider/'.$all_slider_info->slider_id)); ?>">
              <i class="halflings-icon white thumbs-down"></i>
            </a>
            <?php else: ?>
            <a class="btn btn-success" href="<?php echo e(URL::to('/active-slider/'.$all_slider_info->slider_id)); ?>">
              <i class="halflings-icon white thumbs-up"></i>
            </a>
            <?php endif; ?>
            <a class="btn btn-danger" href="<?php echo e(URL::to('/delete-slider/'.$all_slider_info->slider_id)); ?>"
              id="delete">
              <i class="halflings-icon white trash"></i>
            </a>
          </td>
        </tr>
        </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/elaravel/resources/views/admin/all_slider.blade.php ENDPATH**/ ?>