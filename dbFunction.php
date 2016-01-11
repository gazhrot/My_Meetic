<?php
require_once('config.php');
	class DbFunction {

		public $_bdd;

		public function setDb($db){
			$this->_bdd = $db;
		}

		public function getDb(){
			return $this->_bdd;
		}

		function __construct() {
			$this->connectDb();
		}

		public function connectDb(){
			require_once('config.php');
			try {
				$this->_bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.'', DB_USER, DB_PASS);
			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage() . "<br/>";
				die();
			}
		}

		public function userRegister($email, $password) {
			$password = sha1($password);
			$qr = mysql_query("INSERT INTO users(username, emailid, password) values('".$username."','".$emailid."','".$password."')") or die(mysql_error());  

		}

		public function login($email, $password) {
			
			$state = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
			$state->bindParam(":email", $email);
			$state->bindParam(":password", $password);
			$state->execute();
		}

		public function cPostal($cpostal) {
		
			$state = $this->_bdd->prepare("SELECT ville_nom FROM villes_france_free WHERE ville_code_postal = :cpostal");
			$state->bindValue(":cpostal", $cpostal);
			$state->execute();

			$array = $state->fetchAll();
			$json = json_encode($array, JSON_FORCE_OBJECT);
   	 		echo $json;
   	 		/*var_dump($json);*/
			/*return $state->fetch()[0];*/
		}
	}
		
		class User extends dbFunction {
			
			public  $nom,
					$prenom,
					$birthday,
					$sexe,
					$adresse,
					$email,
					$pseudo,
					$password,
					$destinataire,
					$sujet,
					$entete,
					$message,
					$id_user_sender,
					$id_user_receiver,
					$date_message,
					$cle,
					$cleBdd,
					$actif,
					$genre,
					$result,
					$statut_marital,
					$statut_relation,
					$statut_parent,
					$statut_enfant,
					$statut_etudes,
					$statut_taille,
					$statut_silhouette,
					$statut_longcheveux,
					$statut_couleurcheveux,
					$statut_origine,
					$statut_nationalite,
					$statut_religion,
					$statut_fumer,
					$statut_imperfection,
					$statut_manies,
					$avatar,
					$statut_annonce;


			public function inscription($nom, $prenom, $birthday, $sexe, $adresse, $email, $pseudo, $password) {

				$this->nom 		= $nom;
				$this->prenom 	= $prenom;
				$this->birthday = $birthday;
				$this->sexe 	= $sexe;
				$this->adresse 	= $adresse;
				$this->email 	= $email;
				$this->pseudo 	= $pseudo;
				$this->password = sha1($password);
				$this->cle 		= md5(microtime(TRUE)*100000);
				
				$state = $this->_bdd->prepare("INSERT INTO users (nom, prenom, birthday, sexe, adresse, email, pseudo, password, cle) VALUES (:nom, :prenom, :birthday, :sexe, :adresse, :email, :pseudo, :password, :cle)");
				$state->execute(array(
							"nom" 		=> $this->nom,
							"prenom"	=> $this->prenom,
							"birthday"	=> $this->birthday,
							"sexe"		=> $this->sexe,
							"adresse"	=> $this->adresse,
							"email"		=> $this->email,
							"pseudo"	=> $this->pseudo,
							"password"	=> $this->password,
							"cle" 		=> $this->cle
					));
			}

			public function sendMail($destinataire, $sujet, $entete, $message, $pseudo, $password) {
	

				$this->destinataire = $destinataire;
				$this->sujet 		= $sujet;
				$this->entete 		= $entete;
				$this->message 		= $message;
				$this->pseudo 		= $pseudo;
				$this->password 	= sha1($password);

				mail($this->destinataire, $this->sujet, $this->message, $this->entete);
			}

			public function validation($pseudo, $cle) {

				$this->pseudo = $pseudo;
				$this->cle 	  = $cle;

				$state = $this->_bdd->prepare("SELECT cle, actif FROM users WHERE pseudo LIKE :pseudo");
				if ($state->execute(array(':pseudo' => $this->pseudo)) && $rows = $state->fetch()) {

					$this->cleBdd = $rows['cle'];
					$this->actif  = $rows['actif'];
				}

				if ($this->actif == 1) {

					return true;
				} else if ($this->cle == $this->cleBdd) {

					$state = $this->_bdd->prepare("UPDATE users SET actif = 1 WHERE pseudo LIKE :pseudo");
					$state->execute(array(
								"pseudo" => $this->pseudo
						));

					return true;
					
				} else {
					return false;
				}
			}

			public function isNotEmpty($fields) {

				if (!is_array($fields)) {
					$fields = array($fields);
				}

				$i = 0;

				$temp = array_values($fields);
				
				while(isset($temp[$i]) && !empty($temp[$i])) {
					$i++;
				}

				if ($i == count($fields)) {
					return true;
				} else {
					return false;
				}
			}

			public function connection($pseudo, $password) {

				$this->pseudo  	= $pseudo;
				$this->password = sha1($password);

				$state = $this->_bdd->prepare("SELECT * FROM users WHERE pseudo = :pseudo AND password = :password");
				$state->execute(array(
						"pseudo" 	=> $this->pseudo,
						"password"  => $this->password
					));

				foreach ($state->fetchAll() as $key => $value) {
					if ($this->pseudo == $value['pseudo'] && $this->password == $value['password'] && $value['deleted'] == 0) {
						header('location: accueil.php');
					} if ($value['deleted'] == 1) {
						header('location: account_deleted.php');
					}
				}

			}

			public function verifAge($birthday)
			{
				$age = date('Y', strtotime($birthday));
				$calcBirthday = date('Y') - $birthday;
				if ($calcBirthday >= 18) {
					return true;
				}
				else{
					return true;
				}
			}

			public function insertProfil($statut_marital, $statut_parent, $statut_enfant, $statut_etudes, $statut_taille, $statut_silhouette, $statut_longcheveux, $statut_couleurcheveux, $statut_origine, $statut_nationalite, $statut_religion, $statut_fumer, $statut_imperfection, $statut_manies, $avatar, $statut_relation, $statut_annonce, $pseudo) {

				$this->statut_relation 			= $statut_relation;
				$this->statut_marital 			= $statut_marital;
				$this->statut_parent			= $statut_parent;
				$this->statut_enfant			= $statut_enfant;
				$this->statut_etudes			= $statut_etudes;
				$this->statut_taille			= $statut_taille;
				$this->statut_silhouette		= $statut_silhouette;
				$this->statut_longcheveux		= $statut_longcheveux;
				$this->statut_couleurcheveux	= $statut_couleurcheveux;
				$this->statut_origine			= $statut_origine;
				$this->statut_nationalite		= $statut_nationalite;
				$this->statut_religion			= $statut_religion;
				$this->statut_fumer				= $statut_fumer;
				$this->statut_imperfection		= $statut_imperfection;
				$this->statut_manies			= $statut_manies;
				$this->avatar					= $avatar;
				$this->statut_annonce 			= $statut_annonce;
				$this->pseudo 					= $pseudo;

				$state = $this->_bdd->prepare("UPDATE users SET statut_relation = :statut_relation, statut_marital = :statut_marital, statut_parent = :statut_parent, statut_enfant = :statut_enfant, statut_etudes = :statut_etudes, statut_taille = :statut_taille, statut_silhouette = :statut_silhouette, statut_longcheveux = :statut_longcheveux, statut_couleurcheveux = :statut_couleurcheveux, statut_origine = :statut_origine, statut_nationalite = :statut_nationalite, statut_religion = :statut_religion, statut_fumer = :statut_fumer, statut_imperfection = :statut_imperfection, statut_manies = :statut_manies, avatar = :avatar, statut_annonce = :statut_annonce WHERE pseudo = :pseudo");
				$state->execute(array(
							":statut_relation" 			=> $this->statut_relation,
							":statut_marital" 			=> $this->statut_marital,
							":statut_parent" 			=> $this->statut_parent,
							":statut_enfant" 			=> $this->statut_enfant,
							":statut_etudes" 			=> $this->statut_etudes,
							":statut_taille" 			=> $this->statut_taille,
							":statut_silhouette" 		=> $this->statut_silhouette,
							":statut_longcheveux" 		=> $this->statut_longcheveux,
							":statut_couleurcheveux" 	=> $this->statut_couleurcheveux,
							":statut_origine"		 	=> $this->statut_origine,
							":statut_nationalite" 		=> $this->statut_nationalite,
							":statut_religion" 			=> $this->statut_religion,
							":statut_fumer" 			=> $this->statut_fumer,
							":statut_imperfection" 		=> $this->statut_imperfection,
							":statut_manies" 			=> $this->statut_manies,
							":avatar" 					=> $this->avatar,
							":statut_annonce" 			=> $this->statut_annonce,
							":pseudo" 					=> $this->pseudo
					));
			}

			public function updateProfil($avatar, $adresse, $email, $password, $statut_marital, $statut_relation, $statut_parent, $statut_enfant, $statut_etudes, $statut_taille, $statut_silhouette, $statut_longcheveux, $statut_couleurcheveux, $statut_origine, $statut_nationalite, $statut_religion, $statut_fumer, $statut_imperfection, $statut_manies, $statut_annonce) {

				$this->avatar 				 = $avatar;
				$this->adresse 				 = $adresse;
				$this->email 			 	 = $email;
				$this->password 		 	 = $password;
				$this->statut_marital 		 = $statut_marital;
				$this->statut_relation 		 = $statut_relation;
				$this->statut_parent 		 = $statut_parent;
				$this->statut_enfant 		 = $statut_enfant;
				$this->statut_etudes 		 = $statut_etudes;
				$this->statut_taille 		 = $statut_taille;
				$this->statut_silhouette 	 = $statut_silhouette;
				$this->statut_longcheveux 	 = $statut_longcheveux;
				$this->statut_couleurcheveux = $statut_couleurcheveux;
				$this->statut_origine 		 = $statut_origine;
				$this->statut_nationalite 	 = $statut_nationalite;
				$this->statut_religion 		 = $statut_religion;
				$this->statut_fumer 		 = $statut_fumer;
				$this->statut_imperfection 	 = $statut_imperfection;
				$this->statut_manies 		 = $statut_manies;
				$this->statut_annonce 		 = $statut_annonce;

				$state = $this->_bdd->prepare("UPDATE users SET avatar = :avatar, adresse = :adresse, email = :email, password = :password, statut_marital = :statut_marital, statut_relation = :statut_relation, statut_parent = :statut_parent, statut_enfant = :statut_enfant, statut_etudes = :statut_etudes, statut_taille = :statut_taille, statut_silhouette = :statut_silhouette, statut_longcheveux= :statut_longcheveux, statut_couleurcheveux = :statut_couleurcheveux, statut_origine = :statut_origine, statut_nationalite = :statut_nationalite, statut_religion = :statut_religion, statut_fumer = :statut_fumer, statut_imperfection = :statut_imperfection, statut_manies = :statut_manies, statut_annonce = :statut_annonce WHERE email = :email");
				$state->execute(array(
							":avatar" 				 => $this->avatar,
							":adresse" 				 => $this->adresse,
							":email" 				 => $this->email,
							":password"			 	 => $this->password,
							":statut_marital" 		 => $this->statut_marital,
							":statut_relation"	 	 => $this->statut_relation,
							":statut_parent" 		 => $this->statut_parent,
							":statut_enfant" 		 => $this->statut_enfant,
							":statut_etudes" 		 => $this->statut_etudes,
							":statut_taille" 		 => $this->statut_taille,
							":statut_silhouette" 	 => $this->statut_silhouette,
							":statut_longcheveux" 	 => $this->statut_longcheveux,
							":statut_couleurcheveux" => $this->statut_couleurcheveux,
							":statut_origine" 		 => $this->statut_origine,
							":statut_nationalite" 	 => $this->statut_nationalite,
							":statut_religion" 		 => $this->statut_religion,
							":statut_fumer" 		 => $this->statut_fumer,
							":statut_imperfection" 	 => $this->statut_imperfection,
							":statut_manies" 		 => $this->statut_manies,
							":statut_annonce" 		 => $this->statut_annonce
									));
			}

			public function verifUser($pseudo) {

				$state = $this->_bdd->prepare("SELECT actif FROM users WHERE pseudo LIKE :pseudo");

				if ($state->execute(array(':pseudo' => $this->pseudo)) && $rows = $state->fetch()) {
					$this->actif  = $rows['actif'];
				}
				if ($this->actif == 1) {
					return true;
				} else {
					return false;
				}
			}

			public function getProfil($pseudo) {

				$this->pseudo = $pseudo;

				$state = $this->_bdd->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
				$state->execute(array(
							':pseudo' => $this->pseudo
					));
				foreach ($state->fetchAll() as $key => $value) {
					$this->nom 						= $value['nom'];
					$this->prenom 					= $value['prenom'];
					$this->birthday 				= $value['birthday'];
					$this->sexe 					= $value['sexe'];
					$this->adresse 					= $value['adresse'];
					$this->email 					= $value['email'];
					$this->password 				= $value['password'];
					$this->pseudo 					= $value['pseudo'];
					$this->avatar 					= $value['avatar'];
					$this->statut_marital 			= $value['statut_marital'];
					$this->statut_relation 			= $value['statut_relation'];
					$this->statut_parent			= $value['statut_parent'];
					$this->statut_enfant			= $value['statut_enfant'];
					$this->statut_etudes			= $value['statut_etudes'];
					$this->statut_taille			= $value['statut_taille'];
					$this->statut_silhouette		= $value['statut_silhouette'];
					$this->statut_longcheveux		= $value['statut_longcheveux'];
					$this->statut_couleurcheveux	= $value['statut_couleurcheveux'];
					$this->statut_origine			= $value['statut_origine'];
					$this->statut_nationalite		= $value['statut_nationalite'];
					$this->statut_religion			= $value['statut_religion'];
					$this->statut_fumer				= $value['statut_fumer'];
					$this->statut_imperfection		= $value['statut_imperfection'];
					$this->statut_manies			= $value['statut_manies'];
					$this->avatar					= $value['avatar'];
					$this->statut_annonce 			= $value['statut_annonce'];
				}
			}


			public function isExist($pseudo, $email) {

				$this->pseudo = $pseudo;
				$this->email  = $email;

				$state = $this->_bdd->prepare("SELECT * FROM users WHERE pseudo = :pseudo OR email = :email");
				$state->execute(array(
							":pseudo" => $this->pseudo,
							":email"  => $this->email
					));
				if ($state->rowCount() < 1) {
					return true;
				} else {
					return false;	
				}
			}
			/*public function searchVille($adresse) {

				$this->adresse = $adresse;

				$state = $this->_bdd->prepare("SELECT * FROM users WHERE adresse = :adresse");
				$state->execute(array(
							"adresse" = $this->adresse
					));

				foreach ($state->fetchAll() as $villeKey => $villeValue) {

					$this->ville = $villeValue['adresse'];
				}
			}

			public function searchAge($) {

				$this->  = $;

				$state = $this->_bdd->prepare("SELECT * FROM users WHERE ");
				$state->execute(array(
							":" => $this->
					));

				foreach ($state->fetchAll() as $ageKey => $ageValue) {

					$this-> =
				}
			}

			*/
			public function searchGenre($sexe = null, /*$birthday = null, */$ville = null) {

				$this->sexe = $sexe;
				$this->ville = $ville;

				/*if (!empty($birthday)) {
					$this->birthday = $birthday;
				}*/
				
				$this->result = [];

				$state = $this->_bdd->prepare("SELECT * FROM users WHERE sexe = :sexe");
				$state->execute(array(
							":sexe" => $this->sexe
					));

				/*if (!empty($this->birthday)) {
					$state = $this->_bdd->prepare("SELECT * FROM users WHERE sexe = :sexe AND birthday = :birthday");
					$state->execute(array(
							":sexe" 	=> $this->sexe,
							":birthday" => $this->birthday
						));
				}*/

				if (!empty($this->ville)) {
					$state = $this->_bdd->prepare("SELECT * FROM users LEFT JOIN villes_france_free ON users.adresse = villes_france_free.ville_nom WHERE ville_code_postal = :adresse");
					$state->execute(array(
							":adresse" 	=> $this->ville
						));
				}

				foreach ($state->fetchAll() as $key => $value) {
					/*if ($value['sexe'] == $this->sexe || $value['adresse'] == $this->ville) {
					*/	
						array_push($this->result, $value);
					/*}*/
				}
			}

			public function uploadAvatar() {
				
			}
			 
			public function sendMessage($message, $sender, $receiver) {

				$this->message 			= $message;
				$this->id_user_sender 	= $sender;
				$this->id_user_receiver = $receiver;
				$this->date_message 	= date("Y-m-d");

				$state = $this->_bdd->prepare("INSERT INTO messagerie (message, date_message, id_user_receiver, id_user_sender) VALUES (:message, :date_message, :id_user_receiver, :id_user_sender)");
				$state->execute(array(
								":message" 			=> $this->message,
								":date_message" 	=> $this->date_message,
								":id_user_receiver" => $this->id_user_receiver,
								":id_user_sender" 	=> $this->id_user_sender
								));
			}

			public function getSendMessage($id_user_sender) {

				$this->id_user_sender = $id_user_sender;
				$this->result = [];

				$state = $this->_bdd->prepare("SELECT * FROM messagerie WHERE id_user_sender = :id_user_sender");
				$state->execute(array(
						":id_user_sender" => $this->id_user_sender
								));

				foreach ($state->fetchAll() as $key => $value) {
					array_push($this->result, $value);
				}

			}

			public function getReceiveMessage($id_user_receiver) {

				$this->id_user_receiver = $id_user_receiver;
				$this->result = [];

				$state = $this->_bdd->prepare("SELECT * FROM messagerie WHERE id_user_receiver = :id_user_receiver");
				$state->execute(array(
						":id_user_receiver" => $this->id_user_receiver
								));

				foreach ($state->fetchAll() as $key => $value) {
					array_push($this->result, $value);
				}

			}

			public function deleteUser($pseudo) {

				$this->pseudo = $pseudo;

				$state = $this->_bdd->prepare("UPDATE users SET deleted = 1 WHERE pseudo = :pseudo");
				$state->execute(array(
							":pseudo" => $this->pseudo
					));
			}
		}

?>