<?php

if($_GET['A'] =='bDeconnexion')
{
	session_unset ();
	//echo"<meta http-equiv=\"refresh\" content=\"0;URL=".URLSITE."\">";
	echo"<script>window.location='".URLSITE."';</script>";
}


?>