/*
Navicat MySQL Data Transfer

Source Server         : phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : wallet

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-08 16:12:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `aac_audit`
-- ----------------------------
DROP TABLE IF EXISTS `aac_audit`;
CREATE TABLE `aac_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `c_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `uid` int(11) DEFAULT NULL COMMENT '操作人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_audit
-- ----------------------------
INSERT INTO `aac_audit` VALUES ('1', '1521707443', '1');
INSERT INTO `aac_audit` VALUES ('2', '1521707637', '1');
INSERT INTO `aac_audit` VALUES ('3', '1521707688', '1');
INSERT INTO `aac_audit` VALUES ('4', '1521775172', '1');
INSERT INTO `aac_audit` VALUES ('5', '1521776514', '1');
INSERT INTO `aac_audit` VALUES ('6', '1521777348', '1');
INSERT INTO `aac_audit` VALUES ('7', '1521777516', '1');
INSERT INTO `aac_audit` VALUES ('8', '1521797278', '1');
INSERT INTO `aac_audit` VALUES ('9', '1521797472', '1');
INSERT INTO `aac_audit` VALUES ('10', '1521803351', '1');
INSERT INTO `aac_audit` VALUES ('11', '1521803421', '1');
INSERT INTO `aac_audit` VALUES ('12', '1522216374', '1');
INSERT INTO `aac_audit` VALUES ('13', '1522221590', '1');
INSERT INTO `aac_audit` VALUES ('14', '1522309650', '1');
INSERT INTO `aac_audit` VALUES ('15', '1522309717', '1');
INSERT INTO `aac_audit` VALUES ('16', '1522317530', '1');
INSERT INTO `aac_audit` VALUES ('17', '1522321650', '1');
INSERT INTO `aac_audit` VALUES ('18', '1522321775', '1');
INSERT INTO `aac_audit` VALUES ('19', '1522722387', '1');
INSERT INTO `aac_audit` VALUES ('20', '1522722526', '1');
INSERT INTO `aac_audit` VALUES ('21', '1522723245', '1');
INSERT INTO `aac_audit` VALUES ('22', '1522724565', '1');
INSERT INTO `aac_audit` VALUES ('23', '1522734368', '1');
INSERT INTO `aac_audit` VALUES ('24', '1522739337', '1');
INSERT INTO `aac_audit` VALUES ('25', '1522739519', '1');
INSERT INTO `aac_audit` VALUES ('26', '1522739532', '1');
INSERT INTO `aac_audit` VALUES ('27', '1522739611', '1');
INSERT INTO `aac_audit` VALUES ('28', '1522739644', '1');
INSERT INTO `aac_audit` VALUES ('29', '1522739743', '1');
INSERT INTO `aac_audit` VALUES ('30', '1522739795', '1');
INSERT INTO `aac_audit` VALUES ('31', '1522739832', '1');
INSERT INTO `aac_audit` VALUES ('32', '1522740251', '1');
INSERT INTO `aac_audit` VALUES ('33', '1523253762', '1');
INSERT INTO `aac_audit` VALUES ('34', '1523254016', '1');
INSERT INTO `aac_audit` VALUES ('35', '1523254321', '1');
INSERT INTO `aac_audit` VALUES ('36', '1523254348', '1');
INSERT INTO `aac_audit` VALUES ('37', '1523254670', '1');
INSERT INTO `aac_audit` VALUES ('38', '1523254796', '1');
INSERT INTO `aac_audit` VALUES ('39', '1523260536', '1');
INSERT INTO `aac_audit` VALUES ('40', '1523260581', '1');
INSERT INTO `aac_audit` VALUES ('41', '1523260664', '1');
INSERT INTO `aac_audit` VALUES ('42', '1523260996', '1');
INSERT INTO `aac_audit` VALUES ('43', '1523261350', '1');
INSERT INTO `aac_audit` VALUES ('44', '1523261396', '1');
INSERT INTO `aac_audit` VALUES ('45', '1523261410', '1');
INSERT INTO `aac_audit` VALUES ('46', '1523261458', '1');
INSERT INTO `aac_audit` VALUES ('47', '1523261507', '1');
INSERT INTO `aac_audit` VALUES ('48', '1523262486', '1');
INSERT INTO `aac_audit` VALUES ('49', '1523262554', '1');
INSERT INTO `aac_audit` VALUES ('50', '1523262732', '1');
INSERT INTO `aac_audit` VALUES ('51', '1523263724', '1');
INSERT INTO `aac_audit` VALUES ('52', '1523263974', '1');
INSERT INTO `aac_audit` VALUES ('53', '1523265270', '1');
INSERT INTO `aac_audit` VALUES ('54', '1523265329', '1');
INSERT INTO `aac_audit` VALUES ('55', '1523268132', '1');
INSERT INTO `aac_audit` VALUES ('56', '1523268175', '1');
INSERT INTO `aac_audit` VALUES ('57', '1523268505', '1');
INSERT INTO `aac_audit` VALUES ('58', '1523269993', '1');
INSERT INTO `aac_audit` VALUES ('59', '1523270085', '1');
INSERT INTO `aac_audit` VALUES ('60', '1523270263', '1');
INSERT INTO `aac_audit` VALUES ('61', '1523270300', '1');
INSERT INTO `aac_audit` VALUES ('62', '1523270323', '1');
INSERT INTO `aac_audit` VALUES ('63', '1523270399', '1');
INSERT INTO `aac_audit` VALUES ('64', '1523270812', '1');
INSERT INTO `aac_audit` VALUES ('65', '1523270859', '1');
INSERT INTO `aac_audit` VALUES ('66', '1523271110', '1');
INSERT INTO `aac_audit` VALUES ('67', '1523271217', '1');
INSERT INTO `aac_audit` VALUES ('68', '1523271232', '1');
INSERT INTO `aac_audit` VALUES ('69', '1523271346', '1');
INSERT INTO `aac_audit` VALUES ('70', '1523271738', '1');
INSERT INTO `aac_audit` VALUES ('71', '1523272093', '1');
INSERT INTO `aac_audit` VALUES ('72', '1523272572', '1');
INSERT INTO `aac_audit` VALUES ('73', '1523272592', '1');
INSERT INTO `aac_audit` VALUES ('74', '1523277222', '1');
INSERT INTO `aac_audit` VALUES ('75', '1523326359', '1');
INSERT INTO `aac_audit` VALUES ('76', '1523328843', '1');
INSERT INTO `aac_audit` VALUES ('77', '1523331799', '1');
INSERT INTO `aac_audit` VALUES ('78', '1523332570', '1');
INSERT INTO `aac_audit` VALUES ('79', '1523336474', '1');
INSERT INTO `aac_audit` VALUES ('80', '1523336960', '1');
INSERT INTO `aac_audit` VALUES ('81', '1523337124', '1');
INSERT INTO `aac_audit` VALUES ('82', '1523337212', '1');
INSERT INTO `aac_audit` VALUES ('83', '1523337228', '1');
INSERT INTO `aac_audit` VALUES ('84', '1523340985', '1');
INSERT INTO `aac_audit` VALUES ('85', '1523343031', '1');
INSERT INTO `aac_audit` VALUES ('86', '1523343131', '1');
INSERT INTO `aac_audit` VALUES ('87', '1523343406', '1');
INSERT INTO `aac_audit` VALUES ('88', '1523343512', '1');
INSERT INTO `aac_audit` VALUES ('89', '1523344431', '1');
INSERT INTO `aac_audit` VALUES ('90', '1523345149', '1');
INSERT INTO `aac_audit` VALUES ('91', '1523345433', '1');
INSERT INTO `aac_audit` VALUES ('92', '1523345819', '1');
INSERT INTO `aac_audit` VALUES ('93', '1523345963', '1');
INSERT INTO `aac_audit` VALUES ('94', '1523346072', '1');
INSERT INTO `aac_audit` VALUES ('95', '1523346227', '1');
INSERT INTO `aac_audit` VALUES ('96', '1523346403', '1');
INSERT INTO `aac_audit` VALUES ('97', '1523346846', '1');
INSERT INTO `aac_audit` VALUES ('98', '1523347295', '1');
INSERT INTO `aac_audit` VALUES ('99', '1523347813', '1');
INSERT INTO `aac_audit` VALUES ('100', '1523347856', '1');
INSERT INTO `aac_audit` VALUES ('101', '1523347915', '1');
INSERT INTO `aac_audit` VALUES ('102', '1523349553', '1');
INSERT INTO `aac_audit` VALUES ('103', '1523349707', '1');
INSERT INTO `aac_audit` VALUES ('104', '1523355518', '1');
INSERT INTO `aac_audit` VALUES ('105', '1523355555', '1');
INSERT INTO `aac_audit` VALUES ('106', '1523357374', '1');
INSERT INTO `aac_audit` VALUES ('107', '1523358028', '1');
INSERT INTO `aac_audit` VALUES ('108', '1523358094', '1');
INSERT INTO `aac_audit` VALUES ('109', '1523358968', '1');
INSERT INTO `aac_audit` VALUES ('110', '1523360564', '1');
INSERT INTO `aac_audit` VALUES ('111', '1523361461', '1');
INSERT INTO `aac_audit` VALUES ('112', '1523361692', '1');
INSERT INTO `aac_audit` VALUES ('113', '1523361881', '1');
INSERT INTO `aac_audit` VALUES ('114', '1523362089', '1');
INSERT INTO `aac_audit` VALUES ('115', '1523362306', '1');
INSERT INTO `aac_audit` VALUES ('116', '1523362367', '1');
INSERT INTO `aac_audit` VALUES ('117', '1523362583', '1');
INSERT INTO `aac_audit` VALUES ('118', '1523362733', '1');
INSERT INTO `aac_audit` VALUES ('119', '1523362802', '1');
INSERT INTO `aac_audit` VALUES ('120', '1523362878', '1');
INSERT INTO `aac_audit` VALUES ('121', '1523363219', '1');
INSERT INTO `aac_audit` VALUES ('122', '1523363373', '1');
INSERT INTO `aac_audit` VALUES ('123', '1523363451', '1');
INSERT INTO `aac_audit` VALUES ('124', '1523363527', '1');
INSERT INTO `aac_audit` VALUES ('125', '1523363606', '1');
INSERT INTO `aac_audit` VALUES ('126', '1523363726', '1');
INSERT INTO `aac_audit` VALUES ('127', '1523363832', '1');
INSERT INTO `aac_audit` VALUES ('128', '1523364369', '1');
INSERT INTO `aac_audit` VALUES ('129', '1523364506', '1');
INSERT INTO `aac_audit` VALUES ('130', '1523364576', '1');
INSERT INTO `aac_audit` VALUES ('131', '1523364726', '1');
INSERT INTO `aac_audit` VALUES ('132', '1523364847', '1');
INSERT INTO `aac_audit` VALUES ('133', '1523364939', '1');
INSERT INTO `aac_audit` VALUES ('134', '1523365091', '1');
INSERT INTO `aac_audit` VALUES ('135', '1523365149', '1');
INSERT INTO `aac_audit` VALUES ('136', '1523365305', '1');
INSERT INTO `aac_audit` VALUES ('137', '1523365766', '1');
INSERT INTO `aac_audit` VALUES ('138', '1523365825', '1');
INSERT INTO `aac_audit` VALUES ('139', '1523365936', '1');
INSERT INTO `aac_audit` VALUES ('140', '1523372074', '1');
INSERT INTO `aac_audit` VALUES ('141', '1523372167', '1');
INSERT INTO `aac_audit` VALUES ('142', '1523372223', '1');
INSERT INTO `aac_audit` VALUES ('143', '1523372496', '1');
INSERT INTO `aac_audit` VALUES ('144', '1523413908', '1');
INSERT INTO `aac_audit` VALUES ('145', '1523415051', '1');
INSERT INTO `aac_audit` VALUES ('146', '1523427487', '1');
INSERT INTO `aac_audit` VALUES ('147', '1523427647', '1');
INSERT INTO `aac_audit` VALUES ('148', '1523436512', '1');
INSERT INTO `aac_audit` VALUES ('149', '1523513017', '1');
INSERT INTO `aac_audit` VALUES ('150', '1523611970', '1');
INSERT INTO `aac_audit` VALUES ('151', '1523612940', '1');
INSERT INTO `aac_audit` VALUES ('152', '1523967222', '1');
INSERT INTO `aac_audit` VALUES ('153', '1523967425', '1');
INSERT INTO `aac_audit` VALUES ('154', '1523967450', '1');
INSERT INTO `aac_audit` VALUES ('155', '1523967528', '1');
INSERT INTO `aac_audit` VALUES ('156', '1523967659', '1');
INSERT INTO `aac_audit` VALUES ('157', '1523967786', '1');
INSERT INTO `aac_audit` VALUES ('158', '1523967860', '1');
INSERT INTO `aac_audit` VALUES ('159', '1523968584', '1');
INSERT INTO `aac_audit` VALUES ('160', '1523968763', '1');
INSERT INTO `aac_audit` VALUES ('161', '1523968815', '1');
INSERT INTO `aac_audit` VALUES ('162', '1523970390', '1');
INSERT INTO `aac_audit` VALUES ('163', '1524053454', '1');
INSERT INTO `aac_audit` VALUES ('164', '1524053602', '1');
INSERT INTO `aac_audit` VALUES ('165', '1524053612', '1');
INSERT INTO `aac_audit` VALUES ('166', '1524121071', '1');
INSERT INTO `aac_audit` VALUES ('167', '1524121959', '1');
INSERT INTO `aac_audit` VALUES ('168', '1524123422', '1');
INSERT INTO `aac_audit` VALUES ('169', '1524123499', '1');
INSERT INTO `aac_audit` VALUES ('170', '1524123525', '1');
INSERT INTO `aac_audit` VALUES ('171', '1524123738', '1');
INSERT INTO `aac_audit` VALUES ('172', '1524125371', '1');
INSERT INTO `aac_audit` VALUES ('173', '1524127552', '1');
INSERT INTO `aac_audit` VALUES ('174', '1524127605', '1');
INSERT INTO `aac_audit` VALUES ('175', '1524127753', '1');
INSERT INTO `aac_audit` VALUES ('176', '1524127790', '1');
INSERT INTO `aac_audit` VALUES ('177', '1524127903', '1');
INSERT INTO `aac_audit` VALUES ('178', '1524127922', '1');
INSERT INTO `aac_audit` VALUES ('179', '1524128007', '1');
INSERT INTO `aac_audit` VALUES ('180', '1524128881', '1');
INSERT INTO `aac_audit` VALUES ('181', '1524129191', '1');
INSERT INTO `aac_audit` VALUES ('182', '1524129802', '1');
INSERT INTO `aac_audit` VALUES ('183', '1524129868', '1');
INSERT INTO `aac_audit` VALUES ('184', '1524130400', '1');
INSERT INTO `aac_audit` VALUES ('185', '1524130716', '1');
INSERT INTO `aac_audit` VALUES ('186', '1524130731', '1');
INSERT INTO `aac_audit` VALUES ('187', '1524130826', '1');
INSERT INTO `aac_audit` VALUES ('188', '1524130872', '1');
INSERT INTO `aac_audit` VALUES ('189', '1524131366', '1');
INSERT INTO `aac_audit` VALUES ('190', '1524133448', '1');
INSERT INTO `aac_audit` VALUES ('191', '1524133533', '1');
INSERT INTO `aac_audit` VALUES ('192', '1524133623', '1');
INSERT INTO `aac_audit` VALUES ('193', '1524133715', '1');
INSERT INTO `aac_audit` VALUES ('194', '1524133748', '1');
INSERT INTO `aac_audit` VALUES ('195', '1524133761', '1');
INSERT INTO `aac_audit` VALUES ('196', '1524134233', '1');
INSERT INTO `aac_audit` VALUES ('197', '1524134629', '1');
INSERT INTO `aac_audit` VALUES ('198', '1524135014', '1');
INSERT INTO `aac_audit` VALUES ('199', '1524135151', '1');
INSERT INTO `aac_audit` VALUES ('200', '1524135199', '1');
INSERT INTO `aac_audit` VALUES ('201', '1524207862', '1');
INSERT INTO `aac_audit` VALUES ('202', '1524207874', '1');
INSERT INTO `aac_audit` VALUES ('203', '1524207878', '1');
INSERT INTO `aac_audit` VALUES ('204', '1524207881', '1');
INSERT INTO `aac_audit` VALUES ('205', '1524207884', '1');
INSERT INTO `aac_audit` VALUES ('206', '1524207890', '1');
INSERT INTO `aac_audit` VALUES ('207', '1524207893', '1');
INSERT INTO `aac_audit` VALUES ('208', '1524207895', '1');
INSERT INTO `aac_audit` VALUES ('209', '1524207897', '1');
INSERT INTO `aac_audit` VALUES ('210', '1524207899', '1');
INSERT INTO `aac_audit` VALUES ('211', '1524207901', '1');
INSERT INTO `aac_audit` VALUES ('212', '1524207903', '1');
INSERT INTO `aac_audit` VALUES ('213', '1524207906', '1');
INSERT INTO `aac_audit` VALUES ('214', '1524207909', '1');
INSERT INTO `aac_audit` VALUES ('215', '1524207912', '1');
INSERT INTO `aac_audit` VALUES ('216', '1524207915', '1');
INSERT INTO `aac_audit` VALUES ('217', '1524211824', '1');
INSERT INTO `aac_audit` VALUES ('218', '1524211832', '1');
INSERT INTO `aac_audit` VALUES ('219', '1524211835', '1');
INSERT INTO `aac_audit` VALUES ('220', '1524211845', '1');
INSERT INTO `aac_audit` VALUES ('221', '1524211847', '1');
INSERT INTO `aac_audit` VALUES ('222', '1524211850', '1');
INSERT INTO `aac_audit` VALUES ('223', '1524211853', '1');
INSERT INTO `aac_audit` VALUES ('224', '1524211856', '1');
INSERT INTO `aac_audit` VALUES ('225', '1524211858', '1');
INSERT INTO `aac_audit` VALUES ('226', '1524211860', '1');
INSERT INTO `aac_audit` VALUES ('227', '1524212868', '1');
INSERT INTO `aac_audit` VALUES ('228', '1524212876', '1');
INSERT INTO `aac_audit` VALUES ('229', '1524212883', '1');
INSERT INTO `aac_audit` VALUES ('230', '1524212888', '1');
INSERT INTO `aac_audit` VALUES ('231', '1524212893', '1');
INSERT INTO `aac_audit` VALUES ('232', '1524212898', '1');
INSERT INTO `aac_audit` VALUES ('233', '1524212902', '1');
INSERT INTO `aac_audit` VALUES ('234', '1524212907', '1');
INSERT INTO `aac_audit` VALUES ('235', '1524212912', '1');
INSERT INTO `aac_audit` VALUES ('236', '1524212918', '1');
INSERT INTO `aac_audit` VALUES ('237', '1524212922', '1');
INSERT INTO `aac_audit` VALUES ('238', '1524212926', '1');
INSERT INTO `aac_audit` VALUES ('239', '1524212930', '1');
INSERT INTO `aac_audit` VALUES ('240', '1524212937', '1');
INSERT INTO `aac_audit` VALUES ('241', '1524212942', '1');
INSERT INTO `aac_audit` VALUES ('242', '1524212947', '1');
INSERT INTO `aac_audit` VALUES ('243', '1524212951', '1');
INSERT INTO `aac_audit` VALUES ('244', '1524212962', '1');
INSERT INTO `aac_audit` VALUES ('245', '1524212967', '1');
INSERT INTO `aac_audit` VALUES ('246', '1524212971', '1');
INSERT INTO `aac_audit` VALUES ('247', '1524212975', '1');
INSERT INTO `aac_audit` VALUES ('248', '1524212978', '1');
INSERT INTO `aac_audit` VALUES ('249', '1524214516', '1');
INSERT INTO `aac_audit` VALUES ('250', '1524219062', '1');
INSERT INTO `aac_audit` VALUES ('251', '1524473652', '1');
INSERT INTO `aac_audit` VALUES ('252', '1524473707', '1');
INSERT INTO `aac_audit` VALUES ('253', '1524473752', '1');
INSERT INTO `aac_audit` VALUES ('254', '1524474083', '1');
INSERT INTO `aac_audit` VALUES ('255', '1524474165', '1');
INSERT INTO `aac_audit` VALUES ('256', '1524474789', '1');
INSERT INTO `aac_audit` VALUES ('257', '1524474920', '1');
INSERT INTO `aac_audit` VALUES ('258', '1524475072', '1');
INSERT INTO `aac_audit` VALUES ('259', '1524475099', '1');
INSERT INTO `aac_audit` VALUES ('260', '1524475147', '1');
INSERT INTO `aac_audit` VALUES ('261', '1524476462', '1');
INSERT INTO `aac_audit` VALUES ('262', '1524477846', '1');
INSERT INTO `aac_audit` VALUES ('263', '1524480008', '1');
INSERT INTO `aac_audit` VALUES ('264', '1524480383', '1');
INSERT INTO `aac_audit` VALUES ('265', '1524480494', '1');
INSERT INTO `aac_audit` VALUES ('266', '1524481232', '1');
INSERT INTO `aac_audit` VALUES ('267', '1524482097', '1');
INSERT INTO `aac_audit` VALUES ('268', '1524482600', '1');
INSERT INTO `aac_audit` VALUES ('269', '1524483851', '1');
INSERT INTO `aac_audit` VALUES ('270', '1524484154', '1');
INSERT INTO `aac_audit` VALUES ('271', '1524644404', '1');
INSERT INTO `aac_audit` VALUES ('272', '1524646518', '1');
INSERT INTO `aac_audit` VALUES ('273', '1524646672', '1');
INSERT INTO `aac_audit` VALUES ('274', '1524649342', '1');
INSERT INTO `aac_audit` VALUES ('275', '1524649477', '1');
INSERT INTO `aac_audit` VALUES ('276', '1524649882', '1');
INSERT INTO `aac_audit` VALUES ('277', '1524650025', '1');
INSERT INTO `aac_audit` VALUES ('278', '1524657515', '1');
INSERT INTO `aac_audit` VALUES ('279', '1524657808', '1');
INSERT INTO `aac_audit` VALUES ('280', '1524657978', '1');
INSERT INTO `aac_audit` VALUES ('281', '1524658119', '1');
INSERT INTO `aac_audit` VALUES ('282', '1524808566', '1');
INSERT INTO `aac_audit` VALUES ('283', '1524808771', '1');
INSERT INTO `aac_audit` VALUES ('284', '1524810232', '1');
INSERT INTO `aac_audit` VALUES ('285', '1525450868', '1');
INSERT INTO `aac_audit` VALUES ('286', '1525451150', '1');
INSERT INTO `aac_audit` VALUES ('287', '1525451184', '1');
INSERT INTO `aac_audit` VALUES ('288', '1525451232', '1');
INSERT INTO `aac_audit` VALUES ('289', '1525452215', '1');

-- ----------------------------
-- Table structure for `aac_integral_log`
-- ----------------------------
DROP TABLE IF EXISTS `aac_integral_log`;
CREATE TABLE `aac_integral_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `act` varchar(100) NOT NULL COMMENT '操作动作',
  `mac` varchar(255) DEFAULT NULL,
  `current` varchar(100) DEFAULT NULL COMMENT '操作人',
  `wtype` varchar(100) NOT NULL COMMENT '操作类型',
  `userid` int(10) NOT NULL DEFAULT '0' COMMENT '用户id',
  `msg_id` int(10) NOT NULL DEFAULT '0' COMMENT '消息编号',
  `c_time` datetime DEFAULT NULL COMMENT '创建时间',
  `zhtitle` text,
  `zhinfo` text NOT NULL COMMENT '描述',
  `entitle` text,
  `eninfo` text NOT NULL,
  `katitle` text,
  `kainfo` text NOT NULL,
  `jetitle` text,
  `jeinfo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `act` (`act`) USING BTREE,
  KEY `mac` (`mac`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_integral_log
-- ----------------------------
INSERT INTO `aac_integral_log` VALUES ('2', '消息公告', null, 'admin', '5', '0', '0', '2018-04-27 14:23:52', 'Acute Angle客户端维护完成', '<p>因系统扩容需要，Acute Angle客户端于北京时间15:00开始停机维护。目前维护已完成，可前往官网www.acuteanlge.com下载最新版本即可正常使用，感谢您的理解与支持。<br></p>', 'Acute Angle客户端维护完成', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; background-color: rgb(249, 251, 252);\">Due to the need of system expansion, the client of the Acute Angle will stop maintenance at 15:00 Beijing time. The current maintenance has been completed, and the latest version can be downloaded at www.acuteanlge.com. Thank you for your understanding and support.</span><br></p>', 'Acute Angle 고객이 보호 하여 완성하다', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; background-color: rgb(249, 251, 252);\">시스템 확장에 필요 해, Acute Angle 바이어들은 베이징 시간 15:00부터 정비하고 있다.지금은 이미 완성 되었으며, 홈페이지 (www. acuteanlgee.com)를 통해 최신 버전을 다운로드하면 정상적으로 사용 되고, 당신의 이해와 지지에 감사 합니다.</span><br></p>', 'クライアントのメンテナンス完了です。', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">システムの拡大に必要とされており、acuteのクライアントは北京时间15:00に停止しています。现在、メンテナンス终了しており、公式サイトのwww.acuteanlge.comに行って最新バージョンをダウンロードすることができます。ご理解とご支持に感谢します。</span><br></p>');
INSERT INTO `aac_integral_log` VALUES ('6', '提现驳回', '84:39:BE:66:E2:3B', 'admin', '2', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请被驳回<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application was rejected.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 기각 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('7', '提现通过', '84:39:BE:66:E2:3B', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('8', '提现通过', '84:39:BE:66:E2:3B', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('9', '提现通过', '', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('10', '提现通过', '', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('11', '提现通过', '', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('20', '提现通过', '84:39:BE:66:E2:3B', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('21', '提现通过', '84:39:BE:66:E2:3B', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('22', '提现驳回', '84:39:BE:66:E2:3B', 'admin', '3', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请被驳回<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application was rejected.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 기각 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('23', '提现通过', '84:39:BE:66:E2:3B', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('24', '提现驳回', '84:39:BE:66:E2:3B', 'admin', '3', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请被驳回<br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application was rejected.</span><br></p>', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 기각 되었습니다.</span><br></p>', null, '');
INSERT INTO `aac_integral_log` VALUES ('25', '提现通过', '84:39:BE:66:E2:3B', 'admin', '1', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请已通过<br></p><br/>交易哈希 ：9iBOTu36TbSKB76PWn5UbcqZRZfVoGwKfp4cWvYWNxM3OAkF3xqjVASKSTLvCtZXtN', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p><br/>交易哈希 ：9iBOTu36TbSKB76PWn5UbcqZRZfVoGwKfp4cWvYWNxM3OAkF3xqjVASKSTLvCtZXtN', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p><br/>交易哈希 ：9iBOTu36TbSKB76PWn5UbcqZRZfVoGwKfp4cWvYWNxM3OAkF3xqjVASKSTLvCtZXtN', null, '');
INSERT INTO `aac_integral_log` VALUES ('26', '提现驳回', '84:39:BE:66:E2:3B', 'admin', '3', '0', '0', '0000-00-00 00:00:00', null, '<p>您的申请被驳回<br></p><br/>交易哈希 ：', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application was rejected.</span><br></p><br/>交易哈希 ：', null, '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 기각 되었습니다.</span><br></p><br/>交易哈希 ：', null, '');
INSERT INTO `aac_integral_log` VALUES ('27', '提现通过', '', 'admin', '1', '0', '0', '0000-00-00 00:00:00', '您的申请已通过', '<p>您的申请已通过<br></p><br/>交易哈希 ：IHy3UbOF6IGAtsI9uaeKhiDaypwBIL1UedZ8NfHSdiNMYUcc8VIoSXgtmEZlg2Kt0B', 'Your application has been approved.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p><br/>交易哈希 ：IHy3UbOF6IGAtsI9uaeKhiDaypwBIL1UedZ8NfHSdiNMYUcc8VIoSXgtmEZlg2Kt0B', 'Your application has been approved.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p><br/>交易哈希 ：IHy3UbOF6IGAtsI9uaeKhiDaypwBIL1UedZ8NfHSdiNMYUcc8VIoSXgtmEZlg2Kt0B', null, '');
INSERT INTO `aac_integral_log` VALUES ('28', '提现驳回', '', 'admin', '3', '0', '0', '0000-00-00 00:00:00', '您的申请被驳回', '<p>您的申请被驳回<br></p><br/>交易哈希 ：', 'Your application was rejected.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application was rejected.</span><br></p><br/>交易哈希 ：', 'Your application was rejected.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 기각 되었습니다.</span><br></p><br/>交易哈希 ：', null, '');
INSERT INTO `aac_integral_log` VALUES ('29', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 11:01:06', '您的申请已通过', '<p>您的申请已通过<br></p><br/>交易哈希 ：hJuHIqA3dSlgN8a2kZis6imTIeTxeIUgFzBYXiuAC5ONfgeYK6JstiECTfX8itPxY4', 'Your application has been approved.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p><br/>交易哈希 ：hJuHIqA3dSlgN8a2kZis6imTIeTxeIUgFzBYXiuAC5ONfgeYK6JstiECTfX8itPxY4', '당신의 신청은 이미 통과 되었습니다.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p><br/>交易哈希 ：hJuHIqA3dSlgN8a2kZis6imTIeTxeIUgFzBYXiuAC5ONfgeYK6JstiECTfX8itPxY4', null, '');
INSERT INTO `aac_integral_log` VALUES ('30', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 14:49:08', '您的申请被驳回', '<p>您的申请被驳回<br></p><br/>交易哈希 ：', 'Your application was rejected.', '<p><span style=\'color: rgb(95, 98, 102); font-family: Arial, \"Microsoft YaHei\", 微软雅黑, 宋体, \"Malgun Gothic\", Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\'>Your application was rejected.</span><br></p><br/>交易哈希 ：', '당신의 신청은 기각 되었습니다.', '<p><span style=\'color: rgb(95, 98, 102); font-family: Arial, \"Microsoft YaHei\", 微软雅黑, 宋体, \"Malgun Gothic\", Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\'>당신의 신청은 기각 되었습니다.</span><br></p><br/>交易哈希 ：', null, '');
INSERT INTO `aac_integral_log` VALUES ('31', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 14:52:18', '您的申请已通过', '<p>您的申请已通过<br></p><br/>交易哈希 ：0x04ef72b0d090e6c2295037eacd1c56a15c6d6aa61a2d991d9035e119da1f97c1', 'Your application has been approved.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p><br/>交易哈希 ：0x04ef72b0d090e6c2295037eacd1c56a15c6d6aa61a2d991d9035e119da1f97c1', '당신의 신청은 이미 통과 되었습니다.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p><br/>交易哈希 ：0x04ef72b0d090e6c2295037eacd1c56a15c6d6aa61a2d991d9035e119da1f97c1', null, '');
INSERT INTO `aac_integral_log` VALUES ('32', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 15:34:03', '您的申请已通过', '<p>您的申请已通过<br></p><br/>交易哈希 ：YJVolpLaL3F9Z78aRdPiTUvhf7SooHJOJ5XygR6coe2myNVnzCFC3HHpEOmWCEwWmI', 'Your application has been approved.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">Your application has been approved.</span><br></p><br/>交易哈希 ：YJVolpLaL3F9Z78aRdPiTUvhf7SooHJOJ5XygR6coe2myNVnzCFC3HHpEOmWCEwWmI', '당신의 신청은 이미 통과 되었습니다.', '<p><span style=\"color: rgb(95, 98, 102); font-family: Arial, &quot;Microsoft YaHei&quot;, 微软雅黑, 宋体, &quot;Malgun Gothic&quot;, Meiryo, sans-serif; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 19px; background-color: rgb(249, 251, 252);\">당신의 신청은 이미 통과 되었습니다.</span><br></p><br/>交易哈希 ：YJVolpLaL3F9Z78aRdPiTUvhf7SooHJOJ5XygR6coe2myNVnzCFC3HHpEOmWCEwWmI', null, '');
INSERT INTO `aac_integral_log` VALUES ('33', '提现通过', '84:39:BE:66:E2:3B', 'admin', '1', '0', '0', '2018-05-04 15:44:19', '您的申请已通过', 'PHA+5oKo55qE55Sz6K+35bey6YCa6L+HPGJyPjwvcD7kuqTmmJPlk4jluIwg77yaWUpWb2xwTGFMM0Y5Wjc4YVJkUGlUVXZoZjdTb29ISk9KNVh5Z1I2Y29lMm15TlZuekNGQzNISHBFT21XQ0V3V21J', 'Your application has been approved.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPllvdXIgYXBwbGljYXRpb24gaGFzIGJlZW4gYXBwcm92ZWQuPC9zcGFuPjxicj48L3A+5Lqk5piT5ZOI5biMIO+8mllKVm9scExhTDNGOVo3OGFSZFBpVFV2aGY3U29vSEpPSjVYeWdSNmNvZTJteU5WbnpDRkMzSEhwRU9tV0NFd1dtSQ==', '당신의 신청은 이미 통과 되었습니다.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuuLueyLoOydmCDsi6Dssq3snYAg7J2066+4IO2GteqzvCDrkJjsl4jsirXri4jri6QuPC9zcGFuPjxicj48L3A+5Lqk5piT5ZOI5biMIO+8mllKVm9scExhTDNGOVo3OGFSZFBpVFV2aGY3U29vSEpPSjVYeWdSNmNvZTJteU5WbnpDRkMzSEhwRU9tV0NFd1dtSQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('34', '提现驳回', '84:39:BE:66:E2:3B', 'admin', '3', '0', '0', '2018-05-04 15:44:41', '您的申请被驳回', 'PHA+5oKo55qE55Sz6K+36KKr6amz5ZuePGJyPjwvcD4=', 'Your application was rejected.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPllvdXIgYXBwbGljYXRpb24gd2FzIHJlamVjdGVkLjwvc3Bhbj48YnI+PC9wPg==', '당신의 신청은 기각 되었습니다.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuuLueyLoOydmCDsi6Dssq3snYAg6riw6rCBIOuQmOyXiOyKteuLiOuLpC48L3NwYW4+PGJyPjwvcD4=', null, '');
INSERT INTO `aac_integral_log` VALUES ('35', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 16:58:27', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejVaYjNWeUlHRndjR3hwWTJGMGFXOXVJSGRoY3lCeVpXcGxZM1JsWkM0OEwzTndZVzQrUEdKeVBqd3ZjRDQ9', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejdyaTduc2k2RHNuWmdnN0l1ZzdMS3Q3SjJBSU9xNHNPcXdnU0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKw==', null, '');
INSERT INTO `aac_integral_log` VALUES ('36', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 16:58:41', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejVaYjNWeUlHRndjR3hwWTJGMGFXOXVJSGRoY3lCeVpXcGxZM1JsWkM0OEwzTndZVzQrUEdKeVBqd3ZjRDQ9', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejdyaTduc2k2RHNuWmdnN0l1ZzdMS3Q3SjJBSU9xNHNPcXdnU0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKw==', null, '');
INSERT INTO `aac_integral_log` VALUES ('37', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 16:58:49', '您的申请被驳回', 'UEhBK1BHSnlQand2Y0Q0PQ==', 'Your application was rejected.', 'UEhBK1BHSnlQand2Y0Q0PQ==', '당신의 신청은 기각 되었습니다.', 'UEhBK1BHSnlQand2Y0Q0PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('38', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 16:58:57', '您的申请被驳回', 'UEhBK1BHSnlQand2Y0Q0PQ==', 'Your application was rejected.', 'UEhBK1BHSnlQand2Y0Q0PQ==', '당신의 신청은 기각 되었습니다.', 'UEhBK1BHSnlQand2Y0Q0PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('39', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 16:59:06', '您的申请被驳回', 'UEhBK1BHSnlQand2Y0Q0PQ==', 'Your application was rejected.', 'UEhBK1BHSnlQand2Y0Q0PQ==', '당신의 신청은 기각 되었습니다.', 'UEhBK1BHSnlQand2Y0Q0PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('40', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 18:06:01', '您的申请已通过', 'UEhBKzVvS281NXFFNTVTejZLKzM1YmV5NllDYTZMK0hQR0p5UGp3dmNEN2t1cVRtbUpQbGs0amx1SXdnNzd5YU1IZzBOamt3TWpKaFpUTTJOVFptT0dNM1pEUm1ZV1E1TVRBeE1EQmpNamhpWWpZek5EWTVOR013TWpVeE9XSXhaR05oTldNNU5qTXpPVGcxT0dFeVpUUmw=', 'Your application has been approved.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUGxsdmRYSWdZWEJ3YkdsallYUnBiMjRnYUdGeklHSmxaVzRnWVhCd2NtOTJaV1F1UEM5emNHRnVQanhpY2o0OEwzQSs1THFrNXBpVDVaT0k1YmlNSU8rOG1qQjRORFk1TURJeVlXVXpOalUyWmpoak4yUTBabUZrT1RFd01UQXdZekk0WW1JMk16UTJPVFJqTURJMU1UbGlNV1JqWVRWak9UWXpNems0TlRoaE1tVTBaUT09', '당신의 신청은 이미 통과 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUHV1THVleUxvT3lkbUNEc2k2RHNzcTNzbllBZzdKMjA2Nis0SU8yR3RlcXp2Q0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKzVMcWs1cGlUNVpPSTViaU1JTys4bWpCNE5EWTVNREl5WVdVek5qVTJaamhqTjJRMFptRmtPVEV3TVRBd1l6STRZbUkyTXpRMk9UUmpNREkxTVRsaU1XUmpZVFZqT1RZek16azROVGhoTW1VMFpRPT0=', null, '');
INSERT INTO `aac_integral_log` VALUES ('66', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 18:22:52', '您的申请已通过', 'UEhBKzVvS281NXFFNTVTejZLKzM1YmV5NllDYTZMK0hQR0p5UGp3dmNEN2t1cVRtbUpQbGs0amx1SXdnNzd5YU1IZzJOakV4TWpaaVpHSTFaV1V3WWpnMVltUTROakE1WWpkbU1EYzJORGs1TVRabFptVmhaRGd5TURBMU9UY3dOR1JsTjJVME9HWmxZV016T0RZMU5qRTE=', 'Your application has been approved.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUGxsdmRYSWdZWEJ3YkdsallYUnBiMjRnYUdGeklHSmxaVzRnWVhCd2NtOTJaV1F1UEM5emNHRnVQanhpY2o0OEwzQSs1THFrNXBpVDVaT0k1YmlNSU8rOG1qQjROall4TVRJMlltUmlOV1ZsTUdJNE5XSmtPRFl3T1dJM1pqQTNOalE1T1RFMlpXWmxZV1E0TWpBd05UazNNRFJrWlRkbE5EaG1aV0ZqTXpnMk5UWXhOUT09', '당신의 신청은 이미 통과 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUHV1THVleUxvT3lkbUNEc2k2RHNzcTNzbllBZzdKMjA2Nis0SU8yR3RlcXp2Q0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKzVMcWs1cGlUNVpPSTViaU1JTys4bWpCNE5qWXhNVEkyWW1SaU5XVmxNR0k0TldKa09EWXdPV0kzWmpBM05qUTVPVEUyWldabFlXUTRNakF3TlRrM01EUmtaVGRsTkRobVpXRmpNemcyTlRZeE5RPT0=', null, '');
INSERT INTO `aac_integral_log` VALUES ('67', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 18:23:01', '您的申请已通过', 'UEhBKzVvS281NXFFNTVTejZLKzM1YmV5NllDYTZMK0hQR0p5UGp3dmNEN2t1cVRtbUpQbGs0amx1SXdnNzd5YU1IaGtPR05pTXpJM1lUVTVaamRsT1daallUY3dOREpsTjJFeVpUTmxNRFpqTkRRMk1USXlNalF6TUdVMVlUQTFZelE1TjJGa09EZzNaRGhrWTJNelpqYzU=', 'Your application has been approved.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUGxsdmRYSWdZWEJ3YkdsallYUnBiMjRnYUdGeklHSmxaVzRnWVhCd2NtOTJaV1F1UEM5emNHRnVQanhpY2o0OEwzQSs1THFrNXBpVDVaT0k1YmlNSU8rOG1qQjRaRGhqWWpNeU4yRTFPV1kzWlRsbVkyRTNNRFF5WlRkaE1tVXpaVEEyWXpRME5qRXlNakkwTXpCbE5XRXdOV00wT1RkaFpEZzROMlE0WkdOak0yWTNPUT09', '당신의 신청은 이미 통과 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUHV1THVleUxvT3lkbUNEc2k2RHNzcTNzbllBZzdKMjA2Nis0SU8yR3RlcXp2Q0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKzVMcWs1cGlUNVpPSTViaU1JTys4bWpCNFpEaGpZak15TjJFMU9XWTNaVGxtWTJFM01EUXlaVGRoTW1VelpUQTJZelEwTmpFeU1qSTBNekJsTldFd05XTTBPVGRoWkRnNE4yUTRaR05qTTJZM09RPT0=', null, '');
INSERT INTO `aac_integral_log` VALUES ('68', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 18:23:14', '您的申请已通过', 'UEhBKzVvS281NXFFNTVTejZLKzM1YmV5NllDYTZMK0hQR0p5UGp3dmNEN2t1cVRtbUpQbGs0amx1SXdnNzd5YU1IZ3pOR0V3Tm1RNE5qTTFZelZpTURZME1UTTFPR0UzTVRNek1UYzFOMk5sTkRRMVpEQTFZbUZoWWpJMk4yTXdPR1JtWVdOaE5qVTBNR05tTVdGa016QXk=', 'Your application has been approved.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUGxsdmRYSWdZWEJ3YkdsallYUnBiMjRnYUdGeklHSmxaVzRnWVhCd2NtOTJaV1F1UEM5emNHRnVQanhpY2o0OEwzQSs1THFrNXBpVDVaT0k1YmlNSU8rOG1qQjRNelJoTURaa09EWXpOV00xWWpBMk5ERXpOVGhoTnpFek16RTNOVGRqWlRRME5XUXdOV0poWVdJeU5qZGpNRGhrWm1GallUWTFOREJqWmpGaFpETXdNZz09', '당신의 신청은 이미 통과 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUHV1THVleUxvT3lkbUNEc2k2RHNzcTNzbllBZzdKMjA2Nis0SU8yR3RlcXp2Q0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKzVMcWs1cGlUNVpPSTViaU1JTys4bWpCNE16UmhNRFprT0RZek5XTTFZakEyTkRFek5UaGhOekV6TXpFM05UZGpaVFEwTldRd05XSmhZV0l5Tmpkak1EaGtabUZqWVRZMU5EQmpaakZoWkRNd01nPT0=', null, '');
INSERT INTO `aac_integral_log` VALUES ('69', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 19:23:45', '您的申请已通过', 'UEhBKzVvS281NXFFNTVTejZLKzM1YmV5NllDYTZMK0hQR0p5UGp3dmNEN2t1cVRtbUpQbGs0amx1SXdnNzd5YU1IZzNORGRqTldVMlpUQTFPR0l3TUdGaU1EbGxORE13TlROaE9EYzVNRFkzTmpRMk1UQTJaVFk0Tmpoa1pHUmlOREJrTldVd1kyUXhZMlUxTUdNd01HUXk=', 'Your application has been approved.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUGxsdmRYSWdZWEJ3YkdsallYUnBiMjRnYUdGeklHSmxaVzRnWVhCd2NtOTJaV1F1UEM5emNHRnVQanhpY2o0OEwzQSs1THFrNXBpVDVaT0k1YmlNSU8rOG1qQjROelEzWXpWbE5tVXdOVGhpTURCaFlqQTVaVFF6TURVellUZzNPVEEyTnpZME5qRXdObVUyT0RZNFpHUmtZalF3WkRWbE1HTmtNV05sTlRCak1EQmtNZz09', '당신의 신청은 이미 통과 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUHV1THVleUxvT3lkbUNEc2k2RHNzcTNzbllBZzdKMjA2Nis0SU8yR3RlcXp2Q0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKzVMcWs1cGlUNVpPSTViaU1JTys4bWpCNE56UTNZelZsTm1Vd05UaGlNREJoWWpBNVpUUXpNRFV6WVRnM09UQTJOelkwTmpFd05tVTJPRFk0WkdSa1lqUXdaRFZsTUdOa01XTmxOVEJqTURCa01nPT0=', null, '');
INSERT INTO `aac_integral_log` VALUES ('70', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 20:17:19', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0T0dVMU1HSmxNelkzWTJRNU1EQXlaVGc0WldRMlpEVXpOV0psTjJRelpEVmhNMkpsWkRNeU1XWmhNelJoWVRCbVltVmxOR1poWVRCa04yUmxPVEpoTmc9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNE9HVTFNR0psTXpZM1kyUTVNREF5WlRnNFpXUTJaRFV6TldKbE4yUXpaRFZoTTJKbFpETXlNV1poTXpSaFlUQm1ZbVZsTkdaaFlUQmtOMlJsT1RKaE5nPT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0T0dVMU1HSmxNelkzWTJRNU1EQXlaVGc0WldRMlpEVXpOV0psTjJRelpEVmhNMkpsWkRNeU1XWmhNelJoWVRCbVltVmxOR1poWVRCa04yUmxPVEpoTmc9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('79', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 21:42:25', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejVaYjNWeUlHRndjR3hwWTJGMGFXOXVJSGRoY3lCeVpXcGxZM1JsWkM0OEwzTndZVzQrUEdKeVBqd3ZjRDQ9', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejdyaTduc2k2RHNuWmdnN0l1ZzdMS3Q3SjJBSU9xNHNPcXdnU0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKw==', null, '');
INSERT INTO `aac_integral_log` VALUES ('81', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 21:43:48', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejVaYjNWeUlHRndjR3hwWTJGMGFXOXVJSGRoY3lCeVpXcGxZM1JsWkM0OEwzTndZVzQrUEdKeVBqd3ZjRDQ9', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejdyaTduc2k2RHNuWmdnN0l1ZzdMS3Q3SjJBSU9xNHNPcXdnU0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKw==', null, '');
INSERT INTO `aac_integral_log` VALUES ('82', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 21:44:11', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejVaYjNWeUlHRndjR3hwWTJGMGFXOXVJSGRoY3lCeVpXcGxZM1JsWkM0OEwzTndZVzQrUEdKeVBqd3ZjRDQ9', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejdyaTduc2k2RHNuWmdnN0l1ZzdMS3Q3SjJBSU9xNHNPcXdnU0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKw==', null, '');
INSERT INTO `aac_integral_log` VALUES ('84', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 21:45:30', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejVaYjNWeUlHRndjR3hwWTJGMGFXOXVJSGRoY3lCeVpXcGxZM1JsWkM0OEwzTndZVzQrUEdKeVBqd3ZjRDQ9', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejdyaTduc2k2RHNuWmdnN0l1ZzdMS3Q3SjJBSU9xNHNPcXdnU0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKw==', null, '');
INSERT INTO `aac_integral_log` VALUES ('85', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 21:45:43', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0WWpjM05HUTJPV1kzTlRaa05ESTBZVEZqWkdRelkyTTFOREZpTkRKaE5EUmtNV001T0dSbU1qQXhZamczWVRRM09UWXpNMlF3Tmprd05qaGxOR1pqTlE9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNFlqYzNOR1EyT1dZM05UWmtOREkwWVRGalpHUXpZMk0xTkRGaU5ESmhORFJrTVdNNU9HUm1NakF4WWpnM1lUUTNPVFl6TTJRd05qa3dOamhsTkdaak5RPT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0WWpjM05HUTJPV1kzTlRaa05ESTBZVEZqWkdRelkyTTFOREZpTkRKaE5EUmtNV001T0dSbU1qQXhZamczWVRRM09UWXpNMlF3Tmprd05qaGxOR1pqTlE9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('86', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 21:46:40', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0T0RNd05tUTNPVEpoTURNMU5HTXpZbUV6TmpRMlkyVTFaV0ZqWW1NMU5qSmpaamxsTXpoaE16bGlZV0V3T1dabE1qQmtaalJrWmpGa09XSXlNekZoTlE9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNE9ETXdObVEzT1RKaE1ETTFOR016WW1Fek5qUTJZMlUxWldGalltTTFOakpqWmpsbE16aGhNemxpWVdFd09XWmxNakJrWmpSa1pqRmtPV0l5TXpGaE5RPT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0T0RNd05tUTNPVEpoTURNMU5HTXpZbUV6TmpRMlkyVTFaV0ZqWW1NMU5qSmpaamxsTXpoaE16bGlZV0V3T1dabE1qQmtaalJrWmpGa09XSXlNekZoTlE9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('87', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 21:46:52', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0WVRFeE16VmtZakkxT1RWak5qRmpOR001TUROaVpETTJNemt3TjJZM09UUmxPREppWXpGbU9UZzVabVppWlRGa1pURTJNRE0yTVRjM05URmxPRGxpTnc9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNFlURXhNelZrWWpJMU9UVmpOakZqTkdNNU1ETmlaRE0yTXprd04yWTNPVFJsT0RKaVl6Rm1PVGc1Wm1aaVpURmtaVEUyTURNMk1UYzNOVEZsT0RsaU53PT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0WVRFeE16VmtZakkxT1RWak5qRmpOR001TUROaVpETTJNemt3TjJZM09UUmxPREppWXpGbU9UZzVabVppWlRGa1pURTJNRE0yTVRjM05URmxPRGxpTnc9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('88', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 21:47:03', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0WXpCaFltSXdNV1pqTXpGaVlqWXpZalUzWmpGak56azVPVEkwWXpBNU9XTmxPVEZoWXpBeE16UTJOekkxTXprNFlqSTJOakl4T0dObU5tTXhOMkl6TVE9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNFl6QmhZbUl3TVdaak16RmlZall6WWpVM1pqRmpOems1T1RJMFl6QTVPV05sT1RGaFl6QXhNelEyTnpJMU16azRZakkyTmpJeE9HTm1ObU14TjJJek1RPT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0WXpCaFltSXdNV1pqTXpGaVlqWXpZalUzWmpGak56azVPVEkwWXpBNU9XTmxPVEZoWXpBeE16UTJOekkxTXprNFlqSTJOakl4T0dObU5tTXhOMkl6TVE9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('89', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-04 21:47:08', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejVaYjNWeUlHRndjR3hwWTJGMGFXOXVJSGRoY3lCeVpXcGxZM1JsWkM0OEwzTndZVzQrUEdKeVBqd3ZjRDQ9', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlKMk52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ0pOYVdOeWIzTnZablFnV1dGSVpXa2lMQ0RsdnE3b3ZhL3BtNFhwdTVFc0lPV3VpK1M5a3l3Z0lrMWhiR2QxYmlCSGIzUm9hV01pTENCTlpXbHllVzhzSUhOaGJuTXRjMlZ5YVdZN0lHWnZiblF0ZG1GeWFXRnVkQzF1ZFcxbGNtbGpPaUJ1YjNKdFlXdzdJR1p2Ym5RdGRtRnlhV0Z1ZEMxbFlYTjBMV0Z6YVdGdU9pQnViM0p0WVd3N0lHeHBibVV0YUdWcFoyaDBPaUF4T1hCNE95QmlZV05yWjNKdmRXNWtMV052Ykc5eU9pQnlaMklvTWpRNUxDQXlOVEVzSURJMU1pazdKejdyaTduc2k2RHNuWmdnN0l1ZzdMS3Q3SjJBSU9xNHNPcXdnU0Rya0pqc2w0anNpclhyaTRqcmk2UXVQQzl6Y0dGdVBqeGljajQ4TDNBKw==', null, '');
INSERT INTO `aac_integral_log` VALUES ('90', '提现通过', '', 'admin', '1', '0', '0', '2018-05-04 21:47:21', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0TnpJd1pqa3paalF6WWpGbE56VTNPVGd4TkdabVltVmhZbVl4WkdRNE9EWTRZVFptTWpOa056Y3lZV1ZpWmpJNE9HWmhOalZqTURGa00yWXlOakpqWWc9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNE56SXdaamt6WmpRellqRmxOelUzT1RneE5HWm1ZbVZoWW1ZeFpHUTRPRFk0WVRabU1qTmtOemN5WVdWaVpqSTRPR1poTmpWak1ERmtNMll5TmpKallnPT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0TnpJd1pqa3paalF6WWpGbE56VTNPVGd4TkdabVltVmhZbVl4WkdRNE9EWTRZVFptTWpOa056Y3lZV1ZpWmpJNE9HWmhOalZqTURGa00yWXlOakpqWWc9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('91', '消息公告', null, 'admin', '5', '0', '0', '2018-05-05 00:21:09', '【关于锐角云客户端1.0.16版本更新的说明】', '<p>锐角云客户端于5月5日更新1.0.16版本，本次更新主要增加以下功能：1.开启提现功能；2.在设置中增加绑定邮箱功能；3.增加提现验证功能：邮箱验证。您可前往锐角云官网下载新版客户端，感谢您的支持。</p>', '【关于锐角云客户端1.0.16版本更新的说明】', '<p>锐角云客户端于5月5日更新1.0.16版本，本次更新主要增加以下功能：1.开启提现功能；2.在设置中增加绑定邮箱功能；3.增加提现验证功能：邮箱验证。您可前往锐角云官网下载新版客户端，感谢您的支持。</p>', '【关于锐角云客户端1.0.16版本更新的说明】', '<p>锐角云客户端于5月5日更新1.0.16版本，本次更新主要增加以下功能：1.开启提现功能；2.在设置中增加绑定邮箱功能；3.增加提现验证功能：邮箱验证。您可前往锐角云官网下载新版客户端，感谢您的支持。</p>', '', '<p><br></p>');
INSERT INTO `aac_integral_log` VALUES ('92', '消息公告', null, 'admin', '5', '0', '0', '2018-05-05 00:43:36', '【关于锐角云客户端1.0.16版本更新的说明】', '<p>锐角云客户端于5月5日更新1.0.16版本，本次更新主要增加以下功能：1.开启提现功能；2.在设置中增加绑定邮箱功能；3.增加提现验证功能：邮箱验证。您可前往锐角云官网下载新版客户端，感谢您的支持。</p>', '【关于锐角云客户端1.0.16版本更新的说明】', '<p>锐角云客户端于5月5日更新1.0.16版本，本次更新主要增加以下功能：1.开启提现功能；2.在设置中增加绑定邮箱功能；3.增加提现验证功能：邮箱验证。您可前往锐角云官网下载新版客户端，感谢您的支持。</p>', '【关于锐角云客户端1.0.16版本更新的说明】', '<p>锐角云客户端于5月5日更新1.0.16版本，本次更新主要增加以下功能：1.开启提现功能；2.在设置中增加绑定邮箱功能；3.增加提现验证功能：邮箱验证。您可前往锐角云官网下载新版客户端，感谢您的支持。</p>', '', '<p><br></p>');
INSERT INTO `aac_integral_log` VALUES ('94', '提现驳回', '', 'admin', '3', '0', '0', '2018-05-05 01:42:30', '您的申请被驳回', 'UEhBKzVvS281NXFFNTVTejZLKzM2S0tyNmFtejVadWVQR0p5UGp3dmNEND0=', 'Your application was rejected.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUGxsdmRYSWdZWEJ3YkdsallYUnBiMjRnZDJGeklISmxhbVZqZEdWa0xqd3ZjM0JoYmo0OFluSStQQzl3UGc9PQ==', '당신의 신청은 기각 되었습니다.', 'UEhBK1BITndZVzRnYzNSNWJHVTlJbU52Ykc5eU9pQnlaMklvT1RVc0lEazRMQ0F4TURJcE95Qm1iMjUwTFdaaGJXbHNlVG9nUVhKcFlXd3NJQ1p4ZFc5ME8wMXBZM0p2YzI5bWRDQlpZVWhsYVNaeGRXOTBPeXdnNWI2dTZMMnY2WnVGNmJ1UkxDRGxyb3ZrdlpNc0lDWnhkVzkwTzAxaGJHZDFiaUJIYjNSb2FXTW1jWFZ2ZERzc0lFMWxhWEo1Ynl3Z2MyRnVjeTF6WlhKcFpqc2dabTl1ZEMxMllYSnBZVzUwTFc1MWJXVnlhV002SUc1dmNtMWhiRHNnWm05dWRDMTJZWEpwWVc1MExXVmhjM1F0WVhOcFlXNDZJRzV2Y20xaGJEc2diR2x1WlMxb1pXbG5hSFE2SURFNWNIZzdJR0poWTJ0bmNtOTFibVF0WTI5c2IzSTZJSEpuWWlneU5Ea3NJREkxTVN3Z01qVXlLVHNpUHV1THVleUxvT3lkbUNEc2k2RHNzcTNzbllBZzZyaXc2ckNCSU91UW1PeVhpT3lLdGV1TGlPdUxwQzQ4TDNOd1lXNCtQR0p5UGp3dmNEND0=', null, '');
INSERT INTO `aac_integral_log` VALUES ('95', '提现通过', '', 'admin', '1', '0', '0', '2018-05-05 01:53:17', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0TW1Jd09EbGlOVFJoT0Rka1lUVTVZakF4WWpOaE5HUXpPVFF3TnpNMlptSmxPREUyWVdJelpXSmpObU15TldFM01tWmlZVEZoTmpJMFpEZ3hZVFF3TlE9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNE1tSXdPRGxpTlRSaE9EZGtZVFU1WWpBeFlqTmhOR1F6T1RRd056TTJabUpsT0RFMllXSXpaV0pqTm1NeU5XRTNNbVppWVRGaE5qSTBaRGd4WVRRd05RPT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0TW1Jd09EbGlOVFJoT0Rka1lUVTVZakF4WWpOaE5HUXpPVFF3TnpNMlptSmxPREUyWVdJelpXSmpObU15TldFM01tWmlZVEZoTmpJMFpEZ3hZVFF3TlE9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('96', '提现通过', '', 'admin', '1', '0', '0', '2018-05-05 02:30:07', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0TjJaak9EazBZbU0zWkRoaFpUZzRNMlkyWVdKaE16QmhNV0ptWXprMFpURTNOamM1T1dZeE1XUTFNVGhsT0RBeE1qTTFOV1V4WWpjMk1tUTFOR1EzTXc9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNE4yWmpPRGswWW1NM1pEaGhaVGc0TTJZMllXSmhNekJoTVdKbVl6azBaVEUzTmpjNU9XWXhNV1ExTVRobE9EQXhNak0xTldVeFlqYzJNbVExTkdRM013PT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0TjJaak9EazBZbU0zWkRoaFpUZzRNMlkyWVdKaE16QmhNV0ptWXprMFpURTNOamM1T1dZeE1XUTFNVGhsT0RBeE1qTTFOV1V4WWpjMk1tUTFOR1EzTXc9PQ==', null, '');
INSERT INTO `aac_integral_log` VALUES ('97', '提现通过', '', 'admin', '1', '0', '0', '2018-05-05 02:30:17', '您的申请已通过', 'NUxxazVwaVQ1Wk9JNWJpTUlPKzhtakI0WW1GaE9XVTFaV0UwWkRBeE5qQXpNRFZrWVRVeFlUUTJOVFkyTmpNd1pUVTBNMlJoWWpjeFl6SXlOMk13TlRBME5tUm1Oell4TVRVMk5XTTRPREV4Tnc9PQ==', 'Your application has been approved.', 'ZEhKaGJuTmhZM1JwYjI1SVlYTm9JTys4bWpCNFltRmhPV1UxWldFMFpEQXhOakF6TURWa1lUVXhZVFEyTlRZMk5qTXdaVFUwTTJSaFlqY3hZekl5TjJNd05UQTBObVJtTnpZeE1UVTJOV000T0RFeE53PT0=', '당신의 신청은 이미 통과 되었습니다.', 'NnJHdzY1Nlk3WlcwN0l1Y0lPKzhtakI0WW1GaE9XVTFaV0UwWkRBeE5qQXpNRFZrWVRVeFlUUTJOVFkyTmpNd1pUVTBNMlJoWWpjeFl6SXlOMk13TlRBME5tUm1Oell4TVRVMk5XTTRPREV4Tnc9PQ==', null, '');

-- ----------------------------
-- Table structure for `aac_menu`
-- ----------------------------
DROP TABLE IF EXISTS `aac_menu`;
CREATE TABLE `aac_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(20) DEFAULT NULL COMMENT '名称（翻译）',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `url` varchar(100) DEFAULT NULL COMMENT '路径',
  `p_id` int(9) NOT NULL COMMENT '父id',
  `level` int(11) DEFAULT NULL COMMENT '显示等级',
  `c_time` bigint(12) DEFAULT NULL COMMENT '创建时间',
  `uid` int(11) DEFAULT NULL COMMENT '创建人',
  `role` int(11) DEFAULT '0' COMMENT '权限 0是用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_menu
-- ----------------------------
INSERT INTO `aac_menu` VALUES ('1', '主页', 'zmdi zmdi-home zmdi-hc-fw', '/admin/dashboard?menuid=1', '0', '0', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('2', '用户信息', null, '/admin/userinfo?menuid=2', '3', '1', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('3', '用户与权限管理', 'zmdi zmdi-accounts zmdi-hc-fw', '', '0', '3', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('4', '角色权限', null, '/admin/roleinfo?menuid=4', '3', '2', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('7', '奖励管理', 'glyphicon glyphicon-compressed', null, '0', '5', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('8', '用户管理', null, '/admin/walletuser?menuid=8', '7', '1', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('9', '提币审核', null, '/admin/walletverify?menuid=9', '7', '2', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('10', '提币查询', null, '/admin/walletfind?menuid=10', '7', '3', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('11', '操作日志', 'glyphicon glyphicon-book', '/admin/walletlog?menuid=11', '0', '3', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('12', '消息模板', null, '/admin/walletmsg?menuid=12', '7', '4', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('13', '版本管理', null, '/admin/version?menuid=13', '7', '5', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('14', '公告管理', null, '/admin/sendmsg?menuid=14', '7', '6', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('15', '全局设置', 'glyphicon glyphicon-wrench', '/admin/setting?menuid=15', '0', '2', null, '1', '9');
INSERT INTO `aac_menu` VALUES ('16', '栏目管理', 'glyphicon glyphicon-file', '/admin/catenav?menuid=16', '0', '1', null, '1', '9');

-- ----------------------------
-- Table structure for `aac_role`
-- ----------------------------
DROP TABLE IF EXISTS `aac_role`;
CREATE TABLE `aac_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(3) DEFAULT NULL COMMENT '角色类型 0 系统组 1运营',
  `custom` int(1) DEFAULT '0' COMMENT '自定义 ',
  `role_name` varchar(50) DEFAULT NULL,
  `permission` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_role
-- ----------------------------
INSERT INTO `aac_role` VALUES ('9', '1', '0', '超级管理员', 'a:12:{s:9:\"dashboard\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}s:7:\"setting\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:4:\"save\";i:3;s:7:\"getById\";}s:9:\"walletlog\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}s:8:\"userinfo\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:14:\"updateUserById\";i:4;s:7:\"getById\";i:5;s:6:\"delete\";}s:8:\"roleinfo\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:14:\"updateUserById\";i:4;s:7:\"getById\";i:5;s:6:\"delete\";}s:10:\"walletuser\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:10:\"updateById\";i:3;s:6:\"delete\";}s:12:\"walletverify\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:10:\"updateById\";i:4;s:5:\"excel\";}s:10:\"walletfind\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:5:\"excel\";}s:9:\"walletmsg\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:10:\"updateById\";i:4;s:7:\"getById\";i:5;s:6:\"delete\";}s:7:\"version\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:3:\"add\";i:4;s:6:\"delete\";}s:7:\"sendmsg\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:3:\"add\";i:4;s:6:\"delete\";}s:16:\"is_administortar\";s:1:\"1\";}');
INSERT INTO `aac_role` VALUES ('10', '1', '0', '普通管理员', 'a:12:{s:9:\"dashboard\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}s:7:\"setting\";a:3:{i:0;s:5:\"index\";i:1;s:4:\"save\";i:2;s:7:\"getById\";}s:9:\"walletlog\";a:1:{i:0;s:5:\"index\";}s:8:\"userinfo\";a:2:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";}s:8:\"roleinfo\";a:2:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";}s:10:\"walletuser\";a:1:{i:0;s:5:\"index\";}s:12:\"walletverify\";a:1:{i:0;s:5:\"index\";}s:10:\"walletfind\";a:1:{i:0;s:5:\"index\";}s:9:\"walletmsg\";a:1:{i:0;s:5:\"index\";}s:7:\"version\";a:1:{i:0;s:5:\"index\";}s:7:\"sendmsg\";a:1:{i:0;s:5:\"index\";}s:16:\"is_administortar\";s:1:\"1\";}');
INSERT INTO `aac_role` VALUES ('16', '1', '0', '技术部', 'a:7:{s:9:\"dashboard\";a:2:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";}s:7:\"setting\";a:2:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";}s:9:\"walletlog\";a:1:{i:0;s:5:\"index\";}s:10:\"walletuser\";a:2:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";}s:12:\"walletverify\";a:2:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";}s:10:\"walletfind\";a:2:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";}s:16:\"is_administortar\";s:1:\"1\";}');
INSERT INTO `aac_role` VALUES ('17', '1', '0', '钱包管理组', 'a:12:{s:9:\"dashboard\";a:1:{i:0;s:5:\"index\";}s:7:\"setting\";a:1:{i:0;s:5:\"index\";}s:9:\"walletlog\";a:1:{i:0;s:5:\"index\";}s:8:\"userinfo\";a:1:{i:0;s:5:\"index\";}s:8:\"roleinfo\";a:1:{i:0;s:5:\"index\";}s:10:\"walletuser\";a:1:{i:0;s:5:\"index\";}s:12:\"walletverify\";a:1:{i:0;s:5:\"index\";}s:10:\"walletfind\";a:1:{i:0;s:5:\"index\";}s:9:\"walletmsg\";a:1:{i:0;s:5:\"index\";}s:7:\"version\";a:1:{i:0;s:5:\"index\";}s:7:\"sendmsg\";a:1:{i:0;s:5:\"index\";}s:16:\"is_administortar\";s:1:\"1\";}');

-- ----------------------------
-- Table structure for `aac_role_group`
-- ----------------------------
DROP TABLE IF EXISTS `aac_role_group`;
CREATE TABLE `aac_role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) DEFAULT NULL,
  `c_time` bigint(12) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_role_group
-- ----------------------------
INSERT INTO `aac_role_group` VALUES ('1', '系统组', '1505447665');
INSERT INTO `aac_role_group` VALUES ('2', '前台用户', '1505447665');

-- ----------------------------
-- Table structure for `aac_sendmsg`
-- ----------------------------
DROP TABLE IF EXISTS `aac_sendmsg`;
CREATE TABLE `aac_sendmsg` (
  `id` int(10) NOT NULL,
  `c_time` bigint(20) NOT NULL DEFAULT '0',
  `creater` int(10) NOT NULL,
  `title` text NOT NULL,
  `info` text NOT NULL,
  `language_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_sendmsg
-- ----------------------------
INSERT INTO `aac_sendmsg` VALUES ('272', '1524646518', '1', 'Acute Angle客户端维护完成', 'PHA+5Zug57O757uf5omp5a656ZyA6KaB77yMQWN1dGUgQW5nbGXlrqLmiLfnq6/kuo7ljJfkuqzml7bpl7QxNTowMOW8gOWni+WBnOacuue7tOaKpOOAguebruWJjee7tOaKpOW3suWujOaIkO+8jOWPr+WJjeW+gOWumOe9kXd3dy5hY3V0ZWFubGdlLmNvbeS4i+i9veacgOaWsOeJiOacrOWNs+WPr+ato+W4uOS9v+eUqO+8jOaEn+iwouaCqOeahOeQhuino+S4juaUr+aMgeOAgjxicj48L3A+', '1');
INSERT INTO `aac_sendmsg` VALUES ('272', '1524646518', '1', 'AcuteAngle Client maintenance completed', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0OSwgMjUxLCAyNTIpOyI+RHVlIHRvIHRoZSBuZWVkIG9mIHN5c3RlbSBleHBhbnNpb24sIHRoZSBjbGllbnQgb2YgdGhlIEFjdXRlIEFuZ2xlIHdpbGwgc3RvcCBtYWludGVuYW5jZSBhdCAxNTowMCBCZWlqaW5nIHRpbWUuIFRoZSBjdXJyZW50IG1haW50ZW5hbmNlIGhhcyBiZWVuIGNvbXBsZXRlZCwgYW5kIHRoZSBsYXRlc3QgdmVyc2lvbiBjYW4gYmUgZG93bmxvYWRlZCBhdCB3d3cuYWN1dGVhbmxnZS5jb20uIFRoYW5rIHlvdSBmb3IgeW91ciB1bmRlcnN0YW5kaW5nIGFuZCBzdXBwb3J0Ljwvc3Bhbj48YnI+PC9wPg==', '2');
INSERT INTO `aac_sendmsg` VALUES ('272', '1524646518', '1', 'Acute Angle 고객이 보호 하여 완성하다', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuyLnOyKpO2FnCDtmZXsnqXsl5Ag7ZWE7JqUIO2VtCwgQWN1dGUgQW5nbGUg67CU7J207Ja065Ok7J2AIOuyoOydtOynlSDsi5zqsIQgMTU6MDDrtoDthLAg7KCV67mE7ZWY6rOgIOyeiOuLpC7sp4DquIjsnYAg7J2066+4IOyZhOyEsSDrkJjsl4jsnLzrqbAsIO2ZiO2OmOydtOyngCAod3d3LiBhY3V0ZWFubGdlZS5jb20p66W8IO2Gte2VtCDstZzsi6Ag67KE7KCE7J2EIOuLpOyatOuhnOuTnO2VmOuptCDsoJXsg4HsoIHsnLzroZwg7IKs7JqpIOuQmOqzoCwg64u57Iug7J2YIOydtO2VtOyZgCDsp4Dsp4Dsl5Ag6rCQ7IKsIO2VqeuLiOuLpC48L3NwYW4+PGJyPjwvcD4=', '3');
INSERT INTO `aac_sendmsg` VALUES ('284', '1524810232', '1', 'Acute Angle客户端维护完成', 'PHA+5Zug57O757uf5omp5a656ZyA6KaB77yMQWN1dGUgQW5nbGXlrqLmiLfnq6/kuo7ljJfkuqzml7bpl7QxNTowMOW8gOWni+WBnOacuue7tOaKpOOAguebruWJjee7tOaKpOW3suWujOaIkO+8jOWPr+WJjeW+gOWumOe9kXd3dy5hY3V0ZWFubGdlLmNvbeS4i+i9veacgOaWsOeJiOacrOWNs+WPr+ato+W4uOS9v+eUqO+8jOaEn+iwouaCqOeahOeQhuino+S4juaUr+aMgeOAgjxicj48L3A+', '1');
INSERT INTO `aac_sendmsg` VALUES ('284', '1524810232', '1', 'Acute Angle客户端维护完成', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0OSwgMjUxLCAyNTIpOyI+RHVlIHRvIHRoZSBuZWVkIG9mIHN5c3RlbSBleHBhbnNpb24sIHRoZSBjbGllbnQgb2YgdGhlIEFjdXRlIEFuZ2xlIHdpbGwgc3RvcCBtYWludGVuYW5jZSBhdCAxNTowMCBCZWlqaW5nIHRpbWUuIFRoZSBjdXJyZW50IG1haW50ZW5hbmNlIGhhcyBiZWVuIGNvbXBsZXRlZCwgYW5kIHRoZSBsYXRlc3QgdmVyc2lvbiBjYW4gYmUgZG93bmxvYWRlZCBhdCB3d3cuYWN1dGVhbmxnZS5jb20uIFRoYW5rIHlvdSBmb3IgeW91ciB1bmRlcnN0YW5kaW5nIGFuZCBzdXBwb3J0Ljwvc3Bhbj48YnI+PC9wPg==', '2');
INSERT INTO `aac_sendmsg` VALUES ('284', '1524810232', '1', 'Acute Angle 고객이 보호 하여 완성하다', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgYmFja2dyb3VuZC1jb2xvcjogcmdiKDI0OSwgMjUxLCAyNTIpOyI+7Iuc7Iqk7YWcIO2ZleyepeyXkCDtlYTsmpQg7ZW0LCBBY3V0ZSBBbmdsZSDrsJTsnbTslrTrk6TsnYAg67Kg7J207KeVIOyLnOqwhCAxNTowMOu2gO2EsCDsoJXruYTtlZjqs6Ag7J6I64ukLuyngOq4iOydgCDsnbTrr7gg7JmE7ISxIOuQmOyXiOycvOupsCwg7ZmI7Y6Y7J207KeAICh3d3cuIGFjdXRlYW5sZ2VlLmNvbSnrpbwg7Ya17ZW0IOy1nOyLoCDrsoTsoITsnYQg64uk7Jq066Gc65Oc7ZWY66m0IOygleyDgeyggeycvOuhnCDsgqzsmqkg65CY6rOgLCDri7nsi6DsnZgg7J207ZW07JmAIOyngOyngOyXkCDqsJDsgqwg7ZWp64uI64ukLjwvc3Bhbj48YnI+PC9wPg==', '3');
INSERT INTO `aac_sendmsg` VALUES ('284', '1524810232', '1', 'クライアントのメンテナンス完了です。', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuOCt+OCueODhuODoOOBruaLoeWkp+OBq+W/heimgeOBqOOBleOCjOOBpuOBiuOCiuOAgWFjdXRl44Gu44Kv44Op44Kk44Ki44Oz44OI44Gv5YyX5Lqs5pe26Ze0MTU6MDDjgavlgZzmraLjgZfjgabjgYTjgb7jgZnjgILnjrDlnKjjgIHjg6Hjg7Pjg4bjg4rjg7Pjgrnnu4jkuobjgZfjgabjgYrjgorjgIHlhazlvI/jgrXjgqTjg4jjga53d3cuYWN1dGVhbmxnZS5jb23jgavooYzjgaPjgabmnIDmlrDjg5Djg7zjgrjjg6fjg7PjgpLjg4Djgqbjg7Pjg63jg7zjg4njgZnjgovjgZPjgajjgYzjgafjgY3jgb7jgZnjgILjgZTnkIbop6PjgajjgZTmlK/mjIHjgavmhJ/osKLjgZfjgb7jgZnjgII8L3NwYW4+PGJyPjwvcD4=', '4');
INSERT INTO `aac_sendmsg` VALUES ('285', '1525450868', '1', '【关于锐角云客户端1.0.16版本更新的说明】', 'PHA+6ZSQ6KeS5LqR5a6i5oi356uv5LqONeaciDXml6Xmm7TmlrAxLjAuMTbniYjmnKzvvIzmnKzmrKHmm7TmlrDkuLvopoHlop7liqDku6XkuIvlip/og73vvJoxLuW8gOWQr+aPkOeOsOWKn+iDve+8mzIu5Zyo6K6+572u5Lit5aKe5Yqg57uR5a6a6YKu566x5Yqf6IO977ybMy7lop7liqDmj5DnjrDpqozor4Hlip/og73vvJrpgq7nrrHpqozor4HjgILmgqjlj6/liY3lvoDplJDop5LkupHlrpjnvZHkuIvovb3mlrDniYjlrqLmiLfnq6/vvIzmhJ/osKLmgqjnmoTmlK/mjIHjgII8L3A+', '1');
INSERT INTO `aac_sendmsg` VALUES ('285', '1525450868', '1', '【关于锐角云客户端1.0.16版本更新的说明】', 'PHA+6ZSQ6KeS5LqR5a6i5oi356uv5LqONeaciDXml6Xmm7TmlrAxLjAuMTbniYjmnKzvvIzmnKzmrKHmm7TmlrDkuLvopoHlop7liqDku6XkuIvlip/og73vvJoxLuW8gOWQr+aPkOeOsOWKn+iDve+8mzIu5Zyo6K6+572u5Lit5aKe5Yqg57uR5a6a6YKu566x5Yqf6IO977ybMy7lop7liqDmj5DnjrDpqozor4Hlip/og73vvJrpgq7nrrHpqozor4HjgILmgqjlj6/liY3lvoDplJDop5LkupHlrpjnvZHkuIvovb3mlrDniYjlrqLmiLfnq6/vvIzmhJ/osKLmgqjnmoTmlK/mjIHjgII8L3A+', '2');
INSERT INTO `aac_sendmsg` VALUES ('285', '1525450868', '1', '【关于锐角云客户端1.0.16版本更新的说明】', 'PHA+6ZSQ6KeS5LqR5a6i5oi356uv5LqONeaciDXml6Xmm7TmlrAxLjAuMTbniYjmnKzvvIzmnKzmrKHmm7TmlrDkuLvopoHlop7liqDku6XkuIvlip/og73vvJoxLuW8gOWQr+aPkOeOsOWKn+iDve+8mzIu5Zyo6K6+572u5Lit5aKe5Yqg57uR5a6a6YKu566x5Yqf6IO977ybMy7lop7liqDmj5DnjrDpqozor4Hlip/og73vvJrpgq7nrrHpqozor4HjgILmgqjlj6/liY3lvoDplJDop5LkupHlrpjnvZHkuIvovb3mlrDniYjlrqLmiLfnq6/vvIzmhJ/osKLmgqjnmoTmlK/mjIHjgII8L3A+', '3');
INSERT INTO `aac_sendmsg` VALUES ('285', '1525450868', '1', '', 'PHA+PGJyPjwvcD4=', '4');
INSERT INTO `aac_sendmsg` VALUES ('289', '1525452215', '1', '【关于锐角云客户端1.0.16版本更新的说明】', 'PHA+6ZSQ6KeS5LqR5a6i5oi356uv5LqONeaciDXml6Xmm7TmlrAxLjAuMTbniYjmnKzvvIzmnKzmrKHmm7TmlrDkuLvopoHlop7liqDku6XkuIvlip/og73vvJoxLuW8gOWQr+aPkOeOsOWKn+iDve+8mzIu5Zyo6K6+572u5Lit5aKe5Yqg57uR5a6a6YKu566x5Yqf6IO977ybMy7lop7liqDmj5DnjrDpqozor4Hlip/og73vvJrpgq7nrrHpqozor4HjgILmgqjlj6/liY3lvoDplJDop5LkupHlrpjnvZHkuIvovb3mlrDniYjlrqLmiLfnq6/vvIzmhJ/osKLmgqjnmoTmlK/mjIHjgII8L3A+', '1');
INSERT INTO `aac_sendmsg` VALUES ('289', '1525452215', '1', '【关于锐角云客户端1.0.16版本更新的说明】', 'PHA+6ZSQ6KeS5LqR5a6i5oi356uv5LqONeaciDXml6Xmm7TmlrAxLjAuMTbniYjmnKzvvIzmnKzmrKHmm7TmlrDkuLvopoHlop7liqDku6XkuIvlip/og73vvJoxLuW8gOWQr+aPkOeOsOWKn+iDve+8mzIu5Zyo6K6+572u5Lit5aKe5Yqg57uR5a6a6YKu566x5Yqf6IO977ybMy7lop7liqDmj5DnjrDpqozor4Hlip/og73vvJrpgq7nrrHpqozor4HjgILmgqjlj6/liY3lvoDplJDop5LkupHlrpjnvZHkuIvovb3mlrDniYjlrqLmiLfnq6/vvIzmhJ/osKLmgqjnmoTmlK/mjIHjgII8L3A+', '2');
INSERT INTO `aac_sendmsg` VALUES ('289', '1525452215', '1', '【关于锐角云客户端1.0.16版本更新的说明】', 'PHA+6ZSQ6KeS5LqR5a6i5oi356uv5LqONeaciDXml6Xmm7TmlrAxLjAuMTbniYjmnKzvvIzmnKzmrKHmm7TmlrDkuLvopoHlop7liqDku6XkuIvlip/og73vvJoxLuW8gOWQr+aPkOeOsOWKn+iDve+8mzIu5Zyo6K6+572u5Lit5aKe5Yqg57uR5a6a6YKu566x5Yqf6IO977ybMy7lop7liqDmj5DnjrDpqozor4Hlip/og73vvJrpgq7nrrHpqozor4HjgILmgqjlj6/liY3lvoDplJDop5LkupHlrpjnvZHkuIvovb3mlrDniYjlrqLmiLfnq6/vvIzmhJ/osKLmgqjnmoTmlK/mjIHjgII8L3A+', '3');
INSERT INTO `aac_sendmsg` VALUES ('289', '1525452215', '1', '', 'PHA+PGJyPjwvcD4=', '4');

-- ----------------------------
-- Table structure for `aac_setting`
-- ----------------------------
DROP TABLE IF EXISTS `aac_setting`;
CREATE TABLE `aac_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键编号',
  `type` varchar(200) NOT NULL DEFAULT '' COMMENT '设置类型',
  `name` varchar(200) NOT NULL DEFAULT '',
  `value` text COMMENT '配送方式',
  `c_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_setting
-- ----------------------------
INSERT INTO `aac_setting` VALUES ('37', 'wallet', 'onoff', '1', '1525764651');
INSERT INTO `aac_setting` VALUES ('38', 'wallet', 'walletKey', '1111111', '1525764651');
INSERT INTO `aac_setting` VALUES ('39', 'wallet', 'walletSecret', '2222222', '1525764651');
INSERT INTO `aac_setting` VALUES ('40', 'wallet', 'offset', '20', '1525764651');
INSERT INTO `aac_setting` VALUES ('42', 'wallet', 'verifylistonurl', 'http://api.beenews.cn/api/apply/admin/list', '1525764651');
INSERT INTO `aac_setting` VALUES ('43', 'wallet', 'verifyconsentonurl', 'http://api.beenews.cn/api/examine/pass', '1525764651');
INSERT INTO `aac_setting` VALUES ('44', 'wallet', 'verifyrejectonurl', 'http://api.beenews.cn/api/examine/reject', '1525764651');
INSERT INTO `aac_setting` VALUES ('45', 'wallet', 'findonurl', 'http://api.beenews.cn/api/examine/admin/list', '1525764651');
INSERT INTO `aac_setting` VALUES ('46', 'wallet', 'msgonurl', 'http://api.beenews.cn/api/message/announce/add', '1525764651');
INSERT INTO `aac_setting` VALUES ('47', 'wallet', 'versiononurl', 'http://api.bchunk.com/api/version/history/add', '1525764651');
INSERT INTO `aac_setting` VALUES ('48', 'wallet', 'emailonurl', '', '1525764651');
INSERT INTO `aac_setting` VALUES ('49', 'wallet', 'useroffurl', '', '1525764651');
INSERT INTO `aac_setting` VALUES ('50', 'wallet', 'verifylistoffurl', 'http://39.104.175.19:18080/api/apply/admin/list', '1525764651');
INSERT INTO `aac_setting` VALUES ('51', 'wallet', 'verifyconsentoffurl', 'http://39.104.175.19:18080/api/examine/pass', '1525764651');
INSERT INTO `aac_setting` VALUES ('52', 'wallet', 'verifyrejectoffurl', 'http://39.104.175.19:18080/api/examine/reject', '1525764651');
INSERT INTO `aac_setting` VALUES ('53', 'wallet', 'findoffurl', 'http://39.104.175.19:18080/api/examine/admin/list', '1525764651');
INSERT INTO `aac_setting` VALUES ('54', 'wallet', 'msgoffurl', 'http://39.104.175.19:18080/api/message/announce/add', '1525764651');
INSERT INTO `aac_setting` VALUES ('55', 'wallet', 'versionoffurl', 'http://39.104.175.19:18080/api/version/history/add', '1525764651');
INSERT INTO `aac_setting` VALUES ('56', 'wallet', 'emailoffurl', '', '1525764652');
INSERT INTO `aac_setting` VALUES ('57', 'wallet', 'useronurl', '', '1525764651');

-- ----------------------------
-- Table structure for `aac_user`
-- ----------------------------
DROP TABLE IF EXISTS `aac_user`;
CREATE TABLE `aac_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `login` varchar(11) DEFAULT NULL COMMENT '登录账号',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `c_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'api token',
  `role` tinyint(3) DEFAULT NULL,
  `salt` varchar(64) DEFAULT NULL COMMENT '盐',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_user
-- ----------------------------
INSERT INTO `aac_user` VALUES ('1', 'admin', '970655e8401a517fc571d114a421498d9cf5ffd5', '1505716073', '0', null, '9', 'bdavgk');
INSERT INTO `aac_user` VALUES ('6', 'liguiqiao', '54616aa853d26a3cee54bf7550316092c5ed6349', null, '0', null, '9', 'fypogg');
INSERT INTO `aac_user` VALUES ('11', 'xiaojun', 'e98189fad750e927a81e41a87969963be0a07ffe', null, '0', null, '16', 'vhhxvc');
INSERT INTO `aac_user` VALUES ('12', 'wallet', '52952220871f2f587128852947fad0124ffe501e', null, '0', null, '17', 'mqehec');

-- ----------------------------
-- Table structure for `aac_user_info`
-- ----------------------------
DROP TABLE IF EXISTS `aac_user_info`;
CREATE TABLE `aac_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `user_name` varchar(50) DEFAULT NULL COMMENT '昵称',
  `sex` tinyint(2) DEFAULT NULL COMMENT '0男 1女 2保密',
  `balance` int(11) DEFAULT '0' COMMENT '余额',
  `birthday` varchar(100) DEFAULT NULL COMMENT '生日',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `desc` varchar(500) DEFAULT NULL COMMENT '个人签名',
  `c_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `u_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_user_info
-- ----------------------------
INSERT INTO `aac_user_info` VALUES ('1', '1', '超级管理员', '0', '10001', '1993-08-13', 'http://img5.imgtn.bdimg.com/it/u=2943933734,3588618361&fm=27&gp=0.jpg', '算天算地算自己', null, null);

-- ----------------------------
-- Table structure for `aac_version`
-- ----------------------------
DROP TABLE IF EXISTS `aac_version`;
CREATE TABLE `aac_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) DEFAULT '0' COMMENT '创建人',
  `verifyer` int(10) DEFAULT NULL,
  `img` varchar(100) DEFAULT '' COMMENT '图片',
  `c_time` bigint(20) NOT NULL COMMENT '创建时间',
  `u_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `v_time` bigint(20) DEFAULT NULL COMMENT '审核时间',
  `type` int(11) DEFAULT '0' COMMENT '类型  1强制全局更新 0非强制更新 2局部更新',
  `status` int(11) DEFAULT '0' COMMENT '状态  0 编辑中 1关闭中 2.审核通过',
  `context` text NOT NULL COMMENT '版本内容',
  `file_json` text NOT NULL COMMENT '文件内容',
  `language_id` int(10) NOT NULL,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_version
-- ----------------------------
INSERT INTO `aac_version` VALUES ('197', '1', null, '', '1524134629', null, null, '0', '0', 'PHA+XC9oZWxsbzwvcD4=', '', '1');
INSERT INTO `aac_version` VALUES ('197', '1', null, '', '1524134629', null, null, '0', '0', 'PHA+XC9oZWxsbzxicj48L3A+', '', '2');
INSERT INTO `aac_version` VALUES ('197', '1', null, '', '1524134629', null, null, '0', '0', 'PHA+XC9oZWxsbzxicj48L3A+', '', '3');

-- ----------------------------
-- Table structure for `aac_version_url`
-- ----------------------------
DROP TABLE IF EXISTS `aac_version_url`;
CREATE TABLE `aac_version_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `build` int(10) DEFAULT '0' COMMENT '生成号',
  `version` varchar(200) NOT NULL COMMENT '版本号',
  `c_time` bigint(20) NOT NULL COMMENT '创建时间',
  `url` text NOT NULL COMMENT 'url',
  `vid` int(11) DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_version_url
-- ----------------------------
INSERT INTO `aac_version_url` VALUES ('7', '1005', '1005', '1524134629', 'https://s3.us-east-2.amazonaws.com/aacwallet2.1/Acute-Angle-Wallet-win32-x64.zip', '197');

-- ----------------------------
-- Table structure for `aac_walletmsg`
-- ----------------------------
DROP TABLE IF EXISTS `aac_walletmsg`;
CREATE TABLE `aac_walletmsg` (
  `id` int(11) NOT NULL COMMENT '编号',
  `wtype` int(10) NOT NULL COMMENT '创建人',
  `c_time` bigint(12) NOT NULL COMMENT '创建时间',
  `u_time` bigint(12) DEFAULT NULL COMMENT '更新时间',
  `creater` int(10) NOT NULL COMMENT '创建人',
  `title` text NOT NULL,
  `info` text NOT NULL COMMENT '内容',
  `language_id` int(10) NOT NULL DEFAULT '0' COMMENT '语言编号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_walletmsg
-- ----------------------------
INSERT INTO `aac_walletmsg` VALUES ('277', '1', '1524650025', '1524650025', '1', '您的申请已通过', 'PHA+5oKo55qE55Sz6K+35bey6YCa6L+HPGJyPjwvcD4=', '1');
INSERT INTO `aac_walletmsg` VALUES ('277', '1', '1524650025', '1524650025', '1', 'Your application has been approved.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPllvdXIgYXBwbGljYXRpb24gaGFzIGJlZW4gYXBwcm92ZWQuPC9zcGFuPjxicj48L3A+', '2');
INSERT INTO `aac_walletmsg` VALUES ('277', '1', '1524650025', '1524650025', '1', '당신의 신청은 이미 통과 되었습니다.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuuLueyLoOydmCDsi6Dssq3snYAg7J2066+4IO2GteqzvCDrkJjsl4jsirXri4jri6QuPC9zcGFuPjxicj48L3A+', '3');
INSERT INTO `aac_walletmsg` VALUES ('277', '1', '1524650025', '1524650025', '1', 'あなたの申請は既に通過しました。', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuOBguOBquOBn+OBrueUs+iri+OBr+aXouOBq+mAmumBjuOBl+OBvuOBl+OBn+OAgjwvc3Bhbj48YnI+PC9wPg==', '4');
INSERT INTO `aac_walletmsg` VALUES ('278', '2', '1524657515', '1524657515', '1', '您的申请被驳回', 'PHA+5oKo55qE55Sz6K+36KKr6amz5ZuePGJyPjwvcD4=', '1');
INSERT INTO `aac_walletmsg` VALUES ('278', '2', '1524657516', '1524657516', '1', 'Your application was rejected.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPllvdXIgYXBwbGljYXRpb24gd2FzIHJlamVjdGVkLjwvc3Bhbj48YnI+PC9wPg==', '2');
INSERT INTO `aac_walletmsg` VALUES ('278', '2', '1524657516', '1524657516', '1', '당신의 신청은 기각 되었습니다.', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuuLueyLoOydmCDsi6Dssq3snYAg6riw6rCBIOuQmOyXiOyKteuLiOuLpC48L3NwYW4+PGJyPjwvcD4=', '3');
INSERT INTO `aac_walletmsg` VALUES ('278', '2', '1524657516', '1524657516', '1', 'あなたの申請は却下された。', 'PHA+PHNwYW4gc3R5bGU9ImNvbG9yOiByZ2IoOTUsIDk4LCAxMDIpOyBmb250LWZhbWlseTogQXJpYWwsICZxdW90O01pY3Jvc29mdCBZYUhlaSZxdW90Oywg5b6u6L2v6ZuF6buRLCDlrovkvZMsICZxdW90O01hbGd1biBHb3RoaWMmcXVvdDssIE1laXJ5bywgc2Fucy1zZXJpZjsgZm9udC12YXJpYW50LW51bWVyaWM6IG5vcm1hbDsgZm9udC12YXJpYW50LWVhc3QtYXNpYW46IG5vcm1hbDsgbGluZS1oZWlnaHQ6IDE5cHg7IGJhY2tncm91bmQtY29sb3I6IHJnYigyNDksIDI1MSwgMjUyKTsiPuOBguOBquOBn+OBrueUs+iri+OBr+WNtOS4i+OBleOCjOOBn+OAgjwvc3Bhbj48YnI+PC9wPg==', '4');

-- ----------------------------
-- Table structure for `aac_wallettype`
-- ----------------------------
DROP TABLE IF EXISTS `aac_wallettype`;
CREATE TABLE `aac_wallettype` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(100) NOT NULL,
  `c_time` bigint(20) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_wallettype
-- ----------------------------

-- ----------------------------
-- Table structure for `aac_walluser`
-- ----------------------------
DROP TABLE IF EXISTS `aac_walluser`;
CREATE TABLE `aac_walluser` (
  `id` int(11) NOT NULL COMMENT '编号',
  `email` mediumtext NOT NULL COMMENT '登录账号',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `c_time` bigint(20) NOT NULL COMMENT '创建时间',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'api token',
  `salt` varchar(64) NOT NULL COMMENT '盐',
  `ip` varchar(50) NOT NULL,
  `language_id` int(2) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL COMMENT '用户名',
  `limits` int(10) NOT NULL DEFAULT '0',
  `country` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) NOT NULL COMMENT '昵称',
  `head_img` varchar(150) NOT NULL COMMENT '头像'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aac_walluser
-- ----------------------------
INSERT INTO `aac_walluser` VALUES ('900', '30300659@qq.com', 'b2b23ad775013f55bbe32baec9d6f28c5c4acb89', '1515758764', '0', '9c0ltn412gb9jtmje3u4hb6rs2pfzhxnpafu', 'pfzhxnpafu', '36.7.82.180', '1', '18055169890', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('901', '75770900@qq.com', '414122da25b70690f6773e2ee24a72c9451a4a4d', '1515759694', '0', '05vaqtf20ocrnpd6t4d1k8sofclrenqqhndo', 'lrenqqhndo', '180.97.196.189', '2', 'knight', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('902', '417826316@qq.com', 'cfc57606b6cce33ada91cef1d3f05886a5eb00f9', '1515707653', '0', '9ec8069473dca4daba1bc0d9a16f50e3sqpwmohmil', 'sqpwmohmil', '123.15.161.51', '1', 'huangpu', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('903', 'craig.sweet.trader@gmail.com', '20a82b3f4e5ee8ccdf12ae7a95a63bc5f44fadc8', '1515709895', '0', 'f2f69deca15e48e12b1df57b670e445adogdvijsvs', 'dogdvijsvs', '5.69.48.82', '2', 'csweet4', '0', '英国', '', '');
INSERT INTO `aac_walluser` VALUES ('904', 'wy9929@gmail.com', '265a4c1cb9317a3b989ce6b6f1ac10d2538ba34e', '1515711152', '0', '6afefd62c3cd845bae65c37243acd5ffjjyymdzsdu', 'jjyymdzsdu', '184.155.31.148', '2', 'dylan', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('905', 'qilu75@gmail.com', '43a5dd8bfc258d962df034e4d73bdb7175537eca', '1515711865', '0', '9422dedd27cc018ef17388e66c4cab05781hhgnyusvkm', 'hhgnyusvkm', '88.98.204.221', '1', 'qilu75', '0', '英国', '', '');
INSERT INTO `aac_walluser` VALUES ('906', 'cqjtxywj@qq.com', '397d3bb8f99979cb7b4db53c95b849fd31d462b9', '1515714616', '0', '1c97163f5753cd76d14b256ea2292b4f783wkqnyiimbt', 'wkqnyiimbt', '119.86.119.97', '1', 'cqjtxywj', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('907', '765445142@qq.com', '63e41414b9d60b72d2486f316e2ef5a0c871c982', '1515714877', '0', '06396ad6c893ef50408ba539841f0479kbjjwrtmcc', 'kbjjwrtmcc', '60.219.151.84', '1', 'lucas', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('908', 'wtyk@qq.com', '276bf5ffaee5371710ef4f2185ea3685000b5382', '1515715377', '0', '2538c608e70382b6ca1d87b022a35bd8785bhfxooplay', 'bhfxooplay', '60.23.55.68', '1', 'axela', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('909', '490084710@qq.com', '63053bad0b0d895743a21c9886225dfbab986277', '1515716255', '0', 'ad180accf122d0e906cf5b79bd118bb8nppuvclxdt', 'nppuvclxdt', '27.109.149.184', '1', 'yaoyubaba', '0', '澳门', '', '');
INSERT INTO `aac_walluser` VALUES ('910', '695869227@qq.com', 'ffb5f15e471510a790102ff36d521d087d221965', '1515716717', '0', '85fa324d083ec6f7bda3c6e6ee80863aygkwgoikrg', 'ygkwgoikrg', '119.251.171.4', '1', 'luoyepiaopiao', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('911', '1432520246@qq.com', '3564b6eec42f2776a038f8d276f78e566dc21bd2', '1515716777', '0', '741ae416dd3c6b6a6e1b245f4f68decdnstqiwdtfz', 'nstqiwdtfz', '182.132.193.196', '1', '网络中寻觅', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('912', 'colinbf@163.com', 'ea60900a616cae67a22eaf70d88a6c15e5b4e82a', '1515716930', '0', '416349dcc29d843815f4a0bc3e77097a789kadgkipdag', 'kadgkipdag', '223.104.6.69', '1', 'colinbf', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('913', 'gcliu2008@163.com', '16c2511165d45094366f256817602ab54ccb66bd', '1515717070', '0', '1d16d9bd02b2367ece7c621f027bef41rnlrnfisrv', 'rnlrnfisrv', '119.251.171.4', '1', 'kaka123', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('914', '18678989308@163.com', 'be40be60dac0842ce95af2789782038ede3dea1e', '1515718298', '0', '0205118997077e8a8175bc4a0cf95000vmcnmenjyg', 'vmcnmenjyg', '219.146.91.110', '1', 'server1118', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('915', 'blue11000@163.com', 'ce95dc9e60c8644365c3e031220353c62a3ab480', '1515718658', '0', '0749a2983644198f0a0f5ce373d6373bazzdhchkew', 'azzdhchkew', '223.104.63.196', '1', 'blue11000', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('916', 'uo_jia@163.com', '786b70e81c3940fd53a4ab215230a539c5d2f5a7', '1515718756', '0', '', 'mxsgwcyfuv', '47.88.191.24', '1', 'uojia1', '0', '新加坡', '', '');
INSERT INTO `aac_walluser` VALUES ('917', 'seektwo@gmail.com', '96a9413abf55057a696c623e923ff048916a1e32', '1515718835', '0', '', 'xsyhqesxpm', '47.88.191.24', '1', 'seektwo1', '3', '新加坡', '', '');
INSERT INTO `aac_walluser` VALUES ('918', '462087856@qq.com', 'a62fdf1fd619a1ec930e497285b88eeb88882f40', '1515719087', '0', 'e1a3e8e492be74baea7381998ac2a934zbjyjgnwba', 'zbjyjgnwba', '124.67.69.116', '1', 'gotozzg', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('919', '13126903000@163.com', '7c4ea0f60a0a3034c523e7f742b93806c9bb0d40', '1515719129', '0', '4c4726ffc56483cab72c7183f9e7e827796azvtnbxvzf', 'azvtnbxvzf', '116.208.131.194', '2', '强哥哥', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('920', 'heelihua@163.com', '8ecaf0477074ab13cae6de017196e5451853d8cd', '1515719133', '0', 'a0c6d6f1ffc23a741ee9e1d00908e709lcmenresrv', 'lcmenresrv', '159.203.36.52', '1', 'heelihua', '0', '加拿大', '', '');
INSERT INTO `aac_walluser` VALUES ('921', '467692122@qq.com', 'c33dedd4f5e913e9f61ea0f6746a4a313ec6c8fb', '1515719206', '0', '14c2eb8ae11ca7f1789a2a7e3b2a9e71obammzrdgf', 'obammzrdgf', '219.136.95.203', '1', 'JunMingLin', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('922', 'interush1992@163.com', 'c85784b6580dbbe7d58030f20233c8ea483b0bf6', '1515719312', '0', '8634aac6180e368008b2a50d538eb516jsueejtkyj', 'jsueejtkyj', '113.117.137.108', '1', 'JIM', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('923', '531298158@qq.com', 'b21de61723fa93f328617b7a9dd2ad81f2d0ddd4', '1515719325', '0', 'b35aa4da82943d1f5f9d207bcee8bd30800khhhnrwgdb', 'khhhnrwgdb', '202.86.146.10', '2', 'lshkinger1987', '0', '澳门', '', '');
INSERT INTO `aac_walluser` VALUES ('924', 'zjwlgr@yeah.net', '92baef243d3844094fa822dc2350cd04deb4aad5', '1515719466', '0', '4bbd6efae2284b97b61bd780de6c8366nookrqgrlf', 'nookrqgrlf', '125.35.65.202', '1', 'zjwlgr', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('925', '745919068@qq.com', '5bcdd3d99183e72e224bd195a1fc24855e9cb48f', '1515719592', '0', 'e8c6af47707b76852cf392a5e0afbc80mfcdmnsvae', 'mfcdmnsvae', '47.52.146.23', '2', 'pixiupanda', '0', '香港', '', '');
INSERT INTO `aac_walluser` VALUES ('926', '609922635@qq.com', '793c1ce07ba2acf7743ad50f8df8767e9f60b94b', '1515719648', '0', 'jmf6vcduth23ata53m2387l6c1926sgwbhripza', 'sgwbhripza', '117.25.38.61', '1', 'lesorn', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('927', 'czb5711@gmail.com', 'e18e0e8bb84b29e9900a7e7c5bee83df57e248fc', '1515719915', '0', '960f725b4717133b43fab0c0be98e24cirrxjuvrjl', 'irrxjuvrjl', '120.33.54.68', '1', '人生', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('928', '307494120@qq.com', '74571e991080eb5dbf21f3ce903f1908ebc8b9e3', '1515720119', '0', 'dc75d384b09a9d0851a9a4f448851046806wrlusolafn', 'wrlusolafn', '171.10.148.163', '1', 'zhi307494120', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('929', 'lit7685@126.com', 'bc4b3ddd2547630de7d2c214d2e5ea3092b5d03d', '1515720134', '0', '', 'nvjrrzaaxf', '115.48.83.179', '1', '原126', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('930', 'yz803@126.com', '0f07b6e5fd04551b3cc2c417f5302e69c92e3b60', '1515720333', '0', '6be0860a9fe620281b3560e472163557gsdtxjgbkx', 'gsdtxjgbkx', '36.110.17.42', '1', 'yz03369343', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('931', '13821820206@139.com', 'df009c07b5845af4f75978a6dbab58301d504091', '1515720664', '0', '', 'qyvehvvilj', '110.80.44.130', '1', 'ts0206', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('932', '1014810313@qq.com', '459e176fc5fc60d2fd473e31ad8692fb65f10da2', '1515720931', '0', 'p1e6faonjcjlbnak89fjttk8cf932ognrmwqpsj', 'ognrmwqpsj', '112.25.252.199', '1', 'dila', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('933', 'sherlock_chang@163.com', '8c3f4a6374638825cdbb2cf89af2fd7c632cc6f6', '1515720961', '0', '34136208790ada3a552e21092d100e1flmvxovfbdc', 'lmvxovfbdc', '101.109.40.238', '1', 'charliechang', '0', '泰国', '', '');
INSERT INTO `aac_walluser` VALUES ('934', '76609571@qq.com', '82cc4b738674df03bf2d98939eb4b7c50529eda1', '1515721044', '0', 'a20550755b585ad593129e1b7538c5b7oklkvyshhl', 'oklkvyshhl', '27.197.49.219', '1', 'dadiaodoudou', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('935', '523266985@qq.com', 'c33f30b3d04561dc4dc339475e2b56b576064dfc', '1515721047', '0', 'e54e07fffa263921cf4e6cee533dde2a814qyebiulrjw', 'qyebiulrjw', '1.198.140.247', '1', '15890013734', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('936', 'tanpei@126.com', 'c407cac21652ad819a9bb27371ab1533bbaf0454', '1515721112', '0', '58e0a7e68414be7a7fa47242f8f16eebaihzwlmvuq', 'aihzwlmvuq', '113.66.35.194', '1', 'wushimang', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('937', 'Allen19850609@163.com', '442b02a68704e527d2099c18729f9e6039abafe7', '1515721117', '0', '20e8ab4ebc316a5ac5520122febbf36e816bratwjynxz', 'bratwjynxz', '36.106.4.39', '1', 'Allen', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('938', '799767893@qq.com', '19a8b56a17b8a6ce6ebf03e92d8bc4068f410a7f', '1515721242', '0', 'q2vcl1kibscs8dul3rdqbhupo4938ylyhznehpm', 'ylyhznehpm', '125.35.65.202', '1', '15692385000', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('939', 'waw16116@163.com', '652d034f0e87fc4d77c43b38c1f46a8bfa198ac0', '1515721281', '0', '682447e56fe8fd49c4792bb08350a819lqilltwims', 'lqilltwims', '211.99.143.219', '1', '妞子', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('940', '103008115@qq.com', '963286670886d3483570afb4d7d8986ca5e709ea', '1515721499', '0', 'f0ab4956db82390e937c312bb1f7cc8f819wttrxndecg', 'wttrxndecg', '59.56.161.106', '1', 'fdszxsy', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('941', '740009111@qq.com', '54f20b264b7f4ab15720e92a02b06df22127d7cb', '1515721500', '0', '72fe228af12e085db92ef30c8329ae3daqlfhptihs', 'aqlfhptihs', '183.129.252.226', '1', '15526507774', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('942', '494905649@qq.com', '14115589bf520bb321af432ee74b7fe166b28da4', '1515721532', '0', '5306603146c00271d2b2e10fe59d1cedxticynpsfl', 'xticynpsfl', '175.23.249.110', '1', '13144391994', '3', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('943', '1158886182@qq.com', '16617fea0c0b18af25e72769a0c9f9b8fd735891', '1515721618', '0', '', 'jdfqnmkewq', '115.48.83.179', '1', '1158886182', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('944', 'ajffdnt@163.com', '443504b25e0fc31627403390e3fd5bfdded6c3ea', '1515721696', '0', 'cdb60c0bb55e933f8b12cb18654e8ceccskcxwjvsl', 'cskcxwjvsl', '183.129.150.18', '1', 'ajffdnt', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('945', '1139907293@qq.com', 'b14f3f79b0816da5e4b96cb028117170ef49dea9', '1515721707', '0', '', 'ldmnvmurwr', '115.48.83.179', '1', '1139907293', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('946', '935015257@qq.com', 'b1ff0c2a7a4762b9058b1fd2a432e7210ead4e62', '1515721764', '0', '1a00a71c7a20ca69d20ba1f1d97295db825nszlorlrzc', 'nszlorlrzc', '106.114.150.135', '1', '牧歌', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('947', '807872775@qq.com', '9bdb5362426d0ee13921b390da4cf02ea65aa92f', '1515721801', '0', '1f8ae1683d67a5f70bbde6dab35cca16zkcpmlaxsl', 'zkcpmlaxsl', '115.48.83.179', '1', '807872775', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('948', '1252269837@qq.com', '9f5476830886ee238989ce813ffbc88f8f817f4c', '1515721857', '0', '2c5b59512d385d98d4ed4f1dcfc96bbc827ibliapvvbz', 'ibliapvvbz', '117.25.38.61', '1', 'cuibin', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('949', '13968416888@139.com', '1d4848c9e7849a693d3b869541f82ebb1c20f12b', '1515721899', '0', 'a5a652995ebb7730fa90409fef83907fzxucxwyeor', 'zxucxwyeor', '112.17.243.249', '1', 'chbchb', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('950', '1287655017@qq.com', '6ec549e0f88545d27f4403a7bcd1a32bee478dfe', '1515722148', '0', 'q3rvp4020gml566kkvqvgvnqrr950mhoqbqudwl', 'mhoqbqudwl', '61.160.122.242', '1', 'AQ48123', '3', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('951', '1320053974@qq.com', '96cd3fc4c80014348bb512e02b09d3bf0fb679c3', '1515722003', '0', 'c9ef09cb297f41d4ee25300c588d383djlxvxawldi', 'jlxvxawldi', '180.110.120.7', '1', 'wulianzuozi', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('952', '370918787@qq.com', 'd35b81f1ba7074204bb5aeb1b56621002a0222cd', '1515722011', '0', 'd9e88d1713b6c03ec0f0dd0f4ce72fb3cxigsisigt', 'cxigsisigt', '182.139.135.74', '1', '370918787', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('953', 'tssggb@163.com', '23edc3f8f4382e3234964eba636e4b1e44e7079c', '1515722022', '0', '', 'dajrptirhe', '222.223.6.30', '1', 'bywjm205', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('954', '55666586@qq.com', '0ae7d0b43091c5a0639ab937d82dd1b332f1fe6e', '1515722102', '0', 'd4f95dec10451c0331f295053b4a25bafvpleossnh', 'fvpleossnh', '119.119.91.158', '1', '55666586', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('955', '176770107@qq.com', '7830e3784af521bd915f4d3e238639857c9b57fb', '1515722165', '0', 'amtie4sv7rhuc78l2s3jte613q955ejqlthkviy', 'ejqlthkviy', '125.69.82.73', '2', 'yizhaoyixi', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('956', '841008672@qq.com', 'a461a79089cb8e647f21676a271f3335d3c59bde', '1515722176', '0', 'c9cd1ee1e8a08f66da46d8d9e54dc831835rkemwtawql', 'rkemwtawql', '36.57.76.137', '1', 'xiedongjun', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('957', '731981097@qq.com', '6433fca2f273ad3fc9dca27c8250d2a47b1ba07c', '1515722178', '0', '', 'wtkzjtyzpd', '61.144.102.113', '1', 'nana4424', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('958', '985790760@qq.com', '590997b35b3d6d6390dbe2fa7d0125261488be5e', '1515722181', '0', 'c8deec7971efc9b4ca66b8598224e395piueuajklq', 'piueuajklq', '61.185.39.116', '1', '佳迪', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('959', '86509741@qq.com', 'ffea1b9024eadae8c8958e01b6e3816b243d269b', '1515722196', '0', 'a6f5c73dbb66203337346a471de7e26d838kdenxbvgop', 'kdenxbvgop', '222.174.201.118', '1', 'peanut', '5', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('960', '719222580@qq.com', '951046ff6b8cc70ae797e8ced8c6b9833557b32b', '1515722231', '0', '1tvvn7j6du8en9isn2cp4a4tc5960noliuvbolf', 'noliuvbolf', '114.222.153.209', '1', 'ecjtuzzt', '3', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('961', 'sunnygoon131@126.com', '10a50c3c421877847464fef829d6da249c339513', '1515722233', '0', '', 'wkvyrqqegz', '61.144.102.113', '1', 'sunnygoon1', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('962', '649927001@qq.com', '3f211dc93db211a42d391d5d788eaf57a298a117', '1515722259', '0', '', 'rbbfjwaurt', '61.144.102.113', '1', 'huanglina', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('963', '358909227@qq.com', '45c4a02427d8738085469a82e1b74ab73821edf7', '1515722277', '0', '939515aee68c0d9d947d801a94517dee843oifbaotkil', 'oifbaotkil', '106.42.94.68', '1', 'fully870828', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('964', 'mingyun521@gmail.com', '28b9aa5e3a92dc67a7003cdaf5fb3ad9af08252c', '1515722284', '0', 'aa6596157a04ad6c29dfa499eb1ab8bcndspprdyht', 'ndspprdyht', '121.69.48.153', '1', 'mingyun521', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('965', 'szwqnh@163.com', 'b44e12663fb4a5d2a0d390054347432d28c8f918', '1515722291', '0', 'qe4lvf93iqo4kk5kvuuumnf00a965jacnvoozxs', 'jacnvoozxs', '180.173.35.149', '1', 'szchenzhen', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('966', '22236424@qq.com', 'a43c78deb6eb07f9e4eee46fee47caa02b9398e5', '1515722313', '0', 'a54d87f2eea90448a8c4b3af5409034erohpmlxqhl', 'rohpmlxqhl', '61.144.102.113', '1', 'huanglina2', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('967', '22871020@qq.com', 'cb3c2bc1b7509505172c805ae9633fc31bba6387', '1515722327', '0', '44bea311dccc3488c8e2d6cc89aa803acqzwuowmiq', 'cqzwuowmiq', '27.208.140.53', '1', '张荐浚', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('968', '846483902@qq.com', 'a4960be44b4abb15039e6feb5f6fa19853ae7ff8', '1515722341', '0', '', 'udldhygiya', '61.144.102.113', '1', 'sunnygoon2', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('969', '285268142@qq.com', 'b25e0c0e25e1a1fd5d9b4d2c515dd5a4d08ef16a', '1515722386', '0', 'ff286d94f86fac0d4cdc94ad450c8c32849bmurasuxmr', 'bmurasuxmr', '120.239.184.166', '2', 'yueyuexie617', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('970', '6802333@qq.com', '10e8e74beb96acf35f873e252f2872ed678b7f3d', '1515722399', '0', '8dae29346ddc50349cf978b9417528aakkjfojacea', 'kkjfojacea', '123.165.130.188', '2', 'wangdachaozi', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('971', 'kisssmile701@163.com', '17b2d3be92abe8ec44576644fcbbaf956b1d31b0', '1515722412', '0', '723666f4d4ff672ca867f52df3cfd7edjdbgctflmc', 'jdbgctflmc', '221.7.196.64', '1', 'kisssmile701', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('972', '499847550@qq.com', 'c47ee48fa038d182f31327e3cb396284a8340480', '1515722438', '0', '3f3ef20ce2eaf711fe6eeebfc68d2d68leyukdyfgx', 'leyukdyfgx', '202.106.49.102', '1', '李桂桥', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('973', 'xczy2001@163.com', 'b7e8153d0e47fd65d8982fba7b01957afca6f908', '1515722478', '0', 'e54489277ce8b9703d8d55032aff62b9kftrbvklie', 'kftrbvklie', '120.199.212.51', '1', 'xczy2001@163.com', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('974', '52360407@qq.com', '9d2b287036124ae909db9dd338acc55299a2c464', '1515722479', '0', '4caesapnm93m51tkrsl7shptrq974gdefarhxuf', 'gdefarhxuf', '223.90.68.178', '1', 'wuyouhome', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('975', '106671401@qq.com', 'f3dfce374108a20c7e545317be564e7476dd23cb', '1515722505', '0', 'c0c409e9f31a87635952c7cfeb078f5auvhokuabpm', 'uvhokuabpm', '171.106.197.1', '1', 'koffyy', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('976', '454448630@qq.com', 'a3a420bd8c07e41254e9288f6dcc11db2c77bc73', '1515722574', '0', '966b297bc48999e4dae9ec6b87b6c327crablwitsg', 'crablwitsg', '125.127.102.137', '1', 'mangguo111', '3', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('977', '130501884@qq.com', '5553cd9d22d7251ecef4b98ea44703ddc0ce7e21', '1515722579', '0', '45c78c34dba12283cdca008928dadf15857afwbjtaemb', 'afwbjtaemb', '180.157.124.12', '2', 'itsCJgenius', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('978', 'guodong441@foxmail.com', '9b7613e95a1ab03debaa4a21c5a11b689031cc62', '1515722596', '0', 'ac459e214422e10b84c85d5a380a361evfctomkoql', 'vfctomkoql', '110.88.45.13', '1', 'guodong441', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('979', 'cruelcage@gmail.com', 'aea391a6dc14604c62266c62d7c679ef0d35e1f8', '1515895916', '0', '4bea0f1def32e2c5417b5c36c854f84akvdbdtrpsb', 'bedrfmvdmf', '106.122.187.34', '1', 'cage', '5', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('980', '397740404@qq.com', 'f382d7921295df44e755c30e3e141aab0a67946a', '1515722694', '0', '28559e70d5cf52d972dd6e691efaaaedzzlvthffvl', 'zzlvthffvl', '219.147.163.17', '1', 'lianv123', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('981', 'ssw1912@qq.com', '9ca39d1493c9bc41b6b1fa2a4bc46e98aa4e8bb2', '1515722696', '0', '67cd86cb5a499558466f93412a52f611862ihnswwnnie', 'ihnswwnnie', '117.152.231.213', '2', 'qq277483056', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('982', 'hlj58@163.com', '0ce6e3c29aaf0ecc18391ec12b30986fd1e0328e', '1515722869', '0', '5a04249612286bdebeac84a7107960c1wlvahrpzyp', 'wlvahrpzyp', '60.186.151.78', '1', 'crazylanger', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('983', '920425071@qq.com', 'bf5c0b1259e53035775e584099107d49b9866f90', '1515722890', '0', '0afa8fbfdbfbc757cb06fd5135554252czkqpexolb', 'czkqpexolb', '117.151.57.176', '2', 'boy8633', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('984', '18668298232@126.com', 'a3b6392a4f51348e01f1fc1535e9fb447c65985e', '1515723025', '0', 'c2b1070797c740c70a783ce9687fed21klrtzglpgd', 'klrtzglpgd', '112.17.245.18', '2', 'smartwill', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('985', '18666633881@163.com', '3c3660c5db414027462ab9e351ddac8b664194f5', '1515723082', '0', '394b8d130457093d4da36bc9e759edf6vfjtvrndtd', 'vfjtvrndtd', '116.27.133.103', '1', 'Zoujoe123', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('986', '158055836@qq.com', 'd8fc2d78f99d50474892356b484b6cc908d4a7f9', '1515723114', '0', 'tqfj6i9erfar5l9f5j2srr5big986yawrmushjd', 'yawrmushjd', '183.197.99.18', '1', '杨波', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('987', 'hukaige92@gmail.com', 'c4643c5de53c0af5e587b47395d894270940a7b1', '1515723143', '0', 'keq4sgtcbbuqbs4omk3p4q71i2987zkrgegmiqb', 'zkrgegmiqb', '73.232.190.80', '1', 'kaige1992', '3', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('988', '649891423@qq.com', 'e082262f2224741275d597cd663ada7b3512ca42', '1515723357', '0', '5dacc58b6da8121db4ccc276fd09ed90gcwztjcvrc', 'gcwztjcvrc', '124.65.100.118', '1', 'love6292664', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('989', '353571050@qq.com', 'bfe65c0d8875d657a2461a91d2f291918f906b93', '1515723408', '0', '2971d33dbb4645a3006db073fd9a1f8dsyktmjknxb', 'syktmjknxb', '14.122.150.232', '1', 'xinve', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('990', '332633211@qq.com', 'd507d20978744a58034786470deb74bda7c43392', '1515723413', '0', '914dd5a92d9f936b75172450b2ab735cuuaqtuyroc', 'uuaqtuyroc', '113.91.188.140', '1', 'EASON', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('991', 'chenlanglang2017@gmail.com', 'f80da5db54ba8af84768dd78d09dbe11e649d382', '1515723421', '0', '6ac7564fa6dba7ba438513a846f712dc875nbunhnbyns', 'nbunhnbyns', '119.123.74.203', '1', 'long', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('992', 'zhouyutong7@hotmail.com', '922fafca8c9c9789f14e5dfaa2b1be682b39be9b', '1515723438', '0', '', 'kjtdnpajox', '42.60.14.88', '2', 'edithchow', '0', '新加坡', '', '');
INSERT INTO `aac_walluser` VALUES ('993', '569554266@qq.com', 'a0fdc9cfa52b2559971f59f66838243904c8123d', '1515723477', '0', 'ac8229622af799fe8b9181e8095c97fafiesacxlge', 'fiesacxlge', '106.114.65.220', '1', '郑海龙', '2', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('994', 'cherria@3jiaoxing.com', '006f39dd4acc3f215162bb4c4dca2f6ab34ffde2', '1515723493', '0', '6e4ca9b6b3a92db08861f3e97e428d36eqcoelshrk', 'eqcoelshrk', '125.35.65.202', '1', '橙子', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('995', '121044801@qq.com', 'd04e41a3e0c80fc7cad0e7afefc8bddde50d8400', '1515723516', '0', 'd90f795bec8120f85bcbeff8863776eerbialbyfgh', 'rbialbyfgh', '123.234.130.122', '1', 'guorui349', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('996', 'gaopengjidi@126.com', '8b1fa3e05b82db5d8f3f76b75910e65c406fbb25', '1515723549', '0', 'decc6c9f7d7dc567cfed830637fb24d1huewbuwvbi', 'huewbuwvbi', '222.171.169.250', '1', '15304841009', '1', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('997', '1340519774@qq.com', 'bcb490b4966f6781082e335a665519108370fbad', '1515723668', '0', '418fa99f8c3eaba3ded0a2e3f2e1953edzbzqucmjv', 'dzbzqucmjv', '223.90.68.178', '1', 'acuteangle01', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('998', 'hu_966@126.com', '80a1b992150c7bb4b357af6b1d31a500c107856b', '1515723716', '0', '9e4b9e052df97456840b8c7877d9f763mqibtjtvjc', 'mqibtjtvjc', '120.8.135.225', '1', 'hu_966@126.com', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('999', '737705356@qq.com', 'a96061dc58bd0b6220dca8a98dcb066042aa6e45', '1515760390', '0', 'ma10vo78v3ptsv0fgatev30cejhdvmsedplq', 'hdvmsedplq', '223.72.94.84, 123.150.182.206', '2', 'xugeyuan', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1000', 'tangyunlu1974@gmail.com', 'eb2b7661d3534ae4d235f462e5db82129b40239f', '1515762685', '0', 'mrj93471b1ecegm06shvs3ktomibmiuzvczs', 'ibmiuzvczs', '195.14.181.134', '2', 'tangyun', '0', '立陶宛', '', '');
INSERT INTO `aac_walluser` VALUES ('1001', '453207291@qq.com', '408f131951f9b465c3f60bd13454c53b80c28eb5', '1515765696', '0', '1lilngikh3vaqrljtip5uc7l2gfajbzbkwuv', 'fajbzbkwuv', '14.217.202.146', '2', 'dark9158', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1002', 'maniakbitcoin@gmail.com', '4c045f06d233f9490d583d766001bc498bd7c34d', '1515765701', '0', 'feer3ice0a0eu6oq7ge0p2v4cdxlsvpjtxqj', 'xlsvpjtxqj', '36.69.2.32', '2', 'maniakbtc', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1003', '676668309@qq.com', 'dad2b1a2d18b0a5f95fef01a2c8f13cccd6cead6', '1515765706', '0', 'nvjgqh2hthh5q411bh2chgm0rpwgvpqghtqx', 'wgvpqghtqx', '112.244.136.182', '1', '文小庸', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1004', 'crypto.my.future@gmail.com', '879cc6209a5cb8f982c4c7b78b7e8fb1b4652c0b', '1515765764', '0', 'dkfkjouroc9th13qe2rd8bdi33skpxaqlwon', 'skpxaqlwon', '109.168.240.12', '2', 'CryptoMyFuture', '0', '俄罗斯', '', '');
INSERT INTO `aac_walluser` VALUES ('1005', 'gerdabhav@gmail.com', 'dbff3c9fc8e49de47bcf749f75b1bd96752c782e', '1515766042', '0', 'v5ctlg08fn4ir5ij5tsunbhd851005djvvqvlath', 'djvvqvlath', '160.178.236.90', '2', 'gerdabhav', '0', '摩洛哥', '', '');
INSERT INTO `aac_walluser` VALUES ('1006', 'inochisoftware@gmail.com', '823d95b03126e2570bb6fd633a3881d4b61ea8fe', '1515766308', '0', 'ar2jkrvuk18jnt6n6ohigcm94ebxurfsazls', 'bxurfsazls', '36.79.249.53', '2', 'cerutu', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1007', 'leiruobinghen@gmail.com', 'beb9b73dedc5d154020d69c88ea6b06115cb8069', '1515770094', '0', 'vr97fdph0i781d5loemoq2439ogypktrnszk', 'gypktrnszk', '111.197.20.64', '1', 'leiruobinghen', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1008', 'xws3311@gmail.com', 'd7afdb48275b254e05e56a3d2aed825ea3774fc3', '1515774637', '0', 't9c3d58dic3ibln5qgml8u15hgtmrmwfkyxk', 'tmrmwfkyxk', '104.225.154.11', '2', 'xws3311', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1009', 'ekyonn@gmail.com', '98cdfc6b9f9079d5f1ee82acbdbaf131e4ce8e67', '1515774937', '0', 'r5dnb8in7lsn9mb9g4fjjej6ehemfytgxgxg', 'emfytgxgxg', '92.130.164.58', '2', 'ekyonn', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1010', '1020440380@qq.com', 'b13c9e8255c91168d250371c6f666ebdaad4daee', '1515775444', '0', 'b5eoqdslbmhcanfnjkiabqv75aijhdmovane', 'ijhdmovane', '124.166.232.26', '1', 'Laim', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1011', 'korotenko164@gmail.com', '951ff2af81aeee124ebda894d83013773bee6d4e', '1515780192', '0', 'bck2er1hi2oikdoa6usmtqpl51sgfbkxowko', 'sgfbkxowko', '37.150.1.54', '2', 'lonchak', '0', '哈萨克斯坦', '', '');
INSERT INTO `aac_walluser` VALUES ('1012', 'brhnk61@gmail.com', 'd99f288861e7cfa09c9472afbc1e36efaf3e4f27', '1517800202', '0', '7bs5ne24b6gr29ccb6526fdpnh1012bwbqzjnilp', 'bwbqzjnilp', '95.10.2.44', '2', 'brhnk61', '0', '土耳其', '', '');
INSERT INTO `aac_walluser` VALUES ('1013', 'nikita_korneev1405@mail.ru', 'b9036fc5f8e9d02dd8b61fe67207bfd6667e0965', '1515784768', '0', 'orrkhpsbm42v69319t4bfqp9u9dukokwkjgv', 'dukokwkjgv', '95.37.74.203', '2', 'Potato18', '0', '俄罗斯', '', '');
INSERT INTO `aac_walluser` VALUES ('1014', 'Romerojake15@gmail.com', '00b0b9145aef9f08814a1159ea78920a9cb9110f', '1515786822', '0', 'pk5od3vivcpl5g5jdajhgndo6atsgbbybhkp', 'tsgbbybhkp', '108.205.252.58', '2', 'Crazyjakecrazy', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1015', '2pricecom@gmail.com', '2c2071aefafcf50df83b61085dff7c31a032450f', '1515787455', '0', '26244ea7hmj6lna935hsh0cpffgibkwcqnyw', 'gibkwcqnyw', '77.111.244.30', '2', 'somov', '0', '挪威', '', '');
INSERT INTO `aac_walluser` VALUES ('1016', 'crypto.airdrop88@gmail.com', 'ab6a02d30af0575e9de8c0c3dc3573d44e5cc1b1', '1515792128', '0', 'feor2vpsfhhq0un09eqm6vkibs1016xalldxcglq', 'xalldxcglq', '93.40.188.105', '2', 'crypto.airdrop', '0', '意大利', '', '');
INSERT INTO `aac_walluser` VALUES ('1017', 'ferdi07@outlook.com', '8cf102247b75d2af8bc85cafc84e20019044d7ad', '1515799215', '0', '301n6hscv3tj44ib536l4nisjspousxmzkvm', 'pousxmzkvm', '159.146.36.189', '2', 'avrasya07', '0', '土耳其', '', '');
INSERT INTO `aac_walluser` VALUES ('1018', '40341562@qq.com', '92f58590540ba55633278452a919f0f50d9867ef', '1515807120', '0', '5iv6618l8igaqqf5ock3d2tuqepgdejbwdyh', 'pgdejbwdyh', '221.192.180.162', '1', 'haiiii', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1019', 'andradejane25@gmail.com', '1e53dfe5a445bcdab6b90b53e3c24792ed0ae4bf', '1515808325', '0', 'afg7ai8ajhgjb0ldeuavrkqj6q1019hrostxcxdp', 'hrostxcxdp', '175.158.225.61', '2', 'kayortoid', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1020', 'butasi679@gmail.com', '4588e7fef0f4694035ca2cd16f6c275a8a491e93', '1515808739', '0', 'uj772r4c592uq9nkkccgvbghf0dfbtopctmo', 'dfbtopctmo', '117.214.223.139', '2', 'montu', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1021', 'Dzakijanuzaj@gmail.com', '936ae8a1634c727e9cd05b174027c6ce387fd5d6', '1515808795', '0', '0bp26k3ovgtpod75ih3hjljjfvmfeimykdvo', 'mfeimykdvo', '114.125.23.67', '2', 'Andhyka20', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1022', '1218018158@qq.com', '8808b35ddc07b982e09f1389e1f9493531184177', '1515810193', '0', 'lfh9tcv3o3ci2koaa803qbpob91022gnrtlzxhei', 'gnrtlzxhei', '114.94.70.96', '2', 'tmacchenqi', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1023', '86372699@qq.com', 'c9c17bd9837a8ee99f4edb05949fcec1c2ef8584', '1515812332', '0', 'kdhs9h0cvdjlfel29tf074nrecwleqlnqoym', 'wleqlnqoym', '125.125.176.26', '1', 'xavierxzj', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1024', '18616511692@163.com', '1cbd0b88c88628b30ad9afc92b5c37254942356c', '1515813188', '0', '', 'fxkfvmdewq', '116.235.22.13', '2', 'kejianfeng', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1025', 'wynata@gmail.com', '768e6823bbed3a6f3bbc11a7370e69d00c286ceb', '1515816496', '0', '', 'xbctsbpozb', '103.213.129.126', '2', 'cryptocx', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1026', 'ramee@mohmal.com', 'd9cf1d50fc2986935784ca36c867a36be9af54c1', '1515820321', '0', 'oa1ei205oqqk0m9n408bke6f92vygrrennji', 'vygrrennji', '23.27.248.62', '2', 'ramee', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1027', 'qq3308490@gmail.com', 'b616ebaa770a6739d9b0aca087915541d41ff372', '1515820744', '0', 'ohnb6d312mvf5a42pgrn5q46v71027fzmknylotg', 'fzmknylotg', '113.37.216.217', '1', 'qq3308490', '0', '日本', '', '');
INSERT INTO `aac_walluser` VALUES ('1028', 'yrs20181818@gmail.com', 'f28248fc35d627b4ee61c3ed90dd9c5b7356b853', '1515823577', '0', 'uqu194d1ddqudsh1l43i9p1vg5lmypvcszwj', 'lmypvcszwj', '36.102.234.47, 45.77.11.244', '1', 'yrsnb', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1029', 'phuchoang14@icloud.com', '248933b4b6e5d7ac4dbbfac09729e38e1713d7a1', '1515824114', '0', 'e3ur1iaj2sjpjur4kth1ijv95qneuyxpxjjd', 'neuyxpxjjd', '14.161.18.83', '2', 'phuchoang14', '0', '越南', '', '');
INSERT INTO `aac_walluser` VALUES ('1030', 'kevandcel@gmail.com', '2c139c40c1229393d504879b5d4c4eef9d952e45', '1515825673', '0', 'j0837aqeaf92kjv2k0hju1su6fxfqjigcpoj', 'xfqjigcpoj', '139.59.64.151', '2', 'kcelo22', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1031', 'htha5iu66uue6drthkb9vvxjsrl8yw@gmail.com', '6fb6ec5432da0d8987e6dcd87619e642b7171388', '1515827342', '0', 'ckhe2scredgla8f2fhnuk4e3qvigetgjxmiu', 'igetgjxmiu', '120.188.65.155', '2', 'Wahjoedi', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1032', 'lbraydean@gmail.com', 'df7296abc1d8bf39f9fcd01a529de6bc78bb16a2', '1515827669', '0', '', 'jmuonagmvc', '110.54.171.48', '2', 'Braydean', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1033', '641516191@qq.com', 'c2e9c3610f2cc9d1335dbdce9763b51ca41b417c', '1515827704', '0', 'r7miuu539jc7vav8aiucmirb9pjudkgbsqkk', 'judkgbsqkk', '115.52.170.13', '1', 'omg82601', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1034', '519826594@qq.com', 'f4da40af41f536b7e86dd9ffc457dac3e126ac80', '1515835942', '0', 'mcbssq4cgv2ppap9iik3265q02wiudojfgvu', 'wiudojfgvu', '121.237.252.14', '1', 'blw7758258', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1035', 'garyvincent78670@gmail.com', '29d60b01eb648d9cf0e53594f295888b8ce6a9be', '1515840058', '0', 'orjb8a0u378to139m3g4sbc095nqxmczzzty', 'nqxmczzzty', '87.88.26.37', '2', 'vincent', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1036', '157211156@qq.com', '2e42be1d2d9ab1703224899bdf836dcb93e1fd28', '1515842653', '0', 'ng4icng5g7hsrijmqbkqr0v39reudetrcdwg', 'eudetrcdwg', '120.40.29.84', '1', 'jaylu', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1037', '530495983@qq.com', '923a0a0a5819a1f4896afa2c30d207ebdb1b14d4', '1515843928', '0', 'c4tr03kcdibgqg9hag8uj650ngaueeixgpej', 'aueeixgpej', '118.212.135.123', '1', '下下', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1038', 'zecevic.danijel@gmail.com', '108e073f3e0a9141415ca1d7f35247673d99fc00', '1515844094', '0', '1udl799e4e0gu85vku6gp6vsljzpjpclswsj', 'zpjpclswsj', '188.230.146.240', '2', 'danijelz', '0', '斯洛文尼亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1039', '329267362@qq.com', 'e91cde3d9dd5bd198f555b2d8621becedf3738bf', '1515845178', '0', '45c1kd6f9bb4r3srige47r7tnh1039hhrfkynsft', 'hhrfkynsft', '111.204.16.4', '1', 'gzj123', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1040', 'ico.bizon@gmail.com', '08e62b208909b63f85147ad0ae186aca3733b6c0', '1515845260', '0', 'mda7ngqilu74nrq9ubgvp20uvfyclcoimzrr', 'yclcoimzrr', '31.134.191.26', '2', 'Al_Biz', '0', '俄罗斯', '', '');
INSERT INTO `aac_walluser` VALUES ('1041', 'perkristian.storli@gmail.com', '4d3b1cf566fbcad6b165176d422b3323c972acc0', '1515845894', '0', '94ork6korhjn8ultj6np7e20ov1041kqiltkwvpu', 'kqiltkwvpu', '85.164.22.112', '2', 'Zaiox', '0', '挪威', '', '');
INSERT INTO `aac_walluser` VALUES ('1042', 'uttamchauhan880@gmail.com', '5739368e1a4e55f04f0b42f14f43864b47daa563', '1515846002', '0', 'eid9m2m4qse7qst1bnlidjv6vb1042gbzqpynjkp', 'gbzqpynjkp', '106.219.191.14', '2', 'koolkhiladi', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1043', '215722532@qq.com', 'a4606ae70f775b5d74974658f748dc24e1c2dd62', '1515846346', '0', 'fd59ak1mdltofoc72otbef1a9c1043wroyomkmbu', 'wroyomkmbu', '123.234.245.54, 123.151.77.49', '2', 'dp0000', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1044', 'kimloai@gmail.com', '318a967e30d2800ba8fc2e9ac20c61d092b75b3b', '1515846421', '0', 'p2jsn2939n4in6thoppkf2192cexmoriprwz', 'exmoriprwz', '116.102.38.169', '2', 'justindo', '0', '越南', '', '');
INSERT INTO `aac_walluser` VALUES ('1045', 'tejassathvara@gmail.com', 'ccddc68000347c50ed74fe223ebb0bb5b1dd12c8', '1515846495', '0', '114pmbm8al5jo3hdlolo0pdoqbnplemfehsy', 'nplemfehsy', '117.196.36.160', '2', 'taera249', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1046', 'jaylan.quinalgames@gmail.com', '31a564ec051cee3a34cb2ec9fcdded7ca23693c9', '1515846537', '0', '8k7m7as47gtp9v8c7g7tlns7ghzqoicrvdpj', 'zqoicrvdpj', '110.54.212.32', '2', 'Ispurmjay', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1047', 'rozzyalim@gmail.com', '9685cd67ea083a7be2d5f6722d81e08850b8c54b', '1515846703', '0', 'mft68fig9v03ilr904ocsf4b2brsijxwrruz', 'rsijxwrruz', '105.58.62.225', '2', 'rozzyalim', '0', '肯尼亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1048', 'landung_0952@yahoo.co.id', 'cb3c59f2079419dcab90be7a419f92626a0abaf3', '1515846717', '0', 'g627o31ef3q54sfkn982klgqh6ucdoijuudr', 'ucdoijuudr', '120.188.77.61', '2', 'Landung_0125', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1049', 'paulshimbal@gmail.com', 'd30fff2ad9cf27f8660c12fb56439a8ca3eb4915', '1515846986', '0', 'jun35ghboihbgcqf3180tj941vyqyqooqzpe', 'yqyqooqzpe', '197.211.63.82', '2', 'gamsam', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1050', 'crypto.kusno@yahoo.com', '59993c0fafdaa75e5ed4a8196fbf65b928e9b61d', '1515847495', '0', 's2n42h365h3rvqe7t6f7chi0qgbasjtuzfug', 'basjtuzfug', '114.124.175.122', '2', 'Kusno07', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1051', 'osa.peter@gmail.com', '94a11a02c0e982b791209be06e7f373e999482ea', '1515847532', '0', 'dppcovgkvljjf70qrvbvanli4uzjffdldzgu', 'zjffdldzgu', '197.211.63.166', '2', 'Osap', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1052', 'Sheikhwaqas1991@gmail.com', 'f9401c557cb23255c74c1fefa277115392f57469', '1515847707', '0', '', 'avoixuewnm', '51.39.95.153', '2', 'Sheikhwaqas', '0', '沙特阿拉伯', '', '');
INSERT INTO `aac_walluser` VALUES ('1053', 'cd1mthomas@gmail.com', 'e2ad3b07c3e1e3036b0415a6aaae728d489fe5ed', '1515847807', '0', '85i3m8q2su6uo9c0lqp14ok9o61053ugpjuetvid', 'ugpjuetvid', '83.216.95.114', '2', 'raggawizard', '0', '英国', '', '');
INSERT INTO `aac_walluser` VALUES ('1054', 'akirilenko222@gmail.com', '26d8955fd168a9a5ef3ed5a7b2107c45202b7516', '1515848219', '0', 'ki40t3nra4s2b1rjjf4g5aequv1054erdddgyoff', 'erdddgyoff', '185.29.252.74', '2', 'Aleksey', '0', '乌克兰', '', '');
INSERT INTO `aac_walluser` VALUES ('1055', 'mlouveau.ml@gmail.com', '88fe05296b0ede6fb7d9bf1e801f432f84c11700', '1515848515', '0', '', 'dzsawwlkeb', '89.2.139.88', '2', 'VIKOR27', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1056', 'atia.habibullah@gmail.com', '5060cfd685eb3ff635c30ebaff6977fbcd12b673', '1515848850', '0', 'g9bg6u8hlo8ctp4lhvs2jv4r63ltdwmymalu', 'ltdwmymalu', '86.98.96.96', '2', 'Attia', '0', '阿联酋', '', '');
INSERT INTO `aac_walluser` VALUES ('1057', '13520078111@139.com', '0a61fb21f3b264cf853539a070ec321d351e1c74', '1515849610', '0', 'ekp1bbl5fobvv64a2i7nmlkuadwogxnvqzas', 'wogxnvqzas', '223.255.127.174', '1', 'long1977', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1058', 'referells.2015@gmail.com', 'b4c53fbe52ea13d2bec15e944be75bbbf7d50d8b', '1515850864', '0', 'f6tqq74c3ubnjiegvg8thjckesxzcbhifalx', 'xzcbhifalx', '46.219.214.169', '2', 'bit77ok', '0', '乌克兰', '', '');
INSERT INTO `aac_walluser` VALUES ('1059', 'reblchill@gmx.fr', '1d4ba939a1e3fb5a35820dc76b9c46089d4a60dd', '1515851212', '0', 'j9vsp17hr9suucorss4tu619ckshnqvkxoht', 'shnqvkxoht', '78.232.147.51', '2', 'reblchill', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1060', 'pahjusx@yahoo.co.uk', '0eaceee8ab0f15e35db0b1a1034968be5facc0ed', '1515851845', '0', '', 'bgedxopcdw', '105.112.44.255', '2', 'Pahjusx', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1061', 'ch2mahmud@gmail.com', 'caf3f7e5cf5bc4ced52b81d59f4ff416ff6a153d', '1515852695', '0', '67e9e93q0gl0ekhe0h57u9gbb6ygyaejlvrr', 'ygyaejlvrr', '42.60.28.11', '2', 'ch2mahmud', '0', '新加坡', '', '');
INSERT INTO `aac_walluser` VALUES ('1062', 'erdberer5315@gmail.com', '211c6aab4d832922331e0c19f870b37b98aaf84d', '1515853437', '0', 'jlru3blptv15gn6fajlrk0m4jdencwzjvpps', 'encwzjvpps', '178.10.90.78', '2', 'Lookout', '0', '德国', '', '');
INSERT INTO `aac_walluser` VALUES ('1063', 'maxthon@qq.com', 'ff14c3537cfdad0bc077f5b93a263b2e1c698c46', '1519378145', '0', 'g8k7835jid9c3rttensm19pc8e1063nenrjfvkfp', 'nenrjfvkfp', '218.86.97.207', '1', 'tian_cn', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1064', '29973738@qq.com', '07881efcc7bab924b2343999cfdafcfce47cf04f', '1515854771', '0', 'ok0ssdehouh79eq4i9t7d2p5a8qazntwdgyp', 'qazntwdgyp', '117.151.62.246', '1', 'inght', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1065', 'drlinhca@gmail.com', '2a821d265c3846ed373c9cc85b26e9d6ff248faa', '1515856008', '0', '0s8npqao17jufj4v7aiurlcehozxqwqvcays', 'zxqwqvcays', '14.236.43.152', '2', 'linhkaka', '0', '越南', '', '');
INSERT INTO `aac_walluser` VALUES ('1066', 'kkont96@gmail.com', '51a5c590e1a4433e360775edc3161032c1ed7ae8', '1515856457', '0', 'h2hhukqjt8um7ljq0nmia1ovi01066ilcankolws', 'ilcankolws', '77.111.244.15', '2', 'kkont96', '0', '挪威', '', '');
INSERT INTO `aac_walluser` VALUES ('1067', 'hamer113013@gmail.com', '7a994baf681adfc095872486f6f29a016d83ff7d', '1515856673', '0', 'g8gsoc9f3rlh81bld9r13vdf8mqhcavhcmha', 'qhcavhcmha', '176.67.103.66', '2', 'haniamer', '0', '巴勒斯坦', '', '');
INSERT INTO `aac_walluser` VALUES ('1068', 'marc.khunn@gmail.com', '63a7461fb775562757f6684950a41732c026d8fe', '1515856879', '0', 'vcd658b98bvkjhip1oh915hgtdeqqqqwvtzc', 'eqqqqwvtzc', '49.148.67.9', '2', '3zy', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1069', 'hindash1234@gmail.com', 'b5577fc47d33abf5fc6e6a1ede7eaf639465ac2e', '1515857441', '0', 's8tg0d520f82eqg5qskcvnjqganrqlieymul', 'nrqlieymul', '37.202.92.68', '2', 'modash', '0', '约旦', '', '');
INSERT INTO `aac_walluser` VALUES ('1070', 'aljorieanngonzales.29@gmail.com', '1ddff1054b9c396ac2860ad2cab305f4cd1ea305', '1515857519', '0', '', 'drcbvaybpb', '112.202.175.228', '2', 'kittymeow', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1071', 'hih87@bk.ru', '2b42540d1c0f7ceb070bceea212d2c291f084502', '1515857540', '0', '9u64tc4ekmqdm8lgihourd2e7f1071ndgybysneg', 'ndgybysneg', '87.117.60.229', '2', 'AleksM', '0', '俄罗斯', '', '');
INSERT INTO `aac_walluser` VALUES ('1072', 'muizharoon@gmail.com', 'dc93845bd07a3678aacf6aa8b6fb890fa79eacd7', '1515857958', '0', '2bardmhpf1846ot7akvlrcrscbvrgdaedbjm', 'vrgdaedbjm', '182.190.39.206', '2', 'muiz', '0', '巴基斯坦', '', '');
INSERT INTO `aac_walluser` VALUES ('1073', 'reyes.rachelle0509@gmail.com', '5514ae2cd9dbb9810f7a29b18550c613247be66c', '1515858979', '0', '3fvqillhv5ehr71rqqp71no0mkupanvbhpmg', 'upanvbhpmg', '173.244.217.156', '2', 'Crytagal', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1074', 'vtanwar001@yahoo.com', '2c3dce0fd8afba1c9aa31085447686ff2c73048a', '1515859261', '0', 't928aqh5vsn62tsbnskr263fr8ycyqvefrca', 'ycyqvefrca', '223.188.229.125', '2', 'vtanwar001', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1075', 'hassanalzaza@yahoo.com', 'dd2285a2f74a12cf2b8ab31288df67791681c4ba', '1515859281', '0', '27b1pilsgtt0c0ef4efasr05q61075bjamoqibnx', 'bjamoqibnx', '77.177.238.231', '2', 'HasZa', '0', '德国', '', '');
INSERT INTO `aac_walluser` VALUES ('1076', 'rajbirranjit@yahoo.in', 'ca47d48b9211c92cd79b972615fa6ea50f41b3c8', '1515860033', '0', 'l2bd997baigd1vl7dfl78sds681076mmlgihjghw', 'mmlgihjghw', '49.14.96.9', '2', 'ranjit88723', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1077', 'jocelinocrs@gmail.com', 'a5ae6f1073d5c899bd912bd20df73186f680c702', '1515862119', '0', 'l4343kp1ru7l5ftt1544cuc0a6qqbmrcofaw', 'qqbmrcofaw', '177.98.87.95', '2', 'jocelinocrs', '0', '巴西', '', '');
INSERT INTO `aac_walluser` VALUES ('1078', 'iamshaukatpatel@gmail.com', '2776c2b701529a7cca527cc113d8e18f6e5c2b15', '1515862620', '0', '0jujp8ruu7svjih3omdrbhh7kgojxroynpbb', 'ojxroynpbb', '90.255.218.182', '2', 'Iamshaukatpatel', '0', '英国', '', '');
INSERT INTO `aac_walluser` VALUES ('1079', '290119322@qq.com', '949699d6fb25fb9eb5f4e2b9fb5ebb39ff825390', '1515863140', '0', 'trbich7am5e3b82a088jqvea9ueztmvmpxtf', 'eztmvmpxtf', '183.141.188.239', '1', 'nicholasljr', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1080', 'Complexprocess@protonmail.com', 'a35233e37c152a92ef966c8871a6eccc9f21d3be', '1515866027', '0', '8ukocq2p6sq55qa3pq34afqa4buprwynxjgm', 'uprwynxjgm', '78.208.168.114', '2', 'Complexprocess', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1081', 'bhatta703@gmail.com', 'bace782aa829d227e0ccfddf8964e31560235ec6', '1515866113', '0', '4uvbe60cjs5m4isa7lit4q9ti71081ygnaepgqtv', 'ygnaepgqtv', '59.89.60.3', '2', 'bhatta703', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1082', 'Augwest151@gmail.com', '3d3a8d1d5718f8dca244dd0ab8122d9f9fb33287', '1515868474', '0', '4jblvkr954jfi5rfjehksbhig9fejnluycqp', 'fejnluycqp', '172.56.42.60', '2', 'Augwest', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1083', 'myseamas@gmail.com', 'f6de675faf0f339cef644993902a11476ee93075', '1515871012', '0', 'k7f7c1uh5gngjm2m01ca3k0i1rhmxmackmdz', 'hmxmackmdz', '41.75.201.150', '2', 'seamasfriday', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1084', 'oediv47@yahoo.com.sg', '945660b21d23e590847e8c63563402fbe26ccb54', '1515871303', '0', 'oeuas2u4g5qlf8udjaq58per8c1084xsoffxwjcq', 'xsoffxwjcq', '203.117.142.109', '2', 'Oediv47', '0', '新加坡', '', '');
INSERT INTO `aac_walluser` VALUES ('1085', 'ljuba.ristic@yahoo.com', '9bdddf2a9ae8eca385d7f6a9921d0e926ad4f0fe', '1518784191', '0', '', 'zgretpummp', '93.87.206.145', '2', 'ljuba', '0', '塞尔维亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1086', 'alaxrai234512@gmail.com', 'e23e412c58d2d5677fe22c82d962f63deaa82a48', '1515874385', '0', 'b6n3v3a6dufl73livbphqkp5bepqdokxizzv', 'pqdokxizzv', '103.255.4.32', '2', 'alaxrai234512', '0', '巴基斯坦', '', '');
INSERT INTO `aac_walluser` VALUES ('1087', '075aamin@gmail.com', 'f678e6ade726501b9f24fa3bee0610152ac4b647', '1515874467', '0', 'fp2b3dbgfdjvbov1cfkmqboqk71087zfmafhioht', 'zfmafhioht', '129.45.0.16', '2', 'hhichem', '0', '阿尔及利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1088', 'mousamory@gmail.com', 'a3a3360174c6c21d137642a4cadf6ad61bd73cba', '1515881144', '0', 'ad195a5023cgcf1ib96pogr3d8qnewwbvcdl', 'qnewwbvcdl', '62.68.52.160', '2', 'mousamory', '0', '利比亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1089', 'patonuwa1980@gmail.com', '871dcb359c5afae104e0817d5865c17a08ddfe08', '1515881682', '0', 'knggtcvir5tt9b4q7vbrghi3jjrzqxoidmto', 'rzqxoidmto', '105.112.18.18', '2', 'pat4wise', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1090', 'coinzak@gmail.com', 'a03c0515d750924f3510859ab20fa10cf95810cd', '1515883992', '0', 'j0p0k4m8l1l3q47ccgcsnau6vcvawaphhyjb', 'vawaphhyjb', '87.116.178.199', '2', 'Mike', '0', '塞尔维亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1091', 'Emmyolly1@gmail.com', '9e76088e640bc6b1ac7ae204bd28e8aae34cf24f', '1515884040', '0', 'flbbau4lqhdj9uqc0n8i0l891ihhcwylznxq', 'hhcwylznxq', '197.211.53.246', '2', 'Blesslab1', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1092', 'craig.geswindt@gmail.com', '3e3cd21a74008d246973e02094c6f384a785f2e3', '1515886338', '0', 'uf6poubou4392il229pg71teb6bfktmnxpsv', 'bfktmnxpsv', '41.30.128.41', '2', 'cryptocraig', '0', '南非', '', '');
INSERT INTO `aac_walluser` VALUES ('1093', '574291628@qq.com', '38dea3da3883795e9e9ec4bda102ba5070396e4a', '1515891108', '0', 'gm87591m4k1okc5umumkiuukgtovaxkjcwyb', 'ovaxkjcwyb', '14.201.79.22', '2', '574291628', '0', '澳大利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1094', '702111694@qq.com', 'deb3f3cb0ce1ab641897e5c1b5fc868028e0ea3b', '1515893458', '0', 'jsj5od31mhso3jlhilcffpghs2xfdcbwtkui', 'xfdcbwtkui', '122.5.120.219', '1', '胡琼', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1095', 'tom@tomkandziora.com', '7c644ede0583305b7080c6fd73421ec387a8914f', '1515895869', '0', '4tefqsg3fb3c9ua8utrpi606oloniptaaela', 'oniptaaela', '178.23.129.249', '2', 'north-pole', '0', '英国', '', '');
INSERT INTO `aac_walluser` VALUES ('1096', '18329187@qq.com', '1fec99e47cb745155e766fa7e7d498045f709e6e', '1515901173', '0', '0nm500b43ga4htui020d4h2d3gtpxgumvodt', 'tpxgumvodt', '106.112.70.95', '1', 'xtlg1982', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1097', '2534237498@qq.com', '50b257f450f9cab27398ae4ccb6795e2c85f8b6c', '1515901795', '0', '11arcb6clgick67uqm28j0rkajxfrrlrcvnw', 'xfrrlrcvnw', '14.155.157.19', '1', 'flyming', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1098', 'zhuangel@hotmail.com', 'f9454004aa8306c39831ab5fcb34716209b3af78', '1515903808', '0', '6f1qijcejthct08h5e8hf6r6t5vsrlnffqeo', 'vsrlnffqeo', '182.150.44.28', '1', 'zhuangel', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1099', 'khavinshankar@gmail.com', '6412f96be88c9f84b0275ce8e43d1968e688f954', '1515904097', '0', 'd1sn0lbf70dersh1olbbmldre21099dbbrisfzad', 'dbbrisfzad', '223.182.196.133', '2', 'khavinshankar', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1100', 'inopebrian@gmail.com', '7fa59ed3ccabf13844ec9f82d54a6b19ad9ac1cf', '1515911355', '0', 'vlbiqd6qkmq2bg4bbr6fl6870d1100nalnbxfyzd', 'nalnbxfyzd', '114.142.169.0', '2', 'irfan86', '0', '印度尼西亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1101', '1468175205@qq.com', '9e81007475bba4f6fe11eca847ab6f19ff1112b6', '1515913690', '0', 'aac37ta4t2k3kht6p6piquedf7snelamgbjj', 'snelamgbjj', '58.251.231.172', '1', 'TOP', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1102', 'zwscdz@126.com', '94045ba5203e6e65eec69a1b3e143544b20e032a', '1515918118', '0', '66hb2f4jlr293inlgmdp4oe1ocfoarkpbjka', 'foarkpbjka', '175.44.76.123', '1', 'zwscdz', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1103', 'vedantsainivedantsaini@gmail.com', 'c7d9a02a38a736bb8c5ebb502227216c85eb9ad8', '1515919123', '0', '8goqrp3dkuf8oh4dhhd4d1e1uctfkkyfghxc', 'tfkkyfghxc', '103.47.66.58', '2', 'Vedant1', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1104', 'mouradbens19@gmail.com', 'c044afc18db06fc2b289f90de6ac3be2313d2dac', '1515920107', '0', '', 'ehwvbldcex', '41.102.186.236', '2', 'mouradbens', '0', '阿尔及利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1105', 'jerliyhua@163.com', '05447d9e6a372b75e39e538df1fd3a3adbed073d', '1515922459', '0', '0bu3v66jdvulul5ba8t936q8cawzfbovfduu', 'wzfbovfduu', '183.40.211.166', '1', 'jerliyhua', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1106', 'ch.ayaang@gmail.com', '10ef6e3f24d0e044300c439a9327caabb48d3518', '1515923498', '0', '5mm4pt26kovb846aq5681tl4t3sjgcvhckvz', 'sjgcvhckvz', '110.36.228.222', '2', 'Hamzag', '0', '巴基斯坦', '', '');
INSERT INTO `aac_walluser` VALUES ('1107', 'hanifhasib2020@gmail.com', 'a806892f74c030cac8973c75c3df908b11d4a26a', '1515924320', '0', 'nvh68gkbvkv3q9rnob43e2pqtegkxpngciaa', 'gkxpngciaa', '43.239.73.70', '2', 'Hanif2020', '0', '孟加拉', '', '');
INSERT INTO `aac_walluser` VALUES ('1108', 'Thaxudapc@gmail.com', 'a947f205816b0ad4fd4f706ede2091d88c9f0b4d', '1515924959', '0', 'tgt2omvmlnd69q8gcljndifotkgtwddgbhgi', 'gtwddgbhgi', '27.79.27.208', '2', 'Nakamurapc', '0', '越南', '', '');
INSERT INTO `aac_walluser` VALUES ('1109', 'ironfist1122@yahoo.fr', 'acb37be1d1247e1ef1fafc376ef0ee4f739d3537', '1515925161', '0', '3dihkctmcssdrq17p6lm6mnvo7kxyomzecaq', 'kxyomzecaq', '77.129.72.91', '2', 'Ironfist112', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1110', 'Loyajoshua21@gmail.com', '559ed5da59e369e68b947cce275890fac3c5a699', '1515926437', '0', 'ku1s4a9jdtc5tv7t2o0b9act91eftwhboffx', 'eftwhboffx', '197.210.172.53', '2', 'Terseerloya', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1111', 'lucdinhphong1987st@gmail.com', '6e1966777608d92bf096397cd52f78182f65628e', '1515930457', '0', 'pcjepp0uaamunr841ga2capdk2iluyfkljle', 'iluyfkljle', '123.17.128.82', '2', 'bethemen', '0', '越南', '', '');
INSERT INTO `aac_walluser` VALUES ('1112', 'nicolasdescamps@hotmail.fr', 'af34751b379fa69c40e5d5e326090c950441e5a4', '1515930961', '0', '', 'khqozldvnl', '91.121.64.217', '2', 'nicoco28', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1113', 'axel.bon@yahoo.com', '0f5d13dec07978e16cdf4021fb31002c8feb689b', '1515931017', '0', 'c0mv2l9apuj9987t014ktt058rvyygwhhvsc', 'vyygwhhvsc', '110.50.162.41', '2', 'xian22', '0', '台湾', '', '');
INSERT INTO `aac_walluser` VALUES ('1114', '2766375787@qq.com', '33393b1e4fa73f85bb93dbfddb7234da6a38d01f', '1515932751', '0', 'd1f8g91r253819se5740qu61r1wnjocwjvwp', 'wnjocwjvwp', '218.56.195.151', '1', 'passenger', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1115', 'rory.syr@gmail.com', '6b612d93f6f39f84054e8dfaec3eeee9f800402a', '1515933560', '0', 'onc9qbop6im36r0vb60mtst4dqtywczqctpa', 'tywczqctpa', '77.30.221.21', '2', 'ruaayahya', '0', '沙特阿拉伯', '', '');
INSERT INTO `aac_walluser` VALUES ('1116', 'admhrust@gmail.com', '23cce9e27bd055c8305144418dcab6a178dd3224', '1515935027', '0', '8rojr44rm5ndfhi6l6i7bdkk19nfelmvjfnv', 'nfelmvjfnv', '176.118.51.6, 82.145.220.158', '2', 'admhrust', '0', '乌克兰', '', '');
INSERT INTO `aac_walluser` VALUES ('1117', 'jacdy008@163.com', 'ee99fddfa31a72a5999041d62fd9a8c080e5cc9e', '1515936225', '0', '7c0ga17ntqj950oro83ilgncsloioadvolao', 'oioadvolao', '123.246.79.238', '1', 'jacdy008', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1118', 'gayankolla1993@gmail.com', '4037d7b51bc5a11b456a1ca932efb737b08365fe', '1515937259', '0', 'qoinqiriuvb36f86ik3jlu8klvexicomiytq', 'exicomiytq', '112.135.4.124', '2', 'gaya123', '0', '斯里兰卡', '', '');
INSERT INTO `aac_walluser` VALUES ('1119', 'maxgame1000@aol.de', '275336d24c3b0abbee85d1700ac092ac3b559c76', '1515938355', '0', '3lb0fguio19n29r9girfndlj2dxgneudizyf', 'xgneudizyf', '206.72.205.106', '2', 'BobesBob', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1120', 'henry.monteil@gmail.com', '2b68e91518278d3e4fb296bcd89ed16285a12ec8', '1515945591', '0', '1t0tam73v3npp4alhvtd0e2hteeudhqatwyg', 'eudhqatwyg', '86.201.226.200', '2', 'HenryMtl', '0', '法国', '', '');
INSERT INTO `aac_walluser` VALUES ('1121', 'p.managave@gmail.com', '672b9b008b61669ada33835157071abd6a42f9fe', '1515949414', '0', 'q151khqq4kai9vb6posiupth4djxgvjiwamp', 'jxgvjiwamp', '49.35.220.157', '2', 'managavep', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1122', 'patrickjohnlosantas@gmail.com', 'dd99b0cefc1b8d8524ec0767e240dedf068194e2', '1515953262', '0', 'ivea4451rr9r8dms2uk09q88k5tkztvmvwni', 'tkztvmvwni', '110.54.205.132', '2', 'amigaz', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1123', 'nguyenminhphung21031996@gmail.com', '1580498c8885ae9e875462ef7bc70f5c37a36be4', '1515955290', '0', 'vjkajlqeugkcsren7h3li3jfstrytaudlayo', 'rytaudlayo', '42.112.224.47', '2', 'aye22ye', '0', '越南', '', '');
INSERT INTO `aac_walluser` VALUES ('1124', 'Dgfriedman@hotmail.com', 'dabdc23c9b0fb21a26a5e5fe754d802db722bbd5', '1515956086', '0', '38msq9l9hfhen224or110em0nj1124wqgigigpxj', 'wqgigigpxj', '71.38.250.8', '2', 'DavidGF', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1125', 'misha.paholchook@gmail.com', '54afd3cc76b38babe1bd086034adefe6f10cd105', '1515956221', '0', 'pkr6qlkih4r5g01e2f8mnp7015uszwqppigl', 'uszwqppigl', '212.111.203.250', '2', 'Misha', '0', '乌克兰', '', '');
INSERT INTO `aac_walluser` VALUES ('1126', 'forverts77@gmail.com', '0b67efaa1f5da8e90e85cd5c6a0d3966895dd730', '1515959385', '0', 'b8n396evtu3f46fosngjrhq1ujkzqffneqyg', 'kzqffneqyg', '188.163.110.26', '2', 'forvert', '0', '乌克兰', '', '');
INSERT INTO `aac_walluser` VALUES ('1127', 'peeyush.deepu@gmail.com', '27bab53c4259c6f2d22791997fadcadf38f628cd', '1515963394', '0', '3j38bljai0p2tahavh2p1bqlemrjgprdlzwy', 'rjgprdlzwy', '47.247.198.85', '2', 'yopeeyuh', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1128', 'levilinina@gmail.com', '1d55c0fa8f92dba164b6a0b9906c50f512f649cb', '1515964387', '0', '0n2c8k5ftunbvr5f3lpcpciibauiumkjwral', 'uiumkjwral', '93.43.181.57', '2', 'nnlevili', '0', '意大利', '', '');
INSERT INTO `aac_walluser` VALUES ('1129', 'adnanozdin@gmail.com', '743059811acce2efb51f8c09bf03f50fb204e030', '1515967652', '0', 'tts881krvs397q1f9a3gu0r5tr1129fkvzgnvrqo', 'fkvzgnvrqo', '88.230.41.238', '2', 'arsizkurt', '0', '土耳其', '', '');
INSERT INTO `aac_walluser` VALUES ('1130', 'jerry2life@gmail.com', '64207b2c85d6fc9a6faa982d19286a4d8fdf9dc4', '1515970281', '0', 'q43n0179b0u08su8h46eq9kkr0nlktsnvgvj', 'nlktsnvgvj', '197.211.58.58', '2', 'Jerri12', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1132', 'ofoegbunamchikezie@gmail.com', 'b397648349a8e0d11ef4263c3f61e6fb925e1482', '1515970438', '0', '81nlt9bsse1hhk76ngcosdre141132pzcensvlsb', 'pzcensvlsb', '197.211.53.246', '2', 'coinflow', '0', '尼日利亚', '', '');
INSERT INTO `aac_walluser` VALUES ('1133', 'gianmariogatti546@gmail.com', '139c67d3abdbaecf98078d10142c23bfe9c81a2d', '1515971611', '0', 'pn0r8rfpjnt058lq5k1l10lq891133kfxrgwdojl', 'kfxrgwdojl', '82.213.71.194', '2', 'bob1905', '0', '意大利', '', '');
INSERT INTO `aac_walluser` VALUES ('1134', 'tssinc@cs.com', '1acc31e1952e3b9b7a63204f35fd423f0786bb38', '1515972605', '0', 'sd7mjggote7d2vboask26lfnpdmcezpflmsn', 'mcezpflmsn', '75.66.110.176', '2', 'tssinc@cs.com', '0', '美国', '', '');
INSERT INTO `aac_walluser` VALUES ('1135', '1628513906@qq.com', '186a8ae2bce97a0a16f5814fe08de5a4e6214343', '1515978529', '0', '5201q8mhk2383m0verb8gldd85mlvgqdimaf', 'mlvgqdimaf', '125.120.70.222', '1', 'cent', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1136', '21901115@163.com', '16e88ec6f68c1718091085b893b6d7d7fffa6c5f', '1515980004', '0', '2k18bikailkfso9cj861l3j4clfkxgjdfdzr', 'fkxgjdfdzr', '222.168.23.144', '1', '孙鹏', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1137', 'ben1986@foxmail.com', 'daf9a00fae8a132141b6bc79ce1a800ea7391144', '1515982560', '0', 'v9l85sgred6lj1e1bgddjcfn59ezwjhyzmye', 'ezwjhyzmye', '111.32.143.110', '1', 'bls.cool', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1138', '814619066@qq.com', '29c7bdb759ba829a1f474fbfefd0f02491f5ff06', '1515986652', '0', '4817s743l7r21fj1plsklkld0vqztnugokmt', 'qztnugokmt', '106.37.175.130', '1', 'Joe1017', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1139', '85554451@qq.com', '0c53f100f46cc3ea4c0001fcf7ebde6436da7c38', '1515990198', '0', 'mldnonvsud8pmftur0e9fhchgnqkevxqnqju', 'qkevxqnqju', '175.175.194.23', '1', '85554451', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1140', 'mrbizadviser@gmail.com', '0b254cebf4b0ff7e576d08a8f90b2262fea9aeeb', '1515994441', '0', '7ir5v2sii5341tga908o68gi8acyhvvsussb', 'cyhvvsussb', '183.90.36.71', '2', 'Gelo21', '0', '新加坡', '', '');
INSERT INTO `aac_walluser` VALUES ('1141', '1765930722@qq.com', '5df22b4aa9a522686ff51447dd6753b6a8898788', '1516001576', '0', 'lf21l2l5o2u0fgq17vmq608bfljhpfmzyrfw', 'jhpfmzyrfw', '218.16.63.72', '1', '金川', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1142', 'wb84116@163.com', '35cbc7cd24918627ec379cba09956be82c7ae693', '1516002484', '0', '39ateb7ehovveclm21pvb60ll8ofoehlcinq', 'ofoehlcinq', '112.224.20.3', '1', 'wb84116', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1143', '286398734@qq.com', 'a101cb43d41f7bd2abaa743be82471c0dee110b8', '1516004932', '0', '22nmr8fbj5qv0rkre8s2qkg1a4ujnebrfrpw', 'ujnebrfrpw', '222.128.174.93', '1', 'imlingdu', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1144', 'ymyyj1972@126.com', '9e903c8f9a2013b667955901c1b530a8438aa877', '1516006821', '0', 'k6hp66kndv0kkv65asq5nmisa5kfiyyaezaa', 'kfiyyaezaa', '222.89.128.249', '1', 'ymyzy2016826', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1145', 'shadowghostjvtaz2000@gmail.com', 'ac40a6bdf1b058623980d454b1e227bbfd2559e8', '1516012045', '0', '', 'wcfjmatcbo', '110.54.225.118', '2', 'shadowghost', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1146', 'Francoischangprada@gmail.com', '7e38de8ade601dbdcd61f3817d07c2174a9e5b6d', '1516013186', '0', '9ep9mcenia1h5u46ctd9d7u4au1146gbygadwfbq', 'gbygadwfbq', '111.239.137.90', '2', 'francoischang', '0', '日本', '', '');
INSERT INTO `aac_walluser` VALUES ('1147', '597638149@qq.com', '681ed79c2704178eec0a0ee4ee3e44ca4968f7f0', '1516013206', '0', 'f78l7o3gn7lqo0d8l293irlmlbuzyrwrguyg', 'uzyrwrguyg', '183.12.193.83', '1', 'zjxiong3333', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1148', 'baha-2707@live.com', '5dda02c46aecc922a416cdb51c31b927c9007d23', '1516014696', '0', '9hs3nn8ia8cggoqt4l50hv7kaptpkcrinuco', 'tpkcrinuco', '197.2.251.31', '2', 'baha', '0', '突尼斯', '', '');
INSERT INTO `aac_walluser` VALUES ('1149', 'ht.itgroup@gmail.com', '061b65794d07919a842e231c9743f5ab9dfa0135', '1516015646', '0', 'd0kt1bkgcols18c2re5u1vj009jsprvmhxvs', 'jsprvmhxvs', '14.181.210.99', '2', 'Tuanngoc1609', '0', '越南', '', '');
INSERT INTO `aac_walluser` VALUES ('1150', 'bbkilicaslan@hotmail.com', '1a10055d708bbe54fac301ef50d43fb21349b2d0', '1516018372', '0', '0if126kqrpgp23srinhelcu79noqlrpnuduw', 'oqlrpnuduw', '95.10.172.69', '2', 'basakburcin', '0', '土耳其', '', '');
INSERT INTO `aac_walluser` VALUES ('1151', 'edwardjohnpaulo@gmail.com', '3de45f2cd2598da4f5a8d2168ce4fc7bdc30c3c2', '1516020328', '0', 'm8i1eupm6u33hafk44u8t1tj7kmlsrxttrtw', 'mlsrxttrtw', '110.54.181.138', '2', '3dward', '0', '菲律宾', '', '');
INSERT INTO `aac_walluser` VALUES ('1152', 'kang.kwonhi@gmail.com', '25c37c342f3298f202bf313028cf82105e1bc50b', '1516020943', '0', 'cv6gs66dcihaoiku4571gekalv1152zbdlayyfjp', 'zbdlayyfjp', '39.117.138.87', '0', 'kwonhi', '0', '韩国', '', '');
INSERT INTO `aac_walluser` VALUES ('1153', 'sathyarani64@gmail.com', '06d2e44a62c275671e53943a6199dbec1784127d', '1516022221', '0', 'cq95mm7d8d5c2eqpu9jlkutdb0amendbbews', 'amendbbews', '103.78.164.157', '2', 'sathya', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1154', 'ajaysharma201274@gmail.com', 'fe32f359d461d370e3cff1d66883523b6b459e74', '1516025379', '0', '7dc08bkvgrr8to4te5iui4vl691154jxmdbnvgog', 'jxmdbnvgog', '169.149.23.201', '2', 'ajayvasishtha', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1155', 'Amitty8326@gmail.com', '1da78f6723120a1a39cfed66f9a360ac722ad875', '1516026599', '0', 'r1sb4lf1v2sjcutkaig96qina71155pklcdbchjq', 'pklcdbchjq', '223.229.190.13', '2', 'Amitty8326', '0', '印度', '', '');
INSERT INTO `aac_walluser` VALUES ('1156', 'wenwen9897@126.com', 'f267aaeb50c72d79d7d9887fd450665888c9da20', '1516027104', '0', 'v9fo5st81gb1i2ovg6du04q06ejhkttsehzg', 'jhkttsehzg', '123.166.218.69', '1', '皇家故人', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1157', 'yeruihua@hotmail.com', '0cdc9c95d2b02bd62fa1c0fb6029b215a97dca6e', '1516029191', '0', 'gkk0nanims9hf1gntngut8ecp4nfjlpnlcuw', 'nfjlpnlcuw', '85.203.47.30', '1', 'yeruihua@hotmail.com', '0', '香港', '', '');
INSERT INTO `aac_walluser` VALUES ('1158', 'zazaliapalmes@yahoo.com', 'a75b066f5a1ffb5b1a0dff00d578c5b2e695c259', '1516029304', '0', '7jo1livdqs6g4k5f55cna4duo3kthqubxbfj', 'kthqubxbfj', '180.204.176.32', '2', 'zazaliapalmes', '0', '台湾', '', '');
INSERT INTO `aac_walluser` VALUES ('1159', '693285808@qq.com', 'b260690404cd7b4d9fa648f15eda3399e22dc010', '1516029481', '0', '9dp041p4rpc89ulkdr4r87hmtbwcwrgovgjl', 'wcwrgovgjl', '219.137.203.65, 183.3.227.100', '2', 'a51666', '0', '中国', '', '');
INSERT INTO `aac_walluser` VALUES ('1160', 'ttemuka@gmail.com', '56628719f1246f7646dcebc06f0f03a471b2595c', '1516030032', '0', '2vea3h9v0h8lt1n5e7mber6jq2xgdzzeqftd', 'xgdzzeqftd', '109.172.220.192', '2', 'ttemuka', '0', '格鲁吉亚', '', '');
