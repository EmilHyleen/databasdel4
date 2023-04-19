<?php
    include("sqlicon.php");

    $customerID = $_GET["viewid"];
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

    if ($res->num_rows > 0) {
        echo "<h1>Customers</h1><table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th></tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["customer_id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
        }
        echo "</table>";
    } 
    else 
    {
        echo "0 results";
    }
?>

<a href="index.php"><input type="submit" value="Back To Index"></a>