<?php
include '../php/carrito.php';


$estado_compra=$_GET['status'];
$order_id=$_GET['merchant_order_id'];
//echo 'esd'.$estado_compra. '-'.$order_id.'<br>';
$total=0;
foreach($_SESSION['CARRITO'] as $indice=>$producto){
    $total=number_format($producto['PRECIO'] * $producto['CANTIDAD'],4);
}
//echo 'total'.$total.'<br>';
if($estado_compra=='approved'){
    include('../database.php');

        
        
            foreach($_SESSION['CARRITO'] as $indice=>$producto){
                
                $detalle_producto=$producto['DETALLE_PRODUCTO'];
                $id_producto=$producto['ID_PRODUCTO'];
                $cantidad=$producto['CANTIDAD'];
                // $precio=$producto['PRECIO'];
                // $total=$producto['PRECIO'] * $producto['CANTIDAD'];
                // $subtotal=($producto['PRECIO'] * $producto['CANTIDAD'];

                
                $query_detalle = "INSERT INTO pedidos (`id`, `detalle`, `id_producto`, `cantidad`) 
                VALUES ('','$detalle_producto','$id_producto','$cantidad')";
                $result_detalle =  mysqli_query($conexion,$query_detalle);
                echo print_r($query_detalle).'<br>';
                if (!$result_detalle) {
                    echo('ERROR DE BASE DE DATOS');//mysqli_error($conexion)
                   
                    //echo print_r($query_detalle);
                }else{
                    echo 'SE AGREGO EXITOSAMENTE_detalle!';
                    header("location:../vistas/mostrarCarrito.php");



                    
                }
            }
        

     
}else{
    echo 'no aprovado';
}
?>