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
            <hr class="hr-fine">
            <div class="measurement">
                <h3 class="">NEW MEASUREMENT</h3>
                <hr class="margin-bottom-20 hr-fine">
                <dl>
                    <dt>DATE</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>SHOULDERS</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>CHEST</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>CHEST WIDTH</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>BACK WIDTH</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>WAIST</dt>
                    <dd><input type="text" class="meas-text"></dd>
                </dl>
                <dl class="no-margin-right">
                    <dt>JACKET LENGTH</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>SLEEVE LENGTH</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>ARM</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>ARMHOLE</dt>
                    <dd><input type="text" class="meas-text"></dd>
                    <dt>MEMO</dt>
                    <dd><textarea></textarea></dd>
                </dl>
            </div>
            <div class="fit-suit">
                <h3>Tailored Fit Suit</h3>
                <div class="table-responsive">
                <table class="table table-small-font table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SIZE</th>
                            <th>34</th>
                            <th>35</th>
                            <th>36</th>
                            <th>37</th>
                            <th>38</th>
                            <th>39</th>
                            <th>40</th>
                            <th>41</th>
                            <th>42</th>
                            <th>43</th>
                            <th>44</th>
                            <th>45</th>
                            <th>46</th>
                            <th>47</th>
                            <th>48</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shoulders</td>
                            <td>17 1/2</td>
                            <td>17 3/4</td>
                            <td>18</td>
                            <td>18 1/4</td>
                            <td>18 1/2</td>
                            <td>18 3/4</td>
                            <td>19</td>
                            <td>19 1/4</td>
                            <td>19 1/2</td>
                            <td>19 3/4</td>
                            <td>20</td>
                            <td>20 1/4</td>
                            <td>20 1/2</td>
                            <td>20 3/4</td>
                            <td>21</td>
                        </tr>
                        <tr>
                            <td>Chest Width</td>
                            <td>13 1/2</td>
                            <td>14</td>
                            <td>14 1/2</td>
                            <td>15</td>
                            <td>15 1/2</td>
                            <td>16</td>
                            <td>16 1/2</td>
                            <td>17</td>
                            <td>17 1/2</td>
                            <td>18</td>
                            <td>18 1/2</td>
                            <td>19</td>
                            <td>19 1/2</td>
                            <td>20</td>
                            <td>20 1/2</td>
                        </tr>
                        <tr>
                            <td>Back Width</td>
                            <td>16 1/4</td>
                            <td>16 1/2</td>
                            <td>16 3/4</td>
                            <td>17</td>
                            <td>17 1/4</td>
                            <td>17 1/2</td>
                            <td>17 3/4</td>
                            <td>18</td>
                            <td>18 1/4</td>
                            <td>18 1/2</td>
                            <td>18 3/4</td>
                            <td>19</td>
                            <td>19 1/4</td>
                            <td>19 1/2</td>
                            <td>19 3/4</td>
                        </tr>
                        <tr>
                            <td>Chest</td>
                            <td>39</td>
                            <td>40</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                            <td>44</td>
                            <td>45</td>
                            <td>46</td>
                            <td>47</td>
                            <td>48</td>
                            <td>49</td>
                            <td>50</td>
                            <td>51</td>
                            <td>52</td>
                            <td>53</td>
                        </tr>
                        <tr>
                            <td>Waist</td>
                            <td>35</td>
                            <td>36</td>
                            <td>37</td>
                            <td>38</td>
                            <td>39</td>
                            <td>40</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                            <td>44</td>
                            <td>45</td>
                            <td>46</td>
                            <td>47</td>
                            <td>48</td>
                            <td>49</td>
                        </tr>
                        <tr>
                            <td>Hip</td>
                            <td>40</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                            <td>44</td>
                            <td>45</td>
                            <td>46</td>
                            <td>47</td>
                            <td>48</td>
                            <td>49</td>
                            <td>50</td>
                            <td>51</td>
                            <td>52</td>
                            <td>53</td>
                            <td>54</td>
                        </tr>
                        <tr>
                            <td>Jacket Length</td>
                            <td>28 1/4</td>
                            <td>28 3/8</td>
                            <td>28 1/2</td>
                            <td>28 5/8</td>
                            <td>28 3/4</td>
                            <td>28 7/8</td>
                            <td>29</td>
                            <td>29 1/8</td>
                            <td>29 1/4</td>
                            <td>29 3/8</td>
                            <td>29 1/2</td>
                            <td>29 5/8</td>
                            <td>28 3/4</td>
                            <td>29 7/8</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>Sleeve Length</td>
                            <td>23 1/4</td>
                            <td>23 3/8</td>
                            <td>23 1/2</td>
                            <td>23 5/8</td>
                            <td>23 3/4</td>
                            <td>23 7/8</td>
                            <td>24</td>
                            <td>24 1/8</td>
                            <td>24 1/4</td>
                            <td>24 3/8</td>
                            <td>24 1/2</td>
                            <td>24 5/8</td>
                            <td>24 3/4</td>
                            <td>24 7/8</td>
                            <td>25</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <p class="unit">Unit: Inch</p>
            </div>
            <div class="fit-suit">
                <h3>Slim Fit Suit</h3>
                <div class="table-responsive">
                <table class="table table-small-font table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SIZE</th>
                            <th>34</th>
                            <th>35</th>
                            <th>36</th>
                            <th>37</th>
                            <th>38</th>
                            <th>39</th>
                            <th>40</th>
                            <th>41</th>
                            <th>42</th>
                            <th>43</th>
                            <th>44</th>
                            <th>45</th>
                            <th>46</th>
                            <th>47</th>
                            <th>48</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shoulders</td>
                            <td>16 1/2</td>
                            <td>16 3/4</td>
                            <td>17</td>
                            <td>17 1/4</td>
                            <td>17 1/2</td>
                            <td>17 3/4</td>
                            <td>18</td>
                            <td>18 1/4</td>
                            <td>18 1/2</td>
                            <td>18 3/4</td>
                            <td>19</td>
                            <td>19 1/4</td>
                            <td>19 1/2</td>
                            <td>19 3/4</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>Back Width</td>
                            <td>15 1/2</td>
                            <td>15 3/4</td>
                            <td>16</td>
                            <td>16 1/4</td>
                            <td>16 1/2</td>
                            <td>16 3/4</td>
                            <td>17</td>
                            <td>17 1/4</td>
                            <td>17 1/2</td>
                            <td>17 3/4</td>
                            <td>18</td>
                            <td>18 1/4</td>
                            <td>18 1/2</td>
                            <td>18 3/4</td>
                            <td>19</td>
                        </tr>
                        <tr>
                            <td>Chest</td>
                            <td>37</td>
                            <td>38</td>
                            <td>39</td>
                            <td>40</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                            <td>44</td>
                            <td>45</td>
                            <td>46</td>
                            <td>47</td>
                            <td>48</td>
                            <td>49</td>
                            <td>50</td>
                            <td>51</td>
                        </tr>
                        <tr>
                            <td>Waist</td>
                            <td>32 1/2</td>
                            <td>33 1/2</td>
                            <td>34 1/2</td>
                            <td>35 1/2</td>
                            <td>36 1/2</td>
                            <td>37 1/2</td>
                            <td>38 1/2</td>
                            <td>39 1/2</td>
                            <td>40 1/2</td>
                            <td>41 1/2</td>
                            <td>42 1/2</td>
                            <td>43 1/2</td>
                            <td>44 1/2</td>
                            <td>45 1/2</td>
                            <td>46 1/2</td>
                        </tr>
                        <tr>
                            <td>Hip</td>
                            <td>38</td>
                            <td>39</td>
                            <td>40</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                            <td>44</td>
                            <td>45</td>
                            <td>46</td>
                            <td>47</td>
                            <td>48</td>
                            <td>49</td>
                            <td>50</td>
                            <td>51</td>
                            <td>52</td>
                        </tr>
                        <tr>
                            <td>Back Length</td>
                            <td>27 1/4</td>
                            <td>27 3/8</td>
                            <td>27 1/2</td>
                            <td>27 5/8</td>
                            <td>27 3/4</td>
                            <td>27 7/8</td>
                            <td>28</td>
                            <td>28 1/8</td>
                            <td>28 1/4</td>
                            <td>28 3/8</td>
                            <td>28 1/2</td>
                            <td>28 5/8</td>
                            <td>28 3/4</td>
                            <td>28 7/8</td>
                            <td>29</td>
                        </tr>
                        <tr>
                            <td>Sleeve Length</td>
                            <td>23</td>
                            <td>41</td>
                            <td>42</td>
                            <td>43</td>
                            <td>44</td>
                            <td>45</td>
                            <td>46</td>
                            <td>47</td>
                            <td>48</td>
                            <td>49</td>
                            <td>50</td>
                            <td>51</td>
                            <td>52</td>
                            <td>53</td>
                            <td>54</td>
                        </tr>
                        <tr>
                            <td>Arm</td>
                            <td>6 11/16</td>
                            <td>6 13/16</td>
                            <td>6 15/16</td>
                            <td>7 1/16</td>
                            <td>7 3/16</td>
                            <td>7 5/16</td>
                            <td>7 9/16</td>
                            <td>7 11/16</td>
                            <td>7 13/16</td>
                            <td>7 15/16</td>
                            <td>8 1/16</td>
                            <td>8 3/16</td>
                            <td>8 5/16</td>
                            <td>8 5/16</td>
                            <td>8 7/16</td>
                        </tr>
                        <tr>
                            <td>Sleeve hole</td>
                            <td>5 1/8</td>
                            <td>5 3/16</td>
                            <td>5 1/4</td>
                            <td>5 5/16</td>
                            <td>5 3/8</td>
                            <td>5 7/16</td>
                            <td>5 1/2</td>
                            <td>5 9/16</td>
                            <td>5 5/8</td>
                            <td>5 11/16</td>
                            <td>5 3/4</td>
                            <td>5 13/16</td>
                            <td>5 7/8</td>
                            <td>5 15/16</td>
                            <td>6</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <p class="unit">Unit: Inch</p>
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
            <hr class="hr-fine margin-bottom-50">
                <div class="measurement">
                    <div class="login-title">
                        <h3 class="">LAST MEASUREMENT</h3>
                        <a href="" class="btn btn-login">
                            LOGIN
                        </a>
                    </div>
                    <hr class="margin-bottom-20 hr-fine">
                    <dl>
                        <dt>DATE</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>SHOULDERS</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>CHEST</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>CHEST WIDTH</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>BACK WIDTH</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>WAIST</dt>
                        <dd><input type="text" class="meas-text"></dd>
                    </dl>
                    <dl class="no-margin-right">
                        <dt>JACKET LENGTH</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>SLEEVE LENGTH</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>ARM</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>ARMHOLE</dt>
                        <dd><input type="text" class="meas-text"></dd>
                        <dt>MEMO</dt>
                        <dd><textarea></textarea></dd>
                    </dl>
                </div>
            </div>
        </section>