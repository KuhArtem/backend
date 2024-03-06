<?php

// Завдання 8 (Наслідування)

class Human {
    protected $height;
    protected $weight;
    protected $age;

    public function __construct($height, $weight, $age) {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }


    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

class Student extends Human {
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course) {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }


    public function getUniversity() {
        return $this->university;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function moveToNextCourse() {
        $this->course++;
    }
}

class Programmer extends Human {
    private $programmingLanguages = [];
    private $experience;

    public function __construct($height, $weight, $age, $programmingLanguages, $experience) {
        parent::__construct($height, $weight, $age);
        $this->programmingLanguages = $programmingLanguages;
        $this->experience = $experience;
    }


    public function getProgrammingLanguages() {
        return $this->programmingLanguages;
    }

    public function setProgrammingLanguages($programmingLanguages) {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function addProgrammingLanguage($language) {
        $this->programmingLanguages[] = $language;
    }
}

// Завдання 9 (Абстрактні класи)

abstract class HumanAbstract {
    abstract protected function birthMessage();

    public function giveBirth() {
        $this->birthMessage();
    }
}

class StudentChild extends HumanAbstract {
    protected function birthMessage() {
        echo "Student is born!";
    }
}

class ProgrammerChild extends HumanAbstract {
    protected function birthMessage() {
        echo "Programmer is born!";
    }
}

// Перевірка роботи класів та методів

$student = new Student(170, 60, 20, "Harvard", 1);
$programmer = new Programmer(175, 70, 25, ["PHP", "JavaScript"], "5 years");

echo "Student's course before: " . $student->getCourse() . "<br>";
$student->moveToNextCourse();
echo "Student's course after: " . $student->getCourse() . "<br>";

echo "Programmer's languages before: ";
print_r($programmer->getProgrammingLanguages());
echo "<br>";
$programmer->addProgrammingLanguage("Python");
echo "Programmer's languages after adding Python: ";
print_r($programmer->getProgrammingLanguages());
echo "<br>";

// Перевірка роботи методу "народження"
$studentChild = new StudentChild();
$programmerChild = new ProgrammerChild();

$studentChild->giveBirth();
echo "<br>";
$programmerChild->giveBirth();

?>
