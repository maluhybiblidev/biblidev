<?php 

require_once '../App/auth.php';
require_once '../App/Classes/script.class.php';

echo $Scripts->GetHead("", "inicio");
  
  //Espaço para adicionar Links em geral

echo $Scripts->GetHead("", "final");

echo $Scripts->GetNavBar("");

echo $Scripts->GetAsideInicio("");

//Verificações de Permissão
if ($_SESSION['permissoes']['limite_livros_emprestimo'] > 0) {
  echo $Scripts->GetAsideLocacao("");
}

if ($_SESSION['permissoes']['administrar_usuarios'] == 1) {
  echo $Scripts->GetAsideUsuario("");  
}

if ($_SESSION['permissoes']['administrar_livros'] == 1) {
  echo $Scripts->GetAsideLivros("");
}

if ($_SESSION['permissoes']['administrar_emprestimos'] == 1) {
  echo $Scripts->GetAsideEmprestimos("");
}

echo $Scripts->GetAsideFinal("");

echo '<div class="content-wrapper">';

echo '
  <br>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Acessibilidade</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <br>

<div class="content px-2">
<p>As páginas foram projetadas para serem acessíveis e facilmente utilizáveis. As instruções a seguir podem facilitar a sua navegação..</p>
<h5 class="text-bold text-dark mt-3">Tamanho do texto</h5>

<p>Na parte superior direita de cada página, há três ícones que, ao serem acionados, permitem que sejam ajustados alguns parametros da tela, por exemplo aumentar o zoom da página (ícone <i class="fas fa-magnifying-glass-plus"></i>) ou diminuir o zoom da página (ícone <i class="fas fa-magnifying-glass-minus"></i>).</p>
<p>Entretanto, nos navegadores mais modernos, geralmente existe mais uma ferramenta de <em>zoom</em> (ampliação ou redução), que é um método de obter textos e imagens no tamanho desejado.</p>
<p>Para usar o <em>zoom</em> no Microsoft Windows ou no Linux:</p>
<ul>
<li><span>pressione a tecla <strong>CTRL</strong> e digite a tecla <strong>+ (mais)</strong> para aumentar</span></li>
<li><span>pressione a tecla <strong>CTRL</strong> e digite a tecla <strong>- (menos)</strong> para diminuir </span></li>
<li><span>pressione a tecla <strong>CTRL</strong> e digite a tecla <strong>0 (zero)</strong> para restaurar o tamanho original da página</span></li>
</ul>
<p>Para usar o <em>zoom</em> no Mac OS:</p>
<ul>
<li><span>pressione a tecla <strong>COMMAND</strong> e digite a tecla <strong>+ (mais)</strong> para aumentar </span></li>
<li><span>pressione a tecla <strong>COMMAND</strong> e digite a tecla <strong>- (menos)</strong> para diminuir </span></li>
<li><span>pressione a tecla <strong>COMMAND</strong> e digite a tecla <strong>0 (zero)</strong> para restaurar o tamanho original da página</span></li>
</ul>
<p><span> </span></p>

<h5 class="text-bold text-dark mt-3">Ferramentas úteis nos navegadores</h5>
<p class=" "><span>Alguns navegadores oferecem ferramentas acessórias (chamadas de extensões ou complementos) para potencializar seu uso. Muitas delas visam a aprimorar a acessibilidade. Aqui vai uma lista de ferramentas que podem ser obtidas para melhorar a sua experiência, com detalhes de onde obtê-las e como instalá-las. As instruções para configuração de algumas dessas ferramentas estão em inglês.</span></p>
<p><span><em>Usando o Google Chrome</em>:</span></p>
<ul>
<li>Para <strong>efeito de aumento e diminuição do texto</strong>, entre na <a href="https://chrome.google.com/webstore/detail/zoom/lajondecmobodlejlcjllhojikagldgd?hl=pt-BR">página da ferramenta Zoom</a> e clique nos botões "GRATUITO" e, em seguida, "Adicionar". O ícone da ferramenta Zoom aparecerá na barra de ferramentas do navegador. P<span>ara fazer a configuração desejada, c</span>lique no ícone do menu do Google Chrome, localizado no canto superior direito da tela, entre em Ferramentas, Extensões, Zoom e Opções.</li>
<li>Para <strong>efeito de alto contraste</strong>, entre na <a href="https://chrome.google.com/webstore/detail/high-contrast/djcfdncoelnlbldjfhinnjlhdjlikmph?hl=pt-BR">página da ferramenta High Contrast</a> e clique <span>nos botões "GRATUITO" e, em seguida, "Adicionar". O ícone da ferramenta High Contrast aparecerá na barra de ferramentas do navegador. Clique nesse ícone para fazer a configuração desejada.</span></li>
<li>Para <strong>transformar em áudio um texto selecionado</strong>, entre na <a class="external-link" href="https://chrome.google.com/webstore/detail/selection-reader-text-to/fdffijlhedcdiblbingmagmdnokokgbi" target="_self" title="Leitor Selecção (Texto-Para-Voz)">página da ferramenta Leitor Selecção (Texto-para-voz)</a> e clique <span>nos botões "Usar no Chrome" e, em seguida, "Adicionar extensão". O ícone da ferramenta (um alto-falante) aparecerá na barra de ferramentas do navegador, e uma janela de configurações irá se abrir para que você faça os ajustes desejados.</span></li>
<li>Para <strong>usar um teclado virtual</strong>, entre na <a class="external-link" href="https://chrome.google.com/webstore/detail/google-input-tools/mclkkofklkfljcocdinagocijmpgbhab?hl=pt-BR" target="_self" title="">página das Ferramentas de Entrada do Google</a> e clique <span>nos botões "GRATUITO" e, em seguida, "Adicionar". O ícone das Ferramentas de Entrada do Google aparecerá na barra de ferramentas do navegador e um menu estará disponível para que você faça os ajustes de configuração desejados em "Opções de extensão".</span></li>
<li>Para <strong>navegar por gestos do mouse</strong>, entre na <a class="external-link" href="https://chrome.google.com/webstore/detail/crxmouse/jlgkpaicikihijadgifklkbpdajbkhjo?hl=pt-br" target="_self" title="">página da ferramenta CrxMouse</a><span> e clique <span>nos botões "GRATUITO" e, em seguida, "Adicionar". Uma tela de configurações irá se abrir para que você faça os ajustes desejados.</span></span></li>
<li><span>Para <strong>escrever e editar textos por reconhecimento de voz</strong>, entre na <a class="external-link" href="https://chrome.google.com/webstore/detail/dictanote-speech-recogniz/aomjekmpappghadlogpigifkghlmebjk?hl=pt-BR" target="_self" title="Ferramenta Dictanote">página da ferramenta Dictanote </a>e clique nos botões "USAR NO CHROME" e, em seguida, "Adicionar". O ícone da ferramenta Dictanote aparecerá na página de Aplicativos (Apps) do Google. Para fazer a configuração desejada, clique no ícone do Dictanote, entre no aplicativo, clique no ícone Settings, selecione Language Settings e Português do Brasil. Para que o aplicativo funcione, é necessário que seu computador tenha um microfone embutido ou que você o conecte a um microfone. Para ditar, é só clicar no ícone do microfone do Dictanote. O texto irá aparecendo à medida em que você for falando.</span> </li>
</ul>
<p class=" "><em>Usando o Mozilla Firefox</em>:</p>
<ul>
<li>Para <strong>efeito de aumento e diminuição do texto</strong>, entre na <a class="external-link" href="https://addons.mozilla.org/pt-BR/firefox/addon/zoom-page/" target="_self" title="">página da ferramenta Zoom Page</a>, clique nos botões "Adicionar ao Firefox" e, em seguida, "Instalar agora". O ícone da ferramenta Zoom Page aparecerá na barra de ferramentas do navegador.</li>
<li>Para <strong>modificar as cores usadas nas páginas</strong>, inclusive para <strong>efeito de alto contraste</strong>,<span> entre na </span><a class="external-link" href="https://addons.mozilla.org/pt-BR/firefox/addon/colorific-1/" target="_self" title="">página da ferramenta Colorific</a><span> e clique nos botões "Adicionar ao Firefox" e, em seguida, "Instalar agora". O ícone da ferramenta Colorific aparecerá na barra de ferramentas do navegador. Clique nesse ícone para fazer a configuração desejada.</span></li>
<li>Para <strong>usar um teclado virtual</strong>, <span><span>entre na </span><a class="external-link" href="https://addons.mozilla.org/pt-BR/firefox/addon/fxkeyboard/" target="_self" title="">página da ferramenta FxKeyboard</a><span> e clique nos botões "Ir para download", "Adicionar ao Firefox" e, em seguida, "Instalar agora". O teclado virtual será mostrado ao abrir uma nova aba.</span></span></li>
<li><span><span>Para <strong>navegar por gestos do mouse</strong>, <span>entre na </span><a class="external-link" href="https://addons.mozilla.org/pt-BR/firefox/addon/firegestures/" target="_self" title="">página da ferramenta FireGestures</a><span> e clique nos botões "Adicionar ao Firefox" e, em seguida, "Instalar agora". Para fazer a configuração desejada, entre no menu do navegador e selecione Ferramentas, Complementos, FireGestures e Opções.</span></span></span></li>
</ul>
<p> </p>

<p><strong></strong>Cuidados necessários ao adotar as ferramentas úteis:</p>
<p><span>Algumas dessas ferramentas podem acessar suas informações pessoais e utilizá-las indevidamente, expondo você a riscos (como o de ser "rastreado", por exemplo). Por isso, leia atentamente cada uma das permissões solicitadas pela ferramenta antes de se decidir pela instalação. A Câmara dos Deputados não se responsabiliza por eventuais problemas decorrentes desse procedimento.</span></p>
<p> </p>
<h5 class="text-bold text-dark mt-3"><span>Leitores de tela</span></h5>
<p>Os leitores de tela são programas de computador projetados para serem utilizados por pessoas com deficiência visual. Eles<span> capturam a informação apresentada na tela e a transformam em uma resposta falada (áudio) utilizando um sintetizador de voz. A navegação é feita com um teclado comum, na maioria das vezes sem a necessidade de mouse ou de monitor. O áudio é emitido por meio da placa de som do computador. Podem ser de uso público (gratuitos) ou comercializados (pagos). A seguir, listamos alguns desses leitores de tela.</span></p>
<p><span>Versões gratuitas:</span></p>
<ul>
<li><span><strong>DOSVOX</strong><br />Desenvolvido pelo Núcleo de Computação Eletrônica da Universidade Federal do Rio de Janeiro (UFRJ), o DOSVOX não é apenas um leitor de telas e sim um sistema operacional completo rodando em ambiente Windows. Grande parte das mensagens sonoras emitidas pelo DOSVOX é feita em voz humana gravada. Isso significa que ele é um sistema com baixo índice de estresse para o usuário, mesmo com uso prolongado. Possui editor de texto, jogos de caráter didático e lúdico, programas para ajudar na educação de crianças com deficiência visual, entre outras funcionalidades. Para baixar, acesse a</span><span> </span><a class="external-link" href="https://intervox.nce.ufrj.br/dosvox/" target="_self" title="">página do Projeto DOSVOX</a><span>.</span></li>
<li><span><strong>NVDA</strong><br />Desenvolvido pela organização sem fins lucrativos NV Access, é um programa de leitura de tela gratuito e de código aberto. Um diferencial do NVDA (NonVisual Desktop Access) é o fato de não precisar ser instalado no sistema, podendo ser levado em um <em>pendrive</em>, CD ou qualquer outro dispositivo removível. P</span><span>ara baixar, acesse a </span><a class="external-link" href="https://www.nvaccess.org/download/" target="_self" title="">página de download do NVDA</a><span>.</span></li>
<li><span><strong>Orca</strong><br />Software de código aberto desenvolvido para o sistema operacional Linux. Além de leitor de tela, é também um ampliador de tela, possibilitando a utilização de apenas um programa para tornar o sistema acessível. Para obter informações sobre como baixar e instalar, acesse a</span><span> </span><a class="external-link" href="https://wiki.gnome.org/Projects/Orca/Orca.pt_BR" target="_self" title="">página do Orca</a><span>.</span></li>
<li><span><strong>VoiceOver</strong><br />Aplicativo de leitura de tela que vem integrado ao sistema operacional dos computadores da Apple (Mac OS X). Para saber mais, acesse </span><span>a </span><a class="external-link" href="https://www.apple.com/br/accessibility/voiceover" target="_self" title="">página do VoiceOver</a><span>.</span></li>
</ul>
<p><span>Versões comercializadas no Brasil:</span></p>
<ul>
<li><strong>JAWS</strong><br />O JAWS (Job Acess With Speech) é um programa de leitura de tela desenvolvido pela empresa norte-americana Freedom Scientific para plataforma Windows. Para saber mais, acesse <span>a </span><a class="external-link" href="https://www.freedomscientific.com/products/fs/JAWS-product-page.asp" target="_self" title="">página do JAWS para Windows</a><span>.</span></li>
<li><span><strong>Virtual Vision</strong><br />Programa de leitura de tela desenvolvido pela empresa brasileira MicroPower para ambiente Windows. Para saber mais, acesse </span><span>a </span><a class="external-link" href="https://www.virtualvision.com.br/index.html" target="_self" title="">página do Virtual Vision</a><span>.</span></li>
</ul>
<p class=" "> </p>
<h5 class="text-bold text-dark mt-3">Mouse controlado por movimentos da cabeça</h5>
<p class=" ">Alguns programas permitem que o ponteiro do mouse seja controlado por meio de movimentos da cabeça.</p>
<ul>
<li><strong>eViaCam</strong><br />Software de código aberto disponível para os sistemas operacionais Windows e Linux. O clique do mouse é acionado fixando-se por alguns segundos o ponteiro do mouse na região desejada da tela. Faça o download acessando<span> a </span><a class="external-link" href="https://sourceforge.net/projects/eviacam/" target="_self" title="">página do eViaCam</a><span>.</span></li>
<li><span><strong>HeadMouse</strong><br />Software gratuito desenvolvido pela Escola Politécnica Superior da Universidade de Lleida, na Espanha. É possível configurar diferentes movimentos para o clique do mouse. Faça o download acessando </span><span>a </span><a class="external-link" href="https://robotica.udl.cat/" target="_self" title="Grupo que desenvolveu o software HeadMouse">página do Grupo de Investigação em Robótica da Universidade de Lleida</a><span>.</span></li>
</ul>
<p> </p>
<h5 class="text-bold text-dark mt-3">Reconhecimento de fala</h5>
<ul>
<li><strong>Dictanote Demo note </strong>- É um programa de reconhecimento de fala totalmente online, gratuito, admite pontuação, permite que você programe a pontuação e frases padrão, e oferece também a opção de reconhecimento de fala de outras línguas nativas, acesse a página <a class="external-link" href="https://dictanote.co/" target="_self" title="">dictanote</a><span>.</span></li>
</ul>
<p><strong> </strong></p>
<h5 class="text-bold text-dark mt-3"><strong>Tradução automática de conteúdos de Língua Portuguesa para a Libras e/ou para Legendas em Língua Portuguesa:</strong></h5>
<ul>
<li><span><strong> VLibras</strong> - É uma ferramenta gratuita de código aberto que traduz automaticamente textos em Língua Portuguesa para a Língua Brasileira de Sinais (Libras); tem versões para <em>desktops</em>, <em>smartphones</em> e <em>tablets</em>, e também oferece uma plataforma colaborativa para construção de dicionário em Libras (Wikilibras). Faça o <em>download</em> acessando a página <a class="external-link" href="https://www.vlibras.gov.br" target="_self" title="">Conheça o VLibras</a>. </span></li>
<li><span><strong>Hand TalK</strong> - É um aplicativo que traduz automaticamente texto e áudio para a Língua Brasileira de Sinais (Libras), disponível comercialmente para <em>desktops</em> e gratuitamente para <em>smartphones</em>. Faça a consulta acessando a página <a class="external-link" href="https://www.handtalk.me/" target="_self" title="">Hand Talk</a>.</span></li>
</ul>
<p><span><span> </span></span></p>
<h5 class="text-bold text-dark mt-3">Facilidades dos sistemas operacionais</h5>
<p>Além das ferramentas úteis oferecidas pelos navegadores, os sistemas operacionais também contam com recursos próprios que podem facilitar seu uso, tornando-os mais acessíveis. A seguir, há uma lista de links para páginas que orientam quanto à utilização desses recursos. Algumas destas páginas são dos próprios fornecedores dos sistemas, outras são de terceiros.</p>
<ul>
<li><a class="external-link" href="https://windows.microsoft.com/pt-br/windows/make-computer-easier-to-use#1TC=windows-7" target="_self" title="">Facilitar o uso do computador com Windows 7</a></li>
<li><a class="external-link" href="https://acessibilidadelegal.com/33-acessibilidades-xp.php" target="_self" title="">Configuração de acessibilidade do Windows XP</a></li>
<li><a class="external-link" href="https://windows.microsoft.com/pt-br/windows/make-computer-easier-to-use#1TC=windows-vista" target="_self" title="">Facilitar o uso do computador com Windows Vista</a></li>
<li><span><a class="external-link" href="https://www.apple.com/br/accessibility/osx/" target="_self" title="">Acessibilidade do OS X</a></span></li>
<li><span><a class="external-link" href="https://distrowatch.com/table.php?distribution=vinux" target="_self" title="">Linux acessível - Vinux</a></span></li>
<li>
<p><a class="external-link" href="https://www.brasillinux.org/dosvox.html" target="_self" title="">Linux acessível - Brasillinux</a> </p>
</li>
</ul>
<p><span> </span></p>
<br/>

</div>

';

echo '</div>';

echo $Scripts->GetFooter("");

echo $Scripts->GetJavaScript("", "inicio");
  
  //Espaço para adicionar Scripts

echo $Scripts->GetJavaScript("", "final");

?>