/*
Navicat MySQL Data Transfer

Source Server         : localhsot
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : opencart

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-10-15 00:20:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for oc_01_dev_logistics
-- ----------------------------
DROP TABLE IF EXISTS `oc_01_dev_logistics`;
CREATE TABLE `oc_01_dev_logistics` (
  `Index` int(6) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Area` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '配送地区',
  `Min_length` float(10,2) DEFAULT NULL,
  `Min_width` float(10,2) DEFAULT NULL,
  `Min_height` float(10,2) DEFAULT NULL,
  `Max_length` float(10,2) DEFAULT NULL,
  `Max_width` float(10,2) DEFAULT NULL,
  `Max_height` float(10,2) DEFAULT NULL,
  `Remark_length_width_height` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Min_weight` float(12,6) DEFAULT NULL,
  `Max_weight` float(12,6) DEFAULT NULL,
  `Remark_weight` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Allow_battery` tinyint(1) DEFAULT NULL COMMENT '是否带电池',
  `Total_price` float(12,6) unsigned zerofill DEFAULT '00000.000000',
  `Total_price_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Price_calculate` float(12,6) unsigned zerofill DEFAULT '00000.000000' COMMENT '运费单价',
  `Price_calculate_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Handling_expense` float(12,6) unsigned zerofill DEFAULT '00000.000000' COMMENT '处理费',
  `Handling_expense_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Guarantee_price` float(12,6) unsigned zerofill DEFAULT '00000.000000' COMMENT '保价费',
  `Guarantee_price_remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Contact` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of oc_01_dev_logistics
-- ----------------------------
INSERT INTO `oc_01_dev_logistics` VALUES ('1', 'Wish邮-WiseExpress 专线', '美国', '15.50', '0.70', '7.70', '68.00', '43.00', '43.00', '15.5*0.7*7.7≤长*宽*高≤68*43*43（cm）', '0.080000', '0.455000', '重量限制 80 - 3000 (80g-455g 档)', '1', null, null, '00077.500000', '基础资费(元/KG)/80g首重', '00012.800000', '处理费(元)', '00000.000000', '保价费', null, null);
INSERT INTO `oc_01_dev_logistics` VALUES ('2', 'Wish邮-WiseExpress 专线', '美国', '15.50', '0.70', '7.70', '68.00', '43.00', '43.00', '15.5*0.7*7.7≤长*宽*高≤68*43*43（cm）', '0.456000', '1.000000', '重量限制 80 - 3000 (456g-1000g 档)', '1', null, '', '00064.000000', '基础资费(元/KG)/80g首重', '00059.000000', '处理费(元)', '00000.000000', '保价费', '', '');
INSERT INTO `oc_01_dev_logistics` VALUES ('3', 'Wish邮-WiseExpress 专线', '美国', '15.50', '0.70', '7.70', '68.00', '43.00', '43.00', '15.5*0.7*7.7≤长*宽*高≤68*43*43（cm）', '1.001000', '3.000000', '重量限制 80 - 3000 (1001g-3000g 档)', '1', null, '', '00059.000000', '基础资费(元/KG)/80g首重', '00026.000000', '处理费(元)', '00000.000000', '保价费', '', '');
