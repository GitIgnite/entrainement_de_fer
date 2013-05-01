<header>
<?php
if (Session::isConnected()) {
    ?>
    <div class="row">
        <div class='span3 offset4'>
            <?php
            echo '<b>Connecté en tant que :</b> ' . $_SESSION['login'] . ' ';
            ?>
        </div>
        <div class='span2'>
            <?php
            echo '<b>rang :</b> ' . $_SESSION['rang'] . '<br><br>';
            ?>
        </div>
        <div class='span2'>
            <strong><a href="logout.php" \>logout</a></strong>
        </div>
        <?php
    }
    ?>
</header>