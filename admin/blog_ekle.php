<?php 
require_once("dbBaglantisi.php");
	
	$kategoriler=$db->prepare("SELECT * FROM kategoriler");
	$kategoriler->execute();
	

 ?>
<h5 style="font-size: 24px; font-weight: 800;">Yeni Bir Blog ekle</h5>
<hr>
		<?php if(@$_GET["blog_ekle_error"]=="title_hatasi"){ ?>
		<div class="blog_ekle_error">Blog başlığı : 20 karakter den kısa, 38 karakterden uzun olursa tasarım sorunu olabilir.</div>
		<?php } ?>


		<?php if(@$_GET["blog_ekle_error"]=="content_hatasi"){ ?>
		<div class="blog_ekle_error">Blog içeriği : 500 karakter den kısa, 500 karakterden uzun olursa tasarım sorunu olabilir.</div>
		<?php } ?>


		<?php if(@$_GET["blog_ekle_error"]=="kategori_hatasi"){ ?>
		<div class="blog_ekle_error">Kategori Seçmediniz</div>
		<?php } ?>


		<?php if(@$_GET["blog_ekle_error"]=="image_hatasi"){ ?>
		<div class="blog_ekle_error">Blog Gorseli Seçmediniz</div>
		<?php } ?>


		<?php if(@$_GET["blog_ekle_success"]=="blog_add_success"){ ?>
		<div class="blog_ekle_success">Blog başarı ile eklendi</div>
		<?php } ?>
		<form action="blog_ekle_islem.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
    <label for="simpleinput">Blog başlığı ekle</label>
    <input type="text" name="title" id="simpleinput" class="form-control">
</div>

<div class="form-group">
    <label for="example-textarea">Blog içeriği ekle</label>
    <textarea class="form-control" id="example-textarea" name="content" rows="5"></textarea>
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
<button type="submit" class="btn btn-primary" name="blog_ekleBtn">Submit</button>
<input type="hidden" name="userAktif" value="<?php echo $_SESSION["admin"] ?>">
<input type="hidden" name="userName" value="<?php echo $_SESSION["isim"] ?>">
<input type="hidden" name="userImage" value="<?php echo $_SESSION["user_image"] ?>">
<input type="hidden" name="eski_image" value="<?php echo $kategorilerGet["blog_image"] ?>">
</form>
</div>

