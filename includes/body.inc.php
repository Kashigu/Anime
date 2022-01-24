<?php

include_once("config.inc.php");
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
$con->set_charset("utf-8");


function top($menu = HOME){
?>

    <!DOCTYPE html>
<html lang="zxx">

<head>
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="header__logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <?php
                        session_start();
                        if (!isset($_SESSION['id'])) {
                            ?>
                            <ul>
                                <li <?php if ($menu == HOME) echo "class=\"active\""; ?>><a
                                            href="index.php">Homepage</a>
                                </li>
                                <li <?php if ($menu == PROCURAR) echo "class=\"active\""; ?>><a
                                            href="procurar.php">Animes </a>
                                </li>
                            </ul>
                            <?php
                        } else {
                            $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
                            $sql = "select * from users where userId=" . $_SESSION['id'];
                            $resultPerfis = mysqli_query($con, $sql);
                            $dadosPerfis = mysqli_fetch_array($resultPerfis);

                            if ($_SESSION['id'] and $dadosPerfis['usersAdmin'] == 'Admin') {

                                ?>
                                <ul>
                                    <li <?php if ($menu == HOME) echo "class=\"active\""; ?>><a href="index.php">Homepage</a>
                                    </li>
                                    <li <?php if ($menu == PROCURAR) echo "class=\"active\""; ?>><a
                                                href="procurar.php">Animes </a>
                                    <li><a href="admin/index.php">Site Management</a>
                                    </li>
                                </ul>
                                <?php
                            } else if (($_SESSION['id']) and $dadosPerfis['usersAdmin'] == 'User') {
                                ?>
                                <ul>
                                    <li <?php if ($menu == HOME) echo "class=\"active\""; ?>><a href="index.php">Homepage</a>
                                    </li>
                                    <li <?php if ($menu == PROCURAR) echo "class=\"active\""; ?>><a
                                                href="procurar.php">Animes </a>
                                    </li>
                                </ul>
                                <?php
                            }
                        }
                        ?>

                    </nav>
                </div>
            </div>
            <?php
            if (!isset($_SESSION['id'])) {
                ?>
                <div class="col-lg-3">
                    <div class="header__right">
                        <form action="search.php" style="position: relative; right: 30px ;" method="post"
                              enctype="multipart/form-data" id="searchProcurar">
                            <input style="margin-right:-50px; color: white; background-color: #0b0c2a; display: none "
                                   id="Search" type="text" placeholder="Search.." name="search">
                        </form>
                    </div>
                </div>

                <?php
            } else {
                ?>
                <div class="col-lg-3">
                    <div class="header__right">
                        <form action="search.php" style="position: relative; right: 70px ; top: 30px" method="post"
                              enctype="multipart/form-data" id="searchProcurar">
                            <input style="margin-right:-50px; color: white; background-color: #0b0c2a; display: none "
                                   id="Search" type="text" placeholder="Search.." name="search">
                        </form>
                        <button style="background-color:transparent; border:transparent; margin-right: -90px; width: 50px; position: absolute; right: 70px ; top: 50px"
                                onclick="mostrarSearch()"><span
                                    class="icon_search" style="color: white; margin-right: 10px"></span></button>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-lg-1">
                <div class="header__right">
                    <?php
                    if (!isset($_SESSION['id'])) {
                        ?>
                        <button style="background-color:transparent; border:transparent;"
                                onclick="mostrarSearch()"><span
                                    class="icon_search" style="color: white; margin-right: 10px"></span></button>
                        <a href="login.php"><span class="icon_profile"></span></a>
                        <?php
                    } else {
                        ?>
                        <?php
                        $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
                        $sql = "select * from users where userId=" . $_SESSION['id'];
                        $resultPerfis = mysqli_query($con, $sql);
                        $dadosPerfis = mysqli_fetch_array($resultPerfis)
                        ?>
                        <a href="perfil.php?id=<?php echo $dadosPerfis['userId'] ?>">
                            <img src="<?php echo $dadosPerfis['userImageURL'] ?>" class="reduzido"></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<?php
}
function topadmin($menu = HOME){
?>

    <!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="header__logo">
                    <a href="../index.php">
                        <img src="../img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="../index.php">Homepage</a>
                            </li>
                            <li><a href="../procurar.php">Animes </a>
                            </li>
                            <li <?php if ($menu == GESTAO) echo "class=\"active\""; ?>><a href="index.php">Site
                                    Management </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <form action="../search.php" style="position: relative; right: 70px ; top: 30px" method="post"
                          enctype="multipart/form-data" id="searchProcurar">
                        <input style="margin-right:-50px; color: white; background-color: #0b0c2a; display: none "
                               id="Search" type="text" placeholder="Search.." name="search">
                    </form>
                    <button style="background-color:transparent; border:transparent; margin-right: -90px; width: 50px; position: absolute; right: 70px ; top: 50px"
                            onclick="mostrarSearch()"><span
                                class="icon_search" style="color: white; margin-right: 10px"></span></button>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="header__right">
                    <?php
                    session_start();
                    if (!isset($_SESSION['id'])) {
                        ?>
                        <a href="../login.php"><span class="icon_profile"></span></a>
                        <?php
                    } else {
                        ?>
                        <?php
                        $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
                        $sql = "select * from users where userId=" . $_SESSION['id'];
                        $resultPerfis = mysqli_query($con, $sql);
                        $dadosPerfis = mysqli_fetch_array($resultPerfis)
                        ?>
                        <a href="../perfil.php?id=<?php echo $dadosPerfis['userId'] ?>">
                            <img src="../<?php echo $dadosPerfis['userImageURL'] ?>" class="reduzido"></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<?php
}

function bot($menu = HOME, $id = 0){
?>
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="index.php"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="index.php">Homepage</a></li>
                        <li><a href="./categories.html">Categories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/player.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="js/common.js"></script>

<script>
 <?php
 if ($menu == EPISODES){
 ?>
 $('#search').keyup(function () {
     fillTableEpisodes(this.value,<?php echo $id ?>);
 });
 fillTableEpisodes('',<?php echo $id ?>);
 <?php }
 ?>

</script>
</body>

</html>
<?php
}

function botadmin($menu = HOME){
?>
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="index.php"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li><a href="../index.php">Homepage</a></li>
                        <li><a href="../categories.php">Categories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/player.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/mixitup.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/common.js"></script>
<script>
    <?php
    if ($menu == ANIMES){
    ?>
    $('#search').keyup(function () {
        fillTableAnimes(this.value);
    });
    fillTableAnimes();
    <?php
    }
    if ($menu == CATEGORIAS){
    ?>
    $('#search').keyup(function () {
        fillTableCategorias(this.value);
    });
    fillTableCategorias();
    <?php
    }
    if ($menu == USERS){
    ?>
    $('#search').keyup(function () {
        fillTableUtilizador(this.value);
    });
    fillTableUtilizador();
    <?php
    }
    ?>
</script>

</body>

</html>
<?php
}
?>
