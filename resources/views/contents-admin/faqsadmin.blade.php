@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    function checkvalidation() {
        var question = document.faq.question.value;
        var answer = document.faq.answer.value;

        if(question=="" || question==null) {
            alert("Please enter the question.");
            return false;
        } else if(answer=="" || answer==null) {
            alert("Please enter the answer.");
            return false;
        } else {
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">FAQs</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(!empty($func))
                            @if($func==='add')
                                Add FAQ
                            @elseif($func==='edit')
                                Edit FAQ
                            @else($func==='show')
                                FAQ Details
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
                                        <form name="faq" action="../../faqadmin" method="post" onsubmit="return checkvalidation()">
                                    @elseif ($func==='edit')
                                        <form name="faq" action="../../faqadmin/{{ $faq->id }}" method="post" onsubmit="return checkvalidation()">
                                        {{ method_field('put') }}
                                    @else
                                        <form name="faq" action="../../faqadmin" method="get" onsubmit="return checkvalidation()">
                                    @endif
                                    {{ csrf_field() }}
                                @else
                                    <form name="faq" method="post" role="form" onsubmit="return checkvalidation()">
                                    {{ csrf_field() }}
                                @endif
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <input name="question" class="form-control">
                                            @else
                                                <input name="question" class="form-control" value="{{ $faq->question }}">
                                            @endif
                                        @else
                                            <input name="question" class="form-control">
                                        @endif
                                        <p class="help-block">Enter question here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        @if(!empty($func))
                                            @if($func==='add')
                                                <textarea name="answer" class="form-control" rows="4"></textarea> 
                                            @else
                                                <textarea name="answer" class="form-control" rows="4">{{ $faq->answer }}</textarea> 
                                            @endif
                                        @else
                                            <textarea name="answer" class="form-control" rows="4"></textarea> 
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