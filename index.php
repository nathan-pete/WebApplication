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
        <!--Header of the page with code from a sepearate page-->
        <?php include_once "header.html"; ?>

        <!--Container for the whole page-->
        <div id="indexContainer">

            <!--Center gallery with bot picture and title-->
            <div id="indexCenterGallery">
                <div id="indexCenterTitle">
                    <h1>Project <br> Battle Bots</h1>
                    <p id="indexCenterSubtitle">By NHL Stenden</p>
                </div>

                <div id="indexCenterImage">
                    <img src="assets/pasted-image.png" alt="Battle bot">
                </div>
            </div>

            <!--Scroll group title-->
            <div id="indexScrollTitle">
                <h3>Welcome to Project Battle Bots!</h3>
            </div>

            <!--Scroll group-->
            <div id="indexScrollGroup">
                <!--PHP is used to allow easier connection to DB, which stores pictures os robots-->
                <?php
                    for ($a=0; $a<6; $a++) {
                        echo '
                        <div class="indexScrollItem">
                            <img src="/assets/pasted-image.png" alt="Battle bot small">
                        </div>
    
                        <!--An empty div to space items apart-->
                        <div class="indexScrollSpacer"></div>';
                    }
                ?>
            </div>

        </div>
    </body>
</html>
