<?php 
require_once("dbBaglantisi.php");
$user=$_SESSION["isim"];
$rutbe=$_SESSION["rutbe"];
$blog_yorum_list=$db->prepare("SELECT * FROM blog_yorumlar");
$blog_yorum_list->execute();
$blog_uyeler=$db->prepare("SELECT * FROM blog_uyeler where rutbe='$rutbe' ");
$blog_uyeler->execute();
$blog_uyelerGet=$blog_uyeler->fetch();
?>

<h5 style="font-size: 24px; font-weight: 800;">Blog Yorumlar</h5>
<hr>
<div class="col-lg-12 col-md-12">

<span class="slogan_span"><b>Bu Sayfada </b><i><?php echo $coming_pageildirimi = "| Blog Listeleme - Düzenleme - Silme İşlemleri Yapılır." ?></i></span>
<?php if(@$_GET["blog_yorum_list"]=="error"){ ?>
<?php errorMesaj("Silme işlemi hatası","index.php?page=blog_yorum_lis") ?>
<?php } ?>


<?php if(@$_GET["blog_yorum_list"]=="success"){ ?>
<?php successMesaj("Silme  işlemi başarılı","index.php?page=blog_yorum_lis") ?>
<?php } ?>
<!-- ------------------------------------------------------------------------------ -->



<?php if(@$_GET["yorumDelete"]=="error"){ ?>
<?php errorMesaj("Silme işlemi hatası","index.php?page=blog_yorum_lis") ?>
<?php } ?>


<?php if(@$_GET["yorumDelete"]=="success"){ ?>
<?php successMesaj("Silme  işlemi başarılı","index.php?page=blog_yorum_lis") ?>
<?php } ?>

<!-- ------------------------------------------------------------------------------ -->

<div class="table-responsive">
<table class="table">
<thead>
<tr>
    <th>id</th>
    <th>Balık</th>
    <th>İcerik</th>
    <th>Durumu</th>
    <th>Duzenle</th>
    <th>Sil</th>
</tr>
</thead>
<tbody>
<?php while ($blogUyelerGet=$blog_yorum_list->fetch()) {?>

    <?php if ($blogUyelerGet["user_name"]==$user || $blog_uyelerGet["rutbe"]==2){ ?> 

    <tr class="table">
    <td><?=$blogUyelerGet["id"]?></td>
    <td><?=$blogUyelerGet["user_name"]?></td>
    <td><?= substr($blogUyelerGet["yorum"], 0, 45)?></td>
    <td style="width: 60px;text-align: center;">
        <?php if ($blogUyelerGet["onay"]==1): ?>
            <span class="yuvarlak_span"><?=$blogUyelerGet["onay"]?></span> 
        <?php endif ?>
        <?php if ($blogUyelerGet["onay"]==0): ?>
            <span class="yuvarlak_span_onay"><?=$blogUyelerGet["onay"]?></span> 
        <?php endif ?>
    </td>

    <td style="width: 60px;text-align: center;" ><a href="index.php?page=blog_yorum_edit&edit=<?=$blogUyelerGet["id"]?>"><button class="btn btn-primary">Duzenle</button></a></td>

    <td style="width: 60px;text-align: center;" ><a href="blog_edit_islem.php?blog_yorum_list=<?=$blogUyelerGet["id"]?>"><button class="btn btn-danger">Sil</button></a></td>                                        
    </tr>
 <?php }?>
<!--ISIME GORE LISTELE -->

<?php  } ?>

</tbody>
</table>
</div>
</div>

