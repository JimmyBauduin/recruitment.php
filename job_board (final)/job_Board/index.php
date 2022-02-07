<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="style/pageaccueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
</head>
<body>
<?php
    include('./header.php')
?>
<section class="jobhead">
    <div class="job_grid">
        <div class="job_list">
            <?php
            // $companies   = file_get_contents("http://127.0.0.1:3000/companies/");
            $url =  "http://127.0.0.1:3000/companies/";
            $cSession = curl_init(); 
            curl_setopt($cSession,CURLOPT_URL,$url);
            curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($cSession,CURLOPT_HEADER, false); 
            $result=curl_exec($cSession);
            curl_close($cSession);
            $result_arr =  json_decode( $result,true);
            $result_arr =  json_decode( $result,true);
            foreach ($result_arr as $elem) 
            {
                $id= $elem['companiesId'];
                echo ("
                    <div class='job'>
                        <h2>");echo $elem['nom'];echo("</h2>
                        <p>");echo $elem['description'];echo("</p>
                        <button value='$id' class='btn'>learn more</button>
                    </div>
                    ");
            }
$peopleId       = isset($_POST['peopleId'])       ?$_POST['peopleId']       : NULL;
$messageUser    = isset($_POST['messageUser'])    ?$_POST['messageUser']    : NULL;
$nom            = isset($_POST['nom'])            ?$_POST['nom']            : NULL;
$tel            = isset($_POST['tel'])            ?$_POST['tel']            : NULL;
$mail           = isset($_POST['mail'])           ?$_POST['mail']           : NULL;
$apply          = isset($_POST['apply'])          ?$_POST['apply']          : NULL;
            if ($apply)
            {
                $url =  "http://127.0.0.1:3000/comp/advertisement/".$id; //advert pour id comp 
                $cSession = curl_init(); 
                curl_setopt($cSession,CURLOPT_URL,$url);
                curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($cSession,CURLOPT_HEADER, false); 
                $result=curl_exec($cSession);
                curl_close($cSession);
                $ad =  json_decode( $result,true);
                $id_comp = $ad['advertisementId'];
                
                $url =  "http://127.0.0.1:3000/information/";
                $data = [
                'advertisementId' => $id_comp,
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
                echo "<script>alert ('Veuillez vérifier si vous respectez les clés étrangères ') ;</script>";
            }
            else 
            {
                echo "<script>alert ('information ajouté') ;</script>";
                echo '<meta http-equiv="refresh" content="0; url=#">';
            }
            curl_close($ch);
        }
    }
    if (($messageUser)&&($nom)&&($tel)&&($mail))
    {
    curl_post($url,$data);
    }
?>
        </div>
        <div class="random">
        </div>
    </div>
</section>    
<footer>
    <div id="copyright">
        <hr>
        <ul>&copy; Tout droits réservés Job Board compagnie <br>CHO !</ul>
    </div>
</footer>
<script type="text/javascript">
    $(function () {
    $(window).on('scroll', function () 
    {
        if ( $(window).scrollTop() > 10 ) 
        {
            $('.navbar').addClass('active');
        } 
        else 
        {
            $('.navbar').removeClass('active');
        }
    });
    });
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="./script/SeveralJob.js"></script>
</body>
</html>