<html>

  <head>
    <title>User Interface</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href= "static/css/transfermarket.css">
  </head>

  <body>
    <header>
      <div class="container-header">
        <div class="header-logo">
          <h1>Farmmanager</h1>
        </div>
        <div class="header-menu">
          <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Manage</a></li>
            <li><a href="#">Markt</a></li>
            <li><a href="#">Ranking</a></li>
          </ul>
        </div>
        <div class="login-details">
          <ul>
            <li>Hello, <?= $user["username"]?></li>
            <li>Money: €10.000</li>
            <li>Date: 30-6-2019</li>
            <li><a href="#">Mijn gegevens</a></li>
            <li><a href="logout">Logout</a></li>
          <ul>
        </div>
      </div>
    </div>
    </header>
  <section> <!-- Dieren -->
    <section class="animal-header">
      <div class="table">
        <h2 id="kopHeader">Dieren</h2>
        
      </div>
      
    </section>
    <section class="animal-header">
      <div class="table">
        <h4 id="kopHeader">Koeien</h4>
      </div>
      
    </section> 
    <section class="animal-table">
        <div class="table">
            <table style="width:25%">
                <tr>   
                    <th></th>
                    <th></th>
                    <th>Selling ID #1</th>
                </tr>
                <tr>
                    <th> Name </th>        
                    <th> Farmname </th>
                    <th> Item</th>
                    <th> Quantity</th>
                    <th> Price</th>
                    <th><button class="primary-btn" type="button">Kopen</button></th>
                </tr>
                <tr>
                    <th> Henk </th>
                    <th> Boerderijnaam</th>
                    <th> Koe</th>
                    <th> 1</th>
                    <th> €250,-</th>
                </tr>
            </table>
        </div>
    </section>
  </section>
  <section> <!-- Producten --> 
    <section class="product-tables">
      <div class="table">
        <h2 id="kopHeader">Producten</h2>
        
      </div>
      
    </section>
    <section class="product-tables">
      <div class="table">
        <h4 id="kopHeader">Graan</h4>
      </div>
      
    </section>
    <section class="product-tables">
        <div class="table">
            <table style="width:25%">
                <tr>   
                    <th></th>
                    <th></th>
                    <th>Selling ID #2</th>
                </tr>
                <tr>
                    <th> Name </th>        
                    <th> Farmname </th>
                    <th> Item</th>
                    <th> Quantity</th>
                    <th> Price</th>
                    <th><button class="primary-btn" type="button">Kopen</button></th>
                </tr>
                <tr>
                    <th> Henk </th>
                    <th> Boerderijnaam</th>
                    <th> Graan</th>
                    <th> 10KG</th>
                    <th> €25,-</th>
                </tr>
            </table>
        </div>
    </section>
  </section>
  <section> <!-- Machines --> 
    <section class="machine-tables">
      <div class="table">
        <h2 id="kopHeader">Machines</h2>
        
      </div>
      
    </section>
    <section class="machine-tables">
      <div class="table">
        <h4 id="kopHeader">Grasmaaiers</h4>
      </div>
      
    </section>
    <section class="machine-tables">
        <div class="table">
            <table style="width:35%">
                <tr>   
                    <th></th>
                    <th></th>
                    <th>Selling ID #3</th>
                </tr>
                <tr>
                    <th > Name </th>        
                    <th> Farmname </th>
                    <th> Item</th>
                    <th> Quantity</th>
                    <th> Price</th>
                    <th> Item damage </th>
                    <th><button class="primary-btn" type="button">Kopen</button></th>
                </tr>
                <tr>
                    <th> Henk </th>
                    <th> Boerderijnaam</th>
                    <th> Lawnmower</th>
                    <th> 1</th>
                    <th> €2500,-</th>
                    <th> Heavy damage</th>
                </tr>
            </table>
        </div>
    </section>
  </section>
  
    <footer>
      <div class="footer-container">
        <div class="copyright">
          <ul>
            <li>Copyright &copy; <?= $year ?></li>
            <li>Made by Rick, Coen en Brian</li>
          </ul>
        </div>
      </div>
    </footer>
  </body>


</html>
