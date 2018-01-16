<?php

/*************************** VPEG - Verif POST & GET ****************************/

function finc_verif_request()
{
	while(list($k,$v) = each($_POST))
	{
		$_POST[$k] = htmlentities(addslashes($_POST[$k]));
	}
	
	while(list($k,$v) = each($_GET))
	{
		$_GET[$k] = htmlentities(addslashes($_GET[$k]));
	}
}

/************************* SSec - Session sécurisée V1 **********************************/
// A UTILISER AVANT TOUT HTML ! 

function finc_session_start($duree)
{
	session_start();

	if (isset($_SESSION['HTTP_USER_AGENT']) && isset($_SESSION['sess_ip']) && $_SESSION['sess_ip'] == $_SERVER["REMOTE_ADDR"])
	{
		if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
		{
			//renvoie sur une autre page si un client/hacker change de HTTP_USER_AGENT
			header("location: index.php?err=1" );
			echo '<script language="JavaScript">window.location="index.php?err=1"</script>';
			exit;
		}
		
		if( abs(time()-$_SESSION['sess_time']>$duree) ){
		   // renvoie sur une autre page si la session expire...
		   header("location: index.php?err=2");
		   echo "<script language='JavaScript'>window.location='index.php?err=2'</script>";
		   exit;
		}
		else
		{
			// Rajoute nouveau temps
			$_SESSION['sess_time']=time();  
		}
	}
	else
	{
		// Initialise le user agent de la session courante
		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
	}
}

/************************** Dsec - Destructeur de session V1 *********************************/
// A UTILISER AVANT TOUT HTML ET SANS SESSION START ! 

function finc_session_destroy()
{
	if(!isset($_SESSION['HTTP_USER_AGENT'])){finc_session_start(10);} // On démarre une session de 10 secondes le temps de l'utiliser
	session_unset();
	session_destroy();
	session_regenerate_id();

}

/************************** APos - AGet - ASes Afficheur de POST, GET et SESSION *********************************/

function finc_affiche_get()
{
	echo '<fieldset style="border : 1px solid black; background-color:#7F1717; color: white;"><legend style="border : 1px solid black; color:white; background-color:#7F1717;">LISTE DES GET</legend>';
	
	while(list($k,$v) = each($_GET))
	{
		echo '- '.$k.' : '.$v.'<br />';
	}
	echo '</fieldset><br /><br />';
}

function finc_affiche_post()
{
	echo '<fieldset style="border : 1px solid black; background-color:#7F1717; color: white;"><legend style="border : 1px solid black; color:white; background-color:#7F1717;">LISTE DES POST</legend>';
	
	while(list($k,$v) = each($_POST))
	{
		echo '- '.$k.' : '.$v.'<br />';
	}
	echo '</fieldset><br /><br />';
}

function finc_affiche_session()
{
	
	if(!isset($_SESSION['HTTP_USER_AGENT'])){finc_session_start(10);} // On démarre une session de 10 secondes le temps de l'utiliser
	echo '<fieldset style="border : 1px solid black; background-color:#7F1717; color: white;"><legend style="border : 1px solid black; color:white; background-color:#7F1717;">LISTE DES SESSION</legend>';
	
	while(list($k,$v) = each($_SESSION))
	{
		echo '- '.$k.' : '.$v.'<br />';
	}
	echo '</fieldset><br /><br />';
}

/*********************** RMD - rmdir en récursif ********************************/


function finc_rmdir($dirname)
{
	//Vérfication que le fichier existe
	if (!file_exists($dirname)) {
		return false;
	}

	// Suppression simple
	if (is_file($dirname) || is_link($dirname)) {
		return unlink($dirname);
	}

	// Boucle de parcourt d'un dossier
	$dir = dir($dirname);
	while (false !== $entry = $dir->read()) {
		// On saute les pointeurs
		if ($entry == '.' || $entry == '..') {
			continue;
		}

		// Récursivité
		@finc_rmdir($dirname . DIRECTORY_SEPARATOR . $entry);
	}

	//Fermeture
	$dir->close();
	return rmdir($dirname);
}

/**********************  FdF - Formatage de fichiers ***********************/

 
function finc_renommerFichier($repertoire, $nomFichier) 
{
	$nouvNom = ereg_replace('[éèë]', 'e', $nomFichier);
	$nouvNom = ereg_replace('[àä]', 'a', $nouvNom);
	$nouvNom = ereg_replace('[ùü]', 'u', $nouvNom);
	$nouvNom = ereg_replace('[()_ ]', '', $nouvNom);
	@chmod(0777, $repertoire . $nomFichier);
	@rename($repertoire . $nomFichier, $repertoire . $nouvNom);
}
 
function finc_parcourirArborescence($repertoire) 
{
    if (!ereg('/$', $repertoire)) {
        $repertoire .= '/';
    }
    if (@ $dh = opendir($repertoire)) {
        while (($fichier = readdir($dh)) != FALSE) 
		{
            if ($fichier == '.' ||$fichier = '..') 
			{
                continue; // On l'omet
            }
            if (is_dir($repertoire . $fichier)) 
			{
                finc_parcourirArborescence($repertoire . $fichier); // Récursivité
            } 
			elseif (ereg('[éèëàäùü()_ ]', $fichier)) 
			{
				finc_renommerFichier($repertoire, $fichier);
            }
        }
        @ closedir($dh);
    }
}
 
/****************** IPFSR - Générer un insert par POST, GET, SESSION ou REQUEST ****************/

function finc_insert_request($methode)
{
	$champs = $values = '';
	switch (strtoupper($methode))
	{
		case 'GET' :
			while(list($k,$v) = each($_GET))
			{
				$champs .= "`".$k."`,";
				$values .= "'".($v)."',";
			}
		break;
		case 'POST' :
			while(list($k,$v) = each($_POST))
			{
				$champs .= "`".$k."`,";
				$values .= "'".($v)."',";
			}
		break;
		case 'SESSION' :
			while(list($k,$v) = each($_SESSION))
			{
				$champs .= "`".$k."`,";
				$values .= "'".($v)."',";
			}
		break;
		case 'REQUEST' :
			while(list($k,$v) = each($_REQUEST))
			{
				$champs .= "`".$k."`,";
				$values .= "'".($v)."',";
			}
		break;
	}
	
	
	$champs = substr($champs,0,-1);
	$values = substr($values,0,-1);
	
	$requete = "INSERT INTO permis (".$champs.") VALUES (".$values.")";
	return $requete;
}

/************************ UPFSR - Générer un update par POST, GET, SESSION ou REQUEST **********************************/

function finc_update_request($methode, $table, $where)
{
	$champs = $values = '';
	switch (strtoupper($methode))
	{
		case 'GET' :
			while(list($k,$v) = each($_GET))
			{
				$champs .= "`".addslashes($k)."` = ";
				$values = "'".(addslashes($v))."', ";
				$champs .= 	$values;
			}
		break;
		case 'POST' :
			while(list($k,$v) = each($_POST))
			{
				$champs .= "`".addslashes($k)."` = ";
				$values = "'".(addslashes($v))."', ";
			}
		break;
		case 'SESSION' :
			while(list($k,$v) = each($_SESSION))
			{
				$champs .= "`".addslashes($k)."` = ";
				$values = "'".(addslashes($v))."', ";
				
			}
		break;
		case 'REQUEST' :
			while(list($k,$v) = each($_REQUEST))
			{
				$champs .= "`".$k."`,";
				$values .= "'".($v)."',";
			}
		break;
	}
		
	$champs .= 	$values;
	$champs = substr($champs,0,-2); // Supprime la virgule de fin

	$request = "UPDATE ".$table." SET ".$champs." ".$where." ";
	return $request;
}

/*********************** FAC - Formatage des accents courants *************************/

function finc_formatage_chaine($chaine) 
{
	$nouvelleChaine = ereg_replace('[éèëê]', 'e', $chaine);
	$nouvelleChaine = ereg_replace('[àäâ]', 'a', $nouvelleChaine);
	$nouvelleChaine = ereg_replace('[ìïî]', 'i', $nouvelleChaine);
	$nouvelleChaine = ereg_replace('[òöô]', 'o', $nouvelleChaine);
	$nouvelleChaine = ereg_replace('[ùüû]', 'u', $nouvelleChaine);
	$nouvelleChaine = ereg_replace('[ÿ]', 'y', $nouvelleChaine);
	$nouvelleChaine = ereg_replace('[ìïî]', 'i', $nouvelleChaine);
	return $nouvelleChaine;
}

/******************** TUrl - Transformation d'url dans une chaine *********************/

function finc_txtURL($texte)
{
	$texte = ereg_replace("(http://)(([[:punct:]]|[[:alnum:]])*)","<a href='\'>\\2</a>",$texte);
	return $texte;
}

/******************* Gip - Retourne l'ip de l'utilisateur ******************************/

function finc_getIp()
{
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
	elseif(isset($_SERVER['REMOTE_ADDR'])){
		$ip = $_SERVER['REMOTE_ADDR'];}
	else{ $ip = $_SERVER['REMOTE_ADDR'];}
		return $ip;
}

/***************** Resu - Fait un résumé d'une chaine avec une ponctuation **************/

function finc_resume($chaine, $max, $lim)
{
	if (strlen($chaine) > $max)
	{
		$chaine = substr($chaine, 0, $max);
		$dernier_espace = strrpos($chaine, "");
		$chaine = substr($chaine, 0, $dernier_espace).$lim;
	}
	 
	return $chaine;
}

/**************************** FDM - Formatage de Date pour Mysql ******************************/
function finc_format_date_AF($date='1970-01-01')
{
	list($annee,$mois,$jour)=explode("-",$date);
	$date_francais=$annee."/".$mois."/".$jour;
	echo $date_francais;
}

function finc_format_date_FA($date='01/01/1970')
{
	list($jour,$mois,$annee)=explode("/",$date);
	$date_anglais=$annee."-".$mois."-".$jour;
	echo $date_anglais;
}

function finc_date_longue($datesql='1970-01-01') 
{ 
	$explosion = explode('-', $datesql);
	$jdatdeb= $explosion[0];
	$mdatdeb= $explosion[1];
	$adatdeb= $explosion[2];

	  $tJours=array( 
		"dimanche", "lundi", "mardi", 
		"mercredi", "jeudi", "vendredi", "samedi"); 
			 
	  $tMois=array( 
		'01'=>"janvier", '02'=>"février", '03'=>"mars", '04'=>"avril", '05'=>"mai", '06'=>"juin", '07'=>"juillet", '08'=>"août", '09'=>"septembre", '10'=>"octobre", '11'=>"novembre", '12'=>"décembre"); 
		 
	$mois=ucfirst($tMois[$mdatdeb]); 
	$joursemaine=$tJours[date("w",mktime(0, 0, 0, $mdatdeb, $jdatdeb, $adatdeb))]; 

		$date=ucfirst($joursemaine)." $jdatdeb $mois $adatdeb"; 
		echo $date;

} 
?>