<section class="wrapper select-wrapper">
            <h2 class="page-title margin-top-30">CUSTOMIZATION / TYPE</h2>
            <hr class="margin-bottom-20">
            <div class="type-btn margin-bottom-10">
                <?php
                if(!empty($custom_key)){
                    foreach($custom_key as $k=>$v) {
                ?>
                <a class="cnav <?=$v['id']<=$key_no?'active':''?>" href="<?=base_url($init['langu'].'/'.strtolower(str_replace(" ","-",$v['key'])))?>">
                    <span><?=$v['id']?></span><em><?=strtoupper($v['key'])?></em>
                </a>
                <?php        
                    }
                }
                ?>  
            </div>
            <hr>            
            <div class="select-style margin-bottom-30">
                <div class="grid grid-1-4-4">
                <div class="grid-item">
                    <a class="opt" data-key="suit-pocket" data-value="Patch Pockets" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-14.svg')?>" alt="Patch Pockets">
                        <span class="type">Patch Pockets</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="suit-pocket" data-value="Pocket Flap" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-15.svg')?>" alt="Pocket Flap">
                        <span class="type">Pocket Flap</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="suit-pocket" data-value="No Pocket Flap" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-16.svg')?>" alt="No Pocket Flap">
                        <span class="type">No Pocket Flap</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="suit-pocket" data-value="Pocket Flap Slanted" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-17.svg')?>" alt="Pocket Flap Slanted">
                        <span class="type">Pocket Flap Slanted</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="suit-pocket" data-value="No Pocket Flap Slanted" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-18.svg')?>" alt="No Pocket Flap Slanted">
                        <span class="type">No Pocket Flap Slanted</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="suit-pocket" data-value="Ticket Pocket" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-19.svg')?>" alt="Ticket Pocket">
                        <span class="type">Ticket Pocket</span>
                    </a>
                </div>
                </div>
            </div>
            <div class="pageview margin-bottom-50">
                <?php
                $prevlink="";
                $nextlink="";
                if(!empty($custom_key)){
                    $current_key = "";
                    foreach($custom_key as $k=>$v) {
                        if($v['id'] == $key_no) {
                            $current_key = $k;
                            break;
                        }
                    }
                    $prevlink = strtolower(str_replace(" ","-", $custom_key[$current_key-1]['key']));
                    $nextlink = strtolower(str_replace(" ","-", $custom_key[$current_key+1]['key']));
                }
                ?>
                <div class="prev">
                    <a href="<?=base_url($init['langu'].'/'.$prevlink)?>" class="btn">PREVIOUS</a>
                </div>
                <div class="next">
                    <a href="<?=base_url($init['langu'].'/'.$nextlink)?>" class="btn">NEXT</a>
                </div>
            </div>
        </section>