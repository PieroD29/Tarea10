<?php
    include_once 'Model/Cliente.php';

    class Factura{

        private $cliente;
        private $productos = [];
        private $total;

        public function __construct( Cliente $cliente ){
            $this->cliente = $cliente;
            $this->total = 0;
        }

        public function agregarProducto( Producto $producto ){
            $this->productos[] = $producto;
        }

        public function calcularTotal(){
            $this->total = 0;
            foreach ( $this->productos as $prod ){
                $this->total += $prod->getPrecio();
            }
            return $this->total;
        }

    }
?>
