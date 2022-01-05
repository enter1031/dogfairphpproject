<?php
// start session
session_start();
session_destroy();

// redirect to header
header("Location: index.php");
exit;

?>