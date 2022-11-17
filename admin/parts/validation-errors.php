<?php if (!empty($errors)) : ?>
    <div class="my-5 alert alert-danger">
        <?php
        echo implode('<br>', $errors);
        ?>
    </div>
<?php endif; ?>
