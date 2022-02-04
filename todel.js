var product_id;
    //var product_id_input;

    //$('#txtDel').text("proutprout");
    $("#validButton").click(function (){
        //product_id = getInput(product_id_input)

        //product_id = $( '#searchbar' ).val();
        getProduct(product_id);

        //var newText = 'This text has changed !'
        //$('#txtDel').text(product_id);
            
        //alert($('#searchbar').val());
        
/*          var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://world.openfoodfacts.org/api/v0/product/"+product_id+".json",
            "method": "GET"
        }
        
        $.ajax(settings).done(function (response) {
            console.log(response);
            
            //var content = response.wind.speed;
            var content = response.product.product_name_en
            $("#productName").append(content);
        
        }); */
    });


// product_id = 737628064502;
/*     function getInput(product_id_input) {
        var requete = new XMLHttpRequest();
        requete.onload = function() {
        //La variable à passer est alors contenue dans l'objet response et l'attribut responseText.
        product_id_input = this.responseText;
        };
        requete.open("get", "product.php", true); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
        requete.send();
        
    } */

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