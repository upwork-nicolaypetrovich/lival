<?php
	get_header();
	$parent_category = new WP_Query( 'cat=17' );
	//print_r($query);
	$categories = get_categories( array( 'parent' => $parent_category->query_vars['cat'], 'taxonomy' => 'category' ) );
	//print_r($categories);
?>

		<!-- MAIN BEGIN-->
		<main>
			<div class="nm-section nm-section-produtos-header">
				<div class="nm-inner-img-bg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/footer-bg.png');"></div>
				<div class="nm-pad15 nm-text-center">
					<h1><?php echo $parent_category->query_vars['category_name'];?></h1>
				</div>
			</div>
			<div class="nm-section nm-section-produtos nm-inner">
				<div class="nm-section-hullhd-wrap">
					<div class="nm-fl-row">
						<div class="nm-slider-categories-nav-block">
							<div id="nm-slider-categories-nav">
								<?php foreach ($categories as $category) { ?>
									<div class="nm-slide" data-catid="<?php echo $category->term_id; ?>">
										<div class="nm-slide-wrap">
											<div class="nm-title-wrap">
												<div class="nm-title"><?php echo $category->name;?></div>
											</div>
											<div class="nm-description">
												<p><?php echo $category->category_description;?></p>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="nm-slider-products-block">
							<a class="product-prev slick-prev" href="#"></a>
							<a class="product-next slick-next" href="#"></a>
							<div id="nm-slider-categories">
								<?php foreach ($categories as $category) { ?>
		                        <?php $products = new WP_Query( 'cat='.$category->term_id ); ?>
		                        <?php //print_r($products); ?>
									<div class="nm-categories-slide" data-catid="<?php echo $category->term_id; ?>">
										<div class="nm-products-slider">
											<?php foreach ($products->posts as $product) { ?>
											<div class="nm-products-slide">
												<a class="nm-item" href="<?php echo get_permalink($product->ID); ?>" style="background-image: url('<?=get_the_post_thumbnail_url( $product->ID, 'category-image' )?>');">
													<div class="nm-caption"><?php echo $product->post_title;?></div>
												</a>
											</div>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN END-->
		
<?php get_footer(); ?>