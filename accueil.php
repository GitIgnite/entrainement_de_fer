<?php
include('./include.php');
?>

<head>
    <title>Accueil</title>
</head>
<body>
    <div class="row_fluid">
        <div class='span12'>
            <h1>Accueil</h1>
        </div>
    </div>
    <?php
    if (Session::getLevel() == 1) {
        echo '<a href="page_admin.php"\>admin</a>';
    }
    ?>
</body>
</html>