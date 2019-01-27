<?php
    include "../controller/controllerPaiement.php"; 
?>
<section>
    <h1>Choississez un moyen de paiement</h1>
        <h2> Paiement par paypal</h2>
        <form action="fin.php?cmd=paypal" method="post">
            <label for="champNom"> Login:</label>
            <input type="text" name="username" id="username" required />
            <p></p><label for="champMdp">Mot de passe :</label>
            <input type="password" name="password" id="password" required />
            <input type="submit" value="Connexion">
        </form>
        <br/>
        <a href="../controller/cheque.php">Payer par chèque (édition d'une facture en pdf)</a>
</section>