<main class="main-content">
    <!-- Best Seller Products -->


    <section class="best-seller tc-padding">
      <div class="container">
        <!-- Best Seller Slider -->


        <div class="best-seller-slider">
          <!-- Product Box -->

          <?php foreach ($entryData as $entry): ?>

            <div class="item">
              <div class="product-box">
                <div class="product-img">
                  <img alt="" src="<?php echo base_url('images/Post/'.$entry->directory.'/'.$entry->image) ?>"> <span class="sale-bacth <?php echo $entry->class ?>"><i class="fa fa-2x fa-<?php echo $entry->class ?>"></i></span>
                </div>


                <div class="product-detail">
                  <span><?php if(isset($entry->tags))echo $entry->tags ?></span>

                  <h5><a class="item-click" data-target="<?php echo base_url('index.php/'.$entry->directory.'/getData/'.$entry->id) ?>"><?php echo $entry->title ?></a>
                  </h5>


                  <p><?php echo limit_to_numwords($entry->summary, 15) ?></p>


                  <div class="rating-nd-price">
                    <ul class="rating-stars">
                      <?php
                        $rat = (int)$entry->rating;
                        $zero = 10-$rat;
                        while($rat > 1){
                          echo '<li><i class="fa fa-star"></i></li>';
                          $rat -= 2;
                        }

                        if($rat == 1) echo '<li><i class="fa fa-star-half-o"></i></li>';

                        while($zero > 1){
                          echo '<li><i class="fa fa-star-o"></i></li>';
                          $zero -= 2;
                        }
                      ?>
                    </ul>
                  </div>


                  <div class="aurthor-detail">
                    <a class="add-wish" href="index.html#"><i class="fa fa-heart"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <!-- Product Box -->
        </div>
        <!-- Best Seller Slider -->
      </div>
    </section>
    <!-- Best Seller Products -->
  </main>
  <div class="page-content">
    <div class="page-wrapper">
      <div class="col-sm-4 col-md-3 col-lg-2 side">
        <img src="images/best-seller/img-01.jpg">

        <div class="detail">
          <span class="tags">Novel</span>

          <h1 class="roboto-slab">Beer Festival</h1>


          <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
        </div>
        <span class="post-label"><i></i></span>
      </div>


      <div class="col-sm-8 col-md-9 col-lg-10 pull-right content">
        
      </div>
    </div>
  </div>