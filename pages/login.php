<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="../resources/style.php?theme=DarkCyan"/>
    <title>Login</title>
</head>
<body>
    <h1>My Friend System</h1>
    <h2>Login Page</h2>
    <div>
        <form class= "one" action="login_check.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <p>
                <label>Email </label>
                <input type="text" name="email" placeholder="Email"/>
            </p>
            <p>
                <label>Password </label>
                <input type="password" name="password" placeholder="Password"/>
            </p>
            <p>
                <input type="submit" id="btn" name="Login"/>
            </p>
            <p>
                <a class = "one" href="signup.php" type="button">Sign up</button>
                <a class = "two" href="index.php" type="button">Back</button>
            </p> 
        </form>
    </div>
    
</body>
</html>