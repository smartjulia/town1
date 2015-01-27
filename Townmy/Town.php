<?php
namespace Townmy;

class Town{
    

  //свойства  
  
  public $nameTown;    //название населенного пункта
  public $yearTown;  //год основания  
  public $coordinateTownB;    //географические координаты
  public $coordinateTownE;
  public $taxTownrez;
  public $humTownrez;
  
  
  
  
   public $streetArr;
    
    
    
public function __construct  ($streetArr,$nameTown,$yearTown,$coordinateTownB,$coordinateTownE){       //конструктор класса город
    $this->streetArr = $streetArr;
    $this->nameTown = $nameTown;
    $this->yearTown = $yearTown;
    $this->coordinateTownB = $coordinateTownB;
    $this->coordinateTownE = $coordinateTownE;
    
       
} 


//метод - выводит информацию о городе  
    public function infoTown(){        
        
//указываем методу,какие свойства выводить

       echo "<br>";
echo "Выводим информацию о ГОРОДЕ :";
       echo "<br>";
       echo "<br>";
       echo "Название города: ". $this->nameTown;
       echo "<br>";
       echo "Год основания: ". $this->yearTown;
       echo "<br>";
       echo "Координаты города: ". $this->coordinateTownB." "." "." ".$this->coordinateTownE;
       echo "<br>";
       echo "<br>";
       echo "_____________________<br>"; 

   $counterS=0;
    foreach($this-> streetArr as $value){
       $counterS++; 
      $value ->infoStreet($counterS);        
    }
   
    } 
//////// ***Бюджет населенного пункта
  public function taxTown(){
      
   foreach($this-> streetArr as $value){ 
    $value->terTown();
    $this->taxTownrez+=$value->terForCity;       
   } 
  $this->taxTownrez= $this->taxTownrez*House::TAX;  
   echo "<br> Бюджет населенного пункта в зависимости от размера налога на землю, полученного со всех домов: ". $this->taxTownrez;
 
 }    
    
 
 public function humTown(){
      
   foreach($this-> streetArr as $value){ 
    $value->streetHumans();
    $this->humTownrez+=$value->humansForStrret;       
   } 
   
   echo "<br> Количество населения, проживающего в населенном пункте: ". $this->humTownrez;
 
 }       
    
  
    
    
    
///////////////////// доступ к конкретной улице конкретному дому конкретной квартире

    public function infoSpecificTown($kk, $jj,$ii){
       echo "<br>====================<br>";
       echo "<br>Выводим информацию о конкретной улице о конкретном доме и конкретной квартире: улица - $kk дом - $jj квартира - $ii<br>";   
       echo "<br>====================<br>"; 
       
       if(isset($this->streetArr[$kk]->houseArr[$jj]->flatArr[$ii])){
           
       $this->streetArr[$kk]-> infoStreet($kk);  
       echo "<br>====================<br>";                                
       $this->streetArr[$kk]->houseArr[$jj]-> infoHouse($jj);  
       echo "<br>====================<br>"; 
       $this->streetArr[$kk]->houseArr[$jj]->flatArr[$ii]->infoFlatforHouse($ii);  
       echo "====================<br>";   
           
       
       }
       else{echo "Днной улицы, данного дома или данной квартиры не существует(не сгенерированны данные)";echo "<br>====================<br>"; }
       
   
   }  


////////json

public function getJSON(){
$arr = array("nameTown"=>$this->nameTown,"yearTown"=>$this->yearTown, "coordinateTownB"=>$this->coordinateTownB,"coordinateTownE"=>$this->coordinateTownE);
return json_encode($arr);
}




    
    
}  




?>