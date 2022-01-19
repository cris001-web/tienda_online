<?php include '../php/carrito.php';

include '../vistas/menu.html';


// SDK de Mercado Pago
require __DIR__ .  '/../vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-1697650272009746-011523-126fff0de9778530fa61a6dd4fcc3123-182601690');




?>
<br>

<div class="container">
<h3 class="text-center mt-5">TU CARRITO</h3>
<table class="table table-ligth">
<br>
        <br>

        <?php if(!empty($_SESSION['CARRITO'])){ 
            $total=0;
        ?>
                <table class="table table-light table-bordered">
                    <tbody>
                        <tr>
                            
                            <th width="40%">Producto</th>
                            
                            <th width="10%">Precio</th>
                            <th width="10%">Detalle</th>
                            <th width="10%">Cantidad</th>
                            <th width="5%">Total</th>
                            <th width="5%">ACCIONES</th>
                        </tr>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?> 
                
                        <tr>
                           <td width="30%"><?php echo $producto['NOMBRE']?> </td>
                           <td width="30%"><?php echo $producto['PRECIO']?> </td>
                           <td width="10%"><?php echo $producto['DETALLE_PRODUCTO']?></td>
                           <td width="10%"><?php echo $producto['CANTIDAD']?></td>
                           <td width="5%"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'],2)?></td>
                           <td width="5%"><form action="" method="post">
                                <input type="hidden" name="id_producto" value="<?php echo $producto['ID_PRODUCTO'];?> ">
                                <button class="btn btn-danger" type="submit" value="Eliminar" name="eliminarCarrito">Eliminar</button>
                            </form></td>
                           
                        </tr>
                        <?php $total=$total+$producto['PRECIO'] * $producto['CANTIDAD'];
                              

                        ?> 
              
                         
        <?php } ?> 
        <?php // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();
           
            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->title = 'Mi producto';
            $item->quantity = 1;
            $item->unit_price = $total;
            $preference->items = array($item);
            $preference->back_urls=array(
                "success"=>"http://localhost/tienda_online/php/muestra_detalle_pago_.php"
            );
            $preference->auto_return="approved";
            $preference->binary_mode=true;
            $preference->save();
        ?>
                        <tr>
                            <td colspan="4" align="right"><h3>TOTAL</h3></td>
                            <td align="right"><?php echo '$' .number_format($total,2);?></td>
                            <td> <div class="cho-container"></div></td>
                        </tr>
                    </tbody>
                </table> 
               
        
        <?php } else{ ?>
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-sm-8 align-self-center text-center">
                        <h1 class="bg-danger text-white">LO SIENTO...TU CARRITO ESTA VACÍO</h1>         
                        <img src="../imagenes/carrito_vacio.png" style="width: 500px ; height:400px ;">                
                        
                    </div>
                </div>

            </div>
        <?php } ?>
</div>

        

            

<?php 
    include '../vistas/footer.html';
?>