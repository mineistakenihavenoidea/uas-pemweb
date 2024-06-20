<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Game</title>
</head>
<body>
    <h1>Edit Game</h1>
    <form action="<?= base_url('games/update/'.$game['id']) ?>" method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?= esc($game['title']) ?>" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" required><?= esc($game['description']) ?></textarea>

        <label for="category_id">Category</label>
        <input type="text" name="category_id" id="category_id" value="<?= esc($game['category_id']) ?>" required>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <button type="submit">Update Game</button>
    </form>
</body>
</html>
