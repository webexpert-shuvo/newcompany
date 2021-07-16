<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="active">
                    <a href=""><i class="fe fe-home"></i> <span>Visit Home Page</span></a>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span>Blog Post</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('show.categorypage') }}">Category</a></li>
                        <li><a href="{{ route('show.tagpage') }}">Tags</a></li>
                        <li><a href="{{ route('show.postpage') }}">Posts</a></li>
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span>Product</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('show.product.category') }}">Category</a></li>
                        <li><a href="{{ route('show.tagpage') }}">Tags</a></li>
                        <li><a href="{{ route('show.postpage') }}">Posts</a></li>
                    </ul>
                </li>




            </ul>
        </div>
    </div>
</div>
