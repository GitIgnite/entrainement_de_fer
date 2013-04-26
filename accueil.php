<?php
include('./include.php');
?>

<head>
    <title>Accueil</title>
</head>
<body>
    <div class="row_fluid">
        <div class='span12 offset10'>
            <h1>Accueil</h1>
        </div>
    </div>
        <br><br><br><br><br>
            <div class="row_fluid">
        <div class='span12 offset1'>
    <?php
    if (Session::getLevel() == 1) {
        echo '<a href="page_admin.php"\>admin</a>';
    }
    echo $_COOKIE['login'];
    echo $_COOKIE['password'];
    ?>
        </div>
            </div>
</body>
</html>