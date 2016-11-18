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
            <div class="font-style margin-bottom-30">
                <div class="">
                    <div id="tabs">
                  <ul class="font-menu">
                    <li><a href="#tabs-1">Font</a></li>
                    <li><a href="#tabs-2">Color</a></li>
                  </ul>
                  <div id="tabs-1" class="panel">
                    <div class="font-box">
                    <a data-key="suit-monogram-font" data-value="Regualr Script" href="javascript:;" class="style-btn opt">
                        Regualr Script
                    </a>
                    <img src="<?=base_url('assets/santini/img/regualr.png')?>" alt="">
                    </div>
                    <div class="font-box">
                    <a data-key="suit-monogram-font" data-value="Writing" href="javascript:;" class="style-btn opt">
                        Writing
                    </a>
                    <img src="<?=base_url('assets/santini/img/writing.png')?>" alt="">
                    </div>
                  </div>
                  <div id="tabs-2" class="panel">
                    <a data-key="suit-monogram-color" data-value="White" href="javascript:;" class="style-btn opt">
                        White
                    </a>
                    <a data-key="suit-monogram-color" data-value="Silver White" href="javascript:;" class="style-btn opt">
                        Silver White
                    </a>
                  </div>
                </div>
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