<?php

if (isset($_GET['error'])) {
    echo "<script>alert('". $_GET['error']. "')</script>";
}

if (isset($_GET['success'])) {
    echo "<script>alert('". $_GET['success']. "')</script>";
}

echo '
<link rel="stylesheet" type="text/css" href="style/header.css">
<link rel="stylesheet" type="text/css" href="style/footer.css">
<link rel="stylesheet" type="text/css" href="style/ads.css">
<script src="navBar.js"></script>
';
?>