<div class="nm-images-block nm-product-sliders-overwrap">
                                    <div id="nm-slider-product">
                                        <?php foreach ( $images as $image ) : ?>
                                            <div class="nm-slide">
                                                <a class="nm-slide-img" href="<?php echo $image->imageURL; ?>" style="background-image:url('<?php echo $image->imageURL; ?>');"></a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div id="nm-slider-product-nav">
                                        <?php foreach ( $images as $image ) : ?>
                                            <div class="nm-slide">
                                                <div class="nm-slide-img" style="background-image:url('<?php echo $image->thumbnailURL; ?>');"></div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>