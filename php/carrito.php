<?php 
session_start();
//session_destroy();

 
$mensaje='';
if (isset($_POST['agregarCarrito'])) { 
    
            $id_producto=$_POST['id_producto'];
            $nombre=$_POST['nombre'];
            $detalle_producto=$_POST['detalle_producto'];
            $cantidad=$_POST['cantidad'];
            $precio=$_POST['precio'];
            $imagen=$_POST['imagen'];
            
            
        
        if(!isset($_SESSION['CARRITO'])){
     
            $producto=array(
                'ID_PRODUCTO'=>$id_producto,
                'NOMBRE'=>$nombre,
                'DETALLE_PRODUCTO'=>$detalle_producto,
                'CANTIDAD'=>$cantidad,
                'PRECIO'=>$precio,
                'IMAGEN'=>$imagen
            ) ;
            $mensaje="Producto Agregado Exitosamente";
            $_SESSION['CARRITO'][0]=$producto;
            
        } else{
            $tomarId=array_column($_SESSION['CARRITO'],"ID_PRODUCTO");
            if(in_array($id_producto,$tomarId)){
                echo "<script>alert('Elemento ya encontrado');</script>";
            }else{
                $contadorProducto=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID_PRODUCTO'=>$id_producto,
                    'NOMBRE'=>$nombre,
                    'DETALLE_PRODUCTO'=>$detalle_producto,
                    'CANTIDAD'=>$cantidad,
                    'PRECIO'=>$precio,
                    'IMAGEN'=>$imagen
                ) ;
                $mensaje="Producto Agregado Exitosamente";
                $_SESSION['CARRITO'][$contadorProducto]=$producto;
            // $mensaje= print_r($_SESSION,true);
            }
           

            
        }
        //case 'Eliminar':
            
            //  $id_producto=$_POST['id_producto'];
            //  echo 'ID_DEL PRODUCTO'.$id_producto;
            // //itero session carrito y busco el id para borrar
            // if(!empty($_SESSION['CARRITO'])){ 
            //     echo 'NO VACIO'; 
            //     foreach($_SESSION['CARRITO'] as $indice=>$producto){
            //        // echo $producto['ID_PRODUCTO'].'--'.$id_producto.'<br>';
            //         $ID_PR=$producto['ID_PRODUCTO'];
            //         echo '<br>'.$ID_PR.'<BR>';
            //         if ($ID_PR==$id_producto) {
                        
            //             unset($_SESSION['CARRITO'][$indice]);
            //             echo 'SI ENTR0';

            //         }else{
            //             echo 'NO ENTR0';
            //         }
            //     }
            // }else{
            //     echo 'empty vacio'; 
                //break; 
            //}
        
            
    }

    if (isset($_POST['eliminarCarrito'])) { 
       
       

        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            
            $id_prod=intval($_POST['id_producto']);
            //echo 'ID_DEL PRODUCTO'.$id_prod;
            $id_prodArray=intval($producto['ID_PRODUCTO']);
             echo gettype($id_prod), "\n";
             echo gettype($id_prodArray), "\n";
            //echo 'id_producto del array'.$producto[1].'<br>';
            //exit();
            
            if ($id_prodArray==$id_prod) {
                    
               unset($_SESSION['CARRITO'][$indice]);
                echo "<script>alert('Elemento borrado');</script>";
                echo 'entro';
               
            }else{
                echo 'NO ENTR0';
            }
        }
    } else { 
       echo 'vacio';
    }



?>