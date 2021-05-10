<?= $this->extend('layouts/public-layout') ?>
<?= $this->section('title') ?>
	Simantu - Sistem Manajemen Tugas
<?= $this->endSection() ?>
<?= $this->section('stack-style') ?>
	<style>
		body{
			background-image: url('assets/img/charles-retrospective-unsplash.jpg');
			background-size: cover;
			height: 100vh;
			background-position: top center;
			background-repeat: no-repeat;
		}

		body::before{
			content: '';
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, .85);
			display: block;
			position: absolute;
			z-index: -1;
		}

		.simantu-header{
			height: calc(100vh - 92px);
			display: flex;
		}
	</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<header class="simantu-header">
	<div class="container mt-auto">
		<div id="banner" class="mb-5">
			<h1 class="font-bold font-display">simantu.</h1>
			<p class="mb-0">/si-man-tu/</p>
			<p class="mb-0"><strong>Sistem Manajemen Tugas</strong></p>
			<p>Untuk kamu yang "gedek" sama tugas kampus karena ga ada notifikasi tugas baru.</p>
			<div class="d-flex align-items-center mt-4 mb-4">
				<a href="#" class="btn btn-light btn-mod">Daftar sekarang</a>
				<span class="mx-2 font-bold">Atau</span>
				<a href="#" class="btn btn-outline-light btn-mod-outline">Masuk</a>
			</div>
		</div>
	</div>
</header>
<?= $this->endSection() ?>