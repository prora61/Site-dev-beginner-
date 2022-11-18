<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Site</title>
    </head>
 <body>
    <h1 style="margin-top: 16px">Registration form</h1>
    <form action="#" method = "POST">
        <label for="">Enter your username: <br><input type="text" name="login" placeholder="Login" id=""></label><br><br>
        <label for="">Enter your password: <br><input type="password" name="password" placeholder="Password" id=""><br></label><br>
        <input type="submit" name="Registration" value="Registration">
    </form>

    <?php
        require_once ('connect_db.php');
        if(isset($_POST['Registration'])){           
            $log = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
            $pas = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
            $pas_hash = md5($pas."passsss");
            $res = $mysql->query("SELECT `id` FROM `users` WHERE `login` = '$log'");
            $log_check = $res->fetch_assoc();
            if (mb_strlen($log) == '0' || mb_strlen($pas) == '0'){
                echo "<br>You didn't enter your username or password. Repeat the operation.";
            } else if (isset($log_check)) {
                echo "<br>A user with this name already exists.";
            } else {
                $sql = "INSERT INTO `users` (`login`, `password`) VALUES ('$log', '$pas_hash')";
                $mysql->query($sql);
                echo "<br>A new user has been registered. Congratulations, $log!";
                $mysql->close();
            }
        }
    ?>
</body>
</html>
