<!--
Name: Information Box (2 Cols)
-->
<div class="section  <?= ($i == 1) ? 'overlap' : '' ?> feature">
	<div class="container">

		<div class="row">
			<div class="col-sm-5 col-md-5">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading mb-0 pb-3 <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "COMPANY OVERVIEW") ?></h2>
					</div>
				</div>
				<div class="jumbo-heading mt-0">
					<h2 class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "OUR REAL COMMITMENT REACHES BEYOND GAS &amp; OIL COMPANY.") ?></h2>
					<span class="fa fa-paper-plane-o"></span>
				</div>
				<p class="lead <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.") ?></p>
			</div>
			<div class="col-sm-7 col-md-7">
				<p class="lead <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.") ?></p>
			</div>
		</div>
	</div>
</div>