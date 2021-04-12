<?php 
	require_once("dbBaglantisi.php");
//-----------------------------------
	//-----------------------------------
	if (isset($_POST["sloganGuncelle"])) {	
	$sloganGuncelle=$db->prepare("UPDATE blog_ayarlar set  header_slogan=:header_slogan, header_alt_slogan=:header_alt_slogan WHERE id=1");
	$sloganGuncelle->execute(array(
		"header_slogan"=>$_POST["header_slogan"],
		"header_alt_slogan"=>$_POST["header_alt_slogan"]
	));
	header("location:index.php?page=home&guncelle=success");
	}
	//-----------------------------------
	// ILETISIM SAYFASINDAN GELEN MESAJLARIN SILME ISLEMI.
	if (!empty($_GET["iletisim_sil"])) {
		$id=@$_GET["iletisim_sil"];
		$iletisimSil=$db->prepare("DELETE FROM blog_iletisim where id=$id");
		$iletisimSilGet=$iletisimSil->execute();
		if ($iletisimSilGet) {
			header("location:index.php?page=blog_iletisim_list&delete=success");
		}else{
			header("location:index.php?page=blog_iletisim_list&delete=error");
		}
	}
	// ILETISIM SAYFASINDAN GELEN MESAJLARIN SILME ISLEMI.
	//-----------------------------------
	# COKLU DOSYA EKLEME ISLEMI DROPZONE DEN GELEN RESİMLERİ KLASORE VE DB YE KAYIT.
	if (!empty($_FILES)) {
	$uploads_dir='../img/galeri_img/';
	@$tmp_name=$_FILES['file'] ["tmp_name"];
	@$name=$_FILES['file'] ["name"];
	$rastgele_ad=rand(1,1000000000);
	$resim_yolu=$rastgele_ad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$resim_yolu");
	# DB KAYIT BOLUMU.
	$blogEkle=$db->prepare("INSERT INTO blog_galeri set galeri=:galeri");
		$blogEkle->execute(array(
			"galeri" => $resim_yolu
		));
	}
	//-----------------------------------
	// BLOG ANA SAYFA BAŞLIK GUNCELE BILGILERI
		if (isset($_POST["blog_anasayfa_baslik_btn"])) {
		$blog_anasayfa_baslik=$db->prepare("UPDATE blog_ayarlar set blog_anasayfa_baslik=:blog_anasayfa_baslik WHERE id=1");
			$blog_anasayfa_baslik->execute(array(
			"blog_anasayfa_baslik" => $_POST["blog_anasayfa_baslik"]
		));
		if ($blog_anasayfa_baslik) {
			header("location:index.php?&page=home&guncelle=success");
		}else{
			header("location:index.php?&page=home&guncelle=error");
		}
	}
			//-----------------------------------
			// NLOG ANASAYFA FOOTER İLETİM BİLGİLERİ GUNCELLE
		if (isset($_POST["blog_anasayfa_footer_bilgiler"])) {
			$blog_anasayfa_baslik=$db->prepare("UPDATE blog_ayarlar set telefon=:telefon, email=:email, adres=:adres, copyrigth=:copyrigth WHERE id=1");
			$blog_anasayfa_baslik->execute(array(
			"telefon" => $_POST["telefon"],
			"email" => $_POST["email"],
			"adres" => $_POST["adres"],
			"copyrigth" => $_POST["copyrigth"]
		));
		if ($blog_anasayfa_baslik) {
			header("location:index.php?&page=home&footer=success#footerbil");
		}else{
			header("location:index.php?&page=home&footer=error");
		}
	}
//-----------------------------------
	// ILETISIM SAYFASINDAN GELEN MESAJLARIN SILME ISLEMI.
	if (!empty(@$_GET["deleteResim"])) {
		$id=@$_GET["deleteResim"];
		$imgDel=@$_GET["imgDel"];
		unlink("../img/galeri_img/$imgDel");
		$iletisimSil=$db->prepare("DELETE FROM blog_galeri where id=$id");
		$iletisimSilGet=$iletisimSil->execute();
		if ($iletisimSilGet) {
			header("location:index.php?page=blog_resim_galeri&deleteResim=success");
		}else{
			header("location:index.php?page=blog_resim_galeri&deleteResim=error");
		}
	}
	// ILETISIM SAYFASINDAN GELEN MESAJLARIN SILME ISLEMI.
				//-----------------------------------
			// NLOG ANASAYFA FOOTER İLETİM BİLGİLERİ GUNCELLE
		if (isset($_POST["blog_header_image"])) {
				if (!empty($_FILES)) {
				$uploads_dir='../img/content_img/';
				@$tmp_name=$_FILES['header_image'] ["tmp_name"];
				@$name=$_FILES['header_image'] ["name"];
				$rastgele_ad=rand(1,1000000000);
				$resim_yolu=$rastgele_ad.$name;
				@move_uploaded_file($tmp_name, "$uploads_dir/$resim_yolu");
			$header_imageGuncelle=$db->prepare("UPDATE blog_ayarlar set header_image=:header_image WHERE id=1");
			$header_imageGet=$header_imageGuncelle->execute(array(
			"header_image" => $resim_yolu
			));
			}
			if ($header_imageGet) {
				header("location:index.php?&page=home&header=success#footerbil");
			}else{
				header("location:index.php?&page=home&header=error");
			}
		 }
//-----------------------------------
		 //-- GALERI FOTOGRAFLARINI TOPLU SİLER
		if(isset($_POST["top_sil"])){
		        $images=glob("../img/galeri_img/*.{png,png}",GLOB_BRACE);
				foreach($images as $image){
    			 @unlink($image);
				}
                $temizle=$db->prepare("DELETE FROM blog_galeri");
                $temizleGet=$temizle->execute();
            header("location:index.php?&page=home&header=success#footerbil");
   		 }    
   		 //-- GALERI FOTOGRAFLARINI TOPLU SİLER
 ?>