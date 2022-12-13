<?php
         class First{
            //properties (variable) and methods(function)
            //identifier => public, private, protected
            public function __construct(){
               echo "WELCOME";
            }

            protected $name = "Peace";

            public function getName () {
               //or// 
               //return 'welcome'//
               // echo "welcome";
               echo $this->name;
               $this->test();
            }
            public function test ($name) { 
               echo $name;
               echo "<br/>";
            }

            public function __destruct(){
               echo "Bye i don destruct am";
            }

         }

         class Second extends First {
            public function func (){
               echo $this->name;
               echo "<br/>";
            }
         }

         $second = new Second();
         echo $second->func();
         echo "<br/>";

         $first = new First();
         $first->test('peace');
         echo "<br/>";
         // echo $first->name;

         
         
         
?>
         <!-- private properties & methods can only be used in that particular class;
         public p & m => anywhere, either a new instance or extend(class inheritace);
         protected p & m => only available in extending and not available in a new instance -->