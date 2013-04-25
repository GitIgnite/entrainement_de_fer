<head>
    <title>Connexion</title>
</head>
<body>
    <?php
    
    global $connexion;
    ?>
    <form action="login.php" method="post">
        login : <input type="text" name="login" /><br>
        mot de passe : <input type="password" name="password" /><br>
        <input type="submit" value=" envoyer">
    </form>
</body>
</html>