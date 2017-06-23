<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>

<div class="page-header">
  <h1 class="center">Edit users</h1>
</div>

<?php echo $this->getContent(); ?>

<?php
    echo $this->tag->form(
        [
            "users/update",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        ]
    );
 ?>

 <div class="form-group">
    <label for="firstName" class="col-sm-2">First Name</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['firstName', 'class' => 'form-control', 'size' => 30]) ?>
    </div>
 </div>

 <div class="form-group">
    <label for="lastName" class="col-sm-2">Last Name</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['lastName', 'class' => 'form-control', 'size' => 30]) ?>
    </div>
 </div>

 <div class="form-group">
    <label for="email" class="col-sm-2">Email</label>
    <div class="col-sm-10">
        <?= $this->tag->emailField(['email', 'class' => 'form-control']) ?>
    </div>
 </div>

 <div class="form-group">
    <label for="contactNumber" class="col-sm-2">Contact Number</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['contactNumber', 'class' => 'form-control']) ?>
    </div>
 </div>

 <?php echo $this->tag->hiddenField("id") ?>


 <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <?= $this->tag->submitButton(['update', 'class' => 'btn btn-success']) ?>
     </div>
 </div>
