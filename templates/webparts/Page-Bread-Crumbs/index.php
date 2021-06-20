<!--
Name: Page Bread Crumbs
-->
<!-- Team -->
<!-- BANNER -->
<?php $MainMenu = $Core->PageInfo($menukey); ?>

<div class="mdk-box mdk-box--bg-gradient-primary bg-dark js-mdk-box mb-0" data-effects="parallax-background blend-background">
	<div class="mdk-box__bg">
		<div class="mdk-box__bg-front" style="background-image: url('<?= $assets ?>images/1280_15ntkpxqt54y-sai-kiran-anagani.jpg');"></div>
	</div>
	<div class="mdk-box__content">
		<div class="hero container page__container py-20pt py-md-20pt text-center text-sm-left">
			<h2 class="text-white mb-24pt"><?= $PageInfo->title ?></h2>
			<p class="lead measure-hero-lead text-white mb-24pt small"><?= $MainMenu->menutitle  ?> / <?= $PageInfo->menutitle ?></p>
		</div>
	</div>
</div>
