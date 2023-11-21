<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            @if (0)
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                         <div class="row d-flex justify-content-between align-items-center">
                             <div class="header-info-left">
                                 <ul>     
                                     <li><img src="assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                     <li><img src="assets/img/icon/header_icon1.png" alt="">Tuesday, 18th June, 2019</li>
                                 </ul>
                             </div>
                             <div class="header-info-right">
                                 <ul class="header-social">    
                                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                     <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                    </div>
                </div>
             </div>
            @endif
            @if (!empty($news) && !empty($news->image_url))
            <img src="{{$news->image_url}}" alt="" style="display: none">                
            @endif
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="/"><img src="/site/assets/img/logo2.png" alt=""></a>
                                </div>
                            <!-- Main-menu -->
                            @if (1)
                                
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">
                                        @if (!empty($headerCategories))
                                            @foreach ($headerCategories as $item)
                                                <li class="{{ (!empty($category) && $category->slug == $item->slug) ? 'active' : ''}}"><a href="{{route('category.index', [$item->slug])}}">{{$item->name}}</a></li>
                                            @endforeach
                                        @endif 
                                        @if (0)
                                            <li><a href="#">Category</a>
                                                <ul class="submenu">
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="details.html">Categori Details</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                        
                                    </ul>
                                </nav>
                            </div>
                            @endif

                        </div>             
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>