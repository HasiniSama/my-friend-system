<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="../resources/style.php?theme=DarkCyan"/>
    <title>Sign up</title>
</head>
<body>
    <div>
        <h1>My Friend System</h1>
        <h2>Registration Page</h2>
        <form class = "one" action="signup_check.php" method="post">

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label for="email">Email </label>
            <?php if (isset($_GET['name'])) { ?>
                <input  type="text" 
                        name="email" 
                        placeholder="Email"/>
                        value="<?php echo $_GET['name']; ?>"><br>
            <?php }else{ ?>
                <input type="text" 
                        name="email" 
                        placeholder="Email"><br>
            <?php }?>

            <p>    
            <label>Profile Name </label>
            <?php if (isset($_GET['name'])) { ?>
                <input type="text" 
                        name="name" 
                        placeholder="Name"
                        value="<?php echo $_GET['name']; ?>"><br>
            <?php }else{ ?>
               <input type="text" 
                        name="name" 
                        placeholder="Name"><br>
            <?php }?>
            </p>

            <p>
                <label for="password">Password </label>
                <input type="password" 
                        name="password" 
                        placeholder="Password"><br>

            </p>

            <p>
                <label>Confirm Password </label>
                <input type="password" 
                        name="c_password" 
                        placeholder="Confirm Password"><br>

            </p>

            <p>
                <input type="submit" id="btn" name="Login"/>
            </p>  

            <p>
                <a class = "one" href="login.php" type="button">Login</button>
                <a class = "two" href="index.php" type="button">Back</button>
            </p>  
        </form>
        <?php echo $error; ?>
    </div>
    
</body>
</html>
