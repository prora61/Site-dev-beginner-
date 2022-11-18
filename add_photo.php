<?php
    function add_photo($file) {
        if (isset($file)) {
            require_once("connect_db.php");
            $tmp_name = $file['tmp_name'];
            $name = md5(microtime()).'.'.substr($file['type'],strlen("image/"));
            // $dir = "/opt/lampp/htdocs/php_entry/photo_users/";
            $dir = "photo_users/";
            $uploaddir = $dir.$name;
            if (move_uploaded_file($tmp_name, $uploaddir)){
                $sql = "UPDATE `users` SET `photo` = '$uploaddir' WHERE `login` = '$_COOKIE[username]'";
                $mysql->query($sql);
                $mysql->close();
            } else {
                echo "<script>alert('ERRORS!');</script>";
            }
        }     
        return true;
    }

    function errors_photo($file){
        $name = $file['name'];
        $type = $file['type'];
        $size = $file['size'];
        $error = $file['error'];
        $blacklist = array(".php", ".js", ".html");
        foreach ($blacklist as $key) {
            if (preg_match("/$key\$/i", $name)) return false;
        }
        if (($type != "image/jpeg") && ($type != "image/jpg") && ($type != '/image/png')) return false;
        if ($size > 5 * 1024 * 1024) return false;
        if ($error != 0) return false;
        return true;
    }
?>  