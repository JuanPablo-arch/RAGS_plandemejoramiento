<!-- cerrar sesión -->
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
