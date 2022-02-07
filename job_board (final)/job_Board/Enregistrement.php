<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/Enregistrement.css">
<meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <form method="post" onsubmit="return validate()">
            <div class="title">Enregistrer-vous ici :</div>
            <div class="genre">
                <input type="radio" name="genre" id="dot-1" required>
                <input type="radio" name="genre" id="dot-2" required>
                <input type="radio" name="genre" id="dot-3" required>
                <span class="titre-genre"><br>Genre :</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="genre">Homme</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="genre">Femme</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="genre">Autre</span>
                    </label>
                </div>
            </div>
            <div class="user-details">
                <div class="input-box">
                    <input type="text" name="prenom" placeholder="Prénom" autofocus required>
                </div>
                <div class="input-box">
                    <input type="text" name="nom" placeholder="Nom" required>
                </div>
                <div class="input-box">
                    <input type="email" name="mail" placeholder="Email" required>
                </div>
                <div class="input-box2">
                <input class="password" type="password" id="motdepasse" name="mdp" placeholder="Mot de passe" required>
                <input type="checkbox" class="check" id="check" onclick="Afficher()">
                <label for="check"></label>
                </div>
                <div class="input-box">
                <input type="password" id="confirm_mdp" name="confirm_mdp" placeholder="Retaper mot de passe" required>
                </div>
                <div class="input-box">
                    <input type="tel" name="tel" id="tel" required minlength="10" maxlength="10" placeholder="Numéro de téléphone" required>
                </div>
                <div class="input-box">
                    <input type="number" name="age" id="age" min="13" max="67" step="1" placeholder="votre âge" required>
                </div>
                <div class="input-box">
                    <input type="adress" name="adress" placeholder="Adresse" required>
                </div>
            </div>
            <p>Vous possèdez déjà un compte? Cliquer <a href="login.php">Ici</a></p>
            <div class="button">
                <input type="submit" name="submit" id="regbtn" value="S'enregistrer" onclick="validate()">
            </div>
        </form>
    </div>

<?php 
  $prenom   = isset($_POST['prenom'])   ?$_POST['prenom']   : NULL;
  $nom      = isset($_POST['nom'])      ?$_POST['nom']      : NULL;
  $mail     = isset($_POST['mail'])     ?$_POST['mail']     : NULL;
  $mdp      = isset($_POST['mdp'])      ?$_POST['mdp']      : NULL;
  $tel      = isset($_POST['tel'])      ?$_POST['tel']      : NULL;
  $age      = isset($_POST['age'])      ?$_POST['age']      : NULL;
  $adress   = isset($_POST['$adress'])  ?$_POST['$adress']  : NULL;
  $role     = 'user';
  
  //   if (!empty($prenom) && (!empty($nom))&& (!empty($mail))&& (!empty($mdp))&& (!empty($tel))&& (!empty($age))&& (!empty($adress))) 
  // {
    //}
    // else {
    //   echo "<script>alert ('Veuillez remplir tout les champs') ;</script>";
    // }
if (($nom) && ($prenom) && ($mail) && ($mdp) && ($tel) && ($age)){
    $url = "http://127.0.0.1:3000/stock_people/id";
    $data = [
      'nom'    => $nom,
    'prenom' => $prenom,
    'tel'    => $tel,
    'mail'   => $mail,
    'mdp'    => $mdp,
    'role'   => $role
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
        echo "<script>alert ('Un problème est survenue') ;</script>";
    }
    else 
    {
      echo "<script>alert ('Vous êtes inscrit') ;</script>";
      echo '<meta http-equiv="refresh" content="0; url=./login.php">'; 
    }
    curl_close($ch);
  }
  curl_post($url,$data);
}
?>

<script>
function Afficher()
{ 
var input = document.getElementById("motdepasse"); 
if (input.type === "password")
{ 
input.type = "text"; 
} 
else
{ 
input.type = "password"; 
} 
} 
</script>
</body>
</html>