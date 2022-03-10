<?php
require_once './controller/Productos.php';
$productos = new Productos();
$respuesta = '';
if(isset($_GET['id']) && isset($_GET['delete'])){
 	  $id = $_GET['id'];
      
 	 
 	  $respuesta = $productos->delete_producto($id);

 	  echo json_encode($respuesta);

 	  exit;
    
}
if(isset($_POST)){
	  $respuesta = $productos->add_producto($_POST);
}


echo json_encode($respuesta);


?>