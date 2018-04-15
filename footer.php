
		<!-- FOOTER BEGIN-->
		<footer style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/footer-bg.png');">
			<div class="nm-section-bootstrap-wrap">
				<div class="container-fluid">
					<div class="row nm-just-center">
						<div class="col-md-auto">
							<form class="nm-subscribe-form nm-text-center" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
								<input type="hidden" name="action" value="contact_form">
								<input type="hidden" name="test" value="">
								<div class="nm-caption"><?php echo pll__('footer-subscribe'); ?></div>
								<div class="nm-input-wrap">
									<input class="nm-input" type="email" name="email" required maxlength="40">
									<input class="nm-btn nm-btn-arrow" type="submit" value="submit">
								</div>
								<div class="nm-success-block">
									<div class="nm-inner-wrap">
										<div><?php echo pll__('success-t21'); ?></div>
										<div class="nm-cool"><?php echo pll__('success-t22'); ?></div>
										<div class="nm-apply-row">
											<img src="<?php echo get_template_directory_uri(); ?>/img/icon-check.svg" alt="success" width="40" height="40">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row nm-align-center">
						<div class="col-md-5 offset-md-1">
							<div class="nm-icons-row"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-qualidade-1.svg" alt="icon" width="59" height="75"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-qualidade-2.svg" alt="icon" width="48" height="77"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-qualidade-3.svg" alt="icon" width="82" height="67"></div>
						</div>
						<div class="col-md-4 offset-md-2">
							<?php echo wp_nav_menu(  array( 'theme_location'  => 'bottom', 'menu_class' => 'nm-footer-links' )  ); ?>
						</div>
					</div>
					<div class="row nm-just-center">
						<div class="col-md-auto">
							<div class="nm-footer-row">
								<div class="nm-copyrights"><?php echo get_theme_mod('copyrights');?></div>
								<div class="nm-designed"><?php echo get_theme_mod('designed');?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- FOOTER END-->
	</div>

	<?php wp_footer(); ?>
	<?php if( is_front_page() ){ ?>
	<script type="text/javascript">
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 12,
				disableDefaultUI: true,
				scrollwheel: false,
				draggable: false,
				disableDoubleClickZoom: true,
				center: {
					lat: 41.15184571526555,
					lng: -8.455128947163348
				},
				styles: [{
						"elementType": "geometry",
						"stylers": [{
							"color": "#212121"
						}]
					},
					{
						"elementType": "labels.icon",
						"stylers": [{
							"visibility": "off"
						}]
					},
					{
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#757575"
						}]
					},
					{
						"elementType": "labels.text.stroke",
						"stylers": [{
							"color": "#212121"
						}]
					},
					{
						"featureType": "administrative",
						"elementType": "geometry",
						"stylers": [{
							"color": "#757575"
						}]
					},
					{
						"featureType": "administrative.country",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#9e9e9e"
						}]
					},
					{
						"featureType": "administrative.land_parcel",
						"stylers": [{
							"visibility": "off"
						}]
					},
					{
						"featureType": "administrative.locality",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#bdbdbd"
						}]
					},
					{
						"featureType": "poi",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#757575"
						}]
					},
					{
						"featureType": "poi.park",
						"elementType": "geometry",
						"stylers": [{
							"color": "#181818"
						}]
					},
					{
						"featureType": "poi.park",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#616161"
						}]
					},
					{
						"featureType": "poi.park",
						"elementType": "labels.text.stroke",
						"stylers": [{
							"color": "#1b1b1b"
						}]
					},
					{
						"featureType": "road",
						"elementType": "geometry.fill",
						"stylers": [{
							"color": "#2c2c2c"
						}]
					},
					{
						"featureType": "road",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#8a8a8a"
						}]
					},
					{
						"featureType": "road.arterial",
						"elementType": "geometry",
						"stylers": [{
							"color": "#373737"
						}]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry",
						"stylers": [{
							"color": "#3c3c3c"
						}]
					},
					{
						"featureType": "road.highway.controlled_access",
						"elementType": "geometry",
						"stylers": [{
							"color": "#4e4e4e"
						}]
					},
					{
						"featureType": "road.local",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#616161"
						}]
					},
					{
						"featureType": "transit",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#757575"
						}]
					},
					{
						"featureType": "water",
						"elementType": "geometry",
						"stylers": [{
							"color": "#000000"
						}]
					},
					{
						"featureType": "water",
						"elementType": "labels.text.fill",
						"stylers": [{
							"color": "#3d3d3d"
						}]
					}
				]
			})
			setMarkers(map);
		}

		function setMarkers(map) {
			var image = {
				url: '<?php echo get_template_directory_uri(); ?>/img/map-marker.png'
			}
			var shape = {
				coords: [1, 1, 1, 20, 20, 20, 20, 1],
				type: 'poly'
			}
			var marker = new google.maps.Marker({
				position: {
					lat: 41.154,
					lng: -8.45
				},
				map: map,
				icon: image,
				shape: shape
			})
		}

	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmeKj3U-GR9s5J611rMcTO_DdhLmCdrHE&amp;callback=initMap"></script>
	<?php } ?>

</body>

</html>
