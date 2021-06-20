<!--
Name: CEO Feature Box
-->

<div class="section section-border bglight">
	<div class="container">
		<div class="row">

			<div class="col-sm-5 col-md-5">
				<div class="director-image">
					<div class="director-image-title <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "HEAD OF OPERATIONS") ?></div>
					<img class="<?= $Core->Editable() ?> w-100" src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "{$assets}website/images/director.png") ?>" data-height="676" data-width="580" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="img">
				</div>
			</div>


			<div class="col-sm-7 col-md-7">
				<h3 class="director-title  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Peter White") ?></h3>
				<div class="director-position mt-2  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "HEAD OF OPERATIONS") ?></div>
				<div class="my-3"></div>
				<p class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.") ?></p>
				<blockquote class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="html">
					<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "Petro Industrial Template continues to grow ever day thanks to the confidence our clients have in us. We cover many industries such as oil gas, energy, business services, consumer products.") ?>
				</blockquote>
				<div class="my-3"></div>
				<p class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-7" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 7, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.") ?></p>

			</div>

		</div>
	</div>
</div>