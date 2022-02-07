<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Informations</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="../style/admin.css"/>
        
</head>
<body>
  <h1>information</h1>
  <header>
    <div id="link">
      <ul id="navBar">
        <li><a href="home.php">Utilisateurs</a></li>
        <li><a href="companies.php">Companies</a></li>
        <li><a href="information.php">Information</a></li>
        <li><a href="advertisement.php">Advertisement</a></li>
        <li class="right"><a href="../role.php?deco=1">Deconnexion</a></li>
        <li class="right"><a href="../index.php">Accueil</a></li>
      </ul>
    </div>
  </header>
  <div class="random"></div>
</body>

<?php
  //declaration  
  $advertId       = isset($_POST['advertId'])           ?$_POST['advertId']      : NULL;
  $messageUser        = isset($_POST['messageUser'])            ?$_POST['messageUser']       : NULL;
  $mail           = isset($_POST['mail'])               ?$_POST['mail']          : NULL;
  $nom           = isset($_POST['nom'])               ?$_POST['nom']          : NULL;
  $tel           = isset($_POST['tel'])               ?$_POST['tel']          : NULL;
  $test           = isset($_POST['test'])               ?$_POST['test']          : NULL;
  $test2          = isset($_POST['test2'])              ?$_POST['test2']         : NULL;
  $update         = isset($_POST['update'])             ?$_POST['update']        : NULL;
  $update_test    = isset($_POST['update_test'])        ?$_POST['update_test']   : NULL;
  //form update
  $advertId_up   = isset($_POST['advertId_up'])   ?$_POST['advertId_up']   : NULL;
  $messageUser_up    = isset($_POST['messageUser_up'])    ?$_POST['messageUser_up']    : NULL;
  $mail_up           = isset($_POST['mail_up'])               ?$_POST['mail_up']          : NULL;
  $nom_up           = isset($_POST['nom_up'])               ?$_POST['nom_up']          : NULL;
  $tel_up           = isset($_POST['tel_up'])               ?$_POST['tel_up']          : NULL;
  $url =  "http://127.0.0.1:3000/information/";
  
  $data = [
  'advertisementId' => $advertId,
  'messageUser'    => $messageUser,
  'nom'    => $nom,
  'mail'    => $mail,
  'tel'    => $tel,
];
function curl_post($url, array $post = NULL, array $options = array())
{
  $defaults = array(
      CURLOPT_POST => 1,
      CURLOPT_HEADER => 0,
      CURLOPT_URL => $url,
      CURLOPT_FRESH_CONNECT => 1,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_FORBID_REUSE => 1,
      CURLOPT_TIMEOUT => 3,
      CURLOPT_POSTFIELDS => http_build_query($post)
    );
    
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
  if( ! $result = curl_exec($ch))
  {
    echo "<script>alert ('Veuillez vérifier si vous respectez les clés étrangères\\n(advertisementId et stock_peopleId) ') ;</script>";
    }
    else 
    {
        echo "<script>alert ('information ajouté') ;</script>";
        echo '<meta http-equiv="refresh" content="0; url=#">';
    }
    curl_close($ch);
}

$cSession = curl_init(); 
curl_setopt($cSession,CURLOPT_URL,$url);
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
$result=curl_exec($cSession);
curl_close($cSession);
$result_arr =  json_decode( $result,true);
echo"  <table id='tableData' class='table table-responsive-full'>
    <thead>
      <tr>
        <th class='oui'>Idinformation</th>
        <th class='oui'>Id advertisement</th>
        <th class='oui'>Message</th>
        <th class='oui'>nom</th>
        <th class='oui'>mail</th>
        <th class='oui'>tel</th>
        <th class='oui'>Action</th>
      </tr>
    </thead>";
foreach ($result_arr as $elem) {
    $id = $elem['informationId'];
    echo ("
      <tbody>
        <tr>
          <td class='oui' data-label='informationId'>" .$elem['informationId']."</td>
          <td class='oui' data-label='AdvertisementId'>" .$elem['advertisementId']."</td>
          <td class='oui' data-label='Description'><div class='description'>" .$elem['messageUser']."</div></td>
          <td class='oui' data-label='Description'><div class='description'>" .$elem['nom']."</div></td>
          <td class='oui' data-label='Description'><div class='description'>" .$elem['mail']."</div></td>
          <td class='oui' data-label='Description'><div class='description'>" .$elem['tel']."</div></td>
          <td class='oui' data-label='Action'>
          <button class='button' value='$id'>Supprimer</button>
          <form action='' method='post'>
            <input class='button' type='submit' value='Modifier' name='update'>
          </form>
          </td>
        </tr>
      </tbody>"
    );
  }
  echo "</table>";
  echo(' <!-- Affichage du first btn -->
<form action="" method="post">
<input class="button" type="submit" value="Ajouter" name="test2">
</form>'
);
if ($test2) {
    echo '<form action="" method="post" >
            <div class="user-details">
                <div class="input-box">
                  <input type="text" placeholder="advertisementId" name="advertId" autofocus>
                </div>
                <div class="input-box">
                  <textarea placeholder="messageUser" name="messageUser" class="description" autofocus></textarea>
                </div>
                <div class="input-box">
                  <input type="text" placeholder="nom" name="nom" autofocus>
                </div>
                <div class="input-box">
                  <input type="text" placeholder="mail" name="mail" autofocus>
                </div>
                <div class="input-box">
                  <input type="text" placeholder="tel" name="tel" autofocus>
                </div>
                  <input type="submit" name="test" class="button" value="ajouter">
            </div>
          </form> ';
}

if ($test) {
    } 
    if ($advertId &&($nom) &&($messageUser)&&($mail)&&($tel)){
        curl_post($url,$data);
    
}
if ($update) {
    echo '
    <h3>Veuillez entrer les modifications.</h3>
    <form action="" method="post" >
    <input type="text" placeholder="advertisementId" name="advertId_up" autofocus>
    <textarea placeholder="messageUser" name="messageUser_up"autofocus></textarea>
    <input type="text" placeholder="nom" name="nom_up" autofocus>
    <input type="text" placeholder="mail" name="mail_up" autofocus>
    <input type="text" placeholder="tel" name="tel_up" autofocus>
    <input type="submit" name="update_test">
    </form>';
    
}
if ($update_test) {
  $aff = [$advertId_up,$messageUser_up,$nom_up,$mail_up,$tel_up];
   $aff_str = json_encode($aff);
  echo "Veuillez Verifié :".$aff_str ;
  
    echo '
    <button id = '.$aff_str.' value='.$id.'>update</button>
    ';
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="../script/admin.js"></script>
<script src="../script/ajaxAdmin.js"></script>
</html>