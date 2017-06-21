<?= $this->getContent() ?>

<h2>Login</h2>
<?= $this->tag->form(['session/login']) ?>
    <?= $loginForm->render('email') ?>
    <?= $loginForm->render('password') ?>
    <?= $loginForm->render('Login') ?>

    <?= $loginForm->render('remember') ?>
    <?= $loginForm->label('remember') ?>

    <?= $loginForm->render('csrf', ['value' => $this->security->getToken()]) ?>

<?= $this->tag->endform() ?>
