<?php require_once __DIR__.'/ly_header.php'; ?>

<?php 
    if(!empty($_GET['login'])){
        $login = $_GET['login'];
    }
    if(!empty($_GET['email'])){
        $email = $_GET['email'];
    }
    if(!empty($_GET['password'])){
        $password = $_GET['password'];
    }
?>

<main class="container login-page">
    <?php
        if(!empty($_GET['login']) && $login == 'novalid'){
            echo '<div class="alert error">Email o Contraseña iconrrecta!</div>';
        }
    ?>
    <form action="<?php print(sys_domain()).'/functions/login.php' ?>" method="post" class="form">
        <div class="form__group">
            <label for="user_email">User Email</label>
            <input type="email" name="user_email" id="user_email" maxlength="70" required 
                <?php if(!empty($_GET['email'])){
                    if($email !== 'novalid'){
                        echo 'value="'.$_GET['email'].'"';
                    }
                } else {
                    echo ' autofocus ';
                } ?>
            >
        </div>
        <?php
            if(!empty($_GET['email']) && $email == 'novalid'){
                echo '<div class="alert error">Correo insertado incorrectamente</div>';
            }
        ?>
        <div class="form__group">
            <label for="user_psw">Password</label>
            <input type="password" name="user_psw" id="user_psw" maxlength="40" required
                <?php if(!empty($_GET['password'])){
                    echo ' autofocus ';
                } ?>
            >
        </div>
        <?php
            if(!empty($_GET['password']) && $password == 'novalid'){
                echo '<div class="alert error">Contraseña insertada incorrectamente</div>';
            }
        ?>
        <div class="form__group">
            <button type="submit" id="login_submit">Login</button>
        </div>
    </form>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>