<?php include './functions.php'; ?>
<?php if (!isset($_SESSION['registered_user'])) redirect('Not permission!', 'index'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css//styles.css">
    <title>Test</title>
</head>

<body>

    <?php $activePage = 'show';
    include './components/header.php'; ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthday</th>
                <th scope="col">Country</th>
            </tr>
        </thead>
        <tbody>
            <?php $users = getUsers(); ?>
            <?php foreach ($users as $key => $user) : ?>
                <tr>
                    <th scope="row"><?=$key + 1?></th>
                    <td><?=$user[0]?></td>
                    <td><?=$user[1]?></td>
                    <td><?=$user[2]?></td>
                    <td><?=$user[3]?></td>
                    <td><?=$user[5]?></td>
                    <td><?=$user[6]?></td>
                    <td><?=$user[7]?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="public/js/main.js"></script>
</body>

</html>