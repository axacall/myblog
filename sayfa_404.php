<?php 
# BU SAYFA SADECE  YONLENDIRME AMAÇLI KULLANIYOR.. KULLANICI BEGEN TIKLADIKTAN SONRA BUTON GUNCELLENSSIN VE DB KAYDINI CEKSİN.
$id=@$_GET["blg_id"];
if ($_GET["blg_id"]) {
		header("location:index.php?page=blog_detay&blg_id=$id");
}
?>
 <div class="hata404">404 | Hay aksi</div>