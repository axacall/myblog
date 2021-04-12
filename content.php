<div class="content">
	<?php
//-------------------------------------------------------------------------------------
		@$sayfa= $_GET['sayfa']; // Gelen ID değeri
		if(!$sayfa){$sayfa = 1;}
		$veri=$db->query("SELECT * FROM blog_kategori");
		$rower=$veri->rowCount();
		$gorunenSayfa=6;
			$limit=6;
			$sayfaSayisi=ceil($rower/$limit);
			$goster=$sayfa*$limit - $limit;
			if($sayfa>$rower){$sayfa=1;}
//-------------------------------------------------------------------------------------
		// UYE SORGUSU
		$blog_uyelerShow=$db->prepare("SELECT * FROM blog_uyeler");
		$blog_uyelerShow->execute();		
		$blog_uyelerShowGet=$blog_uyelerShow->fetch();
		// BLOG YORUM
		// SAYFALAMA SORGUSU
		$blogAyarShow=$db->prepare("SELECT * FROM blog_ayarlar");
		$blogAyarShow->execute();		
		$blogAyarShowGet=$blogAyarShow->fetch();
		@$sayi=$blogAyarShowGet["page_number"];
//-------------------------------------------------------------------------------------
		// SAYFALAMA SORGUSU + KACTANE BLOG VAR SAYILIR
		$content_blog_sayisi=$db->prepare("SELECT COUNT(*) FROM blog_kategori");
		$content_blog_sayisi->execute();
		$toplam = $content_blog_sayisi->fetchColumn();	
		$veri=$db->prepare("SELECT * FROM blog_kategori order by id DESC limit $goster,$limit");
		$veri->execute();
//-------------------------------------------------------------------------------------
	// BEGEN SORGU GOSTERME
//-----------------------------------
		while ($row=$veri->fetch()) { ?>
<?php
	//NOT : WHILE ICINDE COUNT SORGUSU YAPARAK  YORUMLAR TABLASUNDA OLAN YORUMLARI BLOGLAR TABLOSUNDAKİ ID NUMARALARINA GORE CEKTIK. 
	$blog_id=$row["id"];
    $YORUM_SAY=$db->prepare("SELECT count(*) FROM blog_yorumlar WHERE user_yorum_blog_id=$blog_id");
    $YORUM_SAY->execute();
    $YORUM_SAYrow = $YORUM_SAY->fetch(PDO::FETCH_NUM);
    $YORUM_SAYcount = $YORUM_SAYrow[0];
    //-----------------------------------BEGEN SORGUSU ASAGISI
    $begeniGor=$db->prepare("SELECT * FROM begeniler where user_yorum_blog_id=$blog_id");
	$begeniGor->execute();
	$begeniGorGet=$begeniGor->fetch(PDO::FETCH_ASSOC);
	//-----------------------------------
	$begeniSay=$db->prepare("SELECT count(*) FROM begeniler WHERE user_yorum_blog_id=$blog_id");
    $begeniSay->execute();
    $begeniSayGet = $begeniSay->fetch(PDO::FETCH_NUM);
    $begeniSayGetir = $begeniSayGet[0];



	//-----------------------------------BEGEN SORGUSU ARASI SON
?>

	<div class="bloglar">
		<div class="blogFoto"><a href="index.php?page=blog_detay&blg_id=<?=$row["id"] ?>"><img src="img/content_img/<?=$row["blog_image"] ?>"></a>
		</div>
		<div class="userblogFoto">
			<?php if(empty($blog_uyelerShowGet["user_image"])){ ?>
				<img src="img/user_img/user_df.jpg">
			<?php } else{?>
			<img src="img/user_img/<?=$row["user_image"] ?>">
			<?php } ?>
		</div>
		<span><?=$row["user_name"] ?> | <?=$row["time"] ?> : yayınladı</span>
		<h3><?php echo substr($row["title"],0, 35) ?></h3>
		<p style="margin-bottom: 30px;"><?php echo strip_tags(substr($row["content"],0, 220)) ?>....</p>
		<span class="benioku">
			<a href="index.php?page=blog_detay&blg_id=<?=$row["id"]?> ">BENİ OKU</a>
			<a href="index.php?page=blog_detay&blg_id=<?=$row["id"] ?>#tag"><?=$YORUM_SAYcount ?> <img src="img/icon/yorum.png" alt=""></a>
			<a href="index.php?page=blog_detay&blg_id=<?=$row["id"] ?>#blogOkuNO"> <?=$begeniSayGetir?> <img src="img/icon/begen.png" alt=""></a>
		</span>
		<div class="bos">   </div>
	</div>

<?php } ?>
</div>
<div class="hr_width"><hr></div>
<div class="dahaCokBlogBtn">
<?php if($sayfa > 1){?> <a class="sonraki" href="index.php?page=home&sayfa=<?=$sayfa - 1 ?>"><?php } ?> 
<button>Onceki</button> </a>
<?php if($sayfa != $sayfaSayisi){?> <a class="sonraki" href="index.php?page=home&sayfa=<?=$sayfa + 1 ?>"><?php } ?>
<button>Sonraki</button></a> 
</div>