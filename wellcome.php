<?php
include 'header.php'; 
$phone_number = "";
$wlc = "";

if(isset($_POST['$userloggedin']))
{
    header('Location: index.php');
}
else
{
    if(isset($_GET['phone']))
    {
        if(isset($_GET['wlc']))
        {
            $phone_number = $_GET['phone'];
            $wlc = $_GET['wlc'];
        
            if(strlen($phone_number) != 9 )
            header('Location: index.php?info=NUMBERFORMATWRONG');
            
            if($wlc == "no")
            {
                $update_welcomed = mysqli_query($con, "UPDATE `accounts` SET `wellcomed` = 'yes' WHERE `acc_phone` = '$phone_number'");
            }
            else
                header('Location: index.php?info=ALREADYWELLCOMENUMBER');
        

           
        }
        else
            {
                header('Location: index.php?info=WLCNOTSET');
            }
        
    }
    else
    {
        header('Location: index.php?info=PHONENOTSET');
    }
}
?>

    <div class="container_wellcome_msg" id="">
        <div class="success_modal card" id="reg_success">
            <div class="row center">
                <img rel="preload" src="resources/img/icons/check.svg" alt="check">
            </div>
            <div class="row">
                <div class="row center">
                    
                    <h5>Registro completo</h5>
                </div>
                <div class="row">
                    <p style="padding: 0 15px;text-align:justify">
                        Bem-vindo ao Dakipraki! Estamos muito contentes por o ter a bordo. 
                        
                        <br>
                        <br>
                        Use os seguintes dados para aceder a plataforma:
                        <br>
                        Número de telefone: <b id=""><u><?php echo $phone_number; ?></u></b>
                        <br>
                        Palavra passe: <b><i><u>'a sua palvra passe'</u></i></b>
                        <br>
                        <br>

                        Reserve um momento para explorar 
                        a nossa plataforma e familiarizar-se com as suas funcionalidades. 
                        Para melhorar a sua experiência, encorajamo-lo a completar 
                        o seu perfil o mais rapido possível.
                        <br>
                        <br>
                        Obrigado por escolher Dakipraki - a sua porta de entrada para um mundo 
                        de possibilidades.
                        <br>
                        <br>
                        Boas boladas!
                        <br>
                        <br>
                        <b>A EQUIPE DA DAKIPRAKI!</b>
                    </p>
                </div>
                <div class="row center">
                    <a href="login.php" class="btn waves-effect waves-light">Entrar <i class="material-icons right">login</i></a>
                </div>

            </div>
        </div>
    </div>


<?php
    include 'footer.php'; 
?>

        

