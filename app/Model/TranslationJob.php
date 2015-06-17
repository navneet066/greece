<?php
/**
 * Created by IntelliJ IDEA.
 * User: Himanshu
 * Date: 24-04-2015
 * Time: PM 09:19
 */
class TranslationJob extends AppModel
{

	public $name = 'TranslationJob';

	public $useTable = 'jobs';

	public $belongsTo = array(
		"User" => array(
			"className" => "User",
			"foreignKey" => "user_id"
		),
		"Engine" => array(
			"className" => "Engine",
			"foreignKey" => "engine_id"
		)
	);

	public $validate = array(
		"engine_id" => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Select Engine',
				'last' => true
			)
		),
		"translation_file" => array(
			'notEmpty' => array(
				'rule' => 'checkEmptyFile',
				'message' => 'Please choose an file',
				'last' => true
			),
			"image" => array(
				"rule" => array("extension", array("tmx", "xlf", "txt")),
				"message" => "Please choose valid file.",
				"last" => true
			),
			"size" => array(
				"rule" => array("fileSize", "<=", "4MB"),
				"message" => "File size must be less than or equal to 4MB"
			)
		),
		"high_gloss" => array(
			'notEmpty' => array(
				'rule' => 'checkEmptyFile',
				'message' => 'Please choose an file',
				'last' => true
			),
			"image" => array(
				"rule" => array("extension", array("csv", "txt")),
				"message" => "Please choose valid file.",
				"last" => true
			),
			"size" => array(
				"rule" => array("fileSize", "<=", "4MB"),
				"message" => "File size must be less than or equal to 4MB"
			)
		),
		"low_gloss" => array(
			'notEmpty' => array(
				'rule' => 'checkEmptyFile',
				'message' => 'Please choose an file',
				'last' => true
			),
			"image" => array(
				"rule" => array("extension", array("csv", "txt")),
				"message" => "Please choose valid file.",
				"last" => true
			),
			"size" => array(
				"rule" => array("fileSize", "<=", "4MB"),
				"message" => "File size must be less than or equal to 4MB"
			)
		),
		's_language' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Select Source Language'
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Source Language should be a alphabet or numbers'
			)
		),
		't_language' => array(
			'mustNotEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Select Target Language'
			),
			'alphabet' => array(
				'rule' => 'alphanumeric',
				'message' => 'Target Language should be a alphabet or numbers'
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

}
