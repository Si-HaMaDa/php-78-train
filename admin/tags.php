<?php
require 'parts/header.php';

if (!empty($_GET['delete'])) {
    try {
        $id = (int) $_GET['delete'];
        if ($id < 1) {
            $_SESSION['error'] = 'Unkown Tag!';
            echo '<script>window.location = "tags.php"</script>';
            die;
        }
        $sql = "DELETE FROM tags WHERE id = $id";
        $conn->exec($sql);
        $_SESSION['success'] = "Tag $id deleted Successfuly!";
        echo '<script>window.location = "tags.php"</script>';
        die;
    } catch (PDOException $e) {
        $errors[] = "<h1>Error: " . $e->getMessage() . "</h1>";
    }
}

try {
    $stmt = $conn->prepare("SELECT * FROM tags");
    $stmt->execute();
    $tags = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "<h3>Query Error: " . $e->getMessage() . "</h3>";
}

include 'parts/error-messages.php';
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tag</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="./tags-add.php" type="button" class="btn btn-sm btn-outline-secondary">
            Add Tag
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Cretaed</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag) {
                echo '<tr>
                        <td>' . $tag['id'] . '</td>
                        <td>' . $tag['name'] . '</td>
                        <td>' . $tag['created'] . '</td>
                        <td>' . $tag['updated'] . '</td>
                        <td>
                            <a href="tags-show.php?id=' . $tag['id'] . '" class="btn btn-sm btn-secondary">Show</a>
                            <a href="tags-edit.php?id=' . $tag['id'] . '" class="btn btn-sm btn-primary">Edit</a>
                            <a href="tags.php?delete=' . $tag['id'] . '" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php
require 'parts/footer.php';
