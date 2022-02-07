<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="../style/admin.css"/>
     
</head>
<body>
  <h1>advertisement</h1>
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
  $CompId   = isset($_POST['CompId'])   ?$_POST['CompId']   : NULL;
  $nom   = isset($_POST['nom'])   ?$_POST['nom']   : NULL;
  $contrat  = isset($_POST['contrat'])  ?$_POST['contrat']  : NULL;
  $salaire  = isset($_POST['salaire'])  ?$_POST['salaire']  : NULL;
  $tdt   = isset($_POST['tdt'])   ?$_POST['tdt']   : NULL;
  $des   = isset($_POST['des'])   ?$_POST['des']   : NULL;
  $test   = isset($_POST['test'])   ?$_POST['test']   : NULL;
  $test2   = isset($_POST['test2'])   ?$_POST['test2']   : NULL;
  $update   = isset($_POST['update'])   ?$_POST['update']   : NULL;
  $update_test   = isset($_POST['update_test'])   ?$_POST['update_test']   : NULL;
  //form update
  $CompId_up   = isset($_POST['CompId_up'])   ?$_POST['CompId_up']   : NULL;
  $nom_up   = isset($_POST['nom_up'])   ?$_POST['nom_up']   : NULL;
  $contrat_up  = isset($_POST['contrat_up'])  ?$_POST['contrat_up']  : NULL;
  $salaire_up  = isset($_POST['salaire_up'])  ?$_POST['salaire_up']  : NULL;
  $tdt_up   = isset($_POST['tdt_up'])   ?$_POST['tdt_up']   : NULL;
  $des_up   = isset($_POST['des_up'])   ?$_POST['des_up']   : NULL;
  $url =  "http://127.0.0.1:3000/advertisement/";
  
  $data = [
  'companiesId' => $CompId,
  'nom'    => $nom,
  'contrat' => $contrat,
  'salaire'   => $salaire,
  'tempsDeTravail'    => $tdt,
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
        <th class='oui'>advertisementId</th>
        <th class='oui'>companiesId</th>
        <th class='oui'>nom</th>
        <th class='oui'>contrat</th>
        <th class='oui'>salaire</th>
        <th class='oui'>Temps de travail</th>
        <th class='oui'>Description</th>
        <th class='oui'>Action</th>
      </tr>
    </thead>";
foreach ($result_arr as $elem) {
    $id = $elem['companiesId'];
    echo ("
      <tbody>
        <tr>
          <td class='oui' data-label='IdAdvertisement'>" .$elem['advertisementId']."</td>
          <td class='oui' data-label='IdCompanies'>" .$elem['companiesId']."</td>
          <td class='oui' data-label='Nom'>" .$elem['nom']."</td>
          <td class='oui' data-label='Contrat'>" .$elem['contrat']."</td>
          <td class='oui' data-label='Salaire'>" .$elem['salaire']."</td>
          <td class='oui' data-label='TpsDeTravail'>" .$elem['tempsDeTravail']."</td>
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
                  <input type="text" placeholder="CompId" name="CompId" autofocus>
                </div>
                <div class="input-box">
                  <input type="text" placeholder="nom" name="nom" >
                </div>
                <div class="input-box">
                  <input type="text" placeholder="contrat" name="contrat">
                </div>
                <div class="input-box">
                  <input type="text" placeholder="salaire" name="salaire">
                </div>
                <div class="input-box">
                  <input type="text" placeholder="temps De Travail" name="tdt">
                </div>
                <div class="input-box">
                  <input type="text" placeholder="description" name="des">
                </div>
                <input type="submit" name="test" class="button" value="ajouter">
            </div>
          </form> 
            
            
            ';
    
}

if ($test) {
    
    if ($CompId &&($nom) && ($contrat) && ($salaire) && ($tdt) && ($des)){
        echo "test";
        curl_post($url,$data);
    }
}
if ($update) {
    echo '
    <form action="" method="post" >
      <input type="text" placeholder="CompId" name="CompId_up" autofocus>
      <input type="text" placeholder="nom" name="nom_up" >
      <input type="text" placeholder="contrat" name="contrat_up">
      <input type="text" placeholder="salaire" name="salaire_up">
      <input type="text" placeholder="temps De Travail" name="tdt_up">
      <input type="text" placeholder="description" name="des_up">
      <input type="submit" name="update_test">
    </form>';
    
}
if ($update_test) {
  $aff = [$CompId_up,$nom_up,$contrat_up,$salaire_up,$tdt_up,$des_up];
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