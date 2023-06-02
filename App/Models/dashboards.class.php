<?php

/*
 Class Dashboards
*/
 
 require_once 'connect.php';

  class Dashboards extends Connect
 {
 	
    public function GetLocacaoLivros($startDate, $endDate){

        $this->query = "
        SELECT CONCAT(((WEEK(data_locacao) - WEEK(DATE_FORMAT(data_locacao,'%Y-%m-01')))+1), '-',DATE_FORMAT(data_locacao, '%m')) AS semana_mes,
               DATE_FORMAT(data_locacao, '%Y-%m') AS ano_mes,
               COUNT(idemprestimo) AS total_locacao,
               COUNT(data_devolucao > 0) AS total_devolucao
        FROM emprestimos
        WHERE delrg = ''
          AND data_locacao IS NOT NULL
          AND data_locacao BETWEEN DATE_FORMAT('$startDate', '%Y-%m-01') AND DATE_FORMAT(LAST_DAY('$endDate'), '%Y-%m-%d')
        GROUP BY ano_mes, semana_mes
        ORDER BY ano_mes";        

        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

        if($this->result){    
           while ($row[] = mysqli_fetch_array($this->result));
           return json_encode($row);   
        }
    }

    public function GetLivrosLocados(){

        $this->query = "
        SELECT emp_livros.idemprestimo,
               livros.idlivro,
               livros.titulo,
               cat_livros.idcategoria,
               cat_livros.categoria,
               COUNT(emp_livros.idemprestimo) AS quant_locacoes               
        FROM emprestimos_livros AS emp_livros
        INNER JOIN livros AS livros ON livros.idlivro = emp_livros.idlivro
        INNER JOIN categorias_livros AS cat_livros ON cat_livros.idcategoria = livros.idcategoria        
        GROUP BY livros.idlivro
        ORDER BY quant_locacoes DESC";        

        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

        if($this->result){    
           while ($row[] = mysqli_fetch_array($this->result));
           return json_encode($row);   
        }
    }    

 }

$dashboards = new Dashboards;