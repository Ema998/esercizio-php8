<?php
class Company{
    //attributi
    public $name;
    public $totEmployees;
    public $location;
    public static $companies = [];
    
    //costruttore
    public function __construct($name, $totEmployees, $location){
        $this->name = $name;
        $this->totEmployees = $totEmployees;
        $this->location = $location;
        self :: $companies[] = $this;
    }
    
    public function printDatiAzienda(){
        if($this->totEmployees > 0){
            echo "L'ufficio $this->name con sede in $this->location ha ben $this->totEmployees dipendenti.";
        }else{
            echo "L'ufficio $this->name con sede in $this->location non ha dipendenti.";
        }
    }
    
    public function calcoloSpesaAnnuaAziendaCompany($totEmployees){
        $spesaAnnuaAziendaCompany = 0;
        $stipendioAnnualePerDipendente = 20000;
        $spesaAnnuaAziendaCompany = $totEmployees * $stipendioAnnualePerDipendente;
        return $spesaAnnuaAziendaCompany;
    }

    function printSpesaAnnua($spesaAnnuaAziendaCompany, $companies){
        foreach(self::$companies as $company){
            if($company instanceof Company){
                echo "La spesa annua per l'azienda $company->name è di $spesaAnnuaAziendaCompany euro.";
            }
        }
    }
    
    public function calcoloSpesaAnnuaAziendeCompany(){
        $totSpesaAnnuaAziendeCompany = 0;
        foreach (self::$companies as $company){
            if ($company instanceof Company) {
                $totSpesaAnnuaAziendeCompany += $this->calcoloSpesaAnnuaAziendaCompany($company->totEmployees);
            }
        }
        return $totSpesaAnnuaAziendeCompany;
    }
    
    public static function printcalcoloSpesaAnnuaAziendeCompany($totSpesaAnnuaAziendeCompany){
        echo $totSpesaAnnuaAziendeCompany;
    }
};

$company1 = new Company('Google', 1000, 'Mountain View');
$company2 = new Company('Aulab', 50, 'Italia');
$company3 = new Company('Meta', 10000, 'Menlo Park');
$company4 = new Company('Apple', 20000, 'Cupertino');
$company5 = new Company('Esselunga', 5000, 'Italia');

?>