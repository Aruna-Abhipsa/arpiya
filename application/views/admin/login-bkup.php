<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Arpiya Aircon</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #D0D0AB;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
	}

	.container{
		width: 100%;
		margin: 40px;
	}

	#header {
		background-color: #fff;
		width: 100%;
		/*margin: 0 15px 0 15px;
		border-bottom: 1px solid #D0D0D0;*/
	}

	.body-container{

	}

	.logo {
		width: 30%;
		float: left;
	}

	.head-text {
		width: 68%;
		float: left;
		color: #E13300;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		/*margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;*/
	}

	#footer {
    	margin-top: 80px;
    	margin-bottom: 30px;
	}

	#footer a {		
		margin-left: 48%;
		text-decoration: none;
	}
	</style>
</head>
<body>

<div class="container">
	<div id="header">
		<div class="logo"><img src="<?php echo base_url().'application/logo.png'; ?>" /></div>
		<div class="head-text">ARPIYA AIRCON - Enterprise Resource Planning</div>
	</div>	

	<div id="body">
		<div class="body-container">
			<form id="loginForm" method="post">
				<label>Email Address</label>
				<input type="text" name="email" id="email" required />
				<label>Password</label>
				<input type="password" name="password" id="password" required />  
				<input type="submit" name="submit" value="Login" />
			</form>
		</div>	
	</div>
</div>

</body>
</html>