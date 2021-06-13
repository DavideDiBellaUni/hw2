<!DOCTYPE html>
<head>
<link rel="stylesheet" href="{{ url('css/login.css') }}">
<link href="http://fonts.cdnfonts.com/css/coolvetica-2" rel="stylesheet">
<script type="text/javascript" src="{{ url('js/login.js') }}" defer></script>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<header>
        <div id="overlay">
        <nav>
            <div id="logo">
                <img src="image/111.png"/>
           oncept
            </div>
            <div id="links">
                <a href="{{ 'home' }}">Home</a>
                <a href='{{ url("login")}}'>Creator</a>
                <a id="insta" href="https://www.instagram.com/concept.ava/"><img src="image/insta.png"/></a>
              </div>

              <div id="menu">
            <div id="arancio"></div>
            <div id="bordeaux"></div>
            <div id="verde"></div>
            <div id="blue"></div>
          </div>
    
        </nav>
        <div id= "navscrollbar">
            <a href="{{'home'}}">Home</a>
            <a href='{{ url("login")}}'>Creator</a>
            <a id="insta" href="https://www.instagram.com/concept.ava/"><img src="image/insta.png"/></a>
      </div>
        <div id="title">
            <img src="image/111.png"/>
        <h1>Vogliamo esprimere un concetto</h1>
</header>
<div id= "contreg">
<div class= "contenitore">
    @if(isset($old_username))
        <p class="errore">Credenziali non valide.</p>
        @endif

<h1 id="registrazione">ACCEDI</h1>
    <main>
        
        <form enctype="multipart/form-data"  name='sign' method='post'>
        <input type='hidden' name='_token' value='{{$csrf_token }}'>
            <p>
                <label>Nome utente: <input type='text' name='username' value='{{ $old_username }}'></label>
            </p>
            <p>
                <label>Password: <input type='password' name='password' ></label>
            </p>
            <p>
                <label>&nbsp;<input type='submit' id="submit"></label>
            </p>
            <p>
                <label>Non sei già registrato?<a href='{{ "signup" }}'>SIGNUP</a></label>
            </p>
        </form>
    </main>
</div>
</div>

<footer>
        <span>Seguici su Instagram!
        <a id="insta" href="https://www.instagram.com/concept.ava/"><img src="image/insta.png"/></a></span>
       <span> Davide Di Bella O46001877</span>
    </footer>
</body>
</html>