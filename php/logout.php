<?php
session_start();
include("function.php");
$_SESSION['username'] == "";
session_unset();
session_destroy();

?>
<script language="javascript">
    document.location = "login.php";
</script>