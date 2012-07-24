<?php get_header(); ?>
<div id="container">

	<div id="viewport">
		<?php 
			$dussan_page = 1;
			$imagen = 0;
			$texto = 0;

			if(!is_single()){
				// query_posts("orderby=rand");
			}

			if(have_posts()){
			while (have_posts()) : the_post();
			$images =& get_children( 'post_type=attachment&post_mime_type=image&orderby=menu_order&post_parent='.$post->ID);
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
		?>

		<?php if($dussan_page == 1){ ?>
		<section class="slide" id="page<?php echo($dussan_page); ?>">
		<?php } ?>

		<?php 
			/* Designer randomnes */ 
			if($es_texto == 0 && $texto == 0){
				$es_texto = rand(0, 1);
			}else{
				$es_texto = 0;
			}
			if($imagen == 2){
				$es_texto = 1;
			}
		?>
			<article <?php post_class(); if($large_image_url && $es_texto == 0){ echo("style='background-image:url(".$large_image_url[0].")'"); }?>>
				<div class="article_header">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php 
						if($es_texto == 1){
							$texto++;
					?>
					<?php the_excerpt(); ?>
					<?php
						}else{
							$imagen++;
						}
					?>
				</div>
			</article>

		<?php 
			if($dussan_page % 3 == 0){ 
			$imagen = 0;
			$texto = 0;
		?>
			</section>
			<section class="slide" id="page<?php echo($dussan_page); ?>">
		<?php 
			} 
		?>

		<?php
			$dussan_page++;
			unset($images);
			endwhile;
		?>
		</section>

		<?php
			}else{
				_e("No posts", "dussan");
			}
		?>


	</div>

</div>
<?php get_footer(); ?>
