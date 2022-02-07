<?php 
    session_start();

include "./baseCo.php";

$deco = isset($_GET['deco']) ?$_GET['deco'] : NULL;
if ($deco == 1) {
    $_SESSION['email'] = 0;
    echo '<meta http-equiv="refresh" content="0; url=./index.php">';
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}else {
    $email = "";
}


$stmt = $bdd->prepare('SELECT role FROM stock_people WHERE mail = :email');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
if (empty($result)) $res = '';
else {
    $res = implode(" ",$result) ;
}
switch ($res) {
    case 'Admin':
        $admin = 1;
        $connect = 1;
        $entreprise = 0;
    break;
    case 'Entreprise':
        $admin = 0;
        $entreprise = 1;
        $connect = 1;
    break;    
    default:
    $connect = 0;
    $admin = 0;
        break;
}
?>