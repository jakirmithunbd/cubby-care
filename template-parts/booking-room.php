
<?php $content = get_field('booking_room', getPageID()); ?>
<section class="game-room" style="background: url(<?php echo $content['image']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 col-sm-12">
                <div class="booking-form">
                    <?php if ($content['title']): ?>
                    <h4><?php echo $content['title']; ?></h4>
                    <?php endif; ?>

                    <div class="form contact-form">
                        <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- / game-room -->