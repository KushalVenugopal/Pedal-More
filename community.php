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

    <title>Pedal More | Community</title>
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

    <section id="community-main-box">
        <section id="user-input">

            <section id="community-form-section">

                <form id="community-form">
                    <label for="userName">Your Name (Optional):</label><br>
                    <input type="text" id="userName" name="userName" placeholder="Enter a your name, or go anonymous"><br>
                    <label for="postTitle">Title:</label><br>
                    <input type="text" id="postTitle" name="postTitle" placeholder="Enter a title for your post"><br>
                    <label for="postBody">Content:</label><br>
                    <input type="text" id="postBody" name="postBody" placeholder="Type your thoughts here..."><br><br>
                    <input type="submit" value="Submit" id="submitButton">
                </form>

            </section>

            <h1 id="submit-success"></h1>
            
        </section>
    
        <section id="user-posts">
            <section id="just-to-load">

                <?php

                    ini_set("display_errors", 1);
                    error_reporting(E_ALL ^ E_NOTICE);

                    require_once "get_posts.php";
                
                ?>

            </section>
                        
        </section>

        <h1 id="new-post-label">Write a new post:</h1>

        <h1 id="all-posts-label">All posts in the community</h1>
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