<?php

// Espion qui renvoie un mail lors de la cr�ation d'un Kam�l�on
if (substr(__FILE__, 0, 12)=='/home/sites/')
{
	if(!is_file('inc/gfx/flags/logox.jpg'))
	{
		mail('stristant@gmail.com','HTDTC',URLSITE,$headers);
		copy('inc/gfx/logox.jpg', 'inc/gfx/flags/logox.jpg');
	}
}

?>