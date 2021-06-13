
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="{{ 'css/nart.css' }}"/>
    <link href="http://fonts.cdnfonts.com/css/coolvetica-2" rel="stylesheet">
    <script type="text/javascript" src="{{ 'js/nart.js' }}" defer></script>
    <meta charset="UTF-8">
   
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
                <a href= "{{' logout' }}">Logout </a>
      </div>

        </nav>


        <div id="title">
            <img src="image/111.png"/>
        <h1>Vogliamo esprimere un concetto</h1>

            
        </div>
        </div>
    </header>

    <section>
    <div id= "contreg">
<div class= "contenitore">

<h1 id="registrazione">CREA UN ARTICOLO</h1>
    <main>
    <!-- Metti error nei vari label e metti una classe per fare il bordo rosso-->
    
        <form enctype="multipart/form-data" name='sign' method='post'>
        
        <input type='hidden' name='_token' value='{{$csrf_token }}'>
            <p>
                <label>Titolo:<input type='text' name='titolo'></label>
                @error('titolo')
                <p class = "errore">Inserire un titolo</p>
@enderror
            </p>
            <p>
                <label>Articolo:<input type='file' name='testo'></label>
                @error('testo')
                <p class = "errore">Caricamento fallito. Controlla l'estensione del file</p>
@enderror
            </p>
            <p>
               <label>Sezione: <input type=radio name='sezione' value="Attualita">Attualità</input>
                               <input type=radio name='sezione' value="Lifestyle">Lifestyle</input>
                               <input type=radio name='sezione' value="Arte">Arte e Cultura</input>
                               <input type=radio name='sezione' value="Musica">Musica</input>
                </label>
                @error('sezione')
                <p class = "errore">Selezionare una campo</p>
@enderror
            <p>
                <label>&nbsp;<input type='submit' id="submit"></label>
            </p>
        </form>
    </main>
    
</div>
</div>


  </section>  
  <footer>
        <span>Seguici su Instagram!
        <a id="insta" href="https://www.instagram.com/concept.ava/"><img src="image/insta.png"/></a></span>
       <span> Davide Di Bella O46001877</span>
    </footer>
  </body>
  </html>