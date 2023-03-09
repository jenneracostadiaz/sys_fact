<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>
<?php 
    if(!empty($_GET['company'])){
        $company = $_GET['company'];
    }
    if(!empty($_GET['username'])){
        $username = $_GET['username'];
    }
    if(!empty($_GET['fullname'])){
        $fullname = $_GET['fullname'];
    }
    if(!empty($_GET['phone'])){
        $phone = $_GET['phone'];
    }
    if(!empty($_GET['email'])){
        $email = $_GET['email'];
    }
    if(!empty($_GET['database'])){
        $database = $_GET['database'];
    }
    if(!empty($_GET['insert'])){
        $insert = $_GET['insert'];
    }
?>

<main class="container new-agent">
    <h1>Crear un nuevo Representante</h1>
    <?php 
        if(!empty($_GET['database']) && $database == 'erroconex'){
            echo '<div class="alert error">Error en la conexión con la Base de Datos</div>';
        }
        if(!empty($_GET['database']) && $database == 'userexist'){
            echo '<div class="alert error">El Nombre de Usuario ya existe en la base de datos</div>';
        }
        if(!empty($_GET['insert']) && $insert == 'error'){
            echo '<div class="alert error">Tuvimos un error al insertar los datos, vuelve a intentarlo más tarde</div>';
        }
        if(!empty($_GET['insert']) && $insert == 'successfully'){
            echo '<div class="alert success">Felicidades! insertaste una nueva empresa. Relacionalo con un representante para que empiece a funcionar en el sistema.</div>';
        }
    ?>
    <form action="<?php print(sys_domain()).'/functions/create_agent.php'; ?>" class="form" method="post">
        <?php
            $result = connectDB()->query(query_companies());
            if ($result->num_rows > 0){
                echo '<div class="form__group">';
                    echo '<label for="s_company">Seleccionar Empresa a la que pertenece</label>';
                    echo '<select name="s_company" id="s_company">';
                        while($row = $result->fetch_assoc()){
                            $CompanieID = $row["CompanieID"];
                            $Name = $row["Name"];
                            echo '<option value="'.$CompanieID.'">'.$Name.'</option>';
                        }
                    echo '</select>';
                echo '</div>';
            }
            if(!empty($_GET['company']) && $company == 'novalid'){
                echo '<div class="alert error">Empresa no encontrada</div>';
            }
        ?>
        
        <div class="form__group">
            <label for="username">Ingrese un Nombre de Usuario</label>
            <input type="text" name="username" id="username" minlength="3" maxlength="15" required>
        </div>
        <?php 
            if(!empty($_GET['username']) && $username == 'novalid'){
                echo '<div class="alert error">Nombre de Usuario no valido, pruebe con menos de 15 caracteres</div>';
            }
        ?>
        <div class="form__group">
            <label for="fullname">Ingrese su Nombre Completo</label>
            <input type="text" name="fullname" id="fullname" minlength="3" maxlength="50" required>
        </div>
        <?php 
            if(!empty($_GET['fullname']) && $fullname == 'novalid'){
                echo '<div class="alert error">Su nombre no es válido en nuestro sistema</div>';
            }
        ?>
        <div class="form__group">
            <label for="phone">Su Teléfono</label>
            <input type="tel" name="phone" id="phone">
        </div>
        <?php 
            if(!empty($_GET['phone']) && $phone == 'novalid'){
                echo '<div class="alert error">Teléfono no valido</div>';
            }
        ?>
        <div class="form__group">
            <label for="email">Ingrese su Correo</label>
            <input type="email" name="email" id="email" required>
        </div>
        <?php 
            if(!empty($_GET['email']) && $email == 'novalid'){
                echo '<div class="alert error">Correo no valido</div>';
            }
        ?>
        <div class="form__group">
            <label for="password">Ingrese una Contraseña</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form__group">
            <button type="submit">Registrar</button>
        </div>
    </form>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>