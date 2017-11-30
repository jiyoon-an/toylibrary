@extends('layouts.library')

@section('content')
<!-- Start of Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-12">
            <h2>Toy Library News</h2>
            <!-- First Blog Post -->
            @foreach ($news as $new)
            <h3>
                <a href="{{ url('/newsentry') }}">{{ $new->headline }}</a>
            </h3>
            <!-- <p class="lead">
                by <a href="{{ url('/') }}">Start Bootstrap</a>
            </p> -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('F d, Y', strtotime($new->date)) }}</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>{{ $new->content }}</p>
            <!-- <a class="btn btn-primary" href="{{ url('/newsentry') }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
            <hr>
            @endforeach
            <!-- Pager -->
            <!-- <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul> -->
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <!-- <div class="col-md-4"> -->
            <!-- Blog Search Well -->
            <!-- <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div> -->
                <!-- /.input-group -->
            <!-- </div> -->
            <!-- Blog Categories Well -->
            <!-- <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div> -->
                    <!-- /.col-lg-6 -->
                    <!-- <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div> -->
                    <!-- /.col-lg-6 -->
                <!-- </div> -->
                <!-- /.row -->
            <!-- </div> -->
            <!-- Side Widget Well -->
            <!-- <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
        </div> -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

@endsection