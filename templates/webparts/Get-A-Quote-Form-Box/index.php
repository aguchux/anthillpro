<!-- Contact -->
<!--
Name: Get A Quote Box
-->
<div class="section contact <?= ($i == 1) ? 'overlap' : '' ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-md-push-8">


                <div class="widget download">
                    <a href="<?= $Core->getSiteInfo("Brochure-PDF-Download-Link") ?>" class="btn btn-secondary btn-block btn-sidebar"><span class="fa  fa-file-pdf-o"></span><?= $Core->getSiteInfo("Brochure-Download-Title") ?></a>
                </div>

                <div class="widget contact-info-sidebar">
                    <div class="widget-title <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-1" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 1, "Contact Info") ?></div>
                    <ul class="list-info">
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-2" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 2, "99 S.t Jomblo Park Pekanbaru 28292. Indonesia") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-3" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 3, "(0761) 654-123987") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-envelope"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-4" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 4, "info@yoursite.com") ?></div>
                        </li>
                        <li>
                            <div class="info-icon">
                                <span class="fa fa-clock-o"></span>
                            </div>
                            <div class="info-text <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-5" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 5, "Mon - Sat 09:00 - 17:00") ?></div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-8 col-md-8 col-md-pull-4">
                <div class="content">
                    <p class="section-heading-3 <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-6" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 6, "Suspendisse est nunc mollis id elit ac efficitur rutrum mauris. Pellentesque ut orci ac leo dictum viverra ac ac turpis.") ?></p>
                    <div class="margin-bottom-30"></div>
                    <h3 class="section-heading-2 <?= $Core->Editable( ) ?>" id="<?= "{$PageInfo->pageid}-{$page_part->id}-7" ?>" data-type="text"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 7, "Contact Details") ?></h3>
                    <form action="/forms/getaquote" class="form-contact" id="contactForm" data-toggle="validator" novalidate="true" method="POST">

                        <?php if (isset($_REQUEST['done'])) : ?>
                            <div class="help-block with-errors alert alert-success"> Thank you :We will get back to you.</div>
                        <?php endif; ?>

                        <div class="form-group">
                            <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Full Name..." required="">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="p_department" name="p_department">
                                <option>Mechanical Engineering</option>
                                <option>Oil and Lubricants</option>
                                <option>Chemical Research</option>
                                <option>Agricultural Processing</option>
                                <option>Power and Energy</option>
                                <option>Material Engineering</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="p_email" name="p_email" placeholder="Enter Address..." required="">
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
                    </form>
                    <div class="margin-bottom-50"></div>
                    <p><em class="editable" id="<?= "{$PageInfo->pageid}-{$page_part->id}-8" ?>" data-type="html"><?= $Core->getCMS($PageInfo->pageid, $page_part->id, 8, "Note: Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.") ?></em></p>
                </div>
            </div>

        </div>

    </div>
</div>