<?php
require_once __DIR__.'/../inc/auth.php'; require_login();
require_once __DIR__.'/../inc/config.php'; require_once __DIR__.'/../inc/db.php';
$rows=db()->query('SELECT * FROM messages ORDER BY id DESC')->fetchAll();
?><!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Messages • <?php echo SITE_NAME; ?></title>
<link rel="stylesheet" href="https://unpkg.com/mvp.css"></head><body>
<header class="container">
  <nav><a href="/<?php echo ADMIN_DIR; ?>/messages.php"><strong>Messages</strong></a> <a href="/<?php echo ADMIN_DIR; ?>/logout.php">Logout</a></nav>
</header>
<main class="container">
  <h2>Contact Messages</h2>
  <table>
    <thead><tr><th>#</th><th>Name</th><th>Phone</th><th>Email</th><th>Subject</th><th>Message</th><th>Time</th></tr></thead>
    <tbody>
    <?php foreach($rows as $r): ?>
      <tr>
        <td><?= $r['id'] ?></td>
        <td><?= htmlspecialchars($r['name']) ?></td>
        <td><?= htmlspecialchars($r['phone']) ?></td>
        <td><?= htmlspecialchars($r['email']) ?></td>
        <td><?= htmlspecialchars($r['subject']) ?></td>
        <td><?= nl2br(htmlspecialchars($r['message'])) ?></td>
        <td><?= $r['created_at'] ?></td>
      </tr>
    <?php endforeach; if(!$rows): ?>
      <tr><td colspan="7"><em>No messages yet.</em></td></tr>
    <?php endif; ?>
    </tbody>
  </table>
</main></body></html>