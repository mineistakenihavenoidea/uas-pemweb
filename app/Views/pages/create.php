<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Game</title>
</head>
<body>
    <h1>Add New Game</h1>
    <form action="<?= base_url('games/store') ?>" method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>

        <label for="category_id">Category</label>
        <input type="text" name="category_id" id="category_id" required>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <button type="submit">Add Game</button>
    </form>
</body>
</html>
