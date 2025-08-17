<?php
require_once __DIR__.'/../inc/db.php'; require_once __DIR__.'/../inc/auth.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $u=trim($_POST['username']??''); $p=trim($_POST['password']??'');
  $st=db()->prepare('SELECT * FROM users WHERE username=?'); $st->execute([$u]); $user=$st->fetch();
  if($user && password_verify($p,$user['password_hash'])){ $_SESSION['user_id']=$user['id']; header('Location:/'.ADMIN_DIR.'/messages.php'); exit; }
  else{$err='Invalid username or password';}
} ?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Login • <?php echo SITE_NAME; ?></title>
<link rel="stylesheet" href="https://unpkg.com/mvp.css"></head><body>
<main class="container" style="max-width:440px;margin-top:60px">
  <article>
    <h2>Admin Login</h2>
    <?php if(isset($err)) echo '<p style="color:#b3261e">'.$err.'</p>'; ?>
    <form method="post">
      <label>Username <input name="username" required></label>
      <label>Password <input type="password" name="password" required></label>
      <button type="submit">Login</button>
    </form>
    <p><small>Default: admin / admin123 (change after login)</small></p>
  </article>
</main></body></html>