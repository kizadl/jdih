<?php
// Guard kalau belum login
if (\Yii::$app->user->isGuest) {
?>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <strong>Copyright &copy; 2020 <a href="https://bphn.go.id">Badan Pembinaan Hukum Nasional</a>.</strong> All rights reserved.
    </div>
    User : <span class="label label-default label-md">Guest</span> | Hak Akses : <span class="label label-warning label-md">-</span>
  </footer>
<?php
  return;
}

// Ambil identitas & role via RBAC (tanpa model mdm)
$userId   = \Yii::$app->user->id;
$username = \Yii::$app->user->identity->username ?? '(no-username)';
$roles    = \Yii::$app->authManager->getRolesByUser($userId); // array name=>Role
$roleNames = array_keys($roles);
?>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <strong>Copyright &copy; 2020 <a href="https://bphn.go.id">Badan Pembinaan Hukum Nasional</a>.</strong> All rights reserved.
  </div>
  User :
  <span class="label label-default label-md"><?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?></span>
  | Hak Akses :
  <?php if (!empty($roleNames)): ?>
    <?php foreach ($roleNames as $r): ?>
      <span class="label label-warning label-md"><?= htmlspecialchars($r, ENT_QUOTES, 'UTF-8') ?></span>&nbsp;
    <?php endforeach; ?>
  <?php else: ?>
    <span class="label label-warning label-md">-</span>
  <?php endif; ?>
</footer>