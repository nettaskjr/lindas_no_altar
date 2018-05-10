CREATE TABLE IF NOT EXISTS `#__djflyer_items` (
  `id` int(11) NOT NULL auto_increment,
  `cat_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tooltip` text NOT NULL,
  `art_id` int(11) NOT NULL default '0',
  `details` varchar(255) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` int(11) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
          
CREATE TABLE IF NOT EXISTS `#__djflyer_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `published` int(11) NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;                                 