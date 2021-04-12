<?php 
require_once("dbBaglantisi.php");
$user=$_SESSION["isim"];
$blog_iletisim_list=$db->prepare("SELECT * FROM blog_iletisim");
$blog_iletisim_list->execute();
?>

<h5 style="font-size: 24px; font-weight: 800;">Blog iletişim</h5>
<hr>
<div class="col-lg-12 col-md-12">

<span class="slogan_span"><b>Bu Sayfada </b><i><?php echo $coming_pageildirimi = "| Blog mesajları - Düzenleme - Silme İşlemleri Yapılır." ?></i></span>
<?php if(@$_GET["blog_yorum_list"]=="error"){ ?>
<?php errorMesaj("Silme işlemi hatası") ?>
<?php } ?>


<?php if(@$_GET["blog_yorum_list"]=="success"){ ?>
<div class="blog_delete_success"></div>
<?php successMesaj("Silme işlemi başarılı.") ?>
<?php } ?>
<!-- ------------------------------------------------------------------------------ -->

<?php if(@$_GET["delete"]=="error"){ ?>
<?php errorMesaj("Silme işlemi hatası",'index.php?page=blog_iletisim_list') ?>
<?php } ?>


<?php if(@$_GET["delete"]=="success"){ ?>
<?php successMesaj("Silme işlemi başarılı.",'index.php?page=blog_iletisim_list') ?>
<?php } ?>

<!-- ------------------------------------------------------------------------------ -->

<div class="table-responsive">
<table class="table">
<thead>
<tr>
    <th>Id</th>
    <th>Adı</th>
    <th>email</th>
    <th>Mesaj</th>
    <th>Duzenle</th>
    <th>Sil</th>
</tr>
</thead>
<tbody>
<?php while ($blogIlestim=$blog_iletisim_list->fetch()) {?>
    <?php if ($blogIlestim["email"]): ?>   
    <tr class="table">
    <td><?=$blogIlestim["id"]?></td>
    <td><?= substr($blogIlestim["isim"],0, 20)?></td>
    <td><?= substr($blogIlestim["email"],0, 50)?></td>
    <td><?= substr($blogIlestim["mesaj"],0, 45)?></td>

    <td style="width: 60px;text-align: center;" ><a href="index.php?page=blog_iletisim_duzenle&edit=<?=$blogIlestim["id"]?>"><button class="btn btn-primary">Duzenle</button></a></td>

    <td style="width: 60px;text-align: center;" ><a href="islem.php?iletisim_sil=<?=$blogIlestim["id"]?>"><button class="btn btn-danger">Sil</button></a></td>                                        
    </tr>
 <?php endif ?><!-- MAILE GORE LISTELE -->
<?php  } ?>

</tbody>
</table>
</div>
</div>