<?php
// fetch all result
$conn = require_once 'db.php';
$sql = 'SELECT * FROM articles';
$result = $conn->query($sql);

?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Artikelliste</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Aktiv</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Produktname</th>
                    <th class="text-center">letzte Bearbeitung</th>
                    <th class="text-center">Bild vorhanden</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="text-center"><?=$row['active']==1? 'Ja' : 'Nein' ?></td>
                        <td class="text-center"><?=$row['id'] ?></td>
                        <td class="text-center"><?=$row['article_name'] ?></td>
                        <td class="text-center"><?=$row['last_updated'] ?></td>
                        <td class="text-center"><?=strlen($row['picture_path']) == 0 ? 'Nein':'Ja' ?></td>
                        <td class="text-center"><a onclick="return confirm_click();" href="delete.php?id=<?=$row['id']?>"><button type="button" class="btn btn-danger btn-sm">Löschen</button></a></td>
                        <td class="text-center"><a href="edit.php?id=<?=$row['id']?>"><button type="button" class="btn btn-info btn-sm">Berabeiten</button></a></td>
                        <td class="text-center"><a href="artikel.php?id=<?=$row['id']?>"><button type="button" class="btn <?=$row['active']==1 ? 'btn-success' : 'btn-secondary' ?> btn-sm">Detailansicht</button></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 text-right">
                <a href="add.php"><button type="button" class="btn btn-outline-secondary"> + Artikel hinzufügen</button></a>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        function confirm_click()
        {
            return confirm("Sind Sie sicher?");
        }
    </script>
</body>
</html>
