<?= $this->extend('layouts/app.php'); ?>
<?= $this->section('content'); ?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('public/assets/images/hero_bg_2.jpg')?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
            <h1 class="mb-2"><?= $singleProps['name']; ?></h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?= $singleProps['price']; ?></strong></p>
          </div>
        </div>
      </div>
    </div>

    

    <div class="site-section site-section-sm">
      <div class="container">
        <?php if(session()->getFlashdata('sent')) : ?>
           <p class="alert alert-success"><?= session()->getFlashdata('sent'); ?></p>
         <?php endif; ?>

         <?php if(session()->getFlashdata('save')) : ?>
           <p class="alert alert-success"><?= session()->getFlashdata('save'); ?></p>
         <?php endif; ?>
        <div class="row">
          <div class="col-lg-8">
            <div>
              <div class="slide-one-item home-slider owl-carousel">
                <?php foreach($images as $image) : ?>
                    <div><img src="<?= base_url('public/assets/gallery/'.$image->image.'')?>" alt="Image" class="img-fluid"></div>
                    
                <?php endforeach; ?>
              </div>
            </div>
            <div class="bg-white property-body border-bottom border-left border-right">
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3">$<?= $singleProps['price']; ?></strong>
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number"><?= $singleProps['num_beds']; ?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number"><?= $singleProps['num_baths']; ?></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number"><?= $singleProps['sq_ft']; ?></span>
                    
                  </li>
                </ul>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                  <strong class="d-block"><?= $singleProps['home_type']; ?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                  <strong class="d-block"><?= $singleProps['year_built']; ?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                  <strong class="d-block">$<?= $singleProps['price_sq_ft']; ?></strong>
                </div>
              </div>
              <h2 class="h4 text-black">More Info</h2>
              <p>
                 <?= $singleProps['description']; ?>
              </p>
             
              <div class="row no-gutters mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3">Gallery</h2>
                </div>
                <?php foreach($images as $image) : ?>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                    <a href="<?= base_url('public/assets/gallery/'.$image->image.''); ?>" class="image-popup gal-item"><img src="<?= base_url('public/assets/images/'.$image->image.''); ?>" alt="Image" class="img-fluid"></a>
                    </div>
                <?php endforeach; ?>
               
              </div>
            </div>
          </div>
          <div class="col-lg-4">

            <div class="bg-white widget border rounded">

              <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
              <?php if(isset(auth()->user()->id)) : ?>

                <?php if($checkingSendingRequests > 0) : ?>
                  <p class="alert alert-success">You sent a request to this property</p>
                <?php else : ?>  
                  <form method="POST" action="<?= url_to('send.request', $singleProps['id'])?>" class="form-contact-agent">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['name'] ?>" name="prop_name" id="phone" class="form-control">
                    </div>  
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['image'] ?>" name="prop_image" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['location'] ?>" name="prop_location" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['price'] ?>" name="prop_price" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" id="phone" class="btn btn-primary" value="Send Request">
                    </div>
                  </form>
                <?php endif; ?>

              <?php else: ?>
                
                <p class="alert alert-success">Login to send a contact the agent about this property</p>
              
              <?php endif; ?>
            </div>


            <div class="bg-white widget border rounded">

              <h3 class="h4 text-black widget-title mb-3">Save Property</h3>

              <?php if(isset(auth()->user()->id)) : ?>

                <?php if($checkingSavedProps > 0) : ?>
                  <p class="alert alert-success">You saved this property</p>
                <?php else : ?>  
                  <form method="POST" action="<?= url_to('save.prop', $singleProps['id'])?>" class="form-contact-agent">
                    
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['name'] ?>" name="prop_name" id="phone" class="form-control">
                    </div>  
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['image'] ?>" name="prop_image" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['location'] ?>" name="prop_location" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="<?= $singleProps['price'] ?>" name="prop_price" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" id="phone" class="btn btn-primary" value="Save Property">
                    </div>
                  </form>
                <?php endif; ?>
              <?php else: ?>
                
                <p class="alert alert-success">Login to save this property</p>
              
              <?php endif; ?>
            </div>

            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3 ml-0">Properties Home Types</h3>
                  <div class="px-3" style="margin-left: -15px;">
                    <?php foreach($allHomeTypes as $homeType) : ?>
                      <a href="<?= url_to('props.home.type', $homeType['name']); ?>" class="pt-3 pb-3 pr-3 pl-0 d-block"><?= $homeType['name']; ?></a>
                    <?php endforeach; ?>
                   
                  </div>            
            </div>

            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                  <div class="px-3" style="margin-left: -15px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= url_to('prop.single', $singleProps['id']); ?>&quote=<?= $singleProps['name']; ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                    <a  href="https://twitter.com/intent/tweet?text=<?= $singleProps['name']; ?>&url=<?= url_to('prop.single', $singleProps['id']); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= url_to('prop.single', $singleProps['id']); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>    
                  </div>            
            </div>

          </div>
          
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2>Related Properties</h2>
            </div>
          </div>
        </div>
      
        <div class="row mb-5">
            <?php foreach($relatedProps as $prop) : ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                    <a href="<?= url_to('prop.single', $prop->id); ?>" class="property-thumbnail">
                        <div class="offer-type-wrap">
                        <span class="offer-type bg-danger"><?= $prop->type; ?></span>
                        </div>
                        <img src="<?= base_url('public/assets/images/'.$prop->image.'')?>" alt="Image" class="img-fluid">
                    </a>
                    <div class="p-4 property-body">
                        <h2 class="property-title"><a href="<?= url_to('prop.single', $prop->id); ?>"><?= $prop->name; ?></a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?= $prop->location; ?></span>
                        <strong class="property-price text-primary mb-3 d-block text-success">$<?= $prop->price; ?></strong>
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                        <li>
                            <span class="property-specs">Beds</span>
                            <span class="property-specs-number"><?= $prop->num_beds; ?></span>
                            
                        </li>
                        <li>
                            <span class="property-specs">Baths</span>
                            <span class="property-specs-number"><?= $prop->num_baths; ?></span>
                            
                        </li>
                        <li>
                            <span class="property-specs">SQ FT</span>
                            <span class="property-specs-number"><?= $prop->sq_ft; ?></span>
                            
                        </li>
                        </ul>

                    </div>
                    </div>
                </div>
            <?php endforeach; ?>

         
        </div>
      </div>

<?= $this->endsection(); ?>     