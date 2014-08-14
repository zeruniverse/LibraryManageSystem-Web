<?php
session_start();
unset($_SESSION['admin_id']);unset($_SESSION['admin_pw']);
header("Location: ../");
?>