@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var toy_group = document.toygroup.toy_group.value;

        if(toy_group=="" || toy_group==null) {
            alert("Please enter the toy group.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Toy Group</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(!empty($func))
                            @if($func==='add')
                                Add Toy Group
                            @elseif($func==='edit')
                                Edit Toy Group
                            @else($func==='show')
                                Toy Group Details
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
                                        <form name="toygroup" action="../../toygroup" method="post" onsubmit="return checkvalidation()">
                                    @elseif ($func==='edit')
                                        <form name="toygroup" action="../../toygroup/{{ $toygroup->id }}" method="post" onsubmit="return checkvalidation()">
                                        {{ method_field('put') }}
                                    @else
                                        <form name="toygroup" action="../../toygroup" method="get" onsubmit="return checkvalidation()">
                                    @endif
                                    {{ csrf_field() }}
                                @else
                                    <form name="toygroup" method="post" role="form" onsubmit="return checkvalidation()">
                                    {{ csrf_field() }}
                                @endif
									<div class="form-group">
                                        <label for="toy_group">Toy Group</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="toy_group" class="form-control">
                                            @else
                                                <input name="toy_group" class="form-control" value="{{ $toygroup->toy_group }}">
                                            @endif
                                        @else
                                            <input name="toy_group" class="form-control">
                                        @endif
                                        <p class="help-block">Enter toy group here.</p>
                                    </div>
									<div class="form-group">
                                        <label for="description">Toy Description</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <textarea name="description" class="form-control" rows="4"></textarea>
                                            @else
                                                <textarea name="description" class="form-control" rows="4">{{ $toygroup->description }}</textarea>
                                            @endif
                                        @else
                                            <textarea name="description" class="form-control" rows="4"></textarea>
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