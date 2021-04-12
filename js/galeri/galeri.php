<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>galeri</title>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
	<style>

		.active{

			color:#CA4A98;
			font-size: 16px;
			font-weight: 600;
		}
		.galery-box ul li{
			display: inline;
			cursor:pointer;
			position: relative;
			list-style: none;
			font-weight: 600;
			margin-bottom: 40px;
			padding-left:30px;
		}
		.galery-box ul li::after{
			
			cursor:pointer;
			width: 40px;
			padding-left:30px;
			position: absolute;
			top:20px;


		}
		.galery-box ul{
			position: absolute;
			top:400px;
			left:250px;

		}
		.galery-box .active::after{
			color:red;
			content: '--';
			font-weight: 900;
			position: absolute;
			left:-25px;
			top:-7px;
			font-size: 24px;

		}



	</style>

</head>
<body>
	<div class="galery-box">
		<img src="galeri/img01.png"  id="galeri">	

	<ul>
			<li class="btnX active">01</li>
			<li class="btnX">02</li>
			<li class="btnX">03</li>
			<li class="btnX">04</li>
		</ul>
	</div>

		<script>

			var btnX=document.getElementsByClassName("btnX");
			var galeri=document.getElementById("galeri");
			var image=new Array(
				"galeri/img01.png",
				"galeri/img02.png",
				"galeri/img03.png",
				"galeri/img04.png"
				);

			for(let i=0; i<=btnX.length; i++){
				btnX[i].onclick=function()
				{
					galeri.src=image[i];
					let current=document.getElementsByClassName("active");
					current[0].className=current[0].className.replace("active", "");
					this.className += " active";
				}
			}

	</script>
</body>
</html>