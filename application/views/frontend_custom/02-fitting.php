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
                <div class="grid grid-1-2-2">
                <div class="grid-item">
                    <a class="opt" data-key="fitting" data-value="Tailored Fit" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-01.svg')?>" alt="Tailored Fit">
                        <span class="type">Tailored Fit</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="fitting" data-value="Slim Fit" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket-03.svg')?>" alt="Slim Fit">
                        <span class="type">Slim Fit</span>
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