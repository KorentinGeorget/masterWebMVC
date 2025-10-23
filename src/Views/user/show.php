<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Détails de l'Utilisateur #<?= htmlspecialchars($user['id']) ?></h1>

<div class="showDetails">
    <div class="detailRow">
        <div class="detailLabel">Email</div>
        <div class="detailValue"><?= htmlspecialchars($user['email']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Login</div>
        <div class="detailValue"><?= htmlspecialchars($user['login']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Rôles</div>
        <div class="detailValue"><?= htmlspecialchars($user['roles']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Date de création</div>
        <div class="detailValue"><?= htmlspecialchars($user['dateNew']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Dernière connexion</div>
        <div class="detailValue"><?= htmlspecialchars($user['dateLogin']) ?></div>
    </div>
</div>

<div class="pageActions">
    <a href="/user" class="btn btnSecondary">Retour à la liste</a>
    <a href="/user/edit/<?= $user['id'] ?>" class="btn">Modifier</a>
</div>
