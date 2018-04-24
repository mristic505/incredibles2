<?php ?>
<!DOCTYPE html>
<html>

<head>
<title><?php echo $page_title; ?> | Incredibles 2</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Normalize CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
<!-- User Stylesheet -->
<link rel="stylesheet" type="text/css" href="style.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js></script>
<script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>

<main>
	<header class="header">
		<div class="header__jj-logo-container">
			<a target="_blank" href="http://juicyjuice.com/"><img class="header__jj-logo-img" src="assets/imgs/jj-logo.png"></a>
		</div>
		<section class="header__incredibles-hero-container">
			<picture>
				<source  class="header__incredibles-hero-img" srcset="assets/imgs/LandingPage-Incredibles2-Mobile-June15-min.jpg" media="(max-width: 550px)">
				<img class="header__incredibles-hero-img" src="assets/imgs/incredibles-hero-large.jpg">
			</picture>
			<p class="landing-logo-text">Incredibles 2 &copy; 2018 Disney / Pixar</p>
		</section>
		
	</header>
