<?php
require_once __DIR__.'/../inc/auth.php'; session_destroy(); header('Location:/'.ADMIN_DIR.'/login.php'); exit; ?>