<?php
namespace Townmy;

class Street{  
 
    const  YARDKEEPER=1;  //дворники на еденицу площади
    
  //свойства  
  
   public $nameStreet;    //название улицы
   public $lengthStreet;  //протяженность
   public $coordinateStreetB; //координаты начала и конца
   public $coordinateStreetE;
   
   public $heatingKomRezH;
   public $areaKomRezH;
   public $hotKomRezH;
   public $coldKomRezH;
   public $gasKomRezH;
   public $yardKeeperRez; 
   public $terForCity; 
   public $humansForStrret;
   
    
   public $houseArr;
    
    
 public function __construct  ($houseArr,$nameStreet,$lengthStreet,$coordinateStreetB,$coordinateStreetE){       //конструктор класса улица 
    $this->houseArr = $houseArr;   
    $this->nameStreet=$nameStreet;
    $this->lengthStreet=$lengthStreet;
    $this->coordinateStreetB=$coordinateStreetB;
    $this->coordinateStreetE=$coordinateStreetE;
     
     
 }
 
 

//метод - выводит информацию о улице   
    public function infoStreet($numhouse){        
        
//указываем методу,какие свойства выводить

       echo "<br>";
echo "Выводим информацию о УЛИЦЕ   № $numhouse  rand(1,3))";
       echo "<br>";
       echo "<br>";
       echo "Название улицы: ". $this->nameStreet;
       echo "<br>";
       echo "Протяженность улицы: ". $this->lengthStreet." метров";
       echo "<br>";
       echo "Координаты улицы: ". $this->coordinateStreetB." "." "." ".$this->coordinateStreetE;
       echo "<br>";
       echo "<br>";
       echo "_____________________<br>"; 
       
   $counterH=0;
    foreach($this-> houseArr as $value){
       $counterH++; 
      $value ->infoHouse($counterH);
      echo "_____________________<br>";     
    }
   
    } 
/////////    
      public function streetKom(){
          
      foreach($this-> houseArr as $value){
       
      $value ->houseKom(1);
      $this->heatingKomRezH+=$value-> heatingKomRez; 
      $this->areaKomRezH+=$value-> areaKomRez;
      $this->hotKomRezH+=$value-> hotKomRez;
      $this->coldKomRezH+=$value-> coldKomRez;
      $this->gasKomRezH+=$value-> gasKomRez;
    
    }
 
      }   
    
 //метод выводит результат для  streetKom()
 public function streetKomOut(){
          
 echo "</br>Сумма по отоплению для всех домов улицы $this->heatingKomRezH"; 
 echo "</br>Сумма по квартплате для всех домов улицы $this->areaKomRezH";      
 echo "</br>Сумма по горячей воде для всех домов улицы $this->hotKomRezH";    
 echo "</br>Сумма по холодной воде для всех домов улицы $this->coldKomRezH";
 echo "</br>Сумма по газу для всех домов улицы $this->gasKomRezH";
 echo "<br><br>";    
 }
     
//метод рассчитывает количество дворников 
  public function yardKeeper(){
          
      foreach($this-> houseArr as $value){ 
      //$this->terForCity+=$value-> areaOfTeretorii;   
      $this->yardKeeperRez+=$value-> areaOfTeretorii; 
      //вывод тпритории по домам 
     // echo "</br> $value->areaOfTeretorii </br> ";        
      }
      $this->yardKeeperRez=$this->yardKeeperRez*Street::YARDKEEPER;
      
      echo "</br>Количество дворников, которое необходимо для уборки прилегающих территорий всех домов по улице в зависимости от площади этих территорий $this->yardKeeperRez";
  }
  
//територия по улицам для бюджета города  
public function terTown(){
          
      foreach($this-> houseArr as $value){ 
      $this->terForCity+=$value-> areaOfTeretorii;    
      }
}   
 
 //подсчет людей для улицы 
  public function streetHumans(){
     
 foreach($this-> houseArr as $value){
     
     $value->houseHumans();
     $this->humansForStrret+=$value-> humansForHouse;  
     
         
 }
 //тестовый вывод жильцов для дома
 //echo "<br> люди $this->humansForStrret";
 }
 
 
 
    
//////////    
   public function infoSpecific($jj,$ii){
       echo "<br>====================<br>";
       echo "<br>Выводим информацию о конкретном доме и конкретной квартире - дом - $jj квартира - $ii<br>";   
       echo "<br>====================<br>"; 
       
       if(isset($this->houseArr[$jj])&&isset($this->houseArr[$jj]->flatArr[$ii])){
                            
       $this->houseArr[$jj]-> infoHouse($jj);  
       echo "<br>====================<br>"; 
       $this->houseArr[$jj]->flatArr[$ii]->infoFlatforHouse($ii);  
       echo "====================<br>";   
           
       
       }
       else{echo "Днного дома или данной квартиры не существует(не сгенерированны данные)";echo "<br>====================<br>"; }
       
   
   }  
    
   
}  

?>


