<?php
    include 'C:\xampp\htdocs\codelab365\View\connexiondb.php';
	include_once  'C:\xampp\htdocs\codelab365\Model\Evenement.php';
	
	
	class EvenementC {
		function afficherEvenements(){
			$sql="SELECT * FROM evenement";
			$db = connexiondb::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerEvenement($id_event){
			$sql="DELETE FROM evenement WHERE id_event=:id_event";
			$db = connexiondb::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_event', $id_event);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterEvenement($Evenement){
			$sql="INSERT INTO evenement ( nom_event, adresse_event, information_event, date_debut) 
			VALUES (:nom_event, :adresse_event,:information_event, :date_debut)";	
			$db = connexiondb::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nom_event' => $Evenement->getnom_event(),
					'adresse_event' => $Evenement->getadresse_event(),
					'information_event' => $Evenement->getinformation_event(),
					'date_debut' => $Evenement->getdate_debut()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererEvenement($id_event){
			$sql="SELECT * from evenement where id_event=$id_event";
			$db = connexiondb::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Evenement=$query->fetch();
				return $Evenement;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function affichertrier()
    {
        $requete = "select * from evenement order by nom_event";
        $connexiondb = connexiondb::getConnexion();
        try {
            $querry = $connexiondb->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

	function Findevent	($nom_event,$adresse_event){
		$sql="SELECT * FROM evenement where nom_event like '" .$nom_event."' or adresse_event like '".$adresse_event."'";
		$db = connexiondb::getConnexion();
		
		try{
			
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	}
		function modifierEvenement($Evenement, $id_event){
			try {
				$db = connexiondb::getConnexion();
				$query = $db->prepare(
					'UPDATE evenement SET 
						nom_event= :nom_event, 
						adresse_event= :adresse_event, 
						information_event= :information_event, 
						date_debut= :date_debut
					WHERE id_event= :id_event'
				);
				$query->execute([
					'nom_event' => $Evenement->getnom_event(),
					'adresse_event' => $Evenement->getadresse_event(),
					'information_event' => $Evenement->getinformation_event(),
					'date_debut' => $Evenement->getdate_debut(),
					'id_event' => $id_event
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>