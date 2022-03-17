<?php 
    include("db.php");

    if(isset($_GET['Prod_Id'])) {
        $Prod_Id = $_GET['Prod_Id'];
        $query = "SELECT * FROM productos WHERE Prod_Id = $Prod_Id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) ==1) {
            $row = mysqli_fetch_array($result);
            $Prod_Descripcion = $row['Prod_Descripcion'];
            $Prod_Color = $row['Prod_Color'];
            $Prod_Status = $row['Prod_Status'];
            $Prod_Precio = $row['Prod_Precio'];
            $Prod_ProvId = $row['Prod_ProvId'];
        }
    }

    if (isset($_POST['update'])) {
        $Prod_Id = $_GET['Prod_Id'];
        $Prod_Descripcion = $_POST['Prod_Descripcion'];
        $Prod_Color = $_POST['Prod_Color'];
        $Prod_Status = $_POST['Prod_Status'];
        $Prod_Precio = $_POST['Prod_Precio'];
        $Prod_ProvId = $_POST['Prod_ProvId'];

        $query = "UPDATE productos SET Prod_Descripcion = '$Prod_Descripcion', 
        Prod_Color = '$Prod_Color', 
        Prod_Status = '$Prod_Status', 
        Prod_Precio = '$Prod_Precio', 
        Prod_ProvId = '$Prod_ProvId' WHERE Prod_Id = $Prod_Id ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Producto Acualizado Exitosamente';
        $_SESSION['message_type'] = 'warning';

        header("Location: index.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?Prod_Id=<?php echo $_GET['Prod_Id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="Prod_Descripcion" value="<?php echo $Prod_Descripcion; ?>"
                        class="from-control" placeholder="Actualizar la Descripcion del Producto">
                    </div>

                   <div class="form-group">
                        <input type="text" name="Prod_Color" value="<?php echo $Prod_Color; ?>"
                        class="form-control" placeholder="Actualizar Color">
                   </div>

                    <div class="form-group">
                        <input type="number" name="Prod_Status"  value="<?php echo $Prod_Status; ?>"
                        class="form-control" placeholder="Actualizar Estatus">
                    </div>

                    <div class="form-group">
                        <input type="number" name="Prod_Precio"  value="<?php echo $Prod_Precio; ?>"
                        class="form-control" placeholder="Actualizar Precio">
                    </div>
                    
                    <div class="form-group">
                        <input type="number" name="Prod_ProvId" value="<?php echo $Prod_ProvId; ?>"
                        class="form-control" placeholder="Actualizar ID de Proveedor">
                    </div>

                    <button class="btn btn-success" name="update">
                        Actualizar 
                    </button>

                </form>
            </div>
        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>

