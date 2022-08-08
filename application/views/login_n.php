

<!DOCTYPE html>
<html lang="en">
	
<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="">
		<meta name="Author" content="">
		<meta name="Keywords" content=""/>

        		<!-- Title -->
		<title> Bentzip - Signin to your account</title>

		<!-- Favicon -->
		<link rel="icon" href="<?php echo asset_url();?>img/logo.PNG" type="image/x-icon"/>

		<!-- Bootstrap css-->
		<link href="<?php echo asset_url();?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css -->
		<link href="<?php echo asset_url();?>css/icons.css" rel="stylesheet">

        <!-- P-scroll bar css remove in final -->
		<link href="<?php echo asset_url();?>plugins/perfect-scrollbar/p-scrollbar.css" rel="stylesheet" />

		<!-- Style css -->
		<link href="<?php echo asset_url();?>css/style.css" rel="stylesheet">

		<!-- Dark-mode css -->
		<link href="<?php echo asset_url();?>css/style-dark.css" rel="stylesheet">

        
		<!---Skinmodes css-->
		<link href="<?php echo asset_url();?>css/skin-modes.css" rel="stylesheet" />

		<!---Switcher css-->
		<link href="<?php echo asset_url();?>switcher/css/switcher.css" rel="stylesheet">
		<link href="<?php echo asset_url();?>switcher/demo.css" rel="stylesheet">

		<link href="<?php echo asset_url();?>css/mystyle.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

	<body class="main-body">


		<!-- Loader -->
		<div id="global-loader">
			<img src="https://codeigniter.spruko.com/valex/ltr/public/assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

        
		<!-- Page -->
		<div class="error-page1  bg-light">
			<div class="page">

				<div class="container-fluid">
					<div class="row no-gutter">
						<!-- The image half -->
						<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
							<div class="row wd-100p mx-auto text-center">
								<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
									<img src="<?php echo asset_url();?>img/logo.PNG" class="sigin-logo my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
								</div>
							</div>
						</div>
						<!-- The content half -->
						<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
							<div class="login d-flex align-items-center py-2">
								<!-- Demo content-->
								<div class="container p-0">
									<div class="row">
										<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
											<div class="card-sigin">
												<div class="mb-5 d-flex"> 
													<h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 right-heading">Bentzip</h1></div>
												<div class="card-sigin">
													<div class="main-signup-header">
														<h2>Welcome back!</h2>
														<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>

														<?php	if (isset($error)){ ?>

															<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><i class="icon fa fa-ban"></i> Error ! <?php echo $error; ?></div>

														<?php }?>

														<form action="<?php echo base_url();?>login?ref=<?php echo @$_GET['ref'];?>" method="post">
															<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
															<div class="form-group">
																<label>Username / Email</label> <input name="email" id="username" class="form-control" placeholder="Enter your email" type="text">
																</div>
															<div class="form-group">
																<label>Password</label> <input name="password" id="password" class="form-control" placeholder="Enter your password" type="password">
															</div><button type="submit" class="btn btn-main-primary btn-block">Sign In</button>
															<!-- <div class="row row-xs">
																<div class="col-sm-6">
																	<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
																</div>
																<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																	<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
																</div>
															</div> -->
														</form>
														<div class="main-signin-footer mt-5">
															<p><a href="#">Forgot password?</a></p>
															<p>You have any problem? <a href="page-signup.html">Contact Support</a></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- End -->
							</div>
						</div><!-- End -->
					</div>
				</div>

			</div>
		</div>
		<!-- End Page -->

	
        		<!-- JQuery min js -->
		<script src="<?php echo asset_url();?>plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js -->
        <script src="<?php echo asset_url();?>plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo asset_url();?>plugins/bootstrap/js/bootstrap.js"></script>

		<!-- Ionicons js -->
		<script src="<?php echo asset_url();?>plugins/ionicons/ionicons.js"></script>

		<!-- P-scroll js Remove in final -->
		<script src="<?php echo asset_url();?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo asset_url();?>plugins/perfect-scrollbar/p-scroll.js"></script>

		<!-- eva-icons js -->
		<script src="<?php echo asset_url();?>js/eva-icons.min.js"></script>

		<!-- Rating js-->
		<script src="<?php echo asset_url();?>plugins/rating/jquery.rating-stars.js"></script>
		<script src="<?php echo asset_url();?>plugins/rating/jquery.barrating.js"></script>

        
		<!-- custom js -->
		<script src="<?php echo asset_url();?>js/custom.js"></script>

    </body>

</html>