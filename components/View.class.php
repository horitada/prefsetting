<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * [[機能説明]]
 *
 * @package     NetCommons Components
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Prefsetting_Components_View
{
	/**
	 * @var DBオブジェクトを保持
	 *
	 * @access	private
	 */
	var $_db = null;
	
	/**
	 * @var DIコンテナを保持
	 *
	 * @access	private
	 */
	var $_container = null;
	
	/**
	 * コンストラクター
	 *
	 * @access	public
	 */
	function Prefsetting_Components_View() 
	{
		$this->_container =& DIContainerFactory::getContainer();
		$this->_db =& $this->_container->getComponent("DbObject");
	}

	/**
	 * 対象のデータ取得
	 * @access	public
	 */
	function &getTargetContent() {
		$likeword = '%' . "都道府県" . '%'; //TODO
		$sql = "SELECT * ".
				"FROM {registration} R ".
				"INNER JOIN {registration_item} I ".
				"ON R.registration_id = I.registration_id ".
				"WHERE I.item_name LIKE ? ".
				"AND I.item_type = ? ".
				"ORDER BY R.registration_id";
		$data = $this->_db->execute($sql, array($likeword ,REGISTRATION_TYPE_SELECT));
		if (!$data) {
			$this->_db->addError();
			return array();
		}
		$result = array();
		foreach ($data as $key => $val) {
			$result[$key] = $val;
			$result[$key]["option_values"] = explode(REGISTRATION_OPTION_SEPARATOR, $val["option_value"]);
		}
		return $result;
	}
}
?>
