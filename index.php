<?php
require_once("./functions/checklogin.php");
if(isLogin()) header("Location: ./admin/"); else header("Location: ./user/");
?>