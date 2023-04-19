<script>
    function DeleteEntry(aCustomerID)
    {
        if(window.confirm('Are you sure you want to delete this entry? It will be gone forever (a really long time)'))
        {
            window.location.href = `delete.php?deleteid=${aCustomerID}`;
        }
    }

</script>

<?php
    include("sqlicon.php");

    error_reporting(E_ALL);
    ini_set("display_errors", "On");

    $getCustomersSQL = "SELECT * FROM customers";
    $res = $MySQLI->query($getCustomersSQL);
    
    if ($res->num_rows > 0) {
        echo "<h1>Customers</h1><table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Password</th></tr>";
        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["customer_id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td><a href=read.php?viewid=" . $row["customer_id"] . "><input type='submit' value='Read'></a></td></tr>";
            echo "<td><a href=update.php?updateid=" . $row["customer_id"] . "><input type='submit' value='Update'></a></td></tr>";
            echo "<td><button onclick='DeleteEntry(" . $row["customer_id"] . ")'>Delete</button>";
        }
        echo "</table>";
    } 
    else 
    {
        echo "0 results";
    }
?>

<a href="insert.php"><input type="submit" value="Create New Entry"></a>