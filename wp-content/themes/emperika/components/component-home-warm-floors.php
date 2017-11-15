<section class="home-warm-floors">
	<div class="container">
		<h1 class="section__title section__title--blue">Самые тёплые полы мира</h1>
		<div class="row">
            <?php
               function funcFloors($link,$img,$title){
                   echo '
                   <div class="col-md-4">
                <a href="'.$link.'" class="home-warm-floors__wrapper">
                    <div class="home-warm-floors__img"><img src="'.get_template_directory_uri().'/images/home-warm-floors/'.$img.'" alt="floors__img"></div>
                    <div class="home-warm-floors__title flex flex--a-center"><span>'.$title.'</span></div>
                </a>
			</div>
                   ';
               }

            $link = '#';
            $img = 'img-1.jpg';
            $title = 'Кабеля';
            funcFloors($link,$img,$title);


            $link = '#';
            $img = 'img-2.jpg';
            $title = 'Регуляторы';
            funcFloors($link,$img,$title);


            $link = '#';
            $img = 'img-3.jpg';
            $title = 'Системы снеготаяния';
            funcFloors($link,$img,$title);



            ?>

		</div>
	</div>
</section>