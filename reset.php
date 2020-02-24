<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require './php/db.php';
session_start();
// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
	$email = $mysqli->escape_string($_GET['email']); 
	$hash = $mysqli->escape_string($_GET['hash']); 
	
	// Make sure user email with matching hash exist
	$result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");
	if ( $result->num_rows == 0 )
	{ 
	     $message = "no";
   	}
	else {
	    $message = "yes";
	}
}
?>

<!Doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv=content-language content="en-us" />
  <title>RunMUN | Reset</title>
  <link rel="shortcut icon" type="image/x-icon" href="./img/runmunlogo1.png">
  <meta name="author" content="Evan Kim">
  <meta name="keywords" content="RunMUN, MUN, BelMUN, Model United Nations, Debate, Management, Conference, Timer, MUN Program, MUN App, WCMUN, WorldMUN">
  <meta name="description" content="RunMUN is a free Model UN debate management software designed with numerous, customizable features to fit all of your committees, whether it be a General Assembly or Future Crisis Committee." >
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type='text/css' href='./css/main.css'>
</head>

<body>
	<noscript>You need to enable JavaScript to run this app.</noscript>
	
	<div class='root'>
		<div class='container'>
			<div class="row header">
				<div class="col">
					<span class="navbar-brand mb-0 h6"><h3>RunMUN</h3></span>	
				</div>
			</div>
			<div class="row body">
				<div class="col">
					<form>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
	  					</div>
	  				</form>
	  				<form>
						<div class="form-group">
							<label for="password">Confirm Password</label>
							<input type="password" class="form-control" id="passwordConfirm" placeholder="Confirm Password">
	  					</div>
	  				</form>  
	  				<div class="alert border-warning alert-warning warning alert-dismissible error-box" id='reset-error-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div class="alert border-success alert-success success alert-dismissible error-box" id='reset-success-box'>
						<a class="close" aria-label="close">&times;</a>
						<strong></strong>
						<h6></h6>
					</div>
					<div class='row' style='padding-left:15px;padding-right:15px;'>
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
		<input type="hidden" id='email' value="<?= $email ?>">    
          	<input type="hidden" id='hash' value="<?= $hash ?>">  
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous" </script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
	<script type='text/javascript'>
		var message = "<?php echo $message; ?>";
		if (message == 'no') {
			alert('You have entered invalid URL for password reset!');
			location.replace("https://runmun.app/runmun/portal");
		}
	</script>
  	<script src="./js/reset.js"></script>
</body>
</html>