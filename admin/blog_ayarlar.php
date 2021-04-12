<!-- YEKTI SORGULAMA ALNI -->
<?php if ($_SESSION["rutbe"]!=2): ?>
	Kısıtlı bir alana girmeye çalışıyorsunuz.
	<?php exit; ?>
<?php endif ?>
    <?php if(@$_GET["yetki"]=="error"){ ?>
    <div class="blog_delete_error">Bu alan size kısıtlandı.</div>
    <?php } ?>


<!-- YEKTI SORGULAMA ALNI -->

<?php 

	$checkboxRutbegET=$db->prepare("SELECT * FROM blog_ayarlar where id=1");
	$checkboxRutbegET->execute();
	$checkboxRutbeCek=$checkboxRutbegET->fetch(PDO::FETCH_ASSOC);


  
 
	if (isset($_POST["blog_durum"])) {
    	$checkboxRutbe=$db->prepare("UPDATE blog_ayarlar set blog_durum=:blogDurum where id=1");
    	$checkboxRutbe->execute(array(
        "blogDurum"=>@$_POST["blogDurum"]

    	)); 
    }
  if (isset($_POST["uyelik_durum"])) {
      $checkboxRutbe=$db->prepare("UPDATE blog_ayarlar set uyelik_durum=:uyelikDurum where id=1");
      $checkboxRutbe->execute(array(
        "uyelikDurum"=>@$_POST["uyelikDurum"]

      ));
	   // header("index.php?page=blog_ayarlar");
}  if (isset($_POST["iletisim_durum"])) {
      $checkboxRutbe=$db->prepare("UPDATE blog_ayarlar set iletisim_durum=:iletisimDurum where id=1");
      $checkboxRutbe->execute(array(
        "iletisimDurum"=>@$_POST["iletisimDurum"]

      ));
     // header("index.php?page=blog_ayarlar");
      javaRefresh_2_referrer();
}
 ?>
<!-- ----------------------------------------------------------------------------------------------------- -->
  <div class="rutbeFormu">

    <strong style="display: block;"><?php echo "DB DE OLAN DEGER : ".@$checkboxRutbeCek["blog_durum"]; ?></strong>
    <form action="index.php?page=blog_ayarlar" method="post">
          <!-- Rounded switch -->
        <label class="switch">
          <input type="checkbox"<?=@$checkboxRutbeCek["blog_durum"]==1 ? "checked" : "" ?> name="blogDurum" value="1">
          <span class="slider round"></span>
        </label>
         <button style="border-radius: 25px;margin-top:-7px;outline: none;" class="btn btn-danger" name="blog_durum">Guncelle</button>
    </form>
    <label for="">Siteyi Bakıma alır. Anasayfada  <strong>404 | GUNCELLENİYORUZ.</strong> yazar</label>
</div>
<!-- -------------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------------------------------------------------- -->
  <div class="rutbeFormu">
    <strong style="display: block;"><?php echo "DB DE OLAN DEGER : ".@$checkboxRutbeCek["uyelik_durum"]; ?></strong>
        
    <form action="index.php?page=blog_ayarlar" method="post">
          <!-- Rounded switch -->
        <label class="switch">
          <input type="checkbox"<?=@$checkboxRutbeCek["uyelik_durum"]==1 ? "checked" : "" ?> name="uyelikDurum" value="1">
          <span class="slider round"></span>
        </label>
         <button style="border-radius: 25px;margin-top:-7px;outline: none;" class="btn btn-danger" name="uyelik_durum">Guncelle</button>
    </form>
        <label for="">Uyelik  formunu  kapatır. blogdetay sayfasında</label>
</div>
<!-- -------------------------------------------------------------------------------------------------------- --><!-- ----------------------------------------------------------------------------------------------------- -->
  <div class="rutbeFormu">
    <strong style="display: block;"><?php echo "DB DE OLAN DEGER : ".@$checkboxRutbeCek["iletisim_durum"]; ?></strong>
        
    <form action="index.php?page=blog_ayarlar" method="post">
          <!-- Rounded switch -->
        <label class="switch">
          <input type="checkbox"<?=@$checkboxRutbeCek["iletisim_durum"]==1 ? "checked" : "" ?> name="iletisimDurum" value="1">
          <span class="slider round"></span>
        </label>
         <button style="border-radius: 25px;margin-top:-7px;outline: none;" class="btn btn-danger" name="iletisim_durum">Guncelle</button>
    </form>
        <label for="">iletişim sayfası mesaj formunu kapatır.</label>
</div>
<!-- -------------------------------------------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------------------------------------------------- -->
  
<!-- -------------------------------------------------------------------------------------------------------- -->

