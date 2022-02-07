<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Document</title>
    </head>
    <body>
        
        <?php 
        session_start();
        $mail = $_SESSION['email'];
        $tel = $_SESSION['tel'];
        $dataId = $_GET['$data'];
        //si il clique sur la croix ,l'affichage de droite est effacé 
        if ($dataId == 0) {
            echo (" ");
    }
  else  if ($dataId == '-1') 
  { // dès le clique sur Apply
    if ($tel) {
        $url =  'http://127.0.0.1:3000/stock_people/tel/"'.$tel.'"'; //recup les champs en fO du tel  
        $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    $result=curl_exec($ch);
    curl_close($ch);
    $champ =  json_decode( $result,true);
    $nom = $champ['nom'];   
    echo ('
    <form action="" method="post">
    <input type="text" placeholder="nom" value="'.$champ['nom'].'" name="nom" autofocus>
    <input type="text" placeholder="tel" value="'.$champ['tel'].'" name="tel">
    <input type="mail" placeholder="mail" value="'.$champ['mail'].'" name="mail"><br>
    entrer votre message
    <textarea name="messageUser" placehlder="entrer votre message"></textarea>
    <input type="submit" name="apply">
    </form>        
    ');  
}
else {
    
    echo ('
    <form action="" method="post">
    <input type="text" placeholder="nom" name="nom" autofocus>
    <input type="text" placeholder="tel" name="tel">
    <input type="mail" placeholder="mail" name="mail">
    <textarea name="messageUser" placehlder="entrer votre message">entrer votre message</textarea>
    <input type="submit" name="apply">
    </form>        
    ');
}
    
    
}
// sinon on récupère les tables dans la bdd et on affiche la page dédié 
    else
    {
        $url =  "http://127.0.0.1:3000/comp/advertisement/".$dataId; //advert pour id comp 
        $cSession = curl_init(); 
        curl_setopt($cSession,CURLOPT_URL,$url);
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false); 
        $result=curl_exec($cSession);
        curl_close($cSession);
        $ad =  json_decode( $result,true);
        $id_comp = $ad['companiesId'];
        
        $url =  "http://127.0.0.1:3000/companies/".$id_comp;
        $cSession2 = curl_init(); 
        curl_setopt($cSession2,CURLOPT_URL,$url);
        curl_setopt($cSession2,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession2,CURLOPT_HEADER, false); 
        $result2=curl_exec($cSession2);
        curl_close($cSession2);
        $comp =  json_decode( $result2,true);
        // $advert      = file_get_contents("http://127.0.0.1:3000/advertisement/".$dataId);
        // $companies   = file_get_contents("http://127.0.0.1:3000/companies/".$dataId);
        echo ("
        <div class='job_description'>
        <div class='entete'>
        <div class='princ'>
        <h3>$ad[nom]</h3>
        <p>$comp[nom]<br>
        $comp[lieu]<br>
        $ad[contrat]</p>
        <button name='apply' value='-1' class='btn_post'>Apply</button>
            </div>
            <div class='leave'>
                <button value='0'><img src='https://img.icons8.com/windows/32/000000/xbox-x.png'></button>
            </div>
        </div>      
        <div class='description'>
                <p>$ad[description]</p>
                <p>$comp[description]</p>
                <p>Temps de travail : $ad[tempsDeTravail]</p>
                <p>Type d'emploi : $ad[contrat]</p>
        </div>
    </div>
            ");    
    }
    
?>
    <script src="./script/SeveralJob.js"></script>
</body>
</html>
    
    