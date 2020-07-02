<html>

  <head>
    <title>User Interface</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href= "../public/static/css/main.css">
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
    </header>

    <section class="animal-tables">
      <div class="table">
        <h1>Dieren</h1>
        <table>
          <!-- <?php
          	//$sql=$pdo->query("SELECT * FROM livestock");
            //$row=$sql->fetch();
           ?> -->
          <tr>
            <th> Name  </th>
            <th> Type </th>
            <th> Price </th>
            <th> Status </th>
            <th> Quantity </th>
            <th> Birthdate</th>
          </tr>
            <!-- <?php
              	// while ($row = $sql->fetch())
                // {
                //   echo "<tr>";
                //   echo "<td>" . $row['name'] . "</td>";
                //   echo "<tr>";
                // }
              //?>
            -->
            <tr>
             <td> Berta   </td>
             <td> Cow     </td>
             <td> 200.00  </td>
             <td> Sell </td>
             <td> 1    </td>
             <td> 2018-09-09 </td>
             <td><button class="primary-btn" type="button">Verkopen</button><td>
             <td><button class="primary-btn" type="button">Voeden</button><td>
             <td><button class="primary-btn" type="button">Slachten</button><td>
          </tr>
        </table>
      </div>
    </section>

    <section class="product-tables">
      <div class="table">
        <h1>Producten</h1>
        <table>
          <tr>
            <th> Name  </th>
            <th> Price </th>
            <th> Status </th>
            <th> Remaining </th>
          </tr>
          <tr>
            <td> Graan   </td>
            <td> 1.00  </td>
            <td> Active   </td>
            <td> 10 </td>
            <td><button class="primary-btn" type="button">Verkopen</button><td>
            <td><button class="primary-btn" type="button">Vernietigen</button><td>
          </tr>
        </table>
      </div>
    </section>

    <section class="machine-tables">
      <div class="table">
        <h1>Machines</h1>
        <table>
          <tr>
            <th> ID  </th>
            <th> Name </th>
            <th> Status </th>
            <th> Damage </th>
          </tr>
          <tr>
            <td> 1  </td>
            <td> Lawnmower </td>
            <td> Active </td>
            <td> Heavy </td>
            <td><button class="primary-btn" type="button">Verkopen</button><td>
            <td><button class="primary-btn" type="button">Onderhoud</button><td>
            <td><button class="primary-btn" type="button">Vernietigen</button><td>
          </tr>
        </table>
      </div>
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
