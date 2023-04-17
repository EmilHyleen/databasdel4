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

    function PrintTable(mysqli_result $result)
    {
        if ($result->num_rows > 0) {
            echo "<h1>Customers</h1><table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["customer_id"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["password"] . "</td></tr>";
            }
            echo "</table>";
        } 
        else 
        {
            echo "0 results";
        }
    }

    function InsertNewCustomer()
    {
        $inputFirstName = $_POST['input_first_name'];
        $inputLastName = $_POST['input_last_name'];
        $inputEmail = $_POST['input_email'];
        $inputPassword = $_POST['input_password'];

        echo $inputFirstName . ' ' . $inputLastName . ' ' . $inputEmail . ' ' . $inputPassword . PHP_EOL;
        // TODO:
        // Save input as cookie
        // Handle empty/invalid input
    }

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $mySQLI = GetDBConnection();

    $getCustomersSQL = 'SELECT * FROM customers';
    $res = $mySQLI->query($getCustomersSQL);
    PrintTable($res);

    if (array_key_exists('InsertNewCustomer', $_POST))
    {
        InsertNewCustomer();
    }
?>

<h2>Add New Customer</h2>
<form action="main.php" method="POST">
    <label for="input_first_name">First Name</label>
    <br>
    <input type="text" name="input_first_name" id="input_first_name"><br>

    <label for="input_last_name">Last Name</label>
    <br>
    <input type="text" name="input_last_name" id="input_last_name"><br>

    
    <label for="input_email">Email</label>
    <br>
    <input type="text" name="input_email" id="input_email"><br>
    
    <label for="input_password">Password</label>
    <br>
    <input type="text" name="input_password" id="input_password"><br>
    
    <input type="submit" value="Skicka" name="InsertNewCustomer">
</form>