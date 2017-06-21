<?= $this->getContent() ?>

<h2>Login</h2>
<?= $this->tag->form(['session/login']) ?>
    <?= $form->render('email') ?>
    <?= $form->render('password') ?>
    <?= $form->render('login') ?>

    <?= $form->render('remember') ?>
    <?= $form->label('remember') ?>

    <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>

<?= $this->tag->endform() ?>
