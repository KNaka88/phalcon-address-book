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
            "index/update",
            "autocomplete" => "off",
            "class" => "form-horizontal"
        ]
    );
 ?>

 <div class="form-group">
    <label for="firstname" class="col-sm-2">First Name</label>
    <div class="col-sm-10">
        {{ text_field("firstname", "class": "form-control", "size": 30) }}
    </div>
 </div>

 <div class="form-group">
    <label for="lastname" class="col-sm-2">Last Name</label>
    <div class="col-sm-10">
        {{ text_field("lastname", "class": "form-control", "size": 30) }}
    </div>
 </div>

 <div class="form-group">
    <label for="email" class="col-sm-2">Email</label>
    <div class="col-sm-10">
        {{ email_field("email", "class": "form-control") }}
    </div>
 </div>

 <div class="form-group">
    <label for="contactnumber" class="col-sm-2">Contact Number</label>
    <div class="col-sm-10">
        {{ text_field("contactnumber", "class": "form-control") }}
    </div>
 </div>

 <?php echo $this->tag->hiddenField("id") ?>


 <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       {{ submit_button("update", "class": "btn btn-success") }}
     </div>
 </div>
