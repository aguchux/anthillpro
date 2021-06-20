<!--
Name: Our Team Box
-->
<div class="container page__container my-0">
	<div class="row">

		<div class="col-sm-6 col-md-6">
			<div class="box-team">
				<div class="box-image">
					<div class="sosmed">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-skype"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
					<img class=" <?= $Core->Editable() ?>" src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "{$assets}website/images/team-1.jpg") ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="img" data-width="465" data-height="465">
				</div>
				<div class="body-content">
					<div class="people  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Rome Doel") ?></div>
					<div class="position  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "Technical Head, Refineries") ?></div>
					<div class="excert  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.") ?></div>
					<div class="phone">
						<span class="fa fa-phone"></span><span class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "654-123987") ?></span>
					</div>
				</div>
			</div>
		</div>


		<div class="col-sm-6 col-md-6">
			<div class="box-team">
				<div class="box-image">
					<div class="sosmed">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-skype"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
					<img class=" <?= $Core->Editable() ?>" src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 7, "{$assets}website/images/team-1.jpg") ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-7" ?>" data-type="img" data-width="465" data-height="465">
				</div>
				<div class="body-content">
					<div class="people  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-8" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 8, "Rome Doel") ?></div>
					<div class="position  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-9" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 9, "Technical Head, Refineries") ?></div>
					<div class="excert  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-10" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 10, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.") ?></div>
					<div class="phone">
						<span class="fa fa-phone"></span><span class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-11" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 11, "654-123987") ?></span>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>