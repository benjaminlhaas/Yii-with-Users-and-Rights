<?php
      /**
       * Created by Evan Frohlich evan.frohlich@controlgroup.com
       */ 
      Class  ProfileFieldUnitTest extends CrudBase
      { 
        public $fixtures = array('profiles_fields'=>'ProfileField');

        public $modelName = 'ProfileField';         //Reffers to your Model name
        public $fixtureRef = 'profiles_fields';       //Refers to the name of your fixture file
        public $fixtureKeyPrefix = 'ProfileField_'; //How your fixture items are keyed Sample_1, Sample_2, Etc...
        public $check_data_consistency_after_save = true;

        public function testGetRecord()
        {
          parent::testGetRecord();
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
  