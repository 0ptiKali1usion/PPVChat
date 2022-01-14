-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Gazda (Host): localhost
-- Timp de generare: Iul 14, 2006 at 12:49 AM
-- Versiune server: 4.1.9
-- Versiune PHP: 4.3.10
-- 
-- Baza de date: `ppvchat`
-- 

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `chatmodels`
-- 

CREATE TABLE `chatmodels` (
  `id` varchar(32) NOT NULL default '',
  `user` varchar(32) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `email` varchar(32) NOT NULL default '',
  `language1` varchar(12) NOT NULL default '',
  `language2` varchar(12) default NULL,
  `language3` varchar(12) default NULL,
  `language4` varchar(12) default NULL,
  `birthDate` int(11) NOT NULL default '0',
  `braSize` varchar(12) default NULL,
  `birthSign` varchar(12) default NULL,
  `weight` varchar(12) default '0',
  `weightMeasure` varchar(12) default NULL,
  `height` varchar(12) default '0',
  `heightMeasure` varchar(12) default NULL,
  `eyeColor` varchar(12) default NULL,
  `ethnicity` varchar(32) default NULL,
  `message` varchar(32) default NULL,
  `position` varchar(255) default NULL,
  `fantasies` varchar(255) default NULL,
  `hobby` varchar(255) default NULL,
  `hairColor` varchar(32) default NULL,
  `hairLength` varchar(32) default NULL,
  `pubicHair` varchar(32) default NULL,
  `tImage` varchar(32) NOT NULL default '',
  `cpm` smallint(6) NOT NULL default '0',
  `epercentage` tinyint(4) NOT NULL default '0',
  `minimum` int(11) NOT NULL default '500',
  `category` varchar(32) NOT NULL default '',
  `name` varchar(32) NOT NULL default '',
  `country` varchar(32) NOT NULL default '',
  `state` varchar(32) NOT NULL default '',
  `city` varchar(32) NOT NULL default '',
  `zip` varchar(12) NOT NULL default '',
  `adress` varchar(32) NOT NULL default '',
  `actImage` varchar(32) NOT NULL default '',
  `pMethod` varchar(12) default NULL,
  `pInfo` varchar(255) default NULL,
  `dateRegistered` int(11) NOT NULL default '0',
  `owner` varchar(32) default NULL,
  `lastLogIn` int(11) NOT NULL default '0',
  `phone` varchar(16) NOT NULL default '',
  `fax` varchar(16) default NULL,
  `idtype` varchar(32) NOT NULL default '',
  `idmonth` varchar(32) NOT NULL default '',
  `idyear` varchar(4) NOT NULL default '',
  `idnumber` varchar(32) NOT NULL default '',
  `birthplace` varchar(32) NOT NULL default '',
  `ssnumber` varchar(32) default NULL,
  `msn` varchar(32) default NULL,
  `yahoo` varchar(32) default NULL,
  `icq` varchar(32) default NULL,
  `broadcastplace` varchar(32) default NULL,
  `emailtype` enum('text','html') NOT NULL default 'text',
  `status` varchar(8) NOT NULL default '',
  `lastupdate` int(11) default NULL,
  `onlinemembers` tinyint(4) NOT NULL default '0',
  `monday` varchar(4) NOT NULL default '0000',
  `tuesday` varchar(4) NOT NULL default '0000',
  `wednesday` varchar(4) NOT NULL default '0000',
  `thursday` varchar(4) NOT NULL default '0000',
  `friday` varchar(4) NOT NULL default '0000',
  `sunday` varchar(4) NOT NULL default '0000',
  `saturday` varchar(4) NOT NULL default '0000',
  `gmt` varchar(5) NOT NULL default '+0',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `chatmodels`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `chatoperators`
-- 

CREATE TABLE `chatoperators` (
  `id` varchar(32) NOT NULL default '',
  `user` varchar(32) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `email` varchar(32) NOT NULL default '',
  `name` varchar(32) NOT NULL default '',
  `country` varchar(32) NOT NULL default '',
  `state` varchar(32) NOT NULL default '',
  `city` varchar(32) NOT NULL default '',
  `zip` varchar(12) NOT NULL default '',
  `phone` varchar(12) NOT NULL default '',
  `adress` varchar(32) NOT NULL default '',
  `pMethod` varchar(12) default NULL,
  `pInfo` varchar(255) default NULL,
  `dateRegistered` int(11) NOT NULL default '0',
  `lastLogIn` int(11) NOT NULL default '0',
  `moneyEarned` varchar(24) NOT NULL default '',
  `moneySent` varchar(24) NOT NULL default '',
  `minimum` mediumint(9) NOT NULL default '0',
  `status` varchar(12) NOT NULL default '',
  `epercentage` tinyint(4) NOT NULL default '0',
  `emailtype` enum('text','html') NOT NULL default 'text',
  `company` varchar(32) default NULL,
  `idtax` varchar(32) default NULL,
  PRIMARY KEY  (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `chatoperators`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `chatusers`
-- 

CREATE TABLE `chatusers` (
  `id` varchar(32) NOT NULL default '',
  `user` varchar(32) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `email` varchar(32) NOT NULL default '',
  `name` varchar(32) NOT NULL default '',
  `country` varchar(32) NOT NULL default '',
  `state` varchar(32) NOT NULL default '',
  `city` varchar(32) NOT NULL default '',
  `phone` varchar(16) NOT NULL default '',
  `zip` varchar(12) NOT NULL default '',
  `adress` varchar(255) NOT NULL default '',
  `dateRegistered` int(11) NOT NULL default '0',
  `lastLogIn` int(11) NOT NULL default '0',
  `money` bigint(12) NOT NULL default '1',
  `emailnotify` char(1) NOT NULL default '0',
  `smsnotify` char(1) NOT NULL default '0',
  `status` varchar(12) NOT NULL default '',
  `emailtype` enum('html','text') default 'text',
  `freetime` smallint(6) NOT NULL default '120',
  `freetimeexpired` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `chatusers`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `countries`
-- 

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(24) default NULL,
  `code` bigint(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=245 ;

-- 
-- Salvarea datelor din tabel `countries`
-- 

INSERT INTO `countries` VALUES (1, 'Afghanistan', 93);
INSERT INTO `countries` VALUES (2, 'Albania', 355);
INSERT INTO `countries` VALUES (3, 'Algeria', 213);
INSERT INTO `countries` VALUES (4, 'American Samoa', 684);
INSERT INTO `countries` VALUES (5, 'Andorra', 376);
INSERT INTO `countries` VALUES (6, 'Angola', 244);
INSERT INTO `countries` VALUES (7, 'Anguilla', 1);
INSERT INTO `countries` VALUES (8, 'Antarctica', 672);
INSERT INTO `countries` VALUES (9, 'Antigua', 1);
INSERT INTO `countries` VALUES (10, 'Argentina', 54);
INSERT INTO `countries` VALUES (11, 'Armenia', 374);
INSERT INTO `countries` VALUES (12, 'Aruba', 297);
INSERT INTO `countries` VALUES (13, 'Ascension', 247);
INSERT INTO `countries` VALUES (14, 'Australia', 61);
INSERT INTO `countries` VALUES (15, 'Australian External Ter.', 672);
INSERT INTO `countries` VALUES (16, 'Austria', 43);
INSERT INTO `countries` VALUES (17, 'Azerbaijan', 994);
INSERT INTO `countries` VALUES (18, 'Bahamas', 1);
INSERT INTO `countries` VALUES (19, 'Bahrain', 973);
INSERT INTO `countries` VALUES (20, 'Bangladesh', 880);
INSERT INTO `countries` VALUES (21, 'Barbados', 1);
INSERT INTO `countries` VALUES (22, 'Barbuda', 1);
INSERT INTO `countries` VALUES (23, 'Belarus', 375);
INSERT INTO `countries` VALUES (24, 'Belgium', 32);
INSERT INTO `countries` VALUES (25, 'Belize', 501);
INSERT INTO `countries` VALUES (26, 'Benin', 229);
INSERT INTO `countries` VALUES (27, 'Bermuda', 1);
INSERT INTO `countries` VALUES (28, 'Bhutan', 975);
INSERT INTO `countries` VALUES (29, 'Bolivia', 591);
INSERT INTO `countries` VALUES (30, 'Bosnia & Herzegovina', 387);
INSERT INTO `countries` VALUES (31, 'Botswana', 267);
INSERT INTO `countries` VALUES (32, 'Brazil', 55);
INSERT INTO `countries` VALUES (33, 'British Virgin Islands', 1);
INSERT INTO `countries` VALUES (34, 'Brunei Darussalam', 673);
INSERT INTO `countries` VALUES (35, 'Bulgaria', 359);
INSERT INTO `countries` VALUES (36, 'Burkina Faso', 226);
INSERT INTO `countries` VALUES (37, 'Burundi', 257);
INSERT INTO `countries` VALUES (38, 'Cambodia', 855);
INSERT INTO `countries` VALUES (39, 'Cameroon', 237);
INSERT INTO `countries` VALUES (40, 'Canada', 1);
INSERT INTO `countries` VALUES (41, 'Cape Verde Islands', 238);
INSERT INTO `countries` VALUES (42, 'Cayman Islands', 1);
INSERT INTO `countries` VALUES (43, 'Central African Republic', 236);
INSERT INTO `countries` VALUES (44, 'Chad', 235);
INSERT INTO `countries` VALUES (45, 'Chatham Island', 64);
INSERT INTO `countries` VALUES (46, 'Chile', 56);
INSERT INTO `countries` VALUES (47, 'China', 86);
INSERT INTO `countries` VALUES (48, 'Christmas Island', 61);
INSERT INTO `countries` VALUES (49, 'Cocos-Keeling Islands', 61);
INSERT INTO `countries` VALUES (50, 'Colombia', 57);
INSERT INTO `countries` VALUES (51, 'Comoros', 269);
INSERT INTO `countries` VALUES (52, 'Congo', 242);
INSERT INTO `countries` VALUES (53, 'Congo, Dem. Rep.', 243);
INSERT INTO `countries` VALUES (54, 'Cook Islands', 682);
INSERT INTO `countries` VALUES (55, 'Costa Rica', 506);
INSERT INTO `countries` VALUES (56, 'Côte d''Ivoire', 225);
INSERT INTO `countries` VALUES (57, 'Croatia', 385);
INSERT INTO `countries` VALUES (58, 'Cuba', 53);
INSERT INTO `countries` VALUES (59, 'Cuba (Guantanamo Bay)', 5399);
INSERT INTO `countries` VALUES (60, 'Curaçao', 599);
INSERT INTO `countries` VALUES (61, 'Cyprus', 357);
INSERT INTO `countries` VALUES (62, 'Czech Republic', 420);
INSERT INTO `countries` VALUES (63, 'Denmark', 45);
INSERT INTO `countries` VALUES (64, 'Diego Garcia', 246);
INSERT INTO `countries` VALUES (65, 'Djibouti', 253);
INSERT INTO `countries` VALUES (66, 'Dominica', 1);
INSERT INTO `countries` VALUES (67, 'Dominican Republic', 1);
INSERT INTO `countries` VALUES (68, 'East Timor', 670);
INSERT INTO `countries` VALUES (69, 'Easter Island', 56);
INSERT INTO `countries` VALUES (70, 'Ecuador', 593);
INSERT INTO `countries` VALUES (71, 'Egypt', 20);
INSERT INTO `countries` VALUES (72, 'El Salvador', 503);
INSERT INTO `countries` VALUES (73, 'Equatorial Guinea', 240);
INSERT INTO `countries` VALUES (74, 'Eritrea', 291);
INSERT INTO `countries` VALUES (75, 'Estonia', 372);
INSERT INTO `countries` VALUES (76, 'Ethiopia', 251);
INSERT INTO `countries` VALUES (77, 'Falkland Islands', 500);
INSERT INTO `countries` VALUES (78, 'Faroe Islands', 298);
INSERT INTO `countries` VALUES (79, 'Fiji Islands', 679);
INSERT INTO `countries` VALUES (80, 'Finland', 358);
INSERT INTO `countries` VALUES (81, 'France', 33);
INSERT INTO `countries` VALUES (82, 'French Antilles', 596);
INSERT INTO `countries` VALUES (83, 'French Guiana', 594);
INSERT INTO `countries` VALUES (84, 'French Polynesia', 689);
INSERT INTO `countries` VALUES (85, 'Gabonese Republic', 241);
INSERT INTO `countries` VALUES (86, 'Gambia', 220);
INSERT INTO `countries` VALUES (87, 'Georgia', 995);
INSERT INTO `countries` VALUES (88, 'Germany', 49);
INSERT INTO `countries` VALUES (89, 'Ghana', 233);
INSERT INTO `countries` VALUES (90, 'Gibraltar', 350);
INSERT INTO `countries` VALUES (91, 'Greece', 30);
INSERT INTO `countries` VALUES (92, 'Greenland', 299);
INSERT INTO `countries` VALUES (93, 'Grenada', 1);
INSERT INTO `countries` VALUES (94, 'Guadeloupe', 590);
INSERT INTO `countries` VALUES (95, 'Guam', 1);
INSERT INTO `countries` VALUES (96, 'Guantanamo Bay', 5399);
INSERT INTO `countries` VALUES (97, 'Guatemala', 502);
INSERT INTO `countries` VALUES (98, 'Guinea-Bissau', 245);
INSERT INTO `countries` VALUES (99, 'Guinea', 224);
INSERT INTO `countries` VALUES (100, 'Guyana', 592);
INSERT INTO `countries` VALUES (101, 'Haiti', 509);
INSERT INTO `countries` VALUES (102, 'Honduras', 504);
INSERT INTO `countries` VALUES (103, 'Hong Kong', 852);
INSERT INTO `countries` VALUES (104, 'Hungary', 36);
INSERT INTO `countries` VALUES (105, 'Iceland', 354);
INSERT INTO `countries` VALUES (106, 'India', 91);
INSERT INTO `countries` VALUES (107, 'Indonesia', 62);
INSERT INTO `countries` VALUES (108, 'Iran', 98);
INSERT INTO `countries` VALUES (109, 'Iraq', 964);
INSERT INTO `countries` VALUES (110, 'Ireland', 353);
INSERT INTO `countries` VALUES (111, 'Israel', 972);
INSERT INTO `countries` VALUES (112, 'Italy', 39);
INSERT INTO `countries` VALUES (113, 'Jamaica', 1);
INSERT INTO `countries` VALUES (114, 'Japan', 81);
INSERT INTO `countries` VALUES (115, 'Jordan', 962);
INSERT INTO `countries` VALUES (116, 'Kazakhstan', 7);
INSERT INTO `countries` VALUES (117, 'Kenya', 254);
INSERT INTO `countries` VALUES (118, 'Kiribati', 686);
INSERT INTO `countries` VALUES (119, 'Korea (North)', 850);
INSERT INTO `countries` VALUES (120, 'Korea (South)', 82);
INSERT INTO `countries` VALUES (121, 'Kuwait', 965);
INSERT INTO `countries` VALUES (122, 'Kyrgyz Republic', 996);
INSERT INTO `countries` VALUES (123, 'Laos', 856);
INSERT INTO `countries` VALUES (124, 'Latvia', 371);
INSERT INTO `countries` VALUES (125, 'Lebanon', 961);
INSERT INTO `countries` VALUES (126, 'Lesotho', 266);
INSERT INTO `countries` VALUES (127, 'Liberia', 231);
INSERT INTO `countries` VALUES (128, 'Libya', 218);
INSERT INTO `countries` VALUES (129, 'Liechtenstein', 423);
INSERT INTO `countries` VALUES (130, 'Lithuania', 370);
INSERT INTO `countries` VALUES (131, 'Luxembourg', 352);
INSERT INTO `countries` VALUES (132, 'Macao', 853);
INSERT INTO `countries` VALUES (133, 'Macedonia', 389);
INSERT INTO `countries` VALUES (134, 'Madagascar', 261);
INSERT INTO `countries` VALUES (135, 'Malawi', 265);
INSERT INTO `countries` VALUES (136, 'Malaysia', 60);
INSERT INTO `countries` VALUES (137, 'Maldives', 960);
INSERT INTO `countries` VALUES (138, 'Mali Republic', 223);
INSERT INTO `countries` VALUES (139, 'Malta', 356);
INSERT INTO `countries` VALUES (140, 'Marshall Islands', 692);
INSERT INTO `countries` VALUES (141, 'Martinique', 596);
INSERT INTO `countries` VALUES (142, 'Mauritania', 222);
INSERT INTO `countries` VALUES (143, 'Mauritius', 230);
INSERT INTO `countries` VALUES (144, 'Mayotte Island', 269);
INSERT INTO `countries` VALUES (145, 'Mexico', 52);
INSERT INTO `countries` VALUES (146, 'Micronesia', 691);
INSERT INTO `countries` VALUES (147, 'Midway Island', 1);
INSERT INTO `countries` VALUES (148, 'Moldova', 373);
INSERT INTO `countries` VALUES (149, 'Monaco', 377);
INSERT INTO `countries` VALUES (150, 'Mongolia', 976);
INSERT INTO `countries` VALUES (151, 'Montserrat', 1);
INSERT INTO `countries` VALUES (152, 'Morocco', 212);
INSERT INTO `countries` VALUES (153, 'Mozambique', 258);
INSERT INTO `countries` VALUES (154, 'Myanmar', 95);
INSERT INTO `countries` VALUES (155, 'Namibia', 264);
INSERT INTO `countries` VALUES (156, 'Nauru', 674);
INSERT INTO `countries` VALUES (157, 'Nepal', 977);
INSERT INTO `countries` VALUES (158, 'Netherlands', 31);
INSERT INTO `countries` VALUES (159, 'Netherlands Antilles', 599);
INSERT INTO `countries` VALUES (160, 'Nevis', 1);
INSERT INTO `countries` VALUES (161, 'New Caledonia', 687);
INSERT INTO `countries` VALUES (162, 'New Zealand', 64);
INSERT INTO `countries` VALUES (163, 'Nicaragua', 505);
INSERT INTO `countries` VALUES (164, 'Niger', 227);
INSERT INTO `countries` VALUES (165, 'Nigeria', 234);
INSERT INTO `countries` VALUES (166, 'Niue', 683);
INSERT INTO `countries` VALUES (167, 'Norfolk Island', 672);
INSERT INTO `countries` VALUES (168, 'Northern Marianas Isles', 1);
INSERT INTO `countries` VALUES (169, 'Norway', 47);
INSERT INTO `countries` VALUES (170, 'Oman', 968);
INSERT INTO `countries` VALUES (171, 'Pakistan', 92);
INSERT INTO `countries` VALUES (172, 'Palau', 680);
INSERT INTO `countries` VALUES (173, 'Palestinian Settlements', 970);
INSERT INTO `countries` VALUES (174, 'Panama', 507);
INSERT INTO `countries` VALUES (175, 'Papua New Guinea', 675);
INSERT INTO `countries` VALUES (176, 'Paraguay', 595);
INSERT INTO `countries` VALUES (177, 'Peru', 51);
INSERT INTO `countries` VALUES (178, 'Philippines', 63);
INSERT INTO `countries` VALUES (179, 'Poland', 48);
INSERT INTO `countries` VALUES (180, 'Portugal', 351);
INSERT INTO `countries` VALUES (181, 'Puerto Rico', 1);
INSERT INTO `countries` VALUES (182, 'Qatar', 974);
INSERT INTO `countries` VALUES (183, 'Réunion Island', 262);
INSERT INTO `countries` VALUES (184, 'Romania', 40);
INSERT INTO `countries` VALUES (185, 'Russia', 7);
INSERT INTO `countries` VALUES (186, 'Rwandese Republic', 250);
INSERT INTO `countries` VALUES (187, 'St. Helena', 290);
INSERT INTO `countries` VALUES (188, 'St. Kitts/Nevis', 1);
INSERT INTO `countries` VALUES (189, 'St. Lucia', 1);
INSERT INTO `countries` VALUES (190, 'St. Pierre & Miquelon', 508);
INSERT INTO `countries` VALUES (191, 'St. Vincent & Grenadines', 1);
INSERT INTO `countries` VALUES (192, 'San Marino', 378);
INSERT INTO `countries` VALUES (193, 'São Tomé and Principe', 239);
INSERT INTO `countries` VALUES (194, 'Saudi Arabia', 966);
INSERT INTO `countries` VALUES (195, 'Senegal', 221);
INSERT INTO `countries` VALUES (196, 'Serbia and Montenegro', 381);
INSERT INTO `countries` VALUES (197, 'Seychelles Republic', 248);
INSERT INTO `countries` VALUES (198, 'Sierra Leone', 232);
INSERT INTO `countries` VALUES (199, 'Singapore', 65);
INSERT INTO `countries` VALUES (200, 'Slovak Republic', 421);
INSERT INTO `countries` VALUES (201, 'Slovenia', 386);
INSERT INTO `countries` VALUES (202, 'Solomon Islands', 677);
INSERT INTO `countries` VALUES (203, 'Somali Democratic Rep.', 252);
INSERT INTO `countries` VALUES (204, 'South Africa', 27);
INSERT INTO `countries` VALUES (205, 'Spain', 34);
INSERT INTO `countries` VALUES (206, 'Sri Lanka', 94);
INSERT INTO `countries` VALUES (207, 'Sudan', 249);
INSERT INTO `countries` VALUES (208, 'Suriname', 597);
INSERT INTO `countries` VALUES (209, 'Swaziland', 268);
INSERT INTO `countries` VALUES (210, 'Sweden', 46);
INSERT INTO `countries` VALUES (211, 'Switzerland', 41);
INSERT INTO `countries` VALUES (212, 'Syria', 963);
INSERT INTO `countries` VALUES (213, 'Taiwan', 886);
INSERT INTO `countries` VALUES (214, 'Tajikistan', 992);
INSERT INTO `countries` VALUES (215, 'Tanzania', 255);
INSERT INTO `countries` VALUES (216, 'Thailand', 66);
INSERT INTO `countries` VALUES (217, 'Togolese Republic', NULL);
INSERT INTO `countries` VALUES (218, 'Tokelau', 690);
INSERT INTO `countries` VALUES (219, 'Tonga Islands', 676);
INSERT INTO `countries` VALUES (220, 'Trinidad & Tobago', 1);
INSERT INTO `countries` VALUES (221, 'Tunisia', 216);
INSERT INTO `countries` VALUES (222, 'Turkey', 90);
INSERT INTO `countries` VALUES (223, 'Turkmenistan', 993);
INSERT INTO `countries` VALUES (224, 'Turks and Caicos Islands', 1);
INSERT INTO `countries` VALUES (225, 'Tuvalu', 688);
INSERT INTO `countries` VALUES (226, 'Uganda', 256);
INSERT INTO `countries` VALUES (227, 'Ukraine', 380);
INSERT INTO `countries` VALUES (228, 'United Arab Emirates', 971);
INSERT INTO `countries` VALUES (229, 'United Kingdom', 44);
INSERT INTO `countries` VALUES (230, 'United States of America', 1);
INSERT INTO `countries` VALUES (231, 'US Virgin Islands', 1);
INSERT INTO `countries` VALUES (232, 'Uruguay', 598);
INSERT INTO `countries` VALUES (233, 'Uzbekistan', 998);
INSERT INTO `countries` VALUES (234, 'Vanuatu', 678);
INSERT INTO `countries` VALUES (235, 'Vatican City', 379);
INSERT INTO `countries` VALUES (236, 'Venezuela', 58);
INSERT INTO `countries` VALUES (237, 'Vietnam', 84);
INSERT INTO `countries` VALUES (238, 'Wake Island', 808);
INSERT INTO `countries` VALUES (239, 'Wallis and Futuna Isles', 681);
INSERT INTO `countries` VALUES (240, 'Western Samoa', 685);
INSERT INTO `countries` VALUES (241, 'Yemen', 967);
INSERT INTO `countries` VALUES (242, 'Zambia', 260);
INSERT INTO `countries` VALUES (243, 'Zanzibar', 255);
INSERT INTO `countries` VALUES (244, 'Zimbabwe', 263);

-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `favorites`
-- 

CREATE TABLE `favorites` (
  `member` varchar(32) NOT NULL default '',
  `model` varchar(32) NOT NULL default '',
  `dateadded` int(11) NOT NULL default '0',
  PRIMARY KEY  (`member`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `favorites`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `modelpictures`
-- 

CREATE TABLE `modelpictures` (
  `user` varchar(32) NOT NULL default '',
  `name` varchar(32) NOT NULL default '',
  `dateuploaded` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `modelpictures`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `modelshows`
-- 

CREATE TABLE `modelshows` (
  `user` varchar(32) NOT NULL default '',
  `name` varchar(24) NOT NULL default '',
  `string` varchar(32) NOT NULL default '',
  `previewtime` bigint(20) NOT NULL default '0',
  `movietime` bigint(20) NOT NULL default '0',
  `price` mediumint(9) NOT NULL default '300',
  PRIMARY KEY  (`user`,`string`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `modelshows`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `payments`
-- 

CREATE TABLE `payments` (
  `id` varchar(32) NOT NULL default '',
  `date` bigint(24) NOT NULL default '0',
  `ammount` varchar(24) NOT NULL default '',
  `taxes` varchar(24) NOT NULL default '',
  `method` varchar(12) NOT NULL default '',
  `details` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `payments`
-- 


-- --------------------------------------------------------

-- 
-- Structura de tabel pentru tabelul `videosessions`
-- 

CREATE TABLE `videosessions` (
  `sessionid` varchar(32) NOT NULL default '',
  `member` varchar(32) NOT NULL default '',
  `model` varchar(32) NOT NULL default '',
  `sop` varchar(32) NOT NULL default '',
  `cpm` mediumint(9) NOT NULL default '0',
  `epercentage` smallint(6) NOT NULL default '0',
  `date` int(11) NOT NULL default '0',
  `duration` mediumint(9) NOT NULL default '0',
  `paid` char(1) NOT NULL default '',
  `soppaid` char(1) NOT NULL default '0',
  `type` varchar(12) NOT NULL default '',
  KEY `sessionid` (`sessionid`,`member`,`model`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Salvarea datelor din tabel `videosessions`
-- 

