<?php
    require_once('header.html');
    if (isset($_COOKIE["username"]) == ''):
?>
        <header class="header">
            <div>
                My site
            </div>
            <div class="menu">
                <div class="menu__elem">
                    <a href="?name=reg_user">Sign up</a>
                </div>
                <div class="menu__elem">
                    <a href="?name=entry">Sign in</a>
                </div>
            </div>
        </header>
        <div class="menu__elem">
            <?php
                $site_name = $_GET['name']??'0';
                switch ($site_name){
                    case 'reg_user':
                        require_once "reg_user.php";
                        break;
                    case 'entry':
                        require_once "entry.php";
                        break;
                    default: 
                        require_once "form_out.php";    
                        require_once "main.php";
                }
            ?>
        </div>
<?php else: ?> 
    <?php  
        // require_once "connect_db.php"
        $mysqli = new mysqli('localhost', 'user', '', 'new_db');
        $result = $mysqli->query("SELECT photo FROM users WHERE login = '$_COOKIE[username]'")->fetch_assoc();
        $mysqli->close();
        if ($result != NULL){
            $dir = "photo_users/";
            $image = $dir.$result['photo'];
        }
        else {
            $image = 'https://okeygeek.ru/wp-content/uploads/2020/03/no_avatar.png';
        }        
            
        $method = $_SERVER['REQUEST_METHOD']; 
        if (isset($_POST["Out_list_posts"]) && $method === 'POST') {
            require_once("form_out_postsuser.php");
            $post = out_posts();
        }
        else {
            $post = "";
        }  
        
        require_once "add_post.php";
        if (isset($_POST['download'])) {
            require_once('add_photo.php');
            $file = $_FILES['file'];
            if (errors_photo($file)){
                $dir = add_photo($file);
                $image = $dir;
            } else {
                echo "<script>alert('ERRORS DOWNLOAD PHOTO!');</script>";
            }
        } 

        if (isset($_GET["name"]) && $_GET["name"] == 'exit') {
            setcookie("username", "", time() - 60*60, "/");      
            header("Location: /php_entry/index.php");
            unset($_GET["name"]); 
        }
    ?>

    <div class='header'>
        <img src="<?=$image?>" alt="photo" class="avatar"> 
        <div style="margin-right: 800px;">        
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="file"><br>
                <input type="submit" name="download" value="Download">
            </form>
        </div>
        <div class="menu">
            <div class="menu_elem">
                <?php echo "Welcome, ".$_COOKIE["username"]."!"; ?>
            </div>
            <div class="menu__elem">
                <a href="?name=exit">Log out</a>
            </div>
        </div>
    </div>
    <div class = 'content'>
        <br>
        <table>
            <tr>
                <td rowspan='2' width=30% valign="top">  
                    <form method = "POST">
                        <input type="submit" name="Out_list_posts" value="Out list posts" class ="btn_output">
                        <br><br>
                        <textarea name="ps" cols="40" rows="30"><?=$post?></textarea>
                    </form>
                </td>
                <td width=40%>
                    <form action="add_post.php" method = "POST">
                        <textarea name="posts" id="" cols="60" rows="20" maxlength="800">Enter the text...</textarea>
                        <input type="submit" name="Publish" value="Publish" class ="btn_post">
                    </form>
                </td>
                <td width=30%>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="height: 300px" class = 'con'>
                        <br><br>
                        <a href="?del=delete" class="btn">Delete profile</a>
                    </div>
                </td>
                <td>
                </td>
            </tr>
        </table>
    </div>
 <?php 
endif;
?>



