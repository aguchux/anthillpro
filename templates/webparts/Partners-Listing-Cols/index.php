<!--
Name: Brands & Partners Listing
-->

<div class="container page__container">

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="box-partner">
				<!-- item 1 -->
				<div class="item">
					<div class="box-image">
						<div class="client-img">
							<a><img src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "{$assets}website/images/partners-1.png") ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="img" class="img-responsive <?= $Core->Editable() ?>" data-width="205" data-height="50"></a>
						</div>
					</div>
					<div class="box-info">
						<div class="heading <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "Pestco") ?></div>
						<p class="<?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.") ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>