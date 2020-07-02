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
						<p id="error"></p>
						<div class="group">
							<label for="user" class="label">Gebruikersnaam</label>
							<input id="username" name="username" type="text" class="input">
						</div>
						<div class="group">
							<label for="pass" class="label">Wachtwoord</label>
							<input id="pwd" name="pwd" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<input type="submit" name="submitLog" id="submitLog" class="button" value="Inloggen">
						</div>
						<div class="hr"></div>
				</div>
				</form>

				<div class="sign-up-htm">
					<form action="" method="POST" id="signup-form">
						<p id="signup-error"></p>
						<p id="success"></p>
						<div class="group">
							<label for="user" class="label">Gebruikersnaam* (min 6 tekens)</label>
							<input id="user" name="username" type="text" class="input" pattern=".{6,}" required title="6 karakters minimaal">
						</div>
						<div class="group">
							<label for="pass" class="label">Wachtwoord* (min 8 tekens)</label>
							<input id="pass" name="pwd" type="password" class="input" pattern=".{8,}" data-type="password" required title="8 karakters minimaal">
						</div>
						<div class="group">
							<label for="passcheck" class="label">Herhaal wachtwoord* (min 8 tekens)</label>
							<input id="pwdcheck" name="pwdcheck" type="password" class="input" pattern=".{8,}" data-type="password" required title="8 karakters minimaal">
						</div>
						<div class="group">
							<label for="name" class="label">Naam*</label>
							<input id="name" name="name" type="text" class="input" required>
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
							<label for="email" class="label">E-mailadres*</label>
							<input id="email" name="email" type="text" class="input" required>
						</div>
						<div class="group">
							<input type="submit" name="submitReg" class="button" id="signup-btn" value="Aanmelden">
						</div>
						<div class="hr"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
