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
        <div>
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
        require_once "output_photo.php";
        require_once "add_post.php";
        if (isset($_POST['download'])) {
            require_once('add_photo.php');
            $file = $_FILES['file'];
            if (errors_photo($file)){
                add_photo($file);
                header("Location: /php_entry/index.php");  
            } else {
                echo "<script>alert('ERRORS!');</script>";
            }
        } 
    ?>
    <div class='header'>
        <img src="<?php echo output_photo();?>" alt="photo" class="avatar"> 
        <div style="margin-right: 800px;">        
            <form action="#" method="POST" enctype="multipart/form-data">
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
        <form action="add_post.php" method = "POST">
            <br><textarea name="posts" id="" cols="60" rows="20" maxlength="800">Enter the text...</textarea><br>
            <input type="submit" name="Publish" value="Publish" class ="btn_post">
        </form>
        <div style="height: 300px" class = 'con'>
        <a href="?del=delete" class="btn">Delete profile</a>
        </div>
    </div>

    <?php
        if (isset($_GET["name"]) && $_GET["name"] == 'exit') {
            setcookie("username", "", time() - 60*60, "/");      
            header("Location: /php_entry/index.php");
            unset($_GET["name"]); 
        }
    ?>
<?php 
endif;
?>



