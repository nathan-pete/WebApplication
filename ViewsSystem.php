<?php

function counter()
{
    $this->db_server = 'localhost';
    $this->db_username = 'root';
    $this->db_password = '';
    $this->db_name = 'webapp1';
    $this->db_usersTable = 'users';
    $this->currentPage = realpath(basename($_SERVER['PHP_SELF'])); //Returns trailing name component of path
    $this->currenPage = str_replace('\\', '/', $this->currentPage); //Replace all occurrences of the search string with the replacement string
    $this->ipAddress = $_SERVER['REMOTE_ADDR']; // contains the real IP address of the connecting party.
    $this->interval = 86400;
    $this->total = TRUE;
}

  

?>