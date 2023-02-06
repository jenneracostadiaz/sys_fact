<?php 
    function do_html_header($title) { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?php
                    if($title === 'FACTURE SYSTEM'){
                        echo $title;
                    } else {
                        echo $title . '| FACTURE SYSTEM';
                    }
                ?>
            </title>
        </head>
        <body>
            <header id="main-header">
                <h1><?php
                    if($title === 'FACTURE SYSTEM'){
                        echo $title;
                    } else {
                        echo $title . '| FACTURE SYSTEM';
                    }
                ?></h1>
                <hr>
            </header>
        
    <?php }

    function do_html_footer() {
        echo '<footer> <hr> <p class="copy">FACTURE SYSTEM &copy; '.date('Y').'</p></footer>';
        echo '</body>';
        echo '</html>';
    }

    function display_login_form() { ?>
        <h2>Log In Here</h2>
        <form action="member.php" method="post" class="form-block">
            <p class="form-block__control">
                <label for="username">Username:</label><br/>
                <input type="text" name="username" id="username" />
            </p>
            <p class="form-block__control">
                <label for="passwd">Password:</label><br/>
                <input type="password" name="passwd" id="passwd" />
            </p>
            <button type="submit">Log In</button>
        </form>
    <?php }
?>