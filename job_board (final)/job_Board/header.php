<?php 
    include"./role.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php

if ($connect == 0){ //si pas connecter
    $_SESSION['email'] = 0;
    $_SESSION['mdp'] = 0;
    $_SESSION['tel'] = 0;
?>
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php">Compagnie Job Web</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                        </form>
                        <span class="navbar-text"><a href="./login.php" class="login">Connexion</a></span>
                        <a class="btn btn-light action-button" role="button" href="Enregistrement.php">S'enregistrer</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

<?php } else if (($connect == 1) && ($admin == 1)){ //si connecter en mode admin?>
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#">Compagnie Job Web</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                        </form>
                        <a class="btn btn-light action-button" role="button" href="./profil.php"><img src="images/user-regular-24.png"/></a>
                        <a class="btn btn-light action-button" role="button" href="./admin/home.php"><img src="images/cog-regular-24.png"/></a>
                        <a class="btn btn-light action-button" role="button" href="./role.php?deco=1"><img src="images/log-out-circle-regular-24.png"/></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<?php } else if ($connect == 1) { //si connecter sans role ?>
    <div>
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#">Compagnie Job Web</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                        </form><a class="btn btn-light action-button" role="button" href="#"><img src="images/user-regular-24.png"/></a><a class="btn btn-light action-button" role="button" href="#"><img src="images/log-out-circle-regular-24.png"/></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

<?php }?>
</body>
</html>