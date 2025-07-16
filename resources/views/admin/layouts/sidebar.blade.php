<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="nav navbar-nav">
                <li class="menu-title"><span>Ola Tech Solution</span></li>

                 <li class="">
                    <a href="#"><i data-feather="home"></i> <span>Dashboard</span></a>
                </li>

                <li class="submenu <?php $name = request()->segment(2); if($name == 'category' ){echo 'active';}?>">

                    <a href="#">
                        <i data-feather="clipboard"></i> <span > Category</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: <?php $name = request()->segment(2); if($name == 'category' ){echo 'block';}?>;">

                        <li class="<?php $name = request()->segment(2); if($name == 'category'){echo 'sactive'; } if($name == 'category'){echo 'sactive'; } if($name == 'category'){echo 'sactive'; } ?>">
                            <a href="{{route('category.index')}}">Category List</a>

                        </li>
                    </ul>
                </li>
                
                <li class="submenu <?php $name = request()->segment(2); if($name == 'sub-category' ){echo 'active';}?>">

                    <a href="#">
                        <i data-feather="clipboard"></i> <span >Sub Category</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: <?php $name = request()->segment(2); if($name == 'sub-category' ){echo 'block';}?>;">

                        <li class="<?php $name = request()->segment(2); if($name == 'sub-category'){echo 'sactive'; } if($name == 'sub-category'){echo 'sactive'; } if($name == 'sub-category'){echo 'sactive'; } ?>">
                            <a href="{{route('sub-category.index')}}">Sub Category List</a>

                        </li>
                    </ul>
                </li>

                <li class="submenu <?php $name = request()->segment(2); if($name == 'child-category' ){echo 'active';}?>">

                    <a href="#">
                        <i data-feather="clipboard"></i> <span >Child Category</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: <?php $name = request()->segment(2); if($name == 'child-category' ){echo 'block';}?>;">

                        <li class="<?php $name = request()->segment(2); if($name == 'child-category'){echo 'sactive'; } if($name == 'child-category'){echo 'sactive'; } if($name == 'child-category'){echo 'sactive'; } ?>">
                            <a href="{{route('child-category.index')}}">Child Category List</a>

                        </li>
                    </ul>
                </li>

                <li class="submenu <?php $name = request()->segment(2); if($name == 'product' ){echo 'active';}?>">

                    <a href="#">
                        <i data-feather="package"></i> <span > Product</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: <?php $name = request()->segment(2); if($name == 'product' ){echo 'block';}?>;">

                        <li class="<?php $name = request()->segment(2); if($name == 'product'){echo 'sactive'; } if($name == 'product'){echo 'sactive'; } if($name == 'product'){echo 'sactive'; } ?>">
                            <a href="{{route('product.index')}}">Prodcut List</a>

                        </li>

                    </ul>

                </li>
                                
            </ul>
        </div>
    </div>
</div>






