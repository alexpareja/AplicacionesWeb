 <!DOCTYPE>
<html>
<head>
	<title>Procesar Login</title>
</head>
<body>
<?php
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$pass = isset($_POST['password']) ? $_POST['password'] : null;

	if ($email == null or $pass == null) {
		$error = 'Contraseña y email incorrectos. Por favor, inténtelo de nuevo.';
		include ("login.php");
	} else {
		$db = @mysqli_connect('localhost', 'root', '', 'usuarios');

		if ($db) {
			$sql = 'SELECT * FROM usuarios WHERE Correo = ?';

			$consulta = mysqli_prepare($db, $sql);
			mysqli_stmt_bind_param($consulta, 's', $correo);
			$correo = $email;
			mysqli_stmt_execute($consulta);
			$resultado = mysqli_stmt_get_result($consulta);

			if ($fila = mysqli_fetch_assoc($resultado)) {
				if ($fila['contr'] == $pass) {
					session_start();
					$_SESSION['nombre'] = $fila['nombre'];
					$_SESSION['correo'] = $email;
					include ("index.php");
				} else {
					$error = 'Contraseña incorrecta. Por favor, inténtelo de nuevo.';
					include ("login.php");
				}
			} else {
				$error = 'Email incorrecto. Por favor, inténtelo de nuevo.';
				include ("login.php");
			}
		} else {
			printf('Error %d: %s.<br />', mysqli_connect_errno(), mysqli_connect_error());
		}
	}
?>
</body>
</html> 