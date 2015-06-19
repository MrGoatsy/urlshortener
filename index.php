<?php
    include'config.php';
    include'functions.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
	<meta name="author" content="Tom Heek" />
    <link href="main.css" rel="stylesheet" type="text/css" />

	<title>Url shortener</title>
</head>
<body>
<header>
    
</header>
<section>
    <div class="main">
        <table class="table">
            <form method="post">
                <tr><td><label for="url">Type your url here:</label></td></tr>
                <tr><td><input type="url" name="url" class="textbox" /></td></tr>
                <tr><td><input type="submit" value="Submit" class="textbox" /></td></tr>
            </form>
        </table>
    </div>
    <?php
        echo randstring();
    ?>
</section>
</body>
</html>