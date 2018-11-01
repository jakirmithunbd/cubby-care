<div class="tab-content">
    <div class="mission">
        <?php $mission = get_field('cubby_careers'); ?>

        <?php
        $top = $mission['top_text'];
        if ($top): ?>
        <div class="top-text">  
            <?php if ($top['title']): ?>
            <h2><?php echo $top['title']; ?></h2>
            <?php endif; ?>

            <?php if ($top['description']): ?>
                <?php echo $top['description']; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <?php if ($citem['content']): ?>
            <?php echo $citem['content']; ?>
        <?php endif; ?>
    </div>
</div><!-- / col -->