<?php $__env->startSection('content'); ?>
  <section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li class="active">Shopping Cart</li>
        </ol>
      </div>
      <div class="table-responsive cart_info">
        <?php
        $contents = Cart::content();
        // echo "<pre>";
        // print_r($contents);
        // echo "</pre>";
        ?>
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Image</td>
              <td class="description">Name</td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="cart_product">
                <a href=""><img height="80px" width="80px" src="<?php echo e($contents->options->image); ?>" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href=""><?php echo e($contents->name); ?></a></h4>
                
              </td>
              <td class="cart_price">
                <p>BDT <?php echo e($contents->price); ?></p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  
                  <form class="" action="<?php echo e(url('/update-cart')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input class="cart_quantity_input" type="text" name="qty" value="<?php echo e($contents->qty); ?>" autocomplete="off" size="2">
                    <input type="hidden" name="rowId" value="<?php echo e($contents->rowId); ?>">
                    <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                  </form>
                  
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price"><?php echo e($contents->total); ?></p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(URL::to('/delete-from-cart/'.$contents->rowId)); ?>"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
        </table>
      </div>
    </div>
  </section> <!--/#cart_items-->

<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>What would you like to do next ? </h3>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="#">Home</a> </li>
        <li class="active">Payment method</li>
      </ol>
    </div>
    <div class="paymentCont">
      <div class="headingWrap">
        <h3 class="headingTop text-center">Select Your Payment Method</h3>
        <p class="text-center">Created with bootstrap button and radio button</p>
      </div>
      
      <form action="<?php echo e(url('/order-place')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input type="radio" name="payment_method" value="handcash"> Hand Cash <br>
        <input type="radio" name="payment_method" value="card"> Debit card <br>
        <input type="radio" name="payment_method" value="bkash"> Bkash <br>
        <input type="submit" name="" value="Done">
      </form>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/elaravel/resources/views/pages/payment.blade.php ENDPATH**/ ?>