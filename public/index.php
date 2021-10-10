<?php

require_once dirname(__FILE__) . '/../src/api/main.php';

$token = config('github_token');
$organization = 'ccuffs';

$start_date = '2021-10-01';
$end_date = '2021-10-31';

$users = get_users_from_organization($token, $organization);
$pull_requests = get_pull_requests_from_organization($token, $organization, $start_date, $end_date);
$commits = get_commits_from_organization($token, $organization, $start_date, $end_date);

?>

<!DOCTYPE HTML>
<html>
<head>
    <!--
        Template site CC UFFS

        Esse é um template para criação de sites do curso de Ciência da Computação
        da Universidade Federal da Fronteira Sul, campus Chapecó/SC.

        Veja mais:

        - Nosso site:   https://cc.uffs.edu.br
        - Github:       https://github.com/ccuffs
    -->
    
    <!-- Configurações gerais -->
    <title>Hacktoberfest - Ciência da Computação - UFFS</title>
    
    <meta name="description" content="Monitor de atividades da hacktoberfest"/>
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3"/>
    <meta name="author" content="Curso de Ciência da Computação - Universidade Federal da Fronteira Sul" />
    <meta name="copyright" content="Copyright owner" />
    <meta name="language" content="Portuguese">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="canonical" href="https://hacktoberfest.uffs.cc">
    
    <!-- Coisas sociais -->
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Hacktoberfest">
    <meta property="og:url" content="https://hacktoberfest.uffs.cc">
    <meta property="og:site_name" content="Ciência da Computação">

    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">

    <!-- 3rdparty layouts -->
    <link rel="stylesheet" type="text/css" href="./assets/3rdparty/bootstrap-dark-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/3rdparty/froala-design-blocks-2.0.1/css/froala_blocks.min.css">
    
    <!-- 3rdparty icons. O recomendado para desempenho é usar apenas um. -->
    <link rel="stylesheet" type="text/css" href="./assets/3rdparty/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <!-- CSS do próprio site -->
    <link rel="stylesheet" type="text/css" href="./assets/css/app.css">
</head>

<body id="top">
    <!-- Github corner -->
    <a href="https://your-url" class="github-corner" aria-label="View source on GitHub"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#fff; color:#151513; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
    
    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-md no-gutters">
                <div class="col-2 text-left">
                    <i class="las la-chart-area"></i> ci.uffs.cc
                </div>

                <div class="collapse navbar-collapse justify-content-center col-8" id="navbarNav4">
                    <ul class="navbar-nav justify-content-center">
                    </ul>
                </div>

                <ul class="navbar-nav col-2 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.froala.com"><i class="lab la-github"></i> Github</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="panel">
                    <div class="panel-body">
                        <h3><i class="las la-chart-bar"></i> Stats </h3>
                        <hr>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <small>Today</small><br />
                                <strong><?php echo count($users); ?> <i class="fa fa-user"></i></strong>
                            </div>
                            <div class="col-3">
                                <small>Last</small><br />
                                <strong>20.73 <i class="fa fa-user"></i></strong>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <small>Last</small><br />
                                <strong>20.53 <i class="fa fa-user"></i></strong>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <small>Something</small><br />
                                <strong>20.24 <i class="fa fa-user"></i></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="panel panel-filled">
                    <div class="panel-heading">
                        <h2><i class="las la-server"></i> Nome</h2>
                    </div>
                    <div class="panel-body">
                        <table id="tableServices" class="table table-striped table-hover table-responsive-sm no-footer"
                            role="grid">
                            <thead>
                                <tr role="row">
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Commit</th>
                                    <th>Misc</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr role="row">
                                    <td>Nome</td>
                                    <td>Qualquer coisa</td>
                                    <td>coisa</td>
                                    <td>Qualquer</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="la-ball-scale-ripple-multiple la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="col-6">
                <i class="devicons devicons-markdown fa-5x"></i>
            </div>
            
        </div>
    </div>

    <footer class="fdb-block footer-large bg-dark">
        <div class="container">
            <div class="row align-items-top text-center text-md-left">
                <div class="col-12 col-sm-6 col-md-4">
                    <h3>Country A</h3>
                    <p>Street Address 52<br>Contact Name</p>
                    <p>+44 827 312 5002</p>
                    <p><a href="https://www.froala.com">countrya@amazing.com</a></p>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mt-4 mt-sm-0">
                    <h3>Country B</h3>
                    <p>Street Address 100<br>Contact Name</p>
                    <p>+13 827 312 5002</p>
                    <p><a href="https://www.froala.com">countryb@amazing.com</a></p>
                </div>

                <div class="col-12 col-md-4 mt-5 mt-md-0 text-md-left">
                    <h3>About Us</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <p class="muted">© 2019 All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- 3rdpary JS -->
    <script src="./assets/3rdparty/jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="./assets/3rdparty/bootstrap-4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    
    <!-- JS do próprio site -->
    <script src="./assets/js/app.js" type="text/javascript"></script>
</body>
</html>
