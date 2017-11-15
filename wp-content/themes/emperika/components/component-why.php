<section class="why">
	<div class="container">
        <h1 class="section__title">Почему выбирают DEVI</h1>
		<div class="row">
            <?php
            function funcWhy($img, $text){
                echo '
                
                <div class="col-md-3 col-sm-6 why__wrapper">
				<div class="flex flex--a-center flex--j-center">
                    <img src="'.get_template_directory_uri().'/images/why/'.$img.'" alt="form">
                    <p>'.$text.'</p>
				</div>
			</div>
                ';
            }

            funcWhy('form-1.svg','20 лет опыта');
            funcWhy('form-2.svg','Более 1 500 <br> довольных клиентов');
            funcWhy('form-3.svg','Бесплатная доставка <br> от 3 000 грн');
            funcWhy('form-4.svg','Гарантия 20 лет');
            ?>





		</div>
	</div>
</section>