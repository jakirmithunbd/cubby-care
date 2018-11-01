
<div class="tab-content">
    <div class="people">
        <?php
        $people = get_field('our_people');
        $ptop = $people['top_text'];
        if ($ptop): ?>
        <div class="top-text">  
            <?php if ($ptop['title']): ?>
            <h2><?php echo $ptop['title']; ?></h2>
            <?php endif; ?>

            <?php if ($ptop['description']): ?>
                <?php echo $ptop['description']; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <?php $peoples = $people['team_members']; 
        ?>
        <?php if($peoples): 
            foreach ($peoples as $item):
        ?>
        <div class="team-member">
            <?php if ($item['image']): ?>
            <div class="media pull-left">
                <img src="<?php echo $item['image']; ?>" class="img-responsive" alt="">
            </div>
            <?php endif; ?>

            <div class="team-meta">
                <?php if ($item['name'] || $item['title'] || $item['position']): ?>
                <div class="title">
                    <?php if ($item['name'] || $item['title']): ?>
                    <h4><?php echo $item['name']; ?> <span><?php echo $item['title']; ?></span></h4>
                    <?php endif; ?>
                    
                    <?php if ($item['position']): ?>
                    <p><?php echo $item['position']; ?></p>
                    <?php endif; ?>

                </div>
                <?php endif; ?>
                
                <?php if ($item['description']): ?>
                    <?php echo $item['description']; ?>
                
                <?php endif; ?>
            </div>
        </div><!-- / team -->
        <?php endforeach; endif; ?>
    </div><!-- / team -->
</div><!-- / col -->