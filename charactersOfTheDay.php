<?php

// Config
include './includes/config.php';

// echo strtotime('today');
// echo date("m.d.y");

setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

$dateTime = new DateTime();
$date = $dateTime->format('d-m-Y');

$urlCharacters = 'http://gateway.marvel.com/v1/public/characters' . $params . '&limit=20';
$resultCharacters = apiCall($urlCharacters);

// Card 1
$offset1 = rand(0, $resultCharacters->data->total);

$urlCharactersRandom1 = 'http://gateway.marvel.com/v1/public/characters' . $params . '&limit=20&offset=' . $offset1;
$resultCharactersRandom1 = apiCall($urlCharactersRandom1);

$countCharacter1 = rand(0, 19);

$characterCard1 = $resultCharactersRandom1->data->results[$countCharacter1];

// Card 2
$offset2 = rand(0, $resultCharacters->data->total);

$urlCharactersRandom2 = 'http://gateway.marvel.com/v1/public/characters' . $params . '&limit=20&offset=' . $offset2;
$resultCharactersRandom2 = apiCall($urlCharactersRandom2);

$countCharacter2 = rand(0, 19);

$characterCard2 = $resultCharactersRandom2->data->results[$countCharacter2];

// Card 3
$offset3 = rand(0, $resultCharacters->data->total);

$urlCharactersRandom3 = 'http://gateway.marvel.com/v1/public/characters' . $params . '&limit=20&offset=' . $offset3;
$resultCharactersRandom3 = apiCall($urlCharactersRandom3);

$countCharacter3 = rand(0, 19);

$characterCard3 = $resultCharactersRandom3->data->results[$countCharacter3];

// if (condition) {
//     # code...
// }

// echo '<pre>';
// print_r($offset1);
// echo '</pre>';

// echo '<pre>';
// print_r($countCharacter1);
// echo '</pre>';

// echo '<pre>';
// print_r($offset2);
// echo '</pre>';

// echo '<pre>';
// print_r($countCharacter2);
// echo '</pre>';

// echo '<pre>';
// print_r($offset3);
// echo '</pre>';

// echo '<pre>';
// print_r($countCharacter3);
// echo '</pre>';

// echo '<pre>';
// print_r($characterCard);
// echo '</pre>';

?>

<!-- Header -->
<?php include './chunks/header.php' ?>
    <!-- Styles -->
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/characters.css">
    <!-- Title -->
    <title>Marvel website</title>
</head>
<body>

    <div class="grid">

        <div class="header">
            <div class="leftContent">
                <img src="./assets/images/marvel-logo.svg" alt="Marvel's logo" width="auto" height="36">
            </div>
            <div class="centerContent">
                <a href="./index.php?page=1">All characters</a>
                <a href="./charactersOfTheDay.php" class="linkActive">Characters of the day</a>
                <a href="./randomCharacter.php">Random character</a>
            </div>
            <div class="rightContent">
                <a href="#">About</a>
            </div>
        </div>

        <div class="date">
            <h2>Characters of the <?= $date ?></h2>
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
                    <a class="button" href="">More</a>
                </div>

            </article>

            <!-- Article 2 -->
            <article class="article">

                <!-- Picture -->
                <img src="<?= $characterCard2->thumbnail->path ?>/standard_fantastic.<?= $characterCard2->thumbnail->extension ?>" width="400" height="400" >

                <!-- Text -->
                <div class="text">
                    <h3 class="block-title"><?= $characterCard2->name ?></h3>
                    <p><?= $characterCard2->description ?></p>
                    <a class="button" href="">More</a>
                </div>

            </article>

            <!-- Article 3 -->
            <article class="article">

                <!-- Picture -->
                <img src="<?= $characterCard3->thumbnail->path ?>/standard_fantastic.<?= $characterCard3->thumbnail->extension ?>" width="400" height="400" >

                <!-- Text -->
                <div class="text">
                    <h3 class="block-title"><?= $characterCard3->name ?></h3>
                    <p><?= $characterCard3->description ?></p>
                    <a class="button" href="">More</a>
                </div>

            </article>

        </div>

        <div class="copyright">
            <h2>Data provided by Marvel. © 2022 MARVEL</h2>
        </div>

    </div>

<?php include './chunks/footer.php' ?>