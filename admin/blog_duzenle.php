<?php 
require_once("dbBaglantisi.php");
$user=$_SESSION["isim"];
$blogDuzenle=$db->prepare("SELECT * FROM blog_kategori");
$blogDuzenle->execute();

?>

<h5 style="font-size: 24px; font-weight: 800;">Blog Duzenle</h5>
<hr>
<div class="col-lg-12 col-md-12">

<span class="slogan_span"><b>Bu Sayfada </b><i><?php echo $coming_pageildirimi = "| Blog Listeleme - Düzenleme - Silme ve Onaylama İşlemleri Yapılır." ?></i></span>
<?php if(@$_GET["delete"]=="error"){ ?>
<div class="blog_delete_error">Silme işlemi hatası</div>
<?php errorMesaj("Silme işlemi hatası","index.php?page=blog_duzenle") ?>
<?php } ?>


<?php if(@$_GET["delete"]=="success"){ ?>
<?php successMesaj("Silme işlemi başarılı","index.php?page=blog_duzenle") ?>
<?php } ?>

<div class="table-responsive">
<table class="table">
<thead>
    <tr>
        <th>Id</th>
        <th>Başlık</th>
        <th>İcerik</th>
        <th>Kategori adı</th>
        <th>Duzenle</th>
        <th>Sil</th>
    </tr>
</thead>
<tbody>
<?php while ($blogDuzenleGet=$blogDuzenle->fetch()) {?>
            <?php if ($_SESSION["rutbe"]==2){ ?>
                            <?php if (@$blogDuzenleGet["blog_yetki"]==1 || $blogDuzenleGet["blog_yetki"]==2): ?>  
        
 
        <tr class="table">
        <td><?=$blogDuzenleGet["id"]?></td>
        <td><?=$blogDuzenleGet["title"]?></td>
        <td><?= substr($blogDuzenleGet["content"], 0, 35)?></td>
        <!--  -->
        <td><?=$blogDuzenleGet["kategori_adi"]?></td>
        <td>
                <a href="index.php?page=blog_edit&edit=<?=$blogDuzenleGet["id"]?>">
                <button  class="btn btn-primary">Duzenle</button></a>
        </td>
        <td>
            <a  href="blog_edit_islem.php?old_img=<?=$blogDuzenleGet["blog_image"]?>&delete=<?=$blogDuzenleGet["id"]?>">
                <button  style="cursor:no-drop" class="btn btn-danger">Sil</button></a>
        </td>  
        </tr>
                  <?php endif ?>        
             <?php } else{?>

<?php if ($blogDuzenleGet["user_email"]==$_SESSION["admin"]): ?>   

        <tr class="table">
        <td><?=$blogDuzenleGet["id"]?></td>
        <td><?=$blogDuzenleGet["title"]?></td>
        <td><?= substr($blogDuzenleGet["content"], 0, 35)?></td>
        <td><?=$blogDuzenleGet["kategori_adi"]?></td>
        <td>
                <a href="index.php?page=blog_edit&edit=<?=$blogDuzenleGet["id"]?>">
                <button  class="btn btn-primary">Duzenle</button></a>
        </td>
        <td>
            <a  href="blog_edit_islem.php?old_img=<?=$blogDuzenleGet["blog_image"]?>&delete=<?=$blogDuzenleGet["id"]?>">
                <button  style="cursor:no-drop" class="btn btn-danger">Sil</button></a>
        </td>  
        </tr>
<?php endif ?> 

    <?php } ?>        
<?php  } ?>



</tbody>
</table>
</div>
</div>