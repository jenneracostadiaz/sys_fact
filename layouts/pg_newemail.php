<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>
<?php 
    if(!empty($_GET['company'])){
        $company = $_GET['company'];
    }
    if(!empty($_GET['file'])){
        $file = $_GET['file'];
    }
?>

<main class="container new-email">
    <form action="<?php print(sys_domain()).'/functions/sendemail.php' ?>" method="post" class="form" enctype="multipart/form-data">
        <div class="form__group">
            <label for="select_company">Seleccionar Empresa</label>
            <select name="select_company" id="select_company" autofocus>
                <?php e_optionUsers(); ?>
            </select>
        </div>
        <?php
            if(!empty($_GET['company']) && $company == 'novalid'){
                echo '<div class="alert error">Empresa no encontrada</div>';
            }
        ?>
        <div class="form__group">
            <label for="attachment-pdf">Adjuntar Archivo PDF</label>
            <input
                type="file"
                name="document[]"
                id="attachment-pdf"
                accept="application/pdf"
                required
            >
            <small>Max. 12MB</small>
        </div>
        <?php
            if(!empty($_GET['file']) && $file == 'novalid-0'){
                echo '<div class="alert error">Archivo Incorrecto</div>';
            } 
            if(!empty($_GET['file']) && $file == 'filesize-0'){
                echo '<div class="alert error">Archivo Muy Grande</div>';
            }
            if(!empty($_GET['file']) && $file == 'uploated-0'){
                echo '<div class="alert error">El archivo ya Existe en el Servidor</div>';
            }
        ?>
        <div class="form__group">
            <label for="attachment-xml">Adjuntar Archivo XML</label>
            <input
                type="file"
                name="document[]"
                id="attachment-xml"
                accept=".xml"
            >
            <small>Max. 12MB</small>
        </div>
        <?php
            if(!empty($_GET['file']) && $file == 'novalid-1'){
                echo '<div class="alert error">Archivo Incorrecto</div>';
            }
            if(!empty($_GET['file']) && $file == 'filesize-1'){
                echo '<div class="alert error">Archivo Muy Grande</div>';
            }
            if(!empty($_GET['file']) && $file == 'uploated-1'){
                echo '<div class="alert error">El archivo ya Existe en el Servidor</div>';
            }
        ?>
        <div class="form__group">
            <button type="submit" id="sendemail_submit">Enviar Correo</button>
        </div>
    </form>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>