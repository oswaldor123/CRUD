<?php

include("db.php");

if (isset($_POST['save_task'])){
    $Prod_Descripcion=$_POST['Prod_Descripcion'];
    $Prod_Color = $_POST['Prod_Color'];
    $Prod_Status = $_POST['Prod_Status'];
    $Prod_Precio = $_POST['Prod_Precio'];
    $Prod_ProvId = $_POST['Prod_ProvId'];

    $query = "INSERT INTO productos(Prod_Descripcion, Prod_Color, Prod_Status, Prod_Precio, Prod_ProvId) VALUES ('$Prod_Descripcion', '$Prod_Color', '$Prod_Status', '$Prod_Precio', '$Prod_ProvId')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Tarea guardada satisfactoriamente';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");    
}

?>