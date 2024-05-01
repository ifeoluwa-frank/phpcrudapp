<?php

    include_once 'connection/db.php';
    $sql = mysqli_query($conn, "SELECT * FROM `books`");
    $books = mysqli_fetch_all($sql, MYSQLI_ASSOC);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/styles.css" rel="stylesheet">
    <title>Internet Book Database</title>
</head>
<body>
<div class="main-container">
    <header>
        <a href="index.php"><h1 class="home">Internet Book Database</h1></a>
    </header>
    <main>
        <a href="books.php">
            <button class="add-book">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 16"
                fill="currentColor"
                class="svg">
                <path
                        d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
            </svg>
                <p class="button-text">Add Book</p>
            </button>
        </a>
        <table>
<!--            <caption>Internet Book Database</caption>-->
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th colspan="2">Actions</th>
            </tr>

            <?php foreach ($books as $book): ?><tr>
                <td><?= $book['id']; ?></td>
                <td><?= $book['title']; ?></td>
                <td><?= $book['author']; ?></td>
                <td><?= $book['genre']; ?></td>
                <td><?= $book['publication_year']?></td>
                <td class="action">
                    <a href="books.php?id=<?php echo $book['id']; ?>" class="edit">Edit</a>
                </td>
                <td class="action">
                    <a href="delete.php?id=<?php echo $book['id'] ?>">
                        <button name="" class="button">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 class="svg">
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                            <p class="button-text">Delete</p>
                        </button>
                    </a>
                </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <aside>
        <div>
            <form class="search-form" action="search.php" method="get">
                <input type="text" name="search" placeholder="Search by Title or Author" class="search-box"><br>
                <button type="submit" class="button btn-search">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24"
                         fill="currentColor"
                         class="svg">
                        <path
                                fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>
                    <p>Search</p>
                </button>
            </form>
        </div>
    </aside>
</div>
</body>
</html>