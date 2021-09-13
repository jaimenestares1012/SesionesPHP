<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Registrate</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Registrate</h1>
		<hr class="border">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario" name="login">
			<div class="form-group">
				<input type="text" name="usuario" class="usuario" placeholder="usuario">
			</div>
			<div class="form-group">
				<input type="email" name="correo" class="correo" placeholder="correo">
			</div>
			<div class="form-group">
				<input type="text" name="nombre" class="nombre" placeholder="nombre">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="password" placeholder="contraseña">
			</div>
			<div class="form-group">
				<input type="password" name="password2" class="password_btn" placeholder="Repita la contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>		
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>		
		</form>
		<p class="texto-registrate">
			¿Ya tienes cuenta?
			<a href="login.php"> Iniciar Sesion</a>
		</p>
	</div>
</body>
</html>