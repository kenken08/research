/*
Navicat MySQL Data Transfer

Source Server         : it48
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : research

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-13 00:35:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `announcements`
-- ----------------------------
DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of announcements
-- ----------------------------
INSERT INTO `announcements` VALUES ('1', '2', 'Google I/O', 'Register Now!', 'colours-nature-banner-dec_1531204983.jpg', '2018-07-10 06:43:04', '2018-07-10 06:43:04');
INSERT INTO `announcements` VALUES ('3', '2', 'Denka Mantika', 'Dentiajnakjsdnakljsdnalksjdnaksl a;jsndkjasndkjasnkdj', 'forumbg_1531207135.jpg', '2018-07-10 07:18:55', '2018-07-10 07:18:55');

-- ----------------------------
-- Table structure for `approvecomment`
-- ----------------------------
DROP TABLE IF EXISTS `approvecomment`;
CREATE TABLE `approvecomment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of approvecomment
-- ----------------------------
INSERT INTO `approvecomment` VALUES ('1', '2', '1', 'Nice! Good Job!', '2018-07-12 16:23:40', '2018-07-12 16:23:40');

-- ----------------------------
-- Table structure for `colleges`
-- ----------------------------
DROP TABLE IF EXISTS `colleges`;
CREATE TABLE `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of colleges
-- ----------------------------
INSERT INTO `colleges` VALUES ('1', 'College of Engineering', null, null);
INSERT INTO `colleges` VALUES ('2', 'College of Education', null, null);
INSERT INTO `colleges` VALUES ('3', 'College of Agriculture', null, null);
INSERT INTO `colleges` VALUES ('4', 'College of Human Ecology', null, null);
INSERT INTO `colleges` VALUES ('5', 'College of Arts and Sciences', null, null);
INSERT INTO `colleges` VALUES ('6', 'College of Nursing', null, null);
INSERT INTO `colleges` VALUES ('7', 'College of Veterinary Medicine', null, null);
INSERT INTO `colleges` VALUES ('8', 'College of Forestry and Environmental Science', null, null);
INSERT INTO `colleges` VALUES ('9', 'College of Business and Management', null, null);

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('1', '3', 'unread', 'proposal', '2018-07-09 05:52:14', '2018-07-09 05:52:14');
INSERT INTO `logs` VALUES ('2', '3', 'unread', 'manuscript', '2018-07-09 06:17:27', '2018-07-09 06:17:27');
INSERT INTO `logs` VALUES ('3', '1', 'unread', 'proposal', '2018-07-10 05:39:44', '2018-07-10 05:39:44');
INSERT INTO `logs` VALUES ('4', '1', 'unread', 'proposal', '2018-07-10 05:41:30', '2018-07-10 05:41:30');
INSERT INTO `logs` VALUES ('5', '1', 'unread', 'manuscript', '2018-07-10 05:43:58', '2018-07-10 05:43:58');
INSERT INTO `logs` VALUES ('6', '1', 'unread', 'proposal', '2018-07-10 05:47:11', '2018-07-10 05:47:11');
INSERT INTO `logs` VALUES ('7', '1', 'unread', 'manuscript', '2018-07-10 05:48:44', '2018-07-10 05:48:44');
INSERT INTO `logs` VALUES ('8', '4', 'unread', 'register', '2018-07-10 05:50:26', '2018-07-10 05:50:26');
INSERT INTO `logs` VALUES ('9', '5', 'unread', 'register', '2018-07-10 05:51:01', '2018-07-10 05:51:01');
INSERT INTO `logs` VALUES ('10', '3', 'unread', 'proposal', '2018-07-11 13:57:06', '2018-07-11 13:57:06');
INSERT INTO `logs` VALUES ('11', '3', 'unread', 'manuscript', '2018-07-11 15:20:16', '2018-07-11 15:20:16');
INSERT INTO `logs` VALUES ('12', '1', 'unread', 'proposal', '2018-07-12 00:21:45', '2018-07-12 00:21:45');
INSERT INTO `logs` VALUES ('13', '6', 'unread', 'register', '2018-07-12 00:39:31', '2018-07-12 00:39:31');
INSERT INTO `logs` VALUES ('14', '7', 'unread', 'register', '2018-07-12 00:41:42', '2018-07-12 00:41:42');
INSERT INTO `logs` VALUES ('15', '8', 'unread', 'register', '2018-07-12 01:37:22', '2018-07-12 01:37:22');
INSERT INTO `logs` VALUES ('16', '8', 'unread', 'proposal', '2018-07-12 01:38:29', '2018-07-12 01:38:29');
INSERT INTO `logs` VALUES ('17', '8', 'unread', 'manuscript', '2018-07-12 01:52:57', '2018-07-12 01:52:57');
INSERT INTO `logs` VALUES ('18', '3', 'unread', 'proposal', '2018-07-12 15:33:13', '2018-07-12 15:33:13');
INSERT INTO `logs` VALUES ('19', '3', 'unread', 'manuscript', '2018-07-12 16:08:52', '2018-07-12 16:08:52');
INSERT INTO `logs` VALUES ('20', '1', 'unread', 'proposal', '2018-07-12 16:16:40', '2018-07-12 16:16:40');

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for `messagesdetails`
-- ----------------------------
DROP TABLE IF EXISTS `messagesdetails`;
CREATE TABLE `messagesdetails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of messagesdetails
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('18', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('19', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('20', '2018_04_22_035656_create_research_papers_table', '1');
INSERT INTO `migrations` VALUES ('21', '2018_04_22_070340_create_logs_table', '1');
INSERT INTO `migrations` VALUES ('22', '2018_04_24_161202_create_colleges_table', '1');
INSERT INTO `migrations` VALUES ('23', '2018_04_24_164746_create_programs_table', '1');
INSERT INTO `migrations` VALUES ('24', '2018_04_26_035359_create_tags_table', '1');
INSERT INTO `migrations` VALUES ('25', '2018_04_26_035414_create_taggables_table', '1');
INSERT INTO `migrations` VALUES ('26', '2018_04_27_030137_create_research_details_table', '1');
INSERT INTO `migrations` VALUES ('27', '2018_06_19_060253_add_profilepic_to_users', '2');
INSERT INTO `migrations` VALUES ('28', '2018_07_04_134825_messages', '3');
INSERT INTO `migrations` VALUES ('29', '2018_07_04_135125_messagesdetails', '3');
INSERT INTO `migrations` VALUES ('30', '2018_07_05_181750_announcements', '4');
INSERT INTO `migrations` VALUES ('31', '2018_07_09_052153_sendrevisioncomment', '5');
INSERT INTO `migrations` VALUES ('32', '2018_07_09_055928_add_date_uploded_proposal_to_research_papers', '6');
INSERT INTO `migrations` VALUES ('33', '2018_07_12_161840_approvecomment', '7');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `programs`
-- ----------------------------
DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `collegeid` int(11) NOT NULL,
  `pname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of programs
-- ----------------------------
INSERT INTO `programs` VALUES ('1', '1', 'Bachelor of Science in Information Technology', null, null);
INSERT INTO `programs` VALUES ('2', '1', 'Bachelor of Science in Mechanical Engineering', null, null);
INSERT INTO `programs` VALUES ('3', '1', 'Bachelor of Science in Argicultural Engineering', null, null);
INSERT INTO `programs` VALUES ('4', '1', 'Bachelor of Science in Electrical Engineering', null, null);
INSERT INTO `programs` VALUES ('5', '1', 'Bachelor of Science in Civil Engineering', null, null);
INSERT INTO `programs` VALUES ('6', '2', 'Bachelor of Science in Education Major in Biology', null, null);
INSERT INTO `programs` VALUES ('7', '2', 'Bachelor of Science in Education Major in English', null, null);
INSERT INTO `programs` VALUES ('8', '2', 'Bachelor of Science in Education Major in Filipino', null, null);
INSERT INTO `programs` VALUES ('9', '2', 'Bachelor of Science in Education Major in General Science', null, null);
INSERT INTO `programs` VALUES ('10', '2', 'Bachelor of Science in Education Major in Mathematics', null, null);
INSERT INTO `programs` VALUES ('11', '2', 'Bachelor of Science in Education Major in Physical Education', null, null);
INSERT INTO `programs` VALUES ('12', '2', 'Bachelor of Science in Education Major in Physics', null, null);
INSERT INTO `programs` VALUES ('13', '3', 'Bachelor of Science in Agriculture Major in Agronomy', null, null);
INSERT INTO `programs` VALUES ('14', '3', 'Bachelor of Science in Agriculture Major in Animal Science', null, null);
INSERT INTO `programs` VALUES ('15', '3', 'Bachelor of Science in Agriculture Major in Entomology', null, null);
INSERT INTO `programs` VALUES ('16', '3', 'Bachelor of Science in Agriculture Major in Horticulture', null, null);
INSERT INTO `programs` VALUES ('17', '3', 'Bachelor of Science in Agriculture Major in Plant Breeding', null, null);
INSERT INTO `programs` VALUES ('18', '3', 'Bachelor of Science in Agriculture Major in Plant Pathology', null, null);
INSERT INTO `programs` VALUES ('19', '3', 'Bachelor of Science in Agriculture Major in Soil Science', null, null);
INSERT INTO `programs` VALUES ('20', '3', 'Bachelor of Science in Agriculture Major in Agricultural Economics', null, null);
INSERT INTO `programs` VALUES ('21', '3', 'Bachelor of Science in Agriculture Major in Agricultural Education', null, null);
INSERT INTO `programs` VALUES ('22', '3', 'Bachelor of Science in Agriculture Major in Agricultural Extension', null, null);
INSERT INTO `programs` VALUES ('23', '3', 'Bachelor of Science in Agribusiness Management Major in Crop Enterprise Livestock Enterprise', null, null);
INSERT INTO `programs` VALUES ('24', '3', 'Bachelor of Science in Development Communication', null, null);
INSERT INTO `programs` VALUES ('25', '4', 'Bachelor of Science in Food Technology', null, null);
INSERT INTO `programs` VALUES ('26', '4', 'Bachelor of Science in Nutrition & Dietetics', null, null);
INSERT INTO `programs` VALUES ('27', '4', 'Bachelor of Science in Home Economics Major in Home Economics Education', null, null);
INSERT INTO `programs` VALUES ('28', '4', 'Bachelor of Science in Home Economics Major in Food Business Management', null, null);
INSERT INTO `programs` VALUES ('29', '4', 'Bachelor of Science in Hotel and Restaurant Management', null, null);
INSERT INTO `programs` VALUES ('30', '5', 'Bachelor of Arts in English', null, null);
INSERT INTO `programs` VALUES ('31', '5', 'Bachelor of Arts in History', null, null);
INSERT INTO `programs` VALUES ('32', '5', 'Bachelor of Arts in Library Science', null, null);
INSERT INTO `programs` VALUES ('33', '5', 'Bachelor of Arts in Political Science', null, null);
INSERT INTO `programs` VALUES ('34', '5', 'Bachelor of Arts in Psychology', null, null);
INSERT INTO `programs` VALUES ('35', '5', 'Bachelor of Arts in Sociology', null, null);
INSERT INTO `programs` VALUES ('36', '5', 'Bachelor of Science in Biology', null, null);
INSERT INTO `programs` VALUES ('37', '5', 'Bachelor of Science in Chemistry', null, null);
INSERT INTO `programs` VALUES ('38', '5', 'Bachelor of Science in Mathematics', null, null);
INSERT INTO `programs` VALUES ('39', '5', 'Bachelor of Science in Physics', null, null);
INSERT INTO `programs` VALUES ('40', '6', 'Bachelor of Science in Nursing', null, null);
INSERT INTO `programs` VALUES ('41', '7', 'Doctor of Veterinary Medicine', null, null);
INSERT INTO `programs` VALUES ('42', '8', 'Bachelor of Science in Environmental Science', null, null);
INSERT INTO `programs` VALUES ('43', '8', 'Bachelor of Science in Forestry', null, null);
INSERT INTO `programs` VALUES ('44', '9', 'Bachelor of Science in Accountancy', null, null);
INSERT INTO `programs` VALUES ('45', '9', 'Bachelor of Science in Accounting Technology', null, null);
INSERT INTO `programs` VALUES ('46', '9', 'Bachelor of Science in Business Administration Major in Marketing Management', null, null);
INSERT INTO `programs` VALUES ('47', '9', 'Bachelor of Science in Business Administration Major in Financial Management', null, null);
INSERT INTO `programs` VALUES ('48', '9', 'Bachelor of Science in Business Administration Major in Operations Management', null, null);
INSERT INTO `programs` VALUES ('49', '9', 'Bachelor of Science in Office Administration', null, null);

-- ----------------------------
-- Table structure for `research_details`
-- ----------------------------
DROP TABLE IF EXISTS `research_details`;
CREATE TABLE `research_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `researchid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `researchBody` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of research_details
-- ----------------------------
INSERT INTO `research_details` VALUES ('1', '1', 'CENTRAL MINDANAO UNIVERSITY	 - RESEARCH 	OFFICE	 	\nELECTRONIC DOCUMENT MANAGEMENT SYSTEM	 	\n \n \n \n 	\nGODFREY ANTHONY T. SEROJALES	 	\n \n \n \n 	\nAN UNDERGRADUATE THESIS SUBMITTED TO THE FACULTY OF	 	\nTHE INSTITUTE OF COMPUTER APPLICATIONS, COLLEGE OF	 	\nENGINEERING, CENTRAL MINDANAO 	UNIVERSITY IN	 	\nPARTIAL FULFILLMENT OF THE REQUIREMENTS	 	\nFOR THE DEGREE	 	\n \n \n \n \n 	\nBACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY	 	\n \n \n \n 	\nOctober 2017\n\nCHAPTER I	 	\nINTRODUCTION	 	\n 	\n 	Electronic document management system is essential in managing documents 	\nelectronically. 	Moreover, EDMS provides a more compact means of storage, universal 	\naccess for retrieval, and higher levels of data security and privacy.	 	\n 	The process of EDMS has to do with capturing, storing, indexing and retrieval. 	\nit improves the accessing of informatio	n by the users of the organization wherein they 	\ncan  easily  search  and  retrieve  the  documents  needed.  Also,  there will  be  security  in \nsuch  a  way  that  the  only  authorized  users  are  allowed  to  access  the  particular \ndocuments. 	 	\n \nProject Context	 	\n 	Central  Mindanao  University 	– Research  office  is  responsible 	for 	signing	 of 	\nthesis	/dissertation	,  thesis  man	uscripts,  routinel	y  requests  and  advising  on  research 	\nstatistics/data  analysis.	 Services  made  by  the  office  is  done  manually,  daily 	\ntransactions  are  written  or  encoded  and  stored  in  one  place  which  cause  them \ndifficulties in tracking information or data in a specific date. 	 	\n \nPurpose and Description	 	\n 	Developing  an  EDMS  would  make  the	 Research  office  services  more 	\npresentable and 	convenient	. With this, the developer	 will	 work	 to create an EDMS that 	\nwill	 save and manage the 	student’s	 manuscripts	. The web application will be expected 	\nto give users a new 	experience	 in intera	cti	ng with the said EDMS.	 	\n 	The development of such web application will help users	 look for the research 	\nmaterials they	’re lookin	g. 	Transactions	 will be done through online from uploading of 	\nmanuscripts	 and searching for possible resea	rch material. 	The 	web application will be 	\neasy to use and accessible to all users.\n\nObjectives of the Project	 	\n 	The  general  of  this 	project  is  to  design,  develop  and 	implement  an  Electronic 	\nDocument 	Management System for Central Mindanao University Research Office.	 	\n 	Specifically, the study aims to:	 	\n1. design a database structure for record repository;	 	\n2. design a website that is accessible and easy to use;	 	\n3. design and develop a web	-based application for document management;	 	\n4. provide	 administ	rator account restriction for the user;	 	\n5. create a us	er account that views all transactions and	 	\n6. allow uploading of documents online.	 	\n \nSignificance of the Study	 	\n 	The significance of the web	-based application will be to offer great convenience 	\nto  the	 student	’s  submitting 	their	 manuscript. 	It gives  them  lesser  amount  of  effort, 	\nconserve their time and energy in going to the research office.	 As for the admin side it 	\nwill hasten the search of 	research	 materials because	 all the manuscripts	 uploaded are 	\ncategorize	/segregated	 accordingly. 	 	\n \nConceptual Framework	 	\n 	\nFigure 1	: Conceptual Paradigm\n\nFigure 1 shows	 the conceptual paradigm in developing an Electronic Document 	\nManagement System. 	Those 	who	 will	 access the website will be directed to the server 	\nwhich is connected to the database locally and all the data provide	d in the file system 	\nwill  be  viewed. 	W	ith 	this,  all 	operation  will  be  made  easy	 from  the  user  up  until  the 	\nadministrator	’s side.	 	\n \nScope and Limitations of the projec	t  	\n 	The EDMS will be intended to the users to upload and inquire for manuscripts. 	\nIt will have the ability to s	earch for keyword	(s) inside the manuscript and return the title 	\nand abstract containing the keyword	(s). The users of the system can be anybody as 	\nlong  as  registered  in  the  website. 	All details  on  the  website  will  be  provided  by  the 	\nadministrator on the se	rver side.	 	\n 	The users must 	have an account in the website in order to search for research 	\nmaterials. 	Only 	the title and abstract will be provided to the users, obtaining the whole 	\nmanuscript will need to have the author	’s authorization.	 There 	will be no downloading 	\ninvolved  during  the  whole  process,  all  manuscripts  or  research  material  mu	st  be 	\nclaimed at the CMU Research office along with the authorization of the author.	 On the 	\nuploading  of	 manuscripts,	 the  student  must  be  a  bona  fide  student  of  Central 	\nMindanao University and 	must have	 completed all the requirements needed.	  	\nThe student	’s account will b	e coming from the existing data	base	 to access the 	\nwebsite. 	The 	existing dat	abase will be used by the researcher to develop the 	EDMS.	 	\nThe  manuscript	’s  must  be  in  portable  document  format(PDF)  in  order  for  it  to 	\nbe uploaded.\n\nCHAPTER II	 	\nREVIEW OF RELATED LITERATURE	 	\n  	\nIn  common  l	anguage  the  word  document  usually  means  a  container  of 	\ninformation	 (usually on paper) containing written or drawn information for a particular 	\npurpose in structured way. 	Traditionally	, a document is a piece of paper or a collection	 	\nof papers, for instance, a memo, a letter,	 a mission statement or a customer invoice	. 	\nCentral 	to  the  idea  of  a  document  is  usually  that  it  can  be  easily  transferred,  stored 	\nand  handled  as  a  unit.  Over  the  last  decade,  the 	term  document  has  undergone  a 	\nradical  change  in  definition. 	This 	change  is partly  due  to  IT. 	Thus 	a  large  part  of  the 	\ndocuments handled in today	’s business world are stored as individual computer files 	\nand  are  treaded  as  units  by  the  operating  and  email	 system	 (Life  Cycle  Document 	\nManagement System for Construction, n.d.)	 	\nWeb  application  usability  is  an  evolving  issue.  A	s  we  learn  more  and  more 	\nabout 	how our users	 interact with web application, how our user	s retrieve information 	\nand  use 	it,  what  our  users  anticipate  within  their  realm  of  experienc	es,  we  can 	\niteratively improve 	our design and implementation	 (Wang, 2006)	. 	\nA  portal is a  system  that  serves  as  a  centralized  place  for accessing  different 	\nresources in the Web (Atlantic Webfitters, 2014). It gathers informati	on from different 	\nsources and put it all together in a single place which can help in accessing information \nby  several  users.  It  provides  the  users  with  a  single  point  of  content,  data,  and \nservices. It can be personalized depending on the role of the user	 in the organization 	\n(Eldrandaly, 2009). There are different types of portal: general, community, horizontal, \nvertical,  enterprise,  personal,  and  niche.  Community  Portal  is  a  system  where  the \nusers are of same group	 of interests (Tatnall, 2005). 	 	\nElectronic document management solutions are designed to	 organize business 	\nfiles  and  records  digitally,  whether  they  started  out  in  paper form  or were  generated \nby  software  applications.  Paper  files  are  first  converted  to  electronic  format  by \nscanning.  This  provides  a  more  compact  means  of  storage,  universal  ac	cess  for 	\nretrieval, and higher levels of data security and privacy	 (Easy Document Management: 	\nA Guide to Benefits, Features, and Selection, 2011)	.\n\nCodeigniter Development is one of the best PHP framework in web Application 	\nDevelopment. If 	a developer wish	ed	 to develop 	an	 application in a better way, then the 	\nonly  option  is  web  development 	with 	framework.  As  compared  to  the  other 	\nframeworks, 	Codeigniter  Development  is  fast  and  reliable.	 Its  time  and  speed  are	 	\nsignificant. 	The  developer	 can  modify  (software)  for  use  on  a  different  machine  or 	\nplatform  for  existing  codes  by  using  PHP  framework.  PHP  server  side  scripting \nlanguage  is  very  useful,  I	n  PHP  software  development,  PHP  programming  or  PHP 	\napplication  developmen	t  or  outsourcing  PHP  is  used	 (What  is  Codeigniter  and  its 	\nadvantages, 2014)	. 	\nThere  are  a  lot  of  benefits  the  codeigniter framework can  offer.	 Aside from 	its	 	\nfast, reliab	le, lightweight and more capability	. PHP helps in fixing errors on the system 	\neasily.  Through  this  framework,  developer  can  achieve  the  desired  specification  on \nthe developed	 system	. Codeigniter Development can extend 	on	 PHP coding to get t	he 	\nspecific functions through frameworks.	 In web Development, many featu	res are almost 	\nthe  same  so  that 	can  describe  the  same  code  in  different  way.	 Codeigniter 	PHP 	\nDevelopment is 	the 	easiest	 way to 	employ	 a program	. It is compatible with most web 	\nservers,  numerous  operating  systems  and  platforms	.  This  framework  has 	an 	\noutstanding	 performance  and  it  is  famous  among  develop	er  especially  on  web 	\ndeveloping	 (Major  Benefits  of  Using  Codeigniter  PHP  Fra	mework  Development, 	\n2016)	. \nPHP	 is 	one of the most popularly used languages for	 web 	development	 as well 	\nas	 web application development	. Reasons are 	it has 	Perfect Database Interaction:	  it 	\ncan  exchange  all	 sorts  of  information  with  ease. 	Another 	reason  why	 PHP 	website 	\ndevelopment	 and	 web  development	 is  admired  by  developers  is  that	 PHP	 programs 	\nare	 free. Also, the database connectivity is less expensive as compared to that of other 	\nprograms  such  as  ASP	 and  a	 Microsoft  product  that  needs  to  be  purc	hased. 	\nHowever,	 web development with PHP	 through MySQL is free to use.	 PHP	 has	 also	 an 	\nupper hand when it comes to speed. This is mainly because, the	 PHP	 code runs faster 	\nas 	it runs in its own memory space	 (How is PHP used in Web 	Development, n.d.)	.\n\nCHAPTER III	 	\nTECHNICAL BACKGROUND	 	\n \n HTML	 	\n 	Hypertext Mark	-up Language (	HTML	) is a computer language devised to allow 	\nwebsite  creation.  These  website	s can  then  be  view	ed	 by  anyone  else  connected  to 	\nthe  internet.  It  is  relatively  easy  to  learn,  with  the  basics  being  accessible	 to  most 	\npeople in	 one session 	and 	it is	 quite powerful in what it allows 	the developer	 to create. 	\nIn  developing  a  website  HTML  is  handy. 	HTML  codes  are  also  accessible  when  it 	\ncomes  to  the  coding  process  because  it  can  be	 edited  through  Sublime  Text, 	\nProgrammers  Notepad	 or	 just  simply  a  notepad  editor	. Aside  that  it  helps  on  giving 	\nfunctionalities  on  the 	program,  it	 is  also  one  of  the  reason  why  designing  became 	\neasier	 (Shannon, 2012)	. 	\nPHP	 	 	\n 	PHP	 Hypertext  Preprocessor  (PHP)  is  a  widely	-used  open  sou	rce  general	-	\npurpose scripting language that is especially suited for web development and can be \nembedded  into  HTML. 	PHP  is  also  a  powerful  tool  in  developing  an  i	nteractive  and 	\ndynamic web page	. The co	de developed in PHP can be executed on se	rver and the 	\nresult  is  turned  to  the  browser  as  plain  HTML.  There  are  a  lot  of  things  that  PHP  is \ncapable of doing such as generating dynamic page content, collecting and encrypting \ndata and can	 be used to control u	ser	-access	 (What is PHP?, n.d.)	. 	\nCodeigniter	 	\n 	CodeIgniter	 comes in the Model	-View	-Controller (MVC) framework. This helps 	\nin changing 	various innovative and 	descriptive	 concepts that the users may come up 	\nwith. By usi	ng this 	framework	, those concepts	 can be change	d to actual applications. 	\nAs a developer, PHP codeigniter is	 significant	 for	 its simplicity	 and effective	ness	. The 	\nbiggest benefit of using CodeIgniter is that 	it can create web solutions t	hat offer a level 	\nof  profici	ency	.  This  way, 	it  also 	provide	s effective  services  to  users.  Such 	all	-round	 	\nbenefits  are  rarely  found  in  other  frameworks.	 The  quality  of  libraries  that 	can 	be 	\naccess	ed	 in codeigniter framework development is so rich 	that 	it will meet all needed\n\nfunctionalities  in  developing  a  system  such  as  uploads, 	cart  and  many  more	 (The 	\nbenefits of using CodeIgniter for web development, 2016)	. 	\nCSS	 	\n 	Cascading Style S	heet (CSS) is a Web page derived from 	multiple sources with 	\na defined order of precedence where the definitio	ns of any style element	. CSS saves 	\na  lot  of  work.  It  can  control  the  layout  of  multiple  pages  all  at  once.	 With  the  use 	of 	\nCSS, it can change the layout of the whole H	TML design. It can also be used 	to define 	\nstyles for web pages, including the design, layout and variations in display for different \ndevices  and  screen  sizes.	 CSS  gives  more  control  over  the  appearance  of  a  Web 	\npage to the page creator than to the browser 	designer or the viewer.	 (Rouse, n.d.)	 	\nMySQL	 	\n 	MySQL  is  the  world\'s  most  popular  open  source  database.  With  its  proven 	\nperf	orma	nce, reliability and usability	. MySQL has become the leading database choice 	\nfor  web	-based 	applications	. Oracle  drives  MySQL  innovation,  delivering  new 	\ncapabilities to power next generation web, cloud, mobile and embedded applications.	 	\nUsing MySQL lets the system 	access and manipulat	e database easily	 (About MySQL, 	\nn.d.)	. 	\nBootstrap	 	\n 	Bootstrap  makes  front	-end  web  dev	elopment  faster  and  easier.  It  is	 made  for 	\npeople	 of  all  skill  levels,  devices  of  all  shapes,  and  projects  of  all 	sizes.	 It 	\ncontains	 HTML	- and	 CSS	-based  design  templates  for	 typography	,  forms,  buttons, 	\nnavigation and other interface components, as well as optional	 JavaScript	 extensions. 	\nWith  Bootstrap, 	developer  could	 get  extensive  and  beautiful  documentation  for 	\ncommon  HTML  elements,  dozens  of  custom  HTML  and  CSS  components,  and \nawesome jQuery plu	gins	. It gives the ability to easily create responsive designs. It is 	\neasy to use, has a responsive features it is also a b	rowser compatible	 (bootstrap, n.d.)	.\n\nAJAX	 \nAjax  has  a 	method  of  exchanging  data  with  a  server,  and 	updating  parts  of  a 	\nweb  page 	– witho	ut  reloading  the  entire  page. 	Ajax  is  used  to  perform  a  callback, 	\nmaking a quick round trip to and from the server to retrieve and/or save data without \nposting the entire page back to the server.	 Ajax allows to make asyn	chronous calls to 	\na web server. This allows the client browser to avoid waiting for all data to arrive before \nallowing  the  user  to  act  once  more.  Ajax  enabled  applications  will  always  be  more \nresponsive, faster and more user	-friendly.	 Ajax helps improve th	e speed, performance 	\nand	 usability of a web application	 (Segue, 2013)	. 	\nJAVASCRIPT	 	\n 	Java 	Script	 is a  programming  language  designed  specifically  for  electronic 	\ndocuments on the World Wide Web. JavaScript programs are embedded within HTML \nto add dynamic 	interactivity to web documents. 	JavaScript help in giving functionality 	\non an HTML file without diffic	ulty in a	 full programming language	. A simple JavaScript 	\nprogram can add interesting interactive functions to a web page. It makes use of the \nuser  interface  mechanisms  already  in  HTML  to  interact  with  users  of  the  web \ndocument	. JavaScript cannot make a 	net	wo	rk connections on its own, it 	is run by most 	\nmodern  browsers.  It 	can  be  developed  in  an	 object	-oriented  programming  and 	\nprocedural programming	 approach	 (Machajewski, n.d.)	. 	\nNAVICAT	 	\n Navicat is one of the solution in developing MySQL/	MariaDB	 because it 	allows	 	\nsimultaneous 	connect	ion to	 the databases	. It	 provides a	 natural	 and powerful graphical 	\ninterface  for  database  management,  development,  and  maintenance.	 It  would  be 	\neasier for the developer to  c	hange  specific script  since  it  is	 easy  and f	ast  to  migrate 	\nall  needed  data	. Navicat	 is also	 useful	 when	 it comes	 to transf	erring	 data	 to a database	 	\nbecause	 it supports	 export	ing	 data from tables, views, or query results to formats 	like Excel, 	\nAccess, CSV,	 Add, modify, and delete records	. It also 	gives the tools 	need	ed	 to manage 	data 	\nefficien	tly and ensure a smooth process	. Navicat e	stablish	ed	 secure connections through SSH 	\ntunneling	 and  SSL  ensure	s every  connection  is  secure	d,  stable,  and  reliable.  It  s	upport	s 	\ndifferent authentication methods of database ser	vers such as PAM authentication	 (Navicat for 	\nMySQL, n.d.)	.\n\nXAMPP	 \nXAMPP stands for 	Cross	-Platform (X), Apache (A), MariaDB (M), PHP (P) and 	\nPerl (P).	 It is a simple, lightweight Apache distribution that makes it extremely easy for 	\ndevelopers  to  create  a  local  web  server  for  testing  and  deployment  purposes. \nEverything  needed  to  set  up  a 	web  server 	– server  application  (Apache),  database 	\n(MariaDB), and scripting language (PHP) 	– is included in an extractable file.	 XAMPP 	\nis  used  for  offline  modification  of  the  system.  Through  connecting  the  database  in \nnavicat, the system can be acce	ssed ea	sily and can be modified	 (Jangid, 2016)	.\n\nIdentify Objectives	 	\nand Information	 	\nRequirement	 	\n 	\nRequirement Planning	 	\nRAD De	sign Workshop	 	\nWork with Users \nto Design System	 	\n 	\nBuild the 	 	\nSystem	 	\n 	\nIntroduce the	 	\nNew System	 	\n 	\nImplementation	 	\nCHAPTER IV	 	\nMETHODOLOGY	 	\n 	\n 	This 	area  discusses  the  methodology  the	 will  be  used  in  designing  the 	\nElectronic  Document  Management  System  of  Central  Mindanao  University	’s 	\nResearch Office.	 	\n \nDevelopment Methodology	 	\n \n \n \n \n \n 	 	\n 	\nFigure 3	: The Rapid 	Application Development diagram	 	\n 	 	 	\n 	The	 Rapid Application Development	 (RAD)	 model is based on prototyping and 	\niterative  development  with  no  specific  planning  involved.  The  process  of  writing  the \nsoftware itself involves the planning required for developing the product.	 	\nRAD	 focuses on gathering customer requirements through workshops or focus 	\ngroups, early testing of the prototypes by the customer using iterative concept, reuse \nof the existing prototypes (components), continuous integration and rapid delivery.	 	\nRAD is also a	 software development methodology that uses minimal planning 	\nin  favor  of  rapid  prototyping.  A  prototype  is  a  working  model  that  is  functionally \nequivalent to a component of the product.\n\nRequirements	 Planning	 	\nThe  developer	 will	 plan	 the  whole  duration  in  developing  the  system.  From 	\ngathering  requirements	,  coding  process,  system  test,  alpha  test,  bug  fixes, 	\nimprovements	, final fixes and lastly the deployme	nt	. 	\nThe	 developer 	will  do 	some  data  gathering  through 	Interviews.  In	 the 	\nrequirements  planning  phase,  the  d	eveloper	 will  conduct	 interviews  with	 the  staff  of 	\nCMU 	– Research office	. After the interview and discussion, objectives 	will be	 identified 	\nand  the  information  needed 	will  be	 taken. 	The 	developer 	will  do	 some  research  on 	\nwhat  type  of  system  should  be  used  in  order  to  help  enhance  the  whole  process  in \nuploading  and  searching	 on  the  organization	. An  electronic  document  management 	\nsystem will be developed based on the interview.	  	\n 	CMU	-Research  office	 current  system  are  done  manuall	y. An  Excel	 database 	\nwas  involved  in  the  c	urrent  system  of  the  CMU	-Research  Office	. On  the  current 	\nsystem  of  t	he  CMU	-Research  office	,  the  user  must  go	 to  their  building  in  order  to 	\nsubmit their manuscript, also researchers must also go to the research office to look \nfor research materi	als therefore  research personnel	’s will  try  to  find  the  materials o	n 	\nthe  file  to  look  for  the  topic	. Although  the  process  is  t	hat  simple,  it  would  be  time 	\nconsuming	 for the 	personnel to look for the	 topic	 wit	hout assurance that the 	research 	\nis available. 	 	\nOn the design system, 	the user will register their account to be able to 	searc	h 	\nfor  research  materials  online	.  Once  registered	,  all  available 	manuscript  titles  and 	\nabstract	 will be viewed	. In 	uploading the 	manuscript,	 the student will need to use the 	\ncred	entials stored in the existing database	. It will be verified by the server 	if the student 	\nhas completed all the requirement prior to the 	submission	 of manuscript	. If 	the student 	\nhas not yet completed the requirements the system will mark the	 uploaded manu	script 	\n“In  progress	”.  If  the 	student  has  completed  the  requi	re	ments  the	 system  will  then 	\nprovide the student with Research Number and	 will be	 mark	 with	 “OK	”. 	\n 	The  designed  system  provides  convenience  to  the  user  because  they  will  no 	\nlonger be inquiring at the CMU	-Research office	 just to 	submit their manuscript also the 	\nresearch office personnel will no longer have to look 	over a lo	t of paper to look for the 	\nresearch  material  needed.	 Unlike  the  current  system  where  they  have  to 	personally\n\nsearch	 thus consuming	 time	. This is one of the reason	s wh	y  the designed system is 	\nmuch helpful and convenient on the 	CMU	-Research office personnel.	 	\nUser Design	 	\n During this phase, the developer	 will creat	 a prototype that represent all system 	\nprocess,  inputs  and  outputs  on  the 	EDMS	. As  for  the  design  of  the  system,  the 	\ndeveloper 	will use	 Obanjo Template and Bootstrap, HTML, CSS and JS framework for 	\nit  to  be  responsive  which  can  be  view	ed	 in  any  end  devices  like  smartphones  and 	\ntablets. The database System used in the pro	jec	t will	 MySQL and SQL server together 	\nwith  Navicat  MySQL.  Navicat  is  a  s	oftware  for  database  management.  In  order	 to 	\naccess the database, the dev	eloper	 will use	 Codeigniter for it to fun	ction according to 	\nits process.	 	\nIn order to elaborate the whole process of 	the developed system, the developer 	\nwill create	 a context diagram. The context diagram	 will show	 that the user will input its 	\ncredentials	. The  administrator will then  manage 	the  transactions made  by  the  online 	\nsystem. 	 	\n 	In	 order  to  identify  the  functional features  that  will  be  added  to  the  developed	 	\nsystem,  a use  case  diagram 	will be	 designed. 	All  actions  that the user can  do  in  the 	\nweb	-based  application 	will  be	 shown  in  the  figure	. The  user  of  the  system 	will	 	\nresearchers and 	the student	s of CMU.	 	 	\nThe  developer	 will	 conduct  an  interview  and 	will 	mak	e  some  research	es  with	 	\nCentral  Mindanao  University	-Research  office  personnel	 	and  management. 	\nInformatio	n about the organization’s needs 	will be	 taken. After the conducted research, 	\nthe  developer	 will  design  a  system  that  will	 meet  the organization’s needs.  An  entity 	\nrelationship diagram 	will be	 creat	ed to represent the flow	. 	\n 	A  data  di	ctionar	y will  show	 the  description  of  the  fields  used  in  the  system.  It 	\nwill show	 what field and type of data 	will be	 used. 	 	\nConstruction	 	\n During  the 	development  of  the  system	, the  developer	 will  gather	 some 	\ninformation on what is best to use in developing a web	-based system. With these, the\n\ndeveloper 	will  use	 codeigniter 	as  its  framework.  The  system  will  be	 developed  with 	\nPHP, HTML, CSS and other programming languages that is ne	cessary in fulfilling the 	\nneeds of the system. Also, with the use of codeigniter the development stage 	will be	 	\nmade easier. With the help of its built	-in libraries and other functionalities such as add 	\nto cart, upload and constructors.	 The developer	 will use	 proce	dural and object oriented 	\nprogramming 	approach on the co	ding process. There are also different structures 	that 	\nwill use	 like S	tatements	 (if) and Loop (foreach)	 in conditioning the codes.  	 	\n 	 In  developing  the	 system  there  are  tools  that 	wil	l be	 used.    For  the  user 	\nint	erface,  the  developer 	will  use	 HTM	L, CSS  and  bootstrap.  HTML 	provides	 the 	\ngraphical  interface  of  the  system  su	ch  as  buttons,  inputs,  checkbox, 	attributes	 and 	\nmany more. 	CSS was used 	to quickly create layouts, and troubleshoot any problems 	\nwhen designing 	a website	. Bootstrap 	will be use	 for the system to be responsive. For 	\nthe back end of the system, the developer 	wil	l use	 PHP, Codeigniter Framework and 	\nAjax. 	PHP	 generate	s dynamic page conte	nt and 	it also 	allows to store and fetch data 	\non the database.	 Co	deigniter	 will	 help	 the developer 	develop a system in a simple way 	\nwith the help of its built	-in functions and constructors. 	Ajax	 will be use	 for the	 system 	\nto be 	more responsive, faster and more 	user	-friendly. Other	 tools such as Navicat and 	\nXAMPP 	will	 also	 be use	 for connectivity and 	access	 to the database used.	 	\nSoftware Requirements	 	\n 	Software  requirements  in  building  the  system 	will  be	 browser	s  like  Google 	\nChrome, Firefox, Safari, Internet Explorer and Opera Mini. Also, 	Sublime Text Editor, 	\nFileZilla (	version 3.20.1	 or later)	, N	avicat 	(version 10.0.6 or later)	.  	\nHardware	 Requirements	 	\n 	The minimum requirements in developing the system are 	at 	least 	Intel 	Penti	um 	\n4  or  newer  processor  that  support  SSE2  and  512MB  of  Random  Access  Memory \n(RAM)	. 	\nImplementation	 	\nAs soon as the aspects on	 the systems are built and refined, the new systems 	\nor part of systems are tested and then introduced to the organization. Because RAD \ncan be used to create new ecommerce applications for which there is no old system,\n\nthere  is  often  no  need  to  run  the  old 	and  new  systems  in  parallel  before 	\nimplementation.	 	\nTesting	 	\n 	During  the  testing  phase  of  the  system,  the  developer 	will  conduct	 an  Alpha 	\nand  Beta 	testing.	 An	 alpha  test  is  a  preliminary  software  field  test  carried  out  by 	the 	\ndeveloper 	in order to find bugs 	that were not found previously through other tests. The 	\nmain purpose of alpha testing is to refine t	he software product by finding and fixing 	the 	\nbugs that were not discovered through previous tests	 (Alpha Test, n.d.)	. Alpha testing 	\nwill be	 done by the d	eveloper to test whether all features are functionally 	capable. The	 	\ndeveloper 	will also explore	 capabilities of the whole system. It is usually done during 	\nthe whole 	process of	 developing the 	system.	 A beta testing is when	 applications are 	\nsubjected to real world testing by the intended 	user	 for the 	website	. In the Beta testing, 	\nother  personnel	 like  CMU  students	 will	 test	 the  system.  Users  who	 are  new  to  the 	\nsystem will be using 	it and 	will 	determine	 if the system is	 suita	ble for the organization.	 	\nBeta testing is done in order to know if the sy	stem is useful to the organization. In this 	\ntes	t, the developer will know the features on the system that need	 improvements	. 	\nSoftware Requirements	 	\n 	In  the  implementation  phase,  the 	minimum 	software  requirements  are  web 	\nbrowsers such as 	Google Chrome (version 3.0.195 or later), Mozilla Firefox (version 	\n54.0.1  or  later)	,  Ope	ra  Mini  (version  11.52),  Safari  (version  4.0.3  for  Mac  OS  and 	\nvers	ion 4.0 for Windows X or later), 	Internet Explo	rer	 Edge (version 21.10547 or later	).  	\n Hardware Requirement	 	\n 	For  the  hardware 	minimum 	requirements	 are	 internet  connected  end  devices 	\nsuch as table	ts and smartphones capable to open the mentioned browsers. 	 	\nOperating System	 	\n 	As  for  the  operating  system 	the  website  can  be  opened  through  mobile  or 	\ndesktop	. For desktop, it must be at least 	a Windows XP or later. As for the mobile, 	it 	\nmust be at least a	 gingerbread 2.3.7 for android and IOS 8.', '2018-07-12 16:08:52', '2018-07-12 16:08:52');

-- ----------------------------
-- Table structure for `research_papers`
-- ----------------------------
DROP TABLE IF EXISTS `research_papers`;
CREATE TABLE `research_papers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adviser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proposal_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `abstract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manuscript` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dateproposal` date DEFAULT NULL,
  `datemanuscript` date DEFAULT NULL,
  `dateapproved` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of research_papers
-- ----------------------------
INSERT INTO `research_papers` VALUES ('1', '3', 'Central Mindanao University - Research Office Electronic Document Management System (PDF)', 'Romer Ian O. Pasoc', 'Thesis(EDMS).pdf', 'approved', '102-goria-en.pdf', 'Thesis(EDMS).pdf', '2018-07-12 15:33:13', '2018-07-12 16:08:48', '2018-07-12', '2018-07-12', '2018-07-12');
INSERT INTO `research_papers` VALUES ('2', '1', 'Central Mindanao University - Extension Office Projects Monitoring System', 'Romer Ian O. Pasoc', 'Canillo_Thesis(1234).pdf', 'approved', null, null, '2018-07-12 16:16:40', '2018-07-12 16:23:40', '2018-07-12', null, '2018-07-12');

-- ----------------------------
-- Table structure for `sendrevisioncomment`
-- ----------------------------
DROP TABLE IF EXISTS `sendrevisioncomment`;
CREATE TABLE `sendrevisioncomment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sendrevisioncomment
-- ----------------------------

-- ----------------------------
-- Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `researchid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', 'EDMS,IT,Laravel,Engineering', '1', '2018-07-12 16:08:52', '2018-07-12 16:08:52');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL DEFAULT '1',
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minitial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collegeid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profilepic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'Godfrey Anthony', 'Serojales', 'T.', 'anthony@gmail.com', '2014302320', '1', '1', '$2y$10$h1ccyDa.ijtuvz6uhefTmOjtMCU1lHk.O5qlrJPtA7vwi7jiTJGEK', 'wnszwhbAwk9TutUfDp2rK580xfO3nTKdkWjwnV50KwKhLDIMp28BVXgVgj8i', '2018-05-04 03:33:01', '2018-06-24 14:46:04', 'noimage.png', null, 'active');
INSERT INTO `users` VALUES ('2', '0', 'Godfrey Anthony', 'Serojales', 'T.', 'admin@admin.admin', '0000000000', '1', '1', '$2y$10$EjrUv1PQafGwb.CSYOIiMuxxPePA.1i3DQhMiep9N.YsX0hQTEdKS', 'pFb2iHCeogD5KNYAyOxRkf76LXdEOpXzIrCAKfSypqYnpNGp0vtUc5hK9Pfw', '2018-05-04 03:33:27', '2018-07-02 15:15:34', 'noimage.png', 'Admin', 'active');
INSERT INTO `users` VALUES ('3', '1', 'Kenny Raye', 'Canillo', 'P.', 'rayenil060897@gmail.com', '2014301468', '1', '1', '$2y$10$nuTtL12.ZoXH.R5GfIzdRuPrjnHmETFnxszooD4icd3f4T9cc9dCa', 'eLnebcAKm7kOMSV3CETyEIIbowgtUXdRcFxprULRcDsodcETnTKrZKFseomk', '2018-05-06 08:15:56', '2018-06-27 08:04:48', 'noimage.png', null, 'active');
INSERT INTO `users` VALUES ('7', '1', 'John', 'Doe', 'D.', 'johndoe@gmail.com', '2014620158', '8', '43', '$2y$10$AuUlmW7QnLfLe65OZPVoyupKQCQCDsVD7Cp62Sk6lCVNqkPa1mEue', null, '2018-07-12 00:41:42', '2018-07-12 00:41:42', 'noimage.png', null, 'active');
INSERT INTO `users` VALUES ('8', '1', 'Jane', 'Doe', 'M.', 'janedoe@gmail.com', '2014698756', '6', '40', '$2y$10$xIUusHFzP5MV1eWRQmPNO.tYXcsy/9vAdVbjcIN5TPKNDTKEhJx1.', null, '2018-07-12 01:37:22', '2018-07-12 01:37:22', 'noimage.png', null, 'active');
