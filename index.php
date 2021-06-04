<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IChessmen</title>
</head>

<body>

    <?php
    ///описали интерфейс IChessmen  
    interface IChessmen
    {
        public function move($x1, $y1);
        public function getPosiion($x, $y);
    }

    //описали обстрактный класс AbstractChessmen который наследует методы интерфейса IChessmen
    //Создать абстрактный класс AbstractChessmen, который наследует интерфейс IChessmen, имеет свойство $x,$y, реализует функцию getPosition. 

    abstract class AbstractChessmen implements IChessmen
    {
        public $x;
        public $y;
        public $x1;
        public $y1;

        public function getPosiion($x, $y)
        {
            $this->x = $x;
            $this->y = $y;
           // echo 'ПОЗИЦИЯ';
           // echo ($this->x);
           // echo '---';
            //echo ($this->y);
          //  echo '<br>';
        }
    }

    //Создать класс King, который наследует AbstractChessmen и реализует метод Move.
    // Реализация метода Move должна бросать исключение, если фигуру перемещают на недопустимую область. 
    //Так же нельзя переместить фигуру за край шахматной доски. Функция Move должна быть единственной возможностью изменить положение фигуры.
    class King extends AbstractChessmen
    {
        public function move($x1, $y1)
        {
            $this->x1 = $x1;
            $this->y1 = $y1;

            if ( (($this->x-$this->x1)**2 + ($this->y-$this->y1)**2 >= 1) and (($this->x-$this->x1)**2 + ($this->y-$this->y1)**2 <= 2)){
                echo 'Ход King:  ход сделан и он верный';
            }
                else{
                    echo 'неправильный ход или выход за границы';
                }
                echo '<br>';
            echo 'ход на ';
            echo ($this->x1);
            echo '---';
            echo ($this->y1);
            echo '<br>';
        }
    }
        //Создать класс Queen, который наследует AbstractChessmen и реализует метод Move.
    // Реализация метода Move должна бросать исключение, если фигуру перемещают на недопустимую область(смотрите рис. 2) .
    // Так же нельзя переместить фигуру за край шахматной доски. Функция Move должна быть единственной возможностью изменить положение фигуры.
    // class Queen extends AbstractChessmen
    class Queen extends AbstractChessmen
    {
        public function move($x1, $y1)
        {
            $this->x1 = $x1;
            $this->y1 = $y1;

            if ( ($this->x==$this->x1 and $this->y != $this->y1) or ($this->y==$this->y1 and $this->x != $this->x1) ){
                echo 'Ход Queen:  ход сделан и он верный';
            }
                else{
                    echo 'неправильный ход или выход за границы';
                }
                echo '<br>';
            echo 'ход на ';
            echo ($this->x1);
            echo '---';
            echo ($this->y1);
            echo '<br>';
        }
    }

    $king = new King();
    print_r($king->getPosiion(4, 3));
    print_r($king->move(2, 2));

    $queen = new Queen();
    print_r($king->getPosiion(1, 1));
    print_r($king->move(7, 3));
    ?>

</body>

</html>