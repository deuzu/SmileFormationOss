<form action="#" method="post">
    <?php if(isset($errorForm)&& $errorForm==true){echo $errorForm;}?>
    <p>Last Name: <input type="text" name="lastName" /></p>
    <p>FirstName : <input type="text" name="firstName" /></p>
    <p>Login : <input type="text" name="login" /></p>
    <p>Email : <input type="text" name="email" /></p>
    <p>Phone : <input type="text" name="phone" /></p>
    <p>Password: <input type="password" name="password" /></p>
    <p><input type="submit" value="valider" name="valider"></p>
</form>
