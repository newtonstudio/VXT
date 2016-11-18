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
                <div class="grid grid-1-3-3">
                <div class="grid-item">
                    <a class="opt" data-key="suit-button" data-value="One Button" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-11.svg')?>" alt="One Button">
                        <span class="type">One Button</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="suit-button" data-value="Two Button" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-12.svg')?>" alt="Two Button">
                        <span class="type">Two Button</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="suit-button" data-value="Double Breasted" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-13.svg')?>" alt="Double Breasted">
                        <span class="type">Double Breasted</span>
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