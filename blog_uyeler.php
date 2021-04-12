<?php 
require_once("admin/dbBaglantisi.php");


if($_POST["userKayit"]){

	$user_kayit=$db->prepare("INSERT INTO blog_uyeler set isim=:isim, email=:email, sifre=:sifre, user_ip=:user_ip");
	$user_kayit->execute(array(
		"isim" => $_POST["isim"],
		"isim" => $_POST["email"],
		"isim" => $_POST["sifre"],
		"isim" => $_SERVER["REMOTE_ADDR"]
	));
}