<?php
session_start();
if (isset($_SESSION['htdtc_user']) && isset($_SESSION['htdtc_pwd'])) {
}else{
session_destroy();
echo"<meta http-equiv=\"refresh\" content=\"0;URL=..\">";
}
?>