<?php 

    #defaire la session et rediriger vers l'acceuil administration
    unset($_SESSION['admin']);
    header("Location:../");