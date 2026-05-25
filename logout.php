<?php
include('seguranca0.php');
session_destroy();
header('Location: index.php');
exit();