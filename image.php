<?php 
include "connect.php";
?>
<?php 
   if ( isset( $_GET['id'] ) ) { 
  $id = (int)$_GET['id']; 
  if ( $id > 0 ) { 
    $query = "SELECT `content` FROM `images` WHERE `id`=".$id; 
    
    $res = mysql_query($query); 
    if ( mysql_num_rows( $res ) == 1 ) { 
      $image = mysql_fetch_array($res); 
      header("Content-type: image/jpeg");
      echo $image['content']; 
    } 
  } 
} 
?>