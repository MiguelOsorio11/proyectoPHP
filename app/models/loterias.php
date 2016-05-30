<?php
  use Phalcon\Mvc\Model;
  use Phalcon\Mvc\Model\Message;
  use Phalcon\Mvc\Model\Validator\Uniqueness;
  use Phalcon\Mvc\Model\InclusionIn;
  use Phalcon\ValidationInterface;

  class loterias extends Model{

    public function validation(){

      if($this->validationHasFailed()==true){
        return false;
      }
    }

  }
?>
