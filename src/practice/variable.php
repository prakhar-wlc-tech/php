<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php tutorial</title>
</head>

<body>
    <!-- similar to handleBar or EJS (template engine in node.js) -->
    <?php
    // echo => print
    echo "hello, world!!";

    // double quote in php works  as template literals(node.js)
    $greeting = "hello"; // variable declared with $ (more like in js)
    
    echo "$greeting, everbody!!";
    echo "<br>";
    echo '$greeting, everybody!!';

    $book_name = "The song of fire and Ice";
    $isRead = $_REQUEST['isRead'];
    ?>

    <h1>
        Have you read the book "<?php echo $book_name; ?>"?.
    </h1>
    <form method="get">
        <label for="isRead">Have you read the book?</label>
        <select name="isRead" id="isRead">
            <option value="none">none</option>
            <option value="true">yes</option>
            <option value="false">no</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <h1>
        <?php if ($isRead === "true") {
            echo "Yes";
        } else {
            echo "NO";
        }
        ; ?>
    </h1>
    <? echo $isRead; ?>
    <?= $isRead ?> // works same as above<!--  -->
</body>

</html>