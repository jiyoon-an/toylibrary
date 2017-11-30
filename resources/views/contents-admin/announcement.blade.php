@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var title = document.announcement.title.value;
        var message = document.announcement.message.value;
        var start_date = document.announcement.start_date.value;
        var end_date = document.announcement.end_date.value;

        if(title=="" || title==null) {
            alert("Please enter the title.");
            return false;
        } else if(message=="" || message==null) {
            alert("Please enter the message.");
            return false;
        } else if(start_date=="" || start_date==null) {
            alert("Please enter the start date.");
            return false;
        } else if(end_date=="" || end_date==null) {
            alert("Please enter the end date.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Announcement</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if (!empty($announcement))
                            Edit Announcement
                        @else
                            Add Announcement
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            @if (!empty($announcement))
                                <form name="announcement" action="../../announcement/{{ $announcement->id }}" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    {{ method_field('put') }}
                                    <input type="hidden" name="user_id" value="{{ $announcement->user_id }}" />
                            @else        
                                <form name="announcement" action="../announcement" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()">
                                    <input type="hidden" name="user_id" value="1" />
                            @endif
                                    {{ csrf_field() }}
									<div class="form-group">
                                        <label for="title">Title</label>
                                        @if (!empty($announcement))
                                            <input name="title" class="form-control" value="{{ $announcement->title }} ">
                                        @else        
                                            <input name="title" class="form-control" value="">
                                        @endif
                                        <p class="help-block">Enter title here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="message">Message</label>
                                        @if (!empty($announcement))
                                            <textarea name="message" class="form-control" rows="4">{{ $announcement->message }}</textarea>
                                        @else        
                                            <textarea name="message" class="form-control" rows="4"></textarea>
                                        @endif
                                    </div>
									<div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        @if (!empty($announcement))
                                            <input name="start_date" class="form-control" value="{{ date('m d, Y', strtotime($announcement->start_date)) }}">
                                        @else        
                                            <input name="start_date" class="form-control">
                                        @endif
                                        <p class="help-block">Enter start date here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="end_date">End Date</label>
                                        @if (!empty($announcement))
                                            <input name="end_date" class="form-control" value="{{ date('m d, Y', strtotime($announcement->end_date)) }}">
                                        @else        
                                            <input name="end_date" class="form-control">
                                        @endif
                                        <p class="help-block">Enter end date here.</p>
                                    </div>
									<div class="checkbox">
                                        <label for="is_enabled">
                                            @if (!empty($announcement))
                                                @if ($announcement->is_enabled == 1)
                                                    <input name="is_enabled" type="checkbox" value="1" checked>Enabled
                                                @else
                                                    <input name="is_enabled" type="checkbox" value="1">Enabled
                                                @endif
                                            @else        
                                                <input name="is_enabled" type="checkbox" value="1">Enabled
                                            @endif                                            
                                        </label>
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