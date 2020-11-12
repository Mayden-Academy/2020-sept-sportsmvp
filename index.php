<?php

use TheRealMVP\DBImport;
use TheRealMVP\DisplayData;
use TheRealMVP\GetAPI;
use TheRealMVP\TeamHydrator;
use TheRealMVP\SportHydrator;
use TheRealMVP\DisplaySport;

require_once './vendor/autoload.php';

$api = new GetAPI();
$db = new DBImport();
$db->storeData($api->getJson());
$hydrator = TeamHydrator::getData();
$sportHydrator = SportHydrator::getData();

?>

<!DOCTYPE HTML>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#111111">
        <title>The Real MVP</title>
        <link rel="icon" type="image/x-icon" href="./app/images/favicon.ico">
        <link type='text/css' rel='stylesheet' href='./app/css/normalize.css' />
        <link type='text/css' rel='stylesheet' href='./app/css/style.css' />
    </head>
    <body>
        <header>
            <h1>The Real MVP</h1>
        </header>
        <form action="#" method="GET" name="filter" id="filter">
            <label for="filter">Filter by</label>
            <select>
                <option value="">All Sports</option>
               <?php echo DisplaySport::displayAllSport($sportHydrator); ?>
            </select>
        <input class="submit" type="submit" value="Submit">
        <input type="submit" value="Clear">
       
        </form>
        <main>
                <?php echo DisplayData::displayAllTeams($hydrator); ?>
        </main>
        <footer>
            <img class="logo" src="./app/images/pangologo.png" />
            &copy; Pangolins <?php echo date('Y'); ?>
        </footer>
    </body>
</html>