<?php include 'php/carrito.php';
include 'vistas/menu.html';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>index</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../tienda_online/css/index_css.css"></link>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       
        
        
           
    </head>
    <body>
    

        <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel" id="inicio">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../tienda_online/imagenes/Sin título-2.png" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../tienda_online/imagenes/paisaje.png" class="d-block w-100 img-fluid" alt="...">
                </div>
                <!-- <div class="carousel-item">
                    <img src="../img-sistema/cross.jpg" class="d-block w-100" alt="...">
                </div> -->
            </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>
    <br> 
    <?php if($mensaje!==""){?>   
        <div class=" alert alert-success">
            
            <a href="#" class="badge badge-success">ver carrito</a> 
            <?php echo $mensaje;?>
        </div> 
     <?php } ?> 
      
    <div class="cajaCatalogo">
        <div class="container">
            <h1 class=" titulo1 display-4 mt-5 ml-5"  >NUESTRO CATALOGO</h1>
            <div class="card-deck">
                <?php
                    include('database.php');
                    $query = "SELECT * FROM producto";
                    $result =  mysqli_query($conexion,$query); 
                    while ($row = mysqli_fetch_array($result)) {
                ?> 
                <div class="card">
                  <img class="card-img-top" src="../tienda_online/imagenes/<?php echo $row['imagen']?>" alt="Card image cap">
                  
                    
                        <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                                <p class="card-text"><small class="text-muted"><?php echo $row['detalle_producto']; ?></small></p>
                                <p class="card-text"><small class="text-muted">$<?php echo $row['precio']; ?></small></p>
                                <input type="hidden" id="imagen" value="<?php echo $row['imagen'];?>" >
                        
                        </div>  
                        <form action="" method="POST">  
                            <input type="hidden" name="id_producto" value="<?php echo $row['id_producto'];?>" >  
                            <input type="hidden" name="nombre" value="<?php echo $row['nombre'];?>" >
                            <input type="hidden" name="detalle_producto" value="<?php echo $row['detalle_producto'];?>" >
                            <input type="hidden" name="precio" value="<?php echo $row['precio'];?>" >
                            Cantidad:<input type="number" name="cantidad" class="text-center mb-2" style="width: 4rem;" value="<?php echo 1;?>" >
                            <input type="hidden" name="imagen" value="<?php echo $row['imagen'];?>" >
                            <button type="submit" class="btn btn-success btn-lg btn-block" name="agregarCarrito" value="Agregar">AGREGAR</button>
                        </form>    
                    
                </div>
                <?php
                    }
                   
                ?>
        </div>
    </div>
    
       
        
      
   
        <?php 
            include 'vistas/footer.html';
        ?>

                                
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    
      

