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
    {{ form("users/save") }}
      <fieldset>
        <div class="mdl-textfield mdl-js-textfield">
            {{ usersForm.label('firstName', ['class': 'mdl-textfield__label']) }}
            {{ usersForm.render('firstName') }}
            {{ usersForm.messages('firstName') }}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
            {{ usersForm.label('lastName', ['class': 'mdl-textfield__label']) }}
            {{ usersForm.render('lastName') }}
            {{ usersForm.messages('lastName') }}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
            {{ usersForm.label('email', ['class': 'mdl-textfield__label']) }}
            {{ usersForm.render('email') }}
            {{ usersForm.messages('email')}}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
            {{ usersForm.label('contactNumber', ['class': 'mdl-textfield__label']) }}
            {{ usersForm.render('contactNumber') }}
            {{ usersForm.messages('contactNumber')}}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
            {{ usersForm.label('password', ['class': 'mdl-textfield__label']) }}
            {{ usersForm.render('password') }}
            {{ usersForm.messages('password')}}
        </div>

        <div class="mdl-textfield mdl-js-textfield">
            {{ usersForm.label('confirmPassword', ['class': 'mdl-textfield__label']) }}
            {{ usersForm.render('confirmPassword') }}
            {{ usersForm.messages('confirmPassword')}}
        </div>

        <div>
            {{ usersForm.render('Sign Up') }}
        </div>
        <div>
            {{ usersForm.render('csrf', ['value': security.getToken()]) }}
            {{ usersForm.messages('csrf') }}
        </div>
      </fieldset>
    {{ endForm() }}
  </div>
</div>



<!-- SEARCH CONTACT INPUT FORM -->
<div class="collapse" id="searchContact">
  <div>
    <h2>Search Contact</h2>
    {{ form("users/search")}}
        <fieldset>
            <div class="mdl-textfield mdl-js-textfield">
                {{ searchForm.label('firstName', ['class': 'mdl-textfield__label']) }}
                {{ searchForm.render('firstName') }}
                {{ searchForm.messages('firstName') }}
            </div>

            <div class="mdl-textfield mdl-js-textfield">
                {{ searchForm.label('lastName', ['class': 'mdl-textfield__label']) }}
                {{ searchForm.render('lastName') }}
                {{ searchForm.messages('lastName') }}
            </div>

            <div class="mdl-textfield mdl-js-textfield">
                {{ searchForm.label('email', ['class': 'mdl-textfield__label']) }}
                {{ searchForm.render('email') }}
                {{ searchForm.messages('email')}}
            </div>

            <div class="mdl-textfield mdl-js-textfield">
                {{ searchForm.label('contactNumber', ['class': 'mdl-textfield__label']) }}
                {{ searchForm.render('contactNumber') }}
                {{ searchForm.messages('contactNumber')}}
            </div>

            <div>
            {{ searchForm.render('Search') }}
            </div>
        </fieldset>
    {{ endForm() }}
  </div>
</div>
