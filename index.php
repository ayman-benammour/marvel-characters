<?php

// Config
include './includes/config.php';

$page = 1;
$characterSearch = '';

if (!empty($_GET)) 
{
    $page = $_GET['page'];
}

if (!empty($_POST)) 
{
    $characterSearch = $_POST['characterSearch'];
    $page = 1;
}

$offset = ($page - 1) * 20;

$urlCharacters = 'http://gateway.marvel.com/v1/public/characters' . $params . '&offset=' . $offset;

if (!empty($_POST)) {
    $urlCharacters = 'http://gateway.marvel.com/v1/public/characters' . $params . '&offset=' . $offset .'&nameStartsWith=' . $characterSearch;
}

$resultCharacters = apiCall($urlCharacters);

$characters = $resultCharacters->data->results;

?>

<!-- Header -->
<?php include './chunks/header.php' ?>
    <!-- Styles -->
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/allCharacters.css">
    <!-- Title -->
    <title>Marvel characters</title>
</head>
<body>

    <div class="grid">

        <div class="header">
            <div class="leftContent">
                <img src="./assets/images/marvel-logo.svg" alt="Marvel's logo" width="auto" height="36">
            </div>
            <div class="centerContent">
                <a href="./index.php?page=1" class="linkActive">All characters</a>
                <a href="./charactersOfTheDay.php">Characters of the day</a>
                <a href="./randomCharacter.php">Random character</a>
            </div>
            <div class="rightContent">
                <a href="#">About</a>
            </div>
        </div>

        <div class="pagination">
            <div class="leftContent">
                <div class="page">
                    <p>Page <?= $page ?></p>
                    <a href="./index.php?page=<?= $page - 1 ?>"><img src="./assets/images/left-arrow.svg" alt="Previous" width="auto" height="20"></a>
                    <a href="./index.php?page=<?= $page + 1 ?>"><img src="./assets/images/right-arrow.svg" alt="Next" width="auto" height="20"></a>
                </div>
                <form method="POST">
                    <input type="text" placeholder="Search" name="characterSearch" value="<?= $characterSearch ?>">
                    <input class="searchButton" type="submit" value="">
                </form>
            </div>
            <div class="rightContent">
                <p><?= $resultCharacters->data->total ?> results</p>
            </div>
        </div>

        <div class="allCharacters">
            <?php foreach ($characters as $key => $character) { ?>
                <a href="#" class="card">
                    <img src="<?= $character->thumbnail->path . '/portrait_uncanny.' . $character->thumbnail->extension ?>" alt="">
                    <h3><?= $character->name ?></h3>
                </a>
            <?php } ?>
        </div>

        <div class="copyright">
            <h2>Data provided by Marvel. © 2022 MARVEL</h2>
        </div>

    </div>

<?php include './chunks/footer.php' ?>