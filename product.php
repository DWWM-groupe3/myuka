<?php $title = 'Product Page'; ?>

<?php ob_start(); ?>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <!--HEADER-->
        <nav class="navbar navbar-expand-lg purple-bg navbar-dark fixed-top">
            <a class="navbar-brand" href="index.html">
                
                <h1><img src="./img/logo.png" width=auto height="50" alt="logo" class="logo">Myuka</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Nav Items-->
            <div id="navbarContent" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produit">Produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#santé">Santé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#environnement">Environnement</a>
                    </li>
                    </ul>
                </div>
        </nav>

        <!-- Content -->            
        <!--SCAN DE PRODUIT-->
        <div class="container-fluid grey-bg">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="jumbotron light-bg">
                            <h2>Scan de produit</h2>
                            <hr class="mb-5"/>
                            <!--
                            <form method="post" action="" class="purple-bg" id="scan">
                                <fieldset class="no_border shadow">
                                    <div class="info_form">
                                        <input type="text" name="searchbar" id="searchbar" placeholder="Chercher un produit, une marque, un code-barres :">
                                        <p id="txtDel"></p>
                                        
                                        <button class="btn btn-outline-light" id="validButton" type="button">Scanner</button>
                                    </div>
                
                                    
                                </fieldset>
                            </form>
                            -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="container jumbotron">
                <div class="col" id="produit">
                    <div class="subtitle">
                        <h2>Informations Produit</h2>
                        <hr class="mb-5"/>
                    </div>


                            <script>

                                <?php
                                if ( isset( $_POST['scanner'] ) ) {
                                    $product_id = $_POST['searchbar'];
                                    echo "var product_id = '$product_id';";
                                ?>
                                getProduct(product_id);

                                <?php
                                };
                                ?>



                            function getProduct(product_id) {
                                var settings = {
                                "async": true,
                                "crossDomain": true,
                                "url": "https://world.openfoodfacts.org/api/v0/product/"+product_id+".json",
                                "method": "GET"
                                }

                                $.ajax(settings).done(function (response) {
                                    console.log(response);
                                    if(response.status == 1){
                                        //var content = response.wind.speed;
                                        var productName = response.product.product_name_en
                                        var productCode = response.product.code
                                        $("#productName").append(productName);
                                        $("#productCode").append(productCode);
                                    } else {
                                        alert("Le produit n'existe pas. Veuillez rééssayer.")
                                    }


                                });
                            };
                            </script>
                                <div class="card product-card">
                                    <img id="product-img" src="./img/starbucks.jpeg">
                                    <div class="card-img-overlay blur-box">
                                        <div class="card-title">
                                            <h3 class="text-white" id="productName"></h3>
                                            <h4 class="text-light">© Starbucks</h4>
                                            
                                        </div>
                                        <div class="card-body">
                                            
                                            <div id="productCode">Code-barres : </div>  <br>
                                            
                                                
                                            <!--<p style="background-color: red; height: 0.5em; width: 0.5em; border-radius: 50%;"></p>-->
                                            9/100<svg height="100" width="100">
                                                <circle cx="50" cy="50" r="20" stroke="black" stroke-width="3" fill="red" />
                                            </svg>
                                            <p>Nutriscore <img src="./img/nutriscore.png" class="icone" style="width: 2em;"></p>
                                            
                                            <button class="btn purple-bg text-white"><a href="#santé">Voir Détails</a></button>
                                        </div>

                                    </div>

                                    
                                </div>;
                </div>
                    
            </div>
            
        </div>
        <!-- Santé -->
        <div class="container-fluid grey-bg">
            <div class="container jumbotron">
                <div class="row">
                    <div class="col">
                        <div class="subtitle">
                            <h2 id="santé">Santé</h2>
                            <hr class="mb-5"/>
                        </div>
                        <div class="nutri-section">
                            <div class="card nutri-card">
                                <div class="card-title"><h5>8.5g</h5> Sucre</div>
                                <img src = "./img/sugar.svg" alt="sugar SVG"/>
                            </div>
                            <div class="card nutri-card">
                                <div class="card-title"><h5>69Kcal</h5> Calories</div>
                                <img src = "./img/calories.svg" alt="sugar SVG"/>
                            </div>
                            <div class="card nutri-card">
                                <div class="card-title"><h5>0.08g</h5> Sel</div>
                                <img src = "./img/salt.svg" alt="sugar SVG"/>
                            </div>
                            <div class="card nutri-card">
                                <div class="card-title"><h5>2.7g</h5> Protéines</div>
                                <img src = "./img/protein.svg" alt="sugar SVG"/>
                            </div>
                        </div>
                        <div>
                            <br>
                            <button id="nutrition-btn" class="btn purple-bg text-white">Valeurs Nutritives</button>
                            <button id="ingredient-btn" class="btn purple-bg text-white">Ingrédients</button>
                        </div>

                    </div>
                    
                </div>
                

                <div class="row flex-row">
                    <div class="col-12 col-lg-6" id="nutrition-page" style="display: none">
                        <h3>Valeurs Nutritives</h3>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Composition</th>
                                    <th>Quantité</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Calories</td>
                                    <td>69&nbspkcal</td>
                                    <td>3&nbsp%</td>
                                </tr>
                                <tr>
                                    <td>Sucre</td>
                                    <td>8.5&nbspg</td>
                                    <td>9&nbsp%</td>
                                </tr>
                                <tr>
                                    <td>Additifs</td>
                                    <td>4</td>
                                    <td>&nbsp</td>
                                </tr>
                                <tr>
                                    <td>Sel</td>
                                    <td>0.08&nbspg</td>
                                    <td>1&nbsp%</td>
                                </tr>
                                <tr>
                                    <td>Graisses&nbspsaturées</td>
                                    <td>1.6&nbspg</td>
                                    <td>8&nbsp%</td>
                                </tr>
                                <tr>
                                    <td>Protéines</td>
                                    <td>2.7&nbspg</td>
                                    <td>5&nbsp%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                            
                    
                    <div class="col-12 col-lg-6" id="ingredient-page" style="display: none">
                        <h3>Ingrédients</h3>
                        <div class="card">
                            
                            <div class="card-body">
                            Lait (contient 3,0% de matières grasses) 75%,<br> café arabica Starbucks® (eau, extrait de café) 19.8%,<br> sucre,<br> cacao maigre en poudre 0.1%,<br> correcteur d'acidité (carbonates de potassium),<br> stabilisants (carraghénanes, gomme guar),<br> émulsifiants (mono - et diglycérides d'acides gras d'origine végétale),<br> arôme naturel,<br> arôme.
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Environnement -->
        <div class="container jumbotron">
            <div class="row">
                <div class="col-12" id="environnement">
                    <h2>Environnement</h2>
                    <hr class="mb-5"/>
                </div>
            </div>
            <div class="row flex-row">
                <div class="col-12 col-lg-4">
                    <div class="card env-card">
                        <div class="card-title">
                            <i class="fas fa-globe-europe"></i>
                            <h5>Production :</h5>
                            
                        </div>
                        Faible impact
                            
                    </div>
                    
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card env-card">
                        <div class="card-title">
                            <i class="fas fa-leaf"></i>
                            <h5>Huile de palme :</h5>
                            
                        </div>
                        Sauvegarde la forêt tropicale
                    </div>
                    
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card env-card">
                        <div class="card-title">
                            <i class="fas fa-hand-holding-heart"></i>
                            <h5>Fairtrade :</h5>
                            
                        </div>
                        Limite l'utilisation de pesticides
                        
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card env-card">
                        
                        <h5>Origine :</h5>
                        non communiquée
                    </div>
                    
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card env-card">
                        <h5>Emballage :</h5>
                        non communiquée
                    </div>
                    
                </div>
            </div>
        </div>
        


    </body>

<?php 

$content = ob_get_clean();

require('template.php'); 

?>