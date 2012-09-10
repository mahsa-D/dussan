<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Santiago Dussán / Pronto nuevo sitio web / New website coming soon</title>
<meta name="description" content="Santiago Dussán. Arquitecture & interior design" />
<link href="css/dss.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script src="js/jquery-1.3.2.min.js" type="text/javascript" ></script>
<script src="js/jquery.npFullBgImg.js" type="text/javascript"></script>
<script type="text/javascript">
	//slideshow demo
	//counter
	var a = 0;
	//store some images in an array
	var homePageShowArray = ["images/1.jpg", "images/2.jpg", "images/3.jpg", "images/4.jpg", "images/5.jpg", "images/6.jpg", "images/7.jpg", "images/8.jpg", "images/9.jpg", "images/10.jpg", "images/11.jpg"];
	
	//background image loading functions, loads first image on page load
	$(document).ready(function() {		
		//start gallery
		homePageShow();			  
	});
	
	//simple method for calling the npFullBgImg methods and loading in a new image.
	function homePageShow() {
		 //request an image, with a call back to start the gallery timer each time the image is loaded and displayed  
		 $('#imgContainer').npFullBgImg(homePageShowArray[a], {fadeInSpeed: 1200, center: true, callback:function(){startGalleryTimer()}});
		 //increment counter
		 a++;
		 //loop gallery here
		 if(a == homePageShowArray.length) a=0;
	}
	
	function startGalleryTimer() {
		//set up timer for gallery, set here to 10 seconds.
		setTimeout("homePageShow()", 1000);
	}

</script>

</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=123400561068783";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="imgContainer"></div>

<div id="monocromo"> <a href="http://elmonocromo.com"><img src="images/monocromo.png" width="20" height="20" /></a>
</div>
<div id="contenedor">

	<div id="one">
    <img src="images/santiagodussan.png"/>
    
    </div>
    
	<div id="fb">
<div class="fb-like" data-href="http://www.facebook.com/arqdussan" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false"></div>
	</div>

</div>







</body>
</html>
