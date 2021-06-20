<div class="container-fluid">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title h1">Web Part & Builder</h4>
            </div>
            <div class="card-body">

                <div class="row g-2">
                    <?php foreach ($WebParts as $parts) :
                        if (isset($parts)) :
                            $WPHeader = $Core->WebPartHeader("./templates/webparts/{$parts}/index.php"); ?>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="card overflow-hidden bg-light" style="border: 2px solid #404CC1;">
                                    <div class="text-center p-3 overlay-box">
                                        <h3 class="mt-3 mb-1 text-white"><?= $WPHeader ?></h3>
                                        <p class="text-white mb-0"><?= $parts ?></p>
                                    </div>
                                    <img src="./templates/webparts/<?= $parts ?>/photo.jpg" class="w-100">
                                    <div class="card-footer border-0 mt-0 d-none">
                                        <button class="btn btn-primary btn-lg btn-block">Reminder Alarm</button>
                                    </div>
                                </div>
                            </div>

                    <?php
                        endif;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>