



<?php $__env->startSection('title'); ?>
     <?php echo e('Users'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">User List</div>
                    <div class="card-body">
  
                  <div class="container">
  
  <table class="table table-bordered data-table">
      <thead>
          <tr>
              <th>Name</th>
              <th>Email</th>
              <th>UserName</th>
              <th>Last Login</th>
          </tr>
      </thead>
      <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td><?php echo e($user->username); ?></td>
                  <td><?php if($user->last_login!= ''): ?><?php echo e(date('d-m-Y', strtotime($user->last_login))); ?> <?php endif; ?></td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                  <td colspan="3">There are no users.</td>
              </tr>
          <?php endif; ?>
      </tbody>
  </table>
  <?php echo $users->withQueryString()->links('pagination::bootstrap-5'); ?>

</div>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-Assignment\resources\views/users.blade.php ENDPATH**/ ?>