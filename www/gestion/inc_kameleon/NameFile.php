<?php

function NameFile($FileToname)
{
	$goodfilename=stripslashes(strtolower(strtr($FileToname, ' \"\'�����������������������������������������������������', '____aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn')));
	return $goodfilename;
}

?>