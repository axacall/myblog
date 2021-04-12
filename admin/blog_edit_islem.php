<?php 
require_once("dbBaglantisi.php");
//-----------------------------------
			function tum_bosluk_sil($veri)
			{
			$veri = str_replace("/s+/","",$veri);
			$veri = str_replace(" ","",$veri);
			$veri = str_replace(" ","",$veri);
			$veri = str_replace(" ","",$veri);
			$veri = str_replace("/s/g","",$veri);
			$veri = str_replace("/s+/g","",$veri);		
			$veri = trim($veri);
			return $veri; 
			};


# BLOG SİL
		if (isset($_GET["delete"])) {
			$old_img=$_GET["old_img"];
			$delete=$_GET["delete"];
			$delete=$db->prepare("DELETE FROM blog_kategori where id=$delete");
			$delete->execute();
			if($delete){
				unlink("../img/content_img/$old_img");
				header("location:index.php?page=blog_duzenle&delete=success");
			}
		}
//-----------------------------------//-----------------------------------
#BLOG UYE SİL
		if (isset($_GET["uyeDelete"])) {
			$uyeDelete=$_GET["uyeDelete"];
			$uyeDelete=$db->prepare("DELETE FROM blog_uyeler where id=$uyeDelete");
			$uyeDelete->execute();
			if($uyeDelete){
				unlink("../img/content_img/$old_img");
				header("location:index.php?page=blog_uyeler&uyeDelete=success");
			}else{
				header("location:index.php?page=blog_uyeler&uyeDelete=error");
			}
		}
//-----------------------------------
# BLOG YORUM SİL
		//-----------------------------------//-----------------------------------
		if (isset($_GET["blog_yorum_list"])) {
			$yorumDelete=$_GET["blog_yorum_list"];
			$yorumDelete=$db->prepare("DELETE FROM blog_yorumlar where id=$yorumDelete");
			$yorumDelete->execute();
			if($yorumDelete){
				header("location:index.php?page=blog_yorum_list&yorumDelete=success");
			}else{
				header("location:index.php?page=blog_yorum_list&yorumDelete=error");
			}
		}
		##-- BLOG YORUM GUNCELLE ----##
		if (isset($_POST["blog_yorum_guncelle"])) {
				$id=$_GET["yorum_id"];
				if (empty($_POST["content"])) {
					header("location:index.php?page=blog_yorum_edit&edit=$id&yorumGuncelle=error");
				}else{
			$blog_yorum_guncelle=$db->prepare("UPDATE blog_yorumlar set yorum=:yorum, onay=:yorum_durum WHERE id=$id");
			$blog_yorum_guncelle->execute(array(
				"yorum" => $_POST["content"],
				"yorum_durum" => $_POST["yorum_durum"]
			));
			header("location:index.php?page=blog_yorum_list&edit=$id&yorumGuncelle=success");
		}}
//-----------------------------------
	if(isset($_POST["blog_editBtn"])){
		$id=$_GET["edit"];
		$hidden_id=$_POST["hidden_id"];
		$blog_image=tum_bosluk_sil($_FILES['blog_image']["name"]);
		$uploads_dir='../img/content_img';
		@$tmp_name=tum_bosluk_sil($_FILES['blog_image'] ["tmp_name"]);
		@$name=tum_bosluk_sil($_FILES['blog_image'] ["name"]);
		$rastgele_ad=rand(1,1000000000);
		$resim_yolu=tum_bosluk_sil($rastgele_ad.$name);
		@move_uploaded_file($tmp_name, "$uploads_dir/$resim_yolu");
		if(strlen($_POST["title"]) < 10 && strlen($_POST["title"]) < 35){
			header("location:index.php?page=blog_edit&edit=$hidden_id&blog_edit_error=title_hatasi");
		}elseif(strip_tags($_POST["content"]) < 500 && strip_tags($_POST["content"]) < 7000){
			header("location:index.php?page=blog_edit&edit=$hidden_id&blog_edit_error=content_hatasi");
		}elseif($_POST["kategori_adi"] == "select"){
			header("location:index.php?page=blog_edit&edit=$hidden_id&blog_edit_error=kategori_hatasi");
		}else{
		if($blog_image){
		$blogEkle=$db->prepare("UPDATE blog_kategori set title=:title, content=:content, kategori_adi=:kategori_adi, blog_image=:blog_image WHERE id=$id");
		$blogEkleGet=$blogEkle->execute(array(
			"title" => $_POST["title"],
			"content" => $_POST["content"],
			"kategori_adi" => $_POST["kategori_adi"],
			"blog_image" => tum_bosluk_sil($resim_yolu)
		));
			# BLOG GUNCELLE ESKI IMAGE SILER
			$eski_image=rtrim($_POST["blogSilEskiResim"]);
			unlink("../img/content_img/$eski_image");
			# BLOG GUNCELLE ESKI IMAGE SILER
			header("location:index.php?page=blog_duzenle&edit=$hidden_id&blog_edit_success=blog_add_success");
	}else{
		$blogEkle=$db->prepare("UPDATE blog_kategori set title=:title, content=:content, kategori_adi=:kategori_adi WHERE id=$id");
		$blogEkleGet=$blogEkle->execute(array(
			"title" => $_POST["title"],
			"content" => $_POST["content"],
			"kategori_adi" => $_POST["kategori_adi"]
			));
		}
		header("location:index.php?page=blog_duzenle&edit=$hidden_id&blog_edit_success=blog_add_success");
		}
		}
//-----------------------------------son
// ------------------------------------------
		# UYELERRIN BILGISINI DUZENLEME ALANI
		//-----------------------------------
		if (isset($_POST["uyeOnay"])) {
			$id=$_POST["uye_id"];
				$blogEkle=$db->prepare("UPDATE blog_uyeler set uyelik_onay=:uyelik_onay WHERE id=$id");
				$blogEkleGet=$blogEkle->execute(array(
				"uyelik_onay" => $_POST["uyelik_onay"]		
			 	));
				header("location:index.php?page=blog_uyeler&uye_edit=$id&uye_success=success");
		}
	if (isset($_POST["blog_uyeler_editBtn"])) {	
	$id=$_POST["uye_id"];
			if(empty($_POST["yeniSifre"]) && empty($_FILES['user_image']["name"])){
				header("location:index.php?page=blog_uyeler_edit&uye_edit=$id&uye_error=error");
			}else{
				if(!empty($_POST["yeniSifre"])){
				$blogEkle=$db->prepare("UPDATE blog_uyeler set sifre=:sifre WHERE id=$id");
				$blogEkleGet=$blogEkle->execute(array(
				"sifre" => md5($_POST["yeniSifre"])	
			 	));
				}
				header("location:index.php?page=blog_uyeler&uye_edit=$id&uye_success=success");
			if(!empty($_FILES['user_image'] ["name"])){
				# ESKI IMAGE SILER - 
				//-----------------------------------
	#NOT : Bazen bir şekilde post ile aldığımız resim adında boşluk olabiliyor. rtrim den geçirmek şart.	 	
				$eski_image=rtrim($_POST["eski_image"]);
				unlink("../img/user_img/$eski_image");
				$uploads_dir='../img/user_img';
				@$tmp_name=tum_bosluk_sil($_FILES['user_image'] ["tmp_name"]);
				@$name=tum_bosluk_sil($_FILES['user_image'] ["name"]);
				$rastgele_ad=rand(1,1000000000);
				$resim_yolu=tum_bosluk_sil($rastgele_ad.$name);
				move_uploaded_file($tmp_name, "$uploads_dir/$resim_yolu");
				// fclose($handle);

				$blogEkle=$db->prepare("UPDATE blog_uyeler set user_image=:user_image WHERE id=$id");
				$blogEkleGet=$blogEkle->execute(array("user_image"=>tum_bosluk_sil($resim_yolu)));	
				header("location:index.php?page=blog_uyeler&uye_edit=$id&uye_success=success");
		}	
	   }
	}
//-----------------------------------

		# RUTBE GUNCELLEME ALANI
		//-----------------------------------
		if (isset($_POST["rutbeguncelle"])) {
			$id=$_POST["uye_id"];
				$blogEkle=$db->prepare("UPDATE blog_uyeler set rutbe=:rutbe WHERE id=$id");
				$blogEkleGet=$blogEkleGet=$blogEkle->execute(array(
				"rutbe" => $_POST["rutbe"]		
			 	));
				header("location:index.php?page=blog_uyeler&uye_edit=$id&uye_success=success");
				if ($_POST["rutbe"]==1 || $blogEkleGet) {
					header("location:logout.php");
				}
		}





	?>