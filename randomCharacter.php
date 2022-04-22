<?php

// Config
include './includes/config.php';

$urlCharacters = 'http://gateway.marvel.com/v1/public/characters' . $params . '&limit=20';
$resultCharacters = apiCall($urlCharacters);

// Card 1
$offset1 = rand(0, $resultCharacters->data->total);

$urlCharactersRandom1 = 'http://gateway.marvel.com/v1/public/characters' . $params . '&limit=20&offset=' . $offset1;
$resultCharactersRandom1 = apiCall($urlCharactersRandom1);

$countCharacter1 = rand(0, 19);

$characterCard1 = $resultCharactersRandom1->data->results[$countCharacter1];

?>

<!-- Header -->
<?php include './chunks/header.php' ?>
    <!-- Styles -->
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/characters.css">
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
                <a href="./index.php?page=1">All characters</a>
                <a href="./charactersOfTheDay.php">Characters of the day</a>
                <a href="./randomCharacter.php" class="linkActive">Random character</a>
            </div>
            <div class="rightContent">
                <a href="#">About</a>
            </div>
        </div>

        <div class="date">
            <h2>Random character</h2>
        </div>
        
        <div class="articles">
            <!-- Article 1 -->
            <article class="article">

                <!-- Picture -->
                <img src="<?= $characterCard1->thumbnail->path ?>/standard_fantastic.<?= $characterCard1->thumbnail->extension ?>" width="400" height="400" >

                <!-- Text -->
                <div class="text">
                    <h3 class="block-title"><?= $characterCard1->name ?></h3>
                    <p><?= $characterCard1->description ?></p>
                    <a class="button" href="#">More</a>
                </div>

            </article>
        </div>

        <div class="copyright">
            <h2>Data provided by Marvel. © 2022 MARVEL</h2>
        </div>

    </div>

<?php include './chunks/footer.php' ?>