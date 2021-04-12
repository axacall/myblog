

if($sol=fetch($oncekikayit)){ ?>
	<a href="<?= $sol['id'] ?>">sol</a>
<?php } ?>

<?php

<?php 
require_once("admin/dbBaglantisi.php");
@$id= $_GET['id']; // Gelen ID değeri

$veri=$db->prepare("SELECT min(id), max(id) FROM blog_kategori");
$veri->execute();
$row=$veri->fetch();	
if($row[0] >= $id){
	$id+4;
}elseif(end($row) <= $id){

	$id=end($row);
}


$veri=$db->prepare("SELECT * FROM blog_kategori where id=$id");
$veri->execute();
while ($row=$veri->fetch()) {
		echo $row["title"];
}
?>



<?php 
$oncekikayit=$db->prepare("SELECT * FROM blog_kategori where id<$id order by id DESC");
$oncekikayit->execute();
if($row=$oncekikayit->fetch()){ ?>
	<a href="sayfalama.php?id=<?= $row['id'] ?>">  << onceki </a>
<?php } ?>





<?php 
$sonrakikayit=$db->prepare("SELECT * FROM blog_kategori where id>$id order by id ASC");
$sonrakikayit->execute();
if($row=$sonrakikayit->fetch()){ ?>
	<a href="sayfalama.php?id=<?= $row['id'] ?>"> sonraki >> </a>
<?php } ?>






