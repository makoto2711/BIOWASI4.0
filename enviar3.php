<?php 
//$nombre = $_POST['nombre'];    //ESTE PHP ESTA HECHO PARA ENVIAR CORREOS
$mail = $_POST['email'];
/*$celular = $_POST['celu'];
$mess = $_POST['mensaje'];
$sede =  $_POST['sede'];

 EVALUAR SEDE
  if($sede == 'sede0')
	 {
	 	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vODZkZWE0MDAtNTE4Yy0xMWU5LTg5ZmItYTVlMjM4ODZjOGVj';
	 }
   elseif ($sede == 'Sede1') 
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vYTExYmViMjAtNTE5MS0xMWU5LTgwODUtMDM0NGU3ZDVjMTlh';
   } 	
    elseif ($sede == 'Sede2') 
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vMWYyMzY4NDAtNTE5Mi0xMWU5LWE0ZTctOTliYWViMWVkZjc0';
   } 
    elseif ($sede == 'Sede3') 
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vOTFkMjE0OTAtNTE5Mi0xMWU5LWJiMjgtYjcwYjkxMzE4ZDU3';
   } 
    elseif ($sede == 'Sede4') 
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vYTlmYTY1ZjAtNTQyYS0xMWU5LTgwNDktZjdhMWMxNTg4YTdk';
   } 
    elseif ($sede == 'Sede5') 
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vOTY3MTE4MjAtNTE5Mi0xMWU5LWE4ZTAtMjdlOThmMTg0NDFm';
   } 
    elseif ($sede == 'Sede6') 
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vNTEzY2Q3NzAtMWI1Ni0xMWU5LWEyMWItYTU3NTk0YjgwZTVm';
   } 
    elseif ($sede == 'nada') 
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vYjY4NmMwZTAtMWI1Ny0xMWU5LWJiZWEtZWZlM2ZkMGJhMGI0';
   } 
    else
   {
  	$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vNTVjZjU3ZTAtMWI1Ni0xMWU5LWE1ZDMtOTcwZDJkNGZjNmI0';
   } 
   
*/


/*$roomid = 'Y2lzY29zcGFyazovL3VzL1JPT00vNmQ0ODIxZDAtMGY2OC0xMWU5LTkxOTMtMDFhYTBjNDBjN2Nk';*/ 

/*$header = 'From: '  .  $mail  . " \r\n";
$header .= "X-Mailer: PHP/"  .  phpversion()  .  " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";*/


    //$mensaje = "Este mensaje fue enviado por: "  .  $nombre  .  ", \n";
$mensaje = "Este Correo fue enviado desde el Apartado (Dejanos tu correo) " .  ", \n";
$mensaje .= " e-mail recibido: "  .  $mail  .  " \n";
/*$mensaje .= "Su celular es: "  .  $celular  .  " \n";
$mensaje .=  "Mensaje: "   .  $_POST['mensaje'] .  " \n";*/
$mensaje .=	 "Enviado el "  .   date('d/m/y', time());

if ($mail == "") 
{

$para = '';
$asunto =  'SPAMMMM';
    
}
else
{
    //$mensaje = "Este mensaje fue enviado por: "  .  $nombre  .  ", \n";
$mensaje = "Este Correo fue enviado desde el Apartado (Dejanos tu correo) " .  ", \n";
$mensaje .= " e-mail recibido: "  .  $mail  .  " \n";
/*$mensaje .= "Su celular es: "  .  $celular  .  " \n";
$mensaje .=  "Mensaje: "   .  $_POST['mensaje'] .  " \n";*/
$mensaje .=	 "Enviado el "  .   date('d/m/y', time());

$para = 'hola@biowasi.com';
$asunto =  'Mensaje de mi sitio web';
}


mail($para, $asunto, utf8_decode($mensaje), $header);

$ch = curl_init();
$token = "YzllY2ZjNjAtNGM0MS00ZjkzLWE5OTMtY2ZiMGJiOTRjODM3MGMwZDMyMmItYTgw_PF84_consumer";
$headers = array('Content-Type: application/json',
'Authorization: Bearer ' . $token);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

 
// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"https://api.ciscospark.com/v1/messages");
// indicamos el tipo de petición: POST
curl_setopt($ch, CURLOPT_POST, TRUE);
// definimos cada uno de los parámetros
$data = array("roomId" => $roomid, "text" => $mensaje);            
$data_string = json_encode($data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
 
// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
 
// cerramos la sesión cURL
curl_close ($ch);
 
// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos



header("location: /")
 ?>