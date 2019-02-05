//VALIDACION DEL FORMULARIO DE LOGIN
$("#autenticarUsuario").formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-delete',
        validating: 'fa fa-cog'
    },
    fields: {
        login: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 30,
                    message: 'Debe tener entre 3 y 30 caracteres<br>'
                }
            }
        },
        clave: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 8,
                    max: 20,
                    message: 'Debe tener entre 8 y 20 caracteres'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'Solo puede contener letras y numeros'
                }
            }
        }
    }
}).on("success.form.fv", function (e) {
    e.preventDefault();
    let data = $("#autenticarUsuario").serialize();
        $.post("app/controller/index.controller/iniciar.sesion.php", data, function(resp){
            console.log(resp);
            if (resp == 1){
                alertify.alert('Temp Admin', 'Bienvenido!', function(){
                    window.location = "app/view/index/home.php";
                });
            }
            if (resp == 2){
                alertify.alert('Error', 'El Usuario no existe', function(){
                    $("#autenticarUsuario").trigger("reset");
                });
            }
            if (resp == 3){
                alertify.alert('Error', 'La clave no coincide con el usuario', function(){
                    $("#autenticarUsuario").trigger("reset");
                });
            }
            if (resp == 4){
                alertify.alert('Atencion!', 'Usted se encuentra deshabilitado, por favor comuniquese con el administrador si es un error', function(){
                    $("#autenticarUsuario").trigger("reset");
                });
            }
     });   
        
});

//VALIDACION DEL FORMULARIO DE LOGIN
$("#recuperarClave").formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-delete',
        validating: 'fa fa-cog'
    },
    fields: {
        correo: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 3,
                    max: 60,
                    message: 'No cumple los requisitos, debe tener el formato xxxx@xxxx.xxx'
                },
                regexp: {
                    regexp: /[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/,
                    message: 'Direccion de correo invalida<br>'
                }
            }
        },
        pregunta: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 255,
                    message: 'Debe tener entre 3 y 255 caracteres<br>'
                }
            }
        },
        respuesta: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 3,
                    max: 255,
                    message: 'Debe tener entre 3 y 255 caracteres'
                }
            }
        },
        clave: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 8,
                    max: 20,
                    message: 'Debe tener un minimo de 8 caracteres y un maximo de 20'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'Solo puede contener letras y numeros'
                },
                identical: {
                    field: 'clave2',
                    message: 'Debe ser igual al campo siguiente'
                }
            }
        },
        clave2: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 8,
                    max: 20,
                    message: 'Debe tener un minimo de 8 caracteres y un maximo de 20'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'Solo puede contener letras y numeros'
                },
                identical: {
                    field: 'clave',
                    message: 'Debe ser igual al campo anterior'
                }
            }
        }
    }
}).on("success.form.fv", function (e) {
    e.preventDefault();
    let data = $("#recuperarClave").serialize();
        $.post("app/controller/index.controller/recuperar.clave.php", data, function(resp){
            console.log(resp);
            if (resp == 1){
                alertify.alert('Exito!', 'Clave Modificada, puede ingresar con su nueva clave', function(){
                    window.location = "index.php";
                });
            }
            if (resp == 2){
                alertify.alert('Error', 'No se puede realizar la accion, intente mas tarde', function(){
                    $("#recuperarClave").trigger("reset");
                });
            }
            if (resp == 3){
                alertify.alert('Error', 'Los datos no coinciden', function(){
                    $("#recuperarClave").trigger("reset");
                });
            }
            if (resp == 4){
                alertify.alert('Error', 'Las claves no coinciden', function(){
                    $("#recuperarClave").trigger("reset");
                });
            }
     });   
        
});

//VALIDACION DEL FORMULARIO DE AGREGAR USUARIO
$("#agregarUs").formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-delete',
        validating: 'fa fa-cog'
    },
    fields: {
        nombre: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 30,
                    message: 'Debe tener entre 3 y 30 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/,
                    message: 'Solo puede contener letras'
                }
            }
        },
        apellido: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 30,
                    message: 'Debe tener entre 3 y 30 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/,
                    message: 'Solo puede contener letras'
                }
            }
        },
        usuario: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 30,
                    message: 'Debe tener entre 3 y 30 caracteres<br>'
                }
            }
        },
        clave: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 8,
                    max: 20,
                    message: 'Debe tener un minimo de 8 caracteres y un maximo de 20'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'Solo puede contener letras y numeros'
                },
                identical: {
                    field: 'clave2',
                    message: 'Debe ser igual al campo siguiente'
                }
            }
        },
        clave2: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 8,
                    max: 20,
                    message: 'Debe tener un minimo de 8 caracteres y un maximo de 20'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'Solo puede contener letras y numeros'
                },
                identical: {
                    field: 'clave',
                    message: 'Debe ser igual al campo anterior'
                }
            }
        },
        correo: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 3,
                    max: 60,
                    message: 'No cumple los requisitos, debe tener el formato xxxx@xxxx.xxx'
                },
                regexp: {
                    regexp: /[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/,
                    message: 'Direccion de correo invalida<br>'
                }
            }
        },
        telf: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 11,
                    max: 11,
                    message: 'Debe tener 11 caracteres<br>'
                },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'Solo puede contener numeros'
                }
            }
        },
        pregunta: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 255,
                    message: 'Debe tener entre 3 y 255 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/,
                    message: 'Solo puede contener letras y numeros'
                }
            }
        },
        respuesta: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 255,
                    message: 'Debe tener entre 3 y 255 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/,
                    message: 'Solo puede contener letras y numeros'
                }
            }
        }
    }
}).on("success.form.fv", function (e) {
    e.preventDefault();
    let data = $("#agregarUs").serialize();
        $.post("../../controller/usuarios.controller/insertar.usuario.php", data, function(resp){
          console.log(resp);
            if (resp == 1){
                alertify.alert('Exito!', 'Usuario Registrado con Exito', function(){
                    location.reload();
                });
            }
            if (resp == 2){
                alertify.alert('Error!', 'El correo ya se encuentra en la base de datos', function(){
                    $("#agregarUS").trigger("reset");
                });
            }
            if (resp == 3){
                alertify.alert('Error!', 'El nombre de usuario ya se encuentra en la base de datos', function(){
                    $("#agregarUS").trigger("reset");
                });
            }
            if (resp == 4){
                alertify.alert('Error!', 'No se puede agregar usuario, intenta mas tarde', function(){
                    $("#myModal").modal("toggle");
                });
            }
            if (resp == 5){
                alertify.alert('Error!', 'Las claves no coinciden', function(){
                    $("#agregarUS").trigger("reset");
                });
            }
     });   
        
});

//VALIDACION DEL FORMULARIO DE EDITAR USUARIO
$("#editarUs").formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-delete',
        validating: 'fa fa-cog'
    },
    fields: {
        nombre: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 30,
                    message: 'Debe tener entre 3 y 30 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/,
                    message: 'Solo puede contener letras'
                }
            }
        },
        apellido: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 30,
                    message: 'Debe tener entre 3 y 30 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/,
                    message: 'Solo puede contener letras'
                }
            }
        },
        usuario: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 30,
                    message: 'Debe tener entre 3 y 30 caracteres<br>'
                }
            }
        }
    }
}).on("success.form.fv", function (e) {
    e.preventDefault();
    let data = $("#editarUs").serialize();
        $.post("../../controller/usuarios.controller/editar.usuario.php", data, function(resp){
          console.log(resp);
            if (resp == 1){
                alertify.alert('Exito!', 'Usuario modificado con Exito', function(){
                    window.location = "control.usuarios.php";
                });
            }
            if (resp == 2){
                alertify.alert('Error!', 'No se puede editar usuario, intenta mas tarde', function(){
                    $("#myModal").modal("toggle");
                });
            }
            if (resp != 1 && resp != 2){
                alertify.alert('Error!', 'El nombre de usuario ya se encuentra en la base de datos', function(){
                    $("#editarUs").trigger("reset");
                });
            }
     });   
        
});

//VALIDACION DEL FORMULARIO DE EDITAR DATOS DE CONTACTO
$("#editarDatCont").formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-delete',
        validating: 'fa fa-cog'
    },
    fields: {
        correo: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 3,
                    max: 60,
                    message: 'No cumple los requisitos, debe tener el formato xxxx@xxxx.xxx'
                },
                regexp: {
                    regexp: /[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/,
                    message: 'Direccion de correo invalida<br>'
                }
            }
        },
        telf: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 11,
                    max: 11,
                    message: 'Debe tener 11 caracteres<br>'
                },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'Solo puede contener numeros'
                }
            }
        }
    }
}).on("success.form.fv", function (e) {
    e.preventDefault();
    let data = $("#editarDatCont").serialize();
        $.post("../../controller/perfil.controller/editar.datos.php", data, function(resp){
          console.log(resp);
            if (resp == 1){
                alertify.alert('Exito!', 'Datos modificado con Exito', function(){
                    window.location = "ver.perfil.php";
                });
            }
            if (resp == 2){
                alertify.alert('Error!', 'No se pueden modificar los datos, por favor intente mas tarde.', function(){
                    window.location = "ver.perfil.php";
                });
            }
            if (resp != 1 && resp != 2){
                alertify.alert('Error!', 'El correo ya se encuentra en uso', function(){
                    $("#editarDatCont").trigger("reset");
                });
            }
     });   
        
});

//VALIDACION DEL FORMULARIO DE EDITAR DATOS DE SEGURIDAD
$("#editarDatSeg").formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-delete',
        validating: 'fa fa-cog'
    },
    fields: {
        pregunta: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 255,
                    message: 'Debe tener entre 3 y 255 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/,
                    message: 'Solo puede contener letras y numeros'
                }
            }
        },
        respuesta: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio<br>'
                },
                stringLength: {
                    min: 3,
                    max: 255,
                    message: 'Debe tener entre 3 y 255 caracteres<br>'
                },
                regexp: {
                    regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/,
                    message: 'Solo puede contener letras y numeros'
                }
            }
        },
        correo: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 3,
                    max: 60,
                    message: 'No cumple los requisitos, debe tener el formato xxxx@xxxx.xxx'
                },
                regexp: {
                    regexp: /[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/,
                    message: 'Direccion de correo invalida<br>'
                }
            }
        }
    }
}).on("success.form.fv", function (e) {
    e.preventDefault();
    let data = $("#editarDatSeg").serialize();
        $.post("../../controller/perfil.controller/editar.preg.resp.php", data, function(resp){
          console.log(resp);
            if (resp == 1){
                alertify.alert('Exito!', 'Datos modificado con Exito', function(){
                    window.location = "ver.perfil.php";
                });
            }
            if (resp == 2){
                alertify.alert('Error!', 'No se pueden modificar los datos, por favor intente mas tarde.', function(){
                    window.location = "ver.perfil.php";
                });
            }
            if (resp != 1 && resp != 2){
                alertify.alert('Error!', 'El correo no es el correcto', function(){
                    $("#editarDatSeg").trigger("reset");
                });
            }
     });   
        
});

//VALIDACION DEL FORMULARIO DE EDITAR CLAVE
$("#editarClave").formValidation({
    framework: 'bootstrap',
    icon: {
        valid: 'fa fa-check',
        invalid: 'fa fa-delete',
        validating: 'fa fa-cog'
    },
    fields: {
        clave_nuev: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 8,
                    max: 20,
                    message: 'Debe tener un minimo de 8 caracteres y un maximo de 20'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'Solo puede contener letras y numeros'
                },
                identical: {
                    field: 'clave_conf',
                    message: 'Debe ser igual al campo siguiente'
                }
            }
        },
        clave_conf: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 8,
                    max: 20,
                    message: 'Debe tener un minimo de 8 caracteres y un maximo de 20'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_]+$/,
                    message: 'Solo puede contener letras y numeros'
                },
                identical: {
                    field: 'clave_nuev',
                    message: 'Debe ser igual al campo anterior'
                }
            }
        },
        correo: {
            validators: {
                notEmpty: {
                    message: 'No puede estar vacio'
                },
                stringLength: {
                    min: 3,
                    max: 60,
                    message: 'No cumple los requisitos, debe tener el formato xxxx@xxxx.xxx'
                },
                regexp: {
                    regexp: /[a-z0-9]+[_a-z0-9\.-]*[a-z0-9]+@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/,
                    message: 'Direccion de correo invalida<br>'
                }
            }
        },
    }
}).on("success.form.fv", function (e) {
    e.preventDefault();
    let data = $("#editarClave").serialize();
        $.post("../../controller/perfil.controller/editar.clave.php", data, function(resp){
          console.log(resp);
            if (resp == 1){
                alertify.alert('Exito!', 'Datos modificado con Exito', function(){
                    window.location = "ver.perfil.php";
                });
            }
            if (resp == 2){
                alertify.alert('Error!', 'No se pueden modificar los datos, por favor intente mas tarde.', function(){
                    window.location = "ver.perfil.php";
                });
            }
            if (resp != 1 && resp != 2){
                alertify.alert('Error!', 'El correo no es el correcto', function(){
                    $("#editarDatSeg").trigger("reset");
                });
            }
     });   
        
});