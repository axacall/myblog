<?php 
$id=@$_GET["blg_id"];

//-----------------------------------BLOG AYARLAR SORGUSU
	$checkboxRutbegET=$db->prepare("SELECT * FROM blog_ayarlar where id=1");
	$checkboxRutbegET->execute();
	$checkboxRutbeCek=$checkboxRutbegET->fetch(PDO::FETCH_ASSOC);
//-----------------------------------BLOG AYARLAR SORGUSU
//----------------------------------
		$uyeler = $db->prepare("SELECT * FROM blog_kategori where id=$id");
		$uyeler->execute();
		$uyelerGet = $uyeler->fetch(); // fetch
		$user_name=$uyelerGet["user_name"];
		//$_SESSION["user_name"]=$user_name;
//-----------------------------------
 		#--- ilk kayıt lazım oldu.
		$query = $db->query("SELECT MAX(id) FROM blog_kategori"); // execute
		$max_id = $query->fetch(); // fetch
		$max_id[0];#ilk kaydı getirir.
		#--- ilk
if(empty($id)){
	$id=1;
}
	$detay=$db->prepare("SELECT * FROM blog_kategori where id=$id");
	$detay->execute();
	$detay_read=$detay->fetch();
 ?>
<!-- BLOG BEGENİ UYGULAMASI DB YE KAYIT YAPILIR + ID + USER_NAME + BLOG_ID -->
	<?php
	if (!empty(@$_GET["begen"])) {
	$begeni=$db->prepare("INSERT INTO begeniler set begeni=:begeni, user_name=:user_name, user_yorum_blog_id=:blog_id");
	$begeni->execute(array(
		"begeni"=>@$_GET["begen"],
		"user_name"=>$_SESSION["isim"],
		"blog_id"=>$id
	));
	header("location:index.php?page=hata&blg_id=$id");
	}
	@$oturum=$_SESSION["isim"];

	$begeniGor=$db->prepare("SELECT * FROM begeniler where user_name='$oturum' and user_yorum_blog_id=$id");
	$begeniGor->execute();
	$begeniGorGet=$begeniGor->fetch(PDO::FETCH_ASSOC);
	//-----------------------------------
	# BEGENIYI SİLER..

	if (isset($_GET["begenme"])) {

		if ($begeniGorGet["begeni"]==1 && $begeniGorGet["user_yorum_blog_id"]==$id) {	
		$begeniGor=$db->prepare("DELETE  FROM begeniler WHERE user_name='$oturum' and user_yorum_blog_id=$id");
		$begeniGor->execute(array());
		}
		header("location:index.php?page=hata&blg_id=$id");
	}
		// $begeniGorGet=$begeniGor->fetch(PDO::FETCH_ASSOC);
	// echo "begen : ".$begeniGorGet["begeni"];
	// echo "blog_id :".$begeniGorGet["user_yorum_blog_id"];
  	?>
<!-- BLOG BEGENİ  SORGU SON-->
<div class="detayContent">

<div class="user_foto">
			<?php if(empty($detay_read["user_image"])){ ?>
				<img src="img/user_img/user_df.jpg">
			<?php } else{?>
				<img src="img/user_img/<?=$detay_read["user_image"] ?>">
			<?php } ?>
</div>
<div id="blogOkuNO"></div>
<div class="blogTarih">User <?=$detay_read["user_name"]; ?> : <?=$detay_read["time"]; ?></div>
<hr class="hr_width">
<div class="blogBaslik"><?=$detay_read["title"]; ?></div>
<div class="blogIcerik"><?=$detay_read["content"]; ?></div>
<div class="blogIcerikgorsel"><img src="img/content_img/<?=$detay_read["blog_image"]?>" ></div>
<div class="blogResim"></div>
<?php 
// echo $begeniGorGet["begeni"];
// echo "<br>";
// echo $begeniGorGet["user_yorum_blog_id"];
// echo "<br>";
// echo $begeniGorGet["user_name"];
// echo "<br>";
// echo $_SESSION["isim"];
// echo "<br>";
?>
<br>

<hr class="hr_width"><br/>
<?php if (@$_SESSION["admin"]): ?>
<div class="begeni" id="like">	

	<?php if ($begeniGorGet["user_name"]!=@$_SESSION["isim"] || $begeniGorGet["begeni"]!=1 || $begeniGorGet["user_yorum_blog_id"]!=$id){ ?>

		<span class="aktifButon"><a href="index.php?page=blog_detay&blg_id=<?=$id ?>&begen=1 ">Beğen</a></span>
	<?php }else{?>
	<span class="pasitButon"><a href="index.php?page=blog_detay&blg_id=<?=$id?>&begenme">Beğenme</a></span>
	<?php if ("index.php?page=blog_detay&blg_id=<?=$id?>&begenme"): ?>
	<?php endif ?>
	<?php } ?>
 </div>
<?php endif ?>

<br/>
<br/>
<br/>
<?php
# YORUM SORGUSU ONAYLANMS YORUM GOSTERILIR.
	$yorum=$db->prepare("SELECT * FROM blog_yorumlar");
	$yorum->execute();
 ?>
 <div id="tag"></div>
<i style="font-size: 24px;">Blog için yapılan yorumlar.</i>

<?php while ($yorum_read=$yorum->fetch()) {?>

<?php if($yorum_read["user_yorum_blog_id"] == $id && $yorum_read["onay"] == 1){?>

<div style="margin-left:<?=rand(40, 100)?>px;" class="blogYorum">

	<div class="user_icon"><img src="img/user_img/yildiz.png" alt=""><i class="yorum_i">User yorum :<?=$yorum_read["user_name"]?> &nbsp;|&nbsp;  <?=$yorum_read["time"]; ?></i></div>
	
	<blockquote style="margin-top: 20px;margin-bottom: 20px;"><?=$yorum_read["yorum"]; ?></blockquote>
</div>
<?php } }?>
<!-- KAYIT OL MENU JQUERY KODU AC & KAPAT OLAYI -->
<script>
	$(function(){
		$("#click").click(function(){
			$("#tab").toggle("slow");
		})
	});
</script>

<div class="yorumForm">
	<div class="blogFormBaslik"><small>Yorumlarınız onay aşamasından geçtikten sonra yayınlanacaktır.</small></div>
	<form action="yorum_kayit.php" method="post">
						<?php if(@$_GET["mesaj"]=="error"){ ?>
						<span class="error_yorum">  Mesajınız gönderilmedi.</span>
						<?php } ?>
						<?php if(@$_GET["mesaj"]=="success"){ ?>
						<span class="success_yorum">  Mesajınız gönderildi.</span>
						<?php } ?>
		<table class="table">
			<tbody>
				<tr>
					<td><textarea name="yorum" <?php if(!@$_SESSION["admin"]){ echo "disabled";} ?>  placeholder="Yorum alanı"></textarea>
<!-- 
                <script>
                        CKEDITOR.replace( 'yorum' );
                </script> -->
					</td>
				</tr>
				<tr>
					<td><button name="yorumgonder"  <?php if(!@$_SESSION["admin"]){ echo "disabled";} ?> value="yorumgonder">Gonder</button></td>
					<input type="hidden" name="yorumYapilanBlog_id" value="<?=$id ?>">
					<input type="hidden" name="yorumYapilanBlog_adi" value="<?=@$_SESSION["isim"]?>">
				</tr>
				<tr>
					<?php if(!$user_name){ ?>
					<td><small>Kayıt olmadan yorum gonderilmez.<i>Kayıt olabilirsiniz.</i> </small></td>
				<?php } ?>
				</tr>
				<tr>
					<td>
						<?php if(@$_GET["kayit"]=="email"){ ?>
						<span class="error_kayit">  email alanında hata.</span>
						<?php } ?>
						<?php if(@$_GET["kayit"]=="ayni_email"){ ?>
						<span class="error_kayit">  Bu e-mail kullanılmaktadır..</span>
						<?php } ?>
						<?php if(@$_GET["kayit"]=="isim"){ ?>
						<span class="error_kayit">  isim alanında hata.</span>
						<?php } ?>
						<?php if(@$_GET["kayit"]=="sifre"){ ?>
						<span class="error_kayit">  Şifre Başarısız. | 8 - 12 karakter olmalı</span>
						<?php } ?>
						<?php if(@$_GET["kayit"]=="success"){ ?>
						<span class="success_kayit">  Tebrikler başarıyla kayıt oldunuz.. ( uyeliğiniz onay beklemektedir )</span>
						<?php } ?>
					</td>
				</tr>
				<?php  if(@!$_SESSION["admin"]){ ?>
				<tr id="click">
					<td><h6>Hızlı Kayıt</h6></td>	
				</tr>
			<?php } ?>
			</tbody>
		</table>
		
			<table class="table" id="tab">
				<tbody>	
				<tr>
					<td><input type="email" name="email" placeholder="E-mail"></td>
				</tr>
				<tr>
					<td><input type="text" name="isim" placeholder="Ad Soyad"></td>
				</tr>
				<tr>
					<td><input type="password" name="sifre" placeholder="Şifreniz"></td>
				</tr>
				<tr>
				<?= @$checkboxRutbeCek["uyelik_durum"] ? "" : "<strong style='margin:10px;color:red;'> Uyelik Durdurulmuştur.</strong>" ;?>
				<td><button <?= @$checkboxRutbeCek["uyelik_durum"] ? "" : "style=cursor:no-drop" ;?> name="userKayit"    <?= @$checkboxRutbeCek["uyelik_durum"] ? "" : "disabled" ;?>  value="userKayit">Kayıt</button></td>
				
				</tr>
			</tbody>
		
		</table>
	</form>	
<!-- 	<div id="git"></div>	 -->		
</div>
</div>