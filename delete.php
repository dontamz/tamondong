<?php
	include_once("includes/Crud.php");
	 
	$crud = new Crud();
	 
	$id = ($_GET['id']);
	$result = $crud->delete_record($id);
	 
	if ($result) {
		header("Location:index.php");
	}
?>