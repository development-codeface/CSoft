@extends('layouts.frontend')

@section('header')

@endsection

@section('content')
<div class="container">
				<div class="container">
			<div class="col-md-3"></div>
					<div class="col-md-6">
					<div class="log-box">
						<form class="log-form" id="signupform">
						<h1 class="heading--h1">
                    
                        Sign up
                    
                </h1>
				<div class="lie"></div>

							<div class="row">
								
								<div class="col-md-12">
									<div class="form-group">
										<label>Email address</label>
										<input type="email" name="email" class="form-control" placeholder="Your Email..">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" placeholder="********">
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Phone/Mobile No</label>
										<input type="text" class="form-control" name="phone" placeholder="Phone">
									</div>
								</div>
								
							</div>
							<hr class="hrw">
							<div class="form-group">
										
										<label class="containera">I need something designed
  <input type="radio"  name="radio1" value="1">
  <span class="checkmark"></span>
</label>
									</div>
							<div class="form-group">
										
										<label class="containera">I'm a designer
  <input type="radio" name="radio2">
  <span class="checkmark"></span>
</label>
									</div>
							<div class="form-group">
										<span class="custom-checkbox">
											<input type="checkbox" id="44">
											<label for="44"></label> I have read and agree to the <a href="">Terms of Use</a> and  <a href="">Privacy Policy</a>.
										</span>
										
									</div>
									
							<div class="row">
								<div class="col-md-12">
									<div class="form-group text-center">
										 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="type"   value="signUp"/>
										<button type="submit" class="btn theme-btn full-width btn-m">Register </button>
									</div>
									
								</div>
							</div>
							
						</form>
						
						
						
					</div>
					</div>
				</div>
				
			</div>
@endsection

@section('footer')
<script>
        $(document).ready(function() {

            $("#signupform").validate({
                rules: {
                    h: {
                        required:true,
                       
                    },
                },
                errorPlacement: function (error, element) {
                    console.log(element.attr('name'));
                    $(error).insertAfter(element);
                },
                submitHandler: function (form) {
                    var formData = $("#signupform").serialize();
                    
                  
                    $("#messageModalBody").html("Your formhas been successfully submitting...");
                    $('#messageModal').modal('show');
                    $.ajax({
                        type: 'post',
                        url: '{{ URL::route("PostManage") }}',
                        data: formData,
                        success: function(data){
                            $("#messageModalBody").html("Your form has been successfully submited, you are now being redirected ...");
                            $('#messageModal').modal('show');
                            setInterval(function () {
                                window.location.href = '{{ URL::route("SignUp") }}';
                            }, 1500);
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection