<?php $__env->startSection('content'); ?>
<!-- Start of Content -->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Toy Popularity Report</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Report
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Toy</th>
                                                <th>Length of Time Owned</th>
                                                <th># days owned</th>
                                                <th># times loaned</th>
    											<th># times loaned in past 12 months</th>
    											<th># days been on loan</th>
    											<th>% time on loan</th>
    										</tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($toys) && count($toys)>0): ?>
                                                <?php foreach($toys as $toy): ?>
                                                    <tr>
                                                        <td><?php echo e($toy->id); ?> : <?php echo e($toy->name); ?></td>
                                                        <td>
                                                            <?php
                                                                $year = date('Y', strtotime($toy->today)) - date('Y', strtotime($toy->purchased_date));
                                                                $month = date('m', strtotime($toy->today)) - date('m', strtotime($toy->purchased_date));
                                                                $day = date('d', strtotime($toy->today)) - date('d', strtotime($toy->purchased_date));

                                                                if($day<0) {
                                                                    $day = 30 + $day;
                                                                    $month--;
                                                                }

                                                                if($month<0) {
                                                                    $month = 12 + $month;
                                                                    $year--;
                                                                }

                                                                echo $year." years, ".$month.' months, '.$day.' days';
                                                            ?></td>
                                                        <td><?php echo e($toy->days); ?></td>
                                                        <td>
                                                            <?php
                                                                $count = 0;
                                                                foreach($loans as $loan) {
                                                                    if($loan->toy_id == $toy->id) {
                                                                        $count++;
                                                                    }
                                                                }
                                                                echo $count;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                foreach($loans_latest as $loan) {
                                                                    if($loan->toy_id == $toy->id) {
                                                                        echo $loan->latestcount;
                                                                    }
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                $days = 0;
                                                                foreach($loans as $loan) {
                                                                    if($loan->toy_id == $toy->id) {
                                                                        $days = $days + $loan->days;
                                                                    }
                                                                }
                                                                echo $days;
                                                            ?>
                                                        </td>
                                                        <td> <?php echo e(round($days / ($toy->days) *100)); ?> %</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="7" style="text-align: center;">No Data</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col-lg-12(nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>