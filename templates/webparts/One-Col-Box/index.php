<!--
Name: One Columns Box
-->

<div class="section feature">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="jumbo-heading">
					<h2 class="section-heading mb-2 pt-2 <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "Sample Heading") ?></h2>
					<p class="lead mt-0 pt-0 <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.") ?></p>
				</div>
			</div>
		</div>
	</div>
</div>