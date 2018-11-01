<div class="tab-content">
	<div class="subsidy sheets">
		<?php $sheets = get_field('fact_sheets'); ?>
        <?php
        $top = $sheets['top_text'];
        if ($top): ?>
        <div class="top-text fadeInUp">  
            <?php if ($top['title']): ?>
            <h2><?php echo $top['title']; ?></h2>
            <?php endif; ?>

            <?php if ($top['description']): ?>
                <?php echo $top['description']; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php $items = $sheets['sheets']; 
        if($items):
            foreach ($items as $item) :
        ?>
        <div class="sheet fadeInUp">

            <?php if ($item['title']): ?>
                <h3><?php echo $item['title']; ?></h3>
            <?php endif; ?>

            <?php $attachment_id = $item['button']['file']; 
            $filesize = filesize( get_attached_file( $attachment_id ) );
            $filesize = size_format($filesize, 2);
            ?>
            
            <div class="download-btn hidden-xs pull-right">
                <?php $btn = $item['button']; ?>
                <?php if ($btn['text'] || $btn['file']): ?>
                <a class="btn" href="<?php echo $btn['file']; ?>"><span><img src="<?php echo get_theme_file_uri('assets/images/svg/download.svg');?>" alt=""></span><?php echo $btn['text']; ?></a>
                <span class="file-size">(Document, <?php echo  $filesize; ?>)</span>
                <?php endif; ?>
            </div>

            <?php if ($item['content']): ?>
                <?php echo $item['content']; ?>
            <?php endif; ?>

            <div class="download-btn visible-xs">
                <?php $btn = $item['button']; ?>
                <?php if ($btn['text'] || $btn['file']): ?>
                <a class="btn" href="<?php echo $btn['file']; ?>"><span><img src="<?php echo get_theme_file_uri('assets/images/svg/download.svg');?>" alt=""></span><?php echo $btn['text']; ?></a>
                <span class="file-size">(Document, <?php echo  $filesize; ?>)</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; endif; ?> 
	</div>
</div><!-- / col -->