<?php
    class Ventas extends Controller{
    public function __construct(){
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data = $this->model->getClientes();
        $this->views->getView($this, "index", $data);
    }
    public function buscarCodigo($codigo)
    {
        $data = $this->model->buscarProductoCodigo($codigo);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        //print_r($data);
        die();
    }
    public function ingresarVenta()
    {
        //print_r($_POST);
        $id=$_POST['idProducto'];
        $datos = $this->model->getProductos($id);
        $idProducto = $datos['idProducto'];
        $idUsuario =$_SESSION['idUsuario'];
        $precio = $datos['precioVenta'];
        $cantidad = $_POST['cantidad'];
       
        $comprobar = $this->model->consultarDetalleVenta($idProducto, $idUsuario);
        if (empty($comprobar)) {
            $subTotal = $precio*$cantidad;
            $data = $this->model->registrarDetalle($idProducto,$idUsuario,$precio,$cantidad,$subTotal);
            if ($data == "ok") {
                $msg = array('msg' => 'Producto ingresado con exito!!', 'icono'=> 'success');
            }else{
                $msg = array('msg' => 'error!!', 'icono'=> 'error');
            }
        }else{
            $TotalCant = $comprobar['cantidad'] + $cantidad;
            $subTotal = $TotalCant*$precio;
            $data = $this->model->actualizarDetalleVenta($precio,$TotalCant,$subTotal, $idProducto,$idUsuario);
            if ($data == "modificado") {
                $msg = array('msg' => 'Producto actualizado con exito!!', 'icono'=> 'success');
            }else{
                $msg = array('msg' => 'Error!!', 'icono'=> 'error');
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listarVenta()
    {
        $idUsuario =$_SESSION['idUsuario'];
        $data['detalle'] = $this->model->getDetalle($idUsuario);
        $data['subTotal'] = $this->model->calcularVenta($idUsuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminarVenta($id)
    {
        $data = $this->model->eliminarDetalle($id);
        if ($data == 'ok') {
            $msg = array('msg' => 'Producto eliminado!!', 'icono'=> 'success');
        }else{
            $msg = array('msg' => 'Error!!', 'icono'=> 'error');
        }
        echo json_encode($msg);
        die();
    }
    public function registrarVentas($idCliente)
    {
        $idUsuario =$_SESSION['idUsuario'];
        $total = $this->model->calcularVenta($idUsuario);
        $data = $this->model->registrarVenta($idCliente, $total['total']);
        if ($data == "ok") {
            $detalle = $this->model->getDetalle($idUsuario);
            $idVenta = $this->model->idVenta();
            foreach ($detalle as $row) {
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $idProducto = $row['idProducto'];
                $subTotal = $cantidad * $precio;
                $this->model->registrarDetalleVenta($idVenta['id'], $idProducto, $cantidad, $precio,$subTotal);
                $stockActual = $this->model->getProductos($idProducto);
                $stock = $stockActual['stock'] - $cantidad;
                $this->model->actualizarStock($stock,$idProducto);
            }
            $vaciar = $this->model->vaciarDetalleVenta($idUsuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'idVenta' => $idVenta['id']);
            }
        }else{
            $msg = "error al registrar";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function generarPDF($idVenta)
    {
        $productos = $this->model->getProductosVenta($idVenta);
        
        //print_r($productos);
        //exit;
        require('libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(10,0,0);
        $pdf->SetTitle('ReporteVentas');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(200, 10, 'REPORTES', 0, 1, 'C');
        $pdf->Ln();

        //encabezado de productos de
        $pdf->SetFillColor(50,54,57);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell(45, 7, 'Fecha Venta','TBLR', 0, 'C', true);
        $pdf->cell(50, 7,'Cliente', 'TBLR', 0, 'C', true);
        $pdf->cell(30, 7, utf8_decode('Descripción'),'TBLR', 0, 'C', true);
        $pdf->cell(18, 7,'Cantidad', 'TBLR', 0, 'C', true);
        $pdf->cell(25, 7,'Precio Cant.','TBLR', 0, 'C', true);
        $pdf->cell(20, 7,'Total','TBLR', 0, 'C', true);
         $pdf->Ln(7);

         $pdf->SetTextColor(0,0,0);
         $total = 0.00;
        foreach ($productos as $row) {
            $total = $total +$row['subTotal'];
            $pdf->cell(45, 7, $row['fechaVenta'] ,'TBLR', 0, 'C');
            $pdf->cell(50, 7, $row['nombreCompleto'] ,'TBLR', 0, 'C');
            $pdf->cell(30, 7, utf8_decode($row['descripcion']),'TBLR', 0, 'C');
            $pdf->cell(18, 7, $row['cantidad'],'TBLR', 0, 'C');
            $pdf->cell(25, 7, $row['precio'],'TBLR', 0, 'C');
            $pdf->cell(20, 7, number_format($row['subTotal'], 2, '.', ','),'TBLR', 1, 'C');
        }
        $pdf->Ln(7);
        
        $pdf->cell(155, 7, number_format($total, 2, '.', ','), 0, 1, 'R');
        $pdf->cell(160, 7, 'Total pagar', 0, 1, 'R');
        $pdf->Output();
    }
    public function historialVentas()
    {
        $this->views->getView($this, "historialVenta");
    }
    public function listarHistorialVentas()
    {
        $data = $this->model->getHistorialVentas();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="'.base_url. "Ventas/generarPDF/".$data[$i]['idVenta'].'" target="_blank" ><i class="fas fa-file-pdf"></i></a>
            <div/>';
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}