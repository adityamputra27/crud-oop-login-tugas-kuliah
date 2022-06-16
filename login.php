<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.2/examples/sign-in/signin.css">
</head>
<body>
    <main class="form-signin w-100 m-auto">
        <form action="verify.php" method="POST">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="" placeholder="Username">
                <label for="">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="" placeholder="Password">
                <label for="">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Login</button>
        </form>
    </main>
    <script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>