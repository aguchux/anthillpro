<!--
Name: Title Devider
-->
    <div class="container page__container mt-30pt">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2 class="section-heading  <?= $Core->Editable( ) ?> <?= ($i == 1) ? 'overlap' : '' ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "TIMELINE HISTORY") ?></h2>
            </div>
        </div>
    </div>
