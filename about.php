<?php

// Config
include './includes/config.php';

?>

<!-- Header -->
<?php include './chunks/header.php' ?>
    <!-- Styles -->
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/about.css">
    <!-- Title -->
    <title>About - Marvel characters</title>
</head>
<body>

    <div class="grid">

        <div class="header">
            <div class="leftContent">
                <img src="./assets/images/marvel-logo.svg" alt="Marvel's logo" width="auto" height="36">
            </div>
            <div class="centerContent">
                <a href="./index.php?page=1">All characters</a>
                <a href="./randomCharacter.php">Random character</a>
            </div>
            <div class="rightContent">
                <a href="#" class="linkActive">About</a>
            </div>
        </div>

            <div class="about">
                <h1>This website is the student work of <a class="underline" href="https://www.esin-ecole.com">ESIN school</a>. It exists only for educational purposes and the contents remain the property of their respective authors.</h1>
                <h1>Developed by <a class="underline" href="https://github.com/ayman-benammour">Ayman Benammour</h1>
            </div>

        <div class="copyright">
            <h2>Data provided by Marvel. © 2022 MARVEL</h2>
        </div>

    </div>

<?php include './chunks/footer.php' ?>