<?php

/** @var string $title */
/** @var string $content */

use Models\Users;

if (empty($title)) {
    $title = '';
}
if (empty($content)) {
    $content = '';
}
?>
<!doctype html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <header class="py-3 px-2 mb-3 border-bottom bg-secondary">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="/" class="nav-link px-2 link-dark fw-bold fs-5">HealthBlog</a></li>
                        <li><a href="/posts/index" class="nav-link px-2 link-body-emphasis fs-5">Blog</a></li>
                        <li><a href="/category/index" class="nav-link px-2 link-body-emphasis fs-5">Category</a></li>
                        <?php if (!Users::is_user_logged()) : ?>
                            <li><a href="/users/login" class="nav-link px-2 link-body-emphasis fs-5">Login</a></li>
                            <li><a href="/users/register" class="nav-link px-2 link-body-emphasis fs-5">Register</a></li>
                        <?php endif; ?>
                    </ul>

                    <?php if (Users::is_user_logged()) : ?>
                        <div class="dropdown text-end mx-3">
                            <button class="btn btn-link link-body-emphasis dropdown-toggle px-2 fs-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="/users/profile">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <?php if (Users::is_admin()) : ?>
                                    <li><a class="dropdown-item" href="/users/administration">Administration</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="/users/logout">Log out</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>
                </div>
            </div>
        </header>


        <main class="p-5 border flex-fill">
            <div class="container">
                <?= $content ?>
            </div>
        </main>


        <footer class="bd-footer py-3 mt-3 bg-secondary">
            <div class="container">
                <ul class="nav justify-content-center border-bottom border-dark pb-3 mb-3">
                    <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Home</a></li>
                    <li class="nav-item"><a href="/category" class="nav-link px-2 text-body-secondary">Category</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">About</a></li>
                </ul>
                <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
            </div>
        </footer>

    </div>
</body>

</html>