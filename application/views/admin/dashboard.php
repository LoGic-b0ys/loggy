  <main class="main-content container">
    <div class="page-header">
      <h1>Dashboard <small class="roboto-light">Let's get a quick overview...</small></h1>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-3">
        <div class="panel panel-default clearfix dashboard-stats rounded">
          <span class="sparkline transit">
            <h4 class="roboto-slab">
              <?php echo $lastVideo->title ?>
            </h4>
            <span class="text-red">
              Rated <?php echo $lastVideo->rating ?>
            </span>
          </span>

          <i class="fa fa-film bg-red transit stats-icon"></i>

          <h3 class="roboto-slab transit"><?php echo $statVideo->video ?> title</h3>


          <p class="text-muted transit">Last Month Movies</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="panel panel-default clearfix dashboard-stats rounded">
          <span class="sparkline transit">
            <h4 class="roboto-slab">
              <?php echo $lastBook->title ?>
            </h4>
            <span class="text-blue">
              Rated <?php echo $lastBook->rating ?>
            </span>
          </span>

          <i class="fa fa-book bg-blue transit stats-icon"></i>

          <h3 class="roboto-slab transit"><?php echo $statBook->book ?> books</h3>


          <p class="text-muted transit">Last Month Book</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="panel panel-default clearfix dashboard-stats rounded">
          <span class="sparkline transit">
            <h4 class="roboto-slab">
              <?php echo $lastMusic->title ?>
            </h4>
            <span class="text-yellow">
              Rated <?php echo $lastMusic->rating ?>
            </span>
          </span>

          <i class="fa fa-film bg-yellow transit stats-icon"></i>

          <h3 class="roboto-slab transit"><?php echo $statMusic->music ?> songs</h3>


          <p class="text-muted transit">Last Music Added</p>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading clean">
            Recent Watched Statistics
          </div>


          <div class="panel-body">
            <div id="splineArea-chart" style="height:280px;">
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading clean">
            Recent Activities
          </div>


          <div class="panel-body">
            <?php foreach ($entryData as $entry): ?>

              <h5 class="rec-active <?php echo $entry->class ?>"><a href="#"><i class="fa fa-<?php  echo $entry->class?>"></i><strong><?php echo $entry->title ?></strong></a>
              </h5>


              <p><small>Rated : <?php echo $entry->rating ?></small>
              </p>

              <hr>

            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </main>