<?php 
require_once("admin/dbBaglantisi.php");
	if(!isset($_POST["gonder"])){	
		header("location:index.php?page=iletisim&mesaj=error");
	}
			if(strlen($_POST["isim"]) < 3 || strlen($_POST["isim"]) > 50) {
			header("location:index.php?page=iletisim&mesaj=isim");
		}elseif(strlen($_POST["email"]) < 9 || strlen($_POST["email"]) > 50){
			header("location:index.php?page=iletisim&mesaj=email");
		}elseif(strlen($_POST["mesaj"]) < 10 || strlen($_POST["mesaj"]) > 5000){
			header("location:index.php?page=iletisim&mesaj=mesaj");
		}else{
	$iletisim=$db->prepare("INSERT INTO blog_iletisim set isim=:isim, email=:email, mesaj=:mesaj, mesaj_ip=:mesaj_ip");
	$iletisimGet=$iletisim->execute(array(
		"isim" => htmlspecialchars($_POST["isim"]),
		"email" => htmlspecialchars($_POST["email"]),
		"mesaj" => htmlspecialchars($_POST["mesaj"]),
		"mesaj_ip" => $_SERVER["REMOTE_ADDR"]
	));
	if($iletisimGet){
		header("location:index.php?page=iletisim&mesaj=success");
	}else{
		header("location:index.php?page=iletisim&mesaj=error");
	}
}






 ?>