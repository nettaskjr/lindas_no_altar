#
#<?php die('Forbidden.'); ?>
#Date: 2013-11-18 15:27:26 UTC
#Software: Joomla Platform 13.1.0 Stable [ Curiosity ] 24-Apr-2013 00:00 GMT

#Fields: datetime	priority	category	message
2013-11-18T15:27:26+00:00	INFO	update	Finalising installation.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: /* Core 3.2 schema updates */  ALTER TABLE `#__content_types` ADD COLUMN `conten.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__content_types` SET `content_history_options` = '{"formFile":"administ.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__content_types` SET `content_history_options` = '{"formFile":"administ.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__content_types` SET `content_history_options` = '{"formFile":"administ.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__content_types` SET `content_history_options` = '{"formFile":"administ.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__content_types` SET `content_history_options` = '{"formFile":"administ.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__content_types` SET `content_history_options` = '{"formFile":"administ.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `rules`, `f.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__extensions` SET `params` = '{"template_positions_display":"0","upload.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: UPDATE `#__extensions` SET `params` = '{"lineNumbers":"1","lineWrapping":"1","ma.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: INSERT INTO `#__menu` (`menutype`, `title`, `alias`, `note`, `path`, `link`, `ty.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: ALTER TABLE `#__modules` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: CREATE TABLE `#__postinstall_messages` (   `postinstall_message_id` bigint(20) u.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: CREATE TABLE IF NOT EXISTS `#__ucm_history` (   `version_id` int(10) unsigned NO.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: ALTER TABLE `#__users` ADD COLUMN `otpKey` varchar(1000) NOT NULL DEFAULT '' COM.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: ALTER TABLE `#__users` ADD COLUMN `otep` varchar(1000) NOT NULL DEFAULT '' COMME.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: CREATE TABLE IF NOT EXISTS `#__user_keys` (   `id` int(10) unsigned NOT NULL AUT.
2013-11-18T15:27:27+00:00	INFO	update	Ran query from file 3.2.0. Query text: /* Update bad params for two cpanel modules */  UPDATE `#__modules` SET `params`.
2013-11-18T15:27:27+00:00	INFO	update	Deleting removed files and folders.
2013-11-18T15:27:28+00:00	INFO	update	Cleaning up after installation.
2013-11-18T15:27:28+00:00	INFO	update	Update to version 3.2.0 is complete.
2014-02-12T10:48:03+00:00	INFO	update	Update started by user Super User (152). Old version is 3.2.0.
2014-02-12T10:48:03+00:00	INFO	update	Downloading update file from .
2014-02-12T10:48:06+00:00	INFO	update	File Joomla_3.2.x_to_3.2.2-Stable-Patch_Package.zip successfully downloaded.
2014-02-12T10:48:06+00:00	INFO	update	Starting installation of new version.
2014-02-12T10:48:14+00:00	INFO	update	Finalising installation.
2014-02-12T10:48:14+00:00	INFO	update	Ran query from file 3.2.1. Query text: DELETE FROM `#__postinstall_messages` WHERE `title_key` = 'PLG_USER_JOOMLA_POSTI.
2014-02-12T10:48:14+00:00	INFO	update	Ran query from file 3.2.2-2013-12-22. Query text: ALTER TABLE `#__update_sites` ADD COLUMN `extra_query` VARCHAR(1000) DEFAULT '';.
2014-02-12T10:48:15+00:00	INFO	update	Ran query from file 3.2.2-2013-12-22. Query text: ALTER TABLE `#__updates` ADD COLUMN `extra_query` VARCHAR(1000) DEFAULT '';.
2014-02-12T10:48:15+00:00	INFO	update	Ran query from file 3.2.2-2013-12-28. Query text: UPDATE `#__menu` SET `component_id` = (SELECT `extension_id` FROM `#__extensions.
2014-02-12T10:48:15+00:00	INFO	update	Ran query from file 3.2.2-2014-01-08. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2014-02-12T10:48:15+00:00	INFO	update	Ran query from file 3.2.2-2014-01-15. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2014-02-12T10:48:15+00:00	INFO	update	Ran query from file 3.2.2-2014-01-18. Query text: /* Update updates version length */ ALTER TABLE `#__updates` MODIFY `version` va.
2014-02-12T10:48:15+00:00	INFO	update	Ran query from file 3.2.2-2014-01-23. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2014-02-12T10:48:15+00:00	INFO	update	Deleting removed files and folders.
2014-02-12T10:48:17+00:00	INFO	update	Cleaning up after installation.
2014-02-12T10:48:17+00:00	INFO	update	Update to version 3.2.2 is complete.
2014-03-12T14:40:51+00:00	INFO	update	COM_JOOMLAUPDATE_UPDATE_LOG_DELETE_FILES
2014-05-21T10:37:22+00:00	INFO	update	Update started by user Super User (153). Old version is 3.2.3.
2014-05-21T10:37:22+00:00	INFO	update	Downloading update file from .
2014-05-21T10:37:26+00:00	INFO	update	File Joomla_3.3.0-Stable-Update_Package.zip successfully downloaded.
2014-05-21T10:37:26+00:00	INFO	update	Starting installation of new version.
2014-05-21T10:37:32+00:00	INFO	update	Finalising installation.
2014-05-21T10:37:48+00:00	INFO	update	Ran query from file 3.3.0-2014-02-16. Query text: ALTER TABLE `#__users` ADD COLUMN `requireReset` tinyint(4) NOT NULL DEFAULT 0 C.
2014-05-21T10:37:48+00:00	INFO	update	Ran query from file 3.3.0-2014-04-02. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2014-05-21T10:37:48+00:00	INFO	update	Deleting removed files and folders.
2014-05-21T10:37:49+00:00	INFO	update	Cleaning up after installation.
2014-05-21T10:37:49+00:00	INFO	update	Update to version 3.3.0 is complete.
2014-07-25T08:57:04+00:00	INFO	update	Update started by user Super User (574). Old version is 3.3.0.
2014-07-25T08:57:04+00:00	INFO	update	Downloading update file from .
2014-07-25T08:57:06+00:00	INFO	update	File Joomla_3.3.x_to_3.3.2-Stable-Patch_Package.zip successfully downloaded.
2014-07-25T08:57:06+00:00	INFO	update	Starting installation of new version.
2014-07-25T08:57:11+00:00	INFO	update	Finalising installation.
2014-07-25T08:57:11+00:00	INFO	update	Deleting removed files and folders.
2014-07-25T08:57:14+00:00	INFO	update	Cleaning up after installation.
2014-07-25T08:57:14+00:00	INFO	update	Update to version 3.3.2 is complete.
2014-08-05T08:36:38+00:00	INFO	update	Update started by user Super User (574). Old version is 3.3.2.
2014-08-05T08:36:38+00:00	INFO	update	Downloading update file from .
2014-08-05T08:36:39+00:00	INFO	update	File Joomla_3.3.2_to_3.3.3-Stable-Patch_Package.zip successfully downloaded.
2014-08-05T08:36:39+00:00	INFO	update	Starting installation of new version.
2014-08-05T08:36:42+00:00	INFO	update	Finalising installation.
2014-08-05T08:36:42+00:00	INFO	update	Deleting removed files and folders.
2014-08-05T08:36:45+00:00	INFO	update	Cleaning up after installation.
2014-08-05T08:36:45+00:00	INFO	update	Update to version 3.3.3 is complete.
2015-05-29T12:58:40+00:00	INFO	update	Update started by user Super User (680). Old version is 3.3.3.
2015-05-29T12:58:40+00:00	INFO	update	Downloading update file from .
2015-05-29T12:58:44+00:00	INFO	update	File Joomla_3.4.1-Stable-Update_Package.zip successfully downloaded.
2015-05-29T12:58:44+00:00	INFO	update	Starting installation of new version.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Finalising installation.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.3.4-2014-08-03. Query text: ALTER TABLE `#__user_profiles` CHANGE `profile_value` `profile_value` TEXT NOT N.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.3.6-2014-09-30. Query text: INSERT INTO `#__update_sites` (`name`, `type`, `location`, `enabled`) VALUES ('J.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.3.6-2014-09-30. Query text: INSERT INTO `#__update_sites_extensions` (`update_site_id`, `extension_id`) VALU.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-08-24. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-09-01. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-09-01. Query text: INSERT INTO `#__update_sites` (`name`, `type`, `location`, `enabled`) VALUES ('W.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-09-01. Query text: INSERT INTO `#__update_sites_extensions` (`update_site_id`, `extension_id`) VALU.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-09-16. Query text: ALTER TABLE `#__redirect_links` ADD header smallint(3) NOT NULL DEFAULT 301;.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-09-16. Query text: ALTER TABLE `#__redirect_links` MODIFY new_url varchar(255);.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-10-20. Query text: DELETE FROM `#__extensions` WHERE `extension_id` = 100;.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2014-12-03. Query text: UPDATE `#__extensions` SET `protected` = '0' WHERE `name` = 'plg_editors-xtd_art.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2015-01-21. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Ran query from file 3.4.0-2015-02-26. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2015-05-29T12:58:48+00:00	INFO 87.205.230.78	update	Deleting removed files and folders.
2015-05-29T12:58:49+00:00	INFO 87.205.230.78	update	Cleaning up after installation.
2015-05-29T12:58:49+00:00	INFO 87.205.230.78	update	Update to version 3.4.1 is complete.
2016-04-08T11:18:46+00:00	INFO 212.109.165.124	update	Update started by user Super User (971). Old version is 3.4.1.
2016-04-08T11:18:46+00:00	INFO 212.109.165.124	update	Downloading update file from https://github.com/joomla/joomla-cms/releases/download/3.5.1/Joomla_3.5.1-Stable-Update_Package.zip.
2016-04-08T11:18:50+00:00	INFO 212.109.165.124	update	File Joomla_3.5.1-Stable-Update_Package.zip successfully downloaded.
2016-04-08T11:18:50+00:00	INFO 212.109.165.124	update	Starting installation of new version.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Finalising installation.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-07-01. Query text: ALTER TABLE `#__session` MODIFY `session_id` varchar(191) NOT NULL DEFAULT '';.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-07-01. Query text: ALTER TABLE `#__user_keys` MODIFY `series` varchar(191) NOT NULL;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-10-13. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-10-26. Query text: ALTER TABLE `#__contentitem_tag_map` DROP INDEX `idx_tag`;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-10-26. Query text: ALTER TABLE `#__contentitem_tag_map` DROP INDEX `idx_type`;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-10-30. Query text: UPDATE `#__menu` SET `title` = 'com_contact_contacts' WHERE `id` = 8;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-11-04. Query text: DELETE FROM `#__menu` WHERE `title` = 'com_messages_read' AND `client_id` = 1;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-11-04. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-11-05. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2015-11-05. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2016-02-26. Query text: CREATE TABLE IF NOT EXISTS `#__utf8_conversion` (   `converted` tinyint(4) NOT N.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2016-02-26. Query text: INSERT INTO `#__utf8_conversion` (`converted`) VALUES (0);.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` DROP INDEX `idx_link_old`;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `old_url` VARCHAR(2048) NOT NULL;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `new_url` VARCHAR(2048) NOT NULL;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `referer` VARCHAR(2048) NOT NULL;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` ADD INDEX `idx_old_url` (`old_url`(100));.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.1-2016-03-25. Query text: ALTER TABLE `#__user_keys` MODIFY `user_id` varchar(150) NOT NULL;.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Ran query from file 3.5.1-2016-03-29. Query text: UPDATE `#__utf8_conversion` SET `converted` = 0  WHERE (SELECT COUNT(*) FROM `#_.
2016-04-08T11:18:54+00:00	INFO 212.109.165.124	update	Deleting removed files and folders.
2016-04-08T11:19:07+00:00	INFO 212.109.165.124	update	Cleaning up after installation.
2016-04-08T11:19:07+00:00	INFO 212.109.165.124	update	Update to version 3.5.1 is complete.
2016-07-25T12:12:48+00:00	INFO 212.109.165.124	update	Update started by user Super User (971). Old version is 3.5.1.
2016-07-25T12:12:49+00:00	INFO 212.109.165.124	update	Downloading update file from https://github.com/joomla/joomla-cms/releases/download/3.6.0/Joomla_3.6.0-Stable-Update_Package.zip.
2016-07-25T12:13:37+00:00	INFO 212.109.165.124	update	File Joomla_3.6.0-Stable-Update_Package.zip successfully downloaded.
2016-07-25T12:13:37+00:00	INFO 212.109.165.124	update	Starting installation of new version.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Finalising installation.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `name` = 'Joomla! Core' WHERE `name` = 'Joomla Core.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `name` = 'Joomla! Extension Directory' WHERE `name`.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/core/list.x.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/jed/list.xm.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/language/tr.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/core/extens.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-06. Query text: ALTER TABLE `#__redirect_links` MODIFY `new_url` VARCHAR(2048);.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-08. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-08. Query text: UPDATE `#__update_sites_extensions` SET `extension_id` = 802 WHERE `update_site_.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-04-09. Query text: ALTER TABLE `#__menu_types` ADD COLUMN `asset_id` INT(11) NOT NULL AFTER `id`;.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-05-06. Query text: DELETE FROM `#__extensions` WHERE `type` = 'library' AND `element` = 'simplepie'.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-05-06. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-06-01. Query text: UPDATE `#__extensions` SET `protected` = 1, `enabled` = 1  WHERE `name` = 'com_a.
2016-07-25T12:13:43+00:00	INFO 212.109.165.124	update	Ran query from file 3.6.0-2016-06-05. Query text: ALTER TABLE `#__languages` ADD COLUMN `asset_id` INT(11) NOT NULL AFTER `lang_id.
2016-07-25T12:13:44+00:00	INFO 212.109.165.124	update	Deleting removed files and folders.
2016-07-25T12:13:44+00:00	INFO 212.109.165.124	update	Cleaning up after installation.
2016-07-25T12:13:44+00:00	INFO 212.109.165.124	update	Update to version 3.6.0 is complete.
