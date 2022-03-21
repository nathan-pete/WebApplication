<?php
  $isSuccessful = FALSE;
  //Connecting to Database
  if (list($sqlEventsGood, $DB) = prepareAndConnect("
		SELECT *,
			name.sumo AS sumo,
			name.figure AS figure,
			name.maze AS maze,
			name.pollygame AS polly
			FROM games
			ORDER BY id")) {

    //Processing Information Pulled
    if (mysqli_stmt_execute($sqlEventsGood)) {
      mysqli_stmt_store_result($sqlEventsGood);
      if (mysqli_stmt_num_rows($sqlEventsGood) > 0) {
        mysqli_stmt_bind_result($sqlEventsGood, $id, $name, $description, $picture);
        $events = []; // Storing all teams linked to an event as an array
        while (mysqli_stmt_fetch($sqlEventsGood)) {
          $events += [$id => [$name, $description, $picture]];
        }
        $isSuccessful = TRUE;
      }
    }
    closeConnection($DB, $sqlEventsGood);
  }
  if (!$isSuccessful) {
    $_SESSION["errorMessage"] = "We have technical issues. Please try again later or inform the administrator.";
    redirectScript("../../../index.php");
  }

