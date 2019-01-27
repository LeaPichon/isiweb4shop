<?php
    include "../controller/controllerAdresse.php"; 
    
    if(isset($_SESSION['UserId'])){
        echo '
            <section>
                <h1>Voulez-vous utiliser votre adresse personnelle ?</h1>
                    <div class=\"produit\">
                        <p>'.$forename[0].'</p>
                        <p>'.$surename[0].'</p>
                        <p>'.$add1[0].'</p>
                        <p>'.$add2[0].'</p>
                        <p>'.$city[0].'</p>
                        <p>'.$postcode[0].'</p>
                        <p>'.$phone[0].'</p>
                        <p>'.$email[0].'</p>
                        <a href="../view/paiement.php?cmd=customer">Utiliser cette adresse</a>';
    }
    ?>
    <form action="paiement.php?cmd=new" method="post">
            <table >
                <tr>
                    <td class="text">
                        <b>Prénom </b>
                    </td>
                    <td><input type="text" name="forename" id="forename" required /></td>
                </tr>
                <tr>
                    <td class="text">
                        <b>Nom </b>
                    </td>
                    <td><input type="text" name="surename" id="surename" required /></td>
                </tr>
                <tr>
                    <td class="text">
                        <b>Adresse (ligne 1): </b>
                    </td>
                    <td><input type="text" name="add1" id="add1" required /></td>
                </tr>
                <tr>
                    <td class="text">
                        <b>Adresse (ligne 2): </b>
                    </td>
                    <td><input type="text" name="add2" id="add2" required /></td>
                </tr>
                <tr>
                    <td class="text">
                        <b>Ville: </b>
                    </td>
                    <td><input type="text" name="city" id="city" required /></td>
                </tr>
                <tr>
                    <td class="text">
                        <b>Code Postal: </b>
                    </td>
                    <td><input type="text" name="postCode" id="postCode" required /></td>
                </tr>
                <tr>
                    <td class="text">
                        <b>Téléphone: </b>
                    </td>
                    <td><input type="text" name="phone" id="phone"  /></td>
                </tr>
                <tr>
                    <td class="text">
                        <b>Email: </b>
                    </td>
                    <td><input type="email" name="email" id="email"  /></td>
                </tr>
            </table>
            <input type="submit" value="Ajoutez cette adresse">
    </form>
