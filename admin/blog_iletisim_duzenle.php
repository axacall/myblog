<?php 
	require_once("dbBaglantisi.php");
	@$id=$_GET["edit"];
    $blog_iletisim_edit=$db->prepare("SELECT * FROM blog_iletisim where id=$id");
    $blog_iletisim_edit->execute();
    $blog_iletisim_editGet=$blog_iletisim_edit->fetch();
 ?>
 <h2>Blog iletişim sayfası</h2>
  <hr>
 <div class="mesakOkuMesaj">
    <span style="color:black;font-size: 18px;margin-left: 10px; display: block;">Adı</span>
    <div class="mesajIcerik">
     <?php echo $blog_iletisim_editGet["isim"] ?>
 </div>
</div> <div class="mesakOkuMesaj">
    <span style="color:black;font-size: 18px;margin-left: 10px; display: block;">E-mail</span>
    <div class="mesajIcerik">
     <?php echo $blog_iletisim_editGet["email"] ?>
 </div>
</div> <div class="mesakOkuMesaj">
    <span style="color:black;font-size: 18px;margin-left: 10px; display: block;">İletişim mesajı</span>
    <div class="mesajIcerik">
     <?php echo $blog_iletisim_editGet["mesaj"] ?>
 </div>

</div><a href="islem.php?iletisim_sil=<?=$id?>"><button style="margin-left:20px;width: 880px;" class="btn btn-danger">Sil</button></a>