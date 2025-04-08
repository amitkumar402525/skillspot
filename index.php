<?php require "./inc/header.php"; ?>
<?php require './functions.php'; ?>
<section class="main">
	<?php
		if($currentpage == $homepage or $currentpage == '/SkillSpot/index.php') {
			require "./pages/home.php";
		} else {
		    echo 'content';
		}
	?>
</section>

<?php require "./inc/footer.php"; ?>