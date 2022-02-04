<?php $title = 'Start Page'; ?>

<?php ob_start(); ?>


<div class="body-start">
    
<div class="container-fluid container-start">
    <div class="container text-center start">
        
        <i class="fa fa-barcode" aria-hidden="true"></i><h1>Myuka, scannez votre assiette.</h1>
        
        <a href="#"><div class="btn btn-outline-light btn-start"> Je commence</div></a>
        <form method="post" action="product.php" class="purple-bg" id="scan" style="display: none">
            <fieldset class="no_border shadow">
                <div class="info_form">
                    <input type="text" name="searchbar" id="searchbar" placeholder="Chercher un produit, une marque, un code-barres :">
                    <p id="txtDel"></p>
                    <!--<div><input  class="btn btn-outline-light" type="submit" value="Envoyer" id="validButton"/></div>-->
                    <input class="btn btn-outline-light" id="validButton" type="submit" value="Scanner" name="scanner"></input>
                    
                </div>

                
            </fieldset>
        </form>
    </div>
    
</div>

</div>

<?php 

$content = ob_get_clean();

require('template.php'); 

?>