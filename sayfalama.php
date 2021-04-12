<?php 
require_once("admin/dbBaglantisi.php");
@$sayfa= $_GET['sayfa']; // Gelen ID değeri
if(!$sayfa){$sayfa = 1;}
$veri=$db->query("SELECT * FROM blog_kategori");

$rower=$veri->rowCount();

$gorunenSayfa=6;
	$limit=6;

	$sayfaSayisi=ceil($rower/$limit);

	$goster=$sayfa*$limit - $limit;

if($sayfa>$rower){$sayfa=1;}


$veri=$db->prepare("SELECT * FROM blog_kategori limit $goster,$limit");
$veri->execute();
while ($row=$veri->fetch()) {?>
<br/>
<br/>
		<div><?php echo $row["id"]; ?> : <?php echo $row["title"]; ?></div>
		
<?php } ?>

<br/>



<div class="sonrakiDiv" ><?php if($sayfa != $sayfaSayisi){?> <a class="sonraki" href="sayfalama.php?sayfa=<?=$sayfa + 1 ?>"><?php } ?> Sonraki </a> </div>

<div class="sonrakiDiv" ><?php if($sayfa > 1){?> <a class="sonraki" href="sayfalama.php?sayfa=<?=$sayfa - 1 ?>"><?php } ?> Onceki </a> </div>