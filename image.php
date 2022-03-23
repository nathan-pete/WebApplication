<?php 
include "connect.php";
?>
<?php 
   if ( isset( $_GET['id'] ) ) { 
  $id = (int)$_GET['id']; 
  if ( $id > 0 ) { 
    $query = "SELECT `content` FROM `images` WHERE `id`=".$id; 
    // Выполняем запрос и получаем файл 
    $res = mysql_query($query); 
    if ( mysql_num_rows( $res ) == 1 ) { 
      $image = mysql_fetch_array($res); 
      // Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
      header("Content-type: image/jpeg"); 
      // И  передаем сам файл 
      echo $image['content']; 
    } 
  } 
} 
?>