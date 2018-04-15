<?php get_header(); ?>

		<!-- MAIN BEGIN-->
		<main>
			<div class="nm-section nm-section-slider nm-text-center">
				<div class="nm-section-wrap">
					<div id="nm-slider-home">
                        <?php $query = new WP_Query( 'cat=11' ); ?>
                        <?php //print_r($query); ?>
                        <?php foreach ($query->posts as $value) { ?>
							<div class="nm-slide" style="background-image:url('<?=get_the_post_thumbnail_url( $value->ID, 'header-slider' )?>');">
								<div class="nm-slide-wrap">
									<div class="nm-slide-text">
										<div class="nm-slide-caption"><?php echo $value->post_content;?></div>
										<div class="nm-slide-subtext"><?php echo $value->post_title;?></div>
									</div>
									<div class="nm-slider-nav">
										<div class="nm-slider-arrow prev"></div><a class="nm-link-underline nm-slide-link" href="<?php echo get_post_meta( $value->ID, 'link', true ); ?>">
											<?php echo get_post_meta( $value->ID, 'link-name', true ); ?>
										</a>
										<div class="nm-slider-arrow next"></div>
									</div>
								</div>
							</div>
                        <?php } ?>
					</div>
				</div>
			</div>
			<div class="nm-section nm-section-lival">
				<div class="nm-section-bootstrap-wrap">
					<div class="container-fluid nm-relative">
						<div class="nm-abs-decor">
							<div class="nm-oval"></div>
							<div class="nm-line"></div>
						</div>
						<div class="row nm-just-center">
							<div class="col-md-4 nm-text-center">
								<div class="nm-inline-block nm-text-left">
									<h1>A LIVAL</h1>
									<div class="nm-logos-row">
										<div class="nm-img-wrap">
											<img src="<?php echo get_theme_mod('empresa1');?>">
										</div>
										<div class="nm-img-wrap">
											<img src="<?php echo get_theme_mod('empresa2');?>">
										</div>
										<!--<div class="nm-img-wrap">
											<img src="<?php //echo get_theme_mod('empresa3');?>">
										</div> -->
									</div>
								</div>
							</div>
							<div class="col-md-5 offset-md-1">
								<h3><?php echo pll__('empresa-title'); ?></h3>
								<div class="nm-descr nm-border-bottom"><?php echo pll__('empresa-text'); ?></div>
								<div class="nm-text-right"><a class="nm-link-underline nm-anchor" href="#lival"><?php echo pll__('empresa-know-more'); ?></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $parent_category = new WP_Query( 'cat=17' ); ?>
			<?php $categories = get_categories( array( 'parent' => $parent_category->query_vars['cat'], 'taxonomy' => 'category', 'number' => 5 ) ); ?>
			<div class="nm-section nm-section-produtos" id="produtos">
				<div class="nm-pad15 nm-text-center">
					<h2><?php echo $parent_category->query_vars['category_name'];?></h2>
				</div>
				<div class="nm-productos-row">
					<?php foreach ($categories as $key=>$category) { ?>
					<?php $terms = get_all_wp_terms_meta($category->term_id) ?>
					<?php //print_r($terms); ?>
					<a class="nm-item" href="<?php echo get_category_link( $parent_category->query_vars['cat'] ); ?>#<?php echo $category->term_id; ?>" style="background-image: url('<?php echo $terms['image'][0]; ?>');">
						<div class="nm-caption"><?php echo $category->name;?></div>
					</a>
					<?php } ?>
				</div>
			</div>
			<div class="nm-decor-overwrap">
				<div class="nm-section nm-section-qualidade" id="lival">
					<div class="nm-section-bootstrap-wrap">
						<div class="container-fluid">
							<div class="row nm-just-center">
								<div class="col-lg-5 col-md-10">
									<div class="nm-inline-block">
										<h2><?php echo pll__('qualidade-title1'); ?></h2>
										<div class="nm-icons-row"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-qualidade-1.svg" alt="icon" width="59" height="75"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-qualidade-2.svg" alt="icon" width="48" height="77"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-qualidade-3.svg" alt="icon" width="82" height="67"></div>
									</div>
									<div class="nm-border-bottom"><?php echo pll__('qualidade-text1'); ?></div>
								</div>
								<div class="col-lg-5 col-md-10">
									<div class="nm-pad-left">
										<div class="nm-border-bottom">
											<h3><?php echo pll__('qualidade-title2'); ?></h3>
											<?php echo pll__('qualidade-text2'); ?>
										</div>
										<div class="nm-border-bottom">
											<?php echo pll__('qualidade-text3'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="nm-section nm-section-contactos" id="contactos">
					<div class="nm-section-bootstrap-wrap">
						<div class="container-fluid">
							<h2 class="nm-text-center"><?php echo pll__('contacts'); ?></h2>
							<div class="row">
								<div class="col-md-6">
									<div class="nm-fl-row">
										<ul class="nm-social">
											<li>
												<a href="<?php echo pll__('contacts-s1'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-social-fb.svg" alt="fb" width="16" height="20"></a>
											</li>
											<li>
												<a href="<?php echo pll__('contacts-s2'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-social-youtube.svg" alt="youtube" width="20" height="20"></a>
											</li>
											<li>
												<a href="<?php echo pll__('contacts-s3'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-social-linkedin.svg" alt="linkedin" width="16" height="14"></a>
											</li>
										</ul>
										<div class="nm-map-block">
											<div class="nm-border-bottom">
												<h3><?php echo pll__('contacts-morada'); ?></h3>
												<p><?php echo pll__('contacts-address1'); ?></p>
												<p><?php echo pll__('contacts-address2'); ?></p>
											</div>
											<div class="nm-map">
												<div id="map"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-6">
									<div class="nm-pad-left">
										<div class="nm-border-bottom">
											<h3><?php echo pll__('contacts-empresa'); ?></h3>
											<div class="nm-subblock">
												<div>
													<div class="nm-text-underline"><?php echo pll__('contacts-departament1'); ?></div>
												</div>
												<div><a class="nm-hover-underline" href="mailto:<?php echo pll__('contacts-departament1-email'); ?>"><?php echo pll__('contacts-departament1-email'); ?></a></div>
												<div><a href="callto:<?php echo pll__('contacts-departament1-phone'); ?>"><?php echo pll__('contacts-departament1-phone'); ?></a></div>
											</div>
											<div class="nm-subblock">
												<div>
													<div class="nm-text-underline"><?php echo pll__('contacts-departament2'); ?></div>
												</div>
												<div><a class="nm-hover-underline" href="mailto:<?php echo pll__('contacts-departament2-email'); ?>"><?php echo pll__('contacts-departament2-email'); ?></a></div>
												<div><a href="callto:<?php echo pll__('contacts-departament2-phone'); ?>"><?php echo pll__('contacts-departament2-phone'); ?></a></div>
											</div>
											<div class="nm-subblock">
												<div>
													<div class="nm-text-underline"><?php echo pll__('contacts-departament3'); ?></div>
												</div>
												<div><a class="nm-hover-underline" href="mailto:<?php echo pll__('contacts-departament3-email'); ?>"><?php echo pll__('contacts-departament3-email'); ?></a></div>
												<div><a href="callto:<?php echo pll__('contacts-departament3-phone'); ?>"><?php echo pll__('contacts-departament3-phone'); ?></a></div>
											</div>
										</div>
										<form class="nm-form-contacts" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
											<input type="hidden" name="action" value="contact_form">
											<input type="hidden" name="test" value="">
											<h3>CONTACTO EMAIL</h3>
											<div class="nm-inputs-block">
												<input class="nm-input" type="text" name="name" placeholder="<?php echo pll__('contact_name'); ?>" maxlength="40" required>
												<input class="nm-input" type="email" name="email" placeholder="<?php echo pll__('contact_email'); ?>" maxlength="40" required>
												<input class="nm-input" type="text" name="text" placeholder="<?php echo pll__('contact_message'); ?>" maxlength="500">
											</div>
											<div class="nm-text-right">
												<input class="nm-btn" type="submit" value="<?php echo pll__('contact_submit'); ?>">
											</div>
											
											<div class="nm-success-block">
												<div class="nm-inner-wrap">
													<div><?php echo pll__('success-t11'); ?></div>
													<div><?php echo pll__('success-t12'); ?></div>
													<div class="nm-cool"><?php echo pll__('success-t13'); ?></div>
													<div class="nm-apply-row">
														<img src="<?php echo get_template_directory_uri(); ?>/img/icon-check.svg" alt="success" width="40" height="40">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN END-->
		
<?php get_footer(); ?>