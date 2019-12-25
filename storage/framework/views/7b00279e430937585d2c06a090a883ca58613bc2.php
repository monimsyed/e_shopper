<?php $__env->startSection('content'); ?>
  <section id="form"><!--form-->
    <div class="container">
      <h2 class="alert-info">
        <?php
        if(Session::get('login-check'))
        {
          echo Session::get('login-check');
          Session::put('login-check', null);
        }
        ?>
      </h2>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form"><!--login form-->
            <h2>Login to your account</h2>
            <h4 class="alert-danger">
              <?php
              if(Session::get('login-msg'))
              {
                echo Session::get('login-msg');
                Session::put('login-msg', null);
              }
              ?>
            </h4>
            <form action="<?php echo e(url('/customer-login')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <input type="email" placeholder="Email" name="customer_email" required />
              <input type="password" placeholder="Password" name="customer_password" />
              <span>
                <input type="checkbox" class="checkbox">
                Keep me signed in
              </span>
              <button type="submit" class="btn btn-default">Login</button>
            </form>
          </div><!--/login form-->
        </div>
        <div class="col-sm-1">
          <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">
          <div class="signup-form"><!--sign up form-->
            <h2>New User Signup!</h2>
            <h4 class="alert-danger">
              <?php
              if(Session::get('reg-msg'))
              {
                echo Session::get('reg-msg');
                Session::put('reg-msg', null);
              }
              ?>
            </h4>
            <form action="<?php echo e(url('/customer_registration')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

              <input type="text" placeholder="Full Name" name="customer_name" required />
              <input type="email" placeholder="Email Address" name="customer_email" required />
              <input type="password" placeholder="Password" name="customer_password" required />
              <input type="text" placeholder="Mobile number" name="customer_mobile" required />
              <button type="submit" class="btn btn-default">Signup</button>
            </form>
          </div><!--/sign up form-->
        </div>
      </div>
    </section><!--/form-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/elaravel/resources/views/pages/login.blade.php ENDPATH**/ ?>