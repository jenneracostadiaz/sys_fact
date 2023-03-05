<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>

<main class="container new-email">
    <form action="<?php print(sys_domain()).'/functions/sendemail.php' ?>" method="post" class="form">
        <div class="form__group">
            <label for="select_company">Seleccionar Empresa</label>
            <select name="select_company" id="select_company" autofocus>
                <?php e_optionUsers(); ?>
            </select>
        </div>
        <div class="form__group">
            <label for="attachment">Adjuntar Archivo</label>
            <input
                type="file"
                name="attachment"
                id="attachment"
                required
                accept=".xml,application/pdf"
            >
            <small>Max. 12MB</small>
        </div>
        <div class="form__group">
            <button type="submit" id="sendemail_submit">Enviar Correo</button>
        </div>
    </form>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>