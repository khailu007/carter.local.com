<?php
get_header(); ?>

<section class="team-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="team-details__image wow fadeInLeft" data-wow-duration="1500ms">
                    <?php the_post_thumbnail('agriox_team_three_512X512'); ?>
                    <?php $team_logo =  get_post_meta(get_the_ID(), 'agriox_team_logo', true); ?>
                    <?php if (!empty($team_logo)) : ?>
                        <div class="team-details__logo">
                            <img src="<?php echo esc_url($team_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div><!-- /.team-details__logo -->
                    <?php endif; ?>
                </div><!-- /.team-details__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="team-details__content">
                    <h3 class="team-details__name"><?php the_title(); ?></h3><!-- /.team-details__name -->
                    <p class="team-details__designation"><?php echo esc_html(get_post_meta(get_the_ID(), 'agriox_designation', true)); ?></p><!-- /.team-details__designation -->
                    <?php $team_socials = get_post_meta(get_the_ID(), 'agriox_team_social', true); ?>
                    <?php if (is_array($team_socials)) : ?>
                        <ul class="team-details__social">
                            <?php foreach ($team_socials as $social) : ?>
                                <li><a href="<?php echo esc_url($social['agriox_link']); ?>"><i class="fab <?php echo esc_attr($social['agriox_icon']); ?>"></i></a></li>
                            <?php endforeach; ?>
                        </ul><!-- /.team-details__social -->
                    <?php endif; ?>
                    <p class="team-details__highlight"><?php echo esc_html(get_post_meta(get_the_ID(), 'agriox_highlighted_text', true)); ?></p>
                    <!-- /.team-details__highlight -->
                    <div class="team-details__text">
                        <?php the_content(); ?>
                    </div><!-- /.team-details__text -->
                </div><!-- /.team-details__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.team-details -->

<?php
get_footer();
