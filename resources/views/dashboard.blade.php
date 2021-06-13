<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}"/>
    <link href="http://fonts.cdnfonts.com/css/coolvetica-2" rel="stylesheet">
    <meta charset="UTF-8">
    <script type="text/javascript" src="{{ url('js/dashboard.js') }}" defer></script>  
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concept</title>
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
                <a href= "{{ 'dashboard' }}">Home</a>
                <a href="{{ 'profile' }}">Profilo</a>
                <a href= "{{ 'logout' }}">Logout </a>
              </div>

              <div id="menu">
            <div id="arancio"></div>
            <div id="bordeaux"></div>
            <div id="verde"></div>
            <div id="blue"></div>
          </div>
    
        </nav>

        <div id= "navscrollbar">
        <a href= "{{ 'dashboard' }}">Home</a>
        <a href="{{ 'profile' }}">Profilo</a>
        <a href= "{{ 'logout' }}">Logout </a>
      </div>

        <div id="title">
            <img src="image/111.png"/>
        <h1>Vogliamo esprimere un concetto</h1>
        </div>
    </header>

    <section>
      

      <h1>Benvenuto {{ $nome }} </h1>

      

      <div id= "nart">
            <a href="{{'nart'}}">Esprimi il tuo concetto</a>
        </div>
        <div id="dash">
      <div class="contenitore"></div>
      </div>

      <div id = "preferiti" class = "hidden">
            <h1>I tuoi articoli preferiti:</h1>
            <div class="contenitore"></div>
        </div>
      <p id= "user" class="hidden">{{ $username }}</p>
      <input type='hidden' name='_token' value='{{$csrf_token }}'>
  </section>  
  </body>
  </html>