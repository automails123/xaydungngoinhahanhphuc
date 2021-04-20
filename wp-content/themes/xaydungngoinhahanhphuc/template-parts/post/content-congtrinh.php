<?php 
	$postid = get_the_ID(); 
	$slider = get_post_meta($postid, 'tdc_gallery_id', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h2 class="title-post text-capitalize mb-4 pb-2">', '</h2>' );?>		
	<div class="entry-content">		
		<div class="row mb-4 gallary-product">
            <div class="col-12 mb-4">
              	<?php if($slider) { ?>
	                <div class="wrap-single-img mb-4">
	                  <div class="slider-for">
	                  	<?php 
				        foreach ($slider as $image) { ?>
				        	<div class="d-table">
		                      <div class="d-table-cell p-1 p-md-2">
		                        <img src="<?php echo wp_get_attachment_url($image, 'large'); ?>" alt="<?php echo get_the_title(); ?>" class="h-100 w-100 obj-cover img-fluid mx-auto d-block">
		                      </div>
		                    </div>
				    	<?php } ?>	                    
	                  </div>
	                </div>
	                <div class="slider-nav">
	                	<?php 
				        	foreach ($slider as $image) { ?>
				        		<div class="item px-1 px-lg-2">
				                    <div class="border-1 p-1 fix-h-thumb d-flex align-items-center">
				                      <img src="<?php echo wp_get_attachment_url($image, 'large'); ?>" class="img-fluid d-block mx-auto h-100 obj-cover" alt="">
				                    </div>
				                </div>				        		
				    	<?php }	?>
	                </div>  
	            <?php } else { ?>
	            	<div class="text-center">
		            	<div class="wrap-single-img d-inline-block text-center">
	                      <div class="p-1 p-md-2">
	                        <?php echo get_the_post_thumbnail($postid, 'full', array( 'class' => 'img-fluid mx-auto d-block')); ?>  
	                      </div>
		                </div>	            		
	            	</div>
	           	<?php } ?>
            </div>
        </div>
     	<div class="content-congtrinh">
			<?php		
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
					get_the_title()
				) );			
				/*wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );*/
			?>
		</div>
		<?php echo share_social();?>  
	</div><!-- .entry-content -->
</article><!-- #post-## -->
