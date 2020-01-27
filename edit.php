<?php
	include("includes/Crud.php");
	
	$crud = new Crud();
	$id = $_GET['id'];
	$result = $crud->retrieve_single_data($id);
	$data = mysqli_fetch_assoc($result);
	
	
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
                <form name="edit" id="edit" method="post" action="edit.php?id=<?php echo $id; ?>" class="form-horizontal">
                    <fieldset>
                        <legend>Edit <?php echo $data['name']; ?></legend>
						
						<?php
							$crud->edit($id);
						?>
						
                        <div class="control-group">
                            <label class="control-label">ID</label>
                            <div class="controls">
                                <span class="uneditable-input">ID-<?php echo $data['id']; ?></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="name">Name</label>
                            <div class="controls">
                                <input type="text" id="name" name="name" value="<?php echo $data['name']; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="address">Address</label>
                            <div class="controls">
                                <textarea id="address" name="address"><?php echo $data['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="contact_number">Contact Number</label>
                            <div class="controls">
                                <input type="text" id="contact_number" name="contact_number" value="<?php echo $data['contact_number']; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email</label>
                            <div class="controls">
                                <input type="email" id="email" name="email" value="<?php echo $data['email']; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="birthday">Date of Birth</label>
                            <div class="controls">
                                <input type="text" id="birthday" name="birthday" pattern=".{10,}" placeholder="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime($data['birthday'])); ?>">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <input type="submit" name="edit" value="Edit" class="btn btn-primary btn-large">
                    </div>
                </form>
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