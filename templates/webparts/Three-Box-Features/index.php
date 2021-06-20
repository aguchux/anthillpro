<!--
Name: Three Boxes Features
-->
<!-- ABOUT FEATURE -->

<div class="section  <?= ($i == 1) ? 'overlap' : '' ?>">
	<div class="container">

		<div class="row ">
			<div class="col-sm-4 col-md-4">
				<!-- BOX 1 -->
				<div class="box-icon-2">
					<div class="body-content">
						<div class="heading  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "QUALITY DRIVEN") ?></div>
						<div class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.") ?></div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
				<!-- BOX 2 -->
				<div class="box-icon-2">
					<div class="body-content">
						<div class="heading  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "CUSTOMER FOCUSED") ?></div>
						<div class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.") ?></div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
				<!-- BOX 3 -->
				<div class="box-icon-2">
					<div class="body-content">
						<div class="heading  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "GLOBAL SOURCING") ?></div>
						<div class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.") ?></span>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>