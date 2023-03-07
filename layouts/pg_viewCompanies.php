<?php require_once __DIR__.'/ly_header.php'; ?>
<?php require_once __DIR__.'/ly_nav.php'; ?>

<main class="cotainer view-companies">
    <h1>Listado de Empresas:</h1>
    <ul class="list-view">
        <?php
            $result = connectDB()->query(query_companies());
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $CompanieID = $row["CompanieID"];
                    $RUC = $row["RUC"];
                    $Name = $row["Name"];
                    ?>
                    <li class="list-view query_data">
                        <div class="query_data__name"><?php echo "$Name - $RUC" ?></div>
                        <div class="query_data__actions">
                            <form action="#" method="post"><input type="hidden" name="id_company" value="<?php echo $CompanieID ?>"><button class="edit">EDIT</button></form>
                            <button class="relations">RELACIONAR</button>
                            <form action="#" method="post"><input type="hidden" name="id_company" value="<?php echo $CompanieID ?>"><button class="delete">DELETE</button></form>
                        </div>
                    </li>
                    <?php
                } 
            }
        ?>
    </ul>
</main>

<?php require_once __DIR__.'/ly_footer.php'; ?>