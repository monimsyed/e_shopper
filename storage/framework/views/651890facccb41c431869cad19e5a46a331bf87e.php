<?php $__env->startSection('admin_content'); ?>
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li>
    <i class="icon-edit"></i>
    <a href="#">Forms</a>
  </li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <p class="alert-success">
        <?php
        if(Session::get('message'))
        {
          echo Session::get('message');
          Session::put('message', null);
        }
        ?>
      </p>
      <form class="form-horizontal" action="<?php echo e(url('/save-product')); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <fieldset>
        <div class="control-group">
          <label class="control-label" for="date01">Product name</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_name" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="selectError3">Select Category</label>
          <div class="controls">
            <select id="selectError3" name="category_id">
              <?php

              $all_category = DB::table('tbl_category')
              ->get();

              foreach($all_category as $all_category){?>
              <option value="<?php echo e($all_category->category_id); ?>"><?php echo e($all_category->category_name); ?></option>
              <?php }

              ?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="selectError3">Select Manufacture</label>
          <div class="controls">
            <select id="selectError3" name="manufacture_id">
              <?php

              $all_manufacture = DB::table('tbl_manufacture')
              ->get();

              foreach($all_manufacture as $all_manufacture){?>
              <option value="<?php echo e($all_manufacture->manufacture_id); ?>"><?php echo e($all_manufacture->manufacture_name); ?></option>
              <?php }

              ?>
            </select>
          </div>
        </div>
        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Product short description</label>
          <div class="controls">
          <textarea class="cleditor" name="product_short_description" rows="3" required></textarea>
          </div>
        </div>
        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Product long description</label>
          <div class="controls">
          <textarea class="cleditor" name="product_long_description" rows="3" required></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="date01">Product price</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_price" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="fileInput">Product image</label>
          <div class="controls">
            <input class="input-file uniform_on" type="file" name="product_image" id="fileInput">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="date01">Product size</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_size" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="date01">Product color</label>
          <div class="controls">
          <input type="text" class="input-xlarge" name="product_color" required>
          </div>
        </div>
        <div class="control-group hidden-phone">
          <label class="control-label" for="textarea2">Publication status</label>
          <div class="controls">
          <input type="checkbox" name="publication_status" value="1">
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-primary">Add product</button>
          <button type="reset" class="btn">Cancel</button>
        </div>
        </fieldset>
      </form>

    </div>
  </div><!--/span-->

</div><!--/row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/elaravel/resources/views/admin/add_product.blade.php ENDPATH**/ ?>