<?php
      /**
       * Created by Evan Frohlich evan.frohlich@controlgroup.com
       */ 
      Class  UserUnitTest extends CrudBase
      { 
        public $fixtures = array('users'=>'User');

        public $modelName = 'User';         //Reffers to your Model name
        public $fixtureRef = 'users';       //Refers to the name of your fixture file
        public $fixtureKeyPrefix = 'User_'; //How your fixture items are keyed Sample_1, Sample_2, Etc...
        public $check_data_consistency_after_save = true;
        public $ignorAttr = array('crt_dtm'=>true, 'lud_dtm'=>true, 'id'=>true, 'password'=>true, 'activkey'=>true);

        public function testGetRecord()
        {
          $fixture = $this->getFixture();
          $results = $this->getModel($fixture, 1);
          foreach($fixture[($this->getFixtureKey(1))] as $attr=>$value)
          {
            if(!isset($this->ignorAttr[($attr)]))
              $this->assertTrue($results->$attr == $value, "Attribute $attr: " . $results->$attr . ' is not equal to ' . $value);
          }
        } 
  
        public function testDelete()
        {
          parent::testDelete();
        }

        public function testCreate()
        {
          parent::testCreate();
        }

        public function testUpdate()
        {
          parent::testUpdate();
        }

        public function testRequiredAttr()
        {
          parent::testRequiredAttr();
        }

    }
  
