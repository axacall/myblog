<?php 
require_once("dbBaglantisi.php");


$blog_image=$_FILES['blog_image']["name"];

	if(isset($_POST["blog_ekleBtn"])){

	$uploads_dir='../img/content_img/';
	@$tmp_name=$_FILES['blog_image'] ["tmp_name"];
	@$name=$_FILES['blog_image'] ["name"];
	$rastgele_ad=rand(1,1000000000);
	$resim_yolu=$rastgele_ad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$resim_yolu");


		if(strlen($_POST["title"]) < 10 && strlen($_POST["title"]) < 35){
			header("location:index.php?page=blog_ekle&blog_ekle_error=title_hatasi");
		}elseif(strlen($_POST["content"]) < 500 && strlen($_POST["content"]) < 5000){
			header("location:index.php?page=blog_ekle&blog_ekle_error=content_hatasi");
		}elseif($_POST["kategori_adi"] == "select"){
			header("location:index.php?page=blog_ekle&blog_ekle_error=kategori_hatasi");
		}elseif(empty($blog_image)){
			header("location:index.php?page=blog_ekle&blog_ekle_error=image_hatasi");
		}else{

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





		$blogEkle=$db->prepare("INSERT INTO blog_kategori set title=:title, content=:content, user_name=:userName, user_email=:user_email, kategori_adi=:kategori_adi, blog_image=:blog_image, user_image=:userImage");
		$blogEkle->execute(array(
			"title" => $_POST["title"],
			"content" => $_POST["content"],
			"userName" => $_POST["userName"],
			"user_email" => $_POST["userAktif"],
			"userImage" => $_POST["userImage"],
			"kategori_adi" => $_POST["kategori_adi"],
			"blog_image" => tum_bosluk_sil($resim_yolu)
		));
				header("location:index.php?page=blog_ekle&blog_ekle_success=blog_add_success");
	}
	
	}


	//-----------------------------------//-----------------------------------//-----------------------------------

	#BLOG GUNCELLEME  KODLARI.php
// 				$eski_image=rtrim($_POST["eski_image"]);
// 				unlink("../img/user_img/$eski_image");



// if () {
// 	# code...
// }