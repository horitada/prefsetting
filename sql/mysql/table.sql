-- 
-- テーブルの構造 `prefsetting`
-- 
-- 使用するテーブルのCreate文をここに記述
CREATE TABLE `prefsetting` (
  `block_id` int unsigned NOT NULL,
  `content` text NOT NULL,
  `room_id` int(11) NOT NULL default '0',
  `insert_time` varchar(14) NOT NULL default '',
  `insert_site_id` varchar(40) NOT NULL default '',
  `insert_user_id` varchar(40) NOT NULL default '',
  `insert_user_name` varchar(255) NOT NULL,
  `update_time` varchar(14) NOT NULL default '',
  `update_site_id` varchar(40) NOT NULL default '',
  `update_user_id` varchar(40) NOT NULL default '',
  `update_user_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`block_id`)
) ENGINE=MyISAM;