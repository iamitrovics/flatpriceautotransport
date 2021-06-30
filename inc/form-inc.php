<div id="booking-form">
    <div class="form-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h3><?php the_field('form_title_header_general', 'options'); ?></h3>
            </div>
        </div>
        <!-- /.row -->
        <?php the_field('form_code_header_general', 'options'); ?>
        <form action="">
            <div class="row select-wrapper">
                <div class="col">
                    <div class="form-group">
                        <input type="radio" id="house" name="moving" value="house">
                        <label for="house"><img src="img/ico/house.png" alt="">Moving house</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="radio" id="car" name="moving" value="car">
                        <label for="car"><img src="img/ico/car.png" alt="">Moving car</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="radio" id="both" name="moving" value="both">
                        <label for="both"><img src="img/ico/house.png" alt=""><i class="fal fa-plus"></i><img src="img/ico/car.png" alt=""></label>
                    </div>
                </div>
            </div>
            <div class="row inputs-wrapper">
                <div class="col">
                    <div class="form-group">
                        <i class="fal fa-location"></i>
                        <input type="text" placeholder="From Zip Code">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col">
                    <div class="form-group">
                        <i class="fal fa-location"></i>
                        <input type="text" placeholder="To Zip Code">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col">
                    <div class="form-group">
                        <i class="fal fa-calendar"></i>
                        <input type="text" placeholder="Moving Date" class="date-picker-input">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row action-area">
                <div class="col">
                    <div class="footnote">
                        <small>Three steps is all it takes</small>
                    </div>
                    <!-- /.footnote -->
                </div>
                <!-- /.col -->
                <div class="col">
                    <input type="submit" value="Next Step">
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.form-wrapper -->
</div>
<!-- /#booking-form -->