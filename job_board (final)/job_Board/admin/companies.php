<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="../style/admin.css"/>
<title>Document</title>
</head>
<body>
  <h1>companies</h1>
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
  $nom   = isset($_POST['nom'])   ?$_POST['nom']   : NULL;
  $mail  = isset($_POST['mail'])  ?$_POST['mail']  : NULL;
  $lieu  = isset($_POST['lieu'])  ?$_POST['lieu']  : NULL;
  $tel   = isset($_POST['tel'])   ?$_POST['tel']   : NULL;
  $des   = isset($_POST['des'])   ?$_POST['des']   : NULL;
  $test   = isset($_POST['test'])   ?$_POST['test']   : NULL;
  $test2   = isset($_POST['test2'])   ?$_POST['test2']   : NULL;
  $update   = isset($_POST['update'])   ?$_POST['update']   : NULL;
  $update_test   = isset($_POST['update_test'])   ?$_POST['update_test']   : NULL;
  //form update
  $nom_up   = isset($_POST['nom_up'])   ?$_POST['nom_up']   : NULL;
  $mail_up  = isset($_POST['mail_up'])  ?$_POST['mail_up']  : NULL;
  $lieu_up  = isset($_POST['lieu_up'])  ?$_POST['lieu_up']  : NULL;
  $tel_up   = isset($_POST['tel_up'])   ?$_POST['tel_up']   : NULL;
  $des_up   = isset($_POST['des_up'])   ?$_POST['des_up']   : NULL;
  $url =  "http://127.0.0.1:3000/companies/";
  
  $data = [
  'nom'    => $nom,
  'adresse' => $mail,
  'lieu'   => $lieu,
  'tel'    => $tel,
  'description'    => $des
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
      trigger_error(curl_error($ch));
    }
    else 
    {
        echo "<script>alert ('Companie ajouté') ;</script>";
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
        <th class='oui'>IdCompanies</th>
        <th class='oui'>Nom</th>
        <th class='oui'>adresse</th>
        <th class='oui'>lieu</th>
        <th class='oui'>tel</th>
        <th class='oui'>Description</th>
        <th class='oui'>Action</th>
      </tr>
    </thead>";
foreach ($result_arr as $elem) {
    $id = $elem['companiesId'];
    echo ("
      <tbody>
        <tr>
          <td class='oui' data-label='IdCompanies'>" .$elem['companiesId']."</td>
          <td class='oui' data-label='Nom'>" .$elem['nom']."</td>
          <td class='oui' data-label='Adresse'>" .$elem['adresse']."</td>
          <td class='oui' data-label='Lieu'>" .$elem['lieu']."</td>
          <td class='oui' data-label='Tel'>" .$elem['tel']."</td>
          <td class='oui' data-label='Description'><div class='description'>" .$elem['description']."</div></td>
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
            <input type="text" placeholder="nom" name="nom" autofocus>
          </div>
          <div class="input-box">
            <input type="email" placeholder="mail" name="mail">
          </div>
          <div class="input-box">
            <input type="text" placeholder="adresse" name="lieu">
          </div>
          <div class="input-box">
            <input type="text" placeholder="tel" name="tel">
          </div>
          <div class="input-box">
            <input type="text" placeholder="description" name="des">
          </div>
          <input type="submit" name="test" class="button">
        </div>
      </form>';
    
}

if ($test) {
    
    if (($nom) && ($mail) && ($lieu) && ($tel) && ($des)){
        echo "test";
        curl_post($url,$data);
    }
}
if ($update) {
    echo '
    <h3>Veuillez entrer les modifications.</h3>
    <form action="" method="post" >
      <input type="text" placeholder="nom" name="nom_up" autofocus id="nom">
      <input type="email" placeholder="mail" name="mail_up" id="mail">
      <input type="text" placeholder="adresse" name="lieu_up" id="lieu">
      <input type="text" placeholder="tel" name="tel_up" id="tel">
      <input type="text" placeholder="description" name="des_up" id="des">
      <input type="submit" name="update_test">
    </form>';
    
}
if ($update_test) {
  $aff = [$nom_up,$mail_up,$lieu_up,$tel_up,$des_up];
   $aff_str = json_encode($aff);
  echo "Veuillez Verifié :".$aff_str ;
  
    echo '
    <button id = '.$aff_str.' value='.$id.'>Modifier</button>
    ';
}
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="../script/admin.js"></script>
<script src="../script/ajaxAdmin.js"></script>
</html>