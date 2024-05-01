<?php
    include_once 'connection/db.php';

if (isset($_POST['submit'])) {
    $errors = [];

        if (empty($_POST['title'])) {
            $errors[] = "Book Title is a required field";
        }

        if (empty($_POST['author'])) {
            $errors[] = "Book Author is a required field";
        }

        if (empty($_POST['genre'])) {
            $errors[] = "Book genre is a required field";
        }

        if (empty($_POST['pubYear'])) {
            $errors[] = "Publication Year is a required field";
        }

    if (empty($errors)) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $pubYear = $_POST['pubYear'];

        if (!$_POST['id']) {
            $query = $conn->prepare("INSERT INTO `books`(title, author, genre, publication_year) VALUES (?, ?, ?, ?)");
            $query->bind_param("ssss", $title, $author, $genre, $pubYear);
            $query->execute();
            header('Location: index.php');
        } else {
            $query = $conn->prepare("UPDATE `books` SET title = ?, author = ?, genre = ?, publication_year = ? WHERE id = ?");
            $query->bind_param("ssssi", $title, $author, $genre, $pubYear, $id);
            $query->execute();
            header('Location: index.php');
        }
    }
 else {
        foreach ($errors as $error){
            echo $error . "<br>";
        }
    }
}

//var_dump($error);

//    $book = null;
    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM `books` WHERE id = '$id'";
        $result = $conn->query($query);

        if($result->num_rows == 1){
            $book = $result->fetch_assoc();
        }
        $conn->close();
    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/styles.css" rel="stylesheet">
    <title>Save a book</title>
</head>
<body>
<div class="main-container">
    <header>
        <a href="index.php"><h1 class="home">Internet Book Database</h1></a>
    </header>
    <form action="books.php" method="post" class="save-books">
        <input name="id" type="hidden" value="<?php echo $book['id'] ?? ''; ?>">
        <p><?php echo $msg ?? '';?></p>
        <label for="title">Book Title:</label><br>
        <input name="title" class="input" placeholder="The Art of War" type="text" value="<?php echo $book['title'] ?? ''; ?>" required><br>

        <label for="author">Author Name:</label><br>
        <input name="author" class="input" placeholder="Sun Tzu" type="text" value="<?php echo $book['author'] ?? ''; ?>" required><br>

        <label for="genre">Genre:</label><br>
        <input name="genre" class="input" placeholder="Self Help" type="text" value='<?php echo $book['genre'] ?? ''; ?>' required><br>

        <label for="Year">Publication Year:</label><br>
        <input name="pubYear" class="input" placeholder="1998" type="text" value="<?php echo $book['publication_year'] ?? ''; ?>" required><br>

        <button name="submit" class="btn-submit">Submit</button>
    </form>
</div>
</body>
</html>