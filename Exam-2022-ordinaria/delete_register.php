<?php
include_once 'data_access.class.php';
$res = new stdClass();
$res->deleted=false;
$res->message='';
try{
    $datoscrudos=file_get_contents("php://input");
    $datos = json_decode($datoscrudos);
    $query="DELETE FROM registroestado WHERE id = ?";
    $param= array($datos->id);
    DB::execute_sql($query, $param);
    $res->deleted=true;
}catch(Exception $e){
    $res->message=$e->getMessage();
}
header("Content-type:application/json");
echo json_encode($res);