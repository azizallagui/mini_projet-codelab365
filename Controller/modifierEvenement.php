<?php
     include_once '../Model/Evenement.php';
     include_once 'EvenementC.php';
 
     $error = "";
 
     // create Evenement
     $evenement = null;
 
     // create an intance of the controller
     $EvenementC = new EvenementC();
     if (
         isset($_POST["nom_event"]) &&	
         isset($_POST["adresse_event"]) &&
         isset($_POST["date_debut"]) && 
         isset($_POST["information_event"]) 
     ) {
         if (
             !empty($_POST["nom_event"]) && 
             !empty($_POST["adresse_event"]) && 
             !empty($_POST["date_debut"]) && 
             !empty($_POST["information_event"]) 
         ) {
             $evenement = new Evenement(
                 $_POST['nom_event'],
                 $_POST['adresse_event'], 
                 $_POST['date_debut'],
                 $_POST['information_event']
             );
            $EvenementC->modifierEvenement($evenement, $_POST["id_event"]);
            header('Location: ../View/office/liste_evenements.php');
        }
        else
            $error = "Missing information";
    }    
?>