 <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo base_url(); ?>/bootstrap/assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $this->session->userdata('hoten'); ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <!--<li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris Charts</a>
                            </li>
                        </ul>-->
                        <!-- second-level-items --> 
                    </li>
                     <li>
                        <a href= "<?php echo base_url().'admin/cdanhmucmonhoc' ;?>"><i class="fa fa-flask fa-fw"></i>Quản lý môn học</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i>
                            <span>Quản lý bài giảng</span><span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right" style="margin-right: 10px"></i>
                            </span>
                        </a>
                         <ul class="treeview-menu">
                          <li ><a href= "<?php echo base_url().'thembg' ;?>"><i class="fa fa-circle-o"></i> Thêm bài giảng</a></li>
                        </ul>
                        <ul class="treeview-menu">
                          <li ><a href="<?php echo base_url().'dsbg' ;?>"><i class="fa fa-circle-o"></i> Danh sách bài giảng</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/cdanhmuccauhoi' ;?>"><i class="fa fa-table fa-fw"></i>Quản lý câu hỏi</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i>Quản lý đề thi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/cdanhmuctintuc/danhsachtintuc' ;?>"><i class="fa fa-table fa-fw"></i>Quản lý tin tức</a>
                    </li>

                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>