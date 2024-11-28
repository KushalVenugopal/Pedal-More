<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Outfit&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

    <title>Pedal More | Daily Challenge</title>
</head>
<body id="comm-bod">
    <header>

        <figure>
            <a href="index.php"></a>
        </figure>

        <nav>
            <ul>
                <li>
                    <a href="index.php#dashboard">Dashboard</a>
                </li>

                <li>
                    <a href="new_promotions.php">Promotions</a>
                </li>

                <li>
                    <a href="daily_challenge.php">Daily Challenges</a>
                </li>

                <li>
                    <a href="community.php">Community</a>
                </li>

                <li>
                    <a href="references.php">References</a>
                </li>
            </ul>
        </nav>

    </header>

    <section id="daily-main-box">
        <section id="daily-message">
            <h1>Up for a Challenge?</h1>
            <h3>Try your luck and land yourself a good challenge to achieve.</h3>

            <p>Everyone knows the benefits of cycling on a regular basis. Once you've got into that habit, you will want something to keep you motivated every now and then. Try out the daily challenges available. Pick one for a day, achieve it, and share it with your community!</p>

        </section>

        <section id="generate">
            <a href="" id="generate-button">Generate My Challenge</a>            
        </section>
    
        <section id="the-challenge">

            <article id="challenge-map">

            </article>

            <section id="challenge-desc">
                <?php

                    ini_set("display_errors", 1);
                    error_reporting(E_ALL ^ E_NOTICE);

                    require_once "get_challenge.php";

                ?>
            </section>
            
            <a href="#" id="share">Share with Community >></a>
            
                        
        </section>
    </section>

    <footer>
        <section class="enquiry-msg">
            <p><span>For further details and/or enquiries, contact:</span> pedalmore@email.com</p>
            <p><span>Also, do get in touch with us on social media:</span></p>
            <section class="links">
                <a href="new_promotions.php">Promotions</a>
                <a href="daily_challenge.php">Daily Challenge</a>
                <a href="community.php">Commmunity</a>
                <a href="references.php">References</a>
            </section>
        </section>

        <section class="social-media">

            <a href="https://facebook.com" target="_blank">Facebook </a>

            <a href="https://instagram.com" target="_blank">Instagram</a>

            <a href="https://twitter.com" target="_blank">Twitter</a>

        </section>
    </footer>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>