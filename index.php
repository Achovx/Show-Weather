<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Php weather test</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Show Weather</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#weather">Weather</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Thanks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-info text-white">
    <div class="container text-center">
      <h1>Welcome to Show Weather</h1>
      <p class="lead">This page using an API </p>
    </div>
  </header>

  

  <section id="weather" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Here the weather</h2>
          <p class="lead">Use the following input to discover your city weather</p>
        
        <form name="weatherform" action ="index.php" method="GET">
       <!-- Coutry : <input type="text" name="country" placeholder="country"/><br/>-->
       <div class="input-group input-group-lg">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-lg">Enter your city</span>
        </div>
      <input type="text" name= "city" placeholder ="City" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
      </div>
        <br />
        <button type="submit" name="submit" class="btn btn-success mb-2">See the weather</button>
        </form>
     
         
        <?php

        if(isset($_GET['submit'])){
         //-------------------------------Get the user input
         $user_city = $_GET['city'];
         //-------------------------------Get the user input

         //-------------------------------connect to the api and get info based on user input
         $api_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $user_city . '&APPID=baf5fbd73db25fadf5833f8df4d2f887&units=metric';
         $weather_data = file_get_contents($api_url);
         $json = json_decode($weather_data, TRUE);
         //-------------------------------connect to the api and get info based on user input


        //-------------------------------Get requested info from the api
         $user_temp =$json['main']['temp']; // tenperature
         $user_humidity= $json['main']['humidity']; //humidity
         $user_conditions =$json['weather'][0]['main']; //weather condition
         $user_wind =$json['wind']['speed']; //wind speed
         $user_wind_direction =$json['wind']['deg']; //wind direction
         //-------------------------------Get requested info from the api


         //--------------------------------Output user data to the page
         echo "<strong> City : </strong>".$user_city."<br />";
         echo "<strong> Humidity : </strong>".$user_humidity."%<br />";
         echo "<strong> Current conditions : </strong>".$user_conditions."<br />";
         echo "<strong> Wind speed : </strong>".$user_wind." km/h <br />";
         echo "<strong> Wind direction : </strong>".$user_wind_direction."<br />";
         echo "<strong> Current temperature : </strong>".$user_temp." C°<br />";
         //-------------------------------Outpu user data to the page

        }
        ?>
        
        
        
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Thanks</h2>
          <p class="lead">Thanks you for visiting my Website. <br/>Produced by Andrew MONDOR for a part-time job with Agence Dn'd</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact me</h2>
          <p class="lead">A project, a question or just want to share a coffee?
            <br/>
            <p>Number : 06 40 75 52 82</p>
          
            <p>mail : mondor.andrew@gmail.com</p>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; <a href="http://andrew-mondor.fr/">Andrew MONDOR </a>2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
