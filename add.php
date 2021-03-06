<?php
	include("includes/Crud.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Web Developer Exam | Sourcefit Philippines</title>
        <meta charset="utf-8">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/sourcefit.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Employee Database</h1>
            </header>
            <section id="content">
                <a class="btn" href="index.php"><i class="icon-arrow-left"></i> Back to list</a>
                <form name="add" id="add" method="post" action="add.php" class="form-horizontal">
                    <fieldset>
                        <legend>Add Record</legend>
						
						<?php
							$crud = new Crud();
							$crud->add();
						?>
						
                        <div class="control-group">
                            <label class="control-label" for="name">Name</label>
                            <div class="controls">
                                <input type="text" id="name" name="name">
                            </div>
                        </div>                
                        <div class="control-group">
                            <label class="control-label" for="address">Address</label>
                            <div class="controls">
                                <textarea id="address" name="address"></textarea>
                            </div>
                        </div>                
                        <div class="control-group">
                            <label class="control-label" for="contact_number">Contact Number</label>
                            <div class="controls">
                                <input type="text" id="contact_number" name="contact_number">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email</label>
                            <div class="controls">
                                <input type="email" id="email" name="email">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="birthday">Date of Birth</label>
                            <div class="controls">
                                <input type="text" id="birthday" name="birthday" pattern=".{10,}" placeholder="mm/dd/yyyy">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <input type="submit" name="submit" id="add" value="Add" class="btn btn-primary btn-large">
                    </div>
					
                </form>
				<!--Cangco  -->
				<?php
					/*
					$name = $_POST['name'];
					$address = $_POST['address'];
					$contact = $_POST['contact'];
					$email = $_POST['email'];
					$bday = $_POST['birthday'];
					
					if($_POST['add'])
					{
						echo $name;
					}
					
					*/
					
				?>
				
            </section>
            <footer class="row show-grid">
                <div class="footer-text span12">
                    Copyright &copy; 2012 Sourcefit Philippines. All rights reserved
                </div>
            </footer>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mask.min.js"></script>
    </body>
</html>

<script>
	$('#birthday').mask('00/00/0000');
</script>