<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
* [[機能説明]]
 *
 * @package     NetCommons
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Prefsetting_View_Main_Init extends Action
{
    // リクエストパラメータを受け取るため
    var $block_id = null;
    var $page_id = null;
    var $room_id = null;

    // 使用コンポーネントを受け取るため
    var $prefsettingView = null;
	var $session = null;
	var $request = null;

    // 値をセットするため
	var $content = null;
	var $test = null;

    /**
     * [[機能説明]]
     *
     * @access  public
     */
    function execute()
    {
        $this->content = $this->prefsettingView->getTargetContent();
        if(!count($this->content) > 0) {
            return 'error';
        }
        
        return 'success';
    }
}
?>
