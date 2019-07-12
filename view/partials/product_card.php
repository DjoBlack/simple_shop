<div class="col-lg-4">
  <div class="card mb-3">
    <h3 class="card-header"><?php echo $product->title; ?></h3>
    <!-- <div class="card-body">
      <h5 class="card-title"></h5>
      <h6 class="card-subtitle text-muted">Support card subtitle</h6>
    </div> -->
    <a href="#">
        <img style="height: 350px; width: 100%; display: block;" src="<?php if($product->image != ''){echo $product->image;}else{echo 'http://teuge-airport.nl/wp-content/uploads/no_image.jpg';}?>" alt="Card image">
    </a>

    <div class="card-body" style="height: 150px; width: 100%; display: block;">
      <p class="card-text"><?php echo $product->preview(); ?>
      <br>
      <a href="#" class="card-link">read more</a></p>
    </div>

    <div class="card-body">
      <form action="/cart/add" method="POST">
        <input type="hidden" name="variant_id" value="<?php echo $product->variant_id; ?>">
        <button>Add to cart</button>
      </form>
      
    </div>
<!--     <div class="card-body">

      <a href="#" class="card-link">Add to cart</a>
    </div> -->
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
</div>

