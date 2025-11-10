<link rel="stylesheet" href="/css/auth.css">
<div class="auth-page-wrapper">

    <form action="/register" method="POST" class="auth-form-container">
        <h2>Créer un compte</h2>
        
        <?php if ($error): ?>
            <div class="error-message">
                <?php
                switch ($error) {
                    case 'email_taken':
                        echo 'Cet email est déjà utilisé.';
                        break;
                    case 'fields_required':
                        echo 'Tous les champs sont requis.';
                        break;
                    default:
                        echo 'Une erreur est survenue.';
                }
                ?>
            </div>
        <?php endif; ?>
        <div class="auth-input-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
         <div class="auth-input-group">
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required>
        </div>
        <div class="auth-input-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit" class="auth-button btn-register">S'inscrire</button>
        
        <p class="auth-link">
            Déjà un compte ? <a href="/login">Se connecter</a>
        </p>
    </form>

</div> 