
<?php $banner = get_field('banner_content', getPageID()); ?>
<section class="page-banner" style="background: url(<?php echo $banner['image']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-9 col-xs-12">
                <div class="page-banner-info">
                	<?php if ($banner['title']): ?>
                    <h2><?php echo $banner['title']; ?></h2>
                	<?php endif; ?>

                	<?php if ($banner['description']): ?>
                    	<?php echo $banner['description']; ?>
                	<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- / Banner -->