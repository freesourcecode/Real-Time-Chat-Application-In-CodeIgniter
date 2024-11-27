<!DOCTYPE html>
<html>
<head>
	<title>Realtime Chat Application CI</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="./assets/css/login/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
	<section id="main">
		<div id="" class="container form_container">
			<div class="row form_row">
				<div class="col-lg-4 bg-white px-3 py-3" id="form_col">
					<form autocomplete="off" id="form_login">
						<h3 class="text-center">Real-Time Chat App</h3>
						
						<div class="alert alert-danger d-none" id="alert"></div>
						<div id="ruler" class="">
							<hr/>
						</div>
						<div class="field_container">
							<div class="form-group">
									<input type="email" name="txt_email" id="email_addr" placeholder="Email" class="form-control">
							</div>
							<div class="form-group mb-0">
								<input type="password" name="txt_pass" placeholder="Password" class="form-control" id="pass1">
							</div>
							<div class="form-group my-0 pt-2 justify-content-end d-flex">
								<div>
									<input type="checkbox" name="toggle_pass" id="chkbox1">
									<label for="chkbox1" class="mr-0">Show Password</label>
								</div>
							</div>
							<div class="form-group">
								<button class="btn btn-block" style="background-color:#4caf50; border-radius:0%;" id="btn_login">
									<span>Login</span>
								</button>
							</div>

							<h6 class="text-center">Don't have an account? <a href="index.php/signup" style="text-decoration:none;">Signup Now</a></h6>

						</div>
						
					</form>
				</div>
			</div>
		</div>
		
	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
	<script src="./assets/js/login/main.js"></script>
</body>
</html>