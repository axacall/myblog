<?php 

	$checkboxRutbegET=$db->prepare("SELECT * FROM blog_ayarlar where id=1");
	$checkboxRutbegET->execute();
	$checkboxRutbeCek=$checkboxRutbegET->fetch(PDO::FETCH_ASSOC);
 ?>
<div class="contact">
	<h3 id="yeniFikir">Yeni fikirlere & Tavsiye almaya herzaman açığız.</h3>
	<!--  -->
<script>
$(function(){

    $("#table").on("keyup", function(event){
    form_kontrolu();
		});
        $('#isim').click(function(){
        $('.error').show();
    	$('.success').hide();
   		 });
	});
	var form_kontrolu = function(){
    var isim = $("#isim").val();
    var email = $("#email").val();
    var mesaj = $("#mesaj").val();
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    if ( isim==null || isim=="" || isim.length < 4 )
        $('.error').html("Kullanıcı adı 4 karakterden az olamaz");
    else if ( atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length )
        $('.error').html("Geçerli email adresi girin");
    else if ( mesaj==null || mesaj=="" || mesaj.length < 4 )
    	 $('.error').html("Geçerli mesaj adresi girin");
    else
    {
        $('.error').empty();
        $('#table').removeAttr('onsubmit');
        $('#isim').click(function(){
        $('.success').hide();
        });
    }
}
</script>

	<form action="islem.php" name="form" id="table" method="post" onsubmit="return false;">
		<table class="table">
			<tbody>
				<tr>
					<td>						
						<span class="error"></span>
						<?php if(@$_GET["mesaj"]=="error"){ ?>
						<!-- <span class="success">  Mesaj_cok_uzun.</span> -->
						<?php errorMesaj("Mesajınız çok uzun","index.php?page=iletisim"); ?>
						<?php } ?>	
						<?php if(@$_GET["mesaj"]=="mesaj"){ ?>
						<?php errorMesaj("Mesajınız çok uzun","index.php?page=iletisim"); ?>
						<?php } ?>	
						<?php if(@$_GET["mesaj"]=="email"){ ?>
						<?php errorMesaj("Mesajınız çok uzun","index.php?page=iletisim"); ?>
						<?php } ?>		
						<?php if(@$_GET["mesaj"]=="isim"){ ?>
						<?php errorMesaj("Mesajınız çok uzun","index.php?page=iletisim"); ?>
						<?php } ?>
						<?php if(@$_GET["mesaj"]=="success"){ ?>
						<!-- <span class="success">  Mesajınız gönderildi.</span> -->
						<?php successMesaj("Mesajınız gönderildi.","index.php?page=iletisim"); ?>
						<?php } ?>
					</td>
				</tr>
				<tr><div id="mesajYaz"></div>
					<td><input id="isim" type="text" name="isim" <?=@$checkboxRutbeCek["iletisim_durum"]==1 ? "" : "disabled" ?> placeholder="Lütfen adınızı yazınız."></td>
				</tr>
				<tr>	
					<td><small>Adınızı ve Soyadınızıda yazabilirsiniz</small></td>
				</tr>		
				<tr>
					<td><input type="email" id="email" name="email" <?=@$checkboxRutbeCek["iletisim_durum"]==1 ? "" : "disabled" ?> placeholder="Lütfen e-mail adresinizi yazınız"></td>
				</td>		
					
				<tr>
					<td><small>E-mail Listesine ayrıca eklenmeyecektir.</small></td>
				</tr>
		
				<tr>

					<td><textarea id="mesaj" name="mesaj" <?=@$checkboxRutbeCek["iletisim_durum"]==1 ? "" : "disabled" ?> placeholder="Mesajınızı yazınız."></textarea>
				</td>		
					
				<tr>	
					<td><small>Mesajlarınızda <?php echo htmlspecialchars("<br/> & <p>...</p> ekleyebilirsiniz")?></small></td>	
				</tr>	
				
				<tr>				
					<td>
						<button name="gonder"  <?=@$checkboxRutbeCek["iletisim_durum"]==1 ? "" : "disabled" ?> value="gonder">Gonder</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>

</div>
