window.onload = function(){
	setTimeout(()=>{
		init(yuklendi);
	},1000)
//-----------------------------------
function liCreate(callback){
	for(let i=1; i<=4; i++){
		let li =  document.createElement("li");
		let lilerx = document.getElementById("liler")
		li.setAttribute("id","bos"+i);
		lilerx.appendChild(li);
		// if(typeof liler !== null){
		// }
		//-----------------------------------
	}
	callback();	
}
function activesClass(){
	let active = document.querySelectorAll(".liler li");
	active[2].classList.add("sideActive");
	active.forEach(ac => {
		ac.addEventListener("click", (e) => {
			e.preventDefault();
			[...active].map((act,i) => act.classList.remove("sideActive"));
			ac.classList.add("sideActive");
			getir(e.target.id)
		})
	})
}	
function getir(resim){
	let prj = document.querySelector(".proje img")
	let prje = document.querySelector(".proje")
	// let loadgif = document.querySelector(".loadgif")
	let loadgif = document.querySelector(".yukleniyorlar")
	loadgif.classList.add("portfolio_opacity")
	prje.classList.add("portfolio_opacity_sil")
	prje.classList.remove("portfolio_opacity")
	setTimeout(()=>{
		prj.src=''
	},1000)
	setTimeout(()=>{
		loadgif.classList.remove("portfolio_opacity")
		prj.src="img/sliderImg/"+resim+'.png'
		prje.classList.remove("portfolio_opacity_sil")
		prje.classList.add("portfolio_opacity")
	},2000)
}
//-----------------------------------
// Adres çubuğu bir şekilde boş geldiğinde  onu htaccess kullanamdan  sistemin yapısına gonderiyoruz.
// console.log(window.location)
// if(window.location.href == "http://ecms/app/"){
// 	window.location.href = "http://ecms/app/#home"
if(window.location.href == "www.makyildiz.com" && window.location.href == "makyildiz.com/" && window.location.href == "http://www.makyildiz.com" && window.location.href == "www.makyildiz.com/" && window.location.href == "http://www.makyildiz.com"){
	window.location.href = "http://www.makyildiz.com/#home"
	alert("true" + window.location.href)
	
	let pgs = window.location.hash.substr(1)
	getAllEmployees(pgs)
}else{
	alert("false : " + window.location.href)
    window.location.href = "http://www.makyildiz.com/#home"
	let pgs = window.location.hash.substr(1)
	getAllEmployees(pgs)
}
//-----------------------------------Sayfaları getir.
// console.log(document.head)
let kutu = document.querySelector(".kutu");
let gecis = document.querySelector(".gecis");
let homeBaslik = document.querySelector(".homeBaslik");
let main = document.querySelector(".main");
let btn = document.querySelectorAll("#btn")
let menu = document.querySelector(".btnKapsa");
let title = document.querySelector("title");
//-----------------------------------
function yuklendi(){
			// Tıklandıktan sonra sayfa yuklenir  ve  3 sn sonra kodları çalıştırır
			homeBaslik.classList.add("homeBaslik");
			kutu.classList.add("initialLoad");
			gecis.classList.add("efectAnd");
			gecis.classList.remove("pass");
			kutu.classList.remove("mainOpacityBack_0");
			menu.classList.remove("mainOpacity_1");
			menu.classList.remove("mainOpacityBack_0");
		}
		function init(callback){
	// Sayfa yuklendiğinde; loading ekranını ve bazı css classları devreye sokar.
	let initialLoad = document.querySelector(".init");
	initialLoad.classList.add("initialLoad");
	setTimeout(()=>{
		initialLoad.classList.add("mainOpacity_1");
		kutu.classList.add("initialLoad");
	},2000)
	callback()
}
//-----------------------------------
// Sayfanın gelişine gore active class atamak:
let pageName = window.location.hash.substr(1)
let activeClassHome = document.querySelector("."+pageName)
activeClassHome.classList.add("active")
//-----------------------------------
btn.forEach(function(b){
	// btn[0].click() // Sayfa yuklendiğinde  home page e tıklar.
	b.addEventListener("click",function(e){
		const page = b.getAttribute("data") // tıklanan menulerdeki data = bilgilerine gore switch case i çalıştırır.
		//-----------------------------------
		function pages(page){
			switch(page){
				case "home":
				getAllEmployees(page);
				title.innerHTML = page;
				window.location.hash = page;
				break;
				case "about":
				getAllEmployees(page)
				window.location.hash = page;
				title.innerHTML = page;
				break;
				case "portfolio":
				getAllEmployees(page);
				title.innerHTML = page;
				window.location.hash = page;
				break;
				case "contact":
				getAllEmployees(page);
				title.innerHTML = page;
				window.location.hash = page;
				break;
			}
		}
		setTimeout(()=>{
			pages(page)
			window.onload =  yuklendi()
		},5000)
		// ilk tıklamada çalışır...
		kutu.classList.add("mainOpacityBack_0");
		menu.classList.add("mainOpacityBack_0");
		kutu.classList.remove("initialLoad");
		setTimeout(()=>{
			// sayfa yuklenir ve  1 sn sonra kodları çalıştırır.
			gecis.classList.add("pass");
			homeBaslik.classList.remove("homeBaslik");
			homeBaslik.innerHTML = "";
		},2000)
		//-----------------------------------
		e.preventDefault() // Sayfanın yenilenmesini engeller
	})
	//-----------------------------------
})
// ANA MENU ACTIVE CLASS:
//-----------------------------------
// document.addEventListener("DOMContentLoaded",function(){
	let actives = document.querySelectorAll("li")
	let nav = document.querySelector(".nav")
	actives.forEach(activNav =>{
		activNav.addEventListener("click",(e)=>{
			e.preventDefault();
			[...actives].map(acNav => acNav.classList.remove("active"))
			setTimeout(()=>{
				activNav.classList.add("active")
			},3000)
		})
	})

// }) 
//-----------------------------------
function getAllEmployees(pg){
	const xhr = new XMLHttpRequest();
	xhr.open("GET",`${pg}.html`);
	xhr.onload = function(){
		let list = document.querySelector("#homeP");
		if(document.readyState === "complete"){
			list.innerHTML = this.responseText;
		}
		getData(pg)
	}
	xhr.send();
//-----------------------------------
function getData(pg){
	let list;
	const xhrPost = new XMLHttpRequest();
	xhrPost.open("POST","jsform.php");
	xhrPost.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhrPost.onload = function(){
		list = this.responseText;
		list = JSON.parse(list)
		console.log(list[0].genelAyarlar)
		const homeP = document.querySelector("#homeP");
		if(pg == "home"){
					//-----------------------------------
					if(document.readyState == "complete"){
						document.querySelector("#homePage").innerHTML = list[13].genelAyarlar;
						document.querySelector("#homeIam").innerHTML = list[0].genelAyarlar;
						let logo = document.getElementById("img").src = list[1].genelAyarlar;
						document.getElementById("email").innerText = list[2].genelAyarlar;
						document.getElementById("gsm").innerText = list[3].genelAyarlar;
					}
					//-----------------------------------
				}else if(pg == "about"){
				//-----------------------------------
				if(document.readyState == "complete"){
					document.querySelector(".aboutKapsa p").innerText = list[6].genelAyarlar;
					let logo = document.getElementById("img").src = list[1].genelAyarlar;	
				}
				//-----------------------------------
			}else if(pg == "portfolio"){
				if(document.readyState == "complete"){
					liCreate(activesClass);
					let logo = document.getElementById("img").src = list[1].genelAyarlar;	
					
				}
			}else if(pg == "contact"){
				if(document.readyState == "complete"){
					document.querySelector(".Rotate").innerHTML = list[12].genelAyarlar;
					let logo = document.getElementById("img").src = list[1].genelAyarlar;
					document.getElementById("email").innerText = list[2].genelAyarlar;
					document.getElementById("gsm").innerText = list[3].genelAyarlar;	
				}
			}
		}
		xhrPost.send(`data=${pg}`);	
	}
}
//-----------------------------------
}// window.onload sonu: