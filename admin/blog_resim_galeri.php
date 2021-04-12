<?php require_once("dbBaglantisi.php"); ?>
<form action="islem.php" method="post" enctype="multipart/form-data" class="dropzone">
</form>
<!-- DROPZONE COKLU RESIM YUKLEME UYGULAMASIDIR SILME.. -->
<?php 
	$blog_uyeler=$db->prepare("SELECT * FROM blog_galeri");
	$blog_uyeler->execute();

?>
			
			<div class="table-responsive">
			<table class="table">
			<thead>
			    <tr>
			        <th>Id</th>
			        <th>Resim</th>
			        <th></th>
			        <th>Sil</th>
			    </tr>
			</thead>
			<tbody>
				<?php if (@$_GET["deleteResim"]=="error") {?>					
					<?php errorMesaj('Silme işlemi başarısız','index.php?page=blog_resim_galeri'); ?>				
				<?php }?>
				<?php if (@$_GET["deleteResim"]=="success") {?>					
					<?php successMesaj('Silme işlemi başarılı','index.php?page=blog_resim_galeri'); ?>				
				<?php }?>

	<?php while ($blog_uyelerGet=$blog_uyeler->fetch()) {?>
        
        <tr style="padding-top: 20px;" class="table">

        <td style="padding-top: 20px;" ><?=$blog_uyelerGet["id"]?></td>
        <td style="padding-top: 20px;"><img style="width: 70px;" src="../img/galeri_img/<?= $blog_uyelerGet["galeri"] ?>" ></td>
        <td style="width: 70px;"></td>
        <td style="width: 50px;"><a href="islem.php?deleteResim=<?=$blog_uyelerGet["id"]?>&imgDel=<?=$blog_uyelerGet["galeri"]?>"><button class="btn btn-danger" >Sil</button></a></td>
                                 
        </tr> 
   

       
<?php  } ?>


</tbody>
</table>
        <form action="islem.php" method="post">
        	<button class="btn btn-danger" <?=@$_GET["admin"]=="root" ? " " : "disabled" ?> type="submit" name="top_sil" value="<?=$blog_uyelerGet["id"]?>">TUM FOTOGRAFLARI SILER | tarayıcıya &admin=root yaz enter yap buton aktif olur</button>
        </form>
</div>
</div>



