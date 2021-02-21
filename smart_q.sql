/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : smart_q

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-02-21 18:12:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ovst_test
-- ----------------------------
DROP TABLE IF EXISTS `ovst_test`;
CREATE TABLE `ovst_test` (
  `vn` char(13) NOT NULL,
  `hn` char(9) DEFAULT NULL,
  `pname` varchar(255) DEFAULT '',
  `fname` varchar(255) DEFAULT '',
  `lname` varchar(255) DEFAULT '',
  `rx_queue` int(11) DEFAULT NULL,
  `cur_dep_time` time DEFAULT NULL,
  `vstdate` date DEFAULT NULL,
  `cur_dep` char(3) DEFAULT NULL,
  PRIMARY KEY (`vn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for queue
-- ----------------------------
DROP TABLE IF EXISTS `queue`;
CREATE TABLE `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` char(4) DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  `department` char(3) DEFAULT '',
  `channel` varchar(50) DEFAULT NULL,
  `vn` char(13) DEFAULT '',
  `hn` char(9) DEFAULT NULL,
  `qtype` char(2) DEFAULT NULL,
  `new_queue` char(4) DEFAULT NULL,
  `queue_time` time DEFAULT NULL,
  `call_time` time DEFAULT NULL,
  `call_now` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for run_queue
-- ----------------------------
DROP TABLE IF EXISTS `run_queue`;
CREATE TABLE `run_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queue_a` char(4) DEFAULT NULL,
  `queue_b` char(4) DEFAULT NULL,
  `date_queue` date DEFAULT NULL,
  `date_queueb` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
