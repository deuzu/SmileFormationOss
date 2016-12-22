<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Consultation du planning de formation</title>
    </head>
    <body>
        <?php self::render('menu.php'); ?>
        <table>
            <caption><b>Planning de formation</b></caption>
            <tr>
                <td>Date</td>
                <td>Label</td>
                <td>Teacher</td>
                <?php if ($role == "ADMIN") { ?>
                    <td>Actions</td>
                <?php } ?>
            </tr>

            <?php foreach ($plannings as $planning) : ?>
            <tr>
                <td><?php echo $planning['date'] ?></td>
                <td><?php echo $planning['label'] ?></td>
                <td><?php echo $planning['teach'] ?></td>
                <td>
                     <?php if ($role == "ADMIN") { ?>
                        <a href="?controller=planning&action=edit&id=<?php echo $planning['ID']; ?>">Update</a>
                        <a href="?controller=planning&action=delete&id=<?php echo $planning['ID'] ?>">Delete</a>
                     <?php } ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>
