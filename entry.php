<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Site</title>
    </head>
 <body>
    <h1 style="margin-top: 16px">Entrance</h1>
    <form action="#" method = "POST">
        <input type="text" id="" name="login" placeholder="Enter your login"><br><br>
        <input type="password" id="" name="password" placeholder="Enter your password"><br><br>
        <input type="submit" name="submit" value="Enter"><br><br>
    </form>

    <?php
        if(isset($_POST['submit'])){
            require_once ('connect_db.php');
                        // real_escape_string   TESTING
            $log = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
            $pas = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
            $pas_hash = md5($pas."passsss");
            $sql = "SELECT login, password FROM users WHERE login='$log' AND password='$pas_hash'";
            $result = $mysql->query($sql);
            $users = $result->fetch_assoc();
            $mysql->close();
            if (mb_strlen($log) == '0' || mb_strlen($pas) == '0'){
                echo "<br>Не ввели логин или пароль. Повторите вход в аккаунт";
            } else if (!$users) {
                echo "<br>Username or password entered incorrectly. Try again";
            } else {
                setcookie("username", $users['login'], time() + 60*60, "/");
                header("Location: /php_entry/index.php");  
            }
         }
    ?>
 </body>
</html>
