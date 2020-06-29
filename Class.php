<?php

// 1.

class Pinigine {
    private $popieriniaiPinigai = 0;
    private $metaliniaiPinigai = 0;

    public function ideti ($kiek){

        if($kiek <=2){
            $this->metaliniaiPinigai += $kiek;
        }else{
            $this->popieriniaiPinigai += $kiek;
        }

    }

    public function skaiciuoti (){

        echo $this->metaliniaiPinigai.'<br>';
        echo $this->popieriniaiPinigai.'<br>';
    }

    public function monetos (){
        echo $this->metaliniaiPinigai.'<br>';
    }
    public function banknotai (){
        echo $this->popieriniaiPinigai.'<br>';
    }
}

$pinigine = new Pinigine();

$pinigine -> ideti(5);
$pinigine -> ideti(2);
$pinigine -> skaiciuoti();

// 2.

class Stikline{
    private $turis;
    private $kiekis;

    public function _construct($turis){
        $this->turis = $turis;
    }

    public function ipilti ($kiekis){

        if($kiekis >= $this->turis){
            $this->kiekis = $this->turis;
        }

        $this->kiekis = $kiekis;
    }

    public function ispilti (){
        return $this->kiekis;
    }

}

$stikline1 = new Stikline(200);
$stikline2 = new Stikline(150);
$stikline3 = new Stikline(100);

$stikline1->ipilti(200);
$stikline2->ipilti($stikline1->ispilti());
$stikline3->ipilti($stikline2->ispilti());


// 3.

class Grybas {
    public $valgomas;
    public $sukirmyjes;
    public $svoris;

    public function __construct(){
        $this->generate();
    }

    public function generate(){
        $valg = rand(0,1);
        $suk = rand(0,1);
        if($valg){
            $this->valgomas = true;
        }else{
            $this->valgomas = false;
        }

        if(!$suk){
            $this->sukirmyjes = true;
        }else{
            $this->sukirmyjes = false;
        }

        $this->svoris = rand(5,45);
    }
}


class Krepsys{

    public $grybai = [];
    public $svoris = 0;

    public function grybaut(){
        $grybas = new Grybas();

        if( $grybas->valgomas && !$grybas->sukirmyjes){
            $this->grybai[] = $grybas;
            $this->svoris += $grybas->svoris;
        }
    }
}

$krepsys = new Krepsys();

while($krepsys->svoris < 500){
    $krepsys->grybaut();
}

_dc($krepsys->grybai);




// 4.

$pinigine -> banknotai();
$pinigine -> monetos();