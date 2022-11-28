<?php
    function out_posts() {
        $method = $_SERVER['REQUEST_METHOD']; 
        if (isset($_POST["Out_list_posts"]) && $method === 'POST') {
            include_once("connect_db.php");
            $sql = "SELECT posts.post FROM posts INNER JOIN users ON users.id = posts.id_user WHERE users.login = '$_COOKIE[username]' ORDER BY posts.id_post";
            $temp = $mysql->query($sql);
            for($posts = array(); $mas = $temp->fetch_assoc(); $posts[] = $mas);
            $str = '';
            $str0 = "Пост №";
            $j = 1; 
            foreach ($posts as $k=>$v){
                $str = $str.$str0.strval($j).":".PHP_EOL.$v['post'].PHP_EOL.PHP_EOL;
                $j++;
            } 
            $mysql->close();
            http_response_code(response_code: 200);
            return $str;
        }
    }
 ?>