<?php 
require_once('simpletest/autorun.php');
require_once('simpletest/web_tester.php');

class Testsignuppage extends WebTestCase {
   function testsignin() {
     $this->get('http://people.eecs.ku.edu/~chogan/448_Project/signup.php');
     $this->setField('luname', 'kwu');
     $this->setField('lpw', 'Katherine');
     $this->clickSubmitByName('loginsubmit');
     $this->assertTitle('GameFace: Home');
     $this->assertText('Notifications');  


     $this->restart(); //browser close and open
     $this->get('http://people.eecs.ku.edu/~chogan/448_Project');
     $this->assertText('Sign Up');     
   }
   
   function testsignin2() {
     $this->get('http://people.eecs.ku.edu/~chogan/448_Project/signup.php');
     $this->setField('luname', 'sdfds');
     $this->setField('lpw', 'Katherine');
     $this->clickSubmitByName('loginsubmit');
     $this->assertTitle('GameFace: Sign up');
     $this->assertText('Sign Up');  
   
   }

   function testsignin3() {
     $this->get('http://people.eecs.ku.edu/~chogan/448_Project/signup.php');
     $this->setField('luname', 'kwu');
     $this->setField('lpw', 'sdfsdfsd');
     $this->clickSubmitByName('loginsubmit');
     $this->assertTitle('GameFace: Sign up');
     $this->assertText('Sign Up');  
   }
}

?>
