<?php 
require_once('modele/User.class.php');

class DaoUser {
	public function create($user) {
		DB::request('INSERT INTO user (u_email, u_password, u_nom, u_prenom) VALUES (?,?,?,?)',array($user->getEmail(),$user->getPassword(),$user->getNom(),$user->getPrenom()));
		$user->setId(DB::lastId());
		return $user;
	}

	public function read($key, $value) {
		$sql = 'SELECT * FROM user WHERE u_archive = 0 AND '.$key.' = ?';
		$donnees = DB::request($sql,array($value));
		if (!empty($donnees)) {
			foreach ($donnees as $key => $donnee) {
                $user = new User($donnee['u_email'],$donnee['u_password'],$donnee['u_nom'],$donnee['u_prenom']);
				$user->setId($donnee['u_id']);
				$user->setStatut($donnee['u_statut']);
			}
			return $user;
		} else {
			return null;
		}
	}

	public function readAll() {
		$donnees = DB::request ('SELECT * FROM user WHERE u_archive = 0');
		if (!empty($donnees)) {
			foreach ($donnees as $key => $donnee) {
                $tabUser[$key] = new User($donnee['u_email'],$donnee['u_password'],$donnee['u_nom'],$donnee['u_prenom']);
				$tabUser[$key]->setId($donnee['u_id']);
				$tabUser[$key]->setStatut($donnee['u_statut']);
			}
			return $tabUser;
		} else {
			return null;
		}
	}

	public function update($user) {
		DB::request('UPDATE user SET u_email = ?, u_password = ?, u_nom = ?, u_prenom = ?, u_statut = ? WHERE u_archive = 0 AND u_id = ?',array($user->getEmail(),$user->getPassword(),$user->getNom(),$user->getPrenom(),$user->getStatut(),$user->getId()));
	}

	public function archive($user) {
		DB::request('UPDATE user SET u_archive = ? WHERE u_id = ?',array($user->getArchive(),$user->getId()));
	}

	public function delete($user) {
		DB::request('DELETE user WHERE u_id = ?',array($user->getId()));
	}
}

 ?>