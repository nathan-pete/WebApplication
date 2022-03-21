<div class="overall">
      <div class="squarecolorsmall">
        <?php
          $conn = mysqli_connect("localhost", "root", "", "webapp");
          $query = "SELECT * FROM `robots`";
          $result = mysqli_query($conn, $query)

        ?>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $robotName = $row['robotName'];
            echo $robotName;
          }
        ?>
      </div>
      <br>
      <div class="squarecolorsmall">
        <?php
          $conn = mysqli_connect("localhost", "root", "", "webapp");
          $query = "SELECT * FROM `robots`";
          $result = mysqli_query($conn, $query)

        ?>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $serialNum = $row['serialNum'];
            echo $serialNum;
          }
        ?>
      </div>
      <br>
      <div class="squarecolorsmall">
        <?php
          $conn = mysqli_connect("localhost", "root", "", "webapp");
          $query = "SELECT * FROM `robots`";
          $result = mysqli_query($conn, $query)

        ?>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $sound = $row['sound'];
            echo $sound;
          }
        ?>
      </div>
    </div>
    <div class="overall2">
      <div class="squarecolorbig">
        <?php
          $conn = mysqli_connect("localhost", "root", "", "webapp");
          $query = "SELECT * FROM `robots`";
          $result = mysqli_query($conn, $query)

        ?>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $robotPicture = $row['robotPicture'];
            echo $robotPicture;
          }
        ?>
      </div>
  <div class = "squarecolor">
        <br>
        <div class = "overall">
            <div class = "squarecolorsmall">
              <?php

              if(isset($name)){
                 if($infoR) {
                  foreach($infoR as $robot) {
                    echo $robot['robotName'];
                  }
                }   
              }
              ?>
            </div>
        <br>
            <div class = "squarecolorsmall">
            <?php
                              if(isset($name)){
                                if($infoR) {
                                 foreach($infoR as $robot) {
                                   echo $robot['serialNum'];
                                 }
                               }  
                             }
                ?>
            </div>
        <br>
            <div class = "squarecolorsmall">
            <?php
                                if(isset($name)){
                                  if($infoR) {
                                   foreach($infoR as $robot) {
                                     echo $robot['sound'];
                                   }
                                 }  
                               }
                                  
                ?>
            </div>
        </div>     
        <div class = "overall2"> 
            <div class = "squarecolorbig">
            <?php
              if(isset($name)){
                if($infoR) {
                 foreach($infoR as $robot) {
                   echo $robot['robotPicture'];
                 }
               }  
             } 
              ?>
            </div>
        </div>
    </div>
<?php