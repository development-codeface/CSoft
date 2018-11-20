

<!DOCTYPE html>

<html class="no-js" lang="zxx">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">

    <title>C SOFT</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css')}}">
	
	<!-- Bootstrap Select Option css -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-select.min.css')}}">
	
    <!-- Icons -->
    <link href="{{ asset('assets/frontend/css/icons.css')}}" rel="stylesheet">
    
    <!-- Animate -->
    <link href="{{ asset('assets/frontend/css/animate.css')}}" rel="stylesheet">
    
    <!-- Bootsnav -->
    <link href="{{ asset('assets/frontend/css/bootsnav.css')}}" rel="stylesheet">
	
	<!-- Nice Select Option css -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css')}}">
	
	<!-- Aos Css -->
    <link href="{{ asset('assets/frontend/css/aos.css')}}" rel="stylesheet">

	<!-- Slick Slider -->
    <link href="{{ asset('assets/frontend/css/slick.css')}}" rel="stylesheet">	
    
    <!-- Custom style -->
    <link href="{{ asset('assets/frontend/css/style.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/responsiveness.css')}}" rel="stylesheet">
	
	<!-- Custom Color -->
    <link href="{{ asset('assets/frontend/css/default.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('assets/frontend/web-fonts-with-css/css/fontawesome-all.min.css')}}">
	

    
	</head>
	
	<body>
		
		<!-- ======================= Start Navigation ===================== -->
		<nav class="navbar navbar-default navbar-mobile navbar-fixed white no-background bootsnav">
			<div class="container">
			
				<!-- Start Logo Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fab fa-500px"></i>
					</button>
					<a class="navbar-brand" href="index.html">
						<img src="{{ asset('assets/frontend/img/logo-wh.png')}}" class="logo logo-display" alt="">
						<img src="{{ asset('assets/frontend/img/logo-bl.png')}}" class="logo logo-scrolled" alt="">
					</a>

				</div>
				<!-- End Logo Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
				
					<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
					
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Home</a></li>
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Explore  &nbsp;<i class="fas fa-angle-down"></i></a>
							<ul class="dropdown-menu animated fadeOutUp">
								<li><a href="">Search Listing</a></li>
								<li><a href="">Add Listing</a></li>
								<li><a href="">Listing Detail</a></li>
								
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact</a></li>
						<li class="dropdown"><a href="{{ URL::route('SignIn') }}" class="dropdown-toggle" data-toggle="dropdown">Sign In</a></li>
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="br-right"><a href="javascript:void(0)"  data-toggle="modal" data-target="#signin"><i class="far fa-user"></i> &nbsp;Add Listing</a></li>
						
					</ul>
						
				</div>
				<!-- /.navbar-collapse -->
			</div>   
		</nav>
		<!-- ======================= End Navigation ===================== -->
		
		<!-- ======================= Start Banner ===================== -->
		<div class="main-banner" style="background-image:url(assets/frontend/img/1.jpg);">
			<div class="container">
				<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
				
					<div class="caption text-center cl-white">
						<h2>Consectetur Adipiscing Elit.</h2>
						<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam</p>
					</div>
					
					<form>
						<fieldset class="home-form-1">
						
							<div class="col-md-4 col-sm-4 padd-0">
							<i class="far fa-edit icopos"></i>
								<input type="text" class="form-control br-1 br1" placeholder="Keywords..">
							</div>
								
							<div class="col-md-3 col-sm-3 padd-0">
							<i class="fas fa-map-marker-alt icopos"></i>
								<select class="wide form-control br-1" style="display: none;">
									<option data-display="Location">All Country</option>
									<option value="1">Allahabad</option>
									<option value="2">India</option>
									<option value="3" disabled="">Australia</option>
									<option value="4">United State</option>
								</select><div class="nice-select wide form-control br-1" tabindex="0"><span class="current">Location</span><ul class="list"><li data-value="All Country" data-display="Location" class="option selected">All Country</li><li data-value="1" class="option">Allahabad</li><li data-value="2" class="option">India</li><li data-value="3" class="option disabled">Australia</li><li data-value="4" class="option">United State</li></ul></div>
							</div>
								
							<div class="col-md-3 col-sm-3 padd-0">
							<i class="fas fa-braille icopos"></i>
								<select class="wide form-control" style="display: none;">
									<option data-display="Category">Show All</option>
									<option value="1">Food & restaurants </option>
									<option value="2">Shop & Education</option>
									<option value="3" disabled="">Education</option>
									<option value="4">Business</option>
								</select><div class="nice-select wide form-control" tabindex="0"><span class="current">Category</span><ul class="list"><li data-value="Show All" data-display="Category" class="option selected">Show All</li><li data-value="1" class="option">Web Design</li><li data-value="2" class="option">Accountant</li><li data-value="3" class="option disabled">Marketting</li><li data-value="4" class="option">Farmer</li></ul></div>
							</div>
								
							<div class="col-md-2 col-sm-2 padd-0 m-clear">
								<button type="submit" class="btn theme-btn cl-white seub-btn br2">Search</button>
							</div>
								
						</fieldset>
					</form>
					
					
				</div>
			</div>
		</div>
		
		<!-- ======================= End Banner ===================== -->
		
		<!-- ====================== How It Work ================= -->
		<section class="how-it-works">
			<div class="container">
				
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="heading">
							<h2>How It Works?</h2>
							<p>Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam.</p>
						</div>
					</div>
				</div>
				
				<div class="row">
			
					<div class="col-md-4 col-sm-4">
						<div class="work-process serviceBox">
							<div class="service-icon">
                 <i class="fas fa-search"></i>
                </div>
							<h4>Search Listing</h4>
							<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam.</p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="work-process step-2  serviceBox">
								<div class="service-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
							<h4>Choose a business</h4>
							<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam.</p>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-4">
						<div class="work-process step-3 serviceBox">
									<div class="service-icon">
                 <i class="fas fa-glass-martini"></i>
                </div>
							<h4>Enjoy your day</h4>
							<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam.</p>
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
		
		<!-- ================= Category start ========================= -->
		<section class="gray-bg">
			<div class="container">
			
				<div class="row" data-aos="fade-up">
					<div class="col-md-12">
						<div class="heading">
							<h2>Browse By Category</h2>
							<p>Each month, more than 7 million Jobhunt turn to website in their search for work, making over<br>160,000 applications every day.</p>
						</div>
					</div>
				</div>
				
				<div class="row">
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
									<img src="{{ asset('assets/frontend/img/calculator.png')}}">
									
								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4>Accounting & Finance</h4></a>
									<p>122 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
								
								<img src="{{ asset('assets/frontend/img/settings.png')}}">
									
								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4>Automotive Jobs</h4></a>
									<p>155 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
								
								<img src="{{ asset('assets/frontend/img/briefcase.png')}}">

								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4>Business</h4></a>
									<p>300 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
								<img src="{{ asset('assets/frontend/img/open-book.png')}}">
								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4>Education Training</h4></a>
									<p>80 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
									<img src="{{ asset('assets/frontend/img/heart.png')}}">
								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4>Healthcare</h4></a>
									<p>120 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
									<img src="{{ asset('assets/frontend/img/cheers.png')}}">
								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4>Restaurant & Food</h4></a>
									<p>78 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
									<img src="{{ asset('assets/frontend/img/world.png')}}">
								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4>Transportation</h4></a>
									<p>90 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="category-box" data-aos="fade-up">
							<div class="category-desc">
								<div class="category-icon">
									<img src="{{ asset('assets/frontend/img/workstations.png')}}">
								</div>

								<div class="category-detail category-desc-text">
									<a href="browse-job.html" title=""><h4> Telecommunications</h4></a>
									<p>210 Jobs</p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="text-center">
							<a href="#" class="btn theme-btn btn-m">Browse All Category</a>
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
		
		<section>
			<div class="container">
			
				
				<div class="row" data-aos="fade-up">
					<div class="col-md-1"></div>
					<div class="col-md-5 col-sm-5 los" >
					<div class="losimg">
						<img src="{{ asset('assets/frontend/img/gand1-900x600-c-center.jpg')}}'" class="img-responsive">
						<p>aaLorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit</p>
						</div>
						<h2>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore .</h2>
						<button type="button" class="btn theme-btn btn-radius btn-m">
            Get started        </button>
			<h6><a href="">    Customer stories &nbsp;<i class="fas fa-arrow-right"></i></a></h6>
					</div>
					<div class="col-md-5 col-sm-5 los losblu">
					<div class="losimg colwo">
						<img src="{{ asset('assets/frontend/img/3fb2318b-dde2-4601-85f9-2244cd5d26c8.jpg')}}" class="img-responsive">
						<p>aaLorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit</p>
						</div>
						<h2>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam. Ut Enim Ad Minim Veniam. </h2>
						<button type="button" class="btn theme-da btn-radius btn-m">
            
            Sign up as a designer              </button>
			<h6><a href="">       Discover our designers &nbsp;<i class="fas fa-arrow-right"></i></a></h6>
					</div>
					
					<div class="col-md-1"></div>
				</div>

			</div>
		</section>
	<section class="scli">
			<div class="container">
			
				
				<div class="row "data-aos="fade-up">
						<div class="col-md-1"></div>
					<div class="col-md-5">
					
					<img src="{{ asset('assets/frontend/img/1060752.png')}}" class="img-responsive manimg">
					</div>
					<div class="col-md-5 Questions">
					<h3>Questions?</h3>
					<div class="oline"></div>
					<p class="">
                    Our support gurus are here to help you achieve design enlightenment. Check out our <a href="" class="link link--default">FAQs</a>, <a href="" class="link link--default">send us an email</a>, or give us a call.
                </p>
				<ul class="quizx">
				<li><i class="fas fa-phone"></i> &nbsp;123445678</li>
				<li><a href=""><i class="fas fa-users"></i> Free design consultation</a></li>
				</ul>
					</div>
							<div class="col-md-1"></div>
				</div>

			</div>
		</section>
		<!-- ========================= End Pricing Section ============================ -->
		
		<!-- =================== Newsletter ==================== -->
		<section class="newsletter" style="background-image:url(assets/img/trans-bg.png);">
			<div class="container">
				<div class="row justify-content-center" data-aos="fade-up">
			
<div class="col-md-12">
<div class="titile-block">
<h2>Apply for the project</h2>
<p>Add your business infront of millions and earn 3x profits from our tool</p>
</div>
<div class="btn-wrap btn-wrap2 text-center">
<button type="button" class="btn theme-btn btn-radius btn-m">Add your Listing &nbsp;→ </button>

</div>
</div>
</div>
			</div>
		</section>
		<footer class="dark-bg footer">
			<div class="container">
				
				<!-- Row Start -->
				<div class="row">
				<div class="col-md-4 col-sm-4">
				</div>
				<div class="col-md-4 col-sm-4">
						<h4>Our Newsletter</h4>
						<!-- Newsletter -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter Email Address">
							<span class="input-group-btn">
								<button type="button" class="btn subscr"> &nbsp;Subscribe</button>
							</span>
						</div>
						
						
						
					</div>
				</div>
				<div class="row">
				
					<div class="col-md-2 col-sm-2"></div>
					<div class="col-md-8 col-sm-8">
						
						
								
								<ul class="brow">
									<li><a href="#">How it Work</a></li>-
									<li><a href="#">Pricing</a></li>-
									<li><a href="#">Blog</a></li>-
									<li><a href="#">Contact us</a></li>-
									<li><a href="#">Privacy Policy</a></li>-
									<li><a href="#">Terms and conditions</a></li>
									
								</ul>
						
						
					</div>
					<div class="col-md-2 col-sm-2"></div>
					
					
				</div>
				
				<!-- Row Start -->
				<div class="row foline">
					<div class="col-md-6">
						<div class="copyright">
							<p>© Copyright 2018 Job | Powerd By <a href="" title="">Codeface</a></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="f-social-box">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</footer>
	
		<!-- End Sign Up Window -->
		 
		<!-- =================== START JAVASCRIPT ================== -->
		<!-- Jquery js-->
		<script src="{{ asset('assets/frontend/js/jquery.min.js')}}"></script>
		
		<!-- Bootstrap js-->
		<script src="{{ asset('assets/frontend/js/bootstrap.min.js')}}"></script>
		
		<!-- Bootsnav js-->
		<script src="{{ asset('assets/frontend/js/bootsnav.js')}}"></script>
		<script src="{{ asset('assets/frontend/js/viewportchecker.js')}}"></script>
		
		<!-- Slick Slider js-->
		<script src="{{ asset('assets/frontend/js/slick.js')}}"></script>
		
		<!-- wysihtml5 editor js -->
		<script src="{{ asset('assets/frontend/js/wysihtml5-0.3.0.js')}}"></script>
		<script src="{{ asset('assets/frontend/js/bootstrap-wysihtml5.js')}}"></script>
		
		<!-- Aos Js -->
		<script src="{{ asset('assets/frontend/js/aos.js')}}"></script>
		
		<!-- Nice Select -->
		<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>
		
		<!-- Custom Js -->
		<script src="{{ asset('assets/frontend/js/custom.js')}}"></script>
		
		<script>
			AOS.init();
		</script>
    </body>
</html>