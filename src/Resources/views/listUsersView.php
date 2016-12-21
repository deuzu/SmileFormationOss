<h2>Listes des utilisateurs</h2>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<table>
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>Role</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['ID']; ?></td>
        <td><?php echo $user['login']; ?></td>
        <td><?php echo $user['role']; ?></td>
        <td><?php echo $user['firstName']; ?></td>
        <td><?php echo $user['lastName']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        <td>
            <a href="?action=editUser&userid=<?php echo $user['ID']; ?>">Modifier</a>
            <a href="?action=deleteUser&userid=<?php echo $user['ID']; ?>">Supprimer</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
