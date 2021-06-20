<!-- ABOUT FEATURE -->
<!--
Name: Multi-Column Combo Box
-->
<div class="section  <?= ($i == 1) ? 'overlap' : '' ?> feature">
	<div class="container">

		<div class="row">

			<div class="col-sm-4 col-md-4">
				<!-- BOX 1 -->
				<div class="box-icon-2">
					<div class="icon">
						<div class="fa fa-star-o"></div>
					</div>
					<div class="body-content">
						<div class="heading  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "QUALITY DRIVEN") ?></div>
						<span class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.") ?></span>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
				<!-- BOX 2 -->
				<div class="box-icon-2">
					<div class="icon">
						<div class="fa fa-umbrella"></div>
					</div>
					<div class="body-content">
						<div class="heading  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "CUSTOMER FOCUSED") ?></div>
						<span class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.") ?></span>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
				<!-- BOX 3 -->
				<div class="box-icon-2">
					<div class="icon">
						<div class="fa fa-users"></div>
					</div>
					<div class="body-content">
						<div class="heading  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "GLOBAL SOURCING") ?></div>
						<span class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.") ?></span>
					</div>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12">
				<h2 class="section-heading  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-7" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 7, "COMPANY OVERVIEW") ?></h2>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-5 col-md-5">
				<div class="jumbo-heading">
					<h2 class="<?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-8" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 8, "OUR REAL COMMITMENT REACHES BEYOND GAS &amp; OIL COMPANY.") ?></h2>
					<span class="fa fa-paper-plane-o"></span>
				</div>
			</div>
			<div class="col-sm-7 col-md-7">
				<p class="lead <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-91" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 91, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.") ?></p>
				<p class="<?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-10" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 10, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.") ?></p>
			</div>

		</div>

	</div>
</div>