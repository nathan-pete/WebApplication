<tr>
  <th class="ldh">Position</th>
  <th class="ldh">Robot Name</th>
  <th class="ldh">Points</th>
</tr>
<?php
  require_once "../connect.php";

  $query = "SELECT robotName,points FROM robots ORDER BY points DESC";
  if ($stmt = mysqli_prepare($conn, $query)) {
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_bind_result($stmt, $robotName, $points);
      mysqli_stmt_store_result($stmt);
      $position = 1;
      if (mysqli_stmt_num_rows($stmt) !== 0) {
        while (mysqli_stmt_fetch($stmt)) {
          echo "
        <tr>
          <td class='ldt'>" . $position . "</td>
          <td class='ldt'>" . $robotName . "</td>
          <td class='ldt'>" . $points . "</td>
        </tr>
      ";
          $position++;
        }
      } else {
        echo "
        <tr>
          <td class='ldt'></td>
          <td class='ldt'>No Entries</td>
          <td class='ldt'></td>
        </tr>
      ";
      }
    } else {
      echo "Error executing query" . mysqli_error($conn);
    }
  } else {
    echo "Error preparing" . mysqli_error($conn);
  }


?>
