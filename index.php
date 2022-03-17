<html lang="es">
<?php include("db.php")?>

<?php include("includes/header.php") ?>

<body>
    
    <div class="container p-4">
        <div class="row">

            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); } ?>

                <div class="card card-body">

                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="Prod_Descripcion" class="form-control"
                            placeholder="Descripcion" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="text" name="Prod_Color" class="form-control"
                            placeholder="Color" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="number" range(0,1) name="Prod_Status" class="form-control"
                            placeholder="Estatus" autofocus>
                        </div>

                        <div class="form-group">
                            <input type="number" name="Prod_Precio" class="form-control"
                            placeholder="Precio" autofocus>
                        </div>
                    
                        <div class="form-group">
                            <input type="number" name="Prod_ProvId" class="form-control"
                            placeholder="ID de Proveedor" autofocus>
                        </div>

                        <input type="submit" class="btn btn-success btn-block"
                        name="save_task" value="save_task">

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Color</th>
                        <th>Estatus</th>
                        <th>Precio</th>
                        <th>ID del Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php  
                    $query = "SELECT * FROM productos";
                    $result_tasks = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['Prod_Id'] ?></td>
                            <td><?php echo $row['Prod_Descripcion'] ?></td>
                            <td><?php echo $row['Prod_Color'] ?></td>
                            <td><?php echo $row['Prod_Status'] ?></td>
                            <td><?php echo $row['Prod_Precio'] ?></td>
                            <td><?php echo $row['Prod_ProvId'] ?></td>
                            <td>
                                <a href="edit.php?Prod_Id=<?php echo $row['Prod_Id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <br>
                                <a href="delete_task.php?Prod_Id=<?php echo $row['Prod_Id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
                
        </div>
    </div>

   <?php include("includes/footer.php") ?>
</body>
</html>