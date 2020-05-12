
CREATE TABLE IF NOT EXISTS `tbl_files` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;