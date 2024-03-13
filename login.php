<?php
include 'header.php'; 

if(isset($_POST['$userloggedin']))
{
    header('index.php');
}
?>

    <section class="container_signup_card valign-wrapper">
        <div class="card signup_card center">
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
            <div class="container_signup_img">
                <div class="container_overlay">
                    <a href="index.php" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Voltar</a>
                </div>
                <img rel="preload" src="resources/img/bg/loginbg2.svg" alt="bg image">
            </div>
            <div class="container_signup_form" id="login">
                <form class="col s12" method="POST">
                    <div class="row center" style="margin-top:30px">
                        <h5>Login seguro</h5>
                    </div>
                    <div class="container_inputs">
                        <div class="row">          
                            <div class="input-field col s12">
                                <i class="material-icons prefix">phone</i>
                                <input data-length="9" id="phone2" onkeyup="checkPhoneLogin()" onkeydown="checkPhoneLogin()" required type="number" name="phone"  class="validate">
                                <label for="phone">Telefone</label>
                                <p id="error_msg3" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>
                                <p id="error_msg2" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>                               
                            </div>
                        </div>

                        <div class="row">          
                            <div class="input-field col s12">
                                <i class="material-icons prefix">key</i>
                                <input onkeydown="checkPhoneLogin(), activelogin()" onkeyup="checkPhoneLogin(), activelogin()" onkeypress="  checkPhoneLogin(), activelogin()"  required name="password" id="password" type="password" disabled class="validate">
                                <label id="pass_label" for="password">Verifique o número de telefone</label>
                                <p id="error_msg1" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>
                            </div>
                        </div>
                    
                        <div class="row center">

                            <button type="button" class="btn waves-effect waves-light" style="margin-bottom: 20px !important;" onclick="return userLogin()" id="btn_login" disabled name="reg_btn">
                                Entrar
                                <i class=" hide-on-small-only material-icons right">login</i>
                            </button>
                        </div>
                    </div>

                    <div class="center row container_existing_acc">
                        <p>Esqueceu a palavra passe? <a href="register.php">Redefinir</a></p>
                    </div>

                    <div class="center row container_existing_acc">
                        <p>Não tem uma conta? <a href="register.php">Faça o registro</a></p>
                    </div>

                    <div class="row center">
                        <p id="error_msg5" class="center" style=" width:70%; padding: 0 15px;font-size:50%;text-align:center;margin: 30px auto; color:red;"></p>
                    </div>

                </form>
            </div>

            </div>
        </div>
    </section>

<?php
    include 'footer.php'; 
?>