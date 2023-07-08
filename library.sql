-- SQLBook: Code

USE library;

CREATE TABLE
    books (
        id INTEGER NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        author VARCHAR(255) NOT NULL,
        release_year DATE NOT NULL,
        edition_house VARCHAR(255) NOT NULL,
        buy_date DATE NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        pages INT NOT NULL,
        PRIMARY KEY (id)
    );

CREATE TABLE
    friends (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );

CREATE TABLE
    lend (
        book_id INT NOT NULL,
        friend_id INT NOT NULL,
        lend_date DATE NOT NULL,
        return_date DATE NOT NULL,
        PRIMARY KEY (book_id, friend_id),
        FOREIGN KEY (book_id) REFERENCES books(id),
        FOREIGN KEY (friend_id) REFERENCES friends(id)
    );

INSERT INTO
    books (
        title,
        author,
        release_year,
        edition_house,
        buy_date,
        price,
        pages
    )
VALUES (
        'The Lord of the Rings',
        'J. R. R. Tolkien',
        '1954-07-29',
        'Allen & Unwin',
        '2019-01-01',
        19.99,
        1216
    ), (
        'Harry Potter',
        'J. K. Rowling',
        '1997-06-26',
        'Bloomsbury',
        '2019-01-01',
        9.99,
        223
    ), (
        'The Little Prince',
        'Antoine de Saint-Exupéry',
        '1943-04-06',
        'Reynal & Hitchcock',
        '2019-01-01',
        6.99,
        96
    ), (
        'The Hobbit',
        'J. R. R. Tolkien',
        '1937-09-21',
        'Allen & Unwin',
        '2019-01-01',
        14.99,
        310
    ), (
        'And Then There Were None',
        'Agatha Christie',
        '1939-11-06',
        'Collins Crime Club',
        '2019-01-01',
        9.99,
        272
    ), (
        'Dream of the Red Chamber',
        'Cao Xueqin',
        '1791-01-01',
        'Gao E',
        '2019-01-01',
        9.99,
        2496
    ), (
        'The Lion, the Witch and the Wardrobe',
        'C. S. Lewis',
        '1950-10-16',
        'Geoffrey Bles',
        '2019-01-01',
        9.99,
        206
    ), (
        'She: A History of Adventure',
        'H. Rider Haggard',
        '1887-10-01',
        'Longmans, Green & Co.',
        '2019-01-01',
        9.99,
        317
    ), (
        'The Da Vinci Code',
        'Dan Brown',
        '2003-03-18',
        'Doubleday',
        '2019-01-01',
        9.99,
        689
    ), (
        'The Catcher in the Rye',
        'J. D. Salinger',
        '1951-07-16',
        'Little, Brown and Company',
        '2019-01-01',
        9.99,
        234
    ), (
        'The Alchemist',
        'Paulo Coelho',
        '1988-01-01',
        'HarperTorch',
        '2019-01-01',
        9.99,
        197
    ), (
        'The Bridges of Madison County',
        'Robert James Waller',
        '1992-04-01',
        'Warner Books',
        '2019-01-01',
        9.99,
        192
    ), (
        'The Guardians',
        'Shannon Messenger',
        '2002-03-08',
        'Galliard',
        '2023-07-07',
        15.00,
        280
    );

INSERT INTO friends (name)
VALUES ('Ngalla'), ('Moustapha'), ('Boubs'), ('Diallo'), ('Diagne Seye'), ('Moussa'), ('Mamadou'), ('Mouhamed'), ('Yannick');

INSERT INTO
    lend (
        book_id,
        friend_id,
        lend_date,
        return_date
    )
VALUES (
        1,
        1,
        '2020-01-01',
        '2020-01-15'
    ), (
        3,
        3,
        '2020-01-01',
        '2020-01-15'
    ), (
        6,
        6,
        '2020-01-01',
        '2020-01-15'
    ), (
        8,
        8,
        '2020-01-01',
        '2020-01-15'
    ), (
        9,
        9,
        '2020-01-01',
        '2020-01-15'
    ), (
        10,
        1,
        '2020-01-01',
        '2020-01-15'
    ), (
        11,
        2,
        '2020-01-01',
        '2020-01-15'
    ), (
        12,
        3,
        '2020-01-01',
        '2020-01-15'
    ), (
        13,
        4,
        '2020-01-01',
        '2020-01-15'
    );

``` 