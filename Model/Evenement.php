<?php
	class Evenement{
		private $id_event;
		private $nom_event=null;
		private $adresse_event=null;
		private $date_debut;
		private $information_event=null;
		
		function __construct( $nom_event, $adresse_event, $date_debut, $information_event){
			$this->nom_event=$nom_event;
			$this->adresse_event=$adresse_event;
			$this->date_debut=$date_debut;
			$this->information_event=$information_event;
		}
		
        
        
        function getid_event(){
			return $this->id_event;
		}
		function getnom_event(){
			return $this->nom_event;
		}
		function getadresse_event(){
			return $this->adresse_event;
		}
		function getdate_debut(){
			return $this->date_debut;
		}
		function getinformation_event(){
			return $this->information_event;
		}
		
        
        
        
        function setnom_event(string $nom_event){
			$this->nom_event=$nom_event;
		}
		function setadresse_event(string $adresse_event){
			$this->adresse_event=$adresse_event;
		}
		function setdate_debut(string $date_debut){
			$this->date_debut=$date_debut;
		}
		function setinformation_event(string $information_event){
			$this->information_event=$information_event;
		}
		
	}


?>