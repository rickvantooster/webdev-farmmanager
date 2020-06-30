<html>
    <head>
        <link rel="stylesheet" href="static/css/login.css">
		<script src="static/js/login.js"></script>
		<base href="http://localhost/webdev-farmmanager/public/">
    </head>
<body>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Inloggen</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Aanmelden</label>

    <div class="login-form">
			<div class="sign-in-htm">
        <form action="" id="login-form" method="POST" name="login">
  				<div class="group">
  					<label for="user" class="label">Gebruikersnaam</label>
  					<input id="user" name="username" type="text" class="input">
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Wachtwoord</label>
  					<input id="pass" name="pwd" type="password" class="input" data-type="password">
  				</div>
  				<!-- <div class="group">
  					<input id="check" type="checkbox" class="check" checked>
  					<label for="check"><span class="icon"></span> Wachtwoord onthouden?</label>
  				</div> -->
  				<div class="group">
  					<input type="submit" name="submitLog" class="button"  value="Inloggen">
  				</div>
  				<div class="hr"></div>
  				<!-- <div class="foot-lnk">
  					<a href="#forgot">Wachtwoord vergeten?</a>
  				</div> -->
  			</div>
      </form>

			<div class="sign-up-htm">
        <form action="" method="POST" id="signup-form">
  				<div class="group">
  					<label for="user" class="label">Gebruikersnaam</label>
  					<input id="user" name="username" type="text" class="input">
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Wachtwoord</label>
  					<input id="pass" name="pwd" type="password" class="input" data-type="password">
  				</div>
  				<div class="group">
  					<label for="pass" class="label">Herhaal wachtwoord</label>
  					<input id="pass" name="pwdcheck" type="password" class="input" data-type="password">
                  </div>
                  <div class="group">
  					<label for="name" class="label">Naam</label>
  					<input id="name" name="name" type="text" class="input">
                  </div>
                  <div class="group">
  					<label for="address" class="label">Adres</label>
  					<input id="address" name="address" type="text" class="input">
                  </div>
                  <div class="group">
  					<label for="city" class="label">Woonplaats</label>
  					<input id="city" name="city" type="text" class="input">
  				</div>
  				<div class="group">
  					<label for="email" class="label">E-mailadres</label>
  					<input id="email" name="email" type="text" class="input">
  				</div>
  				<div class="group">
  					<input type="submit" name="submitReg" class="button" id="signup-btn" value="Aanmelden">
  				</div>
  				<div class="hr"></div>
  				<!-- <div class="foot-lnk">
  					<label for="tab-1">Ben je al lid?</a>
  				</div> -->
        </form>
  		</div>
		</div>
	</div>
</div>
</body>
</html>
