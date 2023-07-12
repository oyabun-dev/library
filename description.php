<?php
require_once 'header.php';
require_once 'navigation.php';
require_once 'connect.php';

$get = filter_input_array(INPUT_GET);
if (isset($get) && !empty($get)) {
    $id = $get['id'];

    $query = ("SELECT * FROM books WHERE id = ?");
    $statement = $conn->prepare($query);
    $statement->execute([$id]);
    $book = $statement->fetch(PDO::FETCH_ASSOC);



}

?>

<div id="description">
    <a href="bookshelf.php" class="btn"> Retour </a>
    <div class="description">
        <div class="cover">
            <img src="<?=$book["cover"]?>" alt="<?=$book["title"]?>">
        </div>
        <div class="info">
            <h1 class="heading"> <?=$book["title"]?> </h1>
            <p class="author"> <span>Author:&nbsp;</span> <?=$book["author"]?> </p>
            <p> <span>Release year:&nbsp;</span> <?=$book["release_year"]?> </p>
            <p> <span>Edition house:&nbsp;</span> <?=$book["edition_house"]?> </p>
            <p> <span>Pages:&nbsp;</span> <?=$book["pages"]?> </p>
            <p> <span>Price:&nbsp;</span> <?=$book["price"]?> </p>
            <p> <span>Buy date:&nbsp;</span> <?=$book["buy_date"]?> </p>
            <div class="buttons">
                <form action="update_books.php" method="get">
                    <input type="hidden" name="id" value="<?= $book["id"]?>">
                    <button class="btn box-shadow" name="id" value="<?= $book["id"]?>">Modify</button>
                </form>
                <form action="delete.php" method="get">
                    <input type="hidden" name="id" value="<?= $book["id"]?>">
                    <button class="btn btn-red box-shadow" name="id" value="<?= $book["id"]?>">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>




<?php require_once 'footer.php';
require_once 'subfooter.php'; ?>