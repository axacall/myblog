    <?php require_once("header.php")?>
    <!-- //---------------------------- -->
    <div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
    </button>
    <a class="navbar-brand" href="#">
    <img style="width: 60px; border-radius: 60px;margin-top:-7px;" src="../img/user_img/<?php echo $_SESSION["user_image"]?>" />
    </a>
    <div style="color:white;margin-left: 100px;margin-top: 25px;"><?php echo $_SESSION["admin"]?></div>
    </div>
    <span class="logout-spn" >
    <a href="logout.php" style="margin-top:100px;color:#fff;font-size: 13px;">LOGOUT</a>  
    </span>
    </div>
    </div>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
    <!-- 
    <li class="active-link">
    <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
    </li> -->
    <li>
    <a href="index.php?&page=home"><i class="fa fa-home "></i>ANASAYFA</a>
    </li>
    <li>
    <a href="index.php?page=blog_ekle"><i class="fa fa-qrcode "></i>BLOG EKLE</a>
    </li>
    <li>
    <a href="index.php?page=blog_duzenle"><i class="fa fa-edit "></i>BLOG DUZENLE</a>
    </li>
    <li>
    <a href="index.php?page=blog_uyeler"><i class="fa fa-bar-chart-o "></i>BLOG UYELER</a>
    </li>
    <li>
    <a href="index.php?page=blog_yorum_list"><i class="fa fa-table "></i>BLOG YORUMLAR</a>
    </li>
    <li>
    <a href="index.php?page=blog_ayarlar"><i class="fa fa-table "></i>BLOG AYARLAR</a>
    </li>
    <li>
    <a href="index.php?page=blog_iletisim_list"><i class="fa fa-table "></i>BLOG İLETİŞİM</a>
    </li>
    <li>
    <a href="index.php?page=blog_resim_galeri"><i class="fa fa-table "></i>BLOG GALERİ</a>
    </li>
    </ul>
    </div>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
    <div id="page-inner">
    <div class="row">
    <div class="col-lg-12">
    </div>
    </div>              
    <!-- /. ROW  -->
    <?php 
    @$page=$_GET["page"];
    if (empty($page)) {
    $page="home";
    }
    switch ($page) {
    case 'home':
    if ($_SESSION["rutbe"]==2) {
        require_once("content.php");
    }elseif($_SESSION["rutbe"]==1){
        require_once("kilit.php");
    }
        break;
    case 'blog_ekle':
        require_once("blog_ekle.php");
        break;
    case 'blog_duzenle':
        require_once("blog_duzenle.php");
        break;
    case 'blog_uyeler':
        require_once("blog_uyeler.php");
        break;
    case 'blog_ayarlar':
        if ($_SESSION["rutbe"]==2) {
        require_once("blog_ayarlar.php");
    }elseif($_SESSION["rutbe"]==1){
        require_once("kilit.php");
    }
        break;
    case 'blog_edit':
        require_once("blog_edit.php");
        break;
    case 'blog_uyeler_edit':
        require_once("blog_uyeler_edit.php");
        break;
    case 'blog_yorum_edit':
        require_once("blog_yorum_edit.php");
        break;
    case 'blog_yorum_list':
        require_once("blog_yorum_list.php");
        break;
    case 'blog_iletisim_list':
    if ($_SESSION["rutbe"]==2) {
        require_once("blog_iletisim_list.php");
    }elseif($_SESSION["rutbe"]==1){
        require_once("kilit.php");
    }
        break;
    case 'blog_iletisim_duzenle':
        if ($_SESSION["rutbe"]==2) {
        require_once("blog_iletisim_duzenle.php");
    }elseif($_SESSION["rutbe"]==1){
        require_once("kilit.php");
    }
        break;
    case 'blog_resim_galeri':
     if ($_SESSION["rutbe"]==2) {
        require_once("blog_resim_galeri.php");
    }elseif($_SESSION["rutbe"]==1){
        require_once("kilit.php");
    }
        break;
        }
    ?>
    </div>
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!--  -->
    <!-- //---------------------------- -->
    <?php require_once("footer.php"); ?>