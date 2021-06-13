<!DOCTYPE html>
<head>
<link rel="stylesheet" href="{{ url('css/signup.css') }}">
<script src= "{{ url('js/signup.js') }}" defer></script>
<link href="http://fonts.cdnfonts.com/css/coolvetica-2" rel="stylesheet">
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
                <a href="{{ 'login' }}">Creator</a>
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
            <a href="{{ 'home' }}">Home</a>
            <a href="{{ 'login' }}">Creator</a>
            <a id="insta" href="https://www.instagram.com/concept.ava/"><img src="image/insta.png"/></a>
      </div>
      
        <div id="title">
            <img src="image/111.png"/>
        <h1>Vogliamo esprimere un concetto</h1>
</header>
<div id= "contreg">
<div class= "contenitore">
<p class= "validazione"></p>
<h1 id="registrazione">REGISTRAZIONE</h1>
    <main>
    
        <form enctype="multipart/form-data"  name='sign' method='post'>
        <input type='hidden' name='_token' value='{{$csrf_token }}'>
            <p>
                <label>Nome utente: <input type='text' name='username'></label>
                <span id= "ResponsoUtente"><span>
            </p>
            <p>
                <label>Password: <input type='password' name='password' ></label>
                <span id= "message"><span>
            </p>
            <p>
                <label>Nome:  <input type='text' name='name' ></label>
                <span id= "nameUser"><span>
            </p>
            <p>
                <label>Cognome: <input type='text' name='surname'></label>
                <span id= "surnameUser"><span>
            </p>
            <p>
                <label>E-mail: <input type='text' name='email'></label>
                <span id = "correctmail"></span>
            </p>
            <p>
                <label>&nbsp;<input type='submit' id="submit"></label>
            </p>
            <p>
                <label>Sei già registrato?<a href="{{ 'login' }}">LOGIN</a></label>
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