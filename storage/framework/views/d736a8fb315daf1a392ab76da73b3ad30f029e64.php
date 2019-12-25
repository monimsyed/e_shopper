<?php $__env->startSection('content'); ?>
  <section id="cart_items">
    <div class="container">
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Check out</li>
        </ol>
      </div><!--/breadcrums-->
      <div class="register-req">
        <p>Please fill up the form for checkout !!</p>
      </div><!--/register-req-->

      <div class="shopper-informations">
        <div class="row">
          <div class="col-sm-12 clearfix">
            <div class="bill-to">
              <p>Shipping Details</p>
              <div class="form-one">
                <form action="<?php echo e(url('/save-shipping-details')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <input type="email" name="shipping_email" placeholder="Email" required>
                  <input type="text" name="shipping_first_name" placeholder="First Name" required>
                  <input type="text" name="shipping_last_name" placeholder="Last Name" required>
                  <input type="text" name="shipping_address" placeholder="Address" required>
                  <input type="text" name="shipping_mobile_number" placeholder="Mobile" required>
                  <input type="text" name="shipping_city" placeholder="City" required>
                  <button type="submit" class="btn btn-default">Done</button>
                </form>
              </div>
              <div class="form-two review-payment">
                <h2>Review & Payment</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="review-payment">
        <h2>Review & Payment</h2>
      </div>

    </div>
  </section> <!--/#cart_items-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/elaravel/resources/views/pages/checkout.blade.php ENDPATH**/ ?>