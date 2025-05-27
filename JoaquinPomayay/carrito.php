<?php
session_start();

$mensaje = ""; 

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case 'Agregar':

            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
               // $mensaje.= "Ok ID correcto " . $ID;
            } else {
                $mensaje.= "Upss... ID incorrecto " . $_POST['id'];
            }
            
           if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
               // $mensaje.= "Ok NOMBRE " . $NOMBRE;
                 }else  { $mensaje.= "Upps.. algo pasa con el nombre"; break;}

                 if (is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))) {
                    $CANTIDAD= openssl_decrypt($_POST['cantidad'],COD,KEY);
                    //$mensaje.= "Ok CANTIDAD  " . $CANTIDAD;
                     }else  { $mensaje.= "Upps.. algo pasa con la cantidad"; break;}

                     if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                        $PRECIO= openssl_decrypt($_POST['precio'], COD, KEY);
                       // $mensaje.= "Ok PRECIO " . $PRECIO;
                         }else  { $mensaje.= "Upps.. algo pasa con el precio"; break;}
    
                         
                         $mensaje.="Añadido en el carrito";

                     if (!isset($_SESSION['CARRITO'])) {
                        $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO
                        
                    );
                     $_SESSION['CARRITO'][0] = $producto;
                     $mensaje = "Productos agregado al carrito";
                    }else{
                        
                        $NumeroProductos=count($_SESSION['CARRITO']);
                         $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO
                        
                    );
                         $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                         $mensaje = "Productos agregado al carrito";
                            
                    }
                    //$mensaje=print_r($_SESSION,true);
                  
                  




        break;
        case "Eliminar":
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['ID'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);

                        // Reorganiza el array para evitar huecos en los índices
                        $_SESSION['CARRITO'] = array_values($_SESSION['CARRITO']);

                        break;
                    }
                }

            } else {
                $mensaje .= "Upss... ID incorrecto: " . $_POST['id'] . "<br/>";
            }
            break;

            }

}

?>