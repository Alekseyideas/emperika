<?php
get_header(); ?>
<?php get_template_part( 'components/component', 'crumbs' ); ?>

<section class="section-products">




	<div class="container">

		<h1 class="section__title"><? the_title()?></h1>





		<?
			function getCatPr($catName){
				?>

				<div class="text-center">
					<?php
					getProductCatTitle($catName);
					?>
				</div>
				<div class="row">
					<? GetLoopProduct (4,'','',$catName);?>
				</div>

				<div class="text-center">
					<a href="<?php getProductCatLink($catName);?>" class="btn btn__border--blue showMore">Смотреть все</a>
				</div>
				<?
			}

		getCatPr('nagrevatelnyj-kabel');
		getCatPr('nagrevatelnyj-mat');
		getCatPr('regulyatory');
		getCatPr('sistemy-snegotayaniya');
		getCatPr('konditsionery');
		?>




	</div>

</section>

<?php get_template_part( 'components/home/component', 'home-news' ); ?>

<?php
get_footer();