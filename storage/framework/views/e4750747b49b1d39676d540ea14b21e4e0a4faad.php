<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>;
        </script>
        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(route('login')); ?>"></a></li>
                        <?php elseif( Auth::user()->role == 'Administrator' || Auth::user()->role == 'EC Manager'): ?>
                        <li class="<?php echo e(Request::is('users*') ? 'active' : ''); ?>"><a href="<?php echo e(route('users')); ?>">Users</a> </li>
                        <li class="<?php echo e(Request::is('faculties*') ? 'active' : ''); ?>"><a href="<?php echo e(route('faculties')); ?>">Faculties</a> </li>

                        <li class="<?php echo e(Request::is('eccoordinators*') ? 'active' : ''); ?>"><a href="<?php echo e(route('eccoordinators')); ?>">EC Coordinators </a> </li>

                        <li class="<?php echo e(Request::is('assessments*') ? 'active' : ''); ?>"><a href="<?php echo e(route('assessments')); ?>">Assessments </a> </li>
                        <li class="<?php echo e(Request::is('claimReports') ? 'active' : ''); ?>"><a href="<?php echo e(route('claimReports')); ?>">Claim Reports</a> </li>

                        <?php elseif( Auth::user()->role == 'EC Coordinator' ): ?>

                        <li class="<?php echo e(Request::is('userfaculty') ? 'active' : ''); ?>"><a href="<?php echo e(route('userFaculty')); ?>">Department List</a> </li>

                        <li class="<?php echo e(Request::is('claimFeedback*') ? 'active' : ''); ?>"><a href="<?php echo e(route('claimFeedback')); ?>">EC Claims Feedback</a> </li>



                        <?php elseif( Auth::user()->role == 'Student' ): ?>

                        <li class="<?php echo e(Request::is('subjects') ? 'active' : ''); ?>"><a href="<?php echo e(route('userSubjectList')); ?>"> Subject List </a> </li>

                        <li class="<?php echo e(Request::is('ecclaims') ? 'active' : ''); ?>"><a href="<?php echo e(route('ecclaims')); ?>">EC Claims</a> </li>
                        <li class="<?php echo e(Request::is('claimReports') ? 'active' : ''); ?>"><a href="<?php echo e(route('claimReports')); ?>">Claim Reports</a> </li>
                        <?php endif; ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
<!--
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li> -->
                            <?php else: ?>
                            <?php if( Auth::user()->role == 'EC Coordinator' ): ?>

                            <li class=""><a href="<?php echo e(route('claimFeedback')); ?>"><i class="glyphicon glyphicon-envelope" style="font-size: 17px"></i> 

                                <span class="badge" style="margin-top: -20px; <?php if( $ecclaims>0): ?>background-color: red <?php else: ?> background-color: green <?php endif; ?>"> 

                                    <?php echo e($ecclaims); ?>

                                </span></a></li>
                                 <?php elseif( Auth::user()->role == 'Student' ): ?>

                            <li class=""><a href="<?php echo e(route('claimReports')); ?>"><i class="glyphicon glyphicon-envelope" style="font-size: 17px"></i> 

                                <span class="badge" style="margin-top: -20px; <?php if( $ecclaims>0): ?>background-color: red <?php else: ?> background-color: green <?php endif; ?>"> 

                                    <?php echo e($ecclaims); ?>

                                </span></a></li>

                                <?php endif; ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>


    </body>
    </html>
