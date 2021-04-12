<?php 

	$sloganCek=$db->prepare("SELECT * FROM blog_ayarlar where id=1");
	$sloganCek->execute();
	$sloganCekGet=$sloganCek->fetch();

 // ---------------------------------------------------------------------
  // function javaRefresh_2_saniye(){ // SAYFA YENILEME FONKSIYONUDUR.
  // echo "<script type='text/javascript'>
		// setTimeout(function(){
 	// 	window.location.assign('index.php?&page=home')
		// }, 2000)
		// </script>";
		// return;
  // }

//-----------------------------------


 ?>

<div class="sloganHeader"><h4>Blog header slogan guncelle</h4></div>
<div class="sloganHeaderForm">
	<form action="islem.php" method="post">
		<input type="text" name="header_slogan" value="<?=$sloganCekGet["header_slogan"] ?>" placeholder="Slogan">
		<input type="text" name="header_alt_slogan" value=" <?=$sloganCekGet["header_alt_slogan"] ?> " placeholder="Alt slogan">
		<button class="btn btn-danger" name="sloganGuncelle">Guncelle</button>
	</form>
</div>
<!-- ---------------------------------------------------------- -->

<div class="sloganHeader"><h4>
<?php if (@$_GET["guncelle"]=="success"){?>
	<!-- <span class="success">Guncelleme başarılı oldu</span> -->
<?php successMesaj("Guncelleme başarılı oldu","index.php?page=home"); ?>
<?php }else{ ?>
Blog anasayfa başlık yazısı</h4>
<?php } ?>
</div>
<div class="sloganHeaderForm" id="footerbil">
	<form action="islem.php" method="post">
		<input type="text" name="blog_anasayfa_baslik" value="<?=$sloganCekGet["blog_anasayfa_baslik"] ?>" placeholder="Slogan">
		<button class="btn btn-danger" name="blog_anasayfa_baslik_btn">Guncelle</button>
	</form>
</div>
<!-- ----------------------------------------------------------- -->

<div class="sloganHeader" id="footerbil"><h4>
	Blog anasayfa footer iletişim bilgileri</h4>
</div>
<?php if (@$_GET["footer"]=="success"){?>
	<!-- <span class="success">Guncelleme başarılı oldu</span> -->
	<?php successMesaj("Guncelleme başarılı oldu","index.php?page=home"); ?>
	<?php }?>

<?php if(@$_GET["footer"]=="error"){ ?>
	<span class="error">Guncelleme başarısız oldu</span>
	<?php errorMesaj("Guncelleme başarısız oldu","index.php?page=home"); ?>
<?php }?>
<div class="sloganHeaderForm">
	<form action="islem.php" method="post">
		<input type="text" name="telefon" value="<?=$sloganCekGet["telefon"] ?>" placeholder="Slogan">
		<input type="text" name="email" value="<?=$sloganCekGet["email"] ?>" placeholder="Slogan">
		<input type="text" name="adres" value="<?=$sloganCekGet["adres"] ?>" placeholder="Slogan">
		<input type="text" name="copyrigth" value="<?=$sloganCekGet["copyrigth"] ?>" placeholder="Slogan">
		<button class="btn btn-danger" name="blog_anasayfa_footer_bilgiler">Guncelle</button>
	</form>
</div>
<!-- ----------------------------------------------------------- -->


<div class="sloganHeader" id="footerbil"><h4>
	Blog header gorseli guncelle</h4>
</div>
<?php if (@$_GET["header"]=="error"){?>
	<?php errorMesaj('Güncelle işlemi başarısız','index.php?page=home'); ?>
	<?php }?>

<?php if(@$_GET["header"]=="success"){ ?>
	<?php successMesaj('Güncelle işlemi başarılı','index.php?page=home'); ?>	
<?php }?>
<div class="sloganHeaderForm">
	<form action="islem.php" method="post" enctype="multipart/form-data">
		<input type="file" name="header_image" value="<?=$sloganCekGet["header_image"] ?>" placeholder="Slogan">
		<button class="btn btn-danger" name="blog_header_image">Guncelle</button>
	</form>
</div>
<!-- ----------------------------------------------------------- -->