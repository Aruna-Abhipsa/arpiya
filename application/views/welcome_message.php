<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon" />	
<title>Arpiya Aircon</title>
<style>
* {
	margin:0px;
	padding:0px;
	box-sizing:border-box;	
}
.body {
	font-family:Verdana, Geneva, sans-serif;	
}
.rnOuter {
    background: hsl(174deg 80% 70%) 10vw;
    overflow: hidden;
    position: relative;
    height: 100vh;
}
.rnInner {
    width: 100%;
    position: absolute;
    background:#75f0e3;
    top: -10%;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    transform-style: preserve-3d;
    transition: transform 6s ease;
    transform-origin: -120% top;
}
.rnUnit {
    width: 10vw;
    height: 120vh;
    background: repeating-linear-gradient(to left, hsl(172deg 80% 50%) 4vw, hsl(199deg 80% 30%) 8vw, hsl(174deg 80% 70%) 10vw);
    background-size: 100% 100%;
    display: inline-block;
    transform-origin: 0 0%;
    transform: rotate(3deg);
    -webkit-animation: rnUnit 2s ease infinite;
            animation: rnUnit 2s ease infinite;
}
    @-webkit-keyframes rnUnit {
    50% {
        transform: rotate(-3deg);
    }
    }
    @keyframes rnUnit {
    50% {
        transform: rotate(-3deg);
    }
    }
    .rnUnit:nth-child(1) {
    -webkit-animation-delay: -0.1s;
            animation-delay: -0.1s;
    }
    .rnUnit:nth-child(2) {
    -webkit-animation-delay: -0.2s;
            animation-delay: -0.2s;
    }
    .rnUnit:nth-child(3) {
    -webkit-animation-delay: -0.3s;
            animation-delay: -0.3s;
    }
    .rnUnit:nth-child(4) {
    -webkit-animation-delay: -0.4s;
            animation-delay: -0.4s;
    }
    .rnUnit:nth-child(5) {
    -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
    }
    .rnUnit:nth-child(6) {
    -webkit-animation-delay: -0.6s;
            animation-delay: -0.6s;
    }
    .rnUnit:nth-child(7) {
    -webkit-animation-delay: -0.7s;
            animation-delay: -0.7s;
    }
    .rnUnit:nth-child(8) {
    -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
    }
    .rnUnit:nth-child(9) {
    -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
    }
    .rnUnit:nth-child(10) {
    -webkit-animation-delay: -1s;
            animation-delay: -1s;
    }
    .aoTable {
    display: table;
    width: 100%;
    height: 100vh;
    text-align: center;
    }
    .aoTableCell {
    color: #fff;
    display: table-cell;
    vertical-align: middle;
    transition: color 3s ease;
    }
    .rnOuter:hover .rnInner {
    transform-origin: -120% top;
    transform: scaleX(0);
    }
    .rnOuter:hover .aoTableCell {
    color: white;
    }

   
	.content-details {
		width:100%;
		float:left;
		padding-top:180px;
		text-align:center;	
	}
	.content-details-box {
		max-width:1100px;
		margin:0 auto;
		width:85%;	
	}
    #container h1 {
        text-align: center;
    }
    #body p {
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 10px 10px;
        color: #C31B02;
    }
    #footer {
        margin-top: 80px;
        margin-bottom: 30px;
    }
    #footer a {	
        text-decoration: none;
    }
    .button {
        font: bold 11px Arial;
        color: #fff;
        background-color: #0033DF;
        padding: 10px 10px;
        border-radius: 5px;
    }
    h1 {
        color: #444;
        background-color: transparent;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }
</style>
</head>
<body>
<div class="rnOuter">       
	<div class="content-details">
        <div class="content-details-box" id='container'>			
			<h1>Welcome to</h1>
			<div id='body'>		
				<h1><img src='<?php echo base_url(); ?>/assets/images/logo.png' /></h1>
				<p>SALES & SERVICES OF AIR CONDITIONING SYSTEM</p>
			</div>
			<div id='footer'>
				<a href='login' class='button'>Go In</a>
			</div>			
        </div>
        <div class='rnInner'>
            <div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            --><div class='rnUnit'></div><!--
            -->
	</div>
</div>
</body>
</html>
