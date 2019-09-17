<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">

                <div class="col-md-6">
                  <h2>Statistics Reports</h2>
                  <form action="<?php echo e(route('home')); ?>" method="get">
                   <div class="form-group">
                    <label for="name"> Select Reports Category </label>
                    <select class="form-control" required name="report_id"  id="select_query"  >
                        <option value="0"> -- Choose Report Name-- </option>
                        <option value="1">Number of claims.</option>
                        <option value="2">Number of students claimed.</option>
                        <option id="select_query"  value="3">Percentage of claims by each Faculty</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="name"> Select Faculty Name </label>
                    <select class="form-control" required name="faculty_id" id="selectCategory">
                        <option value="0"> -- Choose Faculty Name-- </option>
                        <?php $__currentLoopData = $faculites_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($faculite->id); ?>"><?php echo e($faculite->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="error error-name text-center alert alert-danger hidden"></p>  
                </div>

                <div class="form-group" id="ac_year">
                    <label for="academic_year"> Select Academic Year </label>
                    <select class="form-control" required name="academic_year" id="role">
                        <option value="0"> -- Please, Choose Academic Year  -- </option>
                        <?php $__currentLoopData = $claim_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim_yr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($claim_yr->year); ?>"><?php echo e($claim_yr->year); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="error error-ec_criteria text-center alert alert-danger hidden"></p>   
                </div>
                <button class="btn btn-warning" type="submit" id="result"> Results </button>
            </form>
        </div>

        <div class="col-md-6 text-center">
            <h2>Exception reports</h2>
            <H4>Claims without uploaded evidence. = <?php echo e($claim_count); ?> </H4>
            <h4>Claims without a decision after 14 days. = <?php echo e($date_expare); ?></h4>
            <div class="row text-center">
                <?php if(!empty($faculity)): ?>
                <h1>>>>> Result <<<< </h1>
                <h5> <?php echo e($faculity->name); ?> <h5>
                    <?php if($report_id ==1): ?> 
                    <h6> Academic Year <?php echo e($year); ?> </h6>
                    <h5> Number of Claims :: <?php echo e($faculity->getClaim($year, $report_id)); ?> </h5>
                    <?php elseif($report_id ==2): ?> 
                    <h6> Academic Year <?php echo e($year); ?> </h6>
                    <h5> Number of Students Claimed :: <?php echo e($faculity->getClaim($year, $report_id)); ?> 
                        <?php else: ?> 
                        <h5> Percentage of Claims ::  <?php echo e(number_format($faculity->getClaim($year, $report_id), 2)); ?> % </h5> 
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


  $('#select_query').change(function() {

    var opt_value = ($(this).val());

    if( (opt_value==2) || (opt_value == 1)){
        $('#ac_year').show();
    }else{(opt_value==3)
        $('#ac_year').hide();
    }

});



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>