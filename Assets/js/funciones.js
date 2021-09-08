
//#region funciones usuarios
let tblUsuarios;
document.addEventListener("DOMContentLoaded",function(){
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listarUsuario",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idUsuario'
        },
        {
            'data' : 'nombreUsuario'
        },
        {
            'data' : 'nombre'
        },
        {
            'data' : 'apellido'
        },
        {
            'data' : 'nombreCaja'
        },
        {
            'data' : 'nombreRol'
        },
        {
            'data' : 'estado'
        },
        {
            'data' : 'acciones'
        }
    ]
    });
})

function frmUsuario(){
    document.getElementById("title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevoUsuario").modal("show");
    document.getElementById("idUsuario").value = "";
}
function registrarUsuario(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const password = document.getElementById("password");
    const confirmar = document.getElementById("confirmar");
    const caja = document.getElementById("caja");
    const rol = document.getElementById("rol");
    if(usuario.value == "" || nombre.value == "" || apellido.value == "" || caja.value=="" || rol.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'todo los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario registrado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $('#nuevoUsuario').modal("hide");
                      tblUsuarios.ajax.reload();
                }else if (res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $('#nuevoUsuario').modal("hide");
                      tblUsuarios.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
}
function btnEditarUsuario(id) {
    document.getElementById("title").innerHTML = "Actualizar Usuario";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    
    const url = base_url + "Usuarios/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url,true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("idUsuario").value= res.idUsuario;
            document.getElementById("usuario").value= res.nombreUsuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("caja").value = res.idCaja;
            document.getElementById("rol").value = res.idRol;
            document.getElementById("claves").classList.add("d-none");
            $("#nuevoUsuario").modal("show");
        }
    }
    //$("#nuevoUsuario").modal("show");
} 
function btnEliminarUsuario(id)
{
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Aun podras revertirlo el usuario eliminado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Usuario eliminado con exito.',
                        'success'
                    )
                    tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
function btnReingresarUsuario(id)
{
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si reingresar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Usuario reingresado con exito.',
                        'success'
                    )
                    tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
//#endregion
//#region Funciones Clientes
let tblClientes;
document.addEventListener("DOMContentLoaded",function(){
    tblClientes = $('#tblClientes').DataTable({
        ajax: {
            url: base_url + "Clientes/listarCliente",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idCliente'
        },
        {
            'data' : 'ci'
        },
        {
            'data' : 'nombreCompleto'
        },
        {
            'data' : 'telefono'
        },
        {
            'data' : 'direccion'
        },
        {
            'data' : 'estado'
        },
        {
            'data' : 'acciones'
        }
    ]
    });
})

function frmCliente(){
    document.getElementById("title").innerHTML = "Nuevo Cliente";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("idCliente").value = "";
    document.getElementById("frmCliente").reset();
    $("#nuevoCliente").modal("show");
}
function registrarCliente(e){
    e.preventDefault();
    const ci = document.getElementById("ci");
    const nombre = document.getElementById("nombre");
    const apellidoPaterno = document.getElementById("apellidoPaterno");
    const apellidoMaterno = document.getElementById("apellidoMaterno");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");
    if(ci.value == "" || nombre.value == "" || apellidoPaterno.value == "" || apellidoMaterno.value == "" || telefono.value=="" || direccion.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'todo los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url = base_url + "Clientes/registrarCliente";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente registrado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $('#nuevoCliente').modal("hide");
                      tblClientes.ajax.reload();
                }else if (res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente modificado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $('#nuevoCliente').modal("hide");
                      tblClientes.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
}
function btnEditarCliente(id) {
    document.getElementById("title").innerHTML = "Actualizar Cliente";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    
    const url = base_url + "Clientes/editarCliente/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url,true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            console.log(this.responseText);
            document.getElementById("idCliente").value= res.idCliente;
            document.getElementById("ci").value = res.ci;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellidoPaterno").value = res.apellidoPaterno;
            document.getElementById("apellidoMaterno").value = res.apellidoMaterno;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("direccion").value = res.direccion;
            $("#nuevoCliente").modal("show");
        }
    }
    //$("#nuevoUsuario").modal("show");
} 
function btnEliminarCliente(id)
{
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Aun podras revertirlo el usuario eliminado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/eliminarCliente/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Cliente eliminado con exito.',
                        'success'
                    )
                    tblClientes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
function btnReingresarCliente(id)
{
    Swal.fire({
        title: 'Esta seguro de Reingresar al Cliente?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si reingresar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Clientes/reingresarCliente/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Cliente reingresado con exito.',
                        'success'
                    )
                    tblClientes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
//#endregion
//#region Funciones Marcas
let tblMarcas;
document.addEventListener("DOMContentLoaded",function(){
    tblMarcas = $('#tblMarcas').DataTable({
        ajax: {
            url: base_url + "Marcas/listarMarca",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idMarca'
        },
        {
            'data' : 'nombreMarca'
        },
        {
            'data' : 'estado'
        },
        {
            'data' : 'acciones'
        }
    ]
    });
})

function frmMarca(){
    document.getElementById("title").innerHTML = "Nueva Marca";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmMarca").reset();
    document.getElementById("idMarca").value = "";
    $("#nuevaMarca").modal("show");
}
function registrarMarca(e){
    e.preventDefault();
    const nombreMarca = document.getElementById("nombreMarca");
    if(nombreMarca.value == "" ){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'el campo es obligatorio',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url = base_url + "Marcas/registrarMarca";
        const frmM = document.getElementById("frmMarca");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frmM));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Marca registrada!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frmM.reset();
                      $('#nuevaMarca').modal("hide");
                      tblMarcas.ajax.reload();
                }else if (res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Marca modificada!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $('#nuevaMarca').modal("hide");
                      tblMarcas.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
}
function btnEditarMarca(id) {
    document.getElementById("title").innerHTML = "Actualizar Marca";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    
    const url = base_url + "Marcas/editarMarca/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url,true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("idMarca").value= res.idMarca;
            document.getElementById("nombreMarca").value = res.nombreMarca;
            $("#nuevaMarca").modal("show");
        }
    }
    //$("#nuevoUsuario").modal("show");
} 
function btnEliminarMarca(id)
{
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Aun podras revertirlo la marca eliminada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Marcas/eliminarMarca/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Marca eliminada con exito.',
                        'success'
                    )
                    tblMarcas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
function btnReingresarMarca(id)
{
    Swal.fire({
        title: 'Esta seguro de Reingresar la marca?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si reingresar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Marcas/reingresarMarca/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Marca reingresado con exito.',
                        'success'
                    )
                    tblMarcas.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
//#endregion
//#region Funciones categorias
let tblCategorias;
document.addEventListener("DOMContentLoaded",function(){
    tblCategorias = $('#tblCategorias').DataTable({
        ajax: {
            url: base_url + "Categorias/listarCategoria",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idCategoria'
        },
        {
            'data' : 'descripcion'
        },
        {
            'data' : 'linea'
        },
        {
            'data' : 'estado'
        },
        {
            'data' : 'acciones'
        }
    ]
    });
})

function frmCategoria(){
    document.getElementById("title").innerHTML = "Nueva Categoria";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmCategoria").reset();
    document.getElementById("idCategoria").value = "";
    $("#nuevaCategoria").modal("show");
}
function registrarCategoria(e){
    e.preventDefault();
    const descripcion = document.getElementById("descripcion");
    const linea = document.getElementById("linea");
    if(descripcion.value == "" || linea.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'el campo es obligatorio',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url = base_url + "Categorias/registrarCategoria";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Categoria registrada!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $('#nuevaCategoria').modal("hide");
                      tblCategorias.ajax.reload();
                }else if (res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Categoria modificada!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $('#nuevaCategoria').modal("hide");
                      tblCategorias.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
}
function btnEditarCategoria(id) {
    document.getElementById("title").innerHTML = "Actualizar Categoria";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    
    const url = base_url + "Categorias/editarCategoria/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url,true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("idCategoria").value= res.idCategoria;
            document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("linea").value= res.linea;
            $("#nuevaCategoria").modal("show");
        }
    }
    //$("#nuevoUsuario").modal("show");
} 
function btnEliminarCategoria(id)
{
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Aun podras revertirlo la Categoria eliminada!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/eliminarCategoria/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Categoria eliminada con exito.',
                        'success'
                    )
                    tblCategorias.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
function btnReingresarCategoria(id)
{
    Swal.fire({
        title: 'Esta seguro de Reingresar la Categoria?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si reingresar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Categorias/reingresarCategoria/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Categoria reingresada con exito.',
                        'success'
                    )
                    tblCategorias.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
//#endregion
//#region funciones productos
let tblProductos;
document.addEventListener("DOMContentLoaded",function(){
    tblProductos = $('#tblProductos').DataTable({
        ajax: {
            url: base_url + "Productos/listarProducto",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idProducto'
        },
        {
            'data' : 'codigo'
        },
        {
            'data' : 'modelo'
        },
        {
            'data' : 'precioVenta'
        },
        {
            'data' : 'precioCompra'
        },
        {
            'data' : 'nombreMarca'
        },
        {
            'data' : 'descripcion'
        },
        {
            'data' : 'linea'
        },
        {
            'data' : 'estado'
        },
        {
            'data' : 'acciones'
        }
    ]
    });
})

function frmProducto(){
    document.getElementById("title").innerHTML = "Nuevo Producto";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmProducto").reset();
    document.getElementById("idProducto").value = "";
    $("#nuevoProducto").modal("show");
    
}
function registrarProducto(e){
    e.preventDefault();
    const codigo = document.getElementById("codigo");
    const modelo = document.getElementById("modelo");
    const precioVenta = document.getElementById("precioVenta");
    const precioCompra = document.getElementById("precioCompra");
    const marca = document.getElementById("marca");
    const categoria = document.getElementById("categoria");
    if(codigo.value == "" || modelo.value == "" || precioVenta.value == "" || precioCompra.value == ""){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'todo los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url = base_url + "Productos/registrarProducto";
        const frm = document.getElementById("frmProducto");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
               console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto registrado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $('#nuevoProducto').modal("hide");
                      tblProductos.ajax.reload();
                }else if (res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto modificado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $('#nuevoProducto').modal("hide");
                      tblProductos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            
            }
        }
    }
}
function btnEditarProducto(id) {
    document.getElementById("title").innerHTML = "Actualizar Producto";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    
    const url = base_url + "Productos/editarProducto/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url,true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("idProducto").value= res.idProducto;
            document.getElementById("codigo").value= res.codigo;
            document.getElementById("modelo").value = res.modelo;
            document.getElementById("precioVenta").value = res.precioVenta;
            document.getElementById("precioCompra").value = res.precioCompra;
            document.getElementById("marca").value = res.idMarca;
            document.getElementById("categoria").value = res.idCategoria;
            $("#nuevoProducto").modal("show");
        }
    }
    //$("#nuevoUsuario").modal("show");
} 
function btnEliminarProducto(id)
{
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Aun podras revertirlo el producto eliminado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/eliminarProducto/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                /*
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Producto eliminado con exito.',
                        'success'
                    )
                    tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                    */
                }
            }
        }
    })
}
function btnReingresarProducto(id)
{
    Swal.fire({
        title: 'Esta seguro de Reingresar el producto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si reingresar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Productos/reingresarProducto/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Producto reingresado con exito.',
                        'success'
                    )
                    tblProductos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
//#endregion
//#region Funciones Proveedores
let tblProveedor;
document.addEventListener("DOMContentLoaded",function(){
    tblProveedor = $('#tblProveedor').DataTable({
        ajax: {
            url: base_url + "Proveedores/listarProveedor",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idProveedor'
        },
        {
            'data' : 'ci'
        },
        {
            'data' : 'tipoPersona'
        },
        {
            'data' : 'nombreCompleto'
        },
        {
            'data' : 'nombreEmpresa'
        },
        {
            'data' : 'direccion'
        },
        {
            'data' : 'telefono'
        },
        {
            'data' : 'estado'
        },
        {
            'data' : 'acciones'
        }
    ]
    });
})

function frmProveedor(){
    document.getElementById("title").innerHTML = "Nuevo Proveedor";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmProveedor").reset();
    document.getElementById("idProveedor").value = "";
    $("#nuevoProveedor").modal("show");

}
function registrarProveedor(e){
    e.preventDefault();
    const ci = document.getElementById("ci");
    const tipoPersona = document.getElementById("tipoPersona");
    const nombre = document.getElementById("nombre");
    const apellidoPaterno = document.getElementById("apellidoPaterno");
    const apellidoMaterno = document.getElementById("apellidoMaterno");
    const nombreEmpresa = document.getElementById("nombreEmpresa");
    const direccion = document.getElementById("direccion");
    const telefono = document.getElementById("telefono");
    if(ci.value == "" || tipoPersona.value == "" || nombre.value == "" || apellidoPaterno.value == "" || direccion.value == "" || telefono.value=="" ){
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'todo los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url = base_url + "Proveedores/registrarProveedor";
        const frm = document.getElementById("frmProveedor");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //console.log(this.responseText);
                
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Proveedor registrado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $('#nuevoProveedor').modal("hide");
                      tblProveedor.ajax.reload();
                }else if (res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Proveedor modificado!!',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $('#nuevoProveedor').modal("hide");
                      tblProveedor.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                
            }
        }
    }
}
function btnEditarProveedor(id) {
    document.getElementById("title").innerHTML = "Actualizar Proveedor";
    document.getElementById("btnAccion").innerHTML = "Modificar";
    
    const url = base_url + "Proveedores/editarProveedor/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url,true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);

            document.getElementById("idProveedor").value= res.idProveedor;
            document.getElementById("ci").value = res.ci;
            document.getElementById("tipoPersona").value = res.tipoPersona;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellidoPaterno").value = res.apellidoPaterno;
            document.getElementById("apellidoMaterno").value = res.apellidoMaterno;
            document.getElementById("nombreEmpresa").value = res.nombreEmpresa;
            document.getElementById("telefono").value = res.direccion;
            document.getElementById("direccion").value = res.telefono;
            $("#nuevoProveedor").modal("show");
        }
    }
    //$("#nuevoUsuario").modal("show");
} 
function btnEliminarProveedor(id)
{
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Aun podras revertirlo el Proveedor eliminado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Proveedores/eliminarProveedor/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Proveedor eliminado con exito.',
                        'success'
                    )
                    tblProveedor.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
function btnReingresarProveedor(id)
{
    Swal.fire({
        title: 'Esta seguro de Reingresar al Proveedor?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si reingresar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Proveedores/reingresarProveedor/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Proveedor reingresado con exito.',
                        'success'
                    )
                    tblProveedor.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}
//#endregion