<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signin2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Aug 2018 11:33:58 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Apollo</title>
  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/admin/images/favicon.ico')}}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ asset('assets/admin/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ asset('assets/admin/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{ asset('assets/admin/css/app-style.css')}}" rel="stylesheet"/>
  
</head>

<body>
 <!-- Start wrapper-->
 <div id="wrapper">
	   <div class="card-authentication2 mx-auto my-5">
	    <div class="card-group shadow-lg">
	    	<div class="card mb-0">
	    	   <div class="bg-signin2"></div>
	    		<div class="card-img-overlay rounded-left my-5">
                 <h2 class="text-white">Lorem</h2>
                 <h1 class="text-white">Ipsum Dolor</h1>
                 <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
             </div>
	    	</div>

	    	<div class="card mb-0">
	    		<div class="card-body">
	    			<div class="card-content p-3">
					 <div class="card-title text-uppercase text-center pb-3">Sign In</div>
					   <form id="loginForm">
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							   <label for="exampleInputUsername" class="sr-only">Username</label>
								 <input type="text" id="exampleInputUsername" class="form-control" name="email" placeholder="Username">
								 <div class="form-control-position">
									<i class="icon-user"></i>
								</div>
						   </div>
						  </div>
						  <div class="form-group">
						   <div class="position-relative has-icon-left">
							  <label for="exampleInputPassword" class="sr-only">Password</label>
							  <input type="password" id="exampleInputPassword" class="form-control" name="password" placeholder="Password">
							  <div class="form-control-position">
								  <i class="icon-lock"></i>
							  </div>
						   </div>
						  </div>
						  <div class="form-row mr-0 ml-0">
						  <div class="form-group col-6">
							  <div class="demo-checkbox">
				               <input type="checkbox" id="user-checkbox" class="filled-in chk-col-primary" checked="" />
				               <label for="user-checkbox">Remember me</label>
							 </div>
							</div>
							<div class="form-group col-6 text-right">
							 <a href="authentication-reset-password2.html">Reset Password</a>
							</div>
						</div>
                        <input type="hidden" name="type" value="login">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light">Sign In</button>
						
					</form>
				 </div>
				</div>
	    	</div>
	     </div>
	    </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/admin/js/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/admin/js/jquery.validate.min.js') }}" type="text/javascript"> </script>

  <script src="{{ asset('assets/admin/js/bootstrap.min.js')}}"></script>
  <!-- waves effect js -->
  
  <!-- Custom scripts -->

	<script>

$(document).ready(function() {

    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },

        },

        errorPlacement: function(error, element) {

            console.log(element.attr('name'));
            $( error ).insertAfter( element);
        },
        submitHandler: function(form) {

            // do other things for a valid form
            var formData = $("#loginForm").serialize();
            $("#loginModalBody").html("Login successfully submitting...please wait while redirecting!");
            $('#loginModal').modal('show');
            $.ajax({
                type: 'post',
                url: '{{ URL::route("AdminAuthManage") }}',
                data: formData,
                success: function(data){
                    if(data.status == 1){
                        $("#loginModalBody").html("Login Success, you are now being redirected ...");
                        $('#loginModal').modal('show');
                        setInterval(function () {
                            window.location.href = '{{ URL::route('DashBoard') }}';
                        }, 1500);
                    }else{
                        $('#loginModal').modal('hide');
                        $('#error').html('<p style="color: red"><strong>Invalid!</strong> password or email...</p>');
                    }


                }
            });




            return false;
        }
    });

    $("#forgotForm").validate({
        rules: {
            forgot_email: {
                required: true,
            }

        },

        errorPlacement: function(error, element) {

            console.log(element.attr('name'));
            $( error ).insertAfter( element);
        },
        submitHandler: function(form) {
            // do other things for a valid form
            var formData = $("#forgotForm").serialize();
            $('#forgotModal').modal('hide');
            $("#loginModalBody").html("Mail successfully submitting...");
            $('#loginModal').modal('show');
            $.ajax({
                type: 'post',
                url: '{{ URL::route("AdminAuthManage") }}',
                data: formData,
                success: function(data){
                    if(data.status == 1) {
                        $("#loginModalBody").html("Mail successfully submitted, Please Check your mail...");
                        $('#loginModal').modal('show');
                        setInterval(function () {
                            location.reload();
                        }, 1500);

                    }else if(data.status == 2){
                        $('#loginModal').modal('hide');
                        $('#forgotModal').modal('show');
                        $('#forgot_error').html(data.html);
                    }
                }
            });
            return false;
        }
    });
});

</script>
</body>

</html>
