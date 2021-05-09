<?php

 class Ponteiros {
    public $hora;
    public $minuto;

    function retornaAnguloRelogio($hora, $minuto) {
        if ($this->horarioEstaInvalido($hora, $minuto)){
           throw new Exception('Horário inválido');        
        } 
        if ($hora == 12) { 
            $hora = 0;
        }
        if ($minuto == 60) {
            $minuto = 0;
            $hora += 1;
        }
        $angulo_hora = $this->retornaAnguloHora($hora, $minuto);                
        $angulo_minuto = $this->retornaAnguloMinuto($minuto);     
        return abs($angulo_hora - $angulo_minuto);            
    }
    
    function retornaAnguloHora($hora, $minuto) {
        $total_angulo_hora_por_dia = 720;
        $total_angulo_hora_por_minuto = ($total_angulo_hora_por_dia / 24) / 60;
        return $total_angulo_hora_por_minuto * ($hora * 60 + $minuto);   
    }
    
    function retornaAnguloMinuto($minuto) {
        $total_angulo_minuto_por_hora = 360;
        $total_angulo_minuto_por_minuto = $total_angulo_minuto_por_hora / 60; 
        return $total_angulo_minuto_por_minuto * $minuto;       
    }
    
    function horarioEstaInvalido($hora, $minuto) {
        return $hora < 0 || $minuto < 0 || $hora > 12 || $minuto > 60;
    }
}
$exibe = new Ponteiros();
echo $exibe->retornaAnguloRelogio(10, 15), "\n";
echo $exibe->retornaAnguloRelogio(3, 30), "\n";










 
?>