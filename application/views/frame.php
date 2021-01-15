<?php 
    switch(strtolower($controller)) {
        case 'index': {$pagina = "Gestionare transport"; break;}
        case 'iesiri': {$pagina = "Iesiri"; break;}
        case 'intrari_adaugare': {$pagina = "Adaugare intrari"; break;}
        case 'intrari_generare_raport': {$pagina = "Intrari Generare raport"; break;}
        case 'inventar': {$pagina = "Inventar"; break;}
        default: $pagina = 'Undefinied page';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $pagina?></title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/custom.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/Chart.min.css">

</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" data-aos="fade-down">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-signature"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Tema 14</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?= base_url()?>"><span>Gestionare transport</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= base_url()?>Iesiri"><span>Iesiri</span></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Intrari
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url()?>Intrari">Adauga</a>
                            <a class="dropdown-item" href="<?= base_url()?>Intrari/index/generare_raport">Generare raport</a>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?= base_url()?>Inventar"><span>Inventar</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h3 class="pl-4"><?= $pagina?></h3>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Jon Doe</span><img class="border rounded-circle img-profile" src="<?=base_url()?>assets/img/user.svg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profil</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Delogare</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>