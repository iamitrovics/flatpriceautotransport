  <section id="why-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?php the_field('main_title_why_gen', 'options'); ?></h3>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
        <div class="row">

            <?php if( have_rows('why_blocks_gen_repe', 'options') ): ?>
                <?php while( have_rows('why_blocks_gen_repe', 'options') ): the_row(); ?>

                    <div class="col-md-4">
                        <div class="why-box">
                            <h5><?php the_sub_field('title'); ?></h5>
                            <div class="why-text">
                                <?php the_sub_field('content_block'); ?>
                            </div>
                            <!-- /.why-text -->
                        </div>
                        <!-- /.why-box -->
                    </div>
                    <!-- /.col-md-4 -->

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>