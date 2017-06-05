<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */

 //This declaration is necessary for showing search results
?>



<div class="page-header">
    <h1 class="center">Address Book</h1>
</div>

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
    {{ form("index/update") }}
    <fieldset>
      <div class="form-group">
          <label for="firstname" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
            {{text_field("firstname", "class": "form-control", "placeholder": "First Name")}}
          </div>
      </div>

      <div class="form-group">
          <label for="lastname" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
            {{text_field("lastname", "class": "form-control", "placeholder": "Last Name")}}
          </div>
      </div>

      <div class="form-group">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            {{email_field("email", "class": "form-control", "placeholder": "Email")}}
          </div>
      </div>

      <div class="form-group">
          <label for="contactnumber" class="col-sm-2 control-label">Contact Number</label>
          <div class="col-sm-10">
            {{text_field("contactnumber", "class": "form-control", "placeholder": "Phone#")}}
          </div>
      </div>

      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            {{submit_button("submit", "class": "btn btn-success")}}
          </div>
      </div>
    </fieldset>
  {{ endForm() }}
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
