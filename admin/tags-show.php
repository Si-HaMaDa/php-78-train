<?php
require 'parts/header.php';

if (empty($_GET['id']) || (int) $_GET['id'] < 1) {
    echo '<script>window.location = "tags.php"</script>';
    die;
}
$id = $_GET['id'];
try {
    $sql = "SELECT * FROM tags WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tag = $stmt->fetch();

    if (!$tag) {
        echo '<script>window.location = "tags.php"</script>';
        die;
    }
} catch (PDOException $e) {
    echo '<script>window.location = "tags.php"</script>';
    die;
}

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2">Show Tag</h1>
    <a href="tags.php" class="btn btn-warning">
        < back</a>
</div>
<div class="container card my-3 p-3">
    <div class="form-floating my-3">
        <p for="name">ID</p>
        <p><?= $tag['id'] ?></p>
    </div>
    <div class="form-floating my-3">
        <p for="name">Name</p>
        <p><?= $tag['name'] ?></p>
    </div>
    <div class="form-floating my-3">
        <p for="name">Created</p>
        <p><?= $tag['created'] ?></p>
    </div>
    <div class="form-floating my-3">
        <p for="name">Updated</label>
        <p><?= $tag['updated'] ?></p>
    </div>
</div>

<?php
require 'parts/footer.php';
