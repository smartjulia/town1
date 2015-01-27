<?php
namespace Townmy;
class Flat
{
    // свойства
    public $rooms;
    public $area;
    public $floor;
    public $humans;
    public $heating;
    public $balconyYes;
    public $balconySum;
    
    
    // свойства для комунальных платежей
    public $heatingKom;
    public $areaKom;
    public $hotKom; 
    public $coldKom;
    public $gasKom;
    
 
    
    public function __construct($humans, $area, $floor, $rooms, $heating, $balconyYes, $balconySum){ //конструктор класса 
             $this->humans = $humans;
                                                                   //внутри нициализируем свойства класса
             $this->area = $area;
             $this->floor = $floor;
             $this->rooms = $rooms;
             $this->heating = $heating;
             $this->balconyYes = $balconyYes;
             $this->balconySum = $balconySum;         
        
    }     
// описываем методы класса квартира
    
//метод - выводит информацию о квартире    
    public function infoFlat(){
//указываем методу,какие свойства выводить
       echo "Выводим информацию о квартире";
       echo "</br>";
       echo "Колличество комнат = ".$this->rooms;
       echo "</br>";
       echo "Площадь квартиры = ".$this->area;
       echo "</br>";
       echo "Этаж квартиры = ".$this->floor;
       echo "</br>";
       echo "Колличество жильцов = ".$this->humans;
       echo "</br>";
       echo "Отопление = ".$this->heating;
       echo "</br>";
       echo "Наличие балконов (0-балконов нет, 1-балконы есть)= ".$this->balconyYes;
       echo "</br>";
       echo "Колличество балконов= ".$this->balconySum;
       echo "</br>";
       echo "</br>";
       echo "</br>";
    }
    
// метод удаления   жильцов
     public function humansDel($delSum){ 
       
      if ($this->humans-$delSum<0)  {echo "</br>Колличество людей $delSum нельзя удалить($delSum превышает колличество жильцов)</br></br></br>";} 
      else{
     $this->humans=$this->humans-$delSum;   echo "</br>Колличество удаленных жильцов $delSum </br></br></br> "; 
      } 
         
     }
    
    
    //пример для определения расчета коммунальных услуг взят - http://tarifi.kiev.ua/
    
   // метод  производит расчет коммунальных услуг в зависимости от количества жильцов или площади квартиры (каждая услуга отдельно);
    public function kom(){
    
       
       echo "Выводим результат по коммунальным услугам (каждая услуга отдельно)";
       echo "</br>"; 
             
        $heatingKom=$this->area*4.61;
        $this->heatingKom=$heatingKom;   //инициализируем свойства которые отвечают за отдельные комунальные платежи
        echo "Платеж за отопление = ". $heatingKom;
        echo "</br>";
        
        $areaKom=$this->area*3.16;
        $this->areaKom=$areaKom;
        echo "Квартплата = ". $areaKom;
        echo "</br>";
        
        $hotKom=$this->humans*87.85;
        $this->hotKom=$hotKom;
        echo "Горячая вода = ". $hotKom;
        echo "</br>";
        
        
        $coldKom=$this->humans*43.72;
        $this->coldKom=$coldKom;
        echo "Холодная вода = ". $coldKom;
        echo "</br>";
        
        
        $gasKom=$this->humans*9.8;
        $this->gasKom=$gasKom;
        echo "Газ = ". $gasKom;
        echo "</br>";
        echo "</br>";
        
    
    }
   
 // метод рассчитывает сумму месячного платежа за все коммунальные услуги за месяц;   
    public function komMonth(){ 
        //обращаемся к методу  kom
        $this->kom();
        
        $sumMonth=$this->heatingKom+$this->areaKom+$this->hotKom+$this->coldKom+$this->gasKom;
        echo "Cумма месячного платежа за все коммунальные услуги за месяц = ". $sumMonth;
        echo "</br>";
        
    
    } 
    
 //вывод квартир для дома свойства - только колличество жильцов и площадь    
  public   function infoFlatforHouse($counterF){
       
   echo "Выводим информацию о квартире № $counterF";
       echo "</br>";       
       echo "Площадь квартиры = ".$this->area;
       echo "</br>";
       echo "Колличество жильцов = ".$this->humans;
       echo "</br>";
       echo "</br>";
   
       
       
   }
       
public function komForHouse(){    
    
$this->heatingKom=$this->area*4.61;

$this->areaKom=$this->area*3.16; 
  
$this->hotKom=$this->humans*87.85;

$this->coldKom=$this->humans*43.72;

$this->gasKom=$this->humans*9.8;   
    
 }    
 
    
    
    
    
   
}


?>