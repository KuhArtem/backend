<?php

// Завдання 10 (Інтерфейси)

// Інтерфейс "Прибирання будинку"
interface HouseCleaning {
    public function cleanRoom();
    public function cleanKitchen();
}

// Клас Human
class Human {
    // Код класу Human може бути порожнім або містити загальні властивості та методи для всіх людей
}

// Клас Student успадковує Human та реалізує інтерфейс HouseCleaning
class Student extends Human implements HouseCleaning {
    // Реалізація методів інтерфейсу HouseCleaning для студента
    public function cleanRoom() {
        echo "Студент прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Студент прибирає кухню<br>";
    }
}

// Клас Programmer також успадковує Human та реалізує інтерфейс HouseCleaning
class Programmer extends Human implements HouseCleaning {
    // Реалізація методів інтерфейсу HouseCleaning для програміста
    public function cleanRoom() {
        echo "Програміст прибирає кімнату<br>";
    }

    public function cleanKitchen() {
        echo "Програміст прибирає кухню<br>";
    }
}

// Перевірка роботи методів прибирання в обох класах
$student = new Student();
$programmer = new Programmer();

$student->cleanRoom(); // Студент прибирає кімнату
$student->cleanKitchen(); // Студент прибирає кухню

$programmer->cleanRoom(); // Програміст прибирає кімнату
$programmer->cleanKitchen(); // Програміст прибирає кухню

?>
