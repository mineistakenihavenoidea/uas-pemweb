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
                window.location.href = '<?= base_url('/games/delete') ?>/' + id;
            }
        }
    </script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 16px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .pagination a:hover {
            background-color: #ddd;
        }
        .pagination .active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
    </style>
</head>
<body>
    <h1>Game Collection</h1>
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
                        <td><img src="<?= base_url('uploads/images/' . $game['image']) ?>" alt="<?= esc($game['title']) ?>" width="100"></td>
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

    <a href="<?= base_url('/games/create') ?>">Add Game</a>

    <div class="pagination">
        <?= $pager->links() ?>
    </div>
</body>
<?= $this->include('templates/footer') ?>
</html>
