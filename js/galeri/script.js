$(function(){
$(".btn1").click(function() {
	if(".btn1"){$(".page2, .page3").fadeOut("500")}
			if(".btn1"){$(".page1").animate({
				top:'60px'
			})};
			$(".page1").fadeIn("500",function(){
		});
	$(".kapat").click(function(){
		$(".page1").fadeOut("500");
	});
});
// -----------------------------------------
$(".btn2").click(function() {
	if(".btn2"){$(".page1, .page3").fadeOut("500")}
		if(".btn2"){$(".page2").animate({
			top:"60px"
		})}
	$(".page2").fadeIn("500",function(){
	});
		$(".kapat").click(function(){
		$(".page2").fadeOut("500");
	});
});
// -----------------------------------------
$(".btn3").click(function() {
	if(".btn3"){$(".page2, .page1").fadeOut("500")}
		if(".btn3"){$(".page3").animate({
			top:"60px"
		})}
	$(".page3").fadeIn("500",function(){
	});
			$(".kapat").click(function(){
		$(".page3").fadeOut("500");
	});
});
	
});
// document.getElementByClass(".btn li a").style.opacity = "0.1";