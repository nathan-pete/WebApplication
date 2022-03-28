<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>2048</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="script2048.js" charset="utf-8"></script>
</head>
<body>

<?php include_once "header.php"; ?>


<div id="gameContainer">
    <div class="score-container">
        <div class="score-title">SCORE</div>
        <span id="score">0</span>
    </div>

    <div id="result"></div>

    <div class="grid"></div>

    <div class="tooltip"> Rules &#9432;
  <span class="tooltiptext">2048 is a game where you combine numbered tiles in order to gain a higher numbered tile. In this game you start with two tiles, the lowest possible number available is two. Then you will play by combining the tiles with the same number to have a tile with the sum of the number on the two tiles. If there are no more zeros and moves available you lose.</span>
  </div>

  <!---  <div class="explanation">
        <p>2048 is a game where you combine numbered tiles in order to gain a higher numbered tile. In this game you start with two tiles, the lowest possible number available is two. Then you will play by combining the tiles with the same number to have a tile with the sum of the number on the two tiles. If there are no more zeros and moves available you lose.</p>
    </div>--->
</div>


<?php include_once "footer.html"; ?>

</body>
</html>
