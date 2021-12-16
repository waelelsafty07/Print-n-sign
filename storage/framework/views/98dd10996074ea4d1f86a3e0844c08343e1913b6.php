<footer>
            <div class="outer-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Contact Us</span>
                                <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                                    <span><?php echo e($settings->address); ?></span></div>
                                <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                                    <span><?php echo e($settings->phone); ?></span></div>
                                <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                                    <span><?php echo e($settings->contact_email); ?></span></div>
                                <div class="outer-footer__social">
                                    <ul>
                                        <?php if($settings->facebook_link): ?>
                                        <li>
                                            <a class="s-fb--color-hover" href="<?php echo e($settings->facebook_link); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($settings->twitter_link): ?>
                                        <li>
                                        
                                            <a class="s-tw--color-hover" href="<?php echo e($settings->twitter_link); ?>"><i class="fab fa-twitter"></i></a></li>
                                        <?php endif; ?>
                                        <?php if($settings->youtube_link): ?>
                                        <li>

                                            <a class="s-youtube--color-hover" href="<?php echo e($settings->youtube_link); ?>"><i class="fab fa-youtube"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">
                                        <div class="outer-footer__list-wrap">

                                            <span class="outer-footer__content-title">Our Company</span>
                                            <ul>
                                                <li>

                                                    <a href="<?php echo e(route('AboutUs')); ?>">About us</a></li>
                                                <li>

                                                    <a href="#contactsection">Contact Us</a></li>
                                                <li>

                                                    <a href="index.html">Sitemap</a></li>
                                                <li>

                                                    <a href="dash-my-order.html">Delivery</a></li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Store</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2018</span>

                                    <a href="index.html">Print n signs</a>

                                    <span>All Right Reserved</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><?php /**PATH /opt/lampp/htdocs/laravel/dashboard/resources/views/front/layouts/footer.blade.php ENDPATH**/ ?>