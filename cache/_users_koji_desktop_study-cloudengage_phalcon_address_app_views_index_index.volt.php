


<?= $this->getContent() ?>

<div class="page-header">
    <h1 class="center">Address Book!!</h1>
</div>






<!-- CREATE CONTACT BUTTON -->
<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#createContact" aria-expanded="false" aria-controls="createContact">
    Create Contact
  </button>
</p>

<!-- SEARCH CONTACT BUTTON -->
<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#searchContact" aria-expanded="false" aria-controls="searchContact">
    Search Contact
  </button>
</p>


<!-- CREATE CONTACT INPUT FORM -->
<div class="collapse" id="createContact">
  <div>
    <h2>Register Contact Info</h2>
    <?= $this->tag->form(['index/save']) ?>
      <fieldset>
        <div class="mdl-textfield mdl-js-textfield">
          <?= $form->label('firstName', ['class' => 'mdl-textfield__label']) ?>
          <?= $form->render('firstName') ?>
          <?= $form->messages('firstName') ?>
        </div>

        <div class="mdl-textfield mdl-js-textfield">
          <?= $form->label('lastName', ['class' => 'mdl-textfield__label']) ?>
          <?= $form->render('lastName') ?>
          <?= $form->messages('lastName') ?>
        </div>

        <div class="mdl-textfield mdl-js-textfield">
          <?= $form->label('email', ['class' => 'mdl-textfield__label']) ?>
          <?= $form->render('email') ?>
          <?= $form->messages('email') ?>
        </div>

        <div class="mdl-textfield mdl-js-textfield">
        <?= $form->label('contactNumber', ['class' => 'mdl-textfield__label']) ?>
        <?= $form->render('contactNumber') ?>
        <?= $form->messages('contactNumber') ?>
        </div>

        <div class="mdl-textfield mdl-js-textfield">
        <?= $form->label('password', ['class' => 'mdl-textfield__label']) ?>
        <?= $form->render('password') ?>
        <?= $form->messages('password') ?>
        </div>

        <div class="mdl-textfield mdl-js-textfield">
        <?= $form->label('confirmPassword', ['class' => 'mdl-textfield__label']) ?>
        <?= $form->render('confirmPassword') ?>
        <?= $form->messages('confirmPassword') ?>
        </div>

        <div>
          <?= $form->render('Sign Up') ?>
        </div>
        <div>
          <?= $form->render('csrf', ['value' => $this->security->getToken()]) ?>
          <?= $form->messages('csrf') ?>
        </div>
      </fieldset>
    <?= $this->tag->endform() ?>
    
  </div>
</div>



<!-- SEARCH CONTACT INPUT FORM -->
<div class="collapse" id="searchContact">
  <div>
      <?php echo $this->tag->linkTo(["index/index", "Back Home"]) ?>

      <h2>Search Contact</h2>
      <?php
          echo $this->tag->form(
              [
                  "index/search",
                  "autocomplete" => "off",
                  "class" => "form-horizontal"
              ]
          );
      ?>

      <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(["firstname", "type" => "text", "class" => "form-control", "id" => "firstname"]) ?>
        </div>
      </div>

      <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(["lastname", "type" => "text", "class" => "form-control", "id" => "lastname"]) ?>
        </div>
      </div>

      <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
              <?php echo $this->tag->textField(["email", "type" => "email", "class" => "form-control", "id" => "email"]) ?>
          </div>
      </div>

      <div class="form-group">
          <label for="contactnumber" class="col-sm-2 control-label">Contact Number</label>
          <div class="col-sm-10">
              <?php echo $this->tag->textField(["contactnumber", "type" => "email", "class" => "form-control", "id" => "contactnumber"]) ?>
          </div>
      </div>

      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <?php echo $this->tag->submitButton(["Search", "class" => "btn btn-default"]) ?>
          </div>
      </div>

      <?php echo $this->tag->endForm() ?>
    </div>
</div>
