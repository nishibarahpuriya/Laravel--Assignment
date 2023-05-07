
    <?php $__env->startSection('title'); ?>
        <?php echo e('View Book'); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
              <div class="row">
                    <div class="col-sm-8">
                        <div class="p-6 text-gray-900">
                            <?php if(!empty($bookDetail)): ?>
                                <h3><?php echo e($bookDetail->title); ?> </h3><span>Rating: </span>
                                <p>Price: <?php echo e($bookDetail->price); ?></p>
                                <p>Category: <?php echo e($bookDetail->category->category_name); ?></p>
                                <p>Author: </p>
                                <p><?php echo e($bookDetail->description); ?></p>
                            <?php endif; ?>

                            <h4>Reviews</h4><span>Avg Rating: <?php echo e($bookDetail->avgRating()); ?></span>
                                <?php $__currentLoopData = ($reviews); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($review->review); ?> <strong>Given By</strong>:<?php echo e($review->givenBy->name); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php if(empty($reviewDone)): ?>
                    <?php if(!empty(Auth::check())): ?>
                    <div class="col-sm-4">
                        <div class="p-6 text-gray-900">
                            <h3>Add Reviews</h3>
                            <p>Write Your Honest Review</p>
                                <form action="<?php echo e(route('review-add')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Rating<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" placeholder="Rating" required name="rating">
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Comment<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="textarea-input" rows="5" name="review" required placeholder="Write Your Review"></textarea>
                                        <input class="form-control" type="hidden" value="<?php echo e($bookDetail->id); ?>" name="bookId">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card card-body border-0 shadow-sm p-2 mb-4">
                                            <section class="d-sm-flex justify-content-between pt-2">
                                                <button class="btn btn-primary btn-lg d-block mb-2" type="submit">Save</button>
                                            </section>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
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
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-Assignment\resources\views/books/view_books.blade.php ENDPATH**/ ?>