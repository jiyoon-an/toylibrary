@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function findCategory() {
        var current = location.pathname;
        var category = current.substring(17);
        if (category==null || category=="") {
            category = "all";
        } else {
            if(category.indexOf("/")!=-1){
                category = category.substring(0,category.indexOf("/"));
            }
        }
        
        return category;
    }

    function go(thread_id) {
        var text = document.getElementById("search").value;
        if(text==null||text==""){
            text = "null";
        }
        var str = findCategory();
        location.href="/customersupport/"+str+"/"+text+"/"+thread_id;
    }

    function search() {
        var text = document.getElementById("search").value;
        var str = findCategory();
        location.href = "/customersupport/"+str+"/"+text;
    }

</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customer Support Messages</h1>
        </div>
		<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Messages
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <a class="btn btn-default btn-block" data-toggle="collapse" href="#categories">Inbox <span class="fa arrow"></span></a>
								<br/>
								<div id="categories" class="tab-pane fade in">
                                    <a href="{{ url('/customersupport') }}" class="btn btn-default btn-block">All</a>
    								<a href="{{ url('/customersupport/feedback') }}" class="btn btn-success btn-block">Feedback</a>
									<a href="{{ url('/customersupport/concern') }}" class="btn btn-warning btn-block">Concerns</a>
    								<a href="{{ url('/customersupport/other') }}" class="btn btn-danger btn-block">Other</a>
								</div>
								<br/>
								<a href="{{ url('/customersupport/sent') }}" class="btn btn-default btn-block">Sent</a>
								<a href="" class="btn btn-default btn-block">Important</a>
                            </div>
                            <div class="col-lg-5">
								<div class="table-responsive">
									<div class="input-group custom-search-form">
                                        <input type="text" id="search" class="form-control" placeholder="Search..." value="@if(isset($search)){{ $search }}@endif">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button" onclick="search()">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                    </div>
									<table class="table table-hover">
										<thead>
											<tr>
												<td>Sender</td>
												<td>Subject</td>
												<td>Time</td>
											</tr>
	  									</thead>
										<tbody>
                                            @foreach($messages as $message)
                                                <tr>
                                                    <td onclick="go({{ $message->message_thread_id }})">
                                                        @if(isset($category) && count($category)>0)
                                                            @if($category==='sent')
                                                                {{ $message->user->first_name }} {{ $message->user->last_name }}
                                                            @else
                                                                {{ $message->member->user->first_name }} {{ $message->member->user->last_name }}
                                                            @endif
                                                        @else
                                                            {{ $message->member->user->first_name }} {{ $message->member->user->last_name }}
                                                        @endif
                                                    </td>
                                                    <td onclick="go({{ $message->message_thread_id }})">{{ $message->message_thread->title }}</td>
                                                    <td onclick="go({{ $message->message_thread_id }})">{{ date('m d, Y', strtotime($message->date_created)) }}</td>
                                                </tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div> 
							<div class="col-lg-4">
								<div class="chat-panel panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-comments fa-fw"></i>
                                            @if(isset($threads))
                                                {{ $threads->get(0)->message_thread->title }}
                                            @else
                                                Message
                                            @endif
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                               <i class="fa fa-chevron-down"></i>
                                            </button>
                                            <ul class="dropdown-menu slidedown">
                                                <li>
                                                    <a href="#" onclick="history.go(0)">
                                                        <i class="fa fa-refresh fa-fw"></i> Refresh
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-check-circle fa-fw"></i> Available
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-times fa-fw"></i> Busy
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-clock-o fa-fw"></i> Away
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <ul class="chat">
                                            @if(isset($threads))
                                                @foreach($threads as $thread)
                                                    @if($thread->user_id===null)
                                                        <li class="left clearfix">
                                                            <span class="chat-img pull-left">
                                                                <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle">
                                                            </span>
                                                            <div class="chat-body clearfix">
                                                                <div class="header">
                                                                    <strong class="primary-font">{{ $thread->member->user->first_name}} {{ $message->member->user->last_name }}</strong>
                                                                    <small class="pull-right text-muted">
                                                                        <i class="fa fa-clock-o fa-fw"></i> {{ date('H:i m d, Y', strtotime($message->date_created)) }}
                                                                    </small>
                                                                </div>
                                                                <p>
                                                                    {{ $thread->message }}
                                                                </p>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li class="right clearfix">
                                                            <span class="chat-img pull-right">
                                                                <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle">
                                                            </span>
                                                            <div class="chat-body clearfix">
                                                                <div class="header">
                                                                    <small class=" text-muted">
                                                                        <i class="fa fa-clock-o fa-fw"></i> {{ date('H:i m d, Y', strtotime($message->date_created)) }}</small>
                                                                    <strong class="pull-right primary-font">{{ $thread->user->first_name}} {{ $message->member->user->last_name }}</strong>
                                                                </div>
                                                                <p>
                                                                    {{ $thread->message }}
                                                                </p>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <!-- /.panel-body -->
                                    <div class="panel-footer">
                                        @if(isset($threads))
                                            <form action="/customersupport/store/1/{{ $threads->get(0)->message_thread_id }}/{{ $threads->get(0)->message_category_id }}/{{ $search }}" method="post">
                                            {{ csrf_field() }}
                                        @else
                                            <form role="form">
                                        @endif
                                            
                                        <div class="input-group">
                                            
                                            <input name="message" id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
                                                    Send
                                                </button>
                                            </span>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.panel-footer -->
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