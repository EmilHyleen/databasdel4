<?php    
    include("sqlicon.php");
    
    $customerID = $_GET["deleteid"];
    if(isset($customerID))
    {
        $deleteCustomerSQL = "DELETE FROM customers WHERE customer_id=?";
        $stmt = $MySQLI->prepare($deleteCustomerSQL);
    
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
        
        echo "<script>alert('Data deleted');</script>"; 
        echo "<script>window.location.href = 'index.php'</script>";     
    } 
?>