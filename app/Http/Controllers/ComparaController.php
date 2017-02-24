<?php
/**
 * Created by PhpStorm.
 * User: dbautista
 * Date: 24/02/17
 * Time: 14:07
 */

namespace app\Http\Controllers;
use Illuminate\Http\Request;
use app\Http\Requests;
use app\Http\Controllers\Controller;

class ComparaController
{
    protected $precio_total;
    protected $rfc_proveedor;
    protected $num_orden;
    protected $cantidadOrdenCompra;
    protected $precio_unitario_producto;
    protected $total_precio_unidad;
    protected $respuesta_servicio;
    public function store(Request $request)
    {
        $input = $request->toArray();
       // print_r($input);
       foreach ($input as $OC)
       {
           //Obtengo los detalles externos de la OC
           foreach ($OC as $datos_ext_oc)
           {
                $this->precio_total = $datos_ext_oc['precio_total'];
                $this->rfc_proveedor = $datos_ext_oc['rfc_proveedor'];
                $this->num_orden = $datos_ext_oc['num_orden'];

                foreach ($datos_ext_oc['detalles'] as $productos_orden)
                {
                    $arreglo_material[] = $productos_orden['clv_material'];
                    $this->cantidadOrdenCompra = $productos_orden['cantidad'];
                    $this->precio_unitario_producto = $productos_orden['precio_unitario'];
                    $this->total_precio_unidad += $this->cantidadOrdenCompra*$this->precio_unitario_producto;
                    $this->cantidadOrdenCompra += $productos_orden['cantidad'];

                }
                //Comparo contra la misma orden de compra
               if($this->precio_total != $this->total_precio_unidad )
               {

               }
           }
       }
        return $this->cantidadOrdenCompra;
    }
}