<?php
    include("sqlicon.php");

    if (array_key_exists("InsertNewCustomer", $_POST))
    {
        if (empty($_POST["input_first_name"]) || empty($_POST["input_last_name"]) || empty($_POST["input_email"]) || empty($_POST["input_password"]))
        {
            return;
        }

        $inputFirstName = $_POST['input_first_name'];
        $inputLastName = $_POST['input_last_name'];
        $inputEmail = $_POST['input_email'];
        $inputPassword = $_POST['input_password'];

        $insertCustomerSQL = 'INSERT INTO customers (first_name, last_name, email, password) VALUES (?, ?, ?, ?)';
        $stmt = $MySQLI->prepare($insertCustomerSQL);
        
        if ($stmt === false) 
        {
            trigger_error($MySQLI->error, E_USER_ERROR);
            return;
        }

        $stmt->bind_param("ssss", $inputFirstName, $inputLastName, $inputEmail, $inputPassword);
        $status = $stmt->execute();

        if ($status === false) 
        {
            trigger_error($stmt->error, E_USER_ERROR);
        }

        echo "<script>alert('Data Inserted Successfully');</script>";

    }
?>

<h2>Add New Customer</h2>
<form action="insert.php" method="POST">
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
    
    <input type="submit" value="Submit" name="InsertNewCustomer">
    <?php
    if (array_key_exists("InsertNewCustomer", $_POST))
    {
        if (empty($_POST["input_first_name"]) || empty($_POST["input_last_name"]) || empty($_POST["input_email"]) || empty($_POST["input_password"]))
        {
            echo "All fields must be filled in" . PHP_EOL;
            return;
        }
    }
    ?>
</form>
<a href="index.php"><input type="submit" value="Back To Index"></a>
