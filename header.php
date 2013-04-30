

<?php
if (Session::isConnected()) {
    ?>
    <div class="row_fluid">
        <div class='span3 offset12'>
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
            <strong><a href="logout.php"\>logout</a></strong>
        </div>
        <?php
    }
    ?> 
