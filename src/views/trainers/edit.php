<h2>Edit a trainer</h2>
<form action="#" method="post">
    <label for="ID">ID</label>
    <input type="text" name="ID" readonly="readonly"
           value="<?php echo isset($trainer['ID'])?$trainer['ID']:''; ?>"></br>

    <label for="firstName">First Name</label>
    <input type="text" name="firstName"
           value="<?php echo isset($trainer['firstName'])?$trainer['firstName']:''; ?>"></br>

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName"
           value="<?php echo isset($trainer['lastName'])?$trainer['lastName']:''; ?>"></br>

    <label for="email">Email</label>
    <input type="text" name="email"
           value="<?php echo isset($trainer['email'])?$trainer['email']:''; ?>"></br>

    <label for="phone">Phone</label>
    <input type="text" name="phone"
           value="<?php echo isset($trainer['phone'])?$trainer['phone']:''; ?>"></br>

    <input type="submit" value="Save" name="edit"></br>
</form>
