<?= $this->extend('layouts/admin.php'); ?>
<?= $this->section('content'); ?>



<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                <?php if(session()->getFlashdata('create')) : ?>
                  <p class="alert alert-success"><?= session()->getFlashdata('create'); ?></p>
                <?php endif; ?>

                <?php if(session()->getFlashdata('delete')) : ?>
                   <p class="alert alert-success"><?= session()->getFlashdata('delete'); ?></p>
                <?php endif; ?>


                <?php if(session()->getFlashdata('update')) : ?>
                   <p class="alert alert-success"><?= session()->getFlashdata('update'); ?></p>
                <?php endif; ?>


                
              <h5 class="card-title mb-4 d-inline">Hometypes</h5>
              <a href="<?= url_to('home.types.create'); ?>" class="btn btn-primary mb-4 text-center float-right">Create Hometypes</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($allHomeTypes as $homeType) :  ?>
                        <tr>
                            <th scope="row"><?= $homeType['id'] ?></th>
                            <td><?= $homeType['name'] ?></td>
                            <td><a  href="<?= url_to('home.types.edit', $homeType['id']); ?>" class="btn btn-warning text-white text-center ">Update</a></td>
                            <td><a href="<?= url_to('home.types.delete', $homeType['id']); ?>" class="btn btn-danger  text-center ">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?= $this->endsection(); ?>     