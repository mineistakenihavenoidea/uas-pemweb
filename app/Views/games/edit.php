<!DOCTYPE html>
<html lang="en">
<?= $this->include('templates/header') ?>
<head>
    <meta charset="UTF-8">
    <title>Edit Game</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
</head>
<body>
    <h1>Edit Game</h1>
    <form action="<?= base_url('/games/update/'.$game['id']) ?>" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= esc($game['title']) ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required><?= esc($game['description']) ?></textarea>
        <br>
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= $category['id'] == $game['category_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image">
        <br>
        <button type="submit">Update Game</button>
    </form>
</body>
<?= $this->include('templates/footer') ?>
</html>
