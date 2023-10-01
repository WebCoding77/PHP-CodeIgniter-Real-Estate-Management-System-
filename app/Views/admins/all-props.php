<?= $this->extend('layouts/admin.php'); ?>
<?= $this->section('content'); ?>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                <?php if(session()->getFlashdata('create')) : ?>
                  <p class="alert alert-success"><?= session()->getFlashdata('create'); ?></p>
                <?php endif; ?>

                <?php if(session()->getFlashdata('insertgallery')) : ?>
                  <p class="alert alert-success"><?= session()->getFlashdata('insertgallery'); ?></p>
                <?php endif; ?>

                
                <?php if(session()->getFlashdata('delete')) : ?>
                  <p class="alert alert-success"><?= session()->getFlashdata('delete'); ?></p>
                <?php endif; ?>

                
              <h5 class="card-title mb-4 d-inline">Properties</h5>
              <a href="<?= url_to('props.create'); ?>" class="btn btn-primary mb-4 text-center float-right ">Create Properties</a>
              <a href="<?= url_to('gallery.create'); ?>" class="btn btn-primary mb-4 text-center float-right mr-5">Create Gallery</a>

              <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">home type</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($allProps as $prop) : ?>
                        <tr>
                            <th scope="row"><?= $prop['id'] ?></th>
                            <td><?= $prop['name'] ?></td>
                            <td>$<?= $prop['price'] ?></td>
                            <td><?= $prop['home_type'] ?></td>
                            <td><a href="<?= url_to('props.delete', $prop['id']); ?>" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                   
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?= $this->endsection(); ?>     