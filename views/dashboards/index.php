<?php 
 
require_once '../../App/auth.php';
require_once '../../App/Classes/script.class.php';
require_once '../../App/Models/dashboards.class.php';

echo $Scripts->GetHead("../", "inicio");

  //Espaço para adicionar Links em geral

echo $Scripts->GetHead("../", "final");

echo $Scripts->GetNavBar("../");

echo $Scripts->GetAsideInicio("../");

//Verificações de Permissão
if ($_SESSION['permissoes']['limite_livros_emprestimo'] > 0) {
  echo $Scripts->GetAsideLocacao("../");
}

if ($_SESSION['permissoes']['administrar_usuarios'] == 1) {
  echo $Scripts->GetAsideUsuario("../");  
}

if ($_SESSION['permissoes']['administrar_livros'] == 1) {
  echo $Scripts->GetAsideLivros("../");
}

if ($_SESSION['permissoes']['administrar_emprestimos'] == 1) {
  echo $Scripts->GetAsideEmprestimos("../");
}

echo $Scripts->GetAsideFinal("../");

echo '<div class="content-wrapper">';

if ($_SESSION['permissoes']['administrar_emprestimos'] != 1) {
          echo '<div class="card-body">
                  <div class="callout callout-danger">
                    <h5>Sem Autorização!</h5>
                    <p>Você não possui autorização para acessar essa área do site.</p>
                  </div>
                </div>';
        
echo '</div>';

echo $Scripts->GetFooter("../");

echo $Scripts->GetJavaScript("../", "inicio");

  //Espaço para adicionar Scripts

echo $Scripts->GetJavaScript("../", "final");

  exit();
  }; 

echo '

<!-- /.card -->
  <br>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboards</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Home</a></li>
              <li class="breadcrumb-item active">Dashboards</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <br>
';

echo '


   <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Locações Últimos 2 Meses - Semana</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>                  
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span id="total_loc_ult_2_mes" class="text-bold text-lg"></span>
                    <span>Total Periodo</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span id="dif_porc_loc_ult_2_mes">
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                    <span class="text-muted">Dif. últ. mês</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="dash_loc_ult_2_mes" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Quantidade</span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Locações x Devoluções</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>                  
                </div>
              </div>            
            <!-- <div class="card card-danger"> -->
              <!-- <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div> -->
              <div class="card-body">
                <canvas id="dash_locacoes_x_devolucoes" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            <!-- </div> -->
            </div> 
            <!-- /.card -->            


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top 5 Categorias + Locadas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="dash_top_cat_livros_mais_loc" height="149"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li id="top_cat_livros_mais_loc_1"><i class="far fa-circle text-danger"></i> Livro 1</li>
                      <li id="top_cat_livros_mais_loc_2"><i class="far fa-circle text-success"></i> Livro 2</li>
                      <li id="top_cat_livros_mais_loc_3"><i class="far fa-circle text-warning"></i> Livro 3</li>
                      <li id="top_cat_livros_mais_loc_4"><i class="far fa-circle text-info"></i> Livro 4</li>
                      <li id="top_cat_livros_mais_loc_5"><i class="far fa-circle text-primary"></i> Livro 5</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Comparativo Locações ano anterior</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>                  
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span id="total_loc_mesmo_per_ano_ant" class="text-bold text-lg"></span>
                    <span>Total Periodo</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span id="dif_porc_loc_mesmo_per_ano_ant">
                      <i class="fas fa-arrow-up"></i>
                    </span>
                    <span class="text-muted">Dif. últ. ano</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="dash_loc_mesmo_per_ano_ant" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Ano atual
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Ano anterior
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top 5 Livros + Locados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="dash_top_livros_mais_loc" height="149"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li id="top_livros_mais_loc_1"><i class="far fa-circle text-danger"></i> Livro 1</li>
                      <li id="top_livros_mais_loc_2"><i class="far fa-circle text-success"></i> Livro 2</li>
                      <li id="top_livros_mais_loc_3"><i class="far fa-circle text-warning"></i> Livro 3</li>
                      <li id="top_livros_mais_loc_4"><i class="far fa-circle text-info"></i> Livro 4</li>
                      <li id="top_livros_mais_loc_5"><i class="far fa-circle text-primary"></i> Livro 5</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->





          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

';




echo'
    <!-- daqui -->
      <section class="content">
        <div class="container-fluid">
        <div class="row">
    <!--  até daqui -->

';

echo'                

            <!-- daqui -->
            </div>
            </div>
            </section>
            <!-- até daqui -->
            <!-- /.card -->';   

echo '</div>';

echo '</div>';

echo $Scripts->GetFooter("../");

echo $Scripts->GetJavaScript("../", "inicio");

  //Espaço para adicionar Scripts

echo '
<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--
<script src="../../dist/js/pages/dashboard3.js"></script>
-->
<script src="../../App/js/dashboards.js"></script>
';

echo $Scripts->GetJavaScript("../", "final");

?>