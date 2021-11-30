# BibliDEV
Projeto Biblidev - PI 2ºSemestre 2021 - Engenharia de Computação - UNIVESP<br>

Projeto realizado como parte do PI do 2º Semestre de 2021 da Turma de Engenharia de Computação na universidade UNIVESP.<br>

O BibliDEV foi criado para ajudar em um problema encontrado em diversas escolas públicas com biblioteca que é o controle de empréstimo e devolução dos seus livros, realizamos o projeto pensando em desenvolver um sistema simples não só para usuários finais administradores e alunos onde este primeiro realizará controle dos livros cadastrados e empréstimos dos mesmo e esse segundo a locação e retirada de seus livros, mas também para usuários mais técnicos onde pensamos em deixar de maneira que a manutenção seja simples para que um usuário com conhecimento mesmo que básico em Web e Banco de dados possa ser capaz de fazê-la, assim sendo realizado o controle dos empréstimos de maneira fácil, segura e controlada. 

# Passo a passo configuração BibliDEV
<b>1</b> - Instale o <a href="https://www.wampserver.com/en/">WampServer</a> em sua última versão e configure de acordo suas necessidades.<br>
<b>2</b> - Após instalado o WampServer exporte o arquivo 'BIBLIDEV_EMPTY.sql' da pasta DATABASE no Mysql instalado junto com o WampServer.<br>
<b>3</b> - Acesse o Localhost do seu WampServer e encontre seu projeto para utilização.<br>

<i><b>(Opcional - Envio de e-mail alerta devolução livros)</b></i><br>
<b>1</b> - Baixe o <a href="https://www.glob.com.au/sendmail/sendmail.zip">SENDMail</a> e descompacte na pasta raiz do seu WAMPServer.<br>
<b>2</b> - Configure o WampServer para referenciação ao SENDMail.<br>
<b>3</b> - Configure o SENDMail com seu email e senha que irá realizar o envio dos e-mail alerta.<br>
<b>4</b> - Configure o Agendador de tarefas para inicialização do PHP para execução do Script PHP que se encontra no projeto em 'App/Support/email.php'.<br>

<b>Obs.</b><br>
O Projeto já consta com um usuário inicial para realização de login.

<b><i>Usuário:</i></b> admin.<br>
<b><i>Senha:</i></b> admin.<br>

Após acesso adicione seus livros, categorias de livros, usuários e tipos de usuário de acordo suas necessidades 
e comece a realizar o controle dos empréstimos de sua biblioteca.
