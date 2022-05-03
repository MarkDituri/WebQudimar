alert("Javascript imported");


document.addEventListener('DOMContentLoaded', function() {
    $('#clave_1').keyup(function(e) {    
        //Validar clave segura        
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        var respClave;
        if (false == enoughRegex.test($(this).val())) {
                $('#msg-clave_1').html('Más caracteres.');
                respClave = false;
        } else if (strongRegex.test($(this).val())) {
                $('#msg-clave_1').className = 'ok';
                $('#msg-clave_1').html('Fuerte!');
                respClave = true;
        } else if (mediumRegex.test($(this).val())) {
                $('#msg-clave_1').className = 'alert';
                $('#msg-clave_1').html('Media!');
                respClave = true;
        } else {
                $('#msg-clave_1').className = 'error';
                $('#msg-clave_1').html('Débil!');
                respClave = false;
        }

        //NUEVO USUARIO
        let divLoading = document.querySelector("#divLoading");
        let formCrear = document.querySelector("#formCrear");
        formCrear.onsubmit = function(e) {
            if(respClave === true){
                alert("ES TRUE");                
                e.preventDefault();        
                let clave_1 = document.querySelector('#clave_1').value;
                let clave_2 = document.querySelector('#clave_2').value;
                let email = document.querySelector('#email').value;                

                console.log("La clave 1es "+clave_1+" La clave 2: "+clave_2+" Mail: "+email);

                if (clave_1 == '' || clave_2 == '' || email == '') {
                    alert("Datos Mal cargados");
                    // document.querySelector("#msg-gral").focus();
                    // document.querySelector("#msg-gral").innerHTML = "<div class='msg-gral'>Todos los campos son obligatorios</div>";            
                    return false;           
                } else {
                    if(clave_1 === clave_2){
                        alert("Deberia Mandar?");            
                    } else {
                        alert("No hay coindicencia");
                        return false;
                    }                  
                }
            } else {
                alert("No che");
                return false;
            }         
                            
        }
        
        console.log(respClave);      
        return false;  
    });
})

// function ValidarMail(){
  

// }


// console.log(ValidarMail());

// if(ValidarMail() === true){
//     alert("Dio TRUE");
// }

