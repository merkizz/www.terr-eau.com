<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php require_once 'header_devis.php';?>


<head>

<title>Demandez un devis gratuit pour votre jardin</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Faites une demande de devis gratuit à Terr'eau">
<meta name="keywords" content="jardinier paysagiste seine saint denis,entretien de jardins seine saint denis,création de jardin seine saint denis">
<meta name="language" content="french">

<link href="css/style.css" rel="stylesheet" type="text/css">

<?php include 'mm_menu.php' ?>

</head>

<body>

<?php include 'module/message_navigateur.php'; ?>

<a name="haut"></a>

<script language="JavaScript1.2">mmLoadMenus();</script>

<table width="950" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><img src="gfx/page_01.jpg" width="1000" height="82" border="0" usemap="#Map1" name="mmenu2"/></td>
  </tr>
  <tr>
    <td><img src="gfx/page_02.jpg" width="1000" height="105" border="0" usemap="#Map" name="mmenu1"/></td>
  </tr>
  <tr>
    <td valign="top" style="background:transparent url('gfx/page_03.jpg') no-repeat top left; height:48px;padding-left:482px"><h1 id="id_h1"><span>D</span>emande de devis</h1></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#f7f7f7"><table width="100%" height="352" border="0" cellpadding="0" cellspacing="0" style="background-image:url(gfx/page_04.jpg); background-position:top left; background-repeat:no-repeat;">
      <tr>
        <td width="20" rowspan="3">&nbsp;</td>
        <td width="93%">&nbsp;</td>
        <td width="20" rowspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><?php require_once 'gestion/inc/misc.php';HtdtcShow('content/l1/','080Demande de devis.txt');?><?php require_once 'header_contact.php';?></td>
      </tr>
	   <tr>
        <td><?php require_once 'form-devis.php';?></td>
      </tr>
	     </table></td>
  </tr>
  <tr>
      <td style="background:transparent url('gfx/page_05.jpg') no-repeat top left; height:43px"><?php include 'module/coordonnees.php'; ?></td>
  </tr>
</table>

<?php include 'module/footer.php'; ?>