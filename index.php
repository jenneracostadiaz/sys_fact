<?php
    require_once('sys_fns.php');
    do_html_header('FACTURE SYSTEM', 'Login In');

    echo '<main class="container">';
        display_login_form();
    echo '</main>';

    do_html_footer();
?>