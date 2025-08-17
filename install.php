<?php
require_once __DIR__.'/../inc/db.php';
require_once __DIR__.'/../inc/config.php';
$allowed=true; if(!$allowed){ die('Installer disabled.'); }
try{
  $sql=file_get_contents(__DIR__.'/../sql/schema.sql'); db()->exec($sql);
  $c=(int)db()->query('SELECT COUNT(*) c FROM users')->fetch()['c'];
  if($c===0){ $h=password_hash('admin123', PASSWORD_DEFAULT);
    $ins=db()->prepare('INSERT INTO users (username,password_hash,name) VALUES (?,?,?)');
    $ins->execute(['admin',$h,'Administrator']); }
  echo 'OK: Tables created. Default admin = admin / admin123';
}catch(Exception $e){ http_response_code(500); echo 'ERROR: '.$e->getMessage(); } ?>