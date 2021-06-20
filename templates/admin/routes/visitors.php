<div class="container-fluid">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Website Visitors</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>IP</th>
                                <th>OS</th>
                                <th>BROWSER</th>
                                <th>DEVICE</th>
                            </tr>
                        </thead>
                        <tbody>

                            <? while ($activity = mysqli_fetch_object($Activities)) : ?>
                                <tr>
                                    <td><?= $activity->id; ?></td>
                                    <td><?= $activity->created; ?></td>
                                    <td><?= $activity->ipaddr ?></td>
                                    <td><?= $activity->osystem ?></td>
                                    <td><?= $activity->browser; ?></td>
                                    <td><?= $activity->tidevicetle; ?></td>
                                </tr>
                            <? endwhile; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>IP</th>
                                <th>OS</th>
                                <th>BROWSER</th>
                                <th>DEVICE</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>