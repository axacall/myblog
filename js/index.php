<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>js</title>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="script.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="deneme.css">

</head>
<body>
<div id="yukleniyor"><img src="load.gif" alt=""></div>
	<div class="pages">

		<div class="header">
			<div id="logo"><img src="logo.png" alt=""></div>
			<div class="btn">
				<ul>
					<li class="btn1 buton inactive"><a onclick="page('.page1')" href="#">HOME</a></li>
					<li class="btn2 buton inactive"><a onclick="page('.page2')" href="#">GALERI</a></li>
					<li class="btn3 buton inactive"><a onclick="page('.page3')" href="#">CONTACK</a></li>
				</ul>
			</div>
		</div>
<!--  -->
	<div class="icerik">
		<h3>Who We Are</h3>
		<p>We are itmeo — a small team based in Saint Petersburg, Russia. We make stunning products for those who create web.
		</p>

	</div>


	
	
	<div class="page1"><div class="baloncuk"></div><strong>HOME PAGE</strong><span></span><div class="kapat"><img src="shut.png" alt=""></div></div>
	<div class="page2"><div class="baloncuk"></div><strong>GALERI - PAGE</strong><span></span><div class="kapat"><img src="shut.png" alt=""></div></div>
	<div class="page3"><div class="baloncuk"></div><strong>CONTACK - PAGE</strong><span></span><div class="kapat"><img src="shut.png" alt=""></div></div>

	<div class="sosial">
		<ul>
			<li><img src="face.png" alt=""></li>
			<li><img src="instagram.png" alt=""></li>
			<li><img src="pinster.png" alt=""></li>
			<li><img src="twitter.png" alt=""></li>
			<li><img src="google.png" alt=""></li>
		</ul>
	</div>
	<div class="manset">
		<?php require_once("galeri/galeri.php") ?>
	</div>



	</div>

	

</body>
</html>