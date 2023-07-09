<?php  error_reporting(E_ALL);
session_start(['user']);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librairie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Add Books</h1>
        <!-- add book -->
        <form action="add_book.php" method="post">
            <label for="book-title">title</label>
            <input type="text" name="title" id="book-title">
            <label for="book-author">author</label>
            <input type="text" name="author" id="book-author">
            <label for="book-release-year">release year</label>
            <input type="date" name="release_year" id="book-release-year">
            <label for="book-edition-house">edition house</label>
            <input type="text" name="edition_house" id="book-edition-house">
            <label for="book-buy-date">buy date</label>
            <input type="date" name="buy_date" id="book-buy-date">
            <label for="book-price">price</label>
            <input type="number" name="price" id="book-price">
            <label for="book-pages">pages</label>
            <input type="number" name="pages" id="book-pages">
            <button type="submit">add book</button>
        </form>

        <h1>Add Friends</h1>
        <!-- add friends -->
        <form action="add_friend.php" method="post">
            <label for="friend-name">name</label>
            <input type="text" name="name" id="friend-name">
            <button type="submit">add friend</button>
        </form>

        <h1>Add Lend</h1>
        <!-- add lend -->
        <form action="add_lend.php" method="post">
            <label for="lend-book-id">book id</label>
            <input type="number" name="book_id" id="lend-book-id">
            <label for="lend-friend-id">friend id</label>
            <input type="number" name="friend_id" id="lend-friend-id">
            <label for="lend-date">lend date</label>
            <input type="date" name="lend_date" id="lend-date">
            <label for="return-date">return date</label>
            <input type="date" name="return_date" id="return-date">
            <button type="submit">add lend</button>
        </form>

        <h1>Search</h1>
        <!-- search -->
        <form action="search.php" method="post">
            <select name="type" id="type">
                <option value="book">book</option>
                <option value="release_year">release year</option>
                <option value="price">price</option>
                <option value="pages">pages</option>
                <option value="edition_house">edition house</option>
                <option value="author">author</option>
            </select>
            <label for="search">search</label>
            <input type="text" name="key" id="search">
            <button type="submit">search</button>
        </form>

        <h1>Search Lended Books</h1>
        <!-- search lended books -->
        <form action="search_lended_books.php" method="post">
            <select name="type" id="type">
                <option value="book">book</option>
                <option value="release_year">release year</option>
                <option value="price">price</option>
                <option value="pages">pages</option>
                <option value="edition_house">edition house</option>
                <option value="author">author</option>
            </select>
            <label for="search">search</label>
            <input type="text" name="key" id="search">
            <button type="submit">search</button>
    </header>

<?php require_once "footer.php"; ?>