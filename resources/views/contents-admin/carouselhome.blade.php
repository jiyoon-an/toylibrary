
@extends('layouts.admin')

@section('content')
<!-- Start of Content -->

<script type="text/javascript">
    
    function check() {
        if(document.getElementsByName('image1')==null || document.getElementsByName('image2')==null }} document.getElementsByName('image3')==null) {
            alert("Please update 3 photos");
            return false;
        }else{
            return true;
        }
    }
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Carousel Home</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Carousel Home                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
						<div class="col-lg-6">
							<h3>Current Carousel Images</h3>
                            @if(isset($carousels))
                                @foreach($carousels as $carousel)
                                    <div>
                                        <label>Image :</label><br/>
                                        <img src="{{ '../img/carousel/'.$carousel->image }}"></img>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <label>Image 1:</label><br/>
                                    <img src=""></img>
                                </div>
                                <div>
                                    <label>Image 2:</label><br/>
                                    <img src=""></img>
                                </div>
                                <div>
                                    <label>Image 3:</label><br/>
                                    <img src=""></img>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
							<h3>Change Images</h3>
                            @if(isset($carousels))
                                <form action="{{ url('/carouseladmin') }}" method="post" enctype="multipart/form-data">
                                    {{ method_field('put') }}
                            @else
                                <form action="{{ url('/carouseladmin') }}" method="post" enctype="multipart/form-data">
                            @endif
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
                                    <label for="image1">Image 1:</label>
                                    <input id="image1" name="image1" type="file"">
                                    <input type="hidden" name="carousel_img1" value="{{ $carousels->get(0)->id }}" />
                                </div>
								<div class="form-group">
                                    <label for="image2">Image 2:</label>
                                    <input id="image2" name="image2" type="file"">
                                    <input type="hidden" name="carousel_img2" value="{{ $carousels->get(1)->id }}" />
                                </div>
								<div class="form-group">
                                    <label for="image3">Image 3:</label>
                                    <input id="image3" name="image3" type="file">
                                    <input type="hidden" name="carousel_img3" value="{{ $carousels->get(2)->id }}" />
                                </div>
								<button type="submit" class="btn btn-default btn-block">Submit</button>
							</form>
						</div>
					</div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>        
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
@endsection