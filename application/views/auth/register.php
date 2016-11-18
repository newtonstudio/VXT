<div class="warpper-member margin-top-70">
                <div class="step">
                        <div class="step-top">
                            <span class="s-step">Step.</span>
                            <span class="number">1</span>
                            <span class="s-title">CHOOSE PAYMENT METHOD</span>
                        </div>
                        <div class="step-top active">
                            <span class="s-step">Step.</span>
                            <span class="number">2</span>
                            <span class="s-title">FILL IN THE ADD</span>
                        </div>
                        <div class="step-top">
                            <span class="s-step">Step.</span>
                            <span class="number">3</span>
                            <span class="s-title">SHOPPING COMPLETED</span>
                        </div>
                    </div>
                </div>
        <section class="member">
            <div class="warpper-member margin-top-70 margin-bottom-130">
            	<form id="login-form">
                <div class="member-login center-line">
                    <h2>LOGIN</h2>
                    <h3>Login into Santini Member for instant payment</h3>
                    <ul>
                        <li><input type="text" name="email" placeholder="Email" class="text-login"></li>
                        <li><input type="text" name="password" placeholder="Password" class="text-login"></li>
                        <li><input type="text" name="code" placeholder="Code" class="text-code"><img src="" alt="code"></li>
                        <li>
                            <label for="<?=base_url($init['langu'].'/forget_pwd')?>" class="text-checkbox"><input type="checkbox">Remember Username / Forgot Password?</label>
                        </li>
                    </ul>
                    <input type="submit" class="btn margin-top-110" value="SIGN IN" />
                </div>
                </form>
                <div class="member-register">
                    <h2>REGISTER</h2>
                    <h3>FIRST TRY</h3>
                    <div class="register-content">
                        <p>For simplifying the process, you do not require to sign up as a member but directly shop at the store by add-in your selection into Wishlist above.</p>
                        <p>After payment, you may choose to fill in your personal particulars and the system will automatically upgrade you as a member.</p>
                    </div>
                    <a href="<?=base_url($init['langu'].'/shop')?>" class="btn btn-next margin-top-125">NEXT</a>
                </div>
            </div>
        </section>