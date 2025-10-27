<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Modifier l'Utilisateur</h1>

<div class="formWrapper">
    <form action="/user/update/<?= $user->getId() ?>" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($user->getEmail()) ?>">
        </div>
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" id="login" value="<?= htmlspecialchars($user->getLogin()) ?>">
        </div>
        <div>
            <label for="password">Nouveau mot de passe (laisser vide pour ne pas changer)</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="roles">Rôle</label>
            <select name="roles" id="roles">
                <option value="ROLE_USER" <?= (in_array('ROLE_USER', $user->getRoles())) ? 'selected' : '' ?>>Utilisateur</option>
                <option value="ROLE_ADMIN" <?= (in_array('ROLE_ADMIN', $user->getRoles())) ? 'selected' : '' ?>>Administrateur</option>
            </select>
        </div>
        <button type="submit" class="btn">Mettre à jour</button>
    </form>
</div>

<div class="pageActions">
    <a href="/user" class="btn btnSecondary">Retour à la liste</a>
    <form action="/user/delete/<?= $user->getId() ?>" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
        <button type="submit" class="btn btnDanger">Supprimer</button>
    </form>
</div>
