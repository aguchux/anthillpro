<!--
Name: Wide Photo Banner
-->


	<div class="container page__container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<h2 class="section-heading <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "COMPANY OVERVIEW") ?></h2>
				<img class="<?= $Core->Editable(  ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="img" src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "{$assets}website/images/banner-page.jpg") ?>" data-width="900" data-height="5300">
			</div>
		</div>
	</div>
