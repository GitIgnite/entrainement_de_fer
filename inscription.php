<head>
    <?php
    include ('include.php');
    if (Session::getLevel() != 1) {
        header('location:accueil.php');
    }
    ?>
    <title>Incription</title>
</head>
<body>
    <div class="row_fluid">
        <div class='span12 offset1'>
            <?php
            echo '<a href="page_admin.php"\>page administrateur </a><br>';
            ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 offset4" >
            <h1>Inscription d'un nouvel utilisateur</h1>
            <?php
            echo formulaire_inscription();
            ?>
        </div>
    </div>

</body>
</html>

