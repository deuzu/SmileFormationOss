
<p> Enter your login and password or
    <a href="?controller=signUp&action=signUp">Sign Up</a>
</p>

<?php foreach ($errors as $error) : ?>
    <p><?php echo $error ?></p>
<?php endforeach ?>

<form action="#" method="post">
    <p>
        Login <input type="text" name="login" /> <br />
        Password <input type="password" name="password" /> <br />
        <input type="submit" value="Log in" name="submit" />
        <input type="hidden" name="controller" value="login" />
        <input type="hidden" name="action" value="form" />
    </p>
</form>
