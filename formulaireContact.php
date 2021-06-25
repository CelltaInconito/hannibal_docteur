<?php
    $titre="contact";
    require_once 'navbar.php';
?>
<div class="center">

<form action="merci1.php" form method="GET" >
    
    Prénom :<input type="text" id="name" name="prenom">
    Nom :<input type="text" id="name" name="nom"><br>
    Genre :
    Homme :<input type="radio" id="male" name="sexe" value="homme">
    Femme :<input type="radio" id="female" name="sexe" value="femme"><br>
    Sujet :<input type="textarea" name="sujet"><br>
    e-mail :<input type="email" id="mail" name="mail"><br>
    Message :<textarea id="msg" name="message"></textarea><br>
    En validant ce formulaire, vous acceptez d’être contacté <input type="checkbox" name="cgu">
        <input type="submit" value="valider">
    
</form>
</div>
<?php
    require_once 'footer.php';
?>
