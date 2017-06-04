<div class="page-header">
    <h1 class="center">Address Book</h1>
</div>
045d6c5613b1440bb7263e5e5c247df5

<?php echo $this->getContent() ?>

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
    <?php
        echo $this->tag->form(
            [
                "index/save",
                "autocomplete" => "off",
                "class" => "form-horizontal"
            ]
        );
    ?>

    <div class="form-group">
        <label for="firstName" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(["firstName", "class" => "form-control", "id" => "firstName", "placeholder" => "First Name"]) ?>
        </div>
    </div>

    <div class="form-group">
        <label for="lastName" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(["lastName", "class" => "form-control", "id" => "lastName", "placeholder" => "Last Name"]) ?>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(["email", "type" => "email", "class" => "form-control", "id" => "email", "placeholder" => "email"]) ?>
        </div>
    </div>

    <div class="form-group">
        <label for="contactNumber" class="col-sm-2 control-label">Contact Number</label>
        <div class="col-sm-10">
            <?php echo $this->tag->textField(["contactnumber", "type" => "number", "class" => "form-control", "id" => "contactnumber", "placeholder" => "Contact Number"]) ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->tag->submitButton(["Submit", "class" => "btn btn-default"]) ?>
        </div>
    </div>
    <?php echo $this->tag->endForm(); ?>
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
