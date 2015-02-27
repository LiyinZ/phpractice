<?php
require_once 'inc/functions.php';
/*
    3 fundamental variables:
        $current_page
        $per_page
        $total_count
    sql:
        SELECT * FROM $table LIMIT $per_page OFFSET $offset;
        SELECT count(*) FROM $table;
*/
$conn = new PDO('mysql:host=localhost;dbname=comp2003', 'root', 'root');
// 1. the current page number ($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
// 2. records per page ($per_page)
$per_page = 2;
// 3. total record count ($total_count)
$total_count = total($conn);
$pagination = new Pagination($page, $per_page, $total_count);
$offset = $pagination->offset();
$sql = "SELECT * FROM movies LIMIT $per_page OFFSET $offset";
$result = $conn->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trying out pagination</title>
        <link rel="stylesheet" href="css/paper.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Movies</h1>
            <hr>
            <?php foreach($result as $movie): ?>
            <br>
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading"><?= $movie['title'] ?></h4>
                            <p class="list-group-item-text">Title</p>
                        </a>
                        <div class="col-sm-6">
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading"><?= $movie['year'] ?></h4>
                                <p class="list-group-item-text">Year</p>
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading"><?= $movie['5_star_rating'] ?></h4>
                                <p class="list-group-item-text">Rating</p>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading"><?= $movie['length_min'] ?></h4>
                                <p class="list-group-item-text">Length (min)</p>
                            </a>
                            <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading"><?= $movie['studio'] ?></h4>
                                <p class="list-group-item-text">Studio</p>
                            </a>
                        </div>
                    </div>
                </div>
                </div><!-- end of row -->
                <br>
                <?php endforeach; ?>
                <div class="row">
                    <div class="text-center">
                        <ul class="pagination pagination-lg">
                            <?php $pagination->list_pages(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php $conn = null; ?>
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html>