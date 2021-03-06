<?php

include_once '../Model/Usuarios.php';
include_once '../Model/Notificacoes.php';
// codigo do usuario
$cod = 1;
$n = new Notificacoes();
$user = new Usuarios();
$user->logado($cod);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Reservar Livros | Jihye </title>

  <link rel="icon" href="../Assets/lv.ico" type="image/ico">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/nprogress.css" rel="stylesheet">
  <link href="css/custom.min.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/data.js"></script>
</head>

<body class="nav-md">
  <div class="container body dark">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-university"></i> <span>Jihye</span></a>
          </div>
          <div class="clearfix"></div><br>

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li>  <a href="indexPE.php">Perfil</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-book"></i> Livros <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="reservar.php">Reservar</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <!-- ir pra pagina com configurações -->
            <a data-toggle="tooltip" data-placement="top" title="Configurações">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <!-- deixar tela cheia -->
            <a data-toggle="tooltip" data-placement="top" title="Tela cheia">
            <span id="tela" name="tela" class="glyphicon glyphicon-fullscreen" aria-hidden="true" onclick="toggleFullScreen();"></span>
            <script type="text/javascript">
              //isso funciona, mas a pagina não funciona e tb se trocar de pág sai da tela cheia
             function toggleFullScreen() {
                if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                 (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                  if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();
                  } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                  } else if (document.documentElement.webkitRequestFullScreen) {
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                  }
                } else {
                  if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                  } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                  } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                  }
                }
                tela.attr("class","glyphicon glyphicon-resize-small");
              }

            </script>
          </a>
            <!-- sair -->
            <a data-toggle="tooltip" data-placement="top" title="Sair" href="login.php">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <?php echo $user->getNomeUsuario(); ?>   <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="indexPE.php"> Perfil</a></li>
                  <li><a href="../Model/logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php
                  $n->verificarEmprestimos($cod);
                  $n->verificarEspera($cod); ?>
                </ul>
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <?php $n->getQuant(); ?>
                </a>

              </li>
              <li>
                <a>
                <div class="form-group top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquise por...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3>Reservar Livros</h3>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <?php include_once '../Model/livros-data.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer>
        <div class="pull-right">
          Jihye por <a href="#">SMILE</a>
        </div>
        <div class="clearfix"></div>
      </footer>
    </div>
  </div>

  <div id="detalhes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header"></div>
        <div class="modal-body">
          <div id="livro_data-loader" style="display: none; text-align: center;">
            <img src="../Assets/ajax-loader.gif">
          </div>
          <div id="detalhes-livro">
            <div class="row col-md-12">
              <div class="col-md-4">
                <div class="col-md-12">
                  <div class="image view view-first">
                    <img style="width: 100%; display: block;" id="capa" alt="capa" />
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="row col-md-12">
                  <h3 class="modal-title"><strong id="nome"></strong></h3>
                  <div class="row col-md-12">
                    <div class="col-md-6">
                      <h5 id="autor"></h5>
                      <h5 id="editora"></h5>
                      <h5 id="isbn"></h5>
                    </div>
                    <div class="col-md-6">
                      <h5 id="ano"></h5>
                      <h5 id="pags"></h5>
                      <h5 id="gen"></h5>
                    </div><br><br>
                  </div>
                  <br><br>
                  <h4>Sinopse</h4>
                  <p id="sinopse" class="text-justify"></p>
                </div>
              </div><br><br>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/fastclick.js"></script>
  <script src="js/nprogress.js"></script>
  <script src="js/custom.min.js"></script>
</body>

</html>
