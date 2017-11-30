@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var type = document.donation.type.value;
        var details = document.donation.details.value;

        if(type=="" || type==null) {
            alert("Please enter the type.");
            return false;
        } else if(details=="" || details==null) {
            alert("Please enter the details.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Donations</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(!empty($func))
                            @if($func==='add')
                                Add Donation
                            @elseif($func==='edit')
                                Edit Donation
                            @else($func==='show')
                                Donation Details
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
                                        <form name="donation" action="../../donationadmin" method="post" onsubmit="return checkvalidation()">
                                    @elseif ($func==='edit')
                                        <form name="donation" action="../../donationadmin/{{ $donation->id }}" method="post" onsubmit="return checkvalidation()">
                                        {{ method_field('put') }}
                                    @else
                                        <form name="donation" action="../../donationadmin" method="get" onsubmit="return checkvalidation()">
                                    @endif
                                    {{ csrf_field() }}
                                @else
                                    <form name="donation" method="post" role="form" onsubmit="return checkvalidation()">
                                    {{ csrf_field() }}
                                @endif
                                    <div class="form-group">
                                        <label for="type">Donation</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="type" class="form-control">
                                            @else
                                                <input name="type" class="form-control" value="{{ $donation->type }}">
                                            @endif
                                        @else
                                            <input name="type" class="form-control">
                                        @endif
                                        <p class="help-block">Enter donation here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Description</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <textarea name="details" class="form-control" rows="4"></textarea> 
                                            @else
                                                <textarea name="details" class="form-control" rows="4">{{ $donation->details }}</textarea> 
                                            @endif
                                        @else
                                            <textarea name="details" class="form-control" rows="4"></textarea> 
                                        @endif
                                        
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