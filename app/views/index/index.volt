{{ content() }}

<div class="page-header">
    <h1 class="center">Address Book!!</h1>
</div>

{{ link_to("session", "Login") }}
<!-- CREATE CONTACT BUTTON -->
<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#createContact" aria-expanded="false" aria-controls="createContact">
    Create Contact
  </button>
</p>

<!-- CREATE CONTACT INPUT FORM -->
<div class="collapse" id="createContact">
  <div>
    <h2>Register Contact Info</h2>
    {{ form("index/save") }}
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
