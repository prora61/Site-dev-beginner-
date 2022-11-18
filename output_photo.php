<?php
    function output_photo(){
        require_once("connect_db.php");
        $result = $mysql->query("SELECT `photo` FROM `users` WHERE `login` = '$_COOKIE[username]'")->fetch_assoc();
        $mysql->close();
        return $result['photo'];
    }

?>