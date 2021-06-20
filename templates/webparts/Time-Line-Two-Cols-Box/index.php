<!--
Name: Time-Line Box (2 Cols)
-->
<div class="container page_container">
    <div class="row">
        <div class="col-sm-12 col-md-12">

            <div class="history-2">
                <div class="timeline__item">
                    <div class="media">
                        <img class="img-responsive <?= $Core->Editable() ?>" src="<?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "{$assets}website/images/history-2.jpg") ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="img" data-width="600" data-height="400">
                    </div>
                    <div class="aksen"></div>
                    <div class="text">
                        <div class="year  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "1983") ?></div>
                        <div class="title  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Smells Racy Free Announcing") ?></div>
                        <p class=" <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "This was the time when we started our company. We had no idea how far we would go, we werenâ€™t even sure that we would be able to survive for a few years. What drove us to start the company was the understanding that we could provide a service no one else was providing.") ?></p>
                    </div>
                </div>
            </div>


        </div>
    </div>


</div>