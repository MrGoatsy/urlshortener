<?php
    include'config.php';
    include'lang.php';
    include'functions.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>URL shortener</title>
    
    <meta name="author" content="Tom Heek" />

    <link href="<?php echo $website_url; ?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $website_url; ?>css/main.css" rel="stylesheet" />
    <script src="<?php echo $website_url; ?>js/jquery.min.js"></script>
    <script src="<?php echo $website_url; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $website_url; ?>js/scripts.js"></script>

  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h3 class="title"><a href="<?php echo $website_url; ?>">Short your URL, no bullshit!</a></h3>
		</div>
    </div>
  	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default" role="navigation">
                <?php
                    include'menu.php';
                ?>
			</nav>
		</div>
	</div>
	<div class="row">
        <div class="middle">
    		<div class="col-md-3">
    			<h3>Some stuff</h3>
    		</div>
    		<div class="col-md-6">
                <?php
                /**
                 * Go to link
                 * */
                 
                    if(isset($_GET['s'])){
                        $link = makeFriendly($_GET['s']);
                        $query = $handler->query("SELECT * FROM url WHERE shortlink = '$link'");
                        
                        if($query->rowCount()){
                            $fetch = $query->fetch(PDO::FETCH_ASSOC);
                            
                            header('Location:' . $fetch['longlink']);
                        }
                        else{
                            echo '<h3 style="color: red; text-align: center;">' . $noResults . '</h3>';
                        }
                    }
                ?>
                <table class="table">
                    <form method="post">
                        <tr><td><label for="url"><h3>Type your URL here:</h3></label></td></tr>
                        <tr><td><input type="url" name="url" class="textbox" required /></td></tr>
                        <tr><td><input type="submit" value="Submit" class="textbox" /></td></tr>
                    </form>
                        <tr><td>
                <?php
                /**
                 * Create link
                 * */
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            if(!empty($_POST['url'])){
                                $url = $_POST['url'];
                                
                                if(urlCheck($url) == $url){
                                    $short = randString(10);
                                    
                                    $query = $handler->prepare("INSERT INTO url (longlink, shortlink) VALUES (:longlink, :shortlink)");
                                    
                                    try{
                                        $query->execute(array(
                                            ':longlink'     => $url,
                                            ':shortlink'    => $short
                                        ));
                                        
                                        echo $linksuccess . "<br />
                                        <input type='text' value='" . $website_url . $short . "' onclick='select()' class='textboxlink' />";
                                    }
                                    catch(PDOException $e){
                                        echo $e->getMessage();
                                    }
                                }
                                else{
                                    echo $urlCheckFail;
                                }
                            }
                            else{
                                echo $emptyUrl;
                            }
                        }
                ?>
                        </td></tr>
                </table>
    		</div>
    		<div class="col-md-3">
                <h3>Recently posted links</h3>
    			<?php
                    $query = $handler->query("SELECT * FROM url ORDER BY id DESC LIMIT 10");
                    
                    $i = 1;
                        echo'<table>';
                    while($fetch = $query->fetch(PDO::FETCH_ASSOC)){
                        echo'<tr><td class="numberwidth">' . $i . '.</td>';
                        echo'<td><a href="' . $website_url . $fetch['shortlink'] . '">' . $website_url . $fetch['shortlink'] . '</a></td></tr>';
                        
                        $i++;
                    }
                        echo'</table>';
                ?>
    		</div>
        </div>
	</div>
	<div class="row">
		<div class="col-md-12">
            Footer
		</div>
	</div>
</div>
  </body>
</html>