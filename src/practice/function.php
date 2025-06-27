<?php

$books = [
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
    [
        "name" => "book3",
        "author" => "author2",
        "purchaseUrl" => "http://www.book3.purchase.com"
    ],

];

// function filterByAuthor($bookCollection, $author){
//     $filteredBooks = [];

//     foreach ($bookCollection as $book){
//         if($book['author'] === $author){
//             $filteredBooks[] = $book;
//         }
//     }

//     return $filteredBooks;
// };

//lambda(anonymous) function
//    $filterByAuthor =  function ($bookCollection, $author){
//         $filteredBooks = [];

//         foreach ($bookCollection as $book){
//             if($book['author'] === $author){
//                 $filteredBooks[] = $book;
//             }
//         }

//         return $filteredBooks;
//     };

//     $filteredBooks = $filterByAuthor($books,'author1');

//    function filter($bookCollection,$key, $value){
//         $filteredBooks = [];

//         foreach ($bookCollection as $book){
//             if($book[$key] === $value){
//                 $filteredBooks[] = $book;
//             }
//         }

//         return $filteredBooks;
//     };

// $filteredBooks = filter($books,'author','author1');
function filtered($items, $fn)
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
}
;

// $filteredBooks = filtered($books, function($book){
//     return $book["author"] === 'author2';
// });
// $filteredBooks = filtered($books, function($book){
//     return $book['name'] === 'book1';
// });

//inbuilt array filter function
$filteredBooks = array_filter($books, function ($book) {
    return $book['name'] === 'book2';
});

require 'function.view.php';