<?php 
require_once('admin/dbBaglantisi.php');
  session_start();
  ob_start();
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Blog</title>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="js/jquery-3.5.1.min.js"></script>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
	</style>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/blog.css">
	<link rel="stylesheet" href="login/css/style.css">

	<?php 
	require_once("fonksiyonlar.php");

//-----------------------------------
 //-----------------------------------
// LOGİN  LOGİN LOGİN LOGİN LOGİN
//-----------------------------------
if (isset($_POST["guestName"])) {
	@$user_email=$_POST["isim"];
	@$user_sifre=md5($_POST["password"]);
	$loginOl=$db->prepare("SELECT * FROM blog_uyeler WHERE email=:user_email");
	$loginOl->execute(array("user_email" => $user_email));
	$loginOlGet=$loginOl->fetch();
	
	# ŞIFRE VE KULLANICI ADI VARSA SORGUSU
if (@$loginOlGet["email"]==@$user_email && @$loginOlGet["sifre"]==@$user_sifre && @$loginOlGet["uyelik_onay"]==1) {
		@$_SESSION["admin"]=$loginOlGet["email"];
		@$_SESSION["isim"]=$loginOlGet["isim"];
		@$_SESSION["yetki"]=$loginOlGet["yetki"];
		@$_SESSION["rutbe"]=$loginOlGet["rutbe"];
		@$_SESSION["onay"]=$loginOlGet["uyelik_onay"];
		@$_SESSION["user_image"]=$loginOlGet["user_image"];

		
		header("location:index.php?page=home");
	}
}

//-----------------------------------
 #--- ilk kayıt lazım oldu.
		$query = $db->query("SELECT MAX(id) FROM blog_kategori"); // execute
		$max_id = $query->fetch(); // fetch
		$max_id[0];
		#--- ilk
 ?><!-- genel database baglantısıdır -->

<!-- Preloader -->
<!-- 	<div id="preloader">
    <div id="status">&nbsp;</div> -->
	</div>
   <!-- Preloader -->
	<script type="text/javascript">
    //<![CDATA[
        // $(window).load(function() { // makes sure the whole site is loaded
        //     $('#status').fadeOut(); // will first fade out the loading animation
        //     $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        //     $('body').delay(350).css({'overflow':'visible'});
        // })
    //]]>
</script>

<!-- GALERİ JQUERY KODU -->
	<script>
		$(function(){			
			$("#galeriFoto img").click(function(){
				var src=$(this).attr("src");
				$("#goster").attr("src",src);
				$(".fullGaleri").fadeIn("show");
			}),
			$(".fullGaleri").click(function(){
				$(".fullGaleri").fadeOut("slow");
			});
		});
	</script>
<!-- GALERİ JQUERY KODU SONU-->
	<script>
		$(function(){
			$(".menu").stop().click(function(){
				$(".navigation").toggle("slow");
			}),
			$(".kapat").stop().click(function(){
				$(".navigation").toggle(500);
			});
		});
	</script>
	<!-- errorlara tıklayınca gizlensin -->
	<script>
		$(function(){
			$(".error_yorum").stop().click(function(){
				$(".error_yorum").fadeOut("slow");
			});
			$(".success_yorum").stop().click(function(){
				$(".success_yorum").fadeOut("slow");
			});
		});
	</script>
	<!-- GALERİ JQUERY KODU SONU-->
	<script>
		$(function(){
			$(".login").stop().click(function(){
				$(".guestLogin").fadeIn("slow");
			}),
			$("button").stop().click(function(){
				$(".guestLogin").fadeOut(50);
			});
		});
	</script>	<!-- GALERİ JQUERY KODU SONU-->

	<script>
		$(function(){
			$("#footerMenuButon").stop().click(function(){
				$(".footerMenu").toggle("show");
			})
		});
	</script>


	<!-- SAYFA BASI BUTONU KODU -->
	<script>
jQuery(document).ready(function() {
  
   var btn = $('#button');

   $(window).scroll(function() {
     if ($(window).scrollTop() > 500) {
       btn.addClass('show');
     } else {
       btn.removeClass('show');
     }
   });

   btn.on('click', function(e) {
     e.preventDefault();
     $('html, body').animate({scrollTop:0}, '500');
   });

 });
	</script>
		<!-- SAYFA BASI BUTONU KODU -->
<!--  -->
<!-- <script language="javascript" src="http://ir.sitekodlari.com/yukaricik13.js"></script> -->
<!--  -->
	 <style>
/* Preloader */
#preloader {
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:black; /* sayfa yüklenirken gösterilen arkaplan rengimiz */
    z-index:99; /* efektin arkada kalmadığından emin oluyoruz */
}
#status {
    width:100px;
    height:100px;
    position:absolute;
    left:50%;
    top:50%;
    background-size: 80px;
    background-image:url(img/icon/loader.gif); /* burası yazının ilk başında bahsettiğimiz animasyonu çağırır */
    background-repeat:no-repeat;
    background-position:center;
    margin:-100px 0 0 -100px;
}

    </style>
<?php 
	$headerSlogan=$db->prepare("SELECT * FROM blog_ayarlar");
	$headerSlogan->execute();
	$headerSloganGet=$headerSlogan->fetch();
 ?>



</head>
<body>	
	
	<div class="navigation">
	<div class="guestLogin">
		
		<form action="index.php" method="post">
			<input type="name" name="isim" placeholder="E-mail">
			<input type="password" name="password" placeholder="Password">
			<button class="btn btn-danger" name="guestName">Giriş</button>
		</form>
	</div>
		<div class="kapat"><span>X</span></div>
		<!-- giris -->
		<ul>
			<li><a href="index.php?page=home">ANASAYFA</a></li>
			<li><a href="index.php?page=galerix">GALERI</a></li>
			<li><a href="index.php?page=blog_detay&blg_id=<?=$max_id[0] ?>">BLOG DETAY</a></li>
			<li><a href="index.php?page=iletisim">ILETISIM</a></li>
			<?php if (@!$_SESSION["isim"]): ?>
				<li><a class="login" href="#">LOGIN</a></li>
			<?php endif ?>
			
		</ul>
		<div class="headeLogo"><img src="img/icon/yildiz.png"></div>
	</div>
	<div class="headerKapsayici">
	<div class="header"><img src="img/content_img/<?php echo $headerSloganGet["header_image"] ?>"/>
<div class="slogan2"><h6><?php echo $headerSloganGet["header_alt_slogan"] ?></h6></div>		
<span class="slogan"><?php echo $headerSloganGet["header_slogan"] ?></span>
	</div>
	</div>
	<div class="menu"><img src="img/icon/menu.png"></div>
	<?php if (@$_GET["page"]!="blog_detay"){ ?>
	<div class="user_foto_home_page">
				<a href="#footeraGit"><img src="img/icon/yildiz.png"></a>

</div><?php } ?>
	<!-- <div class="headeLogo"><img src="img/icon/yildiz.png"></div> -->
	<div class="page_loading"></div>
	<p></p><?php if (@$_GET["page"]!="blog_detay"){ ?>
	<div class="giris"><h3 id="contentH3"><?php echo $headerSloganGet["blog_anasayfa_baslik"] ?>
	<?php if (@$_SESSION["admin"]): ?>
		<span><a href="index.php?logout=logout"><img src="img/icon/logout.ico"></a></span><span><?php echo @$_SESSION["isim"] ?> </span></h3>
	<?php endif ?>
<?php } ?>

</div>
<?php 
if (@$_GET["logout"]=="logout") {
	session_destroy();
	header("location:index.php?page=home");
}

 ?>