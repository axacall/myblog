window.onload = function(){	
	yuklengoster();
	setTimeout(logo, 1000);
	setTimeout(menu1, 1000);
	setTimeout(icerik, 1000);
	setTimeout(sosyal, 1000);
	setTimeout(yukleniyor, 1000);
	
}

	
function yuklengoster(){
	var yuklen = document.querySelector("#yukleniyor");
	yuklen.style.display="inline";
}

function yukleniyor(){
	var yukle = document.querySelector("#yukleniyor");
	yukle.style.display="none";
}



function logo(){
	var logo=document.querySelector("#logo");
	logo.style.opacity="1";
	logo.style.transform="translate(0)";

}

function menu1(){
	var l=document.querySelectorAll(".btn ul li");
	var i;
	for(i=0; i<l.length; i++){
		l[i].style.opacity="1";
		l[i].style.transform='translate(0)';
	}
}

function icerik(){
	var icerik=document.querySelector(".icerik");
	icerik.style.opacity="1";
	icerik.style.transform='translate(0)';
}

function sosyal(){
	var sosyal=document.querySelector(".sosial");
	sosyal.style.opacity=".5";
	sosyal.style.transform='translate(0)';
}

function page(pages){
	var page=document.querySelector(pages);
	// page.style.opacity="1";
	page.style.transform='translateY(0)';
}

//--------------JQUERY - KODLARI----
$(function(){
$(".btn1").click(function() {
	if(".btn1"){$(".page2, .page3").fadeOut("fast",function(){
		$(".page2, .page3").css("opacity","0");
	})}

	  $(".page1").fadeIn("fast",function(){
	  		if(".btn1"){$(".page1").animate({
			opacity:"1",
			top:"70px"
		})}
	});
	$(".kapat").click(function(){
		$(".page1").fadeOut("fast");
		$('.buton').removeClass('active').addClass('inactive');//menu aktive clasınıda kapatır.
	});

});

// -----------------------------------------
$(".btn2").click(function() {

	if(".btn2"){$(".page1, .page3").fadeOut("fast",function(){
		$(".page1, .page3").css("opacity","0");
	})}

	  $(".page2").fadeIn("fast",function(){
	  		if(".btn2"){$(".page2").animate({
			opacity:"1",
			top:"70px"
		})}
	});
		$(".kapat").click(function(){
		$(".page2").fadeOut("fast");
		$('.buton').removeClass('active').addClass('inactive');//menu aktive clasınıda kapatır.
	});
});
// -----------------------------------------
$(".btn3").click(function() {

	if(".btn3"){$(".page2, .page1").fadeOut("fast",function(){
		$(".page1, .page2").css("opacity","0");
	})}

	  $(".page3").fadeIn("fast",function(){
	  		if(".btn3"){$(".page3").animate({
			opacity:"1",
			top:"70px"
		})}
	});
			$(".kapat").click(function(){
		$(".page3").fadeOut("fast");
		$('.buton').removeClass('active').addClass('inactive');//menu aktive clasınıda kapatır.
	});

});
////-----------------------------------
//-- SAYFA KAPATMA MESAJ BALOCUĞU- KODU--
$(".kapat").mousemove(function(){
	$(".baloncuk").css("display","inline",function(){
		$(".baloncuk").fadeIn("fast");
		if(".btn3"){$(".page3").animate({
			top:"70px"
		})}
	});
	$(".baloncuk").html("kapatır");
}),
$(".kapat").mouseout(function(){
	$(".baloncuk").fadeOut("fast");

});

////----------MENU BUTON AVTİF - PASİF KODLARI---
$(document).ready(function(){
  $('.buton').click(function(){
    $('.buton').removeClass('active').addClass('inactive');
     $(this).removeClass('inactive').addClass('active');
    });

})

});