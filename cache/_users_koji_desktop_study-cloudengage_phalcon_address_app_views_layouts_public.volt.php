

<div><?php if (!(empty($logged_in))) { ?>
        <p><?= $this->tag->linkTo(['session/logout', 'Logout']) ?></p>
    <?php } else { ?>
        <p><?= $this->tag->linkTo(['session/index', 'Login']) ?></p>
    <?php } ?>
</div>

<div class="container main-container">
  <?= $this->getContent() ?>
</div>

<footer class="footer navbar-default navbar-fixed-bottom">
  <div class="container-fluid copy-right">
      <span>© <?= date('Y') ?> Koji Nakagawa</span>
  </div>
</footer>
