<!DOCTYPE html>
<html>
<head>
    <title>Game Collection</title>
</head>
<body>
    <h1>Game Collection</h1>
    <a href="/games/create">Add</a>
    <ul>
        <?php foreach ($games as $game): ?>
            <li>
                <h2><?= $game['title'] ?></h2>
                <p><?= $game['description'] ?></p>
                <a href="/games/edit/<?= $game['id'] ?>">Edit</a>
                <form action="/games/delete/<?= $game['id'] ?>" method="post">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
