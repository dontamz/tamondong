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
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
							<th>Name</th>
							<th>Address</th>
							<th>Contact Number</th>
							<th>Email</th>
							<th>Date of Birth</th>
							<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php 
							$crud = new Crud();
							$result = $crud->retrieve_all();
							
							while($value = mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>".$value['name']."</td>";
								echo "<td>".$value['address']."</td>";
								echo "<td>".$value['contact_number']."</td>";    
								echo "<td>".$value['email']."</td>";    
								echo "<td>".date('m/d/Y', strtotime($value['birthday']))."</td>"; 
								echo "<td>
										<div class='btn-group'>
											<a class='btn btn-small' href='edit.php?id=".$value['id']."'><i class='icon-edit'></i> Edit</a>
											<a class='btn btn-small' href='delete.php?id=".$value['id']."' onClick=\"return confirm('Are you sure you want to delete this record?')\"><i class='icon-trash'></i> Delete</a>
										</div>
									</td>";
								echo "</tr>";
							}
						?>
                    </tbody>
                </table>
                <div class="row-fluid">
                    <a href="add.php" class="btn"><i class="icon-plus"></i> Add Record</a>
                </div>
            </section>
            <footer class="row show-grid">
                <div class="footer-text span12">
                    Copyright &copy; 2012 Sourcefit Philippines. All rights reserved
                </div>
            </footer>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>