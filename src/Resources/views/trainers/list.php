<h2>Listes des formateurs</h2>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
<?php foreach ($trainers as $trainer): ?>
    <tr>
        <td><?php echo $trainer['ID']; ?></td>
        <td><?php echo $trainer['firstName']; ?></td>
        <td><?php echo $trainer['lastName']; ?></td>
        <td><?php echo $trainer['email']; ?></td>
        <td><?php echo $trainer['phone']; ?></td>
        <td>
            <a href="?action=editTrainer&trainerid=<?php echo $trainer['ID']; ?>">Modifier</a>
            <a href="?action=deleteTrainer&trainerid=<?php echo $trainer['ID']; ?>">Supprimer</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
