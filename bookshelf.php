<?php

    require_once 'header.php';
    require_once 'navigation.php';
    require_once 'connect.php';
    require_once 'search_book.php';
?>

<div class="search-bar">
    <h1 class="heading">Book list</h1>
    <div class="search-form">
        <form action="search.php" method="post">
            <a href="add_book.php" class="btn">+ Add Book</a>
            <div class="form-group">
                <select name="type" id="type">
                    <option value="book">Title</option>
                    <option value="release_year">Release year</option>
                    <option value="price">Price</option>
                    <option value="pages">Pages</option>
                    <option value="edition_house">Edition house</option>
                    <option value="author">Author</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="key" id="search" placeholder="search by book name ...">
                <button type="submit""><i class="zmdi zmdi-search"></i></button>
            </div>
        </form>
    </div>
</div>

<div class="book-shelves">
    <?php while($books) {
        foreach ($books as $book) {
    ?>
        <a href="description.php?id=<?=$book["id"]?>" class="book-shelf">
            <div class="book-cover"><img src="<?= $book['cover']?>" alt=""></div>
            <div class="book-description">
                <div class="desc">
                    <h1 class="heading"><?= $book['title']?></h1>
                    <h5 class="sub-heading"><?= $book['author']?></h5>
                    <small class="release-date"><?= $book['release_year']?></small>
                    <h5 class="sub-heading"><?= $book['edition_house']?></h5>
                </div>
                <div class="book-action">
                    <form action="description.php" method="get" style="width: 100%;">
                        <button class="btn box-shadow" name="id" value="<?= $book["id"]?>">See more</button>
                    </form>
                </div>
            </div>
        </a>
    <?php 
        $books = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    } 
    ?>
</div>

    

<?php require_once 'subfooter.php'; ?>