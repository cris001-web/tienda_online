<?php

include('../database.php');


?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../tienda_online/css/index_css.css"></link>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       
    <title>Mi pagina de prueba</title>
  </head>
  <body>
    <div class="container">
            <h3 class="text-center">PEDIDOS</h3>
        <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">NOMBRE DEL CUADRO</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">--</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM `pedidos` INNER JOIN producto on pedidos.id_producto=producto.id_producto";
        $result =  mysqli_query($conexion,$query); 
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><form action="pedidos.php" method="post">
                                <input type="hidden" name="id_pedido" value="<?php echo $row['id'];?> ">
                                <button class="btn btn-danger" type="submit" value="Eliminar" name="eliminarPedido">Eliminar</button>
                            </form>
            </td>
          </tr>
        <?php }?>  
        </tbody>
      </table>
    </div>
    
        
  </body>
</html>

<?php
     if (isset($_POST['eliminarPedido'])) { 
        $id_pedido=$_POST['id_pedido'];
        //echo 'ID_DEL PRODUCTO'.$id_pedido;;


        
        $query_el = "DELETE FROM `pedidos` WHERE `pedidos`.`id` = $id_pedido";
        $result_el =  mysqli_query($conexion,$query_el);

        if (!$result_el) {
            echo('ERROR DE BASE DE DATOSbb');//mysqli_error($conexion)
            echo print_r($query_el);
        }else{
            //echo  "<script>alert('Elemento borrado');</script>";
            header("location:pedidos.php");
            //echo  "<script>alert('Elemento borrado');</script>";
        }

     }
?>