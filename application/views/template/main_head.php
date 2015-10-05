<section class="container-fluid" style="background-color: whitesmoke">
            <div class="col-lg-12" style="height: 90px;">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                    <img width="200px" src="http://sellers.bulkhouse.in/assets/img/logo_bulkhouse.png" alt="Bulkhouse">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
                    <h4 style="text-align: right; color: black">Seller Portal</h4>
                    <p style="text-align: right; color: black">Support : <?php echo $this->config->item('bulk-support-number'); ?></p>
                </div>
            </div>
     <?php $this->load->view('template/headbar',array('firm_name'=>$firm_name,'firm_type'=>$firm_type)); ?>
        </section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-primary aside-sm" id="nav">
                <section class="vbox">
                    <header class="dker nav-bar" style="background-color: white">
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body" style="font-size: 3em">
                            <i class="icon-reorder" style="color: black"></i>
                        </a>
                        <a href="#" class="nav-brand visible-for-small-only" data-toggle="fullscreen"></a>
                        <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user" >

                        </a>
                    </header>

                    <section>
<!--                         user
                                                <div class="bg-info nav-user hidden-xs pos-rlt">
                                                    <div class="nav-avatar pos-rlt">
                                                        <a href="#" data-toggle="dropdown">
                                                            <i class="fa fa-user"> My Account</i>
                                                            <span class="caret caret-white"></span>
                                                        </a>
                                                        <ul class="dropdown-menu m-t-sm animated fadeInLeft">
                                                            <span class="arrow top"></span>
                                                            <li>
                                                               <a href="/main/settings"> Change Password</a>
                                                            </li>
                                                             <li class="divider"></li>
                                                            <li>
                                                                <a href="/main/view_data">Profile</a>
                                                            </li>

                                                            <li>
                                                                <a href="#">
                                                                    <span class="badge bg-danger pull-right">3</span> Notifications
                                                                </a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <a href="docs.html">Documentation</a>
                                                            </li>
                                                             <li class="divider"></li>
                                                            <li>
                                                                <a href="<?php echo site_url(); ?>user/logout">Logout</a>
                                                            </li>
                                                        </ul>

                                                    </div>-->
                        <div class="nav-msg">

                            <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                                <div class="arrow left"></div>
                                <section class="panel bg-white">
                                    <header class="panel-heading">
                                        <strong>You have
                                            <span class="count-n">2</span> notifications
                                        </strong>
                                    </header>
                                    <div class="list-group">
                                        <a href="#" class="media list-group-item">
                                            <span class="pull-left thumb-sm">
                                                <img src="/images/avatar.jpg" alt="John said" class="img-circle">
                                            </span>
                                            <span class="media-body block m-b-none"> Use awesome animate.css
                                                <br>
                                                <small class="text-muted">28 Aug 13</small>
                                            </span>
                                        </a>
                                        <a href="#" class="media list-group-item">
                                            <span class="media-body block m-b-none"> 1.0 initial released
                                                <br>
                                                <small class="text-muted">27 Aug 13</small>
                                            </span>
                                        </a>
                                    </div>
                                    <footer class="panel-footer text-sm">
                                        <a href="#" class="pull-right">
                                            <i class="icon-cog"></i>
                                        </a>
                                        <a href="#">See all the notifications</a>
                                    </footer>
                                </section>
                            </section>
                        </div>
                        </div>
                        <!-- / user -->
                        <!-- nav -->
                        <nav class="nav-primary hidden-xs">
                            <ul class="nav">
                                <li>
                                    <a href="/main">
                                        <i class="icon-dashboard"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li  >
                                    <a href="/main/bank">
                                        <i class="icon-money"></i>
                                        <span>Bank Details</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/main/view_data">
                                        <i class="icon-user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/main/settings">
                                        <i class="icon-gears"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-book"></i>
                                        <span>FAQ'S</span>
                                        <span class="label label-primary pull-right">2</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>

                                            <a href="/main/vendor_on_board"><i class="icon-question-sign"></i>Vendor on Boarding</a>
                                        </li>
                                        <li>

                                            <a href="/main/selling_process"><i class="icon-question-sign"></i>Selling Process</a>

                                        </li>

                                    </ul>
                                </li>
                                <!--
-->                         </ul>
                        </nav><!--
                                <!-- / nav -->
                                <!-- note -->

                                <!-- / note -->

                                </section>
                                </section>
                                </aside>

