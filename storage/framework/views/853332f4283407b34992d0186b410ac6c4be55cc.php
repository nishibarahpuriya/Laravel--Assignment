



<?php $__env->startSection('title'); ?>
            <?php echo e('Stories'); ?>

        <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>
  <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Stories <a href="<?php echo e(route('create.stories')); ?>"><button class="btn btn-success" style="float: right;">Add Stories</button></a></div>
                        <div class="card-body">
    
                            <div class="container">
        
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>UserName</th>
                                            <th>Publish Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($story->title); ?></td>
                                                <td><?php echo e($story->slug); ?></td>
                                                <td><?php echo e($story->user->username); ?></td>
                                                <td><?php if($story->publish_date!= ''): ?><?php echo e(date('d-m-Y', strtotime($story->publish_date))); ?> <?php endif; ?> </td>
                                                <td>
                                                <a class="btn btn-primary" href="<?php echo e(route('stories.edit',$story->slug)); ?>">Edit</a>
                                                <a class="btn btn-primary" href="<?php echo e(route('stories.delete',$story->id)); ?>">delete</a> 
                                                <a class="btn btn-primary" href="<?php echo e(route('stories.view',[$story->user->username,$story->slug])); ?>">View</a> 
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="3">There are no users.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php echo $stories->withQueryString()->links('pagination::bootstrap-5'); ?>

                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Assignment\resources\views/stories/stories_list.blade.php ENDPATH**/ ?>