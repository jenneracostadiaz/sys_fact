<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>

<main class="container dashboard">
    <p>Hola <b><?php e_userName(); ?></b>, bienvenido al sistema de gestion.</p>
    <code><?php e_userRol(); ?></code>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>