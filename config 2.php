<?php
     session_start();

     if (!isset($_SESSION['lang']))
     	$_SESSION['lang'] = "en";
     else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
     	if ($_GET['lang'] == "en")
     	    $_SESSION['lang'] = "en";
     	else if ($_GET['lang'] == "NL")
     	    $_SESSION['lang'] = "NL";
        else if ($_GET['lang'] == "IT")
            $_SESSION['lang'] = "IT";
        else if ($_GET['lang'] == "RU")
            $_SESSION['lang'] = "RU";
        else if ($_GET['lang'] == "PT")
            $_SESSION['lang'] = "PT";
        else if ($_GET['lang'] == "BG")
            $_SESSION['lang'] = "BG";
        else if ($_GET['lang'] == "FR")
            $_SESSION['lang'] = "FR";


     }

     require_once "translation/" . $_SESSION['lang'] . ".php";

?>