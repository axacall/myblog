<?php 



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

 //-----------------------------------

  # UYARI FOKSİYONLARIDIR..
      function successMesaj($success,$url){
    echo "<script>
       $(document).ready(function(){
            var myParam = '$success';
            setTimeout(function(){ $('.mesajlar').slideDown('slow'); },300);        
            $('.msj').html(myParam);                       
            setTimeout(function(){ $('.mesajlar').slideUp('slow'); },4000);
            window.history.pushState('','','".$url."');
  });
  </script>";
  }
  function errorMesaj($error,$url){
    echo "<script>
       $(document).ready(function(){
            var myParam = '$error';
            setTimeout(function(){ $('.mesajlarError').slideDown('slow'); },300);        
            $('.msjError').html(myParam);                       
            setTimeout(function(){ $('.mesajlarError').slideUp('slow'); },4000);
            window.history.pushState('','','".$url."');
  });
  </script>";
  }
  
  // --- 1.admi - panel sayfasında kullanıldı
  function panel_url_guncelle($error,$url){
    echo "<script>
       $(document).ready(function(){
            var myParam = '$error';
            setTimeout(function(){ $('.hata').fadeIn('slow'); },1000);        
            $('.hata').html(myParam);                       
            setTimeout(function(){ $('.hata').fadeOut('slow'); },4000);
            window.history.pushState('','','".$url."');
            
  });
  </script>";
  }
 ?>