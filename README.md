# Sistema_inventario
Sistema de inventario para cafeteria, Konecta

1) descargue o clonelo en su directorio 
2) suba la base de datos cafeteria.sql para que funcione el sistema, el archivo de conexion se encuntra en la carpeta conexion/conectar.php, puede editar este archivo si desea usar otro nombre de base de datos o si tiene contraseña editando estas variables:

private $ServidorDB = "localhost";	
private	$BaseDatos  = "cafeteria"; 	
private $UsuarioDB  = "root"; 
private  $ClaveDB    = ""; 	 


Este sistema esta desarrollado en php nativo y Mysql, para una mejor experiencia utilice la libreria de jquery y para los estilos bootstrap

Realizar una consulta que permita conocer cuál es el producto que más stock tiene:


SELECT nombre,precio, stock FROM productos WHERE stock = (SELECT MAX( stock ) FROM productos);
