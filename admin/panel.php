<?php session_start() ?>
<?php require_once("dbBaglantisi.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giri_kontroller</title>
	<link rel="stylesheet" href="login.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<?php 
		if(isset($_POST["login"])){ # SIFRE PANELINDEN GELIYORMU SORGUSU
	@$user_email=$_POST["user_name"];
	@$user_sifre=md5($_POST["user_sifre"]);
	// @$user_sifre=$_POST["user_sifre"];

	$loginOl=$db->prepare("SELECT * FROM blog_uyeler WHERE email=:user_email");
	$loginOl->execute(array("user_email" => $user_email));
	$loginOlGet=$loginOl->fetch();



	# ŞIFRE VE KULLANICI ADI VARSA SORGUSU
	if ($loginOlGet["email"]==$user_email && $loginOlGet["sifre"]==$user_sifre) {
		
		$_SESSION["admin"]=$loginOlGet["email"];
		$_SESSION["isim"]=$loginOlGet["isim"];
		$_SESSION["yetki"]=$loginOlGet["yetki"];
		$_SESSION["rutbe"]=$loginOlGet["rutbe"];
		$_SESSION["onay"]=$loginOlGet["uyelik_onay"];
		$_SESSION["user_image"]=$loginOlGet["user_image"];

		header("location:index.php");
		
	}else{
		header("location:panel.php?hata=Giriş_Başarısız");
	}
}

	 ?>
<?php require_once("login.php")?>

	
</body>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</html>