<div id="booking-form">
    <div class="form-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h3><?php the_field('main_title_quote_form', 'options'); ?></h3>
            </div>
        </div>
        <!-- /.row -->
        
            <div class="row select-wrapper">

                <ul class="nav nav-tabs" id="quote-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="autoquote-tab" data-toggle="tab" href="#auto-quote" role="tab" aria-controls="home" aria-selected="true"><img src="<?php bloginfo('template_directory'); ?>/img/ico/car.png" alt=""> <span><?php the_field('tab_title_tab_1', 'options'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="movingquote-tab" data-toggle="tab" href="#moving-quote" role="tab" aria-controls="profile" aria-selected="false"><img src="<?php bloginfo('template_directory'); ?>/img/ico/house.png" alt=""> <span><?php the_field('tab_title_tab_2', 'options'); ?></span></a>
                    </li>
                </ul>

            </div>
            <!-- // tab nav  -->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="auto-quote" role="tabpanel" aria-labelledby="home-tab">

                    <?php the_field('form_code_tab_1', 'options'); ?>

                </div>
                <!-- // tab 1  -->

                <div class="tab-pane fade" id="moving-quote" role="tabpanel" aria-labelledby="profile-tab">

                    <?php the_field('form_code_tab_2', 'options'); ?>

                </div>
                <!-- // tab 2  -->
            </div>    
            <!-- // tab content   -->

    </div>
    <!-- /.form-wrapper -->
</div>
<!-- /#booking-form -->