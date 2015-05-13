<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 01-04-2015
 * Time: PM 08:03
 */
class Engine extends AppModel
{
    public $name = 'Engine';

    public $useTable = 'engines';

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

    public $recursive = 1;

    public $validate = array(

        'engine_id' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'The Engine Id should not empty'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule' => array('alphaNumericDashUnderscore'),
                'message' => array('Slug can only be letter numbers, dash and underscore')
            )
        ),
        'name' => array(
            'mustNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'The Engine Name should not empty'
            ),
            'alphabet' => array(
                'rule' => 'alphanumeric',
                'message' => 'Engine name should be a alphabet or numbers'
            )
        ),
        'domain_name' => array(
            'mustNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Fill Domain Name'
            ),
            'alphabet' => array(
                'rule' => 'alphanumeric',
                'message' => 'Engine name should be a alphabet or numbers'
            )
        ),
        's_language' => array(
            'mustNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Fill Source Language'
            ),
            'alphabet' => array(
                'rule' => 'alphanumeric',
                'message' => 'Source Language should be a alphabet or numbers'
            )
        ),
        't_language' => array(
            'mustNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Fill Target Language'
            ),
            'alphabet' => array(
                'rule' => 'alphanumeric',
                'message' => 'Target Language should be a alphabet or numbers'
            )
        ),
        "tm_file" => array(
            'notEmpty' => array(
                'rule' => 'checkEmptyFile',
                'message' => 'Please choose an file',
                'last' => true
            ),
            "image" => array(
                "rule" => array("extension", array("pdf", "txt", "doc", "docx")),
                "message" => "Please choose valid file.",
                "last" => true
            ),
            "size" => array(
                "rule" => array("fileSize", "<=", "4MB"),
                "message" => "File size must be less than or equal to 4MB"
            )
        ),
        'glossaries' => array(
            'mustNotEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Fill Glossaries'
            ),
            'alphabet' => array(
                'rule' => 'alphanumeric',
                'message' => 'Glossaries should be a alphabet or numbers'
            )
        ),

    );

    public function alphaNumericDashUnderscore($check)
    {
        $value = array_values($check);
        $value = $value[0];

        return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
    }

    public function checkEmptyFile($data)
    {
        if (empty($data["file"]["error"])) {
            return true;
        }
        return false;
    }

    public function validateExtraFields()
    {
        $validateExtraFields = array(
            'ad_lm_file' => array(
                'notEmpty' => array(
                    'rule' => 'checkEmptyFile',
                    'message' => 'Please choose an file',
                    'last' => true
                ),
                "file" => array(
                    "rule" => array("extension", array("pdf", "txt", "doc", "docx")),
                    "message" => "Please choose valid file.",
                    "last" => true
                ),
                "size" => array(
                    "rule" => array("fileSize", "<=", "4MB"),
                    "message" => "File size must be less than or equal to 4MB"
                )
            ),
            'tune_corpus_file' => array(
                'notEmpty' => array(
                    'rule' => 'checkEmptyFile',
                    'message' => 'Please choose an file',
                    'last' => true
                ),
                "image" => array(
                    "rule" => array("extension", array("pdf", "txt", "doc", "docx")),
                    "message" => "Please choose valid file.",
                    "last" => true
                ),
                "size" => array(
                    "rule" => array("fileSize", "<=", "4MB"),
                    "message" => "File size must be less than or equal to 4MB"
                )
            ),
            'test_ln' => array(

            ),
            'tune_ln' => array(

            ),
            'fast_track_training' => array(

            ),
            'hybrid' => array(

            ),
            'casing' => array(

            )
        );

        $this->validate = $validateExtraFields;
        return $this->validates();

    }

    public function getAllEngineByUserId($userId)
    {
        $conditions = array('Engine.user_id' => $userId);
        $fields = array('User.first_name','Engine.id','Engine.name','Engine.domain_name','Engine.created','Engine.s_language',
            'Engine.t_language', 'Engine.engine_id','Engine.created');
        $results = $this->find('all', array('conditions' => $conditions,'fields'=>$fields));
        return $results;

    }

	public function getEngineDetailById($id)
	{
		$conditions = array('Engine.id'=>$id);
		$result = $this->find('first', array('conditions'=>$conditions));
		return  $result;

	}

	public function getRemoveEngine($id)
	{
		$this->id = $id;
		$result = $this->delete();
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function getEngineListCompanyId($companyId){
		$conditions = array('Engine.company_id'=>$companyId);
		$results = $this->find('list',array('conditions'=>$conditions));
		return $results;
	}


}
