@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.membership.name.value;
        var fee = document.membership.fee.value;
        var period = document.membership.period.value;
        var end_date = document.membership.end_date.value;
        var archive_period = document.membership.archive_period.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else if(fee=="" || fee==null) {
            alert("Please enter the fee.");
            return false;
        } else if(period=="" || period==null) {
            alert("Please enter the period.");
            return false;
        } else if(end_date=="" || end_date==null) {
            alert("Please enter the end date.");
            return false;
        } else if(archive_period=="" || archive_period==null) {
            alert("Please enter the archive_period.");
            return false;
        } else if(!isFinite(fee)) {
            alert("Please enter number in fee.");
            return false;
        } else if(!isFinite(period)) {
            alert("Please enter number in period.");
            return false;
        } else if(!isFinite(archive_period)) {
            alert("Please enter number in archive period.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Membership Type</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(!empty($func))
                            @if($func==='add')
                                Add Membership Type
                            @elseif($func==='edit')
                                Edit Membership Type
                            @else($func==='show')
                                Membership Type Details
                            @endif
                        @else
                            Details
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if (!empty($func))
                                    @if ($func==='add')
                                        <form name="membership" action="../../membershipadmin" method="post" onsubmit="return checkvalidation()">
                                    @elseif ($func==='edit')
                                        <form name="membership" action="../../membershipadmin/{{ $membership->id }}" method="post" onsubmit="return checkvalidation()">
                                        {{ method_field('put') }}
                                    @else
                                        <form name="membership" action="../../membershipadmin" method="get" onsubmit="return checkvalidation()">
                                    @endif
                                    {{ csrf_field() }}
                                @else
                                    <form name="membership" method="post" role="form" onsubmit="return checkvalidation()">
                                    {{ csrf_field() }}
                                @endif
									<div class="form-group">
                                        <label for="name">Membership Name</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="name" class="form-control">
                                            @else
                                                <input name="name" class="form-control" value="{{ $membership->name }}">
                                            @endif
                                        @else
                                            <input name="name" class="form-control">
                                        @endif
                                        <p class="help-block">Enter membership name here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="fee">Membership Fee</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="fee" class="form-control">
                                            @else
                                                <input name="fee" class="form-control" value="{{ $membership->fee }}">
                                            @endif
                                        @else
                                            <input name="fee" class="form-control">
                                        @endif
                                        <p class="help-block">Enter membership fee here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="period">Membership Period</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="period" class="form-control">
                                            @else
                                                <input name="period" class="form-control" value="{{ $membership->period }}">
                                            @endif
                                        @else
                                            <input name="period" class="form-control">
                                        @endif
                                        <p class="help-block">Enter membership period here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="end_date">Membership End Date</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="end_date" class="form-control">
                                            @else
                                                <input name="end_date" class="form-control" value="{{ $membership->end_date }}">
                                            @endif
                                        @else
                                            <input name="end_date" class="form-control">
                                        @endif
                                        <p class="help-block">Enter membership end date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="expiry_grace_period">Membership Expiry Grace Period</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="expiry_grace_period" class="form-control">
                                            @else
                                                <input name="expiry_grace_period" class="form-control" value="{{ $membership->expiry_grace_period }}">
                                            @endif
                                        @else
                                            <input name="expiry_grace_period" class="form-control">
                                        @endif
                                        <p class="help-block">Enter membership expiry grace period here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="archive_period">Membership Archive Period</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="archive_period" class="form-control">
                                            @else
                                                <input name="archive_period" class="form-control" value="{{ $membership->archive_period }}">
                                            @endif
                                        @else
                                            <input name="archive_period" class="form-control">
                                        @endif
                                        <p class="help-block">Enter membership archive period here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="outstanding_balance_warning">Outstanding Balance Warning</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="outstanding_balance_warning" class="form-control">
                                            @else
                                                <input name="outstanding_balance_warning" class="form-control" value="{{ $membership->outstanding_balance_warning }}">
                                            @endif
                                        @else
                                            <input name="outstanding_balance_warning" class="form-control">
                                        @endif
                                        <p class="help-block">Enter outstanding balance warning here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="is_enabled">Is this membership enabled?</label>
                                        <div class="checkbox">
                                            <label>
                                                <input name="is_enabled" type="checkbox" value="1">Enabled
                                            </label>
                                        </div>
									</div>
									<button type="submit" class="btn btn-default">Submit</button>
								</form>
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

@endsection