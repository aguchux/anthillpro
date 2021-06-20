
<!--
Name: Dynamic News Box
-->
<?php $MediaNews = $Core->Articles() ?>

<div class="section why">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-md-push-8">
                <div class="widget text">
                    <div class="widget-title <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "About Company") ?></div>
                    <p class="editable" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.") ?></p>
                </div>
                <div class="widget contact-info-sidebar">
                    <div class="widget-title <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "Contact Info") ?></div>
                    <ul class="list-info">
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "99 S.t Jomblo Park Pekanbaru 28292. Indonesia") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "(0761) 654-123987") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "info@yoursite.com") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-clock-o"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-7" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 7, "Mon - Sat 09:00 - 17:00") ?></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 col-md-pull-4">
                <div class="row list-news">
                    <?php while ($mnews = mysqli_fetch_object($MediaNews)) : ?>
                        <div class="news-item">
                            <div class="image">
                                <a href="/news/<?= $mnews->slug ?>" title="<?= $mnews->title ?>">
                                    <img src="<?= $mnews->page_photo ?>" alt="<?= $mnews->title ?>" class="img-responsive" data-width="760" data-height="507">
                                </a>
                            </div>
                            <h2 class="blok-title">
                                <a href="/news/<?= $mnews->slug ?>" title="<?= $mnews->title ?>"><?= $mnews->title ?></a>
                            </h2>
                            <div class="meta">
                                <div class="meta-date"><i class="fa fa-clock-o"></i> <?= date("F j, Y", strtotime($mnews->created)) ?></div>
                                <div class="meta-author"> Posted by: <a href="#">Hilcot Admin</a></div>
                                <div class="meta-category"> Category: <a href="#">Industry</a>, <a href="#">Oil & Gas</a>, <a href="#">Energy</a></div>
                                <div class="meta-comment"><i class="fa fa-comment-o"></i> <a href="#"><?= $mnews->views ?> Views</a></div>
                            </div>
                            <p><?= substr( strip_tags($mnews->contents),0,120 ) ?>...</p>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <ul class="pagination">
                            <li><a href="#">.</a></li>
                            <li><a href="#">.</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">.</a></li>
                            <li><a href="#">.</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>