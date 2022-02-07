<?php 
$page   = isset($_GET['$page'])   ?$_GET['$page']   : NULL; //id de la ligne sur la bdd
$dataId   = isset($_GET['$data'])   ?$_GET['$data']   : NULL; //id de la ligne sur la bdd
$detail   = isset($_GET['$detail'])   ?$_GET['$detail']   : NULL; // delete ou update
//form update
$data_up   = isset($_GET['$data_up'])   ?$_GET['$data_up']   : NULL;
$data = json_decode($data_up);
$url = "http://127.0.0.1:3000/".$page."/".$dataId;
switch ($page) {
    case 'companies':
        $updateArray = ['nom' => $data[0], 'adresse' => $data[1],'lieu' => $data[2],'tel' => $data[3],'description' => $data[4]];
        break;
    case 'advertisement':
        $updateArray = ['companiesId' => $data[0], 'nom' => $data[1],'contrat' => $data[2],'salaire' => $data[3],'tempsDeTravail' => $data[4],'description' => $data[5]];
        break;
    case 'information':
        $updateArray = ['advertisementId' => $data[0],'messageUser' => $data[1],'nom' => $data[2],'mail' => $data[3],'tel' => $data[4]];
        break;
    case 'stock_people':
        $updateArray = ['nom' => $data[0], 'prenom' => $data[1],'tel' => $data[2],'mail' => $data[3],'mdp' => $data[4], 'role' => $data[5]];
        $url = "http://127.0.0.1:3000/".$page."/id"."/".$dataId;
        break;
    
    default:
        echo ("Une erreur est survenue");
        break;
}
if ($detail == "delete") {
  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $result = json_decode($result);
    curl_close($ch);
    print_r($result);
    if ($result) {
        echo '<meta http-equiv="refresh" content="0; url=./'.$page.'.php">';
    }
}
else{  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($updateArray));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
    $headers = [];
    $headers[] = 'Content-Type:application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  
    $result = curl_exec($ch);
    $result = json_decode($result);
    curl_close($ch);
  
    print_r($result);
    if ($result) {
    echo '<meta http-equiv="refresh" content="0; url=./'.$page.'.php?">';
    }
  
}
    
    
?>