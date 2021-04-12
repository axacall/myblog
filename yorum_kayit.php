<?php 
require_once("admin/dbBaglantisi.php");
ob_start();
$id=@$_POST["yorumYapilanBlog_id"];

#-------------------------------------------------------------------
if(@$_POST["yorumgonder"]){

    if(strlen($_POST["yorum"]) < 3 && strlen($_POST["yorum"]) < 3000){
    	header("location:index.php?page=blog_detay&blg_id=$id&mesaj=error");
    	
    }else{
   	$yorumkayit=$db->prepare("INSERT INTO blog_yorumlar set yorum=:yorum, user_name=:user_name, user_yorum_blog_id=:user_id");
	$yorumkayit->execute(array(
		"yorum" => htmlspecialchars($_POST["yorum"]),
		"user_id" => $_POST["yorumYapilanBlog_id"],
		"user_name" => $_POST["yorumYapilanBlog_adi"]
	));
	header("location:index.php?page=blog_detay&blg_id=$id&mesaj=success");
	}
}





	if(isset($_POST["userKayit"])){
		$email_benzermi=$_POST["email"];

		$deneme=$db->prepare("SELECT * FROM blog_uyeler where email=:email");
		$deneme->execute(array("email" => $email_benzermi));
		$cek=$deneme->fetch();


		if(strlen(@$_POST["email"]) < 3 || strlen(@$_POST["email"]) > 100){
			header("location:index.php?page=blog_detay&blg_id=$id&kayit=email");
		}elseif(strlen(@$_POST["isim"]) < 3 || strlen(@$_POST["isim"]) > 60){
			header("location:index.php?page=blog_detay&blg_id=$id&kayit=isim");
		}elseif (strlen(@$_POST["sifre"]) < 8 || strlen(@$_POST["sifre"]) > 12) {
			header("location:index.php?page=blog_detay&blg_id=$id&kayit=sifre");			
		}elseif($cek["email"] == $_POST["email"]){
			header("location:index.php?page=blog_detay&blg_id=$id&kayit=ayni_email");
		}else{



		$user_kayit=$db->prepare("INSERT INTO blog_uyeler set isim=:isim, email=:email, sifre=:sifre, user_ip=:user_ip");
		$user_kayit->execute(array(
			"isim" => $_POST["isim"],
			"email" => $_POST["email"],
			"sifre" => md5($_POST["sifre"]),
			"user_ip" => $_SERVER["REMOTE_ADDR"]
		));
		header("location:index.php?page=blog_detay&blg_id=$id&kayit=success");
	 	die;
	 }
	}


?>