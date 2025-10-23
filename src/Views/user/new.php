<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Créer un nouvel utilisateur</h1>

<div class="formWrapper">
    <form action="/user/create" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="roles">Rôle</label>
            <select name="roles" id="roles">
                <option value="ROLE_USER">Utilisateur</option>
                <option value="ROLE_ADMIN">Administrateur</option>
            </select>
        </div>
        <button type="submit" class="btn">Enregistrer</button>
    </form>
</div>

<div class="pageActions">
    <a href="/user" class="btn btnSecondary">Retour à la liste</a>
</div>
