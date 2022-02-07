<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/login.css">
<meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <div class="title">Connectez-vous ici :</div>
        <form action="./login.php" method="post">
            <!-- <div class="social-media"> 
                <img class="google" src="./images/google.png"/>
                <img class="facebook" src="./images/fb.png"/>
                <img class="twitter" src="./images/twitter.png"/>
            </div> -->
            <div class="user-details">
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" autofocus required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="input-box">
                    <input type="text" class="box-input" name="tel" placeholder="tel" required />
                </div>
                <br>
            </div>
            <p>Vous n'avez pas de compte? Enregistrer-vous <a href="Enregistrement.php">Ici</a></p>
            <div class="button">
                <input type="submit" value="Connexion">
            </div>
        </form>
    </div>
    <?php 
$i = 0 ;
 $email = isset($_POST['email']) ?$_POST['email'] : NULL;
 $tel = isset($_POST['tel']) ?$_POST['tel'] : NULL;
 $password = isset($_POST['password']) ?$_POST['password'] : NULL;
 if (!empty($email)) {
  $url =  "http://127.0.0.1:3000/stock_people/mail/";
  $url2 = "http://127.0.0.1:3000/stock_people/mdp/";
  $url3 = "http://127.0.0.1:3000/stock_people/tel/";

  $cSession = curl_init(); 
  curl_setopt($cSession,CURLOPT_URL,$url);
  curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($cSession,CURLOPT_HEADER, false); 
  $result=curl_exec($cSession);

  $cSession3 = curl_init(); 
  curl_setopt($cSession3,CURLOPT_URL,$url3);
  curl_setopt($cSession3,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($cSession3,CURLOPT_HEADER, false); 
  $result3=curl_exec($cSession3);

  $cSession2 = curl_init(); 
  curl_setopt($cSession2,CURLOPT_URL,$url2);
  curl_setopt($cSession2,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($cSession2,CURLOPT_HEADER, false); 
  $result2=curl_exec($cSession2);
  curl_close($cSession);
  curl_close($cSession2);
  curl_close($cSession3);
  $result_arr =  json_decode( $result,true);
  $result_arr2 =  json_decode( $result2,true);
  $result_arr3 =  json_decode( $result3,true);
foreach ($result_arr as $elem)
  {
    $mail = $elem['mail']; 
    if ($mail == $email) 
    { 
      foreach ($result_arr2 as $elem2) 
      {
        $mdp = $elem2['mdp']; 
        if ($password == $mdp) 
        { 
          foreach ($result_arr3 as $elem3) {
            $telo = $elem3['tel'];
            if ($tel == $telo) {
              $i = 1 ; 
              session_start();
              $_SESSION["email"]=$email;
              $_SESSION["tel"]=$telo;
              echo '<meta http-equiv="refresh" content="0; url=./index.php">';    
            }
          } 
        }
      }
    }
  }
if ($i !== 1) 
{
echo " <script>alert('email ou mot de passe ou tel invalide.')</script>";
}
}

?>
</form>
</body>
</html>