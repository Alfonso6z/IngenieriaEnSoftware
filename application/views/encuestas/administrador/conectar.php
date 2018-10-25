<?php
$mysqli = new mysqli("localhost", "root", "", "estudios");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


 $pregunta = $_POST['pregunta'];
$sql = "INSERT INTO reactivos( IDreactivo,pregunta, estudio) VALUES ('NULL','$pregunta', 1)";
if (!$resultado = $mysqli->query($sql)) {
    // ¡Oh, no! La consulta falló. 
    echo "Lo sentimos, este sitio web está experimentando problemas.";
     echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
} else{
	echo "La pregunta se guardó con exito ♥";
}
?>