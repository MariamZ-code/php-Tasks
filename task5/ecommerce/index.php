<?php
$title = "Home";
include_once "views/layouts/header.php";
include_once "views/layouts/navbar.php";
include_once "app/database/models/Product.php";
include_once "app/database/models/Review.php";
include_once "app/database/models/Product_Order.php";
include_once "app/database/models/Product_Offer.php";

// Read Offers 
$productOffer = new Product_Offer;
$productsOffers =$productOffer->offers();


// Read New Added Products
$product = new Product;
$newAddedProduct = $product->newAdded();

// Read Most Review Products
$reviewProduct = new Review;
$mostReviewProduct = $reviewProduct->mostReview();

// Read Most Ordered Products
$productOrder= new Product_Order;
$mostOrderProduct = $productOrder->mostOrdered();


		



?>

<!-- header end -->
<!-- Offers Slider -->
<div class="slider-area">
	<div class="slider-active owl-dot-style owl-carousel">

	<?php
			if ($productsOffers) {

				$offers = $productsOffers->fetch_all(MYSQLI_ASSOC);
				//    print_r($products);die;

				foreach ($offers as $offersIndex => $offer) { ?>


					<div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/product/<?= $offer['image'] ?>);">
			
			
					<div class="container">
				
					<div class="slider-content slider-animated-1">
					<h1 class="animated"><span class="theme-color"><?= $offer['title_en'] ?></span></h1>
					<h1 class="animated"><?= $offer['name_en'] ?></h1>
					<p><?= $offer['desc_en'] ?></p>
				</div>
			</div>
		</div>
			<?php }
			} ?>
	
		
		
	</div>
</div>

<!-- Slider End -->
<!-- New Added Prodects  -->

<div class="product-area bg-image-1 pt-100 pb-95">
	<div class="container">
		<div class="product-top-bar section-border mb-55">
			<div class="section-title-wrap text-center">
				<h3 class="section-title">New Products</h3>
			</div>
		</div>
		<div class="row">
			<?php
			if ($newAddedProduct) {

				$products = $newAddedProduct->fetch_all(MYSQLI_ASSOC);
				//    print_r($products);die;

				foreach ($products as $index => $product) { ?>
					<div class="col-3">
						<div class="product-img">
							<a href="product-details.html">
								<img alt="" src="assets/img/product/<?= $product['image'] ?>">
							</a>
							<div class="product-action">
							
								<a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
							</div>
						</div>
						<div class="product-content text-left">
							<div class="product-hover-style">
							<span class="blog-date"><?= $product['created_at'] ?></span>
								<div class="product-title mt-3">
									<h4>
										<a href="product-details.html"><?= $product['name_en'] ?></a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span><?= $product['price'] ?></span>

							</div>
						</div>
					</div>
			<?php }
			} ?>

		</div>
	</div>
</div>
<!-- Product Area End -->
<!-- Most Reviewed Product-->


<div class="banner-area pt-100 pb-70">
 <div class="container">
	<div class="product-top-bar section-border mb-55">
		<div class="section-title-wrap text-center">
			<h3 class="section-title">Most Reviewed </h3>
		</div>
	</div>
	<div class="row">
		<?php
		if ($mostReviewProduct) {

			$reviewProducts = $mostReviewProduct->fetch_all(MYSQLI_ASSOC);
			//    print_r($reviewProducts);die;

			foreach ($reviewProducts as $rrviewindex => $reviewProduct) { ?>
				<div class="col-3">
					<div class="product-img">
						<a href="product-details.html">
							<img alt="" src="assets/img/product/<?= $reviewProduct['image'] ?>">
						</a>
						<div class="product-action">
							<a class="action-wishlist" href="#" title="Wishlist">
								<i class="ion-android-favorite-outline"></i>
							</a>
							<a class="action-cart" href="#" title="Add To Cart">
								<i class="ion-ios-shuffle-strong"></i>
							</a>
							<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
								<i class="ion-ios-search-strong"></i>
							</a>
						</div>
					</div>
					<div class="product-content text-left">
						<div class="product-hover-style">
							<div class="product-title">
								<h4>
									<a href="product-details.html"><?= $reviewProduct['name_en'] ?></a>
								</h4>
							</div>
							<div class="cart-hover">
								<h4><a href="product-details.html">+ Add to cart</a></h4>
							</div>
						</div>
						<div class="product-price-wrapper">
							<span><?= $reviewProduct['price'] ?></span>

						</div>
					</div>
				</div>
		<?php }
		} ?>

	</div>
 </div>
</div>

<!-- Banner End -->
<!-- Most Ordered -->
<div class="product-area gray-bg pt-90 pb-65">
	<div class="container">

		<div class="product-top-bar section-border mb-55">
			<div class="section-title-wrap text-center">
				<h3 class="section-title">Most Ordered</h3>
			</div>
		</div>
		<div class="row">
			<?php
			if ($mostOrderProduct) {

				$mostOrderProducts = $mostOrderProduct->fetch_all(MYSQLI_ASSOC);
				//    print_r($products);die;

				foreach ($mostOrderProducts as $indexOrder => $Orderproduct) { ?>
					<div class="col-3">
						<div class="product-img">
							<a href="product-details.html">
								<img alt="" src="assets/img/product/<?= $Orderproduct['image'] ?>">
							</a>
							<div class="product-action">
								<a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
							</div>
						</div>
						<div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.html"><?= $Orderproduct['name_en'] ?></a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span><?= $Orderproduct['price'] ?></span>

							</div>
						</div>
					</div>
			<?php }
			} ?>

		</div>
	</div>
</div>


<!-- New Products End -->
<!-- Testimonial Area Start -->
<div class="testimonials-area bg-img pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<div class="testimonial-active owl-carousel">
					<div class="single-testimonial text-center">
						<div class="testimonial-img">
							<img alt="" src="assets/img/icon-img/testi.png">
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
						<h4>Gregory Perkins</h4>
						<h5>Customer</h5>
					</div>
					<div class="single-testimonial text-center">
						<div class="testimonial-img">
							<img alt="" src="assets/img/icon-img/testi.png">
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
						<h4>Khabuli Teop</h4>
						<h5>Marketing</h5>
					</div>
					<div class="single-testimonial text-center">
						<div class="testimonial-img">
							<img alt="" src="assets/img/icon-img/testi.png">
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore </p>
						<h4>Lotan Jopon</h4>
						<h5>Admin</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Testimonial Area End -->
<!-- Most View Products -->
<div class="blog-area bg-image-1 pt-90 pb-70">
	<div class="container">
		<div class="product-top-bar section-border mb-55">
			<div class="section-title-wrap text-center">
				<h3 class="section-title">Most View Products</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="blog-single mb-30">
					<div class="blog-thumb">
						<a href="#"><img src="assets/img/blog/blog-single-1.jpg" alt="" /></a>
					</div>
					<div class="blog-content pt-25">
						<span class="blog-date">14 Sep</span>
						<h3><a href="#">Lorem ipsum sit ame co.</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut labore et dolore</p>
						<a href="#">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="blog-single mb-30">
					<div class="blog-thumb">
						<a href="#"><img src="assets/img/blog/blog-single-2.jpg" alt="" /></a>
					</div>
					<div class="blog-content pt-25">
						<span class="blog-date">20 Dec</span>
						<h3><a href="#">Lorem ipsum sit ame co.</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut labore et dolore</p>
						<a href="#">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="blog-single mb-30">
					<div class="blog-thumb">
						<a href="#"><img src="assets/img/blog/blog-single-3.jpg" alt="" /></a>
					</div>
					<div class="blog-content pt-25">
						<span class="blog-date">18 Aug</span>
						<h3><a href="#">Lorem ipsum sit ame co.</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut labore et dolore</p>
						<a href="#">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- News Area End -->
<!-- Newsletter Araea Start -->
<div class="newsletter-area bg-image-2 pt-90 pb-100">
	<div class="container">
		<div class="product-top-bar section-border mb-45">
			<div class="section-title-wrap text-center">
				<h3 class="section-title">Join to our Newsletter</h3>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-6 col-md-10 col-md-auto">
				<div class="footer-newsletter">
					<div id="mc_embed_signup" class="subscribe-form">
						<form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<div id="mc_embed_signup_scroll" class="mc-form">
								<input type="email" value="" name="EMAIL" class="email" placeholder="Your Email Address*" required>
								<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								<div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
								<div class="submit-button">
									<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once "views/layouts/footer.php"; ?>