<?php
require_once __DIR__.'/db.php';
session_start();
function is_logged_in(){ return isset($_SESSION['user_id']); }
function require_login(){ if(!is_logged_in()){ header('Location: /'.ADMIN_DIR.'/login.php'); exit; } }
?>