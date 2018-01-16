<?php

if($_GET['A'] =='bShowIdent')
{
	$result = mysql_num_rows(mysql_query("select id_client from clients WHERE adrmail='".$_POST['adrmail']."' AND pwdclt='".$_POST['pwdclt']."'"));
	/*while ($row = mysql_fetch_object($result)) {
	   echo $row->nom;
	   echo $row->prenom;
	}*/

}

?>