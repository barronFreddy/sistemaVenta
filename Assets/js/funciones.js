
//#region tablas
let tblUsuarios, tblClientes,tblMarcas,tblCategorias,tblProductos,tblProveedor,tblHistorialCompra;
document.addEventListener("DOMContentLoaded",function(){
    $('#cliente').select2();
    //Tabla usuarios
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
            'data' : 'nombreRol'
        },
        {
            'data' : 'estado'
        },
        {
            'data' : 'acciones'
        }
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                //Botón para Excel
                extend: 'excelHtml5',
                footer: true,
                title: 'Archivo',
                filename: 'Export_File',
 
                //Aquí es donde generas el botón personalizado
                text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
            },
            //Botón para PDF
            {
                extend: 'pdfHtml5',
                download: 'open',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para copiar
            {
                extend: 'copyHtml5',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para print
            {
                extend: 'print',
                footer: true,
                filename: 'Export_File_print',
                text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
            },
            //Botón para cvs
            {
                extend: 'csvHtml5',
                footer: true,
                filename: 'Export_File_csv',
                text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
            },
            {
                extend: 'colvis',
                text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                postfixButtons: ['colvisRestore']
            }
        ]
    });
    //tabla clientes
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
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                //Botón para Excel
                extend: 'excelHtml5',
                footer: true,
                title: 'Archivo',
                filename: 'Export_File',
 
                //Aquí es donde generas el botón personalizado
                text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
            },
            //Botón para PDF
            {
                extend: 'pdfHtml5',
                download: 'open',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para copiar
            {
                extend: 'copyHtml5',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para print
            {
                extend: 'print',
                footer: true,
                filename: 'Export_File_print',
                text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
            },
            //Botón para cvs
            {
                extend: 'csvHtml5',
                footer: true,
                filename: 'Export_File_csv',
                text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
            },
            {
                extend: 'colvis',
                text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                postfixButtons: ['colvisRestore']
            }
        ]
    });
    //tabla Marcas
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
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ],
    });
    //tabla categoria
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
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                //Botón para Excel
                extend: 'excelHtml5',
                footer: true,
                title: 'Archivo',
                filename: 'Export_File',
 
                //Aquí es donde generas el botón personalizado
                text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
            },
            //Botón para PDF
            {
                extend: 'pdfHtml5',
                download: 'open',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para copiar
            {
                extend: 'copyHtml5',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para print
            {
                extend: 'print',
                footer: true,
                filename: 'Export_File_print',
                text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
            },
            //Botón para cvs
            {
                extend: 'csvHtml5',
                footer: true,
                filename: 'Export_File_csv',
                text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
            },
            {
                extend: 'colvis',
                text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                postfixButtons: ['colvisRestore']
            }
        ]
    });
    //tabla productos
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
            'data' : 'stock'
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
        }],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    //tabla proveedores
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
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                //Botón para Excel
                extend: 'excelHtml5',
                footer: true,
                title: 'Archivo',
                filename: 'Export_File',
 
                //Aquí es donde generas el botón personalizado
                text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
            },
            //Botón para PDF
            {
                extend: 'pdfHtml5',
                download: 'open',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para copiar
            {
                extend: 'copyHtml5',
                footer: true,
                title: 'Reporte de usuarios',
                filename: 'Reporte de usuarios',
                text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            //Botón para print
            {
                extend: 'print',
                footer: true,
                filename: 'Export_File_print',
                text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
            },
            //Botón para cvs
            {
                extend: 'csvHtml5',
                footer: true,
                filename: 'Export_File_csv',
                text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
            },
            {
                extend: 'colvis',
                text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                postfixButtons: ['colvisRestore']
            }
        ]
    });
     //tabla historial compras
     tblHistorialCompra = $('#tblHistorialCompra').DataTable({
        ajax: {
            url: base_url + "Compras/listarHistorialCompras",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idCompra'
        },
        {
            'data' : 'total'
        },
        {
            'data' : 'fechaCompra'
        },
        {
            'data' : 'acciones'
        }],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
     //tabla historial ventas
     tblHistorialCompra = $('#tblHistorialVenta').DataTable({
        ajax: {
            url: base_url + "Ventas/listarHistorialVentas",
            dataSrc: ''
        },
        columns: [{
            'data' : 'idVenta'
        },
        {
            'data' : 'nombreCompleto'
        },
        {
            'data' : 'total'
        },
        {
            'data' : 'fechaVenta'
        },
        {
            'data' : 'acciones'
        }],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de usuarios',
                    filename: 'Reporte de usuarios',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para cvs
                {
                    extend: 'csvHtml5',
                    footer: true,
                    filename: 'Export_File_csv',
                    text: '<span class="badge  badge-success"><i class="fas fa-file-csv"></i></span>'
                },
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
})

//#endregion
//#region funciones usuarios
function frmCambiarContrasena(e) {
    e.preventDefault();
    const actual = document.getElementById("actual").value;
    const nueva = document.getElementById("nueva").value;
    const cofirmar = document.getElementById("confirma").value;

    if (actual == '' || nueva == '' || cofirmar == '') {
        alertas('Todos los campos son obligatorios', 'warning');
        return false;
    }else{
        if(nueva != cofirmar)
        {
            alertas('Las contraseñas no coinciden', 'warning');
            return false;
        }else{
            const url = base_url + "Usuarios/cambiarContrasena";
            const frm = document.getElementById("frmCambiarContrasena");
            const http = new XMLHttpRequest();
            http.open("POST",url,true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    $('#cambiarCotrasena').modal("hide");
                    alertas(res.msg, res.icono);
                    frm.reset();
                }
            }
        }
    }

}
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
    const rol = document.getElementById("rol");
    if(usuario.value == "" || nombre.value == "" || apellido.value == "" || rol.value == ""){
        alertas('todos los campos son obligatorios', 'warning');
    }else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                $('#nuevoUsuario').modal("hide");
                alertas(res.msg, res.icono);
                tblUsuarios.ajax.reload();
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
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
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
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}
//#endregion
//#region Funciones Clientes

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
        alertas('todos los campos son obligatorios', 'warning');
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
                $('#nuevoCliente').modal("hide");
                alertas(res.msg, res.icono);
                tblClientes.ajax.reload();
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
                    tblClientes.ajax.reload();
                    alertas(res.msg, res.icono);
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
                    tblClientes.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}
//#endregion
//#region Funciones Marcas
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
        alertas('todos los campos son obligatorios', 'warning');
    }else{
        const url = base_url + "Marcas/registrarMarca";
        const frmM = document.getElementById("frmMarca");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frmM));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $('#nuevaMarca').modal("hide");
                alertas(res.msg, res.icono);
                tblMarcas.ajax.reload();
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
                    tblMarcas.ajax.reload();
                    alertas(res.msg, res.icono);
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
                    tblMarcas.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}
//#endregion
//#region Funciones categorias

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
        alertas('todos los campos son obligatorios', 'warning');
    }else{
        const url = base_url + "Categorias/registrarCategoria";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST",url,true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $('#nuevaCategoria').modal("hide");
                alertas(res.msg, res.icono);
                tblCategorias.ajax.reload();
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
                    tblCategorias.ajax.reload();
                    alertas(res.msg, res.icono);
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
                    tblCategorias.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}
//#endregion
//#region funciones productos

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
    const stock = document.getElementById("stock");
    const precioVenta = document.getElementById("precioVenta");
    const precioCompra = document.getElementById("precioCompra");
    const marca = document.getElementById("marca");
    const categoria = document.getElementById("categoria");
    if(codigo.value == "" || modelo.value == "" || stock.value == "" || precioVenta.value == "" || precioCompra.value == ""){
        alertas('todos los campos son obligatorios', 'warning');
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
                $('#nuevoProducto').modal("hide");
                alertas(res.msg, res.icono);
                tblProductos.ajax.reload();
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
            document.getElementById("stock").value = res.stock;
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
                    tblProductos.ajax.reload();
                    alertas(res.msg, res.icono);
                /*
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Producto eliminado con éxito.',
                        'success'
                    )
                    
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
                    tblProductos.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}
//#endregion
//#region Funciones Proveedores

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
        alertas('todos los campos son obligatorios', 'warning');
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
                $('#nuevoProveedor').modal("hide");
                alertas(res.msg, res.icono);
                tblProveedor.ajax.reload();
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
            document.getElementById("direccion").value = res.direccion;
            document.getElementById("telefono").value = res.telefono;
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
                    tblProveedor.ajax.reload();
                    alertas(res.msg, res.icono);
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
                    tblProveedor.ajax.reload();
                    alertas(res.msg, res.icono);
                }
            }
        }
    })
}
//#endregion
function alertas(mensaje, icono)
{
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer:3000
    })
}
//#region compras 
function buscarCodigo(e) {
    e.preventDefault();
    const codigo = document.getElementById("codigo").value;
    if (codigo != '') {
        if (e.which == 13) {
            const url = base_url + "Compras/buscarCodigo/" + codigo;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res){
                        document.getElementById("nombre").value = res.descripcion;
                        document.getElementById("precio").value = res.precioCompra;
                        document.getElementById("idCompra").value = res.idProducto;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();
                    } else{
                        alertas('El producto no existe!!', 'warning');
                        document.getElementById("codigo").value = '';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{alertas('Ingrese un Codigo', 'warning');}
    
}
function calcularPrecio(e) {
    e.preventDefault();
    const cantidad = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("subTotal").value = cantidad*precio;
    if (e.which == 13) {
        if (cantidad > 0) {
            const url = base_url + "Compras/ingresarCompra";
            const frm = document.getElementById("frmCompra");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                        alertas(res.msg, res.icono);
                        frm.reset();
                        cargarDetalle();
                    document.getElementById("codigo").focus();
                    document.getElementById('cantidad').setAttribute('disabled', 'disabled');
                }
            }
        }
    }
}
cargarDetalle();
function cargarDetalle() {
    const url = base_url + "Compras/listarCompra";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalle.forEach(row => {
                html += `<tr>
                    <td>${row['idDetalle']}</td>
                    <td>${row['descripcion']}</td>
                    <td>${row['cantidad']}</td>
                    <td>${row['precio']}</td>
                    <td>${row['subTotal']}</td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="eliminarDetalle(${row['idDetalle']})">
                        <i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>`
            });
            document.getElementById("tblDetalle").innerHTML = html;
            document.getElementById("total").value = res.subTotal.total;
        }
    }
}
function eliminarDetalle(id) {
    const url = base_url + "Compras/eliminarCompra/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            cargarDetalle();
        }
    }
}
function generarCompra() {
    Swal.fire({
        title: 'Esta seguro de realizar la compra?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si Comprar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Compras/registrarCompras";
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Compra realizada con éxito.',
                        'success'
                    )
                    const ruta = base_url + 'Compras/generarPDF/'+res.idCompra;
                    window.open(ruta);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
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

//#region ventas
function buscarCodigoVenta(e) {
    e.preventDefault();
    const codigo = document.getElementById("codigo").value;
    if (codigo != '') {
        if (e.which == 13) {
            const url = base_url + "Ventas/buscarCodigo/" + codigo;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    if (res){
                        document.getElementById("nombre").value = res.descripcion;
                        document.getElementById("precio").value = res.precioVenta;
                        document.getElementById("idProducto").value = res.idProducto;
                        document.getElementById("cantidad").removeAttribute('disabled');
                        document.getElementById("cantidad").focus();
                    } else{
                        alertas('El producto no existe!!', 'warning');
                        document.getElementById("codigo").value = '';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        }
    }else{alertas('Ingrese un Codigo!!', 'warning');}
}
function calcularPrecioVenta(e) {
    e.preventDefault();
    const cantidad = document.getElementById("cantidad").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("subTotal").value = cantidad*precio;
    if (e.which == 13) {
        if (cantidad > 0) {
            const url = base_url + "Ventas/ingresarVenta";
            const frm = document.getElementById("frmVenta");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                        frm.reset();
                        cargarDetalleVenta();
                    
                    document.getElementById('cantidad').setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                }
            }
        }
    }
}
cargarDetalleVenta();
function cargarDetalleVenta() {
    const url = base_url + "Ventas/listarVenta";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.detalle.forEach(row => {
                html += `<tr>
                <td>${row['descripcion']}</td>
                <td>${row['cantidad']}</td>
                <td>${row['precio']}</td>
                <td>${row['subTotal']}</td>
                <td>
                <button class="btn btn-danger" type="button" onclick="eliminarDetalleVenta(${row['id']})">
                <i class="fas fa-trash-alt"></i></button>
                </td>
                </tr>`
            });
            document.getElementById("tblDetalleVenta").innerHTML = html;
            document.getElementById("total").value = res.subTotal.total;
        }
    }
}
function eliminarDetalleVenta(id) {
    const url = base_url + "Ventas/eliminarVenta/"+id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            //console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            cargarDetalleVenta();
        }
    }
}

function generarVenta() {
    Swal.fire({
        title: 'Esta seguro de realizar la venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const idCliente = document.getElementById('cliente').value;
            const url = base_url + "Ventas/registrarVentas/"+idCliente;
            const http = new XMLHttpRequest();
            http.open("GET",url,true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok") {
                        Swal.fire(
                        'Mensaje!',
                        'Compra realizada con éxito.',
                        'success'
                    )
                    const ruta = base_url + 'Ventas/generarPDF/'+res.idVenta;
                    window.open(ruta);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
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