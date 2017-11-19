<section class="site-map">
	<div class="container">
		<div class="row">
            <?
            function siteMapTitle($title){
                echo '<h3 class="site-map__title">'.$title.'</h3>';
            }
             ?>

            <div class="col-md-3">
                <?siteMapTitle('Компания')?>
                <div>
	                <?
                       wp_nav_menu( array(
                            'theme_location' => 'Company'
                        ) );
	                ?>
                </div>
            </div>

            <div class="col-md-3">
	            <?siteMapTitle('Сервис')?>
                <div>
					<?
					wp_nav_menu( array(
						'theme_location' => 'Service'
					) );
					?>
                </div>
            </div>

            <div class="col-md-3">
	            <?siteMapTitle('Заказы и возвраты')?>
                <div>
					<?
					wp_nav_menu( array(
						'theme_location' => 'Orders'
					) );
					?>
                </div>
            </div>

            <div class="col-md-3">
	            <?siteMapTitle('Правовое поле')?>
                <div>
					<?
					wp_nav_menu( array(
						'theme_location' => 'Legal'
					) );
					?>
                </div>
            </div>

        </div>
	</div>
</section>