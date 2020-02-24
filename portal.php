<!Doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=content-language content="en-us" />
  <title>RunMUN | Portal</title>
  <link rel="shortcut icon" type="image/x-icon" href="./img/runmunlogo1.png">
  <meta name="author" content="Evan Kim">
  <meta name="keywords" content="RunMUN, MUN, BelMUN, Model United Nations, Debate, Management, Conference, Timer, MUN Program, MUN App, WCMUN, WorldMUN">
  <meta name="description" content="RunMUN is a free Model UN debate management software designed with numerous, customizable features to fit all of your committees, whether it be a General Assembly or Future Crisis Committee." >
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/loading.css"/>
  <link rel="stylesheet" type="text/css" href="./css/loading-btn.css"/>
  <link rel="stylesheet" type='text/css' href='./css/main.css'>
</head>

<body>
	<noscript>You need to enable JavaScript to run this app.</noscript>
	
	<div class='root' style='display:block;'>
		<div class='container'>
			<div class="row header">
				<div class="col">
					<span class="navbar-brand mb-0 h6"><h3>RunMUN</h3></span>	
				</div>
			</div>
			<div id='index'class="row body">
				<div class="col">
					<div class="alert warning border-warning alert-dismissible error-box" id='google-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<form>
						<div class="form-group">
							<label for="email">Email</label>
					    		<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">	
						</div>
					</form>
					<form>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
  						</div>
  					</form>
  					<div class="alert border-warning alert-warning warning alert-dismissible error-box" id='index-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div class="alert border-success alert-success success alert-dismissible error-box" id='index-success-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
  					<div class='row' style='padding-left:15px;padding-right:15px;'>
	  					<div class='col'>
	  						<div id='login' class="btn btn-primary btn-block ld-ext-right">
								Login
								<div class="ld ld-ring ld-spin"></div>
							</div>
	  					</div>
		  				<div class='col'>
	  						<div id='create' class="btn btn-secondary btn-block ld-ext-right">
								Create Account
								<div class="ld ld-ring ld-spin"></div>
							</div>
	  					</div>
	  				</div>
	  				<button id='forgot' type="button" class="btn btn-link">Forgot Password?</button>
				</div>
			</div>
			<div id='admin'class="row body">
				<div class="col">
					<h5 class='text-center' id='user'>User</h5>
					<div class='divide'></div>
					<div class="alert border-warning alert-warning warning alert-dismissible error-box" id='admin-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div class="alert border-success alert-success success alert-dismissible error-box" id='admin-success-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
				
	  				<div id='committee' class="btn btn-primary btn-block ld-ext-right">
						Go To Committee
						<div class="ld ld-ring ld-spin"></div>
					</div>
	  				<div id='crisis' class="btn btn-secondary btn-block ld-ext-right">
						Go To Crisis
						<div class="ld ld-ring ld-spin"></div>
					</div>
	  				
	  				<div class='divide'></div>
	  				
					<div id='logOut' class="btn border-danger btn-block ld-ext-right">
						Log Out
						<div class="ld ld-ring ld-spin"></div>
					</div>
				</div>
			</div>
			<div id='reset'class="row body">
				<div class="col">
					<form>
						<div class="form-group">
							<label for="email"></label>
							<input type="email" style='margin-bottom:1em;' class="form-control" id="emailReset" aria-describedby="emailHelp" placeholder="Enter email">
						</div>
					</form>
					<div class="alert border-warning alert-warning warning alert-dismissible error-box" id='reset-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div class='row' style='padding-left:15px;padding-right:15px;margin-bottom:1em;'>
	  					<div class='col'>
	  						<div id='resetPwd' class="btn btn-primary btn-block ld-ext-right">
								Reset Password
								<div class="ld ld-ring ld-spin"></div>
							</div>
	  					</div>
	  					<div class='col'>
	  						<div id='cancel' class="btn btn-secondary btn-block ld-ext-right">
								Cancel
								<div class="ld ld-ring ld-spin"></div>
							</div>
	  					</div>
	  				</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous" </script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
	
  	<script src="./js/portal.js"></script>
</body>
</html>