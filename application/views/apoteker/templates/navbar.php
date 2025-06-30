<div class="iq-top-navbar rtl-iq-top-navbar ">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="index.html" class="header-logo">
                    <img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid rounded-normal light-logo" alt="logo">
                    <img src="<?= base_url('assets/images/logo-white.png') ?>" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                </a>
            </div>
            <div class="iq-search-bar device-search">

            </div>
            <div class="d-flex align-items-center">
                <div class="change-mode">
                    <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                        <div class="custom-switch-inner">
                            <p class="mb-0"> </p>
                            <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                            <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </a>
                            <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                        <a href="#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item iq-full-screen"><a href="#" class="" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                        <li class="caption-content">
                            <a href="#" class="iq-user-toggle">
                                <img src="<?= base_url('assets/images/user/01.jpg') ?>" class="img-fluid rounded" alt="user">
                            </a>
                            <div class="iq-user-dropdown">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">Profile</h4>
                                        </div>
                                        <div class="close-data text-right badge badge-primary cursor-pointer"><i class="ri-close-fill"></i></div>
                                    </div>
                                    <div class="data-scrollbar" data-scroll="2">
                                        <div class="card-body">
                                            <div class="profile-header">
                                                <div class="cover-container ">
                                                    <div class="media align-items-center mb-4">
                                                        <img src="<?= base_url('assets/images/user/01.jpg') ?>" alt="profile-bg" class="rounded img-fluid avatar-80">
                                                        <div class="media-body profile-detail ml-3 rtl-mr-3 rtl-ml-0">
                                                            <h3><?= $this->session->userdata('username') ?></h3>
                                                            <div class="d-flex flex-wrap">
                                                                <p class="mb-1"><?= $this->session->userdata('jabatan') ?></p><a href="<?= base_url('internal/logout') ?>" class=" ml-3 rtl-mr-3 rtl-ml-0">Keluar</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- <div class="row">
													<div class="col-lg-6 col-md-6  col-6 pr-0">
														<div class="profile-details text-center">
															<a href="../app/user-profile.html" class="iq-sub-card bg-primary-light rounded-small p-2">
																<div class="rounded iq-card-icon-small">
																	<i class="ri-file-user-line"></i>
																</div>
																<h6 class="mb-0 ">My Profile</h6>
															</a>
														</div>
													</div>
													<div class="col-lg-6  col-md-6 col-6">
														<div class="profile-details text-center">
															<a href="../app/user-profile-edit.html" class="iq-sub-card bg-danger-light rounded-small p-2">
																<div class="rounded iq-card-icon-small">
																	<i class="ri-profile-line"></i>
																</div>
																<h6 class="mb-0 ">Edit Profile</h6>
															</a>
														</div>
													</div>
													<div class="col-lg-6 col-md-6  col-6 pr-0">
														<div class="profile-details text-center">
															<a href="../app/user-account-setting.html" class="iq-sub-card bg-success-light rounded-small p-2">
																<div class="rounded iq-card-icon-small">
																	<i class="ri-account-box-line"></i>
																</div>
																<h6 class="mb-0 ">Account</h6>
															</a>
														</div>
													</div>
												</div> -->
                                                <div class="personal-details">
                                                    <h5 class="card-title mb-3 mt-3">Informasi Anda</h5>

                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Nama Lengkap</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0"><?= $this->session->userdata('nama') ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Alamat</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0"><?= $this->session->userdata('alamat') ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mb-2">
                                                        <div class="col-sm-6">
                                                            <h6>Nomor Hp</h6>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="mb-0"><?= $this->session->userdata('no_hp') ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>