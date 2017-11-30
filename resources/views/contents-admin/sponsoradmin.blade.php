@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var name = document.sponsor.name.value;

        if(name=="" || name==null) {
            alert("Please enter the name.");
            return false;
        } else {
            return true;
        }
    }
</script>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sponsor</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(!empty($func))
                            @if($func==='add')
                                Add Sponsor
                            @elseif($func==='edit')
                                Edit Sponsor
                            @else($func==='show')
                                Sponsor Details
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
                                        <form name="sponsor" action="../../sponsoradmin" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    @elseif ($func==='edit')
                                        <form name="sponsor" action="../../sponsoradmin/{{ $sponsor->id }}" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                        {{ method_field('put') }}
                                    @else
                                        <form name="sponsor" action="../../sponsoradmin" method="get" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    @endif
                                    {{ csrf_field() }}
                                @else
                                    <form name="sponsor" method="post" role="form" onsubmit="return checkvalidation()">
                                    {{ csrf_field() }}
                                @endif
									<div class="form-group">
                                        <label for="name">Sponsor Name</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="name" class="form-control">
                                            @else
                                                <input name="name" class="form-control" value="{{ $sponsor->name }}">
                                            @endif
                                        @else
                                            <input name="name" class="form-control">
                                        @endif
                                        <p class="help-block">Enter sponsor name here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="start_date" class="form-control">
                                            @else
                                                <input name="start_date" class="form-control" value="{{ date('m d, Y', strtotime($sponsor->start_date)) }}">
                                            @endif
                                        @else
                                            <input name="start_date" class="form-control">
                                        @endif
                                        <p class="help-block">Enter start date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="end_date">End Date</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="end_date" class="form-control">
                                            @else
                                                <input name="end_date" class="form-control" value="{{ date('m d, Y', strtotime($sponsor->end_date)) }}">
                                            @endif
                                        @else
                                            <input name="end_date" class="form-control">
                                        @endif
                                        <p class="help-block">Enter end date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="image">Sponsor Logo</label>
                                        <input name="image" type="file">
										<p class="help-block">Browse sponsor logo.</p>
                                    </div>
									<div class="form-group">
                                        <label for="website">Sponsor website</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="website" class="form-control">
                                            @else
                                                <input name="website" class="form-control" value="{{ $sponsor->website }}">
                                            @endif
                                        @else
                                            <input name="website" class="form-control">
                                        @endif
                                        <p class="help-block">Enter sponsor's website here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="note">Note</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <textarea name="note" class="form-control" rows="4"></textarea> 
                                            @else
                                                <textarea name="note" class="form-control" rows="4">{{ $sponsor->note }}</textarea> 
                                            @endif
                                        @else
                                            <textarea name="note" class="form-control" rows="4"></textarea> 
                                        @endif
                                    </div>
									<div class="form-group">
                                        <label for="is_enabled">Is this sponsor enabled?</label>
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