<?php
  use Phalcon\Mvc\Model;
  use Phalcon\Mvc\Model\Message;
  use Phalcon\Mvc\Model\Validator\Uniqueness;
  use Phalcon\Mvc\Model\InclusionIn;

  class modosloterias extends Model{

    public function validation(){
        return true;
    }
  }
?>
