<?php
      /**
       * Created by Evan Frohlich evan.frohlich@controlgroup.com
       */ 
      Class  ProfileUnitTest extends CrudBase
      { 
        public $fixtures = array('profile'=>'Profile', 'user'=>'User', 'profile_fields'=>'ProfileField');

        public $modelName = 'Profile';         //Reffers to your Model name
        public $fixtureRef = 'profile';       //Refers to the name of your fixture file
        public $fixtureKeyPrefix = 'Profile_'; //How your fixture items are keyed Sample_1, Sample_2, Etc...
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
          $fixture = $this->getFixture();
          $this->assertTrue($this->deleteItem($fixture, 1), "Item was not deleted");
          $model = $this->getModel($fixture, 1);
          $this->assertNull($model, "Model " . CJSON::encode($model) . " is not Equal to null and thus could not be deleted");
          $model = new $this->modelName;
          foreach($fixture[($this->getFixtureKey(1))] as $attr=>$value)
            $model->$attr = $value;
          $this->assertTrue($model->save(false), '$model->save() returned false and thus could not be saved. Data: ' .  CJSON::encode($model));
          
          $this->checkSaveOkay($fixture, 1, $this->getPkValues($model));
        }
        
        

        public function testUpdate()
        {
          $fixture = $this->getFixture();
          $model = $this->getModel($fixture, 1);
          $this->assertTrue($this->deleteItem($fixture, 2), "Item was not deleted");
           foreach($fixture[($this->getFixtureKey(2))] as $attr=>$value)
             if ($attr != 'id') $model->$attr = $value;
           $this->assertTrue($model->save(false), '$model->save() returned false and thus could not be saved. Data: ' .  CJSON::encode($model));
           //$pk = $model->tableSchema->primaryKey;
           
           $this->checkSaveOkay($fixture, 2, $this->getPkValues($model));
        }

        public function testRequiredAttr()
        {
          parent::testRequiredAttr();
        }

    }
  
