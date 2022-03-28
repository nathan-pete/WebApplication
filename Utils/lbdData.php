<tr>
  <th class="ldh">Position</th>
  <th class="ldh">Robot Name</th>
  <th class="ldh">Points</th>
</tr>
<?php
  require_once "../connect.php";


  $result = mysqli_query($conn, "SELECT robotName,points FROM robots ORDER BY points DESC");

  $position = 1;
  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
      echo "
              <tr>
                <td class='ldt'>" . $position . "</td>
                <td class='ldt'>" . $row['robotName'] . "</td>
                <td class='ldt'>" . $row['points'] . "</td>

              </tr>
            ";
      $position++;
    }
  }
?>
