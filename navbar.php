<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Vue Project</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- <link rel="icon" href="assets/img/logo.png" type="image/png" /> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <link href="./assets/style/style.css" rel="stylesheet" />
  </head>

  <body>
  
    <div id="app">
      <nav>
        <div class="nav-container">
          <div id="logo">
         
             <a href="index.php"> <img src="assets/img/logo.png" alt="logo"></a>
       
          </div>

          <ul id="icons">
            <li>
             <a href="boutique.php"><i class="fas fa-shopping-cart"></i></a>   
            </li>
            <li>
            
            <a href="formulaireContact.php" class="fas fa-user"></a>
           </li>
          </ul>
        </div>
      </nav>


      <router-view></router-view>
    </div>
  