<!--
  ETML
  Auteur : Laetitia Guidetti et Adrian Barreira
  Date: Septembre à Décembre 2020
  Description : Page pour la connexion -->
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="resources/custom/css/loginStyles.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<script src="resources/javascript.js"></script>
</head>

<body <?php if(array_key_exists('registerError', $_SESSION)) if($_SESSION['registerError']) echo 'onload="RegisterError()"'?>>
<script type="text/javascript">
    function RegisterError()
        {
            document.getElementById("register-form-link").click(); // Simulates button click
        }
</script>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Connexion</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">S'inscrire</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="index.php?controller=login&action=login" method="post" role="form" style="display: block;">
								<?php
								if(array_key_exists('loginError', $_SESSION)){
									if($_SESSION['loginError']){
										echo '								
										<div class="text-danger mb-5">
										<h4>
											<ul>' .
											  "<li>nom d'utilisateur ou mot de passe erroné</li>"
											. '</ul>
										</h4>
									</div>';
									$_SESSION['loginError'] = false;
									}
								}

								?>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Pseudo" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Connexion">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="index.php?controller=login&action=register" method="post" role="form" style="display: none;">
								<?php
								if(array_key_exists('registerError', $_SESSION)){
									if($_SESSION['registerError']){
										echo '								
										<div class="text-danger mb-5">
										<h4>
											<ul>' .
											  "<li>Erreurs insérées non valides</li>"
											. '</ul>
										</h4>
									</div>';

									$_SESSION['registerError'] = false;

									}
								}

								if(array_key_exists('registerErrorUserExists', $_SESSION)){
									if($_SESSION['registerErrorUserExists']){
										echo '								
										<div class="text-danger mb-5">
										<h4>
											<ul>' .
											"<li>Utilisateur existe déjà</li>"
											. '</ul>
										</h4>
									</div>';

									$_SESSION['registerErrorUserExists'] = false;

									}
								}

								?>
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Pseudo" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmer le mot de passe">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="S'inscrire">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
        
</body>