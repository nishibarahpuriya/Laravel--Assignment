
    <?php $__env->startSection('title'); ?>
        <?php echo e('View Story'); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header"><?php echo e($storyDetail->title); ?></div>
                    <div class="card-body">
  
                        <h6 class="text-2xl"> Published Date: <?php if($storyDetail->publish_date!= ''): ?><?php echo e(date('d-m-Y', strtotime($storyDetail->publish_date))); ?> <?php endif; ?> </h6>
                        <div class="prose lg:prose-xl"><?php echo $storyDetail->content; ?></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
                        
                    </div>
                </div>
          </div>
      </div>
  </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\resources\views/stories/view_stories.blade.php ENDPATH**/ ?>