<?php
include "config.php";
include "utils.php";

$dbConn =  connect($db);

/*
  listar todos los metodos de pago o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      //Mostrar un metodo de pago
      $sql = $dbConn->prepare("SELECT * FROM apis_pago where id=:id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Mostrar lista de metodos de pago
      $sql = $dbConn->prepare("SELECT * FROM apis_pago");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
}

// Crear un nuevo metodo de pago
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO apis_pago
          (nombre, api_key1, api_key2, api_key3, id)
          VALUES
          (:nombre, :api_key1, :api_key2, :api_key3, :id)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id'];
  $statement = $dbConn->prepare("DELETE FROM apis_pago where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);

    $sql = "
          UPDATE apis_pago
          SET $fields
          WHERE id='$postId'
           ";

    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>