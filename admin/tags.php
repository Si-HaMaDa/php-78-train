<?php
require 'parts/header.php';

try {
    $stmt = $conn->prepare("SELECT * FROM tags");
    $stmt->execute();
    $tags = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "<h3>Query Error: " . $e->getMessage() . "</h3>";
}

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tag</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-outline-secondary">
            Add Tag
        </button>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag) {
                echo '<tr>
                        <td>' . $tag['id'] . '</td>
                        <td>' . $tag['name'] . '</td>
                        <td>' . $tag['created'] . '</td>
                        <td>' . $tag['updated'] . '</td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php
require 'parts/footer.php';
