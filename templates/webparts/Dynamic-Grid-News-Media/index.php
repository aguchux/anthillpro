<!--
Name: Dynamic Grid News Madia
-->
<?php $GridMediaNews = $Core->Articles() ?>


<div class="container page__container">
    <div class="row">


        <?php while ($gnews = mysqli_fetch_object($GridMediaNews)) : ?>

            <div class="col-sm-6 col-md-4">
                <!-- BOX 1 -->
                <div class="box-news-1">
                    <div class="media gbr">
                        <img src="<?= $mnews->page_photo ?>" alt="<?= $gnews->title ?>" class="img-responsive">
                    </div>
                    <div class="body">
                        <div class="title"><a href="/news/<?= $gnews->slug ?>" title="<?= $gnews->title ?>"><?= $gnews->title ?></a></div>
                        <div class="meta">
                            <span class="date"><i class="fa fa-clock-o"></i> <?= date("F j, Y", strtotime($mnews->created)) ?></span>
                            <span class="comments"><i class="fa fa-comment-o"></i> <?= $mnews->views ?> Views</span>
                        </div>
                    </div>
                </div>
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