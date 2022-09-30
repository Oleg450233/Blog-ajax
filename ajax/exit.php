<?php
//setcookie('login','$login',time()-3600*24*30,"/");
session_start();
unset($_SESSION['auth']);
