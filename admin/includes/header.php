<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
			<img src="assets/kc-logo.png" alt="logo"/>

                </a>

            </div>

            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                            <li><a href="add-company.php" >Add</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Clients <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-company.php">Manage Clients</a></li>
                                </ul>
                            </li>

 <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Projects /Contracts<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-projects.php">Manage Projects</a></li>
									 <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-opportunity.php">Manage Opportunities</a></li>
                                </ul>
                            </li>


                             <li><a href="reg-employee.php">Employee Registered</a></li>

  <li><a href="change-password.php">Change Password</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
