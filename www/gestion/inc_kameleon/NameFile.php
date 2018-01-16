<?php

function NameFile($FileToname)
{
	$goodfilename=stripslashes(strtolower(strtr($FileToname, ' \"\'ְֱֲֳִֵאבגדהוׂ׃װױײ״עףפץצרָֹÊֻטיךכַחּֽ־ֿלםמןÙÚÛÜשתûüÿׁס', '____aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn')));
	return $goodfilename;
}

?>