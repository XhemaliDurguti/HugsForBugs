<?php
/*
* Template Name: dashboard
*/
session_start();
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
    echo "<script>window.location.href= 'sign-in'</script>";
}
?>
<h1>Dashboard.<?php echo $_SESSION['username'];?></h1>
<a href="http://localhost/wordpres/logout/">Logout</a>