@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.loantype.name.value;
        var loan_price = document.loantype.loan_price.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else if(loan_price=="" || loan_price==null) {
            alert("Please enter the loan price.");
            return false;
        } else if(!isFinite(loan_price)) {
            alert("Please enter the number in loan price");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loan Type</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(!empty($func))
                            @if($func==='add')
                                Add Loan Type
                            @elseif($func==='edit')
                                Edit Loan Type
                            @else($func==='show')
                                Loan Type Details
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
                                        <form name="loantype" action="../../loantype" method="post" onsubmit="return checkvalidation()">
                                    @elseif ($func==='edit')
                                        <form name="loantype" action="../../loantype/{{ $loantype->id }}" method="post" onsubmit="return checkvalidation()">
                                        {{ method_field('put') }}
                                    @else
                                        <form name="loantype" action="../../loantype" method="get" onsubmit="return checkvalidation()">
                                    @endif
                                    {{ csrf_field() }}
                                @else
                                    <form name="loantype" method="post" role="form" onsubmit="return checkvalidation()">
                                    {{ csrf_field() }}
                                @endif
									<div class="form-group">
                                        <label for="name">Loan Type Name</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="name" class="form-control">
                                            @else
                                                <input name="name" class="form-control" value="{{ $loantype->name }}">
                                            @endif
                                        @else
                                            <input name="name" class="form-control">
                                        @endif
                                        <p class="help-block">Enter loan type name here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="loan_price">Price</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="loan_price" class="form-control">
                                            @else
                                                <input name="loan_price" class="form-control" value="{{ $loantype->loan_price }}">
                                            @endif
                                        @else
                                            <input name="loan_price" class="form-control">
                                        @endif
                                        <p class="help-block">Enter loan type name here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="note">Note</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <textarea name="note" class="form-control" rows="4"></textarea>
                                            @else
                                                <textarea name="note" class="form-control" rows="4">{{ $loantype->note }}</textarea>
                                            @endif
                                        @else
                                            <textarea name="note" class="form-control" rows="4"></textarea>
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