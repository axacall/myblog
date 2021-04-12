<?php 
	require_once("dbBaglantisi.php");
	@$id=$_GET["edit"];
    $blog_yorum_edit=$db->prepare("SELECT * FROM blog_yorumlar where id=$id");
    $blog_yorum_edit->execute();
    $blog_yorum_editGet=$blog_yorum_edit->fetch();
 ?>
<h5 style="font-size: 24px; font-weight: 800;">Mevcut Bir Blogu Yeniden Duzenlersin.</h5>
<hr>

		<?php if(@$_GET["yorumGuncelle"]=="error"){ ?>
		<div class="blog_uyeler_edit_error">Yorum hatası</div>
		<?php } ?>


		<?php if(@$_GET["yorumGuncelle"]=="success"){ ?>
		<div class="blog_edit_success">User guncellendi</div>
        <?php header("refresh:2;index.php?page=blog_yorum_edit&edit=$id"); ?>
		<?php } ?>

		<form action="blog_edit_islem.php?yorum_id=<?=$id ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
    <label for="simpleinput">Blog başlığı ekle</label>
    <input type="text" name="isim" id="simpleinput" class="form-control" readonly value="<?=$blog_yorum_editGet["user_name"] ?>">
</div>

<div class="form-group">
    <label for="example-textarea">Blog içeriği ekle</label>
    <textarea class="form-control" id="example-textarea" name="content" rows="5"><?=$blog_yorum_editGet["yorum"] ?></textarea>
</div>

<div class="form-group">
    <label for="example-select">Yorumu Onayla</label>
    <select class="form-control" id="example-select" name="yorum_durum" value="<?=$blog_yorum_editGet["onay"] ?>">
        <option <?= $blog_yorum_editGet["onay"]=="1" ? "selected" : "" ?>>1</option>
        <option <?= $blog_yorum_editGet["onay"]=="0" ? "selected" : "" ?>>0</option>
    </select>
</div>

<button type="submit" class="btn btn-primary" name="blog_yorum_guncelle" value="blog_editBtn">Guncelle</button>
<input type="hidden" name="hidden_id" value="<?= $blog_yorum_editGet["id"] ?>">
</form>
</div>