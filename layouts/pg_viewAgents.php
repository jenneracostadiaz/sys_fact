<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>

<main class="cotainer view-companies">
    <h1>Listado de Representantes:</h1>
    <ul class="list-view">
        <?php
            $result = connectDB()->query(users_companires_rol());
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $UserID = $row["UserID"];
                    $Name = $row["Name"];
                    $Email = $row["Email"];
                    $Companie = $row["Companie"];
                    ?>
                    <li class="list-view query_data">
                        <div class="query_data__name"><?php echo "$Name - $Email" ?> <b><?php echo "$Companie" ?></b></div>
                        <div class="query_data__actions">
                            <form action="#" method="post"><input type="hidden" name="id_company" value="<?php echo $UserID ?>"><button class="edit">EDIT</button></form>
                            <button class="relations">RELACIONAR</button>
                            <form action="#" method="post"><input type="hidden" name="id_company" value="<?php echo $UserID ?>"><button class="delete">DELETE</button></form>
                        </div>
                    </li>
                    <?php
                } 
            }
        ?>
    </ul>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>