<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>

<body>
    <?php
    $books = [
        "book1",
        "book2",
        "book3"
    ];

    // assosciative array
    $Books = [
        [
            "name" => "book1",
            "author" => "author1",
            "purchaseUrl" => "http://www.book1.purchase.com"
        ],
        [
            "name" => "book2",
            "author" => "author2",
            "purchaseUrl" => "http://www.book2.purchase.com"
        ],

    ];
    ?>
    <?php foreach ($books as $book) {
        echo "<li>$book</li>";
    }
    ;
    ?>
    <!-- same as template engine in node.js -->
    <?php foreach ($books as $book): ?>
        <li><?= $book; ?></li>
    <?php endforeach; ?>
    <ul>
        <?php foreach ($Books as $book): ?>
            <li>
                <a href="<?= $book['purchaseUrl']; ?>">
                    <?= $book['name']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>