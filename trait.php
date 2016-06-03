<?php
class Base {
    public function sayHello() {
        echo "Hello \n";
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo "World!\n";
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}
//the 'sayHello()' method of trait overides 'sayHello()' method of parent class i.e. base class
//hence Hello World! is printed instead of Hello 
$o = new MyHelloWorld();
$o->sayHello();

trait HelloWorld {
    public function sayHello() {
        echo "Hello World!\n";
    }
}

class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo "Hello Universe!\n";
    }
}
//Whereas the class's method sayHello prevails over traits method
$o2 = new TheWorldIsNotEnough();
$o2->sayHello();


trait A {
    public function smallTalk() {
        echo "a from trait A\n";
    }
    public function bigTalk() {
        echo "A from trait A\n";
    }
}

trait B {
    public function smallTalk() {
        echo "b from trait B\n";
    }
    public function bigTalk() {
        echo "B from trait B\n";
    }
}

class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker {
    use A, B {
        B::smallTalk insteadof A;//using instead of to remove conflict
        A::bigTalk insteadof B;
        B::bigTalk as talk;//using 'as' to give alternate name to use it without conflict
    }
}
$o3 = new Talker();
$o3->smallTalk();
$o3->bigTalk();
$o4 = new Aliased_Talker();
$o4->smallTalk();
$o4->bigTalk();
$o4->talk();
?>

