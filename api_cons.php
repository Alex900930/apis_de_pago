<?php
    //AQUI LO QUE HAGO ES LLAMAR A MI API, PARA OBTENER LAS API KEY Q TENGO EN BD    
    $data_de_post= file_get_contents('http://localhost/tarea/post.php');

    if (!$data_de_post) {
      trigger_error("Incapaz de abrir la URL ($url)", E_USER_ERROR);
    }
    
    $arr=json_decode($data_de_post,TRUE);

    //AQUI USO TROPIPAY COMO EJEMPLO PERO PUEDE SER CUALQUIERA DE LOS METODOS DE PAGO.
    $metodo_pago= "tropipay";

    function getApiKey($arr, $metodo_pago){
      $result= '';
      foreach ($arr as $row){
        if($row["nombre"]==$metodo_pago){
        // echo "id: ".$row["id"]." - nombre: ".$row["nombre"]." - api_key1: ".$row["api_key1"].PHP_EOL;
        $result=$row["api_key1"];
        }break;
      }
      return $result;
    }
   
    $var=getApiKey($arr,$metodo_pago);
    

   $headers= [
    "Authorization:$var",
    "Content_type: application/json"
    ];

    // $body= json_encode( array (
    //     'reference'=> 'SP000521',
    //     'concept'=> 'Cakes and Coffee',
    //     'description'=> 'Only the best products',
    //     'amount'=> '1500',
    //     'currency'=> 'USD',
    //     'lang'=> 'es',
    //     'urlSuccess'=> 'http://e-commers.com/success',
    //     'urlFailed'=> 'http://http://e-commers.com/failed',
    //     'urlNotification'=> 'https://e-commers.com/callback_notification'
    //     ));

    
   // AQUI LLAMO LA API DE TROPIPAY QUE DEVUELVE "Obtener lista de movimientos de usuarios(Get User Movements List)"
   $ch = curl_init();
    curl_setopt_array($ch, [
      CURLOPT_URL=> "https://stoplight.io/mocks/tpp/tropipay-api-doc/5969711/movements",
      CURLOPT_RETURNTRANSFER=> true,
      CURLOPT_CUSTOMREQUEST => "GET",
      // CURLOPT_POSTFIELDS=>$body,
      CURLOPT_HTTPHEADER=>$headers
  ]);
    
    $data= curl_exec($ch);

    $status_code= curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    var_dump($status_code);
    var_dump($data); 
        

?>