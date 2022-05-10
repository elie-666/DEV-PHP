<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<div class="container">
    <div class="row">
	<div class="container">
	<div class="post-content">
	<div class="post-container">
	<button data-toggle='modal' data-target='#exampleModal' class="btn btn-primary"><i class="fa fa-picture-o"></i> Publier un article</button>
	<form method="post">
	<button type="submit" onclick="return confirm('Êtes-vous sûrs?');" name="Logout">Deconnexion (<?php echo $_SESSION["name"]?>)</button> 
	</form>
	<?php $obj=new Affiche(); $obj->afficherArticle();?>
	</div>
</div>
</form>
	<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
	<div class='modal-content'>
	<div class='modal-body'>
	<div class="form-group">
	<button type='button' class='close' data-dismiss='modal' arial-label='Close'>
	<span aria-hidden='true'>&times;</span>
	</button>
	<h3><img src='../public/img/images.jpg' class='profile-photo-sm'><?php echo $_SESSION["name"]?></h3>
	<h4>Publier quelque chose</h4>
	<form action="" method="post" enctype="multipart/form-data">
	<textarea type="text" name="contenu" placeholder="commencer à écrire..." class="form-control col-xs-12" row="70" cols="50" ></textarea>
	<input type="file" name="photo" class="form-control" >
	<button type="submit" name='Publier'
	    value="Export to Excel" class="btn btn-info">Publier</button>
	<button type='button' class='btn btn-danger' data-dismiss='modal' arial-label='Close'>Annulee
	</button>
	</form>
</body>
</html>
