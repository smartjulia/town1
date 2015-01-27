<?php
namespace Townmy;
class House{   
    
   
     
     const  ELECHOUSE=8.8;  //электричество в одном подъезде на одном этаже
     
     const  TAX=10;    //размер налога на землю 
     
    // свойства
    
    public $flatArr;
    
    public $number;
    public $numFloat;
    public $numPorch;
    public $areaOfTeretorii;
    
   public  $heatingKomRez;
   public  $areaKomRez;
   public  $hotKomRez;
   public  $coldKomRez;
   public  $gasKomRez;
   
   public  $elecHouserez;
   
   public $taxHouserez;
   
   public  $humansForHouse;
    
    
   
    public function __construct($flatArr,$number, $numFloat, $numPorch, $areaOfTeretorii){ //конструктор класса 
             
             $this->flatArr = $flatArr;
             
             $this->number = $number;                                                           //внутри нициализируем свойства класса
             $this->numFloat = $numFloat;
             $this->numPorch = $numPorch;
             $this->areaOfTeretorii = $areaOfTeretorii;  
             
            
             
    }        


// описываем методы класса дом


    
//метод - выводит информацию о длме   
    public function infoHouse($numflat){
        
//указываем методу,какие свойства выводить


echo "Выводим информацию о доме № $numflat (rand(1,3))";
       echo "</br>";
              
       echo "</br>";
       echo "номер дома = ".$this->number;
       echo "</br>";
       echo "количество этажей = ".$this->numFloat;
       echo "</br>";
       echo "количество подъездов = ".$this->numPorch;
       echo "</br>";
       echo "площади прилегающей территории  = ".$this->areaOfTeretorii;
       echo "</br>";
       echo "</br>";

//цикл для вывода квартир в методе для вывода инфол о доме       
     
      $counterF=0;
    foreach($this-> flatArr as $value){
       $counterF++; 
      $value ->infoFlatforHouse($counterF);     
    }

    } 
    
    
 // метод расчета комунальных платежей для всех квартир в доме   
 public function houseKom($numflat){
     
 foreach($this-> flatArr as $value){
        
      $value-> komForHouse() ;
      $this->heatingKomRez+=$value-> heatingKom; 
      $this->areaKomRez+=$value-> areaKom;  
      $this->hotKomRez+=$value-> hotKom;
      $this->coldKomRez+=$value-> coldKom; 
      $this->gasKomRez+=$value-> gasKom;
       
    }    
 
 }  
 
//метод выводит результат для  houseKom()
 public function houseKomOut(){
          
 echo "</br>Сумма по отоплению для всех квартир дома $this->heatingKomRez"; 
 echo "</br>Сумма по квартплате для всех квартир дома $this->areaKomRez";      
 echo "</br>Сумма по горячей воде для всех квартир дома $this->hotKomRez";    
 echo "</br>Сумма по холодной воде для всех квартир дома $this->coldKomRez";
 echo "</br>Сумма по газу для всех квартир дома $this->gasKomRez";
      
 }
 
 public function elecHouse(){

    $this->elecHouserez= $this->numFloat*$this->numPorch*House::ELECHOUSE;
 
 }
 
  public function taxHouse(){

    $this->taxHouserez= $this->areaOfTeretorii*House::TAX;
 
 }
 
 public function HouseOut(){
 
     echo "</br> </br> Объем потребляемого электричества для освещения подъездов в зависимости от количества подъездов и этажей $this->elecHouserez";
     
     echo "</br> </br> Размер налога на землю в зависимости от размера терртории, отведенной для дома $this->taxHouserez";
 
 }
//подсчет людей для дома 
  public function houseHumans(){
     
 foreach($this-> flatArr as $value){
     
     $this->humansForHouse+=$value-> humans;     
 }
 }
 
         
}