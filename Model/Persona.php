<?php

    abstract class Persona{
        protected $nombre;
        protected $email;

        public function __construct( $nombre, $email ){
            $this->setNombre( $nombre );
            $this->setEmail( $email );
        }

        public function getNombre(){
            return $this->nombre;
        }

        abstract public function setNombre( $nombre );

        public function getEmail(){
            return $this->email;
        }

        abstract public function setEmail( $email );

    }

?>