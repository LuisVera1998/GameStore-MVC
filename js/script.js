
async function productes(id) { //productes per idCategoria
    document.getElementById('detall_producte').innerHTML = ''; 

    resposta = await fetch("./../controller/controller_productes.php?id=" + id);
    resptxt = await resposta.text();
    document.getElementById('product-list').innerHTML = resptxt;
}


async function buscarProducte() { //capturar input de l'usuari

    const nom = document.getElementById('search-input').value.trim();

    if (nom) {
        await productesPerNom(nom);
    } 
}

async function productesPerNom(nom) { // productes per nom
    document.getElementById('detall_producte').innerHTML = ''; 

    const respuesta = await fetch("./../controller/controller_productes.php?nom=" + encodeURIComponent(nom));
    const resptxt = await respuesta.text();

    document.getElementById('product-list').innerHTML = resptxt;
}

async function detallProducte(id, idCategoria) { //detalls
    var resposta = await fetch(`./../controller/controller_productes.php?id_producte=${id}&id_categoria=${idCategoria}`);
    var resptxt = await resposta.text();
    document.getElementById('detall_producte').innerHTML = resptxt;

    
    /*const detallesSeccion = document.getElementById('detall_producte'); //no funciona
    detallesSeccion.scrollIntoView({ behavior: 'smooth' });*/
}


$(document).ready(function () { //menu 
    $('#userMenuButton').click(function () {
        $('#userMenu').toggle(); 
    });


    $(document).click(function (e) {
        if (!$(e.target).closest('#userMenu, #userMenuButton').length) {
            $('#userMenu').hide();
        }
    });
});


$(document).ready(function() { // afegir a carrito
    console.log("El documento está listo");

    $(document).on("submit", ".agregarCarritoForm", function(event) {
        event.preventDefault();

        console.log("Formulario enviado");

        var form = $(this);
        var productId = form.find("input[name='product_id']").val();
        var quantity = form.find("input[name='cantidad']").val();
        var preu = form.find("input[name='preu']").val();
        var productNom = form.find("input[name='product_nom']").val();

        if (!productId || !quantity || !preu || !productNom) {
            alert("Todos los campos deben ser completados.");
            return;
        }

        $.ajax({
            url: "./../controller/controller_carrito.php",  
            method: "POST",
            data: {
                id: productId,
                quantity: quantity,
                preu: preu,
                product_nom: productNom
            },
            success: function(response) {
                var data = JSON.parse(response);  
                alert(data.message);


                $("#resum-carrito").html("Total productos: " + data.total_items + " | Total: €" + data.total_price);
            },
            error: function() {
                console.log("Error al agregar al carrito.");
                alert("Hubo un error al agregar el producto al carrito.");
            }
        });
    });
});

