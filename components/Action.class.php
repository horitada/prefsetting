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
class Prefsetting_Components_Action
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
	function Prefsetting_Components_Action() 
	{
		$this->_container =& DIContainerFactory::getContainer();
		$this->_db =& $this->_container->getComponent("DbObject");
		$this->_request =& $this->_container->getComponent("Request");
	}

	/**
	 * レポート情報を更新する
	 * @return boolean true or false
	 * @access public
	 */
	function update() {
		$item_id = $this->_request->getParameter('item_id');
		$space_flag = $this->_request->getParameter('space_flag');
		$ather_flag = $this->_request->getParameter('ather_flag');

		$space = "";
		if (!is_null($space_flag)) {
			if ($space_flag[$item_id] == "on") {
				$space = REGISTRATION_OPTION_SEPARATOR;
			}
		}
		$ather = null;
		if (!is_null($ather_flag)) {
			if ($ather_flag[$item_id] == "on") {
				$ather = "その他"; //TODO
			}
		}

		$pref = array("北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県","新潟県","富山県"
						,"石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","鳥取県"
						,"島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県"
					); //TODO
		if (!is_null($ather)) {
			$pref[] = $ather;
		}
		$pref_str = implode(REGISTRATION_OPTION_SEPARATOR, $pref);
		$option_value = $space. $pref_str;
		$params = array(
			"option_value" => $option_value
		);
		$result = $this->_db->updateExecute("registration_item", $params, array( "item_id" => $item_id ), true );
		if ($result === false) {
			$this->_db->addError();
			return $result;
		}

		return true;
	}
}
?>
