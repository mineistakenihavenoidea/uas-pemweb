<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Game</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
</head>
<body>
    <header>
        <h1>Game Collection</h1>
    </header>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('/collection') ?>">My Collection</a>
        <a href="<?= base_url('/games/create') ?>">Add New Game</a>
        <a href="<?= base_url('/about') ?>">About</a>
    </nav>
    <div class="container">
        <h2>Add Game</h2>
        <form action="<?= base_url('/games/store') ?>" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>

            <label for="category_id">Category:</label>
            <select name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="image">Image:</label>
            <input type="file" name="image">

            <button type="submit">Add Game</button>
        </form>
    </div>
</body>
</html>
