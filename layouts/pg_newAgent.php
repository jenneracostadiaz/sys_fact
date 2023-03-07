<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>

<main class="container new-agent">
    <h1>Crear un nuevo Representante</h1>
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
        ?>
        <div class="form__group">
            <label for="username">Ingrese un Nombre de Usuario</label>
            <input type="text" name="username" id="username" minlength="3" maxlength="15" required>
        </div>
        <div class="form__group">
            <label for="fullname">Ingrese su Nombre Completo</label>
            <input type="text" name="fullname" id="fullname" minlength="3" maxlength="50" required>
        </div>
        <div class="form__group">
            <label for="phone">Su Teléfono</label>
            <input type="tel" name="phone" id="phone">
        </div>
        <div class="form__group">
            <label for="email">Ingrese su Correo</label>
            <input type="email" name="email" id="email" required>
        </div>
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