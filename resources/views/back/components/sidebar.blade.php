<div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Control Panel</span></li>
                        @can('sliders index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('sliders.index')}}">
                                <i class="las la-photo-video"></i> <span data-key="t-widgets">Sliders</span>
                            </a>
                        </li>
                        @endcan

                        @can('banner index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('banners.index')}}">
                                <i class="las la-photo-video"></i> <span data-key="t-widgets">Banners</span>
                            </a>
                        </li>
                        @endcan

                        @can('brands index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('brands.index')}}">
                                <i class="las la-image"></i> <span data-key="t-widgets">Brands</span>
                            </a>
                        </li>
                        @endcan
                        
                        @can('store index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('stores.index')}}">
                                <i class="las la-image"></i> <span data-key="t-widgets">Stores</span>
                            </a>
                        </li>
                        @endcan

                        @can('blogs index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('blogCategory.index')}}">
                                <i class="las la-newspaper"></i> <span data-key="t-widgets">Blog Categories</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('blogTags.index')}}">
                                <i class="las la-newspaper"></i> <span data-key="t-widgets">Blog Tags</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('blogs.index')}}">
                                <i class="las la-newspaper"></i> <span data-key="t-widgets">Blogs</span>
                            </a>
                        </li>
                        @endcan
                        @can('category index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('categories.index')}}">
                                <i class="las la-folder"></i> <span data-key="t-widgets">Categories</span>
                            </a>
                        </li>
                        @endcan
                        @can('product index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('products.index')}}">
                                <i class="las la-shopping-bag"></i> <span data-key="t-widgets">Products</span>
                            </a>
                        </li>
                        @endcan
                        @can('orders index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('orders.index')}}">
                                
                                <i class="las la-shopping-bag"></i> <span data-key="t-widgets">Orders</span>
                                <p style="background: white;
    width: 25px;
    height: 25px;
    text-align: center;
    justify-content: center;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    border-radius: 50%;margin-left:10px;font-weight:bold;color:black;">{{count($noViewOrders)}}</p>
                            </a>
                        </li>
                        @endcan
                        
                        @can('one_click index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('oneClickOrders.index')}}">
                                
                                <i class="las la-shopping-bag"></i> <span data-key="t-widgets">Bir kliklə al</span>
                                <p style="background: white;
    width: 25px;
    height: 25px;
    text-align: center;
    justify-content: center;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    border-radius: 50%;margin-left:10px;font-weight:bold;color:black;">{{count($oneClickOrders)}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('services index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('services.index')}}">
                                <i class="las la-toolbox"></i><span data-key="t-widgets">Services</span>
                            </a>
                        </li>
                        @endcan
                        @can('option_groups index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                                <i class="las la-filter"></i> <span data-key="t-tables">Options</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarTables">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('option_groups.index')}}" class="nav-link" data-key="t-basic-tables">Option Groups</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('options.index')}}" class="nav-link" data-key="t-grid-js">Options</a>
                                    </li>


                                    
                                </ul>
                            </div>
                        </li>
                        @endcan
                        @can('colors index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('colors.index')}}">
                                <i class="las la-brush"></i> <span data-key="t-widgets">Colors</span>
                            </a>
                        </li>
                        @endcan

                        @can('size index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('sizes.index')}}">
                                <i class="las la-brush"></i> <span data-key="t-widgets">Size</span>
                            </a>
                        </li>
                        @endcan


                        @can('pages index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('pages.index')}}">
                                <i class="las la-comments"></i> <span data-key="t-widgets">Pages</span>
                            </a>
                        </li>
                        @endcan

                        @can('reviews index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('reviews.index')}}">
                                <i class="las la-comments"></i> <span data-key="t-widgets">Reviews</span>
                            </a>
                        </li>
                        @endcan

                        @can('customers index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('customers.index')}}">
                                <i class="las la-user-tie"></i> <span data-key="t-widgets">Customers</span>
                                
                                <p style="background: white;
    width: 25px;
    height: 25px;
    text-align: center;
    justify-content: center;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
    border-radius: 50%;margin-left:10px;font-weight:bold;color:black;">{{count($noViewCustomers)}}</p>
                            </a>
                        </li>
                        @endcan
                        
                        @can('redirect index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('redirects.index')}}">
                                <i class="las la-sync-alt"></i> <span data-key="t-widgets">Redirects</span>
                            </a>
                        </li>
                        @endcan

                        @can('users index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('users.index')}}">
                                <i class="las la-user-tie"></i> <span data-key="t-widgets">Users</span>
                            </a>
                        </li>
                        @endcan


                        @can('settings index')
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('settings.edit',['setting' => 1])}}">
                                <i class="las la-cog"></i> <span data-key="t-widgets">Settings</span>
                            </a>
                        </li>
                        @endcan

                        

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>