<link rel="stylesheet" href="/css/auth.css">

<!-- On ajoute le conteneur de centrage -->
<div class="auth-page-wrapper">

    <form action="/login" method="POST" class="auth-form-container">
        <h2>Connexion</h2>
        
        <?php if ($success === 'register'): ?>
            <div class="success-message">
                Compte créé avec succès ! Vous pouvez vous connecter.
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="error-message">
                <?php
                switch ($error) {
                    case 'invalid_credentials':
                        echo 'Email ou mot de passe incorrect.';
                        break;
                    case 'protected':
                        echo 'Vous devez être connecté pour voir cette page.';
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
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit" class="auth-button btn-login">Se connecter</button>
        
        <p class="auth-link">
            Pas de compte ? <a href="/register">S'inscrire</a>
        </p>
    </form>

</div> <!-- Fin de .auth-page-wrapper -->