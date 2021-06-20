
<!--
Name: Infomation & Image Box
-->
<div class="section  <?= ($i == 1) ? 'overlap' : '' ?> feature">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <img class="<?= $Core->Editable( ) ?> img-responsive" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="img" data-height="500" data-width="800" src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "{$assets}website/images/blog-2.jpg") ?>">
            </div>
            <div class="col-sm-6 col-md-6">
                <h3 class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "We are providing good services to our valuable customers Purchase.") ?></h3>
                <p class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.") ?></p>
                <div class="margin-bottom-20"></div>
                <blockquote>
                    <p class=" <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "Petro Industrial Template continues to grow ever day thanks to the confidence our clients have in us. We cover many industries such as oil gas, energy, business services, consumer products.") ?></p>
                </blockquote>
            </div>
        </div>
    </div>
</div>
