{{ content() }}

<h2 class="center">Login</h2>
{{ form("session/login") }}
    {{ loginForm.render('email') }}
    {{ loginForm.render('password') }}
    {{ loginForm.render('Login') }}

    {{ loginForm.render('remember') }}
    {{ loginForm.label('remember') }}

    {{ loginForm.render('csrf', ['value': security.getToken()]) }}

{{ endForm() }}
