<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    	<meta name="description" content="Flatfy Free Flat and Responsive HTML5 Template ">
    	<meta name="author" content="JRAMIREZ KPERALTA Copyright 2016">

	    <title>Mt Roskill Toy Library</title>

    	<!-- Bootstrap core CSS -->
    	<link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">

	    <!-- Custom Google Web Font -->
	    <link href="<?php echo e(URL::asset('font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Baloo+Da' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
		
	    <!-- Custom CSS-->
	    <link href="<?php echo e(URL::asset('css/general.css')); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo e(URL::asset('css/modalstyle.css')); ?>" rel="stylesheet" type="text/css"> <!--modal css-->
		<link href="<?php echo e(URL::asset('css/reset.css')); ?>" rel="stylesheet" type="text/css"> <!--modal css-->
		
		<!-- Owl-Carousel -->
	    <link href="<?php echo e(URL::asset('css/custom.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(URL::asset('css/owl.carousel.css')); ?>" rel="stylesheet" type="text/css">
	    <link href="<?php echo e(URL::asset('css/owl.theme.css')); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet" type="text/css">
		<link href="<?php echo e(URL::asset('css/animate.css')); ?>" rel="stylesheet" type="text/css">
		
		<!-- Magnific Popup core CSS file -->
		<link href="<?php echo e(URL::asset('css/magnific-popup.css')); ?>" rel="stylesheet" type="text/css"> 

		<style type="text/css">
			h1 {
				display: inline-flex;
				margin-top: 0px;
			}
			img {
			    margin: auto;
			    top: 0;
			    left: 0;
			    right: 0;
			    bottom: 0;
			}
			#logo {
				margin-top:-18px;
			}
			.menu {
				width:100%;
			}			
			.menu a {
				font-size: 18px;
				color: #FFFFFF !important;
				margin-bottom: 0px !important;
			}
			.menu a:hover {
				color: #34495e !important;
			}
			.menuItem {	
				border-top-left-radius: 20px 20px;
				border-top-right-radius: 0;
				border-bottom-right-radius: 20px 20px;
				border-bottom-left-radius: 0;			
				-moz-border-radius-top-left: 20px;
				-moz-border-radius-top-right: 0;
				-moz-border-radius-bottom-right: 20px;
				-moz-border-radius-bottom-left: 0;

				-webkit-border-top-left-radius: 20px;
				-webkit-border-top-right-radius: 0;
				-webkit-border-bottom-right-radius: 20px;
				-webkit-border-bottom-left-radius: 0;				
			}
			.nav>li>a:hover {	
				border-top-left-radius: 20px 20px;
				border-top-right-radius: 0;
				border-bottom-right-radius: 20px 20px;
				border-bottom-left-radius: 0;			
				-moz-border-radius-top-left: 20px;
				-moz-border-radius-top-right: 0;
				-moz-border-radius-bottom-right: 20px;
				-moz-border-radius-bottom-left: 0;

				-webkit-border-top-left-radius: 20px;
				-webkit-border-top-right-radius: 0;
				-webkit-border-bottom-right-radius: 20px;
				-webkit-border-bottom-left-radius: 0;				
			}
			/* jssor slider bullet navigator skin 05 css */
	        /*
		        .jssorb05 div           (normal)
		        .jssorb05 div:hover     (normal mouseover)
		        .jssorb05 .av           (active)
		        .jssorb05 .av:hover     (active mouseover)
		        .jssorb05 .dn           (mousedown)
	        */
	        .jssorb05 {
	        	position: absolute;
	        }
	        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
	            position: absolute;
	            /* size of bullet elment */
	            width: 16px;
	            height: 16px;
	            background: url('img/b05.png') no-repeat;
	            overflow: hidden;
	            cursor: pointer;
	        }
	        .jssorb05 div { background-position: -7px -7px; }
	        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
	        .jssorb05 .av { background-position: -67px -7px; }
	        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
	        /* jssor slider arrow navigator skin 22 css */
	        /*
		        .jssora22l                  (normal)
		        .jssora22r                  (normal)
		        .jssora22l:hover            (normal mouseover)
		        .jssora22r:hover            (normal mouseover)
		        .jssora22l.jssora22ldn      (mousedown)
		        .jssora22r.jssora22rdn      (mousedown)
	        */
	        .jssora22l, .jssora22r {
	            display: block;
	            position: absolute;
	            /* size of arrow element */
	            width: 40px;
	            height: 58px;
	            cursor: pointer;
	            background: url('img/a22.png') center center no-repeat;
	            overflow: hidden;
	        }
	        .jssora22l { background-position: -10px -31px; }
	        .jssora22r { background-position: -70px -31px; }
	        .jssora22l:hover { background-position: -130px -31px; }
	        .jssora22r:hover { background-position: -190px -31px; }
	        .jssora22l.jssora22ldn { background-position: -250px -31px; }
	        .jssora22r.jssora22rdn { background-position: -310px -31px; }
			#map {    
				
		        width: 100%;
		    	height: 500px;
				color: black !important;
	      	}
	      	#google-maps-canvas .text-marker{max-width:none!important;background:none!important;}img{max-width:none}
		</style>
	</head>
	<body id="home" style="font-family: 'Baloo Da', Arial, sans-serif;">
		<?php echo $__env->make('info.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->yieldContent('content'); ?>

		<?php echo $__env->make('info.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	    <!-- JavaScripts -->		    
		<script src="<?php echo e(URL::asset('js/modernizr-2.8.3.min.js')); ?>" type="text/javascript"></script>  <!-- Modernizr /-->
		<script src="<?php echo e(URL::asset('js/modernizr.js')); ?>" type="text/javascript"></script> 

		<!--modal Modernizr js -->
		<script src="<?php echo e(URL::asset('js/jquery-1.10.2.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(URL::asset('js/jssor.slider.min.js')); ?>" type="text/javascript"></script>
	    <script src="<?php echo e(URL::asset('js/bootstrap.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(URL::asset('js/owl.carousel.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(URL::asset('js/script.js')); ?>" type="text/javascript"></script>
		
		<!-- StikyMenu -->
		<script src="<?php echo e(URL::asset('js/stickUp.min.js')); ?>" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(function($) {
				$(document).ready( function() {
					$('.navbar-default').stickUp();			  
				});
		  	});	
		</script>
		
		<!-- Smoothscroll -->
		<script src="<?php echo e(URL::asset('js/jquery.corner.js')); ?>" type="text/javascript"></script> 
		<script src="<?php echo e(URL::asset('js/wow.min.js')); ?>" type="text/javascript"></script>
		<script>
	 		new WOW().init();
		</script>
		<script src="<?php echo e(URL::asset('js/classie.js')); ?>" type="text/javascript"></script>
		<script src="<?php echo e(URL::asset('js/main.js')); ?>" type="text/javascript"></script> 
		<!-- <script src="js/uiMorphingButton_inflow.js"></script> -->
		
		<!-- Magnific Popup core JS file -->
		<script src="<?php echo e(URL::asset('js/jquery.magnific-popup.js')); ?>" type="text/javascript"></script> 

		<!--[if IE 9]>
			<script src="js/PIE_IE9.js"></script>
		<![endif]-->
		<!--[if lt IE 9]>
			<script src="js/PIE_IE678.js"></script>
		<![endif]-->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
		<![endif]-->

		<script type="text/javascript">
	        jssor_1_slider_init = function() {	            
	        	var jssor_1_SlideoTransitions = [
	            	[{b:5500,d:3000,o:-1,r:240,e:{r:2}}],
	              	[{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],
	              	[{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],
	              	[{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],
	              	[{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],
	              	[{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],
	              	[{b:10000,d:2000,x:-379,e:{x:7}}],
	              	[{b:10000,d:2000,x:-379,e:{x:7}}],
	              	[{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]
	            ];
	            
	            var jssor_1_options = {
	            	$AutoPlay: true,
	              	$SlideDuration: 5000,
	              	$SlideEasing: $Jease$.$OutQuint,
	              	$CaptionSliderOptions: {
	                	$Class: $JssorCaptionSlideo$,
	                	$Transitions: jssor_1_SlideoTransitions
	            	},
	              	$ArrowNavigatorOptions: {
	                	$Class: $JssorArrowNavigator$
	            	},
	              	$BulletNavigatorOptions: {
	                	$Class: $JssorBulletNavigator$
	              	}
	            };
	            
	            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
	            
	            //responsive code begin
	            
	            function ScaleSlider() {
	                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
	                if (refSize) {
	                	refSize = Math.min(refSize, 1920);
	                    jssor_1_slider.$ScaleWidth(refSize);
	                }
	                else {
	                    window.setTimeout(ScaleSlider, 30);
	                }
	            }
	            ScaleSlider();
	            $Jssor$.$AddEvent(window, "load", ScaleSlider);
	            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
	            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);

	            //responsive code end
	        };	
	    </script>
	    <script type="text/javascript">
			jssor_1_slider_init();
		</script>
		<script type="text/javascript">
		  	var $membershipGroup = $('#membershipGroup');
				$membershipGroup.on('show.bs.collapse','.collapse', function() {
    			$membershipGroup.find('.collapse.in').collapse('hide');
			});
		  	var $aboutUsGroupXS = $('#aboutUsGroupXS');
				$aboutUsGroupXS.on('show.bs.collapse','.collapse', function() {
    			$aboutUsGroupXS.find('.collapse.in').collapse('hide');
			});
		  	var $aboutUsGroupMD = $('#aboutUsGroupMD');
				$aboutUsGroupMD.on('show.bs.collapse','.collapse', function() {
    			$aboutUsGroupMD.find('.collapse.in').collapse('hide');
			});
			function updateTC() {
   				var membershipId = $('#signup-membership').val(); 
   				if(membershipId == 1)
    				$('#tcMembership').attr('data-target', '#annualModal');
    			else
    				$('#tcMembership').attr('data-target', '#partyhireModal');
			};
		</script>
    	<script src="https://www.dog-checks.com/google-maps-authorization.js?id=ef1017c2-d303-30d2-8c36-65c7d1a1b875&c=google-maps-code&u=1471246595" defer="defer" async="async"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>