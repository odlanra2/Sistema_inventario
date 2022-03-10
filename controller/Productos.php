<?php
require_once './models/productoModels.php'; 
class Productos{

	private $productoModel;


	public function __construct(){
         $this->productoModel = new productoModels();

	}

	public function get_productos(){
        return  $this->productoModel->get_productos();
	}


	public function get_for_id($id){
		  return  $this->productoModel->get_for_id($id);
	}

	public function add_producto($value){
     
        return  $this->productoModel->add_producto($value);
	}

	public function delete_producto($id){
         
         return  $this->productoModel->delete_producto($id);
	}

	public function vender($id){
         
		  return  $this->productoModel->vender_productos($id);
	}
}

?>