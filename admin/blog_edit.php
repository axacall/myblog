<?php 
	require_once("dbBaglantisi.php");
    
	@$id=$_GET["edit"];
    $blogEdit=$db->prepare("SELECT * FROM blog_kategori where id=$id");
    $blogEdit->execute();
    $blogEditGet=$blogEdit->fetch();


    
$kategoriler=$db->prepare("SELECT * FROM kategoriler");
$kategoriler->execute();
 ?>
<h5 style="font-size: 24px; font-weight: 800;">Mevcut Bir Blogu Yeniden Duzenlersin.</h5>
<hr>
		<?php if(@$_GET["blog_edit_error"]=="title_hatasi"){ ?>
		<div class="blog_edit_error">Blog başlığı : 20 karakter den kısa, 38 karakterden uzun olursa tasarım sorunu olabilir.</div>
		<?php } ?>


		<?php if(@$_GET["blog_edit_error"]=="content_hatasi"){ ?>
		<div class="blog_edit_error">Blog içeriği : 500 karakter den kısa, 7000 karakterden uzun olursa tasarım sorunu olabilir.</div>
		<?php } ?>


		<?php if(@$_GET["blog_edit_error"]=="kategori_hatasi"){ ?>
		<div class="blog_edit_error">Kategori Seçmediniz</div>
		<?php } ?>


		<?php if(@$_GET["blog_edit_error"]=="image_hatasi"){ ?>
		<div class="blog_edit_error">Blog Gorseli Seçmediniz</div>
		<?php } ?>


		<?php if(@$_GET["blog_edit_success"]=="blog_add_success"){ ?>
		<div class="blog_edit_success">Blog başarı ile guncellendi</div>
		<?php } ?>

		<form action="blog_edit_islem.php?edit=<?=$id ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
    <label for="simpleinput">Blog başlığı ekle</label>
    <input type="text" name="title" id="simpleinput" class="form-control" value="<?=$blogEditGet["title"] ?>">
</div>

<div class="form-group">
    <label for="example-textarea">Blog içeriği ekle</label>
    <textarea class="form-control" id="example-textarea" name="content" rows="5"><?=$blogEditGet["content"] ?></textarea>
    
                <script>
                        CKEDITOR.replace( 'content' );
                </script>
</div>


<div class="form-group">
    <label for="example-select">Kategori Seç</label>
    <select class="form-control" id="example-select" name="kategori_adi">
<?php while ($kategorilerGet=$kategoriler->fetch(PDO::FETCH_ASSOC)) { ?>

        <option><?= $kategorilerGet["kategori_adi"]." | ".$kategorilerGet["kat_id"]  ?></option>
 
<?php } ?>
    </select>
</div>

<div class="form-group">
    <label for="example-fileinput">Blog gorseli ekle</label>
    <input type="file" id="example-fileinput" class="form-control-file" name="blog_image">
</div>

<button type="submit" class="btn btn-primary" name="blog_editBtn" value="blog_editBtn">Guncelle</button>
<input type="hidden" name="hidden_id" value="<?= $blogEditGet["id"] ?>">
<input type="hidden" name="blogSilEskiResim" value="<?= $blogEditGet["blog_image"] ?>">
</form>
</div>