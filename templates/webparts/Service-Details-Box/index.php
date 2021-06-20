<!--
Name: Services Detailed Box
-->
<?php
$DServices = $Core->SubPages($Core->getSiteInfo("Services-Page"));
?>
<!-- Team -->
<div class="section why  <?= ($i == 1) ? 'overlap' : '' ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-4 col-md-push-8">
				
				<div class="widget categories">
					<ul class="category-nav">
						<?php while ($sservice = mysqli_fetch_object($DServices)) : ?>
							<li class="<?= $PageInfo->slug==$sservice->slug?'active':'' ?>"><a href="/info/<?= $sservice->slug ?>"><?= $sservice->menutitle ?></a></li>
						<?php endwhile; ?>
					</ul>
				</div>

				<div class="widget download">
					<a href="<?= $Core->getSiteInfo("Brochure-PDF-Download-Link") ?>" class="btn btn-secondary btn-block btn-sidebar"><span class="fa  fa-file-pdf-o"></span><?= $Core->getSiteInfo("Brochure-Download-Title") ?></a>
				</div>

				<div class="widget contact-info-sidebar">
					<div class="widget-title  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "Contact Info") ?></div>
					<ul class="list-info">
						<li>
							<div class="info-icon">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="info-text  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "99 S.t Jomblo Park Pekanbaru 28292. Indonesia") ?></div>
						</li>
						<li>
							<div class="info-icon">
								<span class="fa fa-phone"></span>
							</div>
							<div class="info-text  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "(0761) 654-123987") ?></div>
						</li>
						<li>
							<div class="info-icon">
								<span class="fa fa-envelope"></span>
							</div>
							<div class="info-text  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "info@yoursite.com") ?></div>
						</li>
						<li>
							<div class="info-icon">
								<span class="fa fa-clock-o"></span>
							</div>
							<div class="info-text  <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "Mon - Sat 09:00 - 17:00") ?></div>
						</li>
					</ul>
				</div>

			</div>
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="single-page">
					<img src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 11, "{$assets}website/images/service-detail-1.jpg") ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-11" ?>" data-type="img" data-height="507" data-width="760" class="img-responsive  <?= $Core->Editable( ) ?>" data-width="760" data-height="507">
					<div class="margin-bottom-30"></div>
					<h2 class="section-heading"><?= $PageInfo->title ?></h2>
					<p class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.") ?></p>
				</div>
			</div>

		</div>
	</div>
</div>