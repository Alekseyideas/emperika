<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

<?php get_template_part( 'components/component', 'subscription' ); ?>
<?php get_template_part( 'components/component', 'site-map' ); ?>
		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer class="footer" role="contentinfo">
        <div class="container">
            <div class="row">


                <div class="col-sm-4 text-left">
                    <div class="footer__imgs">
                        <div class="flex flex--a-center">
		                    <?
		                    function FooterImg($img,$alt){
			                    echo '<img class="footer__pay-img" src="'. get_template_directory_uri().'/images/footer/'.$img.'" alt="'.$alt.'">';
		                    }
		                    ?>
		                    <?FooterImg('m-c.png','mastercard')?>
		                    <?FooterImg('visa.png','visa')?>
		                    <?FooterImg('pb.png','privat')?>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4 text-center">

                    <a href="<?php front_phone()?>" class="footer_phone flex flex--j-center flex--a-center">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <?php front_phone()?>
                    </a>

                    <a href="#">

	                    <?php echo date("Y"); ?> Webarch.pro
                    </a>
                </div>
                
                <div class="col-sm-4">
                    <div class="footer__social-links flex flex--j-right">

	                    <?
	                    function FooterSocLink($link,$icon){
		                    echo ' <a href="'.$link.'"><i class="fa fa-'.$icon.'" aria-hidden="true"></i></a>';
	                    }

	                    FooterSocLink('#','youtube-play');
	                    FooterSocLink('#','instagram');
	                    FooterSocLink('#','facebook');
	                    FooterSocLink('#','pinterest-p');
	                    ?>
                    </div>

                </div>
            </div>
        </div>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
