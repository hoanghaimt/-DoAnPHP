<div class="menu-pri">
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 panel-left">
            <!--MOBILE-->
            <nav class="navbar navbar-default hidden-md hidden-lg" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="icon-bar primary-color"></span>
                            <span class="icon-bar primary-color"></span>
                            <span class="icon-bar primary-color"></span>
                            <span class="icon-bar primary-color"></span>
                        </button>
                        <a class="navbar-brand primary-color" href="#">Danh mục sản phẩm</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse hidden-md hidden-lg">
                        
                        <?php
                            $listcat = $this->Mcategory->category_menu(0);
                                $html_menu='<ul class="nav navbar-nav">';
                                foreach ($listcat as $menu) {
                                    $parentid = $menu['id'];
                                    $submenu = $this->Mcategory->category_menu($parentid);
                                    $html_menu.='<li class="dropdown">';
                                    $html_menu.="<a href='san-pham/".$menu['link']." ' title=' ".$menu['name']."' class='dropdown-toggle' data-toggle='dropdown'>";
                                    $html_menu.=$menu['name'];
                                    if(!empty($submenu)){
                                        $html_menu.='<i class="fa fa-angle-right pull-right" aria-hidden="true">';
                                        $html_menu.='</i>';
                                    }
                                        $html_menu.="</a>";
                                        if(count($submenu))
                                        {
                                            $html_menu.='<ul class="dropdown-menu">';
                                                foreach ($submenu as $menu1){
                                                    $html_menu.='<li>';
                                                    $html_menu.="<a href='san-pham/".$menu1['link']." ' title=' ".$menu1['name']." '> ".$menu1['name']."</a>";
                                                    $html_menu.="</li>";    
                                                }
                                            $html_menu.="</ul>";
                                        }
                                    $html_menu.="</li>";
                                }
                              
                            $html_menu.="</ul>";
                            echo $html_menu;
                        ?>  

                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <!--MD LG-->
            <div class="panel-left-md-768">
                <div class="header-768">
                    <i class="fa fa-bars fa-1x primary-color"></i>
                    <h4 class="primary-color">Danh mục sản phẩm</h4>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-lg-9 panel-right">
            <ul class="menu-right pull-right">
                <li class="pull-left"><a href="">Trang chủ</a></li>
                <li class="pull-left"><a href="san-pham">Sản phẩm</a></li>
                <li class="pull-left"><a href="tin-tuc/1">Tin tức</a></li>
                <li class="pull-left"><a href="gioi-thieu">Giới thiệu</a></li>
                <li class="pull-left"><a href="lien-he">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div> 