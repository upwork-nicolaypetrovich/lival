<?php get_header(); ?>
<?php $parent_category = new WP_Query( 'cat=17' ); ?>
<?php the_post(); ?>
<?php $category = get_the_category( get_the_ID() ); ?>

		<!-- MAIN BEGIN-->
		<main>
			<div class="nm-section nm-section-product">
				<div class="nm-bg-overbg" style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/footer-bg.png');"></div>
				<div class="nm-section-bootstrap-wrap">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<div class="nm-back">
									<a class="nm-arrow-left" href="<?php echo get_category_link( $parent_category->query_vars['cat'] ); ?>#<?php echo $category[0]->term_id; ?>"></a><a class="nm-product-name" href="<?php echo get_category_link( $parent_category->query_vars['cat'] ); ?>#<?php echo $category[0]->term_id; ?>"><?php echo $category[0]->name; ?></a></div>
								<h1 class="nm-category-name"><?php the_title(); ?></h1>
								<div class="nm-text-block">
									<?php the_content(); ?>
									<h3><?php echo str_replace("\n", "<br>", get_post_meta( get_the_ID(), 'title1', true )); ?></h3>
									<?php echo str_replace("\n", "<br>", get_post_meta( get_the_ID(), 'text1', true )); ?>
									<br><hr><br>
									<h3><?php echo str_replace("\n", "<br>", get_post_meta( get_the_ID(), 'title2', true )); ?></h3>
									<?php echo str_replace("\n", "<br>", get_post_meta( get_the_ID(), 'text2', true )); ?>
									<br><hr><br>
									<h3><?php echo str_replace("\n", "<br>", get_post_meta( get_the_ID(), 'title3', true )); ?></h3>
									<?php echo str_replace("\n", "<br>", get_post_meta( get_the_ID(), 'text3', true )); ?>
								</div>
							</div>
							<div class="col-md-6 nm-pad-left">

<?php echo do_shortcode( '[ngg_images source="galleries" container_ids="'.get_post_meta( get_the_ID(), 'gal', true ).'" template=product display_type="photocrati-nextgen_basic_thumbnails" override_thumbnail_settings="1" thumbnail_width="180" thumbnail_height="120" thumbnail_crop="1" images_per_page="999" number_of_columns="0" ajax_pagination="0" show_all_in_lightbox="0" use_imagebrowser_effect="0" show_slideshow_link="0" slideshow_link_text="" order_by="sortorder" order_direction="ASC" returns="included" maximum_entity_count="500"]' ); ?>

								<?php if(get_post_meta( get_the_ID(), 'pdf', true )){ ?>
								<h3><?php echo pll__('product-text'); ?></h3>
								<div class="nm-download-block">
									<a href="<?php echo wp_get_attachment_url(get_post_meta( get_the_ID(), 'pdf', true )); ?>" download>
										<div class="nm-arrow-block"></div><span><?php echo pll__('product-link'); ?></span></a>
								</div>
								<?php } ?>
								<div class="nm-divider"></div>
								<?php echo str_replace("\n", "<br>", get_post_meta( get_the_ID(), 'contacts', true )); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN END-->
		
<?php get_footer(); ?>