<?php require_once("dbBaglantisi.php");
session_start();
if (!$_SESSION["admin"] || !$_SESSION["onay"]==1) {
  header("location:panel.php?hata=Uyeliğiniz Aktif Edilmedi..!!!");
}

/*    
    $userBilgisiAl=$db->prepare("SELECT * FROM blog_uyeler WHERE isim=$isim");
    $userBilgisiAl->execute();
    $userAktif=$userBilgisiAl->fetch(PDO::FETCH_ASSOC);*/


  function javaRefresh_2_saniye(){ // SAYFA YENILEME FONKSIYONUDUR. -->
    echo "<script type='text/javascript'>
    setTimeout(function(){
    window.location.assign('index.php?&page=home')
    }, 2000)
    </script>";
    return;
  }

  function javaRefresh_2_referrer(){ // SAYFA YENILEME FONKSIYONUDUR. -->
    echo "<script type='text/javascript'>
    var gelinenAdres=document.referrer;
    setTimeout(gelinenAdres, 2000)
    </script>";
    return;
  }

 

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
      <link rel="stylesheet" type="text/css" href="dropzone.css">
      <script src="dropzone.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Blog</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="radio.css">
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>

<!--  -->
<script>
   
    // $(function () {
        // setTimeout(function(){ $(".success").hide(); }, 3000);
  //       $("button").click(function(){
  //         var myParam = location.search.split('deleteResim=')[1];
  //         setTimeout(function(){ $(".mesajlar").show(); }, 10);
  //         $('.msj').html(myParam);
  //         $(".msj").val(".success");
  //         setTimeout(function(){ $(".mesajlar").hide(); }, 10000);
  //       })
        
  //       alert(myParam);
  // });
</script>

<!--  -->
 </head>
<body>

<!-- ISLEM MESAJ SISTEMI. -->
  <?php 
    function successMesaj($success,$url){
    echo "<script>
       $(document).ready(function(){
            var myParam = '$success';
            setTimeout(function(){ $('.mesajlar').fadeIn('slide:right'); },300);        
            $('.msj').html(myParam);                       
            setTimeout(function(){ $('.mesajlar').fadeOut('slide:left'); },3000);
            window.history.pushState('','','".$url."');
  });
  </script>";
  }
  function errorMesaj($error,$url){
    echo "<script>
       $(document).ready(function(){
            var myParam = '$error';
            setTimeout(function(){ $('.mesajlarError').fadeIn('slide:right'); },300);        
            $('.msjError').html(myParam);                       
            setTimeout(function(){ $('.mesajlarError').fadeOut('slide:left'); },3000);
            window.history.pushState('','','".$url."');
  });
  </script>";
  }
   ?>
   <!-- ISLEM MESAJ SISTEMI. -->