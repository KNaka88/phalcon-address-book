<div class="page-header">
    <h1 class="center">Address Book</h1>
</div>
045d6c5613b1440bb7263e5e5c247df5

<?php
    echo $this->tag->form(
        [
            "users/search",
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
    <label for="contactNumber" class="col-sm-2 control-label">Contact Number</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(["contactNumber", "type" => "number", "class" => "form-control", "id" => "contactNumber", "placeholder" => "Contact Number"]) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(["Submit", "class" => "btn btn-default"]) ?>
    </div>
</div>
<?php echo $this->tag->endForm(); ?>
