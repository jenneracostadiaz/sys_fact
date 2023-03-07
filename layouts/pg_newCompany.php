<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>
<?php 
    if(!empty($_GET['ruc'])){
        $ruc = $_GET['ruc'];
    }
    if(!empty($_GET['raz_social'])){
        $raz_social = $_GET['raz_social'];
    }
    if(!empty($_GET['database'])){
        $database = $_GET['database'];
    }
    if(!empty($_GET['insert'])){
        $insert = $_GET['insert'];
    }
?>

<main class="container new-company">
    <?php
        if(!empty($_GET['database']) && $database == 'erroconex'){
            echo '<div class="alert error">Error en la conexión con la Base de Datos</div>';
        }
        if(!empty($_GET['database']) && $database == 'rucexist'){
            echo '<div class="alert error">El RUC yaexiste en la base de datos</div>';
        }
        if(!empty($_GET['insert']) && $insert == 'error'){
            echo '<div class="alert error">Tuvimos un error al insertar los datos, vuelve a intentarlo más tarde</div>';
        }
        if(!empty($_GET['insert']) && $insert == 'successfully'){
            echo '<div class="alert success">Felicidades! insertaste una nueva empresa. Relacionalo con un representante para que empiece a funcionar en el sistema.</div>';
        }
    ?>
    <form action="<?php print(sys_domain()).'/functions/create_company.php'; ?>" method="post" class="form">
        <div class="form__group">
            <label for="ruc">RUC</label>
            <input name="ruc" id="ruc" type="text" minlength="11" maxlength="11" required autofocus>
        </div>
        <?php
            if(!empty($_GET['ruc']) && $ruc == 'novalid'){
                echo '<div class="alert error">RUC no válido</div>';
            }
        ?>
        <div class="form__group">
            <label for="raz_social">Razón Social</label>
            <input name="raz_social" id="raz_social" type="text" minlength="3" required>
        </div>
        <?php
            if(!empty($_GET['raz_social']) && $raz_social == 'novalid'){
                echo '<div class="alert error">Razón Social no válido, solo se pemiten letras, números, punto y ampersand.</div>';
            }
        ?>
        <div class="form__froup">
            <button type="submit" id="company_submit">Crear Empresa</button>
        </div>
    </form>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>