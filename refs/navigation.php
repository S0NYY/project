<?php 

?>
<div class="wrapper">
<header class="header-top" header-theme="light">
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div class="top-menu d-flex align-items-center">
            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
            <div class="header-search">
                <div class="input-group">
                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                </div>
            </div>
            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
        </div>
        <div class="top-menu d-flex align-items-center">
           
            <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
            
            
            <div class="dropdown">
                <a class="dropdown-toggle" href="<?php echo BASE_URL; ?>#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="img/user.jpg" alt=""></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>?mode=view&page=profile"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>login.html"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</div>
</header>

<div class="page-wrap">
<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo BASE_URL; ?>">
            <div class="logo-img">
               <img src="src/img/bta.svg" class="header-brand-img" > 
            </div>
            <span class="text">BTA</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Administrator</div>
                <div class="nav-item active">
                    <a href="<?php echo BASE_URL; ?>"><i class="ik ik-home"></i><span>მთავარი</span></a>
                </div>
                
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>სტუდენტები</span> </a>
                    <div class="submenu-content">
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=student_form" class="menu-item">სტუდენტის დამატება</a>
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=students" class="menu-item">ყველა სტუდენტი</a>
                       
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>მასწავლებელი</span></a>
                    <div class="submenu-content">
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=teacher_form" class="menu-item">მასწავლებლის დამატება</a>
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=teachers" class="menu-item">ყველა მასწავლებელი</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>საგნები</span> </a>
                    <div class="submenu-content">
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=subject_form" class="menu-item">საგნის დამატება</a>
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=subjects" class="menu-item">ყველა საგანი</a>
                       
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>ჯგუფები</span> </a>
                    <div class="submenu-content">
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=group_form" class="menu-item">ჯგუფის დამატება</a>
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=groups" class="menu-item">ყველა ჯგუფი</a>
                       
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>კურსები</span> </a>
                    <div class="submenu-content">
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=course_form" class="menu-item">კურსის დამატება</a>
                        <a href="<?php echo BASE_URL; ?>?mode=view&page=courses" class="menu-item">ყველა კურსი</a>
                       
                    </div>
                </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>pages/calendar.html"><i class="ik ik-calendar"></i><span>კალენდარი</span></a>
        </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-dollar-sign"></i><span>ბალანსი</span></a>
        </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-archive"></i><span>არქივი </span></a>
        </div>
            <div class="nav-lavel">Teachers</div>
            <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-home"></i><span>მთავარი</span></a>
        </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>?mode=view&page=test-list&teacher=1"><i class="ik ik-clipboard"></i><span>ტესტის შექმნა</span></a>
            
        </div>
          <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>?mode=view&page=test_preview&teacher=1"><i class="ik ik-file-text"></i><span>შედეგები</span></a>
        </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-edit"></i><span>დასწრება </span></a>
            
        </div>
        <!-- <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-book-open"></i><span>ცხრილი </span></a>
            
        </div> -->
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-calendar"></i><span>კალენდარი</span></a>
        </div>
        <div class="nav-lavel">Students</div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-home"></i><span>მთავარი</span></a>
        </div>
        <!-- <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-book-open"></i><span>ცხრილი </span></a>
            
        </div> -->
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-edit"></i><span>დასწრება </span></a>
            
        </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>pages/test_page/login/"><i class="ik ik-clipboard"></i><span>ტესტები</span></a>
            
        </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-calendar"></i><span>კალენდარი</span></a>
        </div>
        <div class="nav-item">
            <a href="<?php echo BASE_URL; ?>#"><i class="ik ik-dollar-sign"></i><span>ბალანსი</span></a>
        </div>

            </nav>
        </div>
    </div>
</div>
<aside class="right-sidebar">
    <div class="sidebar-chat" data-plugin="chat-sidebar">
        <div class="sidebar-chat-info">
            <h6>Chat List</h6>
            <form class="mr-t-10">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search for friends ..."> 
                    <i class="ik ik-search"></i>
                </div>
            </form>
        </div>
        <div class="chat-list">
            <div class="list-group row">
                <a href="<?php echo BASE_URL; ?>javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
                    <figure class="user--online">
                        <img src="img/user.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">ადმინისტრატორი</span>  </span>
                </a>
                <a href="<?php echo BASE_URL; ?>javascript:void(0)" class="list-group-item" data-chat-user="სოფიო მაჭარაშვილი">
                    <figure class="user--online">
                        <img src="img/user2.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">სოფიო მაჭარაშვილი</span>   </span>
                </a>
                <a href="<?php echo BASE_URL; ?>javascript:void(0)" class="list-group-item" data-chat-user="მარიამ სეფაშვილი">
                    <figure class="user--online">
                        <img src="img/user3.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">მარიამ სეფაშვილი</span>   </span>
                </a>
                
            </div>
        </div>
    </div>
</aside>

<div class="chat-panel" hidden>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <a href="<?php echo BASE_URL; ?>javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>  
            <span class="user-name">John Doe</span> 
            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="card-body">
            <div class="widget-chat-activity flex-1">
                <div class="messages">
                    <div class="message media reply">
                        <figure class="user--online">
                            <a href="<?php echo BASE_URL; ?>#">
                                 <img src="img/user2.jpg" class="rounded-circle" alt="">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>გამარჯობა გამომიგზავნეთ ID301-სტუდენტის დასწრების სია</p>
                        </div>
                    </div>
                    <div class="message media">
                        <figure class="user--online">
                            <a href="<?php echo BASE_URL; ?>#">
                                <img src="img/user.jpg" class="rounded-circle" alt="">
                            </a>
                        </figure>
                        <div class="message-body media-body">
                            <p>გასაგებია</p>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
        <form action="javascript:void(0)" class="card-footer" method="post">
            <div class="d-flex justify-content-end">
                <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                <button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
            </div>
        </form>
    </div>
</div>

<div class="main-content">

    

