<?php
/*************************************************************************************************
**                                                                                              **
**  + BackOffice +                               + HTDTC100%                                    **
**   + Version :                                  + #V.5 - 280508                               **
**    + Auteur : (c) S. Tristant                   + Email : stristant@gmail.com                **
**     + Bon voyage !                               +                                           **
**                                                                                              **
*************************************************************************************************/
//French
//LOGINPAGE
define("LOGINLOGIN", "Identification");define("LOGINUSER", "Utilisateur");define("LOGINPWD", "Mot de passe");
define("ABORT", "Annuler");define("LOGININ", "Valider");
/*define("LOGINMSG", "
<br><b>
<span class=firsthelp_htdtc>
<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=warning_htdtc><tr><td align=center>Quelques conseils &agrave; lire attentivement ...&nbsp;</td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/warning.gif\" border=0 align=absbottom></a>&nbsp;<span class=warning_htdtc>&nbsp;Quelques conseils &agrave; lire attentivement ...&nbsp;</span>
<br /><br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;Cliquez sur l'une des <span class=stylemenubtn_htdtc>Pages</span> de votre site pour l'afficher puis la modifier...
<br /><br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;Pour une mise en page agréable et efficace, nous vous conseillons d'utiliser les tableaux <img src='inc/gfx/insert_table.gif' border='0' align='absbottom'>
<br /><br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;Vous pouvez effectuer des copier-coller à partir des applications Word et Excel (sans images)fff
<br /><br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;A tout moment, vous pouvez savoir quelle est la fonction d'un <a class=\"bouton_htdtc\" href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>Ce bouton...<br>ne sert &agrave; rien</b></td></tr></table>')\" onMouseOut=\"HideBulle()\">&nbsp;<b> bouton </b>&nbsp;</a> en le survolant avec votre souris.
<br><br>
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;En outre des boutons d'aide ou de conseils
&nbsp;<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>Aides et conseils d\'utilisation</b></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/help.gif\" border=0 align=absbottom></a>
et d'avertissement &nbsp;<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=warning_htdtc><tr><td align=center>Attention !<br>Avertissement</td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/warning.gif\" border=0 align=absbottom></a>
vous informent des fonctionnalités de ce logiciel.
<br /><br />
<div align=center>
<img src=\"inc/gfx/helphelp.gif\" border=\"0\"><img src=\"inc/gfx/helpwarning.gif\" border=\"0\">
</div>

<br /><br />

");*/
define("LOGINMSG", "
<script> 
function clignotement(){ 
    if (document.getElementById(\"MonElement\").style.visibility==\"visible\") 
       document.getElementById(\"MonElement\").style.visibility=\"hidden\"; 
    else 
       document.getElementById(\"MonElement\").style.visibility=\"visible\"; 
} 
// mise en place de l appel régulier de la fonction toutes les 0.5 secondes 
var timer=setInterval(\"clignotement()\", 1000); 
</script> 



<b>
<table border=0 width=100% cellspacing=0 cellpadding=0><tr><td width=5%>&nbsp;</td><td width=2></td><td>
<br />
<span class=firsthelp_htdtc><b>
<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=warning_htdtc><tr><td align=center>Quelques conseils &agrave; lire attentivement ...&nbsp;</td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/warning.gif\" border=0 align=absbottom></a>&nbsp;<span class=warning_htdtc>&nbsp;Quelques conseils &agrave; lire attentivement ...&nbsp;</span>
<br /><br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;Cliquez sur l'une des <span class=stylemenubtn_htdtc>Pages</span> de votre site pour l'afficher puis la modifier...
<br /><br />
<table border=0 cellspacing=0 cellpadding=0><tr><td>
<div id=\"MonElement\" style=\"visibility:visible;\"> 
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\"><b>&nbsp;<font color=\"#FF6600\">Sauvegardez <span class=warning_htdtc>&nbsp;régulièrement&nbsp;</span> vos modifications&nbsp;</font>
<img src=\"inc/gfx/rightarrow.gif\" width=\"11\" height=\"8\" border=\"0\">
</div></td><td>&nbsp;<input type=\"image\" src=\"inc/gfx/stop.gif\" alt=\"Arrêter le clignotement\" onClick=\"clearInterval(timer);\"></td>
</tr></table>
<br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;Pour une mise en page agréable et efficace, nous vous conseillons d'utiliser les tableaux <img src='inc/gfx/insert_table.gif' border='0' align='absbottom'>
<br /><br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;Vous pouvez effectuer des copier-coller à partir des applications Word <img src='inc/gfx/paste_word.gif' border='0' align='absbottom'> et Excel (sans images)
<br /><br />
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;A tout moment, vous pouvez savoir quelle est la fonction d'un <a class=\"bouton_htdtc\" href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>Ce bouton...<br>ne sert &agrave; rien</b></td></tr></table>')\" onMouseOut=\"HideBulle()\">&nbsp;<b> bouton </b>&nbsp;</a> en le survolant avec votre souris.
<br><br>
<img src=\"inc/gfx/leftarrow.gif\" width=\"11\" height=\"8\" border=\"0\">&nbsp;En outre des boutons d'aide ou de conseils
&nbsp;<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>Aides et conseils d\'utilisation</b></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/help.gif\" border=0 align=absbottom></a>
et d'avertissement &nbsp;<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=warning_htdtc><tr><td align=center>Attention !<br>Avertissement</td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/warning.gif\" border=0 align=absbottom></a>
vous informent des fonctionnalités de ce logiciel lorsque vous les survolez.

<br /><br />
<div align=center>
<img src=\"inc/gfx/helphelp.gif\" border=\"0\"><img src=\"inc/gfx/helpwarning.gif\" border=\"0\">
<br /><br /><small>
Si vous éprouvez des difficultés,<br /><br />
- vous pouvez consulter l'aide en ligne : <a class=link_htdtc href=\"http://www.".FRS."/aide_kameleon/\" target=\"_blank\">http://www.".FRS."/aide_kameleon/</a><br />
<br />- nous sommes également à votre écoute au <big>0892 230 334</big><br />
Le matin de 9 à 13 heures (0,30 € /min) </small>
</div>
<br /><br />
</td></tr>
<!--<tr height=2><td></td><td colspan=2 bgcolor=orange></td></tr>-->
</table>
");
define("UPLOAD", "&nbsp;TELECHARGEMENT&nbsp;");
define("RENAMEFILEMSG", "&nbsp;<b>Renommer le fichier</b> &nbsp;");
define("FILERENAME", "<br /><div align=center><span class=\"infos_htdtc\">&nbsp;Fichier renommé !&nbsp;</span></div><br /><br />");
define("NEWFILEMSG", "&nbsp;<b>Nom de la nouvelle page</b> &nbsp;");
define("NEWDIRMSG", "&nbsp;<b>Nom du nouveau dossier</b> ");
define("NEWFOLDERMSG", "&nbsp;<b>Nom du nouveau dossier</b>");
define("NCHARMSG", "&nbsp;(15 caracteres maxi.)&nbsp;");
define("FILESAVED", "<br /><div align=center><span class=\"infos_htdtc\">&nbsp;Fichier enregistré !&nbsp;</span></div><br /><br />");
define("FORBIDDENFILENAME", "<div align=center><span class=\"warning_htdtc\">&nbsp;Index : Nom de  fichier interdit !&nbsp;</span></div><br />");
define("FILEEXIST", "<div align=center><span class=\"warning_htdtc\">&nbsp;Ce fichier existe déjà !&nbsp;</span></div><br />");

define("FOLDERSAVED", "<br /><div align=center><span class=\"infos_htdtc\">&nbsp;Dossier créé !&nbsp;</span></div><br /><br />");

define("FOLDEREXIST", "<div align=center><span class=\"warning_htdtc\">&nbsp;Ce dossier existe déjà !&nbsp;</span></div><br />");


define("CANTOPENFILE", "<div align=center>Erreur 68 :<br />&nbsp;Impossible d'ouvrir le fichier !<br />Veuillez contacter le support technique au 08 92 25 90 03.</div>");
define("CANTWRITEFILE", "<div align=center>Erreur 69 :<br />&nbsp;Impossible d'écrire dans le fichier !<br />Veuillez contacter le support technique au 08 92 25 90 03.</div>");
define("DELFILE", "Suppression du fichier !");
define("SEEFILEMSG", "<center><table  cellpadding=0 cellspacing=0 class=insert_htdtc><tr><td align=center>&nbsp;<b>Voir ou modifier ce fichier&nbsp;</td></tr></table>");
define("SEEPICMSG", "<center><table  cellpadding=0 cellspacing=0 class=insert_htdtc><tr><td align=center>&nbsp;<b>Voir l\'image originale&nbsp;</td></tr></table>");
define("DELFILEMSG", "<center><table  cellpadding=0 cellspacing=0 class=insert_htdtc><tr><td align=center>&nbsp;<b>Supprimer ce fichier&nbsp;</td></tr></table>");
define("RFILEMSG", "<center><table  cellpadding=0 cellspacing=0 class=insert_htdtc><tr><td align=center>&nbsp;<b>Renommer ce fichier&nbsp;</td></tr></table>");
define("JUSTPICS", "<center><table  cellpadding=0 cellspacing=0 class=insert_htdtc><tr><td align=center>&nbsp;<b>Images non agrandissables&nbsp;<br /></b>Vous permet ensuite d\'appliquer un lien aux images</td></tr></table>");
define("PICSHTDTC", "<center><table  cellpadding=0 cellspacing=0 class=insert_htdtc><tr><td align=center>&nbsp;<b>Images agrandissables&nbsp;</td></tr></table>");
define("WARNINGDELETEFILE", "Voulez-vous vraiment supprimer ");
define("FORBIDENFOLDERTODELETE", "<table cellpadding=\"2\" cellspacing=\"2\" border=1 bordercolor=\"#FF6600\"><tr><td class=warning_htdtc> Vous n'avez pas l'autorisation de supprimer,<br> ni de renommer les dossiers suivants : </td></tr><tr><td class=blue_htdtc><br><ol><li><img class=shadow_htdtc src=\"inc/gfx/dossier.gif\" align=\"absmiddle\" border=0><img class=shadow_htdtc src=\"inc/gfx/apphoto.gif\" align=\"absmiddle\" border=0> images1</li><li><img class=shadow_htdtc src=\"inc/gfx/dossier.gif\" align=\"absmiddle\" border=0><img class=shadow_htdtc src=\"inc/gfx/pdf_x.gif\" align=\"absmiddle\" border=0> documents1</li><li><img class=shadow_htdtc src=\"inc/gfx/dossier.gif\" align=\"absmiddle\" border=0><img class=shadow_htdtc src=\"inc/gfx/page_x.gif\" align=\"absmiddle\" border=0> popup1</li><li><img class=shadow_htdtc src=\"inc/gfx/dossier.gif\" align=\"absmiddle\" border=0><img class=shadow_htdtc src=\"inc/gfx/music.gif\" align=\"absmiddle\" border=0> music1</li><li><img class=shadow_htdtc src=\"inc/gfx/dossier.gif\" align=\"absmiddle\" border=0><img class=shadow_htdtc src=\"inc/gfx/videos.gif\" align=\"absmiddle\" border=0> videos1</li></ol></td></tr></table>");
define("WARNINGDELETEFOLDERTITLE", "SUPPRESSION DU DOSSIER");
define("WARNINGDELETEFOLDERMSG", "Voulez-vous vraiment supprimer ce dossier et les ");
define("WARNINGDELETEFOLDERMSG2", " fichiers qu'il contient ?");
define("WARNINGDELETEFOLDERMSG3", "Cliquer sur le bouton 'Supprimer' pour confirmer");
define("ADDFILE", "Ajouter ");
define("CLOSEUPWINDOW", "Fermer cette fen&ecirc;tre");
define("MYSITE", "<b>Mon site web</b>");
define("MYSITEMSG", "<br><table width=200 class=insert_htdtc><tr><td align=center><b>Ce bouton ouvre votre site dans une fen&ecirc;tre ind&eacute;pendante<br>Vous pouvez ainsi appr&eacute;cier les modifications effectu&eacute;es.</b></td></tr></table>");
define("QUIT", "<b>KaméléonOnline</b>");
define("QUITMSG", "<table class=insert_htdtc><tr><td align=center><b>Quitter<br> Kam&eacute;l&eacute;on<br>Online</b></td></tr></table>");
define("CHANGEPAGEMSG", "MODIFICATIONS");
define("SHOWBACKUPMSG", "VERSION PRECEDENTE");
define("RESTOREBACKUPMSG", "<b>R&eacute;cup&eacute;rer cette version</b>");
define("WARNINGBACKUPMSG", "Voulez-vous vraiment récupérer cette version de la page");
define("WARNINGBACKUPMSG2", "Vos dernières modifications seront perdues !");
define("DELCONFIRM", "Cliquez sur \'Ok\' pour confirmer");
define("WARNINGBEFOREINSERT", "<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=warning_htdtc><tr><td align=center>Attention !<br>Si vous avez effectué des modifications,<br> vous devez les enregistrer avant de cliquer sur les liens du bouton <img src=\'inc/gfx/insert.gif\' align=absbottom></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/warning.gif\" border=0 align=absbottom></a>");
define("HISTORYGOBACK", "<a class=bouton_htdtc href=\"javascript:history.go(-1);\" onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>Retour à la page précédente</b></td></tr></table>')\" onMouseOut=\"HideBulle()\">&nbsp;Retour&nbsp;</a>");
define("MODIFYBUTTON", "&nbsp;<b>Modifier cette page</b>&nbsp;");
define("SHOWBACKUPBUTTON", "&nbsp;<b>Voir la version pr&eacute;c&eacute;dente</b>&nbsp;");


//FIELDS
//Dir buttons
define("DIRBUTTON", "<b>Mes dossiers&nbsp;</b>");
define("DIRBUTTONTITLE", "Dossiers en ligne");
define("PICSBUTTON", "Images");
define("PDFBUTTON", "Documents");
define("POPBUTTON", "Pages pop-up");

define("ADDFOLDER", "<b>Nouveau dossier</b>");
define("ADDPIC", "<b>Ajouter une image</b>");
define("ADDSOUND", "<b>Ajouter musique, sons</b>");
define("ADDVIDEO", "<b>Ajouter une video</b>");
define("SOUNDSHELP", "&nbsp;<a href=\"javascript:void(0)\"  onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>&nbsp;Pour inserer un lien vers un <img src=\'inc/gfx/music.gif\' border=0 align=absbottom>&nbsp;son (mp3, wav tec.) :</b></td></tr><tr><td align=center><big><b>C</b></big>liquer avec le <b>bouton droit</b> de la souris sur le <b>nom de fichier</b><br>puis dans le <b>menu</b> qui s\'affiche, cliquer sur &#171;<b>copier le raccourci</b>&#187;<br>Le <b>coller</b> dans la fen&ecirc;tre de modifications de la page<br>Vous pouvez ensuite <b>modifier le nom du lien</b> ainsi créé en le <span class=select_htdtc>&nbsp;s&eacute;lectionnant&nbsp;</span><br><br></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/help.gif\" border=0 align=absbottom></a>");
define("VIDEOSHELP", "&nbsp;<a href=\"javascript:void(0)\"  onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>&nbsp;Pour inserer un lien vers une <img src=\'inc/gfx/videos.gif\' border=0 align=absbottom>&nbsp;vidéo :</b></td></tr><tr><td align=center><big><b>C</b></big>liquer avec le <b>bouton droit</b> de la souris sur le <b>nom de fichier</b><br>puis dans le <b>menu</b> qui s\'affiche, cliquer sur &#171;<b>copier le raccourci</b>&#187;<br>Le <b>coller</b> dans la fen&ecirc;tre de modifications de la page<br>Vous pouvez ensuite <b>modifier le nom du lien</b> ainsi créé en le <span class=select_htdtc>&nbsp;s&eacute;lectionnant&nbsp;</span><br><br></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/help.gif\" border=0 align=absbottom></a>");
define("PICSHELP", "&nbsp;<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>&nbsp;Pour inserer une image <img src=\'inc/gfx/apphoto.gif\' border=0 align=absbottom> dans la page</td></tr><tr><td align=center><big><b>G</b></big>lisser-deposer une vignette dans le cadre de modification ci-dessous<br>Vous pouvez ensuite modifier la taille de cette image.<br><br></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/help.gif\" border=0 align=absbottom></a>");
define("ADDPDF", "<b>Ajouter un document</b>");
define("PDFHELP", "&nbsp;<a href=\"javascript:void(0)\" onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>&nbsp;Insertion d\' un lien vers un fichier <img src=\'inc/gfx/pdf_x.gif\' border=0 align=absbottom> documents :</b></td></tr><tr><td align=center><big><b>C</b></big>liquer avec le <b>bouton droit</b> de la souris sur le <b>nom de fichier pdf, excel ou word</b><br>puis dans le <b>menu</b> qui s\'affiche, cliquer sur &#171;<b>copier le raccourci</b>&#187;<br>Le <b>coller</b> dans la fen&ecirc;tre de modifications de la page<br>Vous pouvez ensuite <b>modifier le nom du lien</b> ainsi créé en le <span class=select_htdtc>&nbsp;s&eacute;lectionnant&nbsp;</span><br><br></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/help.gif\" border=0 align=absbottom></a>");

define("ADDPOP", "<b>Nouvelle page</b>");
define("POPHELP", "&nbsp;<a href=\"javascript:void(0)\"  onMouseOver=\"AffBulle('<center><table class=insert_htdtc><tr><td align=center><b>&nbsp;Pour inserer un lien vers une <img src=\'inc/gfx/page_x.gif\' border=0 align=absbottom>&nbsp;page pop-up :</b></td></tr><tr><td align=center><big><b>C</b></big>liquer avec le <b>bouton droit</b> de la souris sur le <b>nom de fichier</b><br>puis dans le <b>menu</b> qui s\'affiche, cliquer sur &#171;<b>copier le raccourci</b>&#187;<br>Le <b>coller</b> dans la fen&ecirc;tre de modifications de la page<br>Vous pouvez ensuite <b>modifier le nom du lien</b> ainsi créé en le <span class=select_htdtc>&nbsp;s&eacute;lectionnant&nbsp;</span><br><br></td></tr></table>')\" onMouseOut=\"HideBulle()\"><img class=shadow_htdtc src=\"inc/gfx/help.gif\" border=0 align=absbottom></a>");

define("INVALIDMFS", "<span class=\"warning_htdtc\">&nbsp;Fichier trop gros, ou vide !&nbsp;&nbsp;&nbsp;&gt;&nbsp;");
define("ULERROR", "<span class=\"warning_htdtc\">&nbsp;Erreur de téléchargement&nbsp;</span>");
define("AFILE", "Fichier");
define("INVALID", "invalide");
define("BADFILENAMEMSG", "<span class=\"warning_htdtc\">&nbsp;Nom de fichier invalide !&nbsp;</span>&nbsp;&nbsp;&nbsp;<span class=blue_htdtc><b>Espaces, accents et caracteres speciaux ne sont pas acceptés (ex. : 'rendezvous.jpg')&nbsp;</b></span>");
define("INVALIDPICMSG", "<span class=blue_htdtc>L'extension du fichier doit &ecirc;tre <b>.jpg</b>, <b>.gif</b> ou <b>.png</b> pour une image&nbsp;</span>");
define("INVALIDPDFMSG", "<span class=blue_htdtc>L'extension du fichier doit &ecirc;tre <b>.pdf</b>, <b>.xls</b> ou <b>.doc</b> pour les fichier documents.&nbsp;</span>");
define("INVALIDVIDEOMSG", "<span class=blue_htdtc>L'extension du fichier doit &ecirc;tre <b>.avi</b>, <b>.wmv</b>, <b>.mpeg</b>, <b>.mov</b> pour une video.&nbsp;</span>");
define("INVALIDSOUNDMSG", "<span class=blue_htdtc>L'extension du fichier doit &ecirc;tre <b>.mp3</b>, <b>.wav</b>, <b>.ogg</b>, <b>.wma</b> pour un fichier son.&nbsp;</span>");
define("SENDFILE", "Envoyer le fichier");
define("SAVE1", "Enregistrer");
define("SAVE", "Enregistrer les modifications");
define("DELETE", "Supprimer");
define("LANGMSG", "Les pages en ");
define("IEWARNING", "&nbsp;Ce programme fonctionne uniquement sous Windows&nbsp;&nbsp;");
define("PICSHELPMSG", "<b>&nbsp;Comment r&eacute;duire la taille et le poids d'une image ?&nbsp;</b>");
/*
This is...
.: HTDTC->100% - Online Web Editor :.
Copyright (c) 2004-2005-2006 - Sebastien Tristant -> stristant@gmail.com
HtmlareaTool(with)DataTransferControls->100%
Made in Andernos(33510) & Audenge(33980) - [France]
This copyright notice MUST stay intact for use (see license.txt).
http://htdtc.free.fr/
*/
?>
