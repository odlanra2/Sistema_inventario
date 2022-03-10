<?php
require_once './controller/Productos.php'; 
$productos = new Productos();
?>
<!DOCTYPE html>
<html>
<head>
	<title>KONECTA,Cafeteria </title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

   <div class="container" style="margin-top:20px">
     <h2>Sistema inventario <span style="color:purple">Cafeteria, KONECTA</span></h2>
     <a type="button" class="lightbox btn btn-primary" title="Ingresar producto"  data-type="iframe" href="modal.php">
     	Agregar producto
     </a> 
    
   	 <table class="example" class="display table table-striped table-bordered" style="">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Referencia</th>
                <th>Precio</th>
                <th>Peso</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Acciones</th>
               
            </tr>
        </thead>
	     <tbody>
	     	<div class="pre-load"></div>
	     	 <?php foreach($productos->get_productos() as $producto){ 
                
                  $fecha = new  DateTime($producto['fecha_creacion']);
	     	 ?>
				   <tr>
				      <td><?php  echo $fecha->format('d/m/Y') ?></td>
				      <td><?php  echo $producto['nombre'] ?></td>
				      <td><?php  echo $producto['referencia'] ?></td>
				      <td><?php  echo $producto['precio'] ?></td>
				      <td><?php  echo $producto['peso'] ?></td>
				      <td><?php  echo $producto['categoria'] ?></td>
				      <td><?php  echo $producto['stock'] ?></td>
				    
				      <td>
				       <a  class="lightbox" title="Editar producto"  data-type="iframe" href="modal.php?id=<?php echo $producto['ID'] ?>">
                               <span class="icon-pencil"></span> 
                           </a>

                          <a class='delete' title="Eliminar producto"  style="margin-left:20px" href="productos_handle.php?id=<?php echo $producto['ID'] ?>&delete='eliminar'">
                               <span class="icon-bin"></span>
                           </a>  
				      		
                       
				      	</td>
				  </tr>
			  <?php }?>

	    </tbody>
	    
	  </table> 

	  <footer>
	
	      <p style="margin-top:100px">Sitio creado por Arnaldo Lameda<p>
     </footer>	
     
   </div>

  

<script
  src="assets/js/jquery.min.js"></script>

  <script src="assets/js/bootstrap.min.js" ></script>
<script
  src="assets/js/datatables.min.js"></script>

 <script
  src="assets/js/custom.js"></script> 
</body>
</html>