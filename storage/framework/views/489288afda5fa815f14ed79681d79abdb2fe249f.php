<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">Assignment</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('list.stories')); ?>">Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('users')); ?>">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
  
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\Assignment\resources\views/layout/navbar.blade.php ENDPATH**/ ?>