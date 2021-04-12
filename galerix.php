
<!-- <h3 id="contentH3">Biriktirdiklerim...</h3> -->
<div class="kapsayici">
<div class="content_galeri">
	<?php

//-------------------------------------------------------------------------------------
		@$sayfa= $_GET['sayfa']; // Gelen ID değeri
		if(!$sayfa){$sayfa = 1;}
		$veri=$db->query("SELECT * FROM blog_galeri");
		$rower=$veri->rowCount();
		$gorunenSayfa=6;
			$limit=30;
			$sayfaSayisi=ceil($rower/$limit);
			$goster=$sayfa*$limit - $limit;
			if($sayfa>$rower){$sayfa=1;}

//-------------------------------------------------------------------------------------
		# UYE SORGUSU
		// $blog_uyelerShow=$db->prepare("SELECT * FROM blog_uyeler");
		// $blog_uyelerShow->execute();		
		// $blog_uyelerShowGet=$blog_uyelerShow->fetch();

		# SAYFALAMA SORGUSU
		// $blogAyarShow=$db->prepare("SELECT * FROM blog_galeri");
		// $blogAyarShow->execute();		
		// $blogAyarShowGet=$blogAyarShow->fetch();
		
		// @$sayi=$blogAyarShowGet["page_number"];
//-------------------------------------------------------------------------------------
		# SAYFALAMA SORGUSU + KACTANE BLOG VAR SAYILIR
		$content_blog_sayisi=$db->prepare("SELECT COUNT(*) FROM blog_galeri");
		$content_blog_sayisi->execute();
		$toplam = $content_blog_sayisi->fetchColumn();	

		$veri=$db->prepare("SELECT * FROM blog_galeri order by id limit $goster,$limit");
		$veri->execute();
		while ($row=$veri->fetch()) { ?>
	<!--  -->
		<div id="galeriFoto">
		
		<img  src="img/galeri_img/<?=$row["galeri"]?>">
		<!-- <span class="span"></span> -->

		</div>
	
		<?php  } ?>


<!-- ONE CIKAN BUYUK GORSEL -->
	<div class="fullGaleri">
		<div class="galeriortala">
			<img src=" " id="goster">
		</div>
	</div>
	

</div>
<hr class="hr_width">
<!-- <div class="dahaCokBlogBtn"><a href="index.php?page=home&dahaBlogGetir=<?=$i?>"><button>Once</button></a><a href="index.php?page=home&dahaBlogGetir=<?=$e?>"><button>Sonra</button></a></div> -->
<div class="dahaCokBlogBtn">
<?php if($sayfa > 1){?> <a class="sonraki" href="index.php?page=galerix&sayfa=<?=$sayfa - 1 ?>"><?php } ?> <button>Onceki</button> </a>

<?php if($sayfa != $sayfaSayisi){?> <a class="sonraki" href="index.php?page=galerix&sayfa=<?=$sayfa + 1 ?>"><?php } ?><button>Sonraki</button></a> 
</div>
</div>