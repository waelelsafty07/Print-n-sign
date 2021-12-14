
        <!--====== Main Header ======-->
        <header class="header--style-1">

            <!--====== Nav 1 ======-->
            <nav class="primary-nav primary-nav-wrapper--border">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">

                        <!--====== Main Logo ======-->

                        <a class="main-logo" href="/" style="font-weight: bold;">
                        Printnsignage
                            </a>
                        <!--====== End - Main Logo ======-->

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    @if($settings->phone )
                                    <li data-tooltip="tooltip" data-placement="left" title="Contact">

                                        <a href="tel:+{{$settings->phone}}"><i class="fas fa-phone-volume"></i></a></li>
                                    @endif
                                    @if($settings->contact_email)
                                    <li data-tooltip="tooltip" data-placement="left" title="Mail">

                                        <a href="mailto:{{$settings->contact_email}}"><i class="far fa-envelope"></i></a></li>
                                    @endif
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 ======-->


            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation1">

                            <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list">
                                    <li class="has-dropdown">

                                        <span class="mega-text" style="width:43px">Menu</span>

                                        <!--====== Mega Menu ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mega-menu">
                                            <div class="mega-menu-wrap">
                                                <div class="mega-menu-list">
                                                    <ul>
                                                        @foreach($categories as $key => $category)
                                                            @if($key === 0)
                                                                <li class="js-active" >
                                                            @else
                                                                <li>    
                                                            @endif
                                                            <a href="{{route('categoryProduct',['category_id'=>$category->id])}}">

                                                                <span>{{$category->name}}</span></a>

                                                            <span class="js-menu-toggle js-toggle-mark"></span>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                                @foreach($categories as $key => $category)
                                                @if($key === 0)
                                                <div class="mega-menu-content js-active">
                                                            @else
                                                <div class="mega-menu-content ">
                                                @endif
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <p>
                                                            {{$category->description}}
                                                        </p>
                                                    </div>
                                                    @foreach($subcategories as $key => $sub)
                                                <!--====== Electronics ======-->

                                                        @if($category->id === $sub->category_id )

                                                                <!--====== Mega Menu Row ======-->
                                                                    <div class="col-lg-3">
                                                                        <ul>
                                                                            <li class="mega-list-title">

                                                                                <a href="{{route('sc_product',['category_id'=>$category->id,'subcategory_id'=>$sub->id])}}">{{$sub->name}}</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--====== End - Mega Menu Row ======-->
                                                                    <br>
                                                                    
                                                                    
                                                                    <!--====== End - Mega Menu Row ======-->
                                                                    @endif
                                                                    <!--====== End - Electronics ======-->
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            
                                            </div>
                                        </div>
                                        <!--====== End - Mega Menu ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                                    <li>

                                        <a href="shop-side-version-2.html">About Us</a></li>

                                    <li>
                                    <a href="shop-side-version-2.html">FAQ</a></li>
                                    <li>
                                    <a href="shop-side-version-2.html">Contact</a></li>
                                    
                                    <li class="has-dropdown">

                                        <a>PAGES<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:170px">
                                            <li>

                                                <a href="cart.html">Privacy policy</a></li>
                                            <li>

                                                <a href="wishlist.html">Terms of use</a></li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>

                            <span class="total-item-round">2</span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li>

                                        <a href="index.html"><i class="fas fa-home u-c-brand"></i></a></li>
                                    <li>

                                        <a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
        </header>
        <!--====== End - Main Header ======-->
