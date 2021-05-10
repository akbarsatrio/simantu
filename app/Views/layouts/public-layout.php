<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $this->renderSection('title') == null ? $this->renderSection('title') : 'Simantu'; ?></title>
	<?= $this->renderSection('prepend-style') ?>
	<?= $this->include('includes/style') ?>
	<?= $this->renderSection('stack-style') ?>
	
</head>
<body>
	<main>
	<?= $this->include('includes/navbar') ?>
	<?= $this->renderSection('content') ?>
	</main>
	<?= $this->renderSection('prepend-script') ?>
	<?= $this->include('includes/script') ?>
	<?= $this->renderSection('stack-script') ?>
</body>
</html>