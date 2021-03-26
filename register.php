<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/register.css">
	<title>Get start!</title>
	<link rel="icon" type="image/png" href="img/images/logo.png">
</head>
<body>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">

			<form class="sign-in-form" action="register.php" method="POST">
					<h2 class="title">Sign in</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<input name="loginUsername" type="text" placeholder="Username" value="<?php getInputValue('loginUsername') ?>" required autocomplete="off">
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input name="loginPassword" type="password" placeholder="Password" required>
					</div>

					<input name="loginButton" type="submit" value="Login" class="btn solid" />	
				</form>

			<form class="sign-up-form" action="register.php" method="POST">
				<h2 class="title">Sign up</h2>
					<div class="input-field">
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<i class="fas fa-user"></i>
						<input name="username" type="text" placeholder="Username" value="<?php getInputValue('username') ?>" required>
					</div>

					<div class="input-field">
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<i class="fas fa-user"></i>
						<input name="firstName" type="text" placeholder="firstname" value="<?php getInputValue('firstName') ?>" required>
						</div>

					<div class="input-field">
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<i class="fas fa-user"></i>
						<input name="lastName" type="text" placeholder="lastname" value="<?php getInputValue('lastName') ?>" required>
					</div>

					<div class="input-field">
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<i class="fas fa-envelope"></i>
						<input name="email" type="email" placeholder="Your email" value="<?php getInputValue('email') ?>" required>
					</div>

					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input name="email2" type="email" placeholder="Confirm your email" value="<?php getInputValue('email2') ?>" required>
					</div>

					<div class="input-field">
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<i class="fas fa-lock"></i>
						<input name="password" type="password" placeholder="Your password" required>
					</div>

					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input name="password2" type="password" placeholder="Confirm your password" required>
					</div>
				<input name="registerButton" type="submit" class="btn" value="Sign up" />
            </form>
        </div>
    </div>

	<div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Click on sign up to join us!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
			</button>
			<button class="btn transparent" id="sign-up-btn">
              <a href="index.html" style="text-decoration:none;color: #fff;">What we do ?</a>
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Have an account ?</h3>
            <p>
              Click on sign in to log in!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
			</button>
			<button class="btn transparent" id="sign-in-btn">
				<a href="index.html" style="text-decoration:none;color: #fff;">What we do ?</a>
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>

    <script src="register.js"></script>
  </body>
</html>