<?php
require 'parts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    if (empty($name)) {
        $errors['name'] = "Name is empty";
    }

    if (empty($errors)) {
        try {
            $sql = "INSERT INTO tags (name) VALUES ('$name')";
            $conn->exec($sql);
            $_SESSION['success'] = 'Tag added Successfuly';
            // header('location: ./tags.php');
            echo '<script>window.location = "tags.php"</script>';
            die;
        } catch (PDOException $e) {
            $errors[] = "<h1>Error: " . $e->getMessage() . "</h1>";
        }
    }
}

include 'parts/error-messages.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Add Tag</h1>
    <a href="tags.php" class="btn btn-warning">
        < back</a>
</div>
<div class="container card my-3 p-3">
    <form method="POST">
        <div class="form-floating my-3">
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
            <label for="name">Name</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
    </form>
</div>

<?php
require 'parts/footer.php';
