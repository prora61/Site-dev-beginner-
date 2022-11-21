<div>
    <form action="#" method = "POST">
        <div style="height: 100px;">
            <br>
            <input type="submit" name="Output_list" value="List users output" class="btn_output">
        </div>
    </form>
</div>

<?php
    // Кнопка вывода списка пользователей
    if(isset($_POST['Output_list'])){
        unset($_GET['name']);
        require_once('connect_db.php'); 
        $sql2 = "SELECT * FROM `users`";
        $result = $mysql->query($sql2);  
        for($users=array();$row = $result->fetch_assoc(); $users[] = $row);
        foreach ($users as $k=>$v){
            echo "<p>$v[id] $v[login] $v[password]  "."<a href='?name=$v[login]'>Posts</a>"."</p>";
        }      
        $mysql->close();
    }

    //обработка запроса про список постов
    if (isset($_GET['name'])) {
        require_once('connect_db.php'); 
        $get_name = $_GET['name'];
        $sql = "SELECT COUNT(posts.id_post) FROM posts INNER JOIN users ON users.id = posts.id_user WHERE users.login = '$get_name'";
        $count = $mysql->query($sql);
        $mas = $count->fetch_assoc();
        echo "Количество постов пользователя "."<b>$get_name</b>"." - ".$mas['COUNT(posts.id_post)'];
        //Вывод постов
        $sql1 = "SELECT post FROM posts INNER JOIN users ON users.id = posts.id_user WHERE users.login = '$get_name'";
        $count2 = $mysql->query($sql1);
        for($posts=array();$row = $count2->fetch_assoc(); $posts[] = $row);
        $i = 1;
        $date = strtotime('now');
        echo "<br>На ", date('d.m.Y H:i:s', $date), "<br>";
        foreach ($posts as $k=>$v){
            echo "<br>Пост №".$i.":<br>".$v['post']."<br>";
            $i++;
        }   
        $mysql->close();
    }
?>