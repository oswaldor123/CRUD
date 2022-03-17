<?php
    include("db.php");

    if (isset($_GET['Prod_Id'])) {
        $Prod_Id = $_GET['Prod_Id'];
        $query = "DELETE FROM productos WHERE Prod_Id = $Prod_Id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] ='El producto ha sido eliminado satisfactoriamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");

    }
?>