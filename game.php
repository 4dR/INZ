<!DOCTYPE html>
<html lang="en">

<?php 
    require './steamauth/steamauth.php'; 

    if(isset($_SESSION['steamid'])) {
        include('steamauth/userInfo.php');
    }   
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Square+Peg&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bcbbe0b4e9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Match Us</title>
</head>
<body>

<header class="header-not-main">

    <?php include('./components/navbar.php'); ?>

</header>

<div class="game-choice container">
    <div class="game-choice-square">
        <a href="./rust.php"></a>
        <img src="./img/rust-logo.svg" alt="rust logo" />
    </div>
    <div class="game-choice-square">
        <a href="./cs.php"></a>
        <svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="-107.7096 -41.3975 933.4832 248.385"><path d="M412.7 39.502c.2.1.2.1 0 0z"/><path d="M400 3.002c3-2.7 7.5-3.7 11.4-2.5 1.5.5 2.8 1.4 4.2 2.3 1.1.7 2.4 1 3.4 1.8.5.4.1 1.1.1 1.6 1.3 3.1 2 6.5.9 9.8-.9 1.1-2.5 1.4-3.8 1.9-.2 1.4.3 2.7.5 4.1-.3.2-.5.4-.8.6 1.9-.1 3.8-.5 5.7-.9.7-.7 1.8-.3 2.7-.4.1-1.4.6-2.7.6-4.1.2 0 .6-.1.8-.2.1 1 0 2 .3 3 .5.4 1.3.2 1.9.3 0 .4 0 .8.1 1.2 11.6-.1 23.3 0 34.9 0v1.7h1.1v-6.5h1.3c0 1.8-.1 3.5 0 5.3.1.1.3.2.5.2 0 .2.1.6.1.8.4-.4.9-.7 1.5-.5.1.3.2.6.3 1-.4.4-.6.9-.4 1.5 3.2.1 6.4 0 9.7 0 .3-.4.8-.6 1.3-.8.2.1.5.3.6.4h4.7c.2.8.2 1.6.1 2.3h-4.8c-.1.1-.4.4-.6.5-.5-.3-.9-.5-1.4-.8h-8.7c-1.7.5-3.5.4-5.2.1v1.9h-14.3c-.6.5-1.2.8-2 .9.3 1.5-1.4 1.9-2 3-.4.6-1 1-1.6 1.2-.5 3.1.6 6 1.4 8.9-.9.2-1.9.5-2.8.7-.5 2-1 4.1-1.4 6.1-.4 1.8-1.8 3.3-3.5 4-1.2 1.4-2.8 2.8-4.7 2.9-.7.2-1.2-.3-1.7-.7-2.5.2-4.8-1-7-2-2.4-1.1-4.6-2.5-6.9-3.8.2 1.4-.5 2.6-1 3.8 1.1.5 2.6.9 3.2 2.1.4.9.8 1.9.8 3-.1 3.6-.5 7.2-.7 10.8.1 2.6-1.2 5.2-3 7.1-1.2-.1-2.2-.6-3.3-1.1-.4.9-1.3 1.8-.8 2.9.4 1.3.4 2.7 1 3.9 3.4 3.6 6.3 7.6 8.4 12.1 2.1 4.3 3.7 8.8 5.4 13.3.3 0 .9-.1 1.2-.1.4 1.3 0 2.8.8 4 .7 1.1.5 2.4.5 3.7-.2 3-.4 6-.7 9-.2 2.1-.7 4.2-1 6.3.1 1.6.8 3.2.7 4.8-.1 1.5-.1 3.1-1.3 4.2.1 3.4-.8 6.8.4 10.1 1.6 2.2 3.4 4.3 5.3 6.2 2.1 1 4.6 1.2 6.4 3 .7 1.1.3 2.4.1 3.6-4.3.6-8.6.6-12.9 0-1.7-.4-3.3-1.1-5-1.3-2.3.1-5 1-7.1-.6-.2-2.7.8-5.3 1.3-7.9.2-.9 1.1-1.5 1-2.4-.2-3.1-.4-6.3-.6-9.4-.4-.2-1.1-.4-1-1 0-1.5-.5-3-.9-4.4-.7-3.8-1-7.7-1.1-11.6-.1-1.1.6-1.9 1.4-2.6.2-1.7.4-3.5.5-5.2-.3-.9-1-1.6-1.4-2.4-1.8.2-4.4.6-5.5-1.3-2.6-3.9-5.3-7.9-7.9-11.8-1.1-.1-2.4 0-3.4-.7-1.1-1.2-1.8-2.8-2.5-4.3-.3 1.2-.5 2.5-1.2 3.5-.6 1-1.6 1.7-2.3 2.6-.7 1.6-1.3 3.2-1.9 4.8-.7 2-1.7 4-1.9 6.2-.1 1.1-.3 2.1-.7 3.1-.5.8-1.4 1.1-2.2 1.5-.6 1.3-1 2.6-1.9 3.7-.6.7-1.6.9-2 1.8-.4 1.2-1 2.3-1.5 3.4-.2 1.2.6 2.5.2 3.7-.7 3-2.2 5.8-3.6 8.5-.7 2-1.2 4.1-2.2 6-.4.8-1.4 1-2.2 1.1-.9 2.2-1.9 4.3-2.5 6.6-.3 2.2-.3 4.5-.2 6.7 0 1 .6 1.8 1 2.7.4 1.2.1 2.4-.1 3.6-3.9.5-7.9.9-11.7-.3-.4-.3-.3-.8-.4-1.2-.3-1.8-.5-3.7.1-5.4 1.3-4.7 2.4-9.4 3.7-14.1-.5-.5-1.2-.9-1.2-1.7-.1-1.3 0-2.7.3-4 .6-2.2 2.2-3.9 3-6 .3-.9.2-1.8.3-2.7 0-2.1 1.2-3.8 2.1-5.6.9-1.5 1.6-3.1 2.8-4.4.8-.7.8-1.8 1.4-2.7.6-1.1 1.6-2 1.6-3.3.2-1.6-.4-3.2-.2-4.8.4-4.7 1.3-9.3 2.1-14-.4-.5-1-1-1.2-1.7.1-.5.2-.9.3-1.4l-.9-1.5c.4-.6.8-1.3 1.2-1.9-.4-.3-.9-.7-1.3-1 .5-1.5.3-3.7 2.1-4.4.2.1.7.2.9.3-.3-2.6-.3-5.3-.6-7.9-.7-2.8-.8-5.7-.5-8.5 1-1.5 2.9-2.1 4.6-2.2-2.2-.5-4.4-.7-6.5-1.4-.1-1.8.2-3.6.5-5.4.9-3.5.5-7.1 1-10.7.5-1 1.8-1.2 2.9-1 1.3.2 2.6-.2 3.9-.6 0-.5.1-1.1 0-1.6-.8-3.5-.6-7.1 0-10.5.8-4.4 2.6-8.7 5.9-11.8 2.2-2.1 5.4-3.1 8.4-3 1 0 1.6 1 2.4 1.6.4-.4.8-.8 1.1-1.2-.5-1.7-1.3-3.5-1.2-5.3.2-4 1.5-8.1 4.5-10.8m31.2 28.3c.2.2.2.2 0 0m1.4.2c.1.7.3 1.4-.1 2-.5.2-1.1.2-1.6.5 1.4 0 2.8.1 4.2 0 1.1-.3.7-1.7.7-2.5-.7-.8-2.2-.3-3.2 0m-3.5 4.2c1 1.1 1.5 2.8 2.4 3.9 1.3-1.7 2.3-3.5 3.8-5-1.8-.1-3.6.1-5.4-.1-.3.4-.5.8-.8 1.2zm283.4 52.4c2.1-.9 4.8.3 5.4 2.5.6 2-.5 4.3-2.5 4.9-1.9.7-4.3-.2-5-2.2-.8-1.8.1-4.4 2.1-5.2m-.6 1.2c-1.6 1.4-1.4 4.2.4 5.3 1.1.8 2.6.6 3.8.1-.7-.8-1.3-1.7-1.8-2.6-.2 0-.7 0-.9-.1-.1.8.3 1.8-.5 2.3-.3-1.6-.1-3.2-.2-4.8 1 0 2.3-.4 3.1.4.6.8 0 1.9-.9 2.2.4.5.7 1.1 1.1 1.6l.2-.5c0 .3-.1.9-.2 1.3 1.7-1 1.9-3.6.6-5-1.2-1.3-3.5-1.4-4.7-.2m1.4.7v1.6c.7-.1 2.1.2 2.1-.9-.2-.9-1.5-.6-2.1-.7zM0 97.702c.1-5 4.6-9.3 9.5-9.4h25.7c4.9 0 9.3 4.3 9.6 9.2H11v22.6h33.8c-.2 3.2-2 6.3-4.8 7.9-1.7 1-3.6 1.4-5.5 1.4H9.4c-4.9-.1-9.3-4.5-9.3-9.4-.1-7.4-.1-14.8-.1-22.3zm57.4-9c1.1-.3 2.3-.4 3.5-.4h26c4.9.2 9.1 4.4 9.3 9.3v22.3c-.1 5-4.6 9.5-9.6 9.5h-27c-4.9-.1-9.3-4.5-9.3-9.4v-22c-.2-4.2 2.9-8.2 7.1-9.3m2.8 8.6v23.4h25.9v-23.4H60.2zm43.5 21.2v-30.2c3 .1 6.1 1.4 7.9 3.9 1.3 1.7 2 3.8 2.1 5.9v22.6c8.6-.1 17.2 0 25.9 0v-32.3h10v31.7c-.1 5-4.4 9.3-9.4 9.5-8.9.1-17.8 0-26.7 0-3.9 0-7.7-2.5-9.2-6.2-.5-1.6-.6-3.2-.6-4.9zm54.4-30.2c5.4-.4 11.1 1.1 15.3 4.7 8 7.6 16.1 15.1 24.1 22.6v-17.2c-.1-3.6 1.9-7.1 5.1-8.9 1.5-.9 3.2-1.2 4.9-1.3.1 13.7 0 27.5 0 41.2h-9.7l-29.7-28.2v28.2h-10v-41.1zm52.5 9c0-4.6 3.8-9.1 8.6-8.9h38.1c0 2.3-1 4.6-2.5 6.3-1.7 1.8-4.2 2.6-6.6 2.6h-9.4v32.2h-10.1v-32.2h-18.1zm50.2-8.9h40c-.1 2.9-1.5 5.9-3.9 7.5-1.5 1-3.4 1.5-5.2 1.5h-20.8v7.1h25.3c0 3.5-2.1 7-5.4 8.4-1.2.5-2.6.7-3.9.7H271v7.1h30.1c0 4.5-3.6 8.8-8.2 8.9h-32c0-13.8-.1-27.5-.1-41.2zm46.2 0h30.1c3.5.1 7.4.5 10.1 3 2.6 2.6 2.9 6.6 2.9 10.1-.1 3 0 6.1-1.2 8.8-1.6 2.7-4.4 4.6-7.5 5.4 4.4 5 8.7 10.1 13.1 15.1h-10.7c-1.1 0-2.2 0-3.1-.5-1.1-.6-1.8-1.7-2.6-2.6-5.4-6.6-10.7-13.3-16.1-19.9h13.6c1.3-.1 2.7-.1 3.7-1.1.8-1.3.6-2.9.7-4.4-.1-1.3.1-2.8-.8-3.9-1-.8-2.4-.9-3.6-.9h-18.5v32.2c-3.4.1-6.7 0-10.1 0-.1-13.9 0-27.6 0-41.3z"/><path d="M445.6 94.302c1.5-3.5 5.1-5.9 8.9-5.9H479c2-.1 4.1.2 5.9 1.2 2.8 1.5 4.6 4.5 5.1 7.6-11.7.1-23.5 0-35.2 0v7.1h23.9c1.8 0 3.7-.1 5.5.5 4 1.3 6.8 5.4 6.6 9.6-.1 3 .4 6.2-.8 9.1-1.5 3.5-5.2 6-9 5.9h-26.8c-4.8-.1-9.1-4.2-9.4-8.9h35.9v-7.3h-26.2c-5.3.1-10.1-4.7-9.8-10 .2-2.9-.4-6.1.9-8.9zm52.6-5.3c1.7-.8 3.6-.6 5.3-.6H537c0 3.5-2.1 7.1-5.6 8.3-2.2.8-4.5.6-6.8.6h-5v32.2h-10v-32.2c-5.6.1-11.3 0-16.9 0 .2-3.5 2.2-7 5.5-8.3zm42.8-.6h29.9c3.4.1 7.2.4 10 2.7 2.8 2.5 3.2 6.5 3.2 10-.1 3 0 6.2-1.1 9.1-1.6 2.8-4.4 4.7-7.5 5.5 2.9 3.2 5.8 6.5 8.7 9.7 1.2 1.4 2.5 2.6 3.6 4.2h-11.2c-1.5 0-3.1-.6-4-1.8-5.5-6.7-11-13.3-16.5-20h13.8c1.4-.1 3.3-.2 3.7-1.8.5-2.2.5-4.5.1-6.7-.3-1.6-2.2-1.8-3.5-1.9h-19.1v32.2H541v-41.2zm54.3 0h10c.1 13.7 0 27.5 0 41.2h-10v-41.2zm21.3 0h10v15.7c.6-.1 1.3.1 1.8-.4 6.5-5.1 12.9-10.2 19.4-15.3h14.6c-7.6 6.7-15.3 13.3-23 20 9 7.1 18.1 14.1 27 21.2h-14.6c-1.3 0-2.5-.4-3.5-1.2-6.8-5.1-13.6-10.3-20.3-15.4h-1.5v16.6c-3.3-.1-6.7 0-10 0 .1-13.8.1-27.5.1-41.2zm50.8 0h40c-.1 2.5-1.1 4.9-2.9 6.6-1.8 1.6-4.2 2.4-6.6 2.3h-20.5v7.1h25.3c-.1 3.6-2.2 7.2-5.7 8.4-2.1.9-4.4.6-6.6.6h-13c-.1 2.4-.1 4.8 0 7.1h30c.1 3.7-2.4 7.4-6 8.5-1.9.6-3.9.4-5.8.4h-28.4c.3-13.6.2-27.3.2-41zm-215 56.7c1-1.2 2.8-1.2 4.3-1.3 1.9 0 3.9-.1 5.7.6 1.4.7 1.4 2.5 1.5 3.9h-2.8c-.2-.8-.2-1.9-1.2-2-1.5-.2-3.1-.3-4.6.1-1.2.4-1.1 1.9-1.2 3 .1 1.8-.2 3.7.3 5.5.3 1 1.5 1.1 2.4 1.2 1.2 0 2.6.2 3.7-.4.8-.7.6-2 .7-3h-3.7v-2.1h6.4c-.1 2.3.5 4.9-1 6.8-1.7 1.2-3.9 1-5.8 1.1-1.8-.1-4.1-.1-5.1-1.8-1-2-.8-4.4-.7-6.6.1-1.7-.1-3.6 1.1-5zm17.8-1.2h2.8v12c2.3.1 4.6 0 6.8 0v2.5h-9.6v-14.5zm17.6.2c2.6-.5 5.3-.6 7.8.2 1.9.7 2 3 2.2 4.8 0 2.6.3 5.4-.8 7.8-1.1 1.5-3.2 1.5-4.9 1.6-2 0-4.4.2-6-1.2-1.1-1.4-1.1-3.3-1.2-4.9 0-2.2-.1-4.4.7-6.5.2-1 1.2-1.6 2.2-1.8m1.5 2.2c-.5.1-1.2.3-1.3.9-.4 2.1-.3 4.2-.3 6.3.1.9.1 2.3 1.3 2.4 1.7.2 3.8.6 5.4-.4.8-2 .5-4.3.5-6.5-.1-.9.1-2.3-1-2.6-1.5-.4-3.1-.3-4.6-.1zm14.7-2.4h8.1c1.2.1 2.7.4 3.1 1.7.6 1.8.5 4.6-1.7 5.3 2.7.6 2.8 4.1 1.8 6.1-.7 1.2-2.3 1.4-3.6 1.4H504v-14.5m2.8 2.3v3.7c1.5 0 3 .1 4.5-.1 1.9 0 1.8-3.5 0-3.6-1.5-.1-3 0-4.5 0m0 9.9c1.7 0 3.3.1 5-.1 1.6-.2 1.4-2.4.9-3.5-1.8-.9-3.9-.2-5.9-.5v4.1zm18.9-12.2c1.4-.1 2.8 0 4.2 0 1.6 4.8 3.3 9.7 4.9 14.5h-2.9c-.3-.9-.6-1.9-.9-2.8h-6.2c-.3.9-.6 1.9-.9 2.8h-3c1.6-4.8 3.3-9.6 4.8-14.5m-.3 9.7h4.9c-.8-2.4-1.6-4.9-2.4-7.3-1 2.3-1.6 4.8-2.5 7.3zm15-9.7h2.8v12h6.8v2.5h-9.6v-14.5zm27.7.1c2.5-.4 5.2-.6 7.6.3 1.7.6 2 2.7 2.1 4.3.1 2.6.3 5.3-.6 7.8-.5 1.5-2.4 1.8-3.8 2-2.2.1-4.5.3-6.6-.6-1.5-.7-1.8-2.6-1.9-4-.2-2.6-.2-5.3.5-7.9.4-1.1 1.6-1.7 2.7-1.9m1.1 2.3c-.8.1-1.3.8-1.3 1.6-.2 2.3-.3 4.8.1 7.1.3 1.2 1.9 1.1 2.9 1.2 1.2-.1 2.8.2 3.7-.8.7-2 .4-4.2.4-6.3-.1-.9 0-2.4-1.1-2.6-1.6-.5-3.2-.4-4.7-.2zm14.8-2.4h9.6v2.3h-6.9v3.9h6.5v2.4h-6.5v5.9h-2.8c.1-4.8.2-9.7.1-14.5zm15.7 0h9.7v2.3h-6.9v3.9h6.5v2.4h-6.5v6h-2.8v-14.6zm15.4 0h9.9v2.4h-7.2v3.7h6.8v2.1h-6.8v4c2.4.1 4.8 0 7.3 0v2.3h-10v-14.5zm16.4 0h4.7c2.1 3.9 4 7.9 6 11.9v-11.9h2.8v14.5h-4.7c-2.1-4-4.3-8-6.1-12.2.1 4.1 0 8.1.1 12.2h-2.8v-14.5zm20.3 1.6c.7-1.4 2.5-1.6 3.8-1.7 1.9 0 3.9-.2 5.7.6 1.3.7 1.3 2.4 1.4 3.7-.9.1-1.8.1-2.8 0-.2-.7-.1-1.9-1.1-2-1.3-.2-2.7-.2-3.9.1-1 .4-.9 1.7-.8 2.5.1 1.1 1.4.9 2.1 1.1 1.9.2 4.1 0 5.8 1.1 1.2 1.5.9 3.6.6 5.4-.3 1.5-1.8 2-3.1 2.1-2.2.2-4.6.3-6.7-.4-1.6-.7-1.6-2.7-1.7-4.2h2.7c.1.8-.1 2 .9 2.3 1.6.3 3.2.4 4.8-.1.9-.7.8-2.2.4-3.2-1.3-.8-3-.4-4.5-.7-1.4-.2-3.3-.2-3.9-1.8-.3-1.5-.3-3.3.3-4.8zm17.5-1.6h2.8v14.5h-2.8v-14.5zm8.3 0h2.9c1.3 4.1 2.8 8.1 3.9 12.2 1.1-4.1 2.6-8.2 3.9-12.2h3c-1.6 4.8-3.1 9.7-4.7 14.5h-4.3c-1.6-4.8-3.1-9.7-4.7-14.5zm18.9 0h10v2.3h-7.2v3.7h6.8v2.1h-6.8v4c2.4.1 4.8 0 7.3 0v2.3h-10c-.1-4.7-.1-9.6-.1-14.4z"/></svg>
    </div>
    <div class="game-choice-square">
        <p>More coming soon...</p>
    </div>
</div>

<?php include('./components/footer.php'); ?>

    <script src="js/script.js"></script>
</body>
</html>