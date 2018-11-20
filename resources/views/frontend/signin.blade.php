@extends('layouts.frontend')

@section('header')

@endsection

@section('content')
<div class="container">
				<div class="container">
					<div class="col-md-4"></div>
					<div class="col-md-4">
					<div class="log-box">
						<form class="log-form" id="loginform">
						<h1 class="heading--h1">
                    
                       login
                    
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
							<div class="form-group">
										<span class="custom-checkbox">
											<input type="checkbox" id="44">
											<label for="44"></label>Remember me
										</span>
										<a href="#" title="Forget" class="fl-right">Forgot Password?</a>
									</div>
							<div class="row">
								<div class="col-md-12">
								<div class="form-group text-center">
										<button type="button" class="btn theme-btn full-width btn-m">LogIn </button>
									</div>
									
								</div>
							</div>
							<div class="form-group nottext">
										
										<p>Not a member yet? <a href="{{ URL::route('SignUp') }}" title="Forget">Sign up</a></p>
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

            $("#loginform").validate({
                rules: {
                    menu_name: {
                        required:true,
                        // remote: {
                        //     url: '{{ URL::route("Validation") }}',
                        //     type: "post",
                        //     data: {_token:'{{ csrf_token() }}',type:'menu', @if(!empty($menu))menu_id:'{{$menu->menu_id}}'@endif},
                        // }
                    },
                },
                errorPlacement: function (error, element) {
                    console.log(element.attr('name'));
                    $(error).insertAfter(element);
                },
                submitHandler: function (form) {
                    var formData = $("#ajaxForm").serialize();
                    $("#messageModalBody").html("Your formhas been successfully submitting...");
                    $('#messageModal').modal('show');
                    $.ajax({
                        type: 'post',
                        url: '{{ URL::route("postData") }}',
                        data: formData,
                        success: function(data){
                            $("#messageModalBody").html("Your form has been successfully submited, you are now being redirected ...");
                            $('#messageModal').modal('show');
                            setInterval(function () {
                                window.location.href = '{{ URL::route("Menus") }}';
                            }, 1500);
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection