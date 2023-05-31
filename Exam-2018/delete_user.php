<?php
include_once 'data_access.class.php';
$res = new stdClass();
$res->deleted=false;
$res->message='';
try{
    $datoscrudos = file_get_contents("php://input");
    $datos = json_decode($datoscrudos);
    $query="DELETE FROM usuarios WHERE cuenta=?";
    $params = array($datos->cuenta);
    DB::execute_sql($query, $params);
    $res->deleted=true;
}catch(Exception $e){
    $res->message=$e->getMessage();
}
header("Content-type: application/json");
echo json_encode($res);