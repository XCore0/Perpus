<style>
    /* Optional: To make the form appear as a modal */
    #productForm {

        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        justify-content: center;
        align-items: center;
    }

    #productForm .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 500px;
        margin: auto;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    @media (max-width: 768px) {
        .flex-wrap {
            gap: 1rem;
        }
        
        .flex-1 {
            flex: 1 1 100% !important;
        }
        
        #applyFilter {
            width: 100%;
        }
    }

    /* Ensure consistent heights */
    .form-select, .form-control {
        height: 41px;
    }

    /* Improve filter container spacing */
    .filter-container {
        margin: -0.5rem;
    }
    
    .filter-container > div {
        padding: 0.5rem;
    }

    /* Add to your existing styles */
    .book-list {
        max-height: 150px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: rgba(156, 163, 175, 0.5) transparent;
    }

    .book-list::-webkit-scrollbar {
        width: 6px;
    }

    .book-list::-webkit-scrollbar-track {
        background: transparent;
    }

    .book-list::-webkit-scrollbar-thumb {
        background-color: rgba(156, 163, 175, 0.5);
        border-radius: 3px;
    }

    .book-item {
        padding: 2px 4px;
        border-radius: 4px;
        background-color: rgba(var(--color-primary), 0.1);
        margin: 2px 0;
        white-space: normal;
        text-align: center;
        line-height: 1.2;
    }
</style>

<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="<?= base_url('dist/images/logo.svg') ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Kategori Buku - Perpustakaan Digital</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?= base_url('dist/css/app.css') ?>" />
    <!-- END: CSS Assets-->
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- jQuery (diperlukan untuk Toastr) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css" rel="stylesheet">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<!-- END: Head -->

<body class="py-5">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <div class="scrollable">
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            <ul class="scrollable__content py-2">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 3 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-4.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 4 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="menu__title"> Menu Layout <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Side Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Simple Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-dashboard-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Top Menu </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                        <div class="menu__title"> E-Commerce <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-categories.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Categories </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-add-product.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Add Product </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Products <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-product-list.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Product List</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-product-grid.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Product Grid</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Transactions <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-transaction-list.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Transaction List</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-transaction-detail.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Transaction Detail</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Sellers <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-seller-list.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Seller List</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-seller-detail.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Seller Detail</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="side-menu-light-reviews.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Reviews </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-light-inbox.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="menu__title"> Inbox </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-file-manager.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="hard-drive"></i> </div>
                        <div class="menu__title"> File Manager </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-point-of-sale.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="credit-card"></i> </div>
                        <div class="menu__title"> Point of Sale </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-chat.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="message-square"></i> </div>
                        <div class="menu__title"> Chat </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-post.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="menu__title"> Post </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-calendar.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="calendar"></i> </div>
                        <div class="menu__title"> Calendar </div>
                    </a>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="menu__title"> Crud <i data-lucide="chevron-down"
                                class="menu__sub-icon transform rotate-180"></i> </div>
                    </a>
                    <ul class="menu__sub-open">
                        <li>
                            <a href="side-menu-light-crud-data-list.html" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Data List </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-crud-form.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Form </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-users-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Layout 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-users-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Layout 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-users-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Layout 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="trello"></i> </div>
                        <div class="menu__title"> Profile <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="layout"></i> </div>
                        <div class="menu__title"> Pages <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Wizards <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-wizard-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wizard-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wizard-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Blog <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-blog-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-blog-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-blog-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Pricing <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-pricing-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-pricing-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Invoice <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-invoice-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-invoice-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> FAQ <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-faq-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-faq-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-faq-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login-light-login.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Login </div>
                            </a>
                        </li>
                        <li>
                            <a href="login-light-register.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Register </div>
                            </a>
                        </li>
                        <li>
                            <a href="main-light-error-page.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Error Page </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-update-profile.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Update profile </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-change-password.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Change Password </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="menu__title"> Components <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Table <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-regular-table.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Regular Table</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-tabulator.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Tabulator</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overlay <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-modal.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Modal</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-slide-over.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Slide Over</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-notification.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Notification</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="side-menu-light-tab.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tab </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-accordion.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Accordion </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-button.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Button </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-alert.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Alert </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-progress-bar.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Progress Bar </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-tooltip.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tooltip </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dropdown.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Dropdown </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-typography.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Typography </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-icon.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Icon </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-loading-icon.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Loading Icon </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="sidebar"></i> </div>
                        <div class="menu__title"> Forms <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-regular-form.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Regular Form </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-datepicker.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Datepicker </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-tom-select.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tom Select </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-file-upload.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> File Upload </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Wysiwyg Editor <i data-lucide="chevron-down"
                                        class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-classic.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Classic</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-inline.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Inline</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-balloon.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Balloon</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-balloon-block.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Balloon Block</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-document.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Document</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="side-menu-light-validation.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Validation </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="hard-drive"></i> </div>
                        <div class="menu__title"> Widgets <i data-lucide="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-chart.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Chart </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-slider.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Slider </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-image-zoom.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Image Zoom </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex mt-[4.7rem] md:mt-0">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="LiteraSky" class="w-6" src="<?= base_url('dist/images/logo.svg') ?>">
                <span class="hidden xl:block text-white text-lg ml-3">LiteraSky</span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="<?= route_to('Admin.Dashboard') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                        <div class="side-menu__title">
                            Data Master
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="<?= route_to('Admin.Kategori') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                                <div class="side-menu__title"> Kategori Buku </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= route_to('Admin.Buku') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="book-open"></i> </div>
                                <div class="side-menu__title"> Data Buku </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= route_to('Admin.User') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="side-menu__title"> Pengguna </div>
                    </a>
                </li>
                <li>
                    <a href="<?= route_to('Admin.PeminjamanPengembalian') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                        <div class="side-menu__title"> Peminjaman dan Pengembalian </div>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Auth/Logout') ?>" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="log-out"></i> </div>
                        <div class="side-menu__title"> Keluar </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <div class="w-full">
                    <!-- Filter Box -->
                    <div class="intro-y box p-5 mt-5">
                        <div class="flex flex-col md:flex-row items-center justify-between mb-5">
                            <h2 class="text-lg font-medium">Filter Data Peminjaman</h2>
                            
                            <!-- Print Button -->
                            <button onclick="printFilteredData()" class="btn btn-primary shadow-md">
                                <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Cetak Data
                            </button>
                        </div>

                        <div class="flex flex-wrap gap-4 items-end">
                            <!-- Filter Type -->
                            <div class="flex-1 min-w-[200px]">
                                <label class="form-label font-medium">Tipe Filter</label>
                                <select class="form-select w-full" id="filterType">
                                    <option value="all">Semua Data</option>
                                    <option value="predefined">Rentang Waktu</option>
                                    <option value="custom">Tanggal Custom</option>
                                    <option value="monthly">Bulanan</option>
                                    <option value="yearly">Tahunan</option>
                                </select>
                            </div>

                            <!-- Predefined Period -->
                            <div id="predefinedFilter" class="flex-1 min-w-[200px] hidden">
                                <label class="form-label font-medium">Periode</label>
                                <select class="form-select w-full" id="filterPeriode">
                                    <option value="7">7 Hari Terakhir</option>
                                    <option value="30">30 Hari Terakhir</option>
                                    <option value="90">90 Hari Terakhir</option>
                                    <option value="180">6 Bulan Terakhir</option>
                                    <option value="365">1 Tahun Terakhir</option>
                                </select>
                            </div>

                            <!-- Custom Date Range -->
                            <div id="customFilter" class="hidden flex-1 min-w-[400px]">
                                <label class="form-label font-medium">Rentang Tanggal</label>
                                <div class="flex gap-2">
                                    <input type="date" class="form-control w-full" id="startDate" placeholder="Tanggal Awal">
                                    <input type="date" class="form-control w-full" id="endDate" placeholder="Tanggal Akhir">
                                </div>
                            </div>

                            <!-- Monthly Filter -->
                            <div id="monthlyFilter" class="hidden flex-1 min-w-[300px]">
                                <label class="form-label font-medium">Periode Bulanan</label>
                                <div class="flex gap-2">
                                    <select class="form-select flex-1" id="monthSelect">
                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option value="<?= $i ?>" <?= date('n') == $i ? 'selected' : '' ?>>
                                                <?= date('F', mktime(0, 0, 0, $i, 1)) ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                    <select class="form-select flex-1" id="yearSelectMonth">
                                        <?php for($i = date('Y'); $i >= date('Y')-5; $i--): ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Yearly Filter -->
                            <div id="yearlyFilter" class="hidden flex-1 min-w-[200px]">
                                <label class="form-label font-medium">Tahun</label>
                                <select class="form-select w-full" id="yearSelect">
                                    <?php for($i = date('Y'); $i >= date('Y')-5; $i--): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                            <!-- Status Filter -->
                            <div class="flex-1 min-w-[200px]">
                                <label class="form-label font-medium">Status</label>
                                <select id="statusFilter" class="form-select w-full">
                                    <option value="">Semua Status</option>
                                    <option value="Dipinjam">Dipinjam</option>
                                    <option value="Dikembalikan">Dikembalikan</option>
                                    <option value="Terlambat">Terlambat</option>
                                </select>
                            </div>

                            <!-- Search Box -->
                            <div class="flex-1 min-w-[200px]">
                                <label class="form-label font-medium">Pencarian</label>
                                <div class="relative">
                                    <input type="text" 
                                           class="form-control w-full" 
                                           id="searchInput" 
                                           placeholder="Cari nama atau buku...">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <i data-lucide="search" class="w-4 h-4 text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Apply Filter Button -->
                            <div class="flex-none">
                                <button id="applyFilter" class="btn btn-primary h-[41px]">
                                    <i data-lucide="filter" class="w-4 h-4 mr-2"></i>
                                    Terapkan
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Table Content -->
                    <div class="intro-y box p-5 mt-5">
                        <div class="overflow-x-auto">
                            <table class="table table-report -mt-2">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">FOTO</th>
                                        <th class="whitespace-nowrap">NAMA PEMINJAM</th>
                                        <th class="text-center whitespace-nowrap">BUKU DIPINJAM</th>
                                        <th class="text-center whitespace-nowrap">TANGGAL PINJAM</th>
                                        <th class="text-center whitespace-nowrap">TANGGAL KEMBALI</th>
                                        <th class="text-center whitespace-nowrap">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // Filter data berdasarkan parameter yang dipilih
                                    $filteredPeminjaman = $peminjaman;
                                    
                                    if (isset($_GET['filter_type'])) {
                                        switch($_GET['filter_type']) {
                                            case 'predefined':
                                                $days = intval($_GET['period']);
                                                $filteredPeminjaman = array_filter($peminjaman, function($pinjam) use ($days) {
                                                    $tanggalPinjam = strtotime(explode(',', $pinjam['TanggalPeminjaman'])[0]);
                                                    $startDate = strtotime("-$days days");
                                                    return $tanggalPinjam >= $startDate;
                                                });
                                                break;

                                            case 'custom':
                                                $startDate = strtotime($_GET['start_date']);
                                                $endDate = strtotime($_GET['end_date']);
                                                $filteredPeminjaman = array_filter($peminjaman, function($pinjam) use ($startDate, $endDate) {
                                                    $tanggalPinjam = strtotime(explode(',', $pinjam['TanggalPeminjaman'])[0]);
                                                    return $tanggalPinjam >= $startDate && $tanggalPinjam <= $endDate;
                                                });
                                                break;

                                            case 'monthly':
                                                $month = $_GET['month'];
                                                $year = $_GET['year'];
                                                $filteredPeminjaman = array_filter($peminjaman, function($pinjam) use ($month, $year) {
                                                    $tanggalPinjam = date_parse(explode(',', $pinjam['TanggalPeminjaman'])[0]);
                                                    return $tanggalPinjam['month'] == $month && $tanggalPinjam['year'] == $year;
                                                });
                                                break;

                                            case 'yearly':
                                                $year = $_GET['year'];
                                                $filteredPeminjaman = array_filter($peminjaman, function($pinjam) use ($year) {
                                                    $tanggalPinjam = date_parse(explode(',', $pinjam['TanggalPeminjaman'])[0]);
                                                    return $tanggalPinjam['year'] == $year;
                                                });
                                                break;
                                        }
                                    }

                                    // Filter berdasarkan status jika ada
                                    if (!empty($_GET['status'])) {
                                        $status = $_GET['status'];
                                        $filteredPeminjaman = array_filter($filteredPeminjaman, function($pinjam) use ($status) {
                                            return strpos($pinjam['StatusPeminjaman'], $status) !== false;
                                        });
                                    }

                                    // Filter berdasarkan pencarian jika ada
                                    if (!empty($_GET['search'])) {
                                        $search = strtolower($_GET['search']);
                                        $filteredPeminjaman = array_filter($filteredPeminjaman, function($pinjam) use ($search) {
                                            return strpos(strtolower($pinjam['NamaLengkap']), $search) !== false ||
                                                   strpos(strtolower($pinjam['Buku']), $search) !== false;
                                        });
                                    }

                                    foreach ($filteredPeminjaman as $pinjam): 
                                    ?>
                                        <tr class="intro-x">
                                            <td class="w-40">
                                                <div class="flex">
                                                    <div class="w-10 h-10 image-fit">
                                                        <div class="w-full h-full rounded-full bg-primary text-white flex items-center justify-center font-bold text-lg">
                                                            <?= substr($pinjam['NamaLengkap'], 0, 1) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="font-medium whitespace-nowrap"><?= $pinjam['NamaLengkap'] ?></a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?= $pinjam['Username'] ?></div>
                                            </td>
                                            <td class="text-center">
                                                <div class="book-list flex flex-col items-center">
                                                    <?php
                                                    $bukuList = explode(',', $pinjam['Buku']);
                                                    foreach ($bukuList as $index => $buku):
                                                    ?>
                                                        <span class="book-item text-xs <?= $index > 0 ? 'mt-1' : '' ?>"><?= trim($buku) ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <?= date('d M Y', strtotime(explode(',', $pinjam['TanggalPeminjaman'])[0])) ?>
                                            </td>
                                            <td class="text-center">
                                                <?= date('d M Y', strtotime(explode(',', $pinjam['TanggalPengembalian'])[0])) ?>
                                            </td>
                                            <!-- Status column remains unchanged -->
                                            <td class="text-center">
                                                <?php
                                                $statusList = explode(',', $pinjam['StatusPeminjaman']);
                                                $tanggalKembaliList = explode(',', $pinjam['TanggalPengembalian']);
                                                $uniqueStatus = array_unique($statusList);
                                                $mainStatus = $uniqueStatus[0];

                                                // Tentukan warna dan style berdasarkan status
                                                $statusStyles = [
                                                    'Dipinjam' => [
                                                        'bg' => 'bg-primary/20',
                                                        'text' => 'text-primary',
                                                        'icon' => 'book-open'
                                                    ],
                                                    'Dikembalikan' => [
                                                        'bg' => 'bg-success/20',
                                                        'text' => 'text-success',
                                                        'icon' => 'check-circle'
                                                    ],
                                                    'Terlambat' => [
                                                        'bg' => 'bg-danger/20',
                                                        'text' => 'text-danger',
                                                        'icon' => 'alert-circle'
                                                    ]
                                                ];

                                                $style = $statusStyles[$mainStatus] ?? $statusStyles['Dipinjam'];
                                                ?>

                                                <div class="flex flex-col items-center gap-3">
                                                    <!-- Status Badge -->
                                                    <div class="flex items-center justify-center">
                                                        <div class="status-badge px-4 py-2 rounded-full <?= $style['bg'] ?> <?= $style['text'] ?> flex items-center gap-2">
                                                            <i data-lucide="<?= $style['icon'] ?>" class="w-4 h-4"></i>
                                                            <span class="font-medium"><?= $mainStatus ?></span>
                                                        </div>
                                                    </div>

                                                    <!-- Status Update Form -->
                                                    <form action="<?= base_url('admin/peminjaman/updateStatus/' . $pinjam['UserID']) ?>"
                                                        method="POST" class="w-full max-w-xs">
                                                        <select name="status"
                                                            class="form-select w-full text-sm border-2 rounded-lg transition-colors
                                                                   focus:border-primary focus:ring focus:ring-primary/20"
                                                            onchange="confirmStatusUpdate(this)">
                                                            <option value="Dipinjam" <?= $mainStatus === 'Dipinjam' ? 'selected' : '' ?>>
                                                                📚 Dipinjam
                                                            </option>
                                                            <option value="Dikembalikan" <?= $mainStatus === 'Dikembalikan' ? 'selected' : '' ?>>
                                                                ✅ Dikembalikan
                                                            </option>
                                                            <option value="Terlambat"
                                                                <?= $mainStatus === 'Terlambat' ? 'selected' : '' ?>
                                                                disabled
                                                                style="color: #999; background-color: #f3f4f6;">
                                                                ⚠️ Terlambat (Otomatis)
                                                            </option>
                                                        </select>
                                                    </form>

                                                    <!-- Informasi Denda -->
                                                    <div class="denda-info text-xs"
                                                        data-tanggal-kembali='<?= $pinjam["TanggalPengembalian"] ?>'
                                                        data-status='<?= $pinjam["StatusPeminjaman"] ?>'
                                                        data-buku='<?= $pinjam["Buku"] ?>'>
                                                        <div class="denda-amount text-danger font-medium"></div>
                                                        <div class="time-remaining"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                    <?php if (empty($filteredPeminjaman)): ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <div class="flex flex-col items-center justify-center text-gray-500">
                                                    <i data-lucide="search" class="w-16 h-16 mb-2"></i>
                                                    <p>Tidak ada data yang sesuai dengan filter</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="<?= base_url('dist/js/app.js') ?>"></script>
    <!-- END: JS Assets-->
    <script src="https://cdn.jsdelivr.net/npm/lucide-icons@latest/dist/lucide.umd.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            lucide.set();
        });
    </script>

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Apakah anda yakin?</div>
                        <div class="text-slate-500 mt-2">Apakah anda benar-benar ingin menghapus data ini? <br>Data yang sudah dihapus tidak dapat dikembalikan.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Batal</button>
                        <a href="" class="btn btn-danger w-24" id="delete-confirm-btn">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

    <!-- Script untuk konfirmasi delete -->
    <script>
        function deleteConfirm(url) {
            const modal = tailwind.Modal.getInstance(document.querySelector("#delete-confirmation-modal"));
            document.querySelector('#delete-confirm-btn').href = url;
            modal.show();
        }

        // Tampilkan notifikasi jika ada
        <?php if (session()->getFlashdata('success')): ?>
            toastr.success('<?= session()->getFlashdata('success') ?>');
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            toastr.error('<?= session()->getFlashdata('error') ?>');
        <?php endif; ?>
    </script>

    <!-- BEGIN: Custom JS -->
    <script>
        function confirmStatusUpdate(selectElement) {
            const previousValue = selectElement.getAttribute('data-previous') || 'Dipinjam';
            const newValue = selectElement.value;

            // Jika status Terlambat, tidak bisa diubah manual
            if (previousValue === 'Terlambat') {
                Swal.fire({
                    title: 'Tidak dapat mengubah status',
                    text: 'Status Terlambat ditentukan secara otomatis oleh sistem',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                selectElement.value = 'Terlambat';
                return;
            }

            const statusEmoji = {
                'Dipinjam': '📚',
                'Dikembalikan': '✅',
                'Terlambat': '⚠️'
            };

            Swal.fire({
                title: 'Ubah Status?',
                html: `
                <div class="flex flex-col items-center gap-3">
                    <div class="text-lg">
                        ${statusEmoji[previousValue] || ''} ${previousValue}
                        <i class="fas fa-arrow-right mx-2"></i>
                        ${statusEmoji[newValue] || ''} ${newValue}
                    </div>
                    <div class="text-sm text-slate-500">
                        Apakah Anda yakin ingin mengubah status peminjaman ini?
                    </div>
                </div>
            `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    container: 'custom-swal-container',
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    htmlContainer: 'custom-swal-html',
                    actions: 'custom-swal-actions'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Memproses...',
                        html: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form
                    selectElement.form.submit();
                } else {
                    // Kembalikan ke nilai sebelumnya
                    selectElement.value = previousValue;
                }
            }).catch(error => {
                console.error('Error in confirmStatusUpdate:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat memproses permintaan',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }

        // Update event listener untuk select
        document.querySelectorAll('select[name="status"]').forEach(select => {
            // Set nilai awal
            select.setAttribute('data-previous', select.value);

            // Tambahkan style untuk option yang disabled
            const terlambatOption = select.querySelector('option[value="Terlambat"]');
            if (terlambatOption) {
                terlambatOption.style.backgroundColor = '#f3f4f6';
                terlambatOption.style.color = '#999';
                terlambatOption.style.fontStyle = 'italic';
            }

            // Update nilai saat fokus
            select.addEventListener('focus', function() {
                this.setAttribute('data-previous', this.value);
            });

            // Tangani perubahan status
            select.addEventListener('change', function(event) {
                const currentValue = this.value;
                const previousValue = this.getAttribute('data-previous');

                // Jika mencoba mengubah dari status Terlambat
                if (previousValue === 'Terlambat') {
                    event.preventDefault();
                    this.value = 'Terlambat';
                    Swal.fire({
                        title: 'Tidak dapat mengubah status',
                        text: 'Status Terlambat ditentukan secara otomatis oleh sistem',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Validasi nilai
                if (!currentValue) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Error!',
                        text: 'Silakan pilih status yang valid',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    this.value = previousValue;
                }
            });
        });

        // Tambahkan style untuk option yang disabled
        const style = document.createElement('style');
        style.textContent = `
        select option[value="Terlambat"][disabled] {
            background-color: #f3f4f6 !important;
            color: #999 !important;
            font-style: italic;
        }
        
        select option[value="Terlambat"][disabled]:hover {
            background-color: #f3f4f6 !important;
            cursor: not-allowed;
        }
    `;
        document.head.appendChild(style);
    </script>

    <!-- Di bagian bawah file, tambahkan script untuk menghitung denda -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function hitungDenda(tanggalKembali, status) {
                const DENDA_PER_HARI = 10000;
                const today = new Date();
                const dueDate = new Date(tanggalKembali);

                // Hanya hitung denda jika status Terlambat
                if (status !== 'Terlambat') {
                    return 0;
                }

                const diffTime = Math.abs(today - dueDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                // Hitung denda total (bukan per buku)
                return diffDays * DENDA_PER_HARI;
            }

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(angka);
            }

            function updateDendaInfo() {
                document.querySelectorAll('.denda-info').forEach(element => {
                    try {
                        const tanggalKembaliList = element.dataset.tanggalKembali.split(',');
                        const statusList = element.dataset.status.split(',');

                        // Cari tanggal terlambat paling akhir
                        let latestDueDate = null;
                        let isLate = false;

                        for (let i = 0; i < statusList.length; i++) {
                            if (statusList[i].trim() === 'Terlambat') {
                                const currentDate = new Date(tanggalKembaliList[i].trim());
                                if (!latestDueDate || currentDate > latestDueDate) {
                                    latestDueDate = currentDate;
                                    isLate = true;
                                }
                            }
                        }

                        // Hitung denda total
                        let totalDenda = 0;
                        if (isLate && latestDueDate) {
                            const today = new Date();
                            const diffTime = Math.abs(today - latestDueDate);
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            totalDenda = diffDays * 10000; // Rp 10.000 per hari
                        }

                        // Tampilkan denda
                        const dendaElement = element.querySelector('.denda-amount');
                        if (totalDenda > 0) {
                            const hari = Math.ceil(totalDenda / 10000);
                            dendaElement.innerHTML = `
                            <div class="bg-danger/10 text-danger px-3 py-2 rounded-lg">
                                <div class="font-bold mb-1">Total Denda</div>
                                <div class="text-xl font-bold mb-1">${formatRupiah(totalDenda)}</div>
                                <div class="text-xs text-danger/70">
                                    Terlambat ${hari} hari
                                </div>
                            </div>
                        `;
                            dendaElement.classList.add('animate-pulse');
                        } else {
                            dendaElement.innerHTML = '';
                            dendaElement.classList.remove('animate-pulse');
                        }
                    } catch (error) {
                        console.error('Error updating denda:', error);
                    }
                });
            }

            // Update setiap menit
            updateDendaInfo();
            setInterval(updateDendaInfo, 60000);
        });

        // Style untuk tampilan denda
        const dendaStyle = document.createElement('style');
        dendaStyle.textContent = `
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: .7; }
        }

        .text-danger { color: #dc2626; }
        .text-danger\/70 { color: rgba(220, 38, 38, 0.7); }
        .text-warning { color: #f59e0b; }
        .bg-danger\/10 { background-color: rgba(220, 38, 38, 0.1); }

        .truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            max-width: 200px;
        }
    `;
        document.head.appendChild(dendaStyle);
    </script>

    <!-- Tambahkan style untuk animasi dan warna -->
    <style>
        .text-warning {
            color: #ff9800;
        }

        .time-remaining {
            transition: all 0.3s ease;
        }

        .time-remaining.text-danger {
            animation: pulse-danger 2s infinite;
        }

        @keyframes pulse-danger {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }
    </style>

    <!-- Script untuk filter -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('statusFilter');
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('table tbody tr');

            function filterTable() {
                const statusValue = statusFilter.value.toLowerCase();
                const searchValue = searchInput.value.toLowerCase();

                tableRows.forEach(row => {
                    // Ambil status dari badge status
                    const statusBadge = row.querySelector('.status-badge');
                    const statusText = statusBadge ? statusBadge.textContent.trim().toLowerCase() : '';

                    // Ambil nama peminjam (kolom kedua)
                    const nameCell = row.querySelector('td:nth-child(2)');
                    const nameText = nameCell ? nameCell.textContent.trim().toLowerCase() : '';

                    // Ambil buku yang dipinjam (kolom ketiga)
                    const bookCell = row.querySelector('td:nth-child(3)');
                    const bookText = bookCell ? bookCell.textContent.trim().toLowerCase() : '';

                    // Logika filter
                    const matchesStatus = !statusValue || statusText.includes(statusValue);
                    const matchesSearch = !searchValue ||
                        nameText.includes(searchValue) ||
                        bookText.includes(searchValue);

                    // Tampilkan atau sembunyikan baris
                    if (matchesStatus && matchesSearch) {
                        row.style.display = '';
                        row.classList.add('animate-fade-in');
                    } else {
                        row.style.display = 'none';
                        row.classList.remove('animate-fade-in');
                    }
                });

                // Update counter
                updateDataCount();
            }

            function updateDataCount() {
                const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none').length;
                const totalRows = tableRows.length;

                let countElement = document.getElementById('dataCount');
                if (!countElement) {
                    countElement = document.createElement('div');
                    countElement.id = 'dataCount';
                    countElement.className = 'text-slate-500 text-sm mt-3 ml-5';
                    document.querySelector('.intro-y.box').appendChild(countElement);
                }

                countElement.innerHTML = `
                <div class="flex items-center"></div>
                    <i data-lucide="database" class="w-4 h-4 mr-1"></i>
                    Menampilkan ${visibleRows} dari ${totalRows} data
                </div>
            `;

                // Reinitialize Lucide icons
                lucide.createIcons();
            }

            // Event listeners dengan debouncing
            statusFilter.addEventListener('change', filterTable);

            // Debouncing untuk search input
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(filterTable, 300);
            });

            // Initial filter dan count
            filterTable();
            updateDataCount();

            // Tambahkan event listener untuk reset filter
            const resetFilters = () => {
                statusFilter.value = '';
                searchInput.value = '';
                filterTable();
            };

            // Tambahkan tombol reset jika diinginkan
            const filterContainer = document.querySelector('.intro-y.box.p-5');
            const resetButton = document.createElement('button');
            resetButton.className = 'btn btn-secondary w-full sm:w-auto';
            resetButton.innerHTML = `
            <i data-lucide="refresh-cw" class="w-4 h-4 mr-1"></i>
            Reset Filter
        `;
            resetButton.addEventListener('click', resetFilters);
            filterContainer.appendChild(resetButton);

            // Initialize Lucide icons
            lucide.createIcons();
        });

        // Tambahkan style untuk animasi dan tampilan
        const filterStyle = document.createElement('style');
        filterStyle.textContent = `
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-select, .form-control {
            transition: all 0.3s ease;
        }

        .form-select:hover, .form-control:hover {
            border-color: rgb(var(--color-primary));
        }

        .form-select:focus, .form-control:focus {
            border-color: rgb(var(--color-primary));
            box-shadow: 0 0 0 2px rgba(var(--color-primary), 0.2);
        }

        #dataCount {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive styling */
        @media (max-width: 640px) {
            .form-select, .form-control {
                margin-bottom: 0.5rem;
            }
        }

        /* Highlight search matches */
        .highlight {
            background-color: rgba(var(--color-primary), 0.2);
            padding: 0 2px;
            border-radius: 2px;
        }

        /* Loading state */
        .filtering {
            opacity: 0.7;
            pointer-events: none;
        }

        /* Empty state */
        .no-results {
            text-align: center;
            padding: 2rem;
            color: #666;
            font-style: italic;
        }
    `;
        document.head.appendChild(filterStyle);
    </script>

    <!-- Style untuk filter -->
    <style>
        /* Container styles */
        .filter-container {
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        }

        /* Form control styles */
        .form-select,
        .form-control {
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
        }

        .form-select:hover,
        .form-control:hover {
            border-color: rgb(var(--color-primary));
        }

        .form-select:focus,
        .form-control:focus {
            border-color: rgb(var(--color-primary));
            box-shadow: 0 0 0 2px rgba(var(--color-primary), 0.2);
            outline: none;
        }

        /* Label styles */
        .form-label {
            color: #1e293b;
            font-size: 0.875rem;
            display: block;
        }

        /* Button styles */
        .btn-secondary {
            background-color: #f1f5f9;
            color: #475569;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        /* Search icon styles */
        .search-icon {
            color: #94a3b8;
        }

        /* Counter styles */
        #dataCount {
            padding-top: 0.5rem;
            border-top: 1px solid #e2e8f0;
            margin-top: 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .filter-container>div {
                margin-bottom: 1rem;
            }

            .btn-secondary {
                width: 100%;
                margin-top: 0.5rem;
            }
        }

        /* Animation */
        .animate-fade {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Status badge colors in select */
        #statusFilter option[value="Dipinjam"] {
            background-color: #dbeafe;
            color: #1e40af;
        }

        #statusFilter option[value="Dikembalikan"] {
            background-color: #dcfce7;
            color: #166534;
        }

        #statusFilter option[value="Terlambat"] {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Empty state */
        .no-results {
            text-align: center;
            padding: 2rem;
            color: #64748b;
            font-style: italic;
        }
    </style>

    <!-- Script untuk inisialisasi icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            lucide.createIcons();

            // Add hover effect to search icon
            const searchIcon = document.querySelector('[data-lucide="search"]');
            const searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('focus', () => {
                searchIcon.classList.add('text-primary');
            });

            searchInput.addEventListener('blur', () => {
                searchIcon.classList.remove('text-primary');
            });
        });
    </script>
    <script>
        function printFilteredData() {
            // Ambil nilai filter yang aktif
            const status = document.getElementById('statusFilter').value;
            const search = document.getElementById('searchInput').value;
            const filterType = document.getElementById('filterType').value;
            
            // Siapkan parameter dasar
            const params = new URLSearchParams({
                status: status,
                search: search,
                period: filterType
            });

            // Tambahkan parameter sesuai jenis filter yang aktif
            switch(filterType) {
                case 'predefined':
                    params.append('filterPeriode', document.getElementById('filterPeriode').value);
                    break;
                case 'custom':
                    params.append('startDate', document.getElementById('startDate').value);
                    params.append('endDate', document.getElementById('endDate').value);
                    break;
                case 'monthly':
                    params.append('monthSelect', document.getElementById('monthSelect').value);
                    params.append('yearSelectMonth', document.getElementById('yearSelectMonth').value);
                    break;
                case 'yearly':
                    params.append('yearSelect', document.getElementById('yearSelect').value);
                    break;
            }

            // Konfirmasi cetak
            Swal.fire({
                title: 'Cetak Data',
                text: 'Apakah Anda yakin ingin mencetak data yang ditampilkan?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Cetak',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const baseUrl = '<?= base_url('admin/peminjaman/print-pdf') ?>';
                    window.open(`${baseUrl}?${params.toString()}`, '_blank');
                }
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all filter elements
            const filterType = document.getElementById('filterType');
            const predefinedFilter = document.getElementById('predefinedFilter');
            const customFilter = document.getElementById('customFilter');
            const monthlyFilter = document.getElementById('monthlyFilter');
            const yearlyFilter = document.getElementById('yearlyFilter');
            const statusFilter = document.getElementById('statusFilter');
            const searchInput = document.getElementById('searchInput');

            // Function to reset all filter values
            function resetFilters() {
                document.getElementById('filterPeriode').value = '7';
                document.getElementById('startDate').value = '';
                document.getElementById('endDate').value = '';
                document.getElementById('monthSelect').value = new Date().getMonth() + 1;
                document.getElementById('yearSelectMonth').value = new Date().getFullYear();
                document.getElementById('yearSelect').value = new Date().getFullYear();
                statusFilter.value = '';
                searchInput.value = '';
            }

            // Function to hide all filter sections
            function hideAllFilters() {
                predefinedFilter.classList.add('hidden');
                customFilter.classList.add('hidden');
                monthlyFilter.classList.add('hidden');
                yearlyFilter.classList.add('hidden');
            }

            // Handle filter type changes
            filterType.addEventListener('change', function() {
                hideAllFilters();
                resetFilters();

                switch(this.value) {
                    case 'all':
                        // Show no additional filters
                        break;
                    case 'predefined':
                        predefinedFilter.classList.remove('hidden');
                        break;
                    case 'custom':
                        customFilter.classList.remove('hidden');
                        break;
                    case 'monthly':
                        monthlyFilter.classList.remove('hidden');
                        break;
                    case 'yearly':
                        yearlyFilter.classList.remove('hidden');
                        break;
                }
            });

            // Handle apply filter button click
            document.getElementById('applyFilter').addEventListener('click', function() {
                const params = new URLSearchParams();
                params.append('filter_type', filterType.value);

                // Add parameters based on filter type
                switch(filterType.value) {
                    case 'all':
                        // No additional parameters needed
                        break;
                    case 'predefined':
                        params.append('period', document.getElementById('filterPeriode').value);
                        break;
                    case 'custom':
                        const startDate = document.getElementById('startDate').value;
                        const endDate = document.getElementById('endDate').value;
                        if (!startDate || !endDate) {
                            alert('Mohon isi tanggal awal dan akhir');
                            return;
                        }
                        params.append('start_date', startDate);
                        params.append('end_date', endDate);
                        break;
                    case 'monthly':
                        params.append('month', document.getElementById('monthSelect').value);
                        params.append('year', document.getElementById('yearSelectMonth').value);
                        break;
                    case 'yearly':
                        params.append('year', document.getElementById('yearSelect').value);
                        break;
                }

                // Add status and search parameters if they exist
                if (statusFilter.value) params.append('status', statusFilter.value);
                if (searchInput.value) params.append('search', searchInput.value);

                // Redirect with filter parameters
                window.location.href = `${window.location.pathname}?${params.toString()}`;
            });

            // Handle print filtered data
            window.printFilteredData = function() {
                const params = new URLSearchParams(window.location.search);
                window.open(`/admin/peminjaman/print-pdf?${params.toString()}`, '_blank');
            };

            // Set initial filter state based on URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('filter_type')) {
                filterType.value = urlParams.get('filter_type');
                filterType.dispatchEvent(new Event('change'));

                // Restore filter values from URL parameters
                switch(urlParams.get('filter_type')) {
                    case 'predefined':
                        document.getElementById('filterPeriode').value = urlParams.get('period') || '7';
                        break;
                    case 'custom':
                        document.getElementById('startDate').value = urlParams.get('start_date') || '';
                        document.getElementById('endDate').value = urlParams.get('end_date') || '';
                        break;
                    case 'monthly':
                        document.getElementById('monthSelect').value = urlParams.get('month') || new Date().getMonth() + 1;
                        document.getElementById('yearSelectMonth').value = urlParams.get('year') || new Date().getFullYear();
                        break;
                    case 'yearly':
                        document.getElementById('yearSelect').value = urlParams.get('year') || new Date().getFullYear();
                        break;
                }
            }

            // Restore status and search values if they exist in URL
            if (urlParams.has('status')) statusFilter.value = urlParams.get('status');
            if (urlParams.has('search')) searchInput.value = urlParams.get('search');
        });
    </script>
</body>

</html>