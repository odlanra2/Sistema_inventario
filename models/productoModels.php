<?php
require_once './conexion/conectar.php'; 

class productoModels{
   
 private $conexion;
 private $sql;
 private $nConexion;
 private $ra;

   public function __construct(){
      $this->conexion = new conectar();
   }


    public function get_productos(){
        //$this->conexion = new conectar(); 
        
       $this->nConexion    = $this->conexion->conectarBD();
       $this->sql="SELECT * FROM productos";
       $this->ra = mysqli_query( $this->nConexion,$this->sql)or trigger_error("Error en consulta! SQL: $query - Error: ".mysqli_error(), E_USER_ERROR);
        $row =[];
        while( $detalles1 = mysqli_fetch_assoc($this->ra)) { 
              $row [] = $detalles1;
        }
       return  $row;
    }

    public function get_for_id($id){
    
       $this->nConexion    = $this->conexion->conectarBD();
       $this->sql="SELECT * FROM productos where ID='$id'";
       $this->ra = mysqli_query( $this->nConexion,$this->sql)or trigger_error("Error en consulta! SQL: $query - Error: ".mysqli_error(), E_USER_ERROR);

       return mysqli_fetch_assoc($this->ra);
    }


     public function add_producto($value){
        
       $this->nConexion    = $this->conexion->conectarBD();
       if($value['id']!=''){
            $sql = "UPDATE productos SET nombre = '".$value['nombre']."', referencia = '".$value['referencia']."', precio ='".$value['precio']."',peso='".$value['peso']."', categoria = '".$value['categoria']."', stock='".$value['stock']."' WHERE ID = ".$value['id'];
            $update =  mysqli_query( $this->nConexion , $sql );
            if($update){
            	    return true;
            }else{
            	   return false; 
            }

            exit;
       }

      $sql = "INSERT INTO productos (nombre, referencia, precio, peso, categoria, stock)
        VALUES ('".$value['nombre']."', '".$value['referencia']."', '".$value['precio']."', '".$value['peso']."', '".$value['categoria']."',  '".$value['stock']."')";
      
       $insert = mysqli_query( $this->nConexion ,$sql);

     

       if($insert){
       	   return true;
       }else{
       	  return false;
       }
	

	 }

	

	 public function delete_producto($id){
         $this->nConexion    = $this->conexion->conectarBD();

         $sql="DELETE from productos where ID = $id";
         $ra = mysqli_query($this->nConexion,$sql);
	 


	 }

   public function vender_productos($id){
       $this->nConexion    = $this->conexion->conectarBD();
       $this->sql="SELECT stock, ventas FROM productos where ID='$id'";
       $this->ra = mysqli_query( $this->nConexion,$this->sql)or trigger_error("Error en consulta! SQL: $query - Error: ".mysqli_error(), E_USER_ERROR);

       $stock = mysqli_fetch_assoc($this->ra);

      
       if($stock['stock']>0){
            $stock = $stock['stock'] - 1;
            $ventas = $stock['ventas'] + 1;
            $sql = "UPDATE productos SET  stock='".$stock."', ventas='".$ventas."' WHERE ID = ".$id;
              $update =  mysqli_query( $this->nConexion , $sql ); 
           return $sql;
       }
     


   }

   


}
?>