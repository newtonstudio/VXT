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
            <hr class="space">
            <div class="select-style margin-bottom-30">
                <div class="grid grid-1-3-3">
                <div class="grid-item">
                    <a class="opt" data-key="type" data-value="jacket" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/jacket.jpg')?>" alt="Jacket">
                        <span class="type">Jacket</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="type" data-value="trousers" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/trousers.jpg')?>" alt="Trousers">
                        <span class="type">Trousers</span>
                    </a>
                </div>
                <div class="grid-item">
                    <a class="opt" data-key="type" data-value="vest" href="javascript:;">
                        <img class="rwd" src="<?=base_url('assets/santini/img/vest.jpg')?>" alt="Vest">
                        <span class="type">Vest</span>
                    </a>
                </div>
                </div>
            </div>
            <div class="pageview margin-bottom-50">
                <div class="prev">
                    <a href="<?=base_url($init['langu'].'/custom')?>" class="btn">PREVIOUS</a>
                </div>
                <div class="next">
                    <a href="<?=base_url($init['langu'].'/fitting')?>" class="btn">NEXT</a>
                </div>
            </div>
        </section>