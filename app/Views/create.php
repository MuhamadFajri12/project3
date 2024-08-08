<!-- app/Views/user/create.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
    <?php endif; ?>
    <form action="/user/store" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="password_confirm">Confirm Password</label>
        <input type="password" name="password_confirm" id="password_confirm">
        <br>
        <button type="submit">Register</button>
    </form>
</body>

</html>