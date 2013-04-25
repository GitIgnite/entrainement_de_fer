<head>
    <title>Connexion</title>
</head>
<body>
    <?php
    include('./include.php');
    global $connexion;
    ?>
    <br><br><br><br><br><br><br><br><br><br>
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