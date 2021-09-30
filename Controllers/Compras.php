<?php
    class Compras extends Controller{
    public function __construct(){
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function buscarCodigo($codigo)
    {
        $data = $this->model->buscarProductoCodigo($codigo);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        //print_r($data);
        die();
    }
    public function ingresarCompra()
    {
        //print_r($_POST);
        $id=$_POST['idCompra'];
        $datos = $this->model->getProductos($id);
        $idProducto = $datos['idProducto'];
        $idUsuario =$_SESSION['idUsuario'];
        $precio = $datos['precioCompra'];
        $cantidad = $_POST['cantidad'];
       
        $comprobar = $this->model->consultarDetalle($idProducto, $idUsuario);
        if (empty($comprobar)) {
            $subTotal = $precio*$cantidad;
            $data = $this->model->registrarDetalle($idProducto,$idUsuario,$precio,$cantidad,$subTotal);
            if ($data == "ok") {
                $msg = array('msg' => 'Producto ingresado con exito!!', 'icono'=> 'success');
                //$msg = "ok";
            }else{
                $msg = array('msg' => 'error!!', 'icono'=> 'error');
            }
        }else{
            $TotalCant = $comprobar['cantidad'] + $cantidad;
            $subTotal = $TotalCant*$precio;
            $data = $this->model->actualizarDetalle($precio,$TotalCant,$subTotal, $idProducto,$idUsuario);
            if ($data == "modificado") {
                $msg = array('msg' => 'Producto actualizado con exito!!', 'icono'=> 'success');
            }else{
                $msg = array('msg' => 'error!!', 'icono'=> 'success');
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listarCompra()
    {
        $idUsuario =$_SESSION['idUsuario'];
        $data['detalle'] = $this->model->getDetalle($idUsuario);
        $data['subTotal'] = $this->model->calcularCompra($idUsuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminarCompra($id)
    {
        $data = $this->model->eliminarDetalle($id);
        if ($data == 'ok') {
            $msg = array('msg' => 'compra eliminada!!', 'icono'=> 'success');
            //$msg = 'ok';
        }else{
            $msg = array('msg' => 'error!!', 'icono'=> 'error');
        }
        echo json_encode($msg);
        die();
    }
    public function registrarCompras()
    {
        $idUsuario =$_SESSION['idUsuario'];
        $total = $this->model->calcularCompra($idUsuario);
        $data = $this->model->registrarCompra($total['total']);
        if ($data == "ok") {
            $detalle = $this->model->getDetalle($idUsuario);
            $idCompra = $this->model->idCompra();
            foreach ($detalle as $row) {
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $idProducto = $row['idProducto'];
                $subTotal = $cantidad * $precio;
                $this->model->registrarDetalleCompra($idCompra['id'], $idProducto, $cantidad, $precio,$subTotal);
            }
            $vaciar = $this->model->vaciarDetalleCompra($idUsuario);
            if ($vaciar == 'ok') {
                $msg = array('msg' => 'ok', 'idCompra' => $idCompra['id']);
            }
        }else{
            $msg = array('msg' => 'error!!', 'icono'=> 'success');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function generarPDF($idCompra)
    {
        $productos = $this->model->getProductosCompra($idCompra);
        
        //print_r($productos);
        //exit;
        require('libraries/fpdf/fpdf.php');

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(20,0,0);
        $pdf->SetTitle('Reporte de compras');
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(200, 10, 'SISTEMA DE VENTAS', 0, 1, 'C');
        $pdf->Ln();

        //encabezado de productos de
        $pdf->SetFillColor(50,54,57);
        $pdf->SetTextColor(255,255,255);
        $pdf->cell(55, 5, 'Fecha compra', 0, 0, 'L', true);
        $pdf->cell(30, 5,'Cantidad', 0, 0, 'L', true);
        $pdf->cell(33, 5, utf8_decode('Descripción'), 0, 0, 'L', true);
        $pdf->cell(25, 5,'Precio', 0, 0, 'L', true);
        $pdf->cell(25, 5,'Total', 0, 1, 'L', true);
         $pdf->Ln();

         $pdf->SetTextColor(0,0,0);
         $total = 0.00;
        foreach ($productos as $row) {
            $total = $total +$row['subTotal'];
            $pdf->cell(55, 5, $row['fechaCompra'] , 0, 0, 'L');
            $pdf->cell(30, 5, $row['cantidad'], 0, 0, 'C');
            $pdf->cell(35, 5, utf8_decode($row['descripcion']), 0, 0, 'L');
            $pdf->cell(25, 5, $row['precio'], 0, 0, 'L');
            $pdf->cell(25, 5, number_format($row['subTotal'], 2, '.', ','), 0, 1, 'L');
        }
        $pdf->Ln(2);
        $pdf->cell(160, 5, 'Total pagar', 0, 1, 'R');
        $pdf->cell(155, 5, number_format($total, 2, '.', ','), 0, 1, 'R');
        $pdf->Output();
    }
    public function historialCompras()
    {
        $this->views->getView($this, "historialCompra");
    }
    public function listarHistorialCompras()
    {
        $data = $this->model->getHistorialCompras();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="'.base_url. "Compras/generarPDF/".$data[$i]['idCompra'].'" target="_blank" ><i class="fas fa-file-pdf"></i></a>
            <div/>';
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
