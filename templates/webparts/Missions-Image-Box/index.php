<!--
Name: Missions Image Box
-->


	<div class="section <?= ($i == 1) ? 'overlap' : '' ?> why">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">

				</div>
				<div class="col-sm-6 col-md-6">

					<h3 class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "Our Mission") ?></h3>
					<p class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "Renim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.") ?></p>
					<ul class="bull">
						<li class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Offer a broad range of cost-effective industrial solutions") ?></li>
						<li class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "Maintain a robust inventory of parts and products") ?></li>
						<li class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "Provide repair services to a diverse customer base across multiple sectors") ?></li>
						<li class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "Remain responsive to our customers’ needs") ?></li>
						<li class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-7" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 7, "Work fewer hours — and make more money") ?></li>
						<li class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-8" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 8, "Attract and retain quality, high-paying customers") ?></li>
						<li class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-9" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 9, "Manage your time so you’ll get more done in less time") ?></li>

					</ul>

				</div>
				<div class="col-sm-6 col-md-6">
					<div class="vidimg">
						<div class="play-vid">
							<a class="popup-youtube" href="<?= $Core->getSiteInfo("Youtube-Video") ?>"><span class="fa fa-play fa-3x playvid"></span></a>
						</div>
						<img id="<?= "{$PageInfo->pageid}-{$page_part->id}-10" ?>" data-type="img" src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 10, "{$assets}website/images/welcome-img.jpg ") ?>" class="img-responsive  <?= $Core->Editable( ) ?>" data-width="565" data-height="424">
					</div>
				</div>

			</div>
		</div>
	</div>