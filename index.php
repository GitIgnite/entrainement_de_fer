<head>
    <title>Connexion</title>
</head>
<body>
    <?php
    include('./include.php');
    global $connexion;
    //Si une connexion est active, il regirige l'utilisateur à l'accueil
    if (Session::isConnected()) {
        header('location:accueil.php');
    }

    echo '<br><br>';
    // Formulaire de connexion
    ?>       
    <div class="row_fluid">
        <div class='span12 offset1'>
            <?php
            echo '<a href="inscription.php"\>Inscription</a><br>';
            ?>
        </div>
    </div>
    <?php
    echo '<br><br><br><br><br><br><br><br><br><br>';
    ?>
    <div id='1' class="row-fluid">
        <div class="span6 offset4" >
            <form action="login.php" method="post">
                <TABLE>
                    <tr>
                        <td>
                            login : 
                        </td>
                        <td>
                            <input type="text" name="login" /><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            mot de passe :
                        </td>
                        <td>
                            <input type="password" name="password" /><br>
                        </td>
                    </tr>
                </TABLE>
                <br>
                <input type="submit" value=" envoyer">
                </div>
            </form>
        </div>
</body>
</html>