<?php if(!defined("APP_NAME")) exit(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container" id="sign-in-form-container">
            <h2 class="sign-in-heading text-center">Connexion</h2>
            <form method="post" id="signInForm">
                <div class="form-group">
                    <label for="username">Pseudo</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Pseudo" required />
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required />
                </div>
                <div class="alert alert-danger alert-errors"></div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Se connecter</button><hr />
                <p>Si vous n'êtes pas inscrit, vous pouvez vous inscrire ici.</p>
                <a href="#" id="sign-up-link">Inscription</a>
                <input type="hidden" name="_token" class="token-field" value="<?php echo isset($_SESSION["token"]) ? $_SESSION["token"] : ""; ?>" />
            </form>
        </div>
    </div>
</div>