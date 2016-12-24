<form action="#" method="post">
    <?php if(isset($error)&& $error==true){echo $error;}?>
        <label for="nom">Last Name :</label><input type="text" name="lastName"/><br/>
        <label for="nom">First Name :</label><input type="text" name="firstName"/><br/>
        <label for="nom">Login :</label><input type="text" name="login"/><br/>
        <label for="nom">Email : </label><input type="text" name="email"/><br/>
        <label for="nom">Phone : </label><input type="text" name="phone"/><br/>
        <label for="nom">Password: </label><input type="password" name="password"/><br/>
        <input type="submit" value="valider" name="valider"><br/>
</form>

