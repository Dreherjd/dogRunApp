<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/litera/bootstrap.min.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL ?>assets/images/favicon-32x32.png">
    <title>Cip Clop</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>index.php"><img src="<?php echo BASE_URL ?>assets/images/favicon-32x32.png" alt="A Horse"> Animal Transport</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    </li>
                </ul>
                <ul class="navbar-nav d-flex">

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item"><a href="<?php echo BASE_URL ?>views/edit-post.php" class="nav-link">Create a Run</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL ?>views/edit-post.php" class="nav-link">Create a Leg</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL ?>views/edit-post.php" class="nav-link">Add an Animal</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL ?>views/edit-post.php" class="nav-link">Add a User</a></li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br /><br /><br /><br />
    <div class="container">