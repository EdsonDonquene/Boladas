<?php
include 'header.php'; 

if(isset($_POST['$userloggedin']))
{
    header('index.php');
}
?>

    <section class="container_signup_card valign-wrapper">
        <div class="loader_overlay" id="loader_overlay">
            <div class="loader_bg card" id="loader">
                <div class="preloader-wrapper big active" >
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card signup_card center">
            
            <div class="container_signup_img">
                <div class="container_overlay">
                    <a href="index.php" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Voltar</a>
                </div>
                <img rel="preload" src="resources/img/bg/signup1.svg" alt="back image">
            </div>
            <div class="container_signup_form">
                <form class="col s12" method="POST">
                    <div class="row center" style="margin-top:30px">
                        <h5>Formulário de registro</h5>
                    </div>
                    <div class="container_inputs">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">person</i>
                                <input data-length="25" minlength="10" maxlength="25" name="fullname" onclick="deactivateCheck()" id="full_name" required type="text" class="validate">
                                <label for="fullname">Nome completo</label>
                            </div>
                        </div>
                        <div class="row">          
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input data-length="9" id="phone" onclick="deactivateCheck()" maxlength="9" onkeyup="validatePhone(), checkPhone()" onkeydown="validatePhone(), checkPhone()"  required type="number" name="phone" class="validate">
                                <label for="phone">Telefone</label>
                                <p id="error_msg2" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>
                                <p id="error_msg3" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">pin_drop</i>
                                <select onchange="deactivateCheck()"  id="province" required name="province">
                                    <option value="" disabled selected>Provincia</option>
                                    <option value='1' >Maputo</option>
                                    <option value='2' >Gaza</option>
                                    <option value='3' >Inhambane</option>
                                    <option value='4' >Manica</option>
                                    <option value='5' >Sofala</option>
                                    <option value='6' >Tete</option>
                                    <option value='7' >Zambezia</option>
                                    <option value='8' >Nampula</option>
                                    <option value='9' >Cabo Delgado</option>
                                    <option value='10' >Niassa</option>
                                </select>
                                <label style="font-size: 8px;">Província</label>
                            </div>
                        </div>
                        <div class="row">          
                            <div class="input-field col s12">
                                <i class="material-icons prefix">key</i>
                                <input minlength="8" data-length="10" onclick="deactivateCheck()" onkeydown="deactivateCheck()" onfocus="deactivateCheck()"  onkeyup="checkLength(), deactivateCheck()" required name="password" id="password" type="password" class="validate">
                                <label for="password">Palavra passe</label>
                                <p id="error_msg1" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>
                            </div>
                        </div>
                        <div class="row">          
                            <div class="input-field col s12">
                                <i class="material-icons prefix">key</i>
                                <input minlength="8" data-length="10" onclick="deactivateCheck()"  required name="password2" onkeyup="checkPass()" onfocus="checkPass()" onkeypress="checkPass()"  onchange="checkPass()" id="password2" type="password" class="validate">
                                <label for="password2">Comfirmar palavra passe</label>
                                <p id="error_msg" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>
                            </div>
                            
                        </div>

                        <div class="row">
                            <p>
                                <label>
                                    <input type="checkbox" onchange="activeSubmit()" required id="check_tou">
                                    <span style="font-size: 90%">Li e concordo com os <a href="#modal_tou" style="text-decoration: underline;" class=" modal-trigger">TERMOS DE USO</a> de plataforma <a href="index.php">dakipraki</a></span>
                                </label>
                            </p>
                        </div>
                        <div id="modal_tou" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <h4>TERMOS DE USO - dakipraki</h4>
                                <p>dakipraki, pessoa jurídica de direito privado descreve, através deste documento, as regras de uso do site <a href='www.dakipraki.com' target="_blank">dakipraki</a> e qualquer outro site, loja ou aplicativo operado pelo proprietário.

                                Ao navegar neste website, consideramos que você está de acordo com os Termos de Uso abaixo.

                                Caso você não esteja de acordo com as condições deste contrato, pedimos que não faça mais uso deste website, muito menos cadastre-se ou envie os seus dados pessoais.

                                Se modificarmos nossos Termos de Uso, publicaremos o novo texto neste website, com a data de revisão atualizada. Podemos alterar este documento a qualquer momento. Caso haja alteração significativa nos termos deste contrato, podemos informá-lo por meio das informações de contato que tivermos em nosso banco de dados ou por meio de notificações.

                                A utilização deste website após as alterações significa que você aceitou os Termos de Uso revisados. Caso, após a leitura da versão revisada, você não esteja de acordo com seus termos, favor encerrar o seu acesso.</p>

                                <h5>Seção 1 - Usuário</h5>
                                <p>A utilização deste website atribui de forma automática a condição de Usuário e implica a plena aceitação de todas as diretrizes e condições incluídas nestes Termos.</p>

                                <h5>Seção 2 - Adesão em conjunto com a Política de Privacidade</h5>
                                <p>A utilização deste website acarreta a adesão aos presentes Termos de Uso e a versão mais atualizada da Política de Privacidade de dakipraki.</p>

                                <h5>Seção 3 - Condições de acesso</h5>
                                <p>Em geral, o acesso ao website da dakipraki possui caráter gratuito e não exige prévia inscrição ou registro.

                                Contudo, para usufruir de algumas funcionalidades, o usuário poderá precisar efetuar um cadastro, criando uma conta de usuário com login e senha próprios para acesso.

                                É de total responsabilidade do usuário fornecer apenas informações corretas, autênticas, válidas, completas e atualizadas, bem como não divulgar o seu login e senha para terceiros.

                                Partes deste website oferecem ao usuário a opção de publicar comentários em determinadas áreas. dakipraki não consente com a publicação de conteúdos que tenham natureza discriminatória, ofensiva ou ilícita, ou ainda infrinjam direitos de autor ou quaisquer outros direitos de terceiros.

                                A publicação de quaisquer conteúdos pelo usuário deste website, incluindo mensagens e comentários, implica em licença não-exclusiva, irrevogável e irretratável, para sua utilização, reprodução e publicação pela dakipraki no seu website, plataformas e aplicações de internet, ou ainda em outras plataformas, sem qualquer restrição ou limitação.</p>

                                <h5>Seção 4 - Cookies</h5>
                                <p>Informações sobre o seu uso neste website podem ser coletadas a partir de cookies. Cookies são informações armazenadas diretamente no computador que você está utilizando. Os cookies permitem a coleta de informações tais como o tipo de navegador, o tempo despendido no website, as páginas visitadas, as preferências de idioma, e outros dados de tráfego anônimos. Nós e nossos prestadores de serviços utilizamos informações para proteção de segurança, para facilitar a navegação, exibir informações de modo mais eficiente, e personalizar sua experiência ao utilizar este website, assim como para rastreamento online. Também coletamos informações estatísticas sobre o uso do website para aprimoramento contínuo do nosso design e funcionalidade, para entender como o website é utilizado e para auxiliá-lo a solucionar questões relevantes.

                                Caso não deseje que suas informações sejam coletadas por meio de cookies, há um procedimento simples na maior parte dos navegadores que permite que os cookies sejam automaticamente rejeitados, ou oferece a opção de aceitar ou rejeitar a transferência de um cookie (ou cookies) específico(s) de um site determinado para o seu computador. Entretanto, isso pode gerar inconvenientes no uso do website.

                                As definições que escolher podem afetar a sua experiência de navegação e o funcionamento que exige a utilização de cookies. Neste sentido, rejeitamos qualquer responsabilidade pelas consequências resultantes do funcionamento limitado deste website provocado pela desativação de cookies no seu dispositivo (incapacidade de definir ou ler um cookie).</p>

                                <h5>Seção 5 - Propriedade Intelectual</h5>
                                <p>Todos os elementos de dakipraki são de propriedade intelectual da mesma ou de seus licenciados. Estes Termos ou a utilização do website não concede a você qualquer licença ou direito de uso dos direitos de propriedade intelectual da dakipraki ou de terceiros.</p>

                                <h5>Seção 6 - Links para sites de terceiros</h5>
                                <p>Este website poderá, de tempos a tempos, conter links de hipertexto que redirecionará você para sites das redes dos nossos parceiros, anunciantes, fornecedores etc. Se você clicar em um desses links para qualquer um desses sites, lembre-se que cada site possui as suas próprias práticas de privacidade e que não somos responsáveis por essas políticas. Consulte as referidas políticas antes de enviar quaisquer Dados Pessoais para esses sites.

                                Não nos responsabilizamos pelas políticas e práticas de coleta, uso e divulgação (incluindo práticas de proteção de dados) de outras organizações, tais como Facebook, Apple, Google, Microsoft, ou de qualquer outro desenvolvedor de software ou provedor de aplicativo, loja de mídia social, sistema operacional, prestador de serviços de internet sem fio ou fabricante de dispositivos, incluindo todos os Dados Pessoais que divulgar para outras organizações por meio dos aplicativos, relacionadas a tais aplicativos, ou publicadas em nossas páginas em mídias sociais. Nós recomendamos que você se informe sobre a política de privacidade e termos de uso de cada site visitado ou de cada prestador de serviço utilizado.</p>

                                <h5>Seção 7 - Prazos e alterações</h5>
                                <p>O funcionamento deste website se dá por prazo indeterminado.

                                O website no todo ou em cada uma das suas seções, pode ser encerrado, suspenso ou interrompido unilateralmente por dakipraki, a qualquer momento e sem necessidade de prévio aviso.</p>

                                <h5>Seção 8 - Dados pessoais</h5>
                                <p> Durante a utilização deste website, certos dados pessoais serão coletados e tratados por dakipraki e/ou pelos Parceiros. As regras relacionadas ao tratamento de dados pessoais de dakipraki estão estipuladas na Política de Privacidade.</p>

                                <h5>Seção 9 - Contato</h5>
                                <p> Caso você tenha qualquer dúvida sobre os Termos de Uso, por favor, entre em contato pelo <a href='mailto:dakipraki.local@gmail.com'>email.</p>
                            </div>
                            <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
                            </div>
                        </div>

                        <div class="row center">

                            <button type="button" class="btn waves-effect waves-light" onclick="return submit_register()" id="btn_reg" name="reg_btn">Registrar
                                <i class=" hide-on-small-only material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                    <div class="row container_existing_acc center">
                        <p>Já tem uma conta? <a href="login.php">Faça o login</a></p>
                    </div>

                    <div class="row center">
                        <p id="error_msg5" class="center" style="font-size:50%; color:red;"></p>
                    </div>

                </form>
            </div>

            </div>
        </div>
    </section>

<?php
    include 'footer.php'; 
?>