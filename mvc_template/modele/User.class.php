<?php 
class User extends AbstractEntity {
	private $email;
	private $password;
	private $nom;
	private $prenom;
	private $statut;
	private $archive;

	public function __construct($email, $password, $nom, $prenom) {
		$this->email = $email;
		$this->password = $password;
		$this->nom = $nom;
		$this->prenom = $prenom;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function setStatut($statut) {
		$this->statut = $statut;
	}

	public function getStatut() {
		return $this->statut;
	}

	public function setArchive($archive) {
		$this->archive = $archive;
	}

	public function getArchive() {
		return $this->archive;
	}
}

 ?>