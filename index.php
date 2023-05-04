<?php
// - Riprodurre una concessionaria di automobili in OOP seguendo questa gerarchia di classi, con caratteristiche a scelta (Marchio, Modello, Numero porte, Prezzo….e altri a vostra scelta)
//     - Automobile
//         - SUV
//         - Utilitaria
//         - Sportiva
// - Tenere il conto degli oggetti creati per ogni classe
// --Extra 1: Creare una classe "Moto" (o qualcosa del genere) ed implementare un tratto che funzioni sia per le automobili che per le moto.
// --Extra 2: Rendere la classe Automobile astratta ed implementare un metodo astratto che venga ereditato dalle sottoclassi

// -Esercizio Extra: se volete esercitarvi ancora, potete creare uno zoo, partendo da una classe astratta animali ed espandendo (es. Animali->Mammiferi, Ovipari ecc.) 

trait ruote{
    function nruote(){
        echo "il veicolo ha 2 ruote \n";
    }
}
abstract class veicoli{
    public $marchio;
    public $modello;
    public $prezzo;
    public static $counter = 0;
    public function __construct($_marchio, $_modello, $_prezzo){
        $this->marchio = $_marchio;
        $this->modello = $_modello;
        $this->prezzo = $_prezzo;

        Self::$counter++;
}
}

abstract class Automobili extends veicoli{
    public $porte;
    public function __construct($_marchio, $_modello, $_porte, $_prezzo)  
    {
    parent::__construct($_marchio, $_modello, $_prezzo);
    $this->porte = $_porte;
    }
}
class suv extends Automobili{
    public $maxVel;

    public function __construct($_marchio, $_modello, $_porte, $_prezzo, $_maxVel)
    {
        parent::__construct($_marchio, $_modello, $_porte, $_prezzo);
        $this->maxVel = $_maxVel;
    }
    public function Info(){
    echo "l'auto è una $this->marchio modello $this->modello ha $this->porte porte e costa $this->prezzo euro e ha una velocità di $this->maxVel \n";
    // echo Self::$counter;
}
}
class utilitaria extends Automobili{
    public $sconto;

    public function __construct($_marchio, $_modello, $_porte, $_prezzo, $_sconto)
    {
        parent::__construct($_marchio, $_modello, $_porte, $_prezzo);
        $this->sconto = $_sconto;
    }
    public function Info(){
    echo "l'auto è una $this->marchio modello $this->modello ha $this->porte porte e costa $this->prezzo euro con uno sconto del $this->sconto\n";
}
}
class sportiva extends Automobili{
    public $gomme;

    public function __construct($_marchio, $_modello, $_porte, $_prezzo, $_gomme)
    {
        parent::__construct($_marchio, $_modello, $_porte, $_prezzo);
        $this->gomme = $_gomme;
    }
    public function Info(){
    echo "l'auto è una $this->marchio modello $this->modello ha $this->porte porte e costa $this->prezzo euro, ha delle gomme $this->gomme \n";
}
}
class ciclomotori extends veicoli{
    public $cavalli;
    use ruote;
        public function __construct($_marchio, $_modello, $_prezzo, $_cavalli)
    {
        parent::__construct($_marchio, $_modello, $_prezzo);
        $this->cavalli = $_cavalli;
    }
    public function Info(){
    echo "la moto è una $this->marchio modello $this->modello he costa $this->prezzo euro, ha $this->cavalli \n";
    }
}


$fordFiesta = new suv("ford", "fiesta", "5", "14.000", "180 km/h");
$fiatPanda = new utilitaria("fiat", "panda", "3", "7.000", "30%");
$lamborghini = new sportiva("lamborghini", "murcielago", "3","400.000", "sportive");
$motobmw = new ciclomotori("bmw", "F99 XR", "10.000" , "150CV");

$fordFiesta->Info();
$fiatPanda->Info();
$lamborghini->Info();
$motobmw->Info();
$motobmw->nruote();