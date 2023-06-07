<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author maria
 */
trait ViewData {
    ## add types

    private $status = Util::NO_OPERATION;

     ## add types
     private array $restaurantes;  


     public function getRestaurantes(){
         return $this->restaurantes;
 
     }
     public function setRestaurantes(array $restaurantes):void{
         $this->restaurantes = $restaurantes;
     }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }
  

   

  

}
