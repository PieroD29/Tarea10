<?php
    include_once 'Persona.php';

    class Cliente extends Persona{

        public function __construct( $nombre, $email ){
            parent::__construct( $nombre,$email );
        }

        public function setNombre( $nombre ){
            if ( empty($nombre) ) echo '<script>alert("Ingrese un nombre");window.location.href="index.php"</script>';
            $this->nombre = $nombre;
        }

        public function setEmail( $email ){
            if ( empty($email) ) echo '<script>alert("Ingrese un Correo Electronico");window.location.href="index.php"</script>';
            $this->email = $email;
        }

    }

?>