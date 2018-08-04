<?php
    session_start();
    unset($_SESSION['Username']);
    session_destroy();

    echo "<script>window.location.replace('../../index.php');</script>";
?>