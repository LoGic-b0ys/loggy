<span class="rating pull-right"><i class="fa fa-2x fa-star"></i> <strong><?php echo $res->rating ?></strong></span>

<h2>Information</h2>


<ul>
  <li><span>Language</span>: <?php echo $res->language ?></li>

  <li><span>Realease Date</span>: <?php echo $res->realease ?></li>

  <li><span>Author</span>: <?php echo $res->author ?></li>

  <li><span>Publisher</span>: <?php echo $res->publisher ?></li>
</ul>


<!-- <h2>Quote</h2>


<div class="quote">
  <blockquote>
    Being cool is being your own self, not doing something that someone else is telling you to do <span>Logic Boys</span>
  </blockquote>
</div> -->


<h2>Summary</h2>


<div>
  <?php echo $res->summary ?>
</div>