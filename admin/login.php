<?php require_once("fonksiyonlar.php") ?>
<div class="login-page">
  <div class="form">
   <?php if (@$_GET["hata"]=="Giriş_Başarısız"): ?>
    <span class="hata" ></span>
<?php echo panel_url_guncelle("Onayı bekleyiniz.","panel.php") ?>
   <?php endif ?>
    <form class="register-form">
      <input type="text" placeholder="Adınız"/>
      <input type="password" placeholder="Şifreniz"/>
      <input type="text" placeholder="email adres"/>
      <button>Uyelik</button>
      <p class="message"><a href="#">Giriş Yap</a></p>
    </form>

    <form action="panel.php" method="post" class="login-form">
      <input type="text" name="user_name" placeholder="Kullanıcı Adı"/>
      <input type="password" name="user_sifre" placeholder="Şifre"/>
      <button name="login">Giriş</button>
      <p class="message"><a href="#">Yeni Üyelik Oluştur</a></p>
    </form>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>