ALTER TABLE `zt_doc` ADD `mailto` text  AFTER `editedDate`;
ALTER TABLE `zt_task` CHANGE `realStarted` `realStarted` datetime NOT NULL AFTER `estStarted`;
ALTER TABLE `zt_group` CHANGE `program` `PRJ` mediumint(8) unsigned NOT NULL DEFAULT 0;

ALTER TABLE `zt_notify` ADD INDEX `objectType_toList_status` (`objectType`, `toList`, `status`);
ALTER TABLE `zt_user` ADD INDEX `deleted` (`deleted`);
ALTER TABLE `zt_case` ADD INDEX `fromBug` (`fromBug`);
ALTER TABLE `zt_bug` ADD INDEX `toStory` (`toStory`);
ALTER TABLE `zt_task` ADD INDEX `parent` (`parent`);
ALTER TABLE `zt_bug` ADD INDEX `result` (`result`);
ALTER TABLE `zt_history` ADD INDEX `action` (`action`);
ALTER TABLE `zt_action` ADD INDEX `action` (`action`);
ALTER TABLE `zt_action` DROP INDEX `product`;