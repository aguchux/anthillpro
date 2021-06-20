<div class="container-fluid">
   <div class="col-xl-12 col-12">
      <div class="card">
         <div class="card-header">
            <h4 class="card-title">All Pages</h4>
            <a type="button" href="/admin/add-page" class="btn btn-rounded btn-info float-right btn-md"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i></span>Create Page</a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="example" class="display" style="min-width: 845px">
                  <thead>
                     <tr>


                        <th>ID</th>
                        <th>NAME(sort)</th>
                        <th>MENU</th>
                        <th>TITLE</th>
                        <th>WEBPARTS</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>

                     </tr>
                  </thead>
                  <tbody>

                     <? while ($pg = mysqli_fetch_object($pages)) : ?>
                        <tr>
                           <td><?= $pg->pageid; ?></td>
                           <td><?= $pg->shortname ?> (<b><?= $pg->sort ?></b>)</td>
                           <td><?= $pg->menutitle . '(' . $pg->sort . ')'; ?></td>
                           <td><?= $pg->title; ?></td>
                           <td><?= $Core->CountWebParts($pg->pageid) ?></td>
                           <td>
                              <div class="d-flex">
                                 <a href="/admin/edit-page/page/<?= $pg->pageid; ?>/<?= $pg->shortname; ?>" class="btn btn-success shadow btn-xs  mr-1"><i class="fa fa-pencil"></i> Edit</a>
                                 <a href="/admin/page-webparts/page/<?= $pg->pageid; ?>/<?= $pg->shortname; ?>" class="btn btn-primary shadow btn-xs  mr-1"><i class="fa fa-globe"></i> Webparts</a>
                                 <a href="/editor/page/<?= $pg->pageid; ?>" class="btn btn-warning shadow btn-xs  mr-1"><i class="fa fa-pencil"></i> CMS</a>
                                 <a href="/admin/delete-page/page/<?= $pg->pageid; ?>/<?= $pg->shortname; ?>" class="btn btn-danger shadow btn-xs"><i class="fa fa-trash"></i> Delete</a>
                              </div>
                           </td>

                        </tr>
                     <? endwhile; ?>

                  </tbody>
                  <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>NAME(sort)</th>
                        <th>MENU</th>
                        <th>TITLE</th>
                        <th>WEBPARTS</th>
                        <th><i class="fa fa-pencil" aria-hidden="true"></i></th>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>