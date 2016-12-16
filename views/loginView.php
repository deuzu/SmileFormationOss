
<p> Enter your login and password or
    <a href="?action=signup">Sign Up</a>
</p>
<?php if(isset($error)&& $error==true){echo "Veuillez vérifier les champs saisis";}?>
<form action="#" method="post">
    <p>
        Login <input type="text" name="login" /> <br />
        Password <input type="password" name="password" /> <br />
        <input type="submit" value="Log in" name="submit" />
    </p>
</form>
