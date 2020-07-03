<html>

  <head>
    <title>User Interface</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href= "../public/static/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
             <td>
               <button class="primary-btn" type="button" data-toggle="modal" data-target="#sellAnimalModal">Verkopen</button>
               <div class="modal fade" id="sellAnimalModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Dier verkopen</h4>
                     </div>
                     <div class="modal-body">
                       <p>Voor hoeveel geld wil je dit dier verkopen?</p>
                       €<input type="text" class="modalform" id="modalform" pattern="[0-9]" size="3" placeholder="0.00">
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Verkopen</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                     </div>
                   </div>
                 </div>
               </div>
             </td>
             <td>
               <button class="primary-btn" type="button" data-toggle="modal" data-target="#feedAnimalModal">Voeden</button>
               <div class="modal fade" id="feedAnimalModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Dier voeden</h4>
                     </div>
                     <div class="modal-body">
                       <p>Wat wil je dit dier voeden?</p>
                       <select id="feedType" name="feedType">
                         <option value="mais">Mais</option>
                         <option value="grassbrok">Grasbrok</option>
                         <option value="pigbrok">Varkensbrok</option>
                       </select>
                       <button type="submit" id="submit">Voeden</button>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                     </div>
                   </div>
                 </div>
               </div>
             </td>
             <td>
               <button class="primary-btn" type="button" data-toggle="modal" data-target="#slaughterAnimalModal">Slachten</button>
               <div class="modal fade" id="slaughterAnimalModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Dier slachten</h4>
                     </div>
                     <div class="modal-body">
                       <p>Weet uw zeker dat u dit dier wil slachten?</p>
                       <p>Slachtprijs: €50,-</p>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Slachten</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                     </div>
                   </div>
                 </div>
               </div>
             </td>
          </tr>
        </table>
      </div>
      <!-- Modal content-->
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
            <td>
              <button class="primary-btn" type="button" data-toggle="modal" data-target="#sellProductModal">Verkopen</button>
              <div class="modal fade" id="sellProductModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Product verkopen</h4>
                     </div>
                     <div class="modal-body">
                       <p>Voor hoeveel geld wil je dit product verkopen?</p>
                       €<input type="text" class="modalform" id="modalform" pattern="[0-9]" size="3" placeholder="0.00">
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Verkopen</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                     </div>
                   </div>
                 </div>
               </div>
            </td>
            <td>
              <button class="primary-btn" type="button" data-toggle="modal" data-target="#destroyProductModal">Vernietigen</button>
              <div class="modal fade" id="destroyProductModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Product vernietigen</h4>
                     </div>
                     <div class="modal-body">
                       <p>Weet je zeker dat je dit product wilt vernietigen?</p>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Vernietigen</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                     </div>
                   </div>
                 </div>
               </div>
             </td>
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
            <td>
              <button class="primary-btn" type="button" data-toggle="modal" data-target="#sellMachineModal">Verkopen</button>
              <div class="modal fade" id="sellMachineModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Machine verkopen</h4>
                     </div>
                     <div class="modal-body">
                       <p>Voor hoeveel geld wil je deze Machine verkopen?</p>
                       €<input type="text" class="modalform" id="modalform" pattern="[0-9]" size="3" placeholder="0.00">
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Verkopen</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                     </div>
                   </div>
                 </div>
               </div>
            </td>
            <td>
              <button class="primary-btn" type="button" data-toggle="modal" data-target="#maintenanceMachineModal">Onderhoud</button>
              <div class="modal fade" id="maintenanceMachineModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Machine onderhoud</h4>
                     </div>
                     <div class="modal-body">
                       <p>Machine onderhoud: Heavy</p>
                       <p>Onderhoud kost: €25,-</p>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Reparen</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                     </div>
                   </div>
                 </div>
               </div>
            </td>
            <td>
              <button class="primary-btn" type="button" data-toggle="modal" data-target="#destroyMachineModal">Vernietigen</button>
              <div class="modal fade" id="destroyMachineModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Machine vernietigen</h4>
                     </div>
                     <div class="modal-body">
                       <p>Weet u zeker dat u deze Machine wilt vernietigen?</p>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Vernietigen</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                     </div>
                   </div>
                 </div>
               </div>
            </td>
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
