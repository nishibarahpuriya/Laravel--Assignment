



<?php $__env->startSection('title'); ?>
            <?php echo e('books'); ?>

        <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>
  <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <?php if(!empty(Auth::user())): ?>
                    <div class="card-header">Books <a href="<?php echo e(route('create.books')); ?>"><button class="btn btn-success" style="float: right;">Add books</button></a></div>
                    <?php endif; ?> 
                        <div class="card-body">
    
                            <div class="container">
        
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">View Book</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($book->title); ?></td>
                                                <td><?php echo e($book->price); ?></td>
                                                <td><?php echo e($book->category->category_name); ?></td>
                                                <td></td>
                                                <td><?php echo e($book->description); ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo e(route('books.view',[$book->id])); ?>">View</a> 
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="3">There are no books.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if($pagination['totalPages'] > 1): ?>
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li
                        class="page-item btn btn-outline-primary py-1 me-3 <?php if($pagination['page'] == 1): ?> disabled <?php endif; ?>">
                        <a class=""
                            href="<?php echo e(route('books', ['page' => $pagination['previousPage']])); ?>">
                            <i class="fa fa-angle-left pe-2"></i> Previous
                        </a>
                    </li>
                    <?php $__currentLoopData = $pagination['pageButtonArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paginationlink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="page-item <?php if($paginationlink['page_number'] == $pagination['page']): ?> active <?php endif; ?>">
                        <a class="page-link"
                            href="<?php echo e($paginationlink['pageLink']); ?>"><?php echo e($paginationlink['page_number']); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li class="page-item btn btn-outline-primary py-1 ms-3 <?php if($pagination['page'] == $pagination['totalPages']): ?> disabled <?php endif; ?>">
                        <a class="" href="<?php echo e(route('books', ['page' => $pagination['nextPage']])); ?>">
                            Next <i class="fa fa-angle-right ps-2"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel-Assignment\resources\views/books/books_list.blade.php ENDPATH**/ ?>