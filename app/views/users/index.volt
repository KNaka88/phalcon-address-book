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

<!-- SEARCH CONTACT BUTTON -->
<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#searchContact" aria-expanded="false" aria-controls="searchContact">
    Search Contact
  </button>
</p>


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
