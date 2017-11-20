<?php
get_header(); ?>
<?php get_template_part( 'components/component', 'crumbs' ); ?>
	<style>
		.voprosy__text b,
		.voprosy__text strong{
			margin-top: 30px;
			display: block;
		}
	</style>
<section  class="voprosy">
	<div class="container">
		<h1 class="section__title"><? the_title()?></h1>
		<div class="voprosy__text" style="font-size: 18px">
			<? the_content()?>
		</div>
	</div>

</section>
<?php get_template_part( 'components/home/component', 'home-news' ); ?>
<?php
get_footer();