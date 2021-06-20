<!--
Name: Titled Text Area (1 col)
-->
<div class="section why">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="h2 <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "About Company") ?></div>
                <p class="editable" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.") ?></p>
            </div>
        </div>
    </div>
</div>
