var clsPrefsetting = Class.create();
var prefsettingCls = Array();

clsPrefsetting.prototype = {
	initialize: function(id) {
		this.id = id;
		this.item_id = null;
	},

	/* 更新する */
	update: function(item_id) {
		// POSTする画面のシリアライズ
		var formElement = $("prefsettingForm" + this.id);
		var messageBody = Form.serialize(formElement) + "&item_id=" +item_id;

		// POSTオプションの設定
		var option = new Object();
		option["target_el"] = $(this.id);
		option["callbackfunc"] = function(response) {
								alert('更新しました。');
								commonCls.sendRefresh(this.id);
		}.bind(this);
		commonCls.sendPost(this.id, messageBody, option);
	}
}