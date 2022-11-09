<?php
   include "post.php";

   enum Metodo: string {
       case TROPIPAY = 'T';
       case WELLSFARGO = 'WF';
       case PAYPAL = 'P';

   }

   $headers= [
    "Authorization:fb6c6d264feec5e72802a97ec0fd4017",
    "Content_type: application/json"
    ];

    $body= json_encode( array (
        'reference'=> 'SP000521',
        'concept'=> 'Cakes and Coffee',
        'description'=> 'Only the best products',
        'amount'=> '1500',
        'currency'=> 'USD',
        'lang'=> 'es',
        'urlSuccess'=> 'http://e-commers.com/success',
        'urlFailed'=> 'http://http://e-commers.com/failed',
        'urlNotification'=> 'https://e-commers.com/callback_notification'
        ));

    
  
   $ch = curl_init();
    curl_setopt_array($ch, [
      CURLOPT_URL=> "https://stoplight.io/mocks/tpp/tropipay-api-doc/5969711",
      CURLOPT_RETURNTRANSFER=> true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS=>$body,
      CURLOPT_HTTPHEADER=>$headers
  ]);
    
    $data= curl_exec($ch);

    $status_code= curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    var_dump($status_code);
    var_dump($data); 
        

?>