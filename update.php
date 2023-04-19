<?php
    include("sqlicon.php");

    $customerID = $_GET["updateid"];

    $getCustomerSQL = "SELECT * FROM customers WHERE customer_id=?";
    $stmt = $MySQLI->prepare($getCustomerSQL);
    
    if ($stmt === false) 
    {
        trigger_error($MySQLI->error, E_USER_ERROR);
        return;
    }

    $stmt->bind_param("i", $customerID);
    $status = $stmt->execute();

    if ($status === false) 
    {
        trigger_error($stmt->error, E_USER_ERROR);
    }

    $res = $stmt->get_result();
    
    if ($res->num_rows > 0) 
    {
        $row = $res->fetch_assoc();

        $fName = $row["first_name"];
        $lName = $row["last_name"];
        $email = $row["email"];
        $pass = $row["password"];
    }

    if (array_key_exists("UpdateCustomer", $_POST))
    {
        if (empty($_POST["update_first_name"]) || empty($_POST["update_last_name"]) || empty($_POST["update_email"]) || empty($_POST["update_password"]))
        {
            return;
        }

        $newFirstName = $_POST['update_first_name'];
        $newLastName = $_POST['update_last_name'];
        $newEmail = $_POST['update_email'];
        $newPassword = $_POST['update_password'];

        $updateCustomerSQL = "UPDATE customers SET first_name=?, last_name=?, email=?, password=? WHERE customer_id=?";
        $stmt = $MySQLI->prepare($updateCustomerSQL);
        
        if ($stmt === false) 
        {
            trigger_error($MySQLI->error, E_USER_ERROR);
            return;
        }
        
        $stmt->bind_param("ssssi", $newFirstName, $newLastName, $newEmail, $newPassword, $customerID);
        $status = $stmt->execute();

        if ($status === false) 
        {
            trigger_error($stmt->error, E_USER_ERROR);
        }

        $getCustomerSQL = "SELECT * FROM customers WHERE customer_id=?";
        $stmt = $MySQLI->prepare($getCustomerSQL);
        
        if ($stmt === false) 
        {
            trigger_error($MySQLI->error, E_USER_ERROR);
            return;
        }

        $stmt->bind_param("i", $customerID);
        $status = $stmt->execute();

        if ($status === false) 
        {
            trigger_error($stmt->error, E_USER_ERROR);
        }

        $res = $stmt->get_result();
        
        if ($res->num_rows > 0) 
        {
            $row = $res->fetch_assoc();

            $fName = $row["first_name"];
            $lName = $row["last_name"];
            $email = $row["email"];
            $pass = $row["password"];
        }
        echo "<script>alert('Data Updated Successfully');</script>";
    }
?>

<form action="update.php?updateid=<?php echo $customerID; ?>" method="POST">
    <label for="update_first_name">First Name</label>
    <br>
    <input type="text" name="update_first_name" id="update_first_name" value="<?php echo $fName; ?>"><br>

    <label for="update_last_name">Last Name</label>
    <br>
    <input type="text" name="update_last_name" id="update_last_name" value="<?php echo $lName; ?>"><br>

    
    <label for="update_email">Email</label>
    <br>
    <input type="text" name="update_email" id="update_email" value="<?php echo $email; ?>"><br>
    
    <label for="update_password">Password</label>
    <br>
    <input type="text" name="update_password" id="update_password" value="<?php echo $pass; ?>"><br>
    
    <input type="submit" value="Submit" name="UpdateCustomer">
    <?php
    if (array_key_exists('UpdateCustomer', $_POST))
    {
        if (empty($_POST["update_first_name"]) || empty($_POST["update_last_name"]) || empty($_POST["update_email"]) || empty($_POST["update_password"]))
        {
            echo "All fields must be filled in" . PHP_EOL;
            return;
        }
    }
    ?>
</form>
<a href="index.php"><input type="submit" value="Back To Index"></a>