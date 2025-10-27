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
            <td><?= htmlspecialchars($user->getId()) ?></td>
            <td><?= htmlspecialchars($user->getEmail()) ?></td>
            <td><?= htmlspecialchars($user->getLogin()) ?></td>
            <td><?= htmlspecialchars(implode(', ', $user->getRoles())) ?></td>
            <td class="actionsCell">
                <a href="/user/show/<?= $user->getId() ?>" class="btn btnSmall">Voir</a>
                <a href="/user/edit/<?= $user->getId() ?>" class="btn btnSmall btnSecondary">Modifier</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>