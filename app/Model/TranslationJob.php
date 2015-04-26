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
		"User"=>array(
			"className"=>"User",
			"foreignKey"=>"user_id"
		)
	);

	public $validate = array(


	);

}
