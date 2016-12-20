<form action="#" method="post">
    <p>
        Do you want to delete the following user ?
        <?php echo isset($user['fistName'])?$user['fistName']:'' . ' ' . isset($user['lastName'])?$user['lastName']:''?>
    </p><br />
    <input type="submit" value="Delete" name="delete"><br />
    <input type="button" value="Cancel" name="cancel">
</form>