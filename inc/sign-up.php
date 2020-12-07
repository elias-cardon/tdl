<?php if (!defined("APP_NAME")) exit(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container" id="sign-up-form-container">
            <h2 class="sign-in-heading text-center">Inscription</h2>
            <form method="post" id="signUpForm">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom" required/>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>
                </div>

                <div class="form-group">
                    <label for="username">Pseudo</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Pseudo"
                           required/>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe"
                           required/>
                </div>

                <div class="alert alert-success"></div>
                <div class="alert alert-danger alert-errors"></div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">S'inscrire</button>
                <hr/>
                <p>Si vous avez déjà un compte, vous pouvez vous connecter ici.</p>
                <a href="#" id="sign-in-link">Connexion</a>
                <input type="hidden" name="_token" id="signup_token" class="token-field"
                       value="<?php echo isset($_SESSION["token"]) ? $_SESSION["token"] : ""; ?>"/>
            </form>

        </div>
    </div>
</div>