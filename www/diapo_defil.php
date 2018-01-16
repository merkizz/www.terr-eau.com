<link rel="stylesheet" href="css/image-slideshow.css" type="text/css">
<link href="gestion/do/do.css" rel="stylesheet" type="text/css">

<?php

if (is_dir($_GET["dossier"]))
{
$dir = opendir($_GET["dossier"]);

       $liste_resultat = "";
       while($fichier = readdir($dir))
       {
             if ($fichier == '.' || $fichier == '..'|| $fichier == 'Thumbs.db' ) continue;
             
             $liste_resultat .= $_GET["dossier"].'/'.$fichier.',';
             
       }

$liste_resultat = substr($liste_resultat,0,-1);
//echo $liste_resultat;
$tableau_img = explode(",",$liste_resultat);

usort($tableau_img, "strcasecmp");
//echo count($tableau_img);
}
else {$tableau_img[0] = "content/photos/non-dispo.jpg";
$liste_resultat = "content/photos/non-dispo.jpg";}

?>
	

<script type="text/javascript" src="css/image-slideshow.js"></script>
<?php 
echo "<SCRIPT language=JavaScript>
imgPath = new Array;
SiClickGoTo = new Array;
if (document.images)
{";
for ($c = 0 ; $c < count($tableau_img) ; $c++)
{
echo "i".$c." = new Image;
i".$c.".src = 'content/photos/non-dispo.jpg';
SiClickGoTo[".$c."] = '".$tableau_img[$c]."';
imgPath[".$c."] = '".$tableau_img[$c]."';";
}
echo "
}
a = 0;
function ejs_img_fx(img)
{
if(img && img.filters && img.filters[0])
{
img.filters[0].apply();
img.filters[0].play();
}
}

function StartAnim(hauteur,largeur)
{
	if (document.images)
	{
		document.write('<IMG BORDER=5 height='+largeur+' NAME=defil style=\"FILTER: progid:DXImageTransform.Microsoft.Fade(Overlap=1.00); border-color:#ffffff\">');
		defilimg()
	}
	else
	{
		document.write('<IMG BORDER=0>')
	}
}

function ImgDest()
	{
	window.open(SiClickGoTo[a-1],'_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=620, height=280');
	}
function defilimg()
{
	if ((a == ".count($tableau_img).") || (imgPath[a] ==\"\"))
	{
		a = 0;
	}
	
	if (document.images)
	{
		ejs_img_fx(document.defil)
		document.defil.src = imgPath[a];
		var image = imgPath[a].split(\"/\");
		var tailleimg = image[3].length;
		document.defil.alt = image[3].substr(0,(tailleimg-4));
		tempo3 = setTimeout(\"defilimg()\",3000);
		a++;
	}
}
function AfficherImage(numero)
{
	document.defil.src=imgPath[numero];
	a=numero;
}
</SCRIPT>"; ?>
</head>
<body>
<table width="350" align="center">
	<tr>
		<td><div align="center" style="height:40px; margin-top:10px; margin-bottom:10px; height:400px">
			<?php if (isset($tableau_img))  echo "<SCRIPT language=JavaScript>Chemin_img = new Array;defilimg()</SCRIPT>"; 
				echo "<SCRIPT language=JavaScript> Chemin_img = new Array; StartAnim(\"600\",\"400\"); </SCRIPT>"; ?></div>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td align="center" valign="top" style=" z-index:10; display:block;">
						<div id="galleryContainer"><?php if (isset($tableau_img) && count($tableau_img) >= 2){ if (count($tableau_img) > 3) { ?>

						<div id="arrow_left"><img src="gfx/arrow_left.png" width="75" height="75"></div>
						<div id="arrow_right"><img src="gfx/arrow_right.png" width="75" height="75"></div><?php } ?>
						
						<div id="theImages"><?php if (isset($tableau_img))
						{ for ($i=0;$i<count($tableau_img); $i++)  {echo '<a href="#" onclick="AfficherImage(\''.$i.'\',\'1\');return false"><img src="'.$tableau_img[$i].'" height=72></a>';}
						} ?>
						<div id="slideEnd"></div></div><?php } ?></div></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>