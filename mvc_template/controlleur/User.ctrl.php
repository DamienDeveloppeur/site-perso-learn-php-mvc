<?php 
class CtrlUser extends Controller {
	public function index() {
		$this->loadDao('user');
		$this->render('user','index');
	}
	public function signIn() {
		$this->loadDao('user');
		if (!empty($this->post)) {
			if ($this->DaoUser->read('u_email',$this->post['email']) == null) {
				$user = new User($this->post['email'],password_hash($this->post['password'], PASSWORD_DEFAULT),$this->post['nom'],$this->post['prenom']);
				$user = $this->DaoUser->create($user);
				$this->data('user',$user);
				$this->render('user','logIn');
			} else {
				$this->data('log','Email déjà utilisé par un utilisateur');
				$this->render('user','signIn');
			}
		} else {
			$this->render('user','signIn');
		}
	}

	public function logIn() {
		$this->loadDao('user');
		if (!empty($this->post)) {
			$user = $this->DaoUser->read('u_email',$this->post['email']);
			if (!empty($user)) {
				if (password_verify($this->post['password'], $user->getPassword())) {
					$_SESSION['id'] = $user->getId();
					$_SESSION['nom'] = $user->getNom();
					$_SESSION['prenom'] = $user->getPrenom();
					if ($user->getStatut() == 2 || $user->getStatut() == 3) {
						header('Location: '.WEBROOT.'formation/index');
					} else {
						header('Location: '.WEBROOT.'formation/index');
					}
				} else {
					$this->data('log','Mauvais email ou mot de passe, veuillez reessayer.');
					$this->render('user','logIn');	
				}
			} else {
				$this->data('log','Mauvais email ou mot de passe, veuillez reessayer.');
				$this->render('user','logIn');	
			}
		} else {
			$this->render('user','logIn');
		}
	}

	public function logOut() {
		$_SESSION = array();
		session_destroy();
		header('Location: '.WEBROOT.'user/logIn');
	}

}

 ?>