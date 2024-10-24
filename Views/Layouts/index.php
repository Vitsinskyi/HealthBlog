<?php

/** @var string $title */
/** @var string $content */
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
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>

<body>
    <div>
        <header>
            Header
        </header>
    </div>
    <div>
        <main>
            <h2>Content generated below:</h2>
            <?= $content ?>
        </main>
    </div>
    <div>
        <footer>
            Footer
        </footer>
    </div>
</body>

</html>