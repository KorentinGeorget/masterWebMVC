<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/button.css">

<div class="pageHeader">
    <h1 class="pageTitle">Liste des Utilisateurs</h1>
    <div class="pageActions">
        <a href="/user/new" class="btn">Créer un nouvel utilisateur</a>
    </div>
</div>

<table class="crudTable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Login</th>
            <th>Rôles</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['login']) ?></td>
            <td><?= htmlspecialchars($user['roles']) ?></td>
            <td class="actionsCell">
                <a href="/user/show/<?= $user['id'] ?>" class="btn btnSmall">Voir</a>
                <a href="/user/edit/<?= $user['id'] ?>" class="btn btnSmall btnSecondary">Modifier</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>