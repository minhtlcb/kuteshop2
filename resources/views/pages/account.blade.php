		@extends('layouts.master')
	@section('content')
	<div id="content">
		<div class="content-page woocommerce">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="title-shop-page">My Account</h2>
						<div class="register-content-box">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-ms-12">
									<div class="check-billing">
										<div class="form-my-account">
											<form action="{{url('login')}}" method="POST" class="block-login">
												<h2 class="title24 title-form-account">Login</h2>

 {{ csrf_field() }}
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-succcess">
                           <b>{{session('thongbao')}}</b>
                        </div>
                        @endif

												<p>
													<label for="username">Username<span class="required">*</span></label>
													<input type="text" name="username" />
												</p>
												<p>
													<label for="password">Password <span class="required">*</span></label>
													<input id="password" type="password" class="form-control" name="password">
													
												</p>
												<p>
													<input type="submit" class="register-button" name="login" value="Login">
												</p>
												<div class="table create-account">
													<div class="text-left">
														<p>
															<input type="checkbox"  id="remember" /> <label for="remember">Remember me</label>
														</p>
													</div>
													<div class="text-right">
														<a href="#" class="color">Lost your password?</a>
													</div>
												</div>
												<h2 class="title18 social-login-title">Or login with</h2>
												<div class="social-login-block table text-center">
													<div class="social-login-btn">
														<a href="#" class="login-fb-link">Facebook</a>
													</div>
													<div class="social-login-btn">
														<a href="#" class="login-goo-link">Google</a>
													</div>
												</div>
											</form>
											<form action="register" method="POST" class="block-register">

												<h2 class="title24 title-form-account">REGISTER</h2>

												 {{ csrf_field() }}
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-succcess">
                           <b>{{session('thongbao')}}</b>
                        </div>
                        @endif

												<p>
													<label for="name">Username <span class="required">*</span></label>
													<input type="text" name="name"  />
												</p>
												<p>
													<label for="password">Email address <span class="required">*</span></label>
													    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
												</p>
												<p>
													<label for="password">Password <span class="required">*</span></label>
													 <input id="password" type="password" class="form-control"  name="password">
												</p>
												<p>
												<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                                   
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
												</p>
												<p>
													<input type="submit" class="register-button" name="register" value="Register">
												</p>
											</form>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-ms-12">
									<div class="check-address">
										<div class="form-my-account check-register text-center">
											<h2 class="title24 title-form-account">Register</h2>
											<p class="desc">Registering for this site allows you to access your order status and history. Just fill in the fields below, and we’ll get a new account set up for you in no time. We will only ask you for information necessary to make the purchase process faster and easier.</p>
											<a href="#" class="shop-button login-to-register" data-login="Login" data-register="Register">Register</a>
										</div>
									</div>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Content Page -->
	</div>
	<!-- End Content -->
	
@endsection