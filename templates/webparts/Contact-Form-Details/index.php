<!--
Name: Contact Form Box
-->

<div class="page-section">

    <div class="container page__container">

        <div class="row">

            <div class="col-sm-8 col-md-8 col-md-pull-4">
                <div class="content">

                    <p class="section-heading-3  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "Suspendisse est nunc mollis id elit ac efficitur rutrum mauris. Pellentesque ut orci ac leo dictum viverra ac ac turpis.") ?></p>
                    <div class="margin-bottom-30"></div>
                    <h3 class="section-heading-2  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-7" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 7, "Contact Details") ?></h3>

                    <?php if (!$page_part->id) : ?>
                        <form action="/contactus/<?= $PageInfo->pageid ?>" class="form-contact" id="contactForm" data-toggle="validator" novalidate="true" method="POST">
                    <?php endif; ?>

                        <?php if (isset($_REQUEST['done'])) : ?>
                            <div class="help-block with-errors alert alert-success">Thank you :We will get back to you.</div>
                        <?php endif; ?>

                        <div class="form-group">
                            <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Full Name...">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="p_email" name="p_email" placeholder="Enter Address...">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="p_subject" name="p_subject" placeholder="Subject...">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea id="p_message" name="p_message" class="form-control" rows="6" placeholder="Write message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-secondary" style="pointer-events: all; cursor: pointer;">CONTACT US: ASK A QUOTE</button>
                        </div>

                    <?php if (!$page_part->id) : ?>
                        </form>
                    <?php endif; ?>

                    <div class="margin-bottom-50"></div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-md-push-8">

                <div class="widget contact-info-sidebar">
                    <div class="widget-title  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "Contact Info") ?></div>
                    <ul class="list-info">
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="info-text  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "99 S.t Jomblo Park Pekanbaru 28292. Indonesia") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="info-text  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "(0761) 654-123987") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="info-text  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "info@yoursite.com") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-clock-o"></span>
                            </div>
                            <div class="info-text  <?= $Core->Editable() ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "Mon - Sat 09:00 - 17:00") ?></div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>
