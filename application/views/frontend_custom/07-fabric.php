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
            <div class="cloth-box margin-bottom-30">
                <div class="cloth-img">
                    <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                    <span><i class="fa fa-star-o" aria-hidden="true"></i>Wishlist</span>
                </div>
                <div class="cloth-select">
                    <div id="tabs">
                      <ul class="cloth-menu">
                        <li><a href="#tabs-1">Supreme level</a></li>
                        <li><a href="#tabs-2">Advanced level</a></li>
                        <li><a href="#tabs-3">Business level</a></li>
                        <li><a href="#tabs-4">Classic level</a></li>
                      </ul>
                      <div id="tabs-1" class="panel">
                        <div class="grid grid-2-4-4">
                            <div class="grid-item opt" data-key="fabric" data-value="1">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="grid-item opt" data-key="fabric" data-value="2">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="grid-item opt" data-key="fabric" data-value="3">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                            </div>
                            <div class="grid-item opt" data-key="fabric" data-value="4">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                            </div>
                            <div class="grid-item opt" data-key="fabric" data-value="5">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="grid-item opt" data-key="fabric" data-value="6">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="grid-item opt" data-key="fabric" data-value="7">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                            </div>
                            <div class="grid-item opt" data-key="fabric" data-value="8">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                            </div>
                        </div>
                      </div>
                      <div id="tabs-2" class="panel">
                        <div class="grid grid-2-4-4">
                            <div class="grid-item opt" data-key="fabric" data-value="9">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                            </div>
                        </div>
                      </div>
                      <div id="tabs-3" class="panel">
                        <div class="grid grid-2-4-4">
                            <div class="grid-item opt" data-key="fabric" data-value="10">
                                <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                            </div>
                        </div>
                      </div>
                      <div id="tabs-4" class="panel">
                          <div class="grid grid-2-4-4">
                                <div class="grid-item opt" data-key="fabric" data-value="11">
                                    <img src="<?=base_url('assets/santini/img/cloth.jpg')?>" class="rwd" alt="">
                                    <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                </div>
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