<html>
<head>
<title>Cruz cotizador</title>
<link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
<?php

header("Content-Type: text/html;charset=utf-8");
?>
<meta http-equiv="refresh" content="4; url=./listado.php" />
<?php

// Create connection
$con = mysqli_connect("localhost", "root", "new14you", "cruz");

// Check connection
if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['precio']) && isset($_POST['articulo'])) {
    // Escape any html characters

	$pid = $_POST['pid'];
        $productoPrecio = $_POST['precio'];
	$productoNombre = $_POST['articulo'];
//	$productoNombre = str_replace('-','"',$productoNombre);
	//echo $pid; echo $productoPrecio; echo $productoNombre;



//        mysqli_query($con, "UPDATE productos SET productoPrecio=".$productoPrecio." WHERE pid=". $pid);

	//$sql = "UPDATE productos SET productoPrecio=".$productoPrecio." WHERE pid=".$pid.";";

        if (mysqli_query($con, "UPDATE productos SET productoNombre='".$productoNombre."', productoPrecio=".$productoPrecio." WHERE pid=". $pid) === TRUE) {
	// if ($conn->query($sql) === TRUE) {
    		echo "Articulo actualizado.";
		
	} else {
    		echo "Error actualizando el articulo. ";
		echo "<br>".$productoNombre."<br>".$productoPrecio;
	}	

}else{

        echo "Error. Verifique que haya ingresado un precio valido.";
}

?>
</body>
</html>
