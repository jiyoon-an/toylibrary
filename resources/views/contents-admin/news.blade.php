@extends('layouts.admin')

@section('content')
<!-- Start of Content -->
<script type="text/javascript">
    var news_id="";

    function tempNewsId(newsid) {
        news_id = newsid;
    }

    function select(functype) {
        if(functype=='add') {
            location.href = "/newsadmin/add"
        } else if(functype=='edit') {
            if(news_id=="") {
                alert("Select News first");
            } else {
                location.href = "/newsadmin/"+news_id+"/edit";  
            }
        } else {
            if(news_id=="") {
                alert("Select News First");
            } else {
                location.href = "/newsadmin/"+news_id+"/delete";    
            }
        }
    }

    function search() {
        var text = document.getElementById("search").value;
        location.href = "/newsadmin/"+text;
    }

    function checkvalidation() {
        var date = document.news.date.value;
        var headline = document.news.headline.value;
        var content = document.news.content.value;

        if(date=="" || date==null) {
            alert("Please enter the date.");
            return false;
        } else if(headline=="" || headline==null) {
            alert("Please enter the headline.");
            return false;
        } else if(content=="" || content==null) {
            alert("Please enter the content.");
            return false;
        } else {
            return true;
        }

    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        News List and Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
								<div class="input-group custom-search-form">
                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" onclick="search()">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <br/>
								<div class="col-lg-4">
                                    <button id="btnAdd" class="btn btn-success btn-block" onclick="select('add')">Add</button>
								</div>
								<div class="col-lg-4">
									<button id="btnEdit" class="btn btn-info btn-block" onclick="select('edit')">Edit</button>
								</div>
								<div class="col-lg-4">
									<button id="btnDelete" class="btn btn-danger btn-block" onclick="select('delete')">Delete</button>
								</div>
								<br/>
								<div class="table-responsive">								
								</div>
								<table class="table table-hover">
									<thead>
										<tr>
											<td>Date</td>
											<td>Headline</td>
											<td>Content</td>
										</tr>
									</thead>
									<tbody>
                                        @if(isset($news) && count($news)>0)
                                            @foreach ($news as $onenews)
                                                <tr>
                                                    <td onclick="tempNewsId('{{ $onenews->id }}')">{{ date('m d, Y', strtotime($onenews->date)) }}</td>
                                                    <td onclick="tempNewsId('{{ $onenews->id }}')">{{ $onenews->headline }}</td>
                                                    <td onclick="tempNewsId('{{ $onenews->id }}')">{{ $onenews->content }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" style="text-align: center;">No News Data</td>
                                            </tr>
                                        @endif
									</tbody>
								</table>
                            </div>
							<div class="col-lg-6">
								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        @if(!empty($func))
                                            @if($func==='add')
                                                Add Newsletter
                                            @elseif($func==='edit')
                                                Edit Newsletter
                                            @else($func==='delete')
                                                Delete Newsletter
                                            @endif
                                        @else
                                            Newsletter
                                        @endif
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if (!empty($func))
                                                    @if ($func==='add')
                                                        <form name="news" action="../../newsadmin" method="post" onsubmit="return checkvalidation()">
                                                    @elseif ($func==='edit')
                                                        <form name="news" action="../../newsadmin/{{ $result->id }}" method="post" onsubmit="return checkvalidation()">
                                                        {{ method_field('put') }}
                                                    @else
                                                        <form name="news" action="../../newsadmin/{{ $result->id }}" method="post" onsubmit="return checkvalidation()">
                                                        {{ method_field('delete')}}
                                                    @endif
                                                    {{ csrf_field() }}
                                                @else
                                                    <form name="news" method="post" role="form" onsubmit="return checkvalidation()">
                                                    {{ csrf_field() }}
                                                @endif
                                                    <div class="form-group">
                                                        <label for="date">Date</label>
                                                        @if(!empty($func))
                                                            @if($func==='add')
                                                                <input name="date" class="form-control">
                                                            @else
                                                                <input name="date" class="form-control" value="{{ date('m d, Y', strtotime($result->date)) }}">
                                                            @endif
                                                        @else
                                                            <input name="date" class="form-control">
                                                        @endif
                                                        <p class="help-block">Enter date here.</p>
                                                    </div>
            										<div class="form-group">
                                                        <label for="headline">Headline</label>
                                                        @if(!empty($func))
                                                            @if($func==='add')
                                                                <input name="headline" class="form-control">
                                                            @else
                                                                <input name="headline" class="form-control" value="{{ $result->headline }}">
                                                            @endif
                                                        @else
                                                            <input name="headline" class="form-control">
                                                        @endif
                                                        <p class="help-block">Enter newsletter headline here.</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="content">Content</label>
                                                        @if(!empty($func))
                                                            @if($func==='add')
                                                                <textarea name="content" class="form-control" rows="4"></textarea>
                                                            @else
                                                                <textarea name="content" class="form-control" rows="4">{{ $result->content }}</textarea>
                                                            @endif
                                                        @else
                                                            <textarea name="content" class="form-control" rows="4"></textarea>
                                                        @endif
            											<p class="help-block">Enter newsletter content here.</p>
                                                    </div>
                                                                               
                                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                                </form>
                                            </div>
                                            <!-- /.col-lg-12(nested) -->
                                        </div>
                                        <!-- /.row (nested) -->
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
							</div>                                
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