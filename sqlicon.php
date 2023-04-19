<?php
    function GetDBConnection()
    {
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "library";

        $con = new mysqli($server, $user, $pass, $database);

        if ($con->connect_error)
        {
            die("Connection failed, reason: " . $con->connect_error);
        }

        return $con;
    }

    $MySQLI = GetDBConnection();
?>