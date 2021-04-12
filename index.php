<?php
 require_once("header.php");


	# SITE AKTIF - PASIF  KODU
    $userBilgisiAl=$db->prepare("SELECT * FROM blog_ayarlar WHERE id=1");
    $userBilgisiAl->execute();
    $userAktif=$userBilgisiAl->fetch(PDO::FETCH_ASSOC);
 	if ($userAktif["blog_durum"]!=1) {
 	 	header("location:page_404.php");
 	 } 
 	 # SITE AKTIF - PASIF  KODU
 ?>

<!-- HEADER  -->
 <?php	#--- ilk kayıt lazım oldu.
		// $query = $db->query("SELECT MAX(id) FROM blog_kategori"); // execute
		// $max_id = $query->fetch(); // fetch
		// $max_id[0];
		#--- ilk
  ?>	


<?php
$pg=@$_GET["page"];
if (!$pg) {
	$pg="home";
}

switch ($pg) {
	case 'home':
		require_once("content.php");
		break;
	case 'galerix':
		require_once("galerix.php");
		 break;
	case 'blog_detay':
		require_once("blog_detay.php");
		 break;
	case 'iletisim':
	 	require_once("iletisim.php");
	break;
	case 'hata':
	 	require_once("sayfa_404.php");
	break;
	// case 'logout':
	//  	require_once("logout.php");
	// break;
}
 ?>
<!-- CONTENT -->

<?php require_once("footer.php") ;?>
<!-- FOOTER -->