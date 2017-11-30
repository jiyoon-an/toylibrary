&nbsp&nbsp
<!-- Footer - Contact -->
<div id="contact" class="content-section-a" style="padding:0px; background-color:#9999FF">
	<div class="container">
		<div class="row">			
			<div class="col-md-6 col-md-offset-3 text-center wrap_title">
				<h2>Contact Us</h2>
				<p class="lead" style="margin-top:0">You can contact us anytime.</p>
			</div>			
			<div class="col-md-5 col-md-push-1 address">
				<address>
				<h3>Office Location</h3>
				<p class="lead"><a href="https://www.google.com/maps/place/766+Sandringham+Rd,+Sandringham,+Auckland+1041/@-36.9027529,174.727765,17z/data=!4m5!3m4!1s0x6d0d465f32024199:0xb02d38fc4fbc975c!8m2!3d-36.9027529!4d174.7299483?hl=en" target="_blank"><?php echo e($libraryinfo->name); ?><br>
				<?php echo e($libraryinfo->building); ?><?php echo e($libraryinfo->no); ?> <?php echo e($libraryinfo->street); ?>, <?php echo e($libraryinfo->suburb); ?>, <?php echo e($libraryinfo->city->name); ?>, <?php echo e($libraryinfo->country->name); ?> <?php echo e($libraryinfo->post_code); ?></a><br>
				Phone: <?php echo e($libraryinfo->phone); ?><br>
				Email: <?php echo e($libraryinfo->email); ?></p>
				</address>
			</div>
			<div class="col-md-5 col-md-push-1 address">
				<h3>Social</h3>
				<li class="social"> 
					<a href="<?php echo e($libraryinfo->facebook); ?>" target="_blank"><i class="fa fa-facebook-square fa-3x"> </i></a>
					<a href="<?php echo e($libraryinfo->twitter); ?>" target="_blank"><i class="fa  fa-twitter-square fa-3x"> </i> </a> 
					<a href="<?php echo e($libraryinfo->google_plus); ?>" target="_blank"><i class="fa fa-google-plus-square fa-3x"> </i></a>				
				</li>
			</div>
		</div>
		<div class="pull-right">
			<p>© 2016 Toy Library Software by Panda Corporation [<a href="http://jairamirez.co.nf/" target="_blank" style="color:#005c99;">Jai Ramirez</a> & <a href="http://keit.co.nf/" target="_blank" style="color:#005c99;">Keith Peralta</a>]</p>
		</div>
	</div>
</div>
