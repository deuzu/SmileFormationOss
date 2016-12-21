<h2>Edit a user</h2>
<form action="#" method="post">
    <label for="ID">ID</label>
    <input type="text" name="ID" readonly="readonly"
           value="<?php echo isset($user['ID'])?$user['ID']:''; ?>"></br>

    <label for="login">Login</label>
    <input type="text" name="login" readonly="readonly"
           value="<?php echo isset($user['login'])?$user['login']:''; ?>"></br>

    <label for="role">Role</label>
    <input type="text" name="role"
           value="<?php echo isset($user['role'])?$user['role']:''; ?>"></br>

    <label for="firstName">First Name</label>
    <input type="text" name="firstName"
           value="<?php echo isset($user['firstName'])?$user['firstName']:''; ?>"></br>

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName"
           value="<?php echo isset($user['lastName'])?$user['lastName']:''; ?>"></br>

    <label for="email">Email</label>
    <input type="text" name="email"
           value="<?php echo isset($user['email'])?$user['email']:''; ?>"></br>

    <label for="phone">Phone</label>
    <input type="text" name="phone"
           value="<?php echo isset($user['phone'])?$user['phone']:''; ?>"></br>

    <input type="submit" value="Save" name="edit"></br>
</form>
