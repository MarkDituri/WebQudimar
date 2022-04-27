

document.addEventListener('DOMContentLoaded', function() {
    //NUEVO USUARIO
    let divLoading = document.querySelector("#divLoading");
    let formCrear = document.querySelector("#formCrear");
    formCrear.onsubmit = function(e) {
        e.preventDefault();
   
        let strNombre = document.querySelector('#nombre').value;
        let strEmail = document.querySelector('#email').value;
        let strCelular = document.querySelector('#celular').value;
        let strNegocios = document.querySelector('#negocio').value;
        let strUrlNegocio = document.querySelector('#url_negocio').value;

        if (strNombre == '' || strEmail == '' || strCelular == '' || strNegocios == '' || strUrlNegocio == '') {
            document.querySelector("#msg-gral").innerHTML = "<div class='msg-gral'>Todos los campos son obligatorios</div>";            
            return false;           
        } else {
            document.querySelector("#msg-gral").innerHTML = "";           
            if(validarNombre(strNombre) === false || validarEmail(strEmail) === false || validarCelular(strCelular) === false || validarNegocio(strNegocios) === false ||  validarUrlNegocio(strUrlNegocio) === false){
                console.log("Algo dato dio es falso");
            } else {
                console.log("Tados correctos, enviando...");                      
                divLoading.style.display = "flex";
                console.log("I am the first log");
                console.log(divLoading);
                setTimeout(function(){
                    console.log("I am the third log after 5 seconds");
                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    let ajaxUrl = 'php/crear_cuenta.php';
                    let formData = new FormData(formCrear);
                    request.open("POST", ajaxUrl, true);
                    request.send(formData);
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200) {
        
                            let objData = JSON.parse(request.responseText);
                            console.log(objData);
    
                            if (objData.status) {
                                console.log("Status 200");
                                document.querySelector("#section-action").style.display = "none";
                                document.querySelector("#section-msg").style.display = "flex";
                            } 
                            else {
                                console.log(objData.input);
                                if(objData.input === 'email'){
                                    document.querySelector("#url_negocio").classList.remove("error-inp");
                                } else if (objData.input === 'url_negocio'){
                                    document.querySelector("#email").classList.remove("error-inp");
                                }
                                document.querySelector("#"+objData.input).classList.add("error-inp");
                                document.querySelector("#"+objData.input).focus();
                                document.querySelector("#msg-gral").innerHTML = "<div class='msg-gral'>"+objData.msg+"</div>";            
                            }
                        }
                       divLoading.style.display = "none";
                       return false;
                    }
                },2000);
                
                console.log("I am the second log");

            }          
        }                               
    }
})


// Funciones

function validarNombre(strNombre) {
    if (strNombre.length > 4){  
        document.querySelector('#msg-nombre').innerHTML = "";
        document.querySelector('#nombre').classList.remove("error-inp");
    } else {
        document.querySelector('#msg-nombre').innerHTML = "<span style='color: red'>Nombre demasiado corto</span>";
        document.querySelector('#nombre').classList.add("error-inp");
        return false;
    }
}

function validarEmail(strEmail){
    return true;
}

// function validarEmail(callback) {    
//     if (strEmail.length <= 2){
//         document.querySelector('#msg-email').innerHTML = "";
//         document.querySelector('#email').classList.add("error-inp");
//         alert("Email Corecto")
//         return false;
//     } else {
//         document.querySelector('#msg-email').innerHTML = "";
//         document.querySelector('#email').classList.remove("error-inp");
          
//         // divLoading.style.display = "flex";
//         let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//         let ajaxUrl = 'php/val_email.php';
//         let formData = new FormData(formCrear);
//         request.open("POST", ajaxUrl, true);
//         request.send(formData);
    
//         request.onreadystatechange = function() {
//             if (request.readyState == 4 && request.status == 200) {
//                 alert("SIII !200");
    
//                 let objData = JSON.parse(request.responseText);
//                 if (objData.status) {
//                     document.querySelector('#msg-email').innerHTML = "<span style='green: red'>Mail valido!</span>";
//                     callback(request.responseText);
//                 } else {                    
//                     document.querySelector('#msg-email').innerHTML = "<span style='color: red'>Este email esta en uso</span>";                    
//                     callback(request.responseText);
//                 }
//                 alert("el return es " + objData.status);
    
//             }        
//       // divLoading.style.display = "none";                        
//         }

//     }

// }



function validarCelular(strCelular) {
    if (strCelular.length > 6){        
        document.querySelector('#msg-celular').innerHTML = "";
        document.querySelector('#celular').classList.remove("error-inp");
    } else {        
        document.querySelector('#msg-celular').innerHTML = "<span style='color: red'>Ingrese un numero valido</span>";
        document.querySelector('#celular').classList.add("error-inp");
        return false;
    }
}
function validarNegocio(strNegocios) {
    if (strNegocios.length >= 2){
        document.querySelector('#msg-negocio').innerHTML = "";
        document.querySelector('#negocio').classList.remove("error-inp");
    } else {
        document.querySelector('#msg-negocio').innerHTML = "<span style='color: red'>Nombre demasiado corto</span>";
        document.querySelector('#negocio').classList.add("error-inp");
        return false;
    }
}

function validarUrlNegocio(strUrlNegocio) {    
    return true;
    // if (strUrlNegocio.length >= 2){
    //     document.querySelector('#msg-url_negocio').innerHTML = "";
    //     document.querySelector('#url_negocio').classList.remove("error-inp");
          
    //     // divLoading.style.display = "flex";
    //     let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    //     let ajaxUrl = 'php/val_url.php';
    //     let formData = new FormData(formCrear);
    //     request.open("POST", ajaxUrl, true);
    //     request.send(formData);
    //     request.onreadystatechange = function() {
    //         if (request.readyState == 4 && request.status == 200) {

    //             let objData = JSON.parse(request.responseText);
    //             if (objData.status) {
    //                 alert("URL Valida");
    //             } else {
    //                 document.querySelector('#msg-url_negocio').innerHTML = "<span style='color: red'>Este nombre esta en uso</span>";
    //                 return false;
    //             }
    //         }
    //         // divLoading.style.display = "none";
    //         return false;
    //     }
    //     return false;
    // } else {
    //     alert("Nombre URL corto");
    //     document.querySelector('#msg-url_negocio').innerHTML = "<span style='color: red'>Demasiado corto</span>";
    //     document.querySelector('#url_negocio').classList.add("error-inp");
    //     return false;        
    // }
}