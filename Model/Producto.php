<?php

    class Producto{

        private $nombre;
        private $precio;

        public function __construct( $nombre, $precio ){
            $this->setNombre( $nombre );
            $this->setPrecio( $precio );
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre( $nombre ){
            if ( empty($nombre) ) echo '<script>alert("Ingrese el nombre del producto");window.location.href = "listado.php"</script>';
            $this->nombre = $nombre;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function setPrecio( $precio ){
            if ( $precio <= 0 ) echo '<script>alert("El precio del producto es invalido");window.location.href = "listado.php"</script>';
            $this->precio = $precio;
        }

    }

?>