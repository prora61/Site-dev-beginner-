<?php 
    if (isset($_POST['Publish']) && $_POST['posts'] != 'Enter the text...') {
        require_once "connect_db.php"; 
        $post_text = $_POST['posts'];
        $id = "SELECT `id` from `users` WHERE `login` = '$_COOKIE[username]'";
        $id2 = $mysql->query($id);
        $id3 = $id2->fetch_assoc();
        $sql = "INSERT INTO `posts`(`id_user`, `post`) VALUES ('$id3[id]', '$post_text')";
        $mysql->query($sql);
        $mysql->close();
        time_nanosleep (1,500000); //заменить
        header("Location: /php_entry/index.php"); 
    }

    if (isset($_GET['del']) && $_GET['del'] == 'delete' ) {
        require_once "connect_db.php"; 
        $sql = "DELETE FROM `users` WHERE `login` = '$_COOKIE[username]'";
        $result = $mysql->query($sql);
        $mysql->query($sql);
        $mysql->close();
        echo "<script>alert('User deleted!');</script>";
        setcookie("username", "", time() - 60*60, "/");
        unset($_GET["name"]);       
        header("Location: /php_entry/index.php");     
    }
?>