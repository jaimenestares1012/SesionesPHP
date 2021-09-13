 <?php session_start();
if (isset($_SESSION['usuario'])) {
	header('Location:index.php');
 	// code...
 } 

 //metodo para saber si se ha enviado por el metodo post
if($_SERVER['REQUEST_METHOD']=='POST'){
	$usuario=  filter_var( strtolower($_POST['usuario']) , FILTER_SANITIZE_STRING);
	$password=$_POST['password'];
	$correo=$_POST['correo'];
	$nombre=$_POST['nombre'];

	$password2=$_POST['password2'];


	$errores='';
	if (empty($usuario) or empty($password) or empty($password2)) {
			$errores .= '<li>Por favor rellena todos los datos </li>';
	}else{
		try {
				$conexion=new PDO('mysql:host=localhost;dbname=curso_login', 'root', 'jaimee123');
		} catch (PDOException $e) {
				echo "Eroor " . $e->getMessage();
		}
		$statement=$conexion->prepare('SELECT * FROM usuarios where usuario= :usuario limit 1');
		$statement->execute(array(':usuario'=>$usuario));
		$resultado=$statement->fetch();
		if($resultado!=false){
				$errores .='<li> El nomnbre de usuario ya existe </li>';
		}
		$password=hash('sha512', $password);
		$password2=hash('sha512', $password2);
		echo "$usuario . $password . $password2 .$correo. $nombre ";
		if($password!=$password2){
			$errores.='<li> las contraseñas no son las mismas</li>';
		}

	}
	if ($errores=='') {
				$statement=$conexion->prepare('INSERT INTO usuarios (id, usuario, nombre, correo, pass) values (null, :usuario, :nombre, :correo, :pass)');
				$statement->execute(array(
					':usuario'=>$usuario,
					':nombre'=>$nombre,
					':correo'=>$correo,
					':pass'=>$password
				));
				header('Location: login.php');
	}
}

require 'views/registrate.view.php';
  ?>