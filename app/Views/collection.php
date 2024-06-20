<!DOCTYPE html>
<html lang="en">
<?= $this->include('templates/header') ?>
<head>
    <meta charset="UTF-8">
    <title>Game Collection</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
    <script>
        function confirmDelete(name, id) {
            if (confirm('Delete ' + name + '?')) {
                window.location.href = '/games/delete/' + id;
            }
        }
    </script>
</head>
<body>
    <h1>Game Collection</h1>
    <a href="<?= base_url('/games/create') ?>">Add Game</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($games): ?>
                <?php foreach ($games as $game): ?>
                    <tr>
                        <td><?= esc($game['title']) ?></td>
                        <td><?= esc($game['description']) ?></td>
                        <td><?= esc($game['category']) ?></td>
                        <td><img src="<?= base_url($game['image']) ?>" alt="<?= esc($game['title']) ?>" width="100"></td>
                        <td>
                            <a href="<?= base_url('/games/edit/'.$game['id']) ?>">Edit</a>
                            <button onclick="confirmDelete('<?= esc($game['title']) ?>', <?= $game['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No games found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <?= $pager->links() ?>
</body>
<?= $this->include('templates/footer') ?>
</html>
