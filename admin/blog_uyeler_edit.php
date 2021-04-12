<?php 
	require_once("dbBaglantisi.php");

    $uyeid=$_GET["uye_edit"];
    $blog_uyeler_edit=$db->prepare("SELECT * FROM blog_uyeler where id=$uyeid");
    $blog_uyeler_edit->execute();
    $blog_uyeler_editGet=$blog_uyeler_edit->fetch();
 ?>
<h5 style="font-size: 24px; font-weight: 800;">Uye işlemleri.</h5>
<hr>

		<?php if(@$_GET["uye_error"]=="error"){ ?>
		<div class="blog_edit_error">Guncelleme Başarısız</div>
        <?= header("refresh:2;index.php?page=blog_uyeler_edit&uye_edit&uye_edit=$uyeid") ?>
		<?php } ?>


		<?php if(@$_GET["uye_success"]=="success"){ ?>
		<div class="blog_edit_success">Uye onaylandı</div>
        <?= header("refresh:2;index.php?page=blog_uyeler_edit&uye_edit&uye_edit=$uyeid") ?>
		<?php } ?>

		<form action="blog_edit_islem.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="eski_image" value="<?=$blog_uyeler_editGet["user_image"]?> ">
		<div class="form-group">
    <label for="simpleinput">Şifreniz</label>
    <input type="password" name="yeniSifre" id="simpleinput" class="form-control" placeholder="Yeni Şifre Giriniz">
</div>
        <div class="form-group">
    <label for="simpleinput">Bir resim yukleye bilirsiniz. Aksi halde: <small>Sistem profilinize  bir icon ekleyecektir</small></label>
    <input type="file" id="simpleinput" class="form-control" name="user_image" value="<?=$blog_uyeler_editGet["user_image"] ?>">
</div>
        <div class="form-group">
    <label for="simpleinput">Adınız </label>
    <input type="text" id="simpleinput" readonly class="form-control" value="<?=$blog_uyeler_editGet["isim"] ?>">
</div>
        <div class="form-group">
    <label for="simpleinput">Uye e-mail adresiniz... <small>Ayrıca kullanıcı adınız mail adresinizdir.</small></label>
    <input type="text" id="simpleinput" readonly class="form-control" value="<?=$blog_uyeler_editGet["email"] ?>">
</div>
        <div class="form-group">
    <label for="simpleinput">Uye kayıt tarihiniz.</label>
    <input type="text" id="simpleinput" readonly class="form-control" value="<?=$blog_uyeler_editGet["time"] ?>">
</div>


<input type="hidden" name="uye_id" value="<?=$blog_uyeler_editGet["id"] ?> ">
<button type="submit" class="btn btn-primary" name="blog_uyeler_editBtn" value="blog_uyeler_editBtn">Guncelle</button>
</form>
Mevcut kullanıcı img : <?=$blog_uyeler_editGet["user_image"] ?>




<form action="blog_edit_islem.php" method="post">

<div style="border-radius: 10px; margin-top:20px;border:1px solid #DDDDDD;padding: 10px;" class="form-group">
    <label for="example-select">Yeni Bloger Onayla - <small>0 onaylanmamış, 1 onaylanmış</small></label>
    <select class="form-control" <?= $_SESSION["rutbe"]==2 ? "" : "disabled" ?> id="example-select" name="uyelik_onay" value="<?=$blog_uyeler_editGet["uyelik_onay"] ?>">
        <option <?= $blog_uyeler_editGet["uyelik_onay"]=="1" ? "selected" : "" ?>>1</option>
        <option <?= $blog_uyeler_editGet["uyelik_onay"]=="0" ? "selected" : "" ?>>0</option>
    </select>

    <button type="submit" <?= $_SESSION["rutbe"]==2 ? "" : "disabled" ?> style="margin-top: 20px;" class="btn btn-danger" name="uyeOnay">Uye onay</button>
        <input type="hidden" name="uye_id" value="<?=$blog_uyeler_editGet["id"] ?> ">
    
</form>


</div>
<!-- BLOGGER RUTBESİNİ TAM YETKİYE YUKSELTIRSINIZ -- ARTIK DAHA DIKKATLI OLAMANIZ GEREKIR.- SİTE ÇÖKEBİLİR. -->
<form action="blog_edit_islem.php" method="post">

<div style="border-radius: 10px; margin-top:20px;border:1px solid #DDDDDD;padding: 10px;" class="form-group">
    <label for="example-select">Tam yetki ver |  2 Tam yetki demektir. - <small>1 User | 2 Admin</small></label>

    <select class="form-control" <?= $_SESSION["rutbe"]==2 ? "" : "disabled" ?> id="example-select" name="rutbe" value="<?=$blog_uyeler_editGet["rutbe"] ?>">

        <option <?= $blog_uyeler_editGet["rutbe"]=="2" ? "selected" : "" ?>>2</option>
        <option <?= $blog_uyeler_editGet["rutbe"]=="1" ? "selected" : "" ?>>1</option>

    </select>

    <button type="submit" <?= $_SESSION["rutbe"]==2 ? "" : "disabled" ?> style="margin-top: 20px;" class="btn btn-danger" name="rutbeguncelle">Uye onay</button>
        <input type="hidden" name="uye_id" value="<?=$blog_uyeler_editGet["id"] ?> ">
    
</form>
</div>