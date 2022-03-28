<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<link href="./style/style.css" type="text/css" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project Battle Bots</title>
	<!--Highlight the page the user has open. Home in this case-->
	<?php
		echo "
            <style>
                .header-style .nav .menu .home{
                color: #83c0ff;
                }
                .header-style .nav .menu .home:hover{
                color: #0386FF;
                text-decoration: none;
                }
            </style>";
	?>
</head>
<body>
<?php include_once "header.php"; ?>
<br>
<div id="indexContainer">
	<div id="indexCenterGallery">
		<div id="indexCenterTitle">
			<h1>Project <br> Battle Bots</h1>
		</div>
		
		
		<div id="indexCenterImage">
			<img src="./assets/PBBblack.png" alt="Battle bot" width="55%">
		</div>
	</div>
	
	<!--Scroll group title-->
	<div id="indexScrollTitle">
		<h2>Welcome to Project Battle Bots!</h2>
	</div>
	<!--Scroll group-->
	<div id="indexScrollGroup">
		<!--PHP is used to allow easier connection to DB, which stores pictures os robots-->
		<?php
			
			echo '
                        <div class="indexScrollItem">
                            <a href="profilerobot.php?robotName=First"><img src="./assets/PBBblack.png" alt="Battle bot small" class="index-img"></a> 
                        </div>
                        <div class="indexScrollItem">
                            <a href="profilerobot.php?robotName=SECOND"><img src="./assets/PBBblack.png" alt="Battle bot small" class="index-img"></a> 
                        </div>
                        <div class="indexScrollItem">
                            <a href="profilerobot.php?robotName=Third"><img src="./assets/PBBblack.png" alt="Battle bot small" class="index-img"></a> 
                        </div>
                        <!--An empty div to space items apart-->
                        <div class="indexScrollSpacer"></div>';
		
		?>
	</div>

</div>
<div class="space-indx"></div>
<div id="indexMoreButton">
	<p><a class="indexa" href="#"><b>More!</b></a></p>
</div>

<?php include_once "footer.html"; ?>


</body>
</html>
