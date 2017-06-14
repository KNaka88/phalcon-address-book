<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */

 //This declaration is necessary for showing search results
?>


{{ content() }}

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
    {{ form("index/save") }}
      <fieldset>
        <div class="mdl-textfield mdl-js-textfield">
          {{ form.label('firstName', ['class': 'mdl-textfield__label']) }}
          {{ form.render('firstName') }}
          {{ form.messages('firstName') }}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
          {{ form.label('lastName', ['class': 'mdl-textfield__label']) }}
          {{ form.render('lastName') }}
          {{ form.messages('lastName') }}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
          {{ form.label('email', ['class': 'mdl-textfield__label']) }}
          {{ form.render('email') }}
          {{ form.messages('email')}}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
        {{ form.label('contactNumber', ['class': 'mdl-textfield__label']) }}
        {{ form.render('contactNumber') }}
        {{ form.messages('contactNumber')}}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
        {{ form.label('password', ['class': 'mdl-textfield__label']) }}
        {{ form.render('password') }}
        {{ form.messages('password')}}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
        {{ form.label('confirmPassword', ['class': 'mdl-textfield__label']) }}
        {{ form.render('confirmPassword') }}
        {{ form.messages('confirmPassword')}}
        </div>

        <div>
          {{ form.render('Sign Up') }}
        </div>
        <div>
          {{ form.render('csrf', ['value': security.getToken()]) }}
          {{ form.messages('csrf') }}
        </div>
      </fieldset>
    {{ endForm() }}
  </div>
</div>



<!-- SEARCH CONTACT INPUT FORM -->
<div class="collapse" id="searchContact">
  <div>
    <h2>Search Contact</h2>
    {{ form("index/search")}}
      <fieldset>
        <div class="mdl-textfield mdl-js-textfield">
          {{ form.label('firstName', ['class': 'mdl-textfield__label']) }}
          {{ form.render('firstName') }}
          {{ form.messages('firstName') }}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
          {{ form.label('lastName', ['class': 'mdl-textfield__label']) }}
          {{ form.render('lastName') }}
          {{ form.messages('lastName') }}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
          {{ form.label('email', ['class': 'mdl-textfield__label']) }}
          {{ form.render('email') }}
          {{ form.messages('email')}}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
          {{ form.label('contactNumber', ['class': 'mdl-textfield__label']) }}
          {{ form.render('contactNumber') }}
          {{ form.messages('contactNumber')}}
        </div>

        <div>
          {{ form.render('Search') }}
        </div>
      </fieldset>
    {{ endForm() }}
  </div>
</div>
