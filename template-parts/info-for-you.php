
<div class="tab-content">
    <div class="info-for-you">
        <?php $title = get_field('info_title_text'); ?>
        <div class="title-text">
            <?php if ($title['title']): ?>
            <h3><?php echo $title['title'] ?></h3>
            <?php endif; ?>

            <?php if ($title['description']): ?>
                <?php echo $title['description']; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <?php $items = get_field('info_list'); if($items): 
            foreach ($items as $item):
         ?>
        <div class="col-md-6 col-xs-6 col">
            <div class="info-for-you">
                <?php if ($item['icon']): ?>
                <div class="icon pull-right">
                    <img src="<?php echo $item['icon']; ?>" class="img-responsive" alt="">
                </div>
                <?php endif; ?>
                <div class="info-item">
                    <?php if ($item['title']): ?>
                    <h4 class="title" href="#"><?php echo $item['title']; ?></h4>
                    <?php endif; ?>
                    <?php if ($item['content']): ?>
                        <?php echo $item['content']; ?>
                    <?php endif; ?>
                    <?php $btn = $item['button'] ?>
                    <div class="info-bottom">
                        <?php if ($btn['text'] || $btn['link']): ?>
                        <a class="btn" href="<?php echo $btn['link']; ?>"><?php echo $btn['text']; ?><span class="fa fa-angle-right"></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>

</div><!-- / col -->
