<?php

$conn = require_once 'db.php';

$id = htmlentities($_GET['id']);

$sql = 'SELECT * FROM articles where id = "' . $id . '"';
$result = $conn->query($sql);

if (mysqli_num_rows($result) === 0) {
    die('no record found');

} else {
    $article = $result->fetch_assoc();
}
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h3><?=$article['article_name']?></h3>
        <p class="text-secondary"><?=$article['last_updated']?></p>
        <div class="row pt-5">
            <div class="col-sm-9">
                <p><?=$article['article_body']?></p>
            </div>
            <?php if (strlen($article['picture_path']) != 0 ) { ?>
                <div class="col-sm-3">
                    <img src="<?=$article['picture_path']?>" style="width: 100%">
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-12 ">
                <a href="artikelliste.php"><button type="button" class="btn btn-outline-secondary">Home</button></a>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

