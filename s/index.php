<?php
    include'../config.php';
    include'../lang.php';
    include'../functions.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>URL shortener</title>
    
    <meta name="author" content="Tom Heek" />

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<h3>Short your URL, no bullshit!</h3>
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
    			<p>
    				Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
    			</p>
    		</div>
    		<div class="col-md-6">
                <table class="table">
                    <form method="post">
                        <tr><td><label for="url"><h1>Type your URL here:</h1></label></td></tr>
                        <tr><td><input type="url" name="url" class="textbox" required /></td></tr>
                        <tr><td><input type="submit" value="Submit" class="textbox" /></td></tr>
                    </form>
                        <tr><td>
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(!empty($_POST['url'])){
                                        $url = $_POST['url'];
                                        
                                        if(urlCheck($url) == $url){
                                            $short = randString(5);
                                            
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
    			<p>
    				Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
    			</p>
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