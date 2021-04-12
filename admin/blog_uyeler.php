<?php 
require_once("dbBaglantisi.php");
$blog_uyeler=$db->prepare("SELECT * FROM blog_uyeler");
$blog_uyeler->execute();
?>

<h5 style="font-size: 24px; font-weight: 800;">Blog Duzenle</h5>
<hr>
<div class="col-lg-12 col-md-12">

<span class="slogan_span"><b>Bu Sayfada </b><i><?php echo $coming_pageildirimi = "| Uye Listeleme - Düzenleme - Silme ve  Uyelik Onay İşlemleri Yapılır." ?></i></span>
<?php if(@$_GET["uyeDelete"]=="error"){ ?>
<?php errorMesaj("Silme işlemi başarısız","index.php?page=blog_uyeler") ?>
<?php } ?>
<?php if(@$_GET["uye_success"]=="success"){ ?>
<?php successMesaj("Güncelleme başarılı","index.php?page=blog_uyeler") ?>
<?php } ?>


<?php if(@$_GET["uyeDelete"]=="success"){ ?>
<?php successMesaj("Silme işlemi başarılı","index.php?page=blog_uyeler") ?>
<?php } ?>
<div class="table-responsive">
<table class="table">
<thead>
    <tr>
        <th>id</th>
        <th>Başlık</th>
        <th>İcerik</th>
        <th>Onay</th>
        <th>Rutbe</th>
        <th>UyeFoto</th>
        <th>Duzenle</th>
        <th>Sil</th>
    </tr>
</thead>
<tbody>
    <?php 
    $checkboxRutbegET=$db->prepare("SELECT * FROM blog_ayarlar where id=1");
    $checkboxRutbegET->execute();
    $checkboxRutbeCek=$checkboxRutbegET->fetch(PDO::FETCH_ASSOC);
    // header("index.php?page=home");
        // $yetki0=0;

       $rutbe=$checkboxRutbeCek["rutbe"];
        // echo $_SESSION["admin"];
        // echo $_SESSION["rutbe"];
        // echo $_SESSION["yetki"];
        
     ?>
<?php while ($blogUyelerGet=$blog_uyeler->fetch()) {?>
                
    <?php if ($_SESSION["rutbe"]==2){ ?>
        <?php if ($blogUyelerGet["yetki"]==1 || $blogUyelerGet["yetki"]==2 || $blogUyelerGet["uyelik_onay"]==0): ?>            
        
        <tr style="padding-top: 20px;" class="table">
        <td style="padding-top: 20px;width: 60px;text-align: center;" ><?=$blogUyelerGet["id"]?></td>
        <td style="padding-top: 20px;" ><?=$blogUyelerGet["isim"]?></td>
        <td style="padding-top: 20px;" ><?= substr($blogUyelerGet["email"], 0, 35)?></td>
        <td style="padding-top: 20px;width: 60px;text-align: center;" >

            <?php if ($blogUyelerGet["uyelik_onay"]==1): ?>
                <span class="yuvarlak_span"><?= $blogUyelerGet["uyelik_onay"]?></span>
            <?php endif ?>
            <?php if ($blogUyelerGet["uyelik_onay"]==0): ?>
                <span class="yuvarlak_span_onay"><?= $blogUyelerGet["uyelik_onay"]?></span>
            <?php endif ?>

        </td>

        <td><?php echo $blogUyelerGet["rutbe"] ?></td>

        <td style="width: 60px;text-align: center;" >
            <?php if(empty($blogUyelerGet["user_image"])){ ?>
            <img style="width: 50px;border-radius: 50%;border:3px solid #E4E4E4;" src="../img/user_img/user_df.jpg">
             <?php }else{ ?>
            <img style="width: 50px;border-radius: 50%;border:3px solid #E4E4E4;" src="../img/user_img/<?=$blogUyelerGet["user_image"]?>">
            <?php } ?>
        </td>
        <td style="padding-top: 15px;width: 60px;text-align: center;" ><a href="index.php?page=blog_uyeler_edit&uye_edit=<?=$blogUyelerGet["id"]?>"><button class="btn btn-primary">Duzenle</button></a></td>
        <td style="padding-top: 15px;width: 60px;text-align: center;">
            <?php if ($_SESSION["rutbe"]==2): ?>
           <a href="blog_edit_islem.php?uye_img=<?=$blogUyelerGet["user_image"]?>&uyeDelete=<?=$blogUyelerGet["id"]?>">
            <?php endif ?>
                <button  style="cursor:no-drop" <?= $_SESSION["rutbe"]==2 ? "" : "disabled" ?>  class="btn btn-danger" >Sil</button>
            </a>
        </td>                                      
        </tr> 
        <?php endif ?>
        
         <?php } else{?>
<!-- -------------------------------------------------- -->

            <?php if ($blogUyelerGet["email"]==$_SESSION["admin"]): ?>            
        
        <tr style="padding-top: 20px;" class="table">
        <td style="padding-top: 20px;width: 60px;text-align: center;" ><?=$blogUyelerGet["id"]?></td>
        <td style="padding-top: 20px;" ><?=$blogUyelerGet["isim"]?></td>
        <td style="padding-top: 20px;" ><?= substr($blogUyelerGet["email"], 0, 35)?></td>
        <td style="padding-top: 20px;width: 60px;text-align: center;" >
            <?php if ($blogUyelerGet["uyelik_onay"]==1): ?>
                <span class="yuvarlak_span"><?= $blogUyelerGet["uyelik_onay"]?></span>
            <?php endif ?>
            <?php if ($blogUyelerGet["uyelik_onay"]==0): ?>
                <span class="yuvarlak_span_onay"><?= $blogUyelerGet["uyelik_onay"]?></span>
            <?php endif ?>
        </td>
                <td style="padding-top: 20px;width: 60px;text-align: center;" >

            <?php if ($blogUyelerGet["rutbe"]==2): ?>
                <span class="yuvarlak_span_onay"><?= $blogUyelerGet["rutbe"]?></span>
            <?php endif ?>
            <?php if ($blogUyelerGet["rutbe"]==1): ?>
                <span class="yuvarlak_span"><?= $blogUyelerGet["rutbe"]?></span>
            <?php endif ?>

            </td>

        <td style="width: 60px;text-align: center;" >
            <?php if(empty($blogUyelerGet["user_image"])){ ?>
            <img style="width: 50px;border-radius: 50%;border:3px solid #E4E4E4;" src="../img/user_img/user_df.jpg">
             <?php }else{ ?>
            <img style="width: 50px;border-radius: 50%;border:3px solid #E4E4E4;" src="../img/user_img/<?=$blogUyelerGet["user_image"]?>">
            <?php } ?>
        </td>
        <td style="padding-top: 15px;width: 60px;text-align: center;" ><a href="index.php?page=blog_uyeler_edit&uye_edit=<?=$blogUyelerGet["id"]?>"><button class="btn btn-primary">Duzenle</button></a></td>
        <td style="padding-top: 15px;width: 60px;text-align: center;">
            <?php if ($_SESSION["rutbe"]==2): ?>
           <a href="blog_edit_islem.php?uye_img=<?=$blogUyelerGet["user_image"]?>&uyeDelete=<?=$blogUyelerGet["id"]?>">
            <?php endif ?>
                <button  style="cursor:no-drop" <?= $_SESSION["rutbe"]==2 ? "" : "disabled" ?>  class="btn btn-danger" >Sil</button>
            </a>
        </td>                                      
        </tr> 
        <?php endif ?>

          <?php } ?>  
       
<?php  } ?>


</tbody>
</table>
</div>
</div>