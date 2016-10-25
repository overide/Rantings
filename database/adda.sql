-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2015 at 07:22 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adda`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `contentid` int(10) NOT NULL AUTO_INCREMENT,
  `diaryentry` varchar(10000) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `privacy` tinyint(1) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL,
  PRIMARY KEY (`contentid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentid`, `diaryentry`, `title`, `date`, `privacy`, `uid`) VALUES
(25, 'basic character.\nBut shortly after World War I the basic view of success shifted from the character ethic to what we\nmight call the personality ethic. Success became more a function of personality, of public image, of\nattitudes and behaviors, skills and techniques, that lubricate the processes of human interaction. This\npersonality ethic essentially took two paths: one was human and public relations techniques, and the\nother was positive mental attitude (PMA). Some of this philosophy was expressed in inspiring and\nsometimes valid maxims such as "Your attitude determines your altitude," "Smiling wins more friends\nthan frowning," and "Whatever the mind of man can conceive and believe it can achieve.\nOther parts of the personality approach were clearly manipulative, even deceptive, encouraging\npeople to use techniques to get other people to like them, or to fake interest in the hobbies of others to\nget out of them what they wanted, or to use the "power look," or to intimidate their way through life.\nSome of this literature acknowledged character as an ingredient of success, but tended to\ncompartmentalize it rather than recognize it as foundational and catalytic. Reference to the character\nethic became mostly lip service; the basic thrust', 'test', '2015-07-11 18:59:40', 0, 2),
(26, 'The doctor awoke next morning firmly resolved to make his fortune. Several times already he had come to\r\nthe same determination without following up the reality. At the outset of all his trials of some new career the\r\nhopes of rapidly acquired riches kept up his efforts and confidence, till the first obstacle, the first check,\r\nthrew him into a fresh path. Snug in bed between the warm sheets, he lay meditating. How many medical\r\nmen had become wealthy in quite a short time! All that was needed was a little knowledge of the world; for in\r\nthe course of his studies he had learned to estimate the most famous physicians, and he judged them all to be\r\nasses. He was certainly as good as they, if not better. If by any means he could secure a practice among the\r\nwealth and fashion of Havre, he could easily make a hundred thousand francs a year. And he calculated with\r\ngreat exactitude what his certain profits must be. He would go out in the morning to visit his patients; at the\r\nvery moderate average of ten a day, at twenty francs each, that would mount up to seventy&#8722;two thousand\r\nfrancs a year at least, or even seventy&#8722;five thousand; for ten patients was certainly below the mark. In the\r\nafternoon he would be at home to, say, another ten patients, at ten francs eachthirty&#8722;six thousand francs.\r\nHere, then, in round numbers was an income of twenty thousand francs. Old patients, or friends whom he\r\nwould charge only ten francs for a visit, or see at home for five, would perhaps make a slight reduction on\r\nthis sum total, but consultations with other physicians and various incidental fees would make up for that.\r\nNothing could be easier than to achieve this by skilful advertising remarks in the Figaro to the effect that the\r\nscientific faculty of Paris had their eye on him, and were interested in the cures effected by the modest young\r\npractitioner of Havre! And he would be richer than his brother, richer and more famous; and satisfied with\r\nhimself, for he would owe his fortune solely to his own exertions; and liberal to his old parents, who would\r\nbe justly proud of his fame. He would not marry, would not burden his life with a wife who would be in his\r\nway, but he would choose his mistress from the most beautiful of his patients. He felt so sure of success that\r\nhe sprang out of bed as though to grasp it on the spot, and he dressed to go and search through the town for\r\nrooms to suit him.', 'test', '2015-07-11 18:59:57', 0, 2),
(29, 'When he was nearly thirteen, my brother Jem got his arm badly broken at the elbow. When it healed, and Jem’s fears of never being able to play football were assuaged, he was seldom self-conscious about his injury. His left arm was somewhat shorter than his right; when he stood or walked, the back of his hand was at right angles to his body, his thumb parallel to his thigh. He couldn’t have cared less, so long as he could pass and punt. When enough years had gone by to enable us to look back on them, we sometimes discussed the events leading to his accident. I maintain that the Ewells started it all, but Jem, who was four years my senior, said it started long before that. He said it began the summer Dill came to us, when Dill first gave us the idea of making Boo Radley come out. I said if he wanted to take a broad view of the thing, it really began with Andrew Jackson. If General Jackson hadn’t run the Creeks up the creek, Simon Finch would never have paddled up the Alabama, and where would we be if he hadn’t? We were far too old to settle an argument with a fist-fight, so we consulted Atticus. Our father said we were both right. Being Southerners, it was a source of shame to some members of the family that we had no recorded ancestors on either side of the Battle of Hastings. All we had was Simon Finch, a fur-trapping apothecary from Cornwall whose piety was exceeded only by his stinginess. In England, Simon was irritated by the persecution of those who called themselves Methodists at the hands of their more liberal brethren, and as Simon called', 'test', '2015-07-13 16:42:01', 0, 20),
(32, 'When they came to the village, the son followed the fox’s counsel, and without looking about him went to the shabby inn and rested there all night at his ease. In the morning came the fox again and met him as he was beginning his journey, and said, ‘Go straight forward, till you come to a castle, before which lie a whole troop of soldiers fast asleep and snoring: take no notice of them, but go into the castle and pass on and on till you come to a room, where the golden bird sits in a wooden cage; close by it stands a beautiful golden cage; but do not try to take the bird out of the shabby cage and put it into the handsome one, otherwise you will repent it.’ Then the fox stretched out his tail again, and the young man sat himself down, and away they went over stock and stone till their hair whistled in the wind.\r\nBefore the castle gate all was as the fox had said: so the son went in and found the chamber where the golden bird hung in a wooden cage, and below stood the golden cage, and the three golden apples that had been lost were lying close by it. Then thought he to himself, ‘It will be a very droll thing to bring away such a fine bird in this shabby cage’; so he opened the door and took hold of it and put it', 'Fairy Tale', '2015-07-13 18:11:55', 0, 1),
(47, '<pre>\r\nHold fast to dreams,\r\nFor if dreams die,\r\nLife is a broken bird,\r\nThat cannot fly.\r\nHold fast to dreams,\r\nFor if dreams go,\r\nLife is barren field,\r\nFrozen with snow. \r\n</pre>', '<h3>Hold Fast To Dreams</h3>', '2015-07-14 12:44:44', 0, 1),
(49, 'gdhgfgfvdgfjnhfhfhfhmjhghgfgfdgnmhghgdgfgfbfnmhmbbgfgnfhh', '', '2015-07-14 12:58:22', 0, 21),
(51, 'And as they came to the wood where the fox first met them, it was so cool and pleasant that the two brothers said, ‘Let us sit down by the side of the river, and rest a while, to eat and drink.’ So he said, ‘Yes,’ and forgot the fox’s counsel, and sat down on the side of the river; and while he suspected nothing, they came behind, and threw him down the bank, and took the princess, the horse, and the bird, and went home to the king their master, and said. ‘All this have we won by our labour.’ Then there was great rejoicing made; but the horse would not eat, the bird would not sing, and the princess wept.\r\nThe youngest son fell to the bottom of the river’s bed: luckily it was nearly dry, but his bones were almost broken, and the bank was so steep that he could find no way to get out. Then the old fox came once more, and scolded him for not following his advice; otherwise no evil would have befallen him: ‘Yet,’ said he, ‘I cannot leave you here, so lay hold of my tail and hold fast.’ Then he', 'fk', '2015-07-14 15:10:24', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contentstatus`
--

CREATE TABLE IF NOT EXISTS `contentstatus` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL,
  `likes` tinyint(1) NOT NULL DEFAULT '0',
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `contentstatus`
--

INSERT INTO `contentstatus` (`cid`, `uid`, `likes`) VALUES
(25, 21, 1),
(26, 21, 1),
(47, 3, 1),
(25, 3, 1),
(29, 3, 1),
(26, 3, 1),
(32, 1, 1),
(51, 1, 1),
(29, 1, 1),
(25, 1, 1),
(47, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `uid` int(10) NOT NULL,
  `fuid` int(10) NOT NULL,
  `follow` tinyint(1) NOT NULL DEFAULT '0',
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`uid`, `fuid`, `follow`) VALUES
(7, 1, 1),
(1, 3, 1),
(5, 3, 1),
(2, 3, 1),
(5, 1, 1),
(8, 8, 1),
(3, 2, 1),
(2, 1, 1),
(1, 1, 1),
(3, 1, 1),
(1, 6, 1),
(12, 12, 1),
(1, 2, 1),
(2, 2, 1),
(20, 20, 1),
(1, 20, 1),
(2, 20, 1),
(3, 20, 1),
(20, 1, 1),
(6, 6, 1),
(3, 6, 1),
(21, 21, 1),
(2, 21, 1),
(3, 3, 1),
(20, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profilepic` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`uid`, `firstname`, `lastname`, `email`, `password`, `profilepic`, `status`) VALUES
(1, 'Atul', 'Kumar', 'atulkumar2468@gmail.com', 'tullu', '1436802349.jpg', 0),
(2, 'Abhishek', 'Kumar', 'manishkr161@gmail.com', 'mechy', '1436802556.jpg', 0),
(3, 'Vimal', 'Chaudhary', 'vimalchdhry01@gmail.com', 'bhalu', '1436890820.jpg', 0),
(4, 'ankit ', 'kesharwani', 'ankit@gmail.com', 'kesra', '', 0),
(5, 'Sruti ', 'Mishra', 'sruti@gmail.com', 'motki', '', 0),
(6, 'Adarsh', 'Kumar', 'adarsh@gmail.com', 'sunny', '1436806398.jpg', 0),
(7, 'Atulyam', 'Kanojiya', 'Atulyam@gmail.com', 'atulyam', '', 0),
(8, 'Mahima', 'Kanojiya', 'mahima@gmail.com', 'priya', '', 0),
(12, 'Alpika', 'Verma', 'alpika@gmail.com', 'alpi', '', 0),
(20, 'Krishna', 'Yadav', 'krishna@gmail.com', 'anu', '1436804248.jpg', 0),
(21, 'Ayush', 'Singh', 'ayush@gmail.com', 'ankit', '1436878610.jpg', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userdata` (`uid`);

--
-- Constraints for table `contentstatus`
--
ALTER TABLE `contentstatus`
  ADD CONSTRAINT `contentstatus_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `content` (`contentid`);

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userdata` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
