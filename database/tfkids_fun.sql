-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2015 at 11:04 AM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tfkids_fun`
--
CREATE DATABASE IF NOT EXISTS `tfkids_fun` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tfkids_fun`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `user_id` int(22) NOT NULL,
  `topic_id` int(22) NOT NULL,
  `comments_id` int(22) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isApproved` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`comments_id`),
  KEY `FK_comments` (`user_id`),
  KEY `FK_topic_comments` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_id`, `topic_id`, `comments_id`, `comment`, `createdAt`, `updatedAt`, `isApproved`) VALUES
(1, 1, 1, 'This is very interesting', '0000-00-00', '0000-00-00', 'yes'),
(1, 1, 2, 'Very useful for childrens', '2015-06-19', '2015-06-19', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `featuredrhymes`
--

DROP TABLE IF EXISTS `featuredrhymes`;
CREATE TABLE IF NOT EXISTS `featuredrhymes` (
  `rhyme_id` int(11) NOT NULL AUTO_INCREMENT,
  `rhyme_name` varchar(100) NOT NULL,
  `rhyme_image` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isFeatured` varchar(3) NOT NULL DEFAULT 'no',
  `rhyme_code` text NOT NULL,
  `rhyme_decription` text NOT NULL,
  PRIMARY KEY (`rhyme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `featuredrhymes`
--

INSERT INTO `featuredrhymes` (`rhyme_id`, `rhyme_name`, `rhyme_image`, `createdAt`, `updatedAt`, `isActive`, `isFeatured`, `rhyme_code`, `rhyme_decription`) VALUES
(9, 'Mary had a Little Lamb', 'maryhadalamb.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe frameborder="0" width="100%" height="500" src="//www.dailymotion.com/embed/video/x2ua29j" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x2ua29j_mary-had-a-little-lamb-nursery-rhymes-thefunkids-com-video-dailymotion_school" target="_blank">Mary had a Little Lamb - Nursery Rhymes...</a> <i>by <a href="http://www.dailymotion.com/TheFunKids" target="_blank">TheFunKids</a></i>', 'Mary had a little lamb, little lamb, little lamb (x2)\r\nIts fleece was white as snow\r\nAnd everywhere that Mary went.. Mary went.. Mary went (2)\r\nThe lamb was sure to go\r\nIt followed her to school one day.. School one day.. School one day (x2)\r\nThat was against the rule\r\nIt made the children laugh and play.. Laugh and play.. Laugh and play (x2)\r\nTo see a lamb at school\r\n'),
(10, 'Old Mcdonald', 'oldmcdonald.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe frameborder="0" width="100%" height="500" src="//www.dailymotion.com/embed/video/x2ua4fd" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x2ua4fd_old-maclonald-nursery-rhymes-thefunkids-com-video-dailymotion_school" target="_blank">Old Maclonald - Nursery Rhymes - TheFunKids...</a> <i>by <a href="http://www.dailymotion.com/TheFunKids" target="_blank">TheFunKids</a></i>', 'Old mcdonald had a farm E-I-E-I-O \r\nAnd on that farm he has some cows E-I-E-I-O\r\nWith a moo moo here\r\nAnd a moo moo there\r\nHere a moo, there a moo\r\nEverywhere a moo moo\r\nOld MacDonald had a farm\r\nE-I-E-I-O\r\nOld Mcdonal had a farm E-I-E-I-O\r\nAnd on that farm he has some chickens E-I-E-I-O\r\nWith a cluck cluck here, and cluck cluck there \r\nHere cluck, there cluck, everywhere a cluck cluck\r\nMoo moo here, and moo moo there\r\nHere moo, there moo everywhere a moo moo\r\nOld mcdonald had a farm E-I-E-I-O\r\n'),
(11, 'Piggy On The Railway Line', 'railroad.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe frameborder="0" width="100%" height="500" src="//www.dailymotion.com/embed/video/x2ua4fe" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x2ua4fe_piggy-on-the-railway-line-nursery-rhymes-thefunkids-com-video-dailymotion_school" target="_blank">Piggy On The Railway Line - Nursery Rhymes...</a> <i>by <a href="http://www.dailymotion.com/TheFunKids" target="_blank">TheFunKids</a></i>', 'I’ve been working on the railroad\r\nAll the live long day\r\nI''ve been working on the railroad\r\nJust to pass the time away\r\nCan’t you hear the whistle blowin''\r\nRise up so early in the morn\r\nCan''t you hear the captain shouting?\r\nDinah blow your horn\r\nDinah won''t you blow\r\nDinah won''t you blow\r\nDinah won''t you blow your ho-o-o-orn\r\nDinah won''t you blow\r\nDinah won''t you blow\r\nDinah won’t you blow your horn \r\n'),
(12, 'Six Little Ducks', 'sixlilsducks.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe frameborder="0" width="100%" height="500" src="//www.dailymotion.com/embed/video/x2ua4fg" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x2ua4fg_six-little-ducks-nursery-rhymes-thefunkids-com-video-dailymotion_school" target="_blank">Six Little Ducks - Nursery Rhymes - TheFunKids...</a> <i>by <a href="http://www.dailymotion.com/TheFunKids" target="_blank">TheFunKids</a></i>', 'Six little ducks that I once knew\r\nFat ones, skinny ones,\r\nCute ones, too\r\nBut the one little duck\r\nWith the feather on his back\r\nHe rule the others with his quack, quack, quack \r\nQuack, quack, quack.. Quack, quack, quack\r\nDown to the river they would go.\r\nWibble wobble, wibble wobble to and fro.\r\nBut the one little duck with the feather on his back\r\nHe rule the others with his quack, quack, quack.\r\nQuack, quack, quack-quack, quack, quack\r\nSix little ducks that I once knew\r\nFat ones, skinny ones, cute ones too.\r\nBut the one little duck with the feather on his back\r\nHe rule the others with his quack, quack, quack.\r\nQuack, quack, quack-quack, quack, quack\r\nDown to the river they would go.\r\nWibble wobble, wibble wobble to and fro.\r\nBut the one little duck with the feather on his back\r\nHe rule the others with his quack, quack, quack.\r\nQuack, quack, quack-quack, quack, quack.\r\n'),
(13, 'Row Row Row Your Boat', 'rowyourboat.jpg', '2015-06-17', '2015-06-18', 'yes', 'no', '<iframe frameborder="0" width="100%" height="500" src="//www.dailymotion.com/embed/video/x2uafin" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x2uafin_row-row-row-your-boat-nursery-rhymes-thefunkids-com-video-dailymotion_school" target="_blank">Row Row Row Your Boat - Nursery Rhymes...</a> <i>by <a href="http://www.dailymotion.com/TheFunKids" target="_blank">TheFunKids</a></i>', 'Row, row, row your boat,\r\nGently down the stream.\r\nMerrily, merrily, merrily, merrily,\r\nLife is but a dream.\r\nHoe hoe hoe your row\r\nThrough the summer heat,\r\nMerrily digging but cheerily singing\r\nRaising beets we''ll eat\r\nSave, save save the wheat,\r\nBeets and sugar too,\r\nCorn and potatoes and rice and tomatoes\r\nAre mighty good for you.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `forum_replies`
--

DROP TABLE IF EXISTS `forum_replies`;
CREATE TABLE IF NOT EXISTS `forum_replies` (
  `threadd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_name` varchar(100) NOT NULL,
  `reply_message` text NOT NULL,
  `reply_tags` text NOT NULL,
  `reply_trackback` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL,
  `reply_image` varchar(100) NOT NULL,
  `reply_type` varchar(10) NOT NULL,
  `mom_sub_forum_id` int(11) NOT NULL,
  PRIMARY KEY (`thread_reply_id`),
  KEY `FK_forum_threads` (`user_id`),
  KEY `FK_forums_threads` (`threadd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `forum_replies`
--

INSERT INTO `forum_replies` (`threadd_id`, `user_id`, `thread_reply_id`, `reply_name`, `reply_message`, `reply_tags`, `reply_trackback`, `createdAt`, `updatedAt`, `isActive`, `reply_image`, `reply_type`, `mom_sub_forum_id`) VALUES
(10, 26, 1, '', '<p>I understand your concern Zehra, and I totally feel parents are more responsible for this attitude than anyone else. We need to be friendly with our kids and listen to their problems instead of yelling at them or creating a constant fear in them. They gradually stop sharing when they know that sharing will result in anger and disapproval from parents. Hence, they start isolating themselves and make a world of their own. So i really feel parents need to work on&nbsp;their parenting style and only that way we can keep our kids close to us.&nbsp;</p>', '', '', '2015-07-01', '2015-07-01', 'yes', '', 'quote', 27),
(7, 26, 2, '', '<p>Hi&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>I think i would suggest you should give more and more veggies and fruits to your child. In addition, make sure he/she takes plenty of liquid intake. Often kids stop drinking milk which affects their physical development a lot. I really think we should make this a habit to ensure our child drinks at least a glass of milk daily. Besides, chicken, fish and egg should always be a part of kids meal to ensure proper protien intake. It''s best to cook something that you child would love and its also healthy like fruit salad, chicken sandwiches with lots of veggies etc.&nbsp;</p>', '', '', '2015-07-01', '2015-07-01', 'yes', '', 'quote', 17),
(10, 17, 3, '', '', '', '', '2015-07-01', '2015-07-01', 'yes', '', 'reply', 27),
(9, 35, 4, '', '<p>hy zehra, you can give your child fresh fruit juices along with milk and motivate your child in eating small parts of food you eat.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '', '', '2015-07-02', '2015-07-02', 'yes', '', 'quote', 24),
(13, 38, 5, '', '<p>Hy Maya</p>\r\n<p>Be friendly with your daughter&nbsp;</p>\r\n<p>Ask her about school activities and friends and listen her stories with full attention and interest</p>\r\n<p>Consult with her teacher too&nbsp;</p>\r\n<p>if she is not hanging out with her friends invite her friends at home</p>\r\n<p>spend more time with your daughter .Give her imporatnce and attention at times children want attention</p>\r\n<p>Take her out to places of her interest .</p>\r\n<p>hope &nbsp;the above tips ll b helpful &nbsp;for u&nbsp;</p>', '', '', '2015-07-02', '2015-07-02', 'yes', '', 'quote', 25),
(14, 1, 6, 'welcome to fun kids', '<p>Hi Zoya Welccome to fun kid mothering forum</p>', '', '', '2015-07-07', '2015-07-07', 'yes', '', 'quote', 10),
(14, 1, 7, 'We welcome you to the mothering forum', '<p>We welcome you to the mothering forum</p>', '', '', '2015-07-07', '2015-07-07', 'yes', '', 'quote', 10),
(11, 82, 8, '', '<p style="margin-bottom: 12.0pt;"><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">Hi <strong>Zehra,</strong></span></p>\r\n<p><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">Here are some useful and fun activities that will keep your kid busy in your absence too:</span></p>\r\n<p><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">1.&nbsp;Check out free e-books from your local library, if available and provide her.</span></p>\r\n<p><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">2. Coloring is always fun, provide your kid&nbsp;some good crayons and a big board and let her enjoy whatever she wishes to draw. Tell her when you come back you''ll check it.</span></p>\r\n<p><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">3. Keep graphic novels and some good stories books in your book shelf so that in your absense she can read her favorite book that interests her. Make sure, books should be acessible because your kid will love to pick a book herself.&nbsp;</span></p>\r\n<p><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">4. Let your daughter make tissue paper flowers for her friends in this way she''ll also learn crafts.</span></p>\r\n<p style="margin-bottom: 12pt;"><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">5. There are many educational games or puzzles, let her play online she will never get bored.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 8.5pt; font-family: Verdana, sans-serif;">Hope this helped.</span></p>', '', '', '2015-07-07', '2015-07-07', 'yes', '', 'quote', 28),
(12, 82, 9, '', '<p>Hi Noor,</p>\r\n<p>&nbsp;</p>\r\n<p>For a complete diet plan, please visit the link mentioned below:</p>\r\n<p>http://www.nhs.uk/conditions/pregnancy-and-baby/pages/healthy-pregnancy-diet.aspx#close</p>\r\n<p>&nbsp;</p>\r\n<p>Thank you in advance.&nbsp;</p>', '', '', '2015-07-07', '2015-07-07', 'yes', '', 'quote', 20),
(15, 40, 10, 'Good and nice idea', '<p>Nice Idea please share it and do it as soon as possible</p>', '', '', '2015-07-08', '2015-07-08', 'yes', '', 'quote', 10),
(9, 29, 11, '', '<p><span style="line-height: 24px; color: #2e2e2e; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Now that your child is running off to school in the morning, it&rsquo;s especially important to make time for breakfast.&nbsp; A good breakfast fuels their day and helps them focus at school and is linked to a healthier body weight.</span></p>', '', '', '2015-07-08', '2015-07-08', 'yes', '', 'quote', 24),
(12, 29, 12, '', '<p><span style="color: #604d80; font-family: MuseoSans100, Arial, Helvetica, sans-serif; font-size: 18px; line-height: 27px; background-color: #fffaf0;">&nbsp;Stock your pantry, office, purse, and car with wholesome eats such as fresh fruit, and whole-grain crackers or granola bars. Fill up your fridge with low-fat yogurt and string cheese, and make sure you always have water at the ready.</span></p>', '', '', '2015-07-08', '2015-07-08', 'yes', '', 'reply', 20),
(15, 84, 13, 'Re: Birthday', '<p>Thank you for valueable feedback.</p>\r\n<p>Our team will see in to it.</p>\r\n<p>Regards</p>', '', '', '2015-07-08', '2015-07-08', 'yes', '', 'quote', 10),
(16, 86, 14, 'what to do on eid to make it special', '<p>have the kids make gifts for each others.make something special which family does not normally eat.it can be sweet traditional aur international recipe.</p>', '', '', '2015-07-08', '2015-07-08', 'no', '', 'quote', 30),
(17, 85, 15, 'Hi', '<p>I am MIna Kamran.I have one kid</p>\r\n<p>His name is Muhammad Hashim</p>', '', '', '2015-07-08', '2015-07-08', 'yes', '', 'reply', 10),
(17, 85, 16, 'Hi', '<p>I am MIna Kamran.I have one kid</p>\r\n<p>His name is Muhammad Hashim</p>', '', '', '2015-07-08', '2015-07-08', 'yes', '', 'reply', 10),
(11, 17, 17, '', '', '', '', '2015-07-09', '2015-07-09', 'no', '', 'quote', 28),
(11, 17, 18, '', '', '', '', '2015-07-09', '2015-07-09', 'no', '', 'quote', 28),
(17, 6, 19, 'Hi All ', '<p>this is good</p>', '', '', '2015-07-09', '2015-07-09', 'yes', '', 'reply', 10),
(25, 1, 20, 'good for mom and children', '<p>good for mom and children</p>', '', '', '2015-07-09', '2015-07-09', 'no', '', 'reply', 10),
(25, 1, 21, 'Hello to everyone mom and kids!', '<p>Hello to everyone mom and kids !</p>', '', '', '2015-07-09', '2015-07-09', 'no', '', 'quote', 10),
(19, 17, 22, 'nice information', '<p>nice information</p>', '', '', '2015-07-09', '2015-07-09', 'no', '', 'quote', 25),
(14, 29, 25, 'moms united', '<p>All moms under one roof! yay now we can discuss our kids issues and gossip as well ;) !</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 10),
(9, 29, 26, 'a', '<p>I second Zoya.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 24),
(10, 29, 27, 'advice for u ', '<p>Start being friendly with your daughter as girls are more sensitive and some girls are shy enough to discuss and talk openly. so you as a mother need to be more responsible and caring towards your daughter. May be she is shy and thats y hiding .MAke small jokes with her and talk as much as you can.&nbsp;</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 27),
(36, 30, 28, 'a', '<p>yeah its must</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 31),
(10, 30, 29, 'be serious', '<p>look at her activities closely and dont leave her alone in a room.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 27),
(37, 30, 30, 'd', '<p>im also reading blogs and finding it helpful. Good job funkids</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 22),
(19, 30, 31, 'nice tip', '<p>informative!</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 25),
(7, 27, 32, 'thanks', '<p>thanks for helping me out on this</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 17),
(20, 29, 33, 'All for kids', '<p>Hello Noor,</p>\r\n<p>&nbsp;</p>\r\n<p>Here are some easy healthy breakfast items that will fuel your child''s energy and for sure these will keep him active and energetic all day long:&nbsp;</p>\r\n<p>1. English Muffin Egg Pizzas.</p>\r\n<p>2. Egg with Ham, Cheddar and Chives.</p>\r\n<p>3. Blueberry-Maple Muffins.</p>\r\n<p>4. Easy Chocolate Croissants.</p>\r\n<p>5. Egg in a whole with Berries and Yogurt.</p>\r\n<p>6. Quick Sticky buns along with thinly sliced Bananas, chopped Pecans and melted Brown Sugar.</p>\r\n<p>7. Hot Farina with Apricots and Almonds. and,</p>\r\n<p>8. Peanut Energy bars.</p>\r\n<p>Hope you cook them in a right way, you can get recipes here:&nbsp;http://www.eatingwell.com/recipes_menus/collections/healthy_breakfast_recipes_for_kids</p>\r\n<p>&nbsp;</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 14),
(7, 29, 34, 'For your toddler', '<p>Hey Amna,</p>\r\n<p>As already some good healthy snack tips have been mentioned by Noor Ahmed i would only add little to your knowledge that whole grain, cheese, smoothies, yogurt and sweet potatoes should be given to toddlers especially that age btw 1-3. These low calorie snacks would definitely make your kid happy and healthy.&nbsp;</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 17),
(7, 29, 35, 'For your toddler', '<p>And let us know if that helped. :) soon you will notice a big change towards your kid''s behavior and his activities.&nbsp;</p>\r\n<p>We''ll appreciate your feedback. Thank you.&nbsp;</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 17),
(12, 29, 36, 'Pregnancy diet plan', '<p>Hello Noor Ahmed,</p>\r\n<p>Pregnancy should be dealt with proper care, so your plate should contain:</p>\r\n<p>1. Grain: 7 ounces a day.</p>\r\n<p>2. Fresh Fuits: 2 cups a day.</p>\r\n<p>3. Meat and beans: 6 ounces a day. (and chicken without the skin)</p>\r\n<p>4. Dairy: 3 cups a day.</p>\r\n<p>5. Oil i.e. olive and canola oil: 6 tsp a day.</p>\r\n<p>6. Water: 8 glasses.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 20),
(37, 82, 37, 'Very informative', '<p>Hello Funkids,</p>\r\n<p>You guys are absolutely fantastic. Your advices always help us to gain insight into kids and moms healthy routines and i daily visit your mom forum thankyou so much. looking forward to some more exciting threads.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 22),
(10, 82, 38, 'Bitter truth', '<p>I''d say only one thing: TECHNOLOGY!</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 27),
(37, 82, 39, 'Good job funkids', '<p>yes no doubt you all give very informative tips. Thanks for caring about us so much God bless you all.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 22),
(41, 82, 40, 'My Eid ', '<p>Just party, party and party hehe</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 32),
(9, 82, 41, 'Healthy dlaily intake', '<p>Make a habit of providing your kid: Milk, Yogurt, Green veggies and Fruits that are rich in calcium and Vitamin A.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 24),
(9, 25, 42, 'Thanks people..', '<p>thankyou so much for providing me such great tips you people are very helpful once again thanks alot.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 24),
(37, 25, 43, 'thanks funkids', '<p>yes aisha you are right moms in this era don''t care about themselves and their kids they don''t like to indulge them in beneficial activities that is why now a days children are very arrogant and don''t like sharing things plus they lack in so many skills i just don''t get it why don''t parents pay attention to their kids may be they are in lack of knowledge this is a great website that provides everything for moms and kids so now i''m tension free at both sides thanks a lot funkids you guys really doing a great job keep it up</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 22),
(7, 25, 44, 'funkids', '<p>even my toddler doesn''t like food that i give, you all gave so much useful ideas i''ll definitely try thanks a lot</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 17),
(12, 25, 45, 'nice response', '<p>glad to see such a friendly response from you people. my elder sister is pregnant and i will definitely show these tips. thanks a lot keep caring - share love.</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 20),
(19, 25, 46, 'informative', '<p>thank you so much for sharing :)</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'reply', 25),
(39, 25, 47, 'Hello', '<p>My kid''s name is <strong>Ayaan</strong> that means gift of God :)</p>', '', '', '2015-07-13', '2015-07-13', 'no', '', 'quote', 29),
(41, 35, 48, 'my eid', '<p>The ladies of the family make lunch,kids have fun playing games and go outing and we make sure to dine out. Late night talking and tea cofee sessions.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 32),
(19, 35, 49, 'k', '<p>Good one</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 25),
(39, 35, 50, 'my baby name', '<p>My kids name Arham meaning kind,compassionate.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 29),
(10, 35, 51, 'opinion', '<p>Lack of concern parents show. They are too busy in their own lives to give quality time to kids. Give quality time even if it is 3 4 hours but show ur full concentration and care. Kids are very sensitive nowadays.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 27),
(7, 35, 52, 'healthy snack', '<p>Healthy snacks which kids would love and i give to my kid are potato wedges, cutlets,chickn n egg sandwiches</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 17),
(10, 83, 53, 'cousin''s daughter', '<p>I can related to you on every bit of this. One of my cousin''s daughter is 14 years old and all that i ever see her doing is using her phone, ipad with ear plugs on. she''s compeltely disconnected from the world and she has started to take us as oldies who no nothing about anything. it makes me feel so sad because i hve seen her growing up and she used to be such an adorable child. im not sure if parents are alone responsible for this. it is partly school responsiblity too to ensure kids are also learning about morality ethics and behaviour.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 27),
(19, 30, 54, 'good!', '<p>thank you for sharing. really useful!</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 25),
(10, 30, 55, 'sad reality', '<p>i kind of think we have brought this to ourselves by make the cell phones and tablets so accessible to our kids at such young age. Remember the days when there used to be only one phone line in the enitre house? we survived that phase and so can our kids learn to survive without being too much dependent on their phones. this is so sad how we are refusing to see the consequences of being too easy going with the kids</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 27),
(9, 30, 56, 'do add milk ', '<p>i would suggest never to leave out milk and egg from any diet. it is very impoetant for stronger bone and hair. rest i think the above post have some very good advices!</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 24),
(37, 30, 57, 'parenting', '<p>i really think we should be friends to our kids and we must make sure that they are not scared of us because if they are they''ll end up hiding things about thier lives from us and they might even end up in trouble but not share with us out of fear.</p>\r\n<p>&nbsp;</p>\r\n<p>We should learn to communicate with them, gain their trust and be the best source of advice for them.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 22),
(7, 30, 58, 'same issues for every mom', '<p>looks like every other mother is going through the same trouble, my toddler gives me hard time too in eating. all that he wants to eat is chocolate!&nbsp;</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 17),
(44, 25, 59, 'Post Delivery Activities', '<p class="MsoNormal">Hello Sehar,</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p class="MsoNormal">As for guidelines, start out slowly. You need to conserve your energy to recover from labor and delivery. Walking will be all the exercise you need when you first get home. Getting some exercise is important because that encourages a comfortable sleep. I would recommend during the first six weeks, you can begin walking to increase circulation and get some general exercise. Do what you can handle, even if it''s only 10 to 15 minutes, and increase your time as you get stronger. Walk with a normal stride and let your arms swing naturally by your sides. Warm up with five to 10 minutes of rhythmic activity such as marching, side-to-side lunges, shoulder rolls, and arm circles.&nbsp;</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 19),
(44, 82, 60, 'Walking is a must-to-do thing', '<p style="box-sizing: border-box; margin: 0px 0px 1rem; padding: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.6; text-rendering: optimizeLegibility; color: #333333; background-color: #fdfdfd;">I''m 2 weeks PP but I started cooking, cleaning, laundry like 2 days after I got home.&nbsp; My mother was here to help, but spent most of the time with my children(which is what I wanted!)</p>\r\n<p style="box-sizing: border-box; margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 1.6; text-rendering: optimizeLegibility; color: #333333; background-color: #fdfdfd;">But today I am going out for a nice long walk with baby.&nbsp; I need to get out of this house!</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 19),
(44, 29, 61, 'Consult doctor first', '<p class="MsoNormal">Hi Saher,</p>\r\n<p class="MsoNormal">You can go outside. You can ride in a car when you can sit comfortably. Your doctor will tell you when you can drive (about 2 weeks) and go back to work (about 4-6 weeks, depending on the type of work you do).</p>\r\n<p class="MsoNormal">Thanks.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 19),
(44, 26, 62, 'Hello everyone', '<p class="MsoNormal">In the hospital the 2nd day I cleaned/organized my room and walked the hallways for about 20 min&rsquo;s. I admit by the time I got home that night I was doing laundry. I would set a timer and clean for 15 min''s then sit back down. By 2-3 weeks I''m pretty much doing everything and was exercising at 6 weeks.</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p class="MsoNormal">I overdid it with the exercises though b/c my stomach muscles were killing me for 2 days and it''s been 2 months since I had my son. I didn''t listen to my body and it only took 5 min''s later :(</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 19),
(44, 27, 63, 'Hey everyone', '<p class="MsoNormal">I didn''t do a lot of heavy lifting, but I did do some light cleaning in the first few days. Call me crazy, but I went from Rawalpindi to Lahore 4 days PP to visit my family. Long story short, the opportunity presented itself and they weren''t able to come up here. But when I got there, I also took it easy there too. It was a lot of help having all those people around! lol</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p class="MsoNormal">I do whatever I feel up for to be honest. If I don''t feel like I have the energy to clean the house, I don''t.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 19),
(44, 27, 64, 'Hey people', '<p>This thread is very interesting thanks everyone for sharing their unforgettable experiences</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 19),
(39, 27, 65, 'Hello', '<p>I have one daughter her name is hareem meaning: walls of House of Kabba</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 29),
(39, 29, 66, 'hey moms', '<p>I have 2 daughters one is urooj that means rising or mounting</p>\r\n<p>and alina meaning fair and good looking</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'reply', 29),
(49, 29, 67, 'Hey ', '<p>Leave him with your mother in law and ask her to indulge him in amazing actiivities that will enhance his multiple skills so he should be all prepared before he enters school</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 26),
(49, 30, 68, 'Hello', '<p>Thanks Aisha for your concern but can you suggest me some activities that he should do at the age of 3?</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 26),
(49, 29, 69, 'Yes sure:', '<p>Such activities would be amazing for your little kid:</p>\r\n<p>1. Provide him lots of puzzles.</p>\r\n<p>2. Provide him lots of building blocks.</p>\r\n<p>3. A picture storybook would be great and also keep a drawing book and crayons.</p>\r\n<p>4. Indoor throwing activities that don''t break tables like inside basket ball activity or you can also buy useful toys like thunder pins for kids it will develop hand-eye coordination</p>\r\n<p>5. Ask your mother in law to play role play games with him i.e. acting a doctor or a teacher and ask her to play "tea party" with your kid.</p>\r\n<p>Hope i answered your question correctly :)</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 26),
(49, 30, 70, 'Wow interesting', '<p>Thanks a billion Miss. Aisha :)</p>\r\n<p>u''ve shared very interesting activities for my little angel am very impressed keep up the good work!&nbsp;</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 26),
(12, 30, 71, 'Interesting Thread', '<p>wow this thread is very interesting for soon-to-be mummies. I will also share these&nbsp;amazing guideliness with my friends who are pregnant. You people are really great thanks so much</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 20),
(45, 30, 72, 'Hello', '<p>Don''t every try to be a strict mom because it has many disadvantages, Strict parenting deprives kids of the opportunity to internalize self-discipline and responsibility also kids raised with punitive discipline have tendencies toward anger and depression. So stay calm and always love your kids :)</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<h3 style="box-sizing: border-box; border-radius: 0px; font-family: adelle, sans-serif; font-weight: normal; line-height: 27px; color: #2ba9db; margin: 30px 0px 5px; font-size: 20px; text-shadow: none;">&nbsp;</h3>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 23),
(42, 30, 73, 'Hey', '<p>Make a checklist and make sure you add each and every item into your diaper bag:</p>\r\n<p>1. Dipers &amp; Wipes.</p>\r\n<p>2. Hand sanitizer.</p>\r\n<p>3. Bottle both for milk and water.</p>\r\n<p>4. Blanket.</p>\r\n<p>5. Extra clothes for your child.</p>\r\n<p>6. A pack of tissues.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 11),
(47, 30, 74, 'Helo Saher', '<p>Start giving cerelac when your child gets 6 months old and bananas should also be given at the same stage it will help in digesting milk.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 12),
(43, 30, 75, 'Hey zoya', '<p>You should give fresh fruits also or juices especially Orange as we all know its rich in calcium :) Limit the intake of noodles, bakery items can harm your kids digestive system.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 15),
(37, 35, 76, 'be cautious about relationshp with kid', '<p>Apart from friendly relation with ur kid, we should teach them to respect and behave with elders. Friendliness can be negative as well . I have seen kids who are too frank with their mums dads that they forget to respct. In the end parents feel shameful in public .</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 22),
(41, 35, 77, 'eid contest', '<p>What is the criteria of winning the eid contest, managemnt plz let us know. I wish i win :)</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 32),
(45, 35, 78, 'careful parenting', '<p>Learn your kid to respect parents and then your love and care will make them responsible towards you. Strictness is also needed at times. Leniency and easy going moms face alot of tension from their kids when thy grow up.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 23),
(45, 35, 79, 'continued', '<p>Set certain limitations with ur kids and rules in house to be followed strictly. One of the parent should be careful if other one is giving free hand to maintain balance.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 23),
(10, 35, 80, 'your cosn''s daughtr', '<p>Oh saher she is only 14 and at this crucial stage in life she is cut off from family.. thats really sad. Please make all efforts to communicate her n let her know the oldies are aware of the technology as well.talk with her about yhe fav movie or singer she likes or new phone in the market. Talking about her age will defintly make hercomfrtable to talk to oldies :)</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 27),
(44, 35, 81, 'thanks to mom forum', '<p>Good to c moms discussing their general issues freely. The discussions will surely be helpful for moms to be n new moms.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 19),
(43, 35, 82, 'thanks fr advice', '<p>Oh my baby love noodles so i give him on alternate days and he takes it in small quantity. Frankly speaking thy r easy food so make it often.I will surely try healthy n natural dishes as well.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 15),
(49, 35, 83, 'nice tips', '<p>Good luck for your career.really helpful tips by ladies . We as house wives can also follow them to engage our child.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 26),
(50, 27, 84, 'eid cooking', '<p>kindly share what dishes you prefer to make in breakfast after Eid and in lunch? and any tips for easy cooking as i dont get time to get ready on time because of cooking sessions.</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 32),
(44, 27, 85, 'baby work', '<p>Once you start doing your babys small works like bathing, changing diaper and feeding, automatically your physical activity starts there. you won''t be lazy in doing yoour baby''s work</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 19),
(7, 27, 86, 'kids', '<p>oh y kids love chocolate and candies and not fruits and nuts which we want to give them</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 17),
(10, 27, 87, 'sad but true', '<p>oh harsh reality of the times</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 27),
(37, 27, 88, 'fun learn', '<p>best timepass is to let your kids join thefunkids and have fun with learning as well</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 22),
(19, 27, 89, 'read blogs', '<p>I read the blogs here , they are helpful and great. I would recommend everyone of you here to go through them and many of your will be solved</p>', '', '', '2015-07-14', '2015-07-14', 'no', '', 'quote', 25),
(7, 106, 90, 'Hello everyone', '<p>My cute little son loves to drink Orange and Apple juice mixture. For snacks i never give him any type of junk food. I advice all moms to give proper healthy snacks like yogurt, smoothies or cereal will work best for kids brain development</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 17),
(37, 106, 91, 'HELLO FUNKIDS', '<p>A child''s best friend is his mom, he demands full attention no matter if its for studies or play or anything else from food to good night hugs/stories. Dads are always busy so moms should take care in a very positive manner. Strictness would never ever motivate your kid to perform well instead he will feel more hesitant and stop sharing personal problems with you which will definitely leads to a bigger problem because sharing demands caring! So Mums always take some time out from your &nbsp;busy schedule i know its a veryyy tough job for working mummies but its only for your child''s betterment. And remember <strong>its never too late to start! :)</strong></p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 22),
(10, 106, 92, 'Hey people', '<p>okay so you all are talking about tehnology i''ll say it depends on how we use it, for little kids despite the fact that its spoiling them on the other hand its also a great source for learning, many educational games are there to help your child enhance his creativity even simple Paint program also helps in developing mind''s intelligence and also helps kids to express their imaginary feelings on just a simple white coloured window. i''ll say mom should keep an eye on their activities that is it! :)</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 27),
(10, 107, 93, 'my daughter', '<p>my daughter is 14 years. but i''m grateful she hasn''t develoepd any of such habits. One primary reason for this is, me and my husband has been really involved with her throughout. we have been her best friends and support system. there are things she might not want to share with her dad, but she shares them all with me. This i feel is a very very important tip for all parents. Become your child''s best friend first. Also, don''t stop growing. Unlearn, and then learn new thing with changing times so you could always understand the scenerios your kids are in. Don''t tell them xyz did not happen in your generation. things are changing rapidly, no point of giving examples of how things used to be in your time. Focus on present scenerio and develop yourself accordingly to understand your kids better.</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 27),
(37, 107, 94, 'wonderful tips', '<p>I totally second you tooba, thats how the approach should be!</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 22),
(44, 106, 95, 'Hello Saher', '<p class="MsoNormal">Why are you worrying so much fatigue is part of the postnatal period and its common but some useful activities can make you feel energetic all day long some i will mention:</p>\r\n<ul>\r\n<li style="text-align: left;">Give your partner a list of daily responsibilities and leave him to do them at his pace and in the way he wishes to. Rather than criticize, encourage the baby''s father to think about how happy he makes you when he helps you.</li>\r\n<li style="text-align: left;">Don''t assign yourself more than two tasks a day beyond those required in looking after the baby. Face each problem one step at a time. Your self-esteem will grow with each small solution.</li>\r\n<li style="text-align: left;">Keep at least one room in your home tidy and looking nice. You can go there when your spirits need a lift.</li>\r\n<li style="text-align: left;">Go to bed very early. When trying to make up for lost sleep, it''s better to go to bed early rather than plan to sleep late.</li>\r\n<li style="text-align: left;">As soon as the baby is sleeping, drop everything and have a nap! Babies usually sleep longest after their bath and a feeding. Take advantage of this time slot.</li>\r\n<li style="text-align: left;">And don''t forget walking is must so try walking outdoors for an hour a day!</li>\r\n</ul>\r\n<p>Keep visiting our forum! :)</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<p class="MsoNormal">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p class="MsoNormal">&nbsp;</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 19),
(44, 107, 96, 'Exercise is what you need!', '<p>hey saher</p>\r\n<p>&nbsp;</p>\r\n<p>you might find it difficult, but looks like you''re out of stamina. you need to work out, do yoga, eat healthy food which entails protein calcium vitamins etc.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>do drink ensure milk too, it will give you a boost.</p>\r\n<p>&nbsp;</p>\r\n<p>work out is a must to feel fresh. trust me it works.</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 19),
(7, 107, 97, 'snacks', '<p>Lol i know right. every other mom is crying about kids not taking proper meals!</p>\r\n<p>&nbsp;</p>\r\n<p>i think it is this point we all need to get strict with the kids and make them eat because it is their growing age. it is very important they take care of their diet and make sure they get all the required nutrients.</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 17),
(44, 107, 98, 'Good advice!', '<p>Really informative piece of advice Areeba! Everyone must follow it</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 19),
(19, 107, 99, 'good advice', '<p>v.good and informative</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 25),
(19, 107, 100, 'addition', '<p>i would also like to add new moms must take a counselling session. it is not common in our society but it helps a lot to deal with post-delivery blues.</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 25),
(19, 106, 101, 'Important advices', '<p>Common mistakes what new parents actually do and not realizing its harmful effecrts that is they start panicking over anything or everything, they don''t let their infant to cry it out and we all know sleep is very important for little children but moms always wake them up for breastfeeding which is very wrong. And most importantly stay calm never fight in front of your babies or you''ll suffer later.</p>\r\n<p>Thanks! :)</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 25),
(7, 108, 102, 'Hi', '<p>Hi&nbsp;</p>\r\n<p>Sharing few options:</p>\r\n<p>&nbsp;</p>\r\n<ul style="margin: 10px 0px; padding: 0px 0px 0px 20px; border: 0px; font-family: verdana, sans-serif; font-size: 13px; font-stretch: inherit; line-height: 13px; vertical-align: baseline; list-style: none; color: #6d6d6d;">\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Whole grain cereal or oatmeal with milk</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Bite-sized pieces of leftover cooked beef or chicken and soft cooked vegetables</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Milk or yogurt-based fruit smoothies in an open cup</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Yogurt with pieces of soft fresh fruit</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Applesauce with whole grain crackers or roti</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Rice and raisin pudding made with milk</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Dessert tofu with fresh fruit</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Grated or small cubes of cheese with whole grain crackers</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">A small whole grain muffin with fresh fruit and grated cheese</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Whole grain crackers, toast or rice cakes thinly spread with a nut or seed butter or mashed avocado</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Milk or yogurt popsicles blended with fruit</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Banana bread thinly spread with nut or seed butter</li>\r\n<li style="margin: 0px 0px 3px; padding: 0px; border: 0px; font-family: inherit; font-size: 1em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 18px; vertical-align: baseline; list-style: none url(''http://www.healthlinkbc.ca/images/yellow-bullet.png'');">Whole grain pita bread triangles and bean dip</li>\r\n</ul>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 17),
(7, 106, 103, 'Hey Nadia', '<p>Can you share whole-grain muffins recipe here? Please.</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 17),
(19, 35, 104, 'create awareness', '<p>yeah still women are not considering many options available. there is lack of awareness. Together we can create that awareness and help our sisters in trouble</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 25),
(7, 35, 105, 'thanks', '<p>Nadiya thanks . Really great information shared .keep sharing such info and keep spreading awareness</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 17),
(37, 108, 106, 'Hi', '<p>I believe we should give independence to children and make them confident soul.&nbsp;</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 22),
(19, 108, 107, 'Hi', '<p><span style="color: #333333; font-family: Georgia, Century, Times, serif; font-size: 15px; line-height: 21px;">There is no such thing. In order to be the best mother to your baby, all you have to do is try your best. Parenting is filled with both triumphs and failures. Do not be hard on yourself or get discouraged if you fail. Just like with everything else, practice makes perfect. If you fall down, stand up, dust yourself off and try something else.</span></p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 25),
(19, 35, 108, 'good', '<p><em>really informative piece of advices Nadiya</em></p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 25),
(50, 35, 110, 'kids shopng', '<p>i have to dress up my kid many times on Eid day. And my kids shopping is maximum on eid</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 32),
(44, 108, 111, 'Hi', '<p><span style="font-family: inherit; font-size: 12px; font-style: inherit; font-weight: inherit; color: #363534; line-height: 16px; background-color: transparent;">Drink eight large glasses of fluid each day. Water, juice, and milk are good choices.</span></p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 19),
(10, 26, 112, 'kids need attention', '<p>kids need attention and specially young teenage girls. if we have friendly environment at home , we can cultivate that in our young kids as well and they wont feel isolated.</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 27),
(10, 26, 113, 'reply to tooba', '<p>i agree with tooba arshad. we give enoough space to our kids and provide them gadgets and then curse over their habits.&nbsp;</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 27),
(19, 26, 114, 'parenting', '<p>parenting is basically our exam. how we treat with our babies like give our exam , result will come in form of their upbringing</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'quote', 25),
(41, 114, 115, 'my plan for this special eid', '<p>As v all siblings are married and have kids,v have decided to celebrate this eid in our parents home as v had celebrated in our childhood and recall our childhood memories,i m v excited :-)</p>', '', '', '2015-07-15', '2015-07-15', 'no', '', 'reply', 32),
(41, 119, 116, 'Eid Contest Response', '<p>I am going to make this Eid special for my family by making Mamool for the first time ever, and spending time with them.&nbsp;</p>', '', '', '2015-07-16', '2015-07-16', 'no', '', 'quote', 32),
(41, 123, 117, 'making this eid special', '<p><em>As for making my eid day special I will celebrate it at my in laws home instead of my house</em></p>', '', '', '2015-07-16', '2015-07-16', 'no', '', 'reply', 32),
(54, 1, 120, 'Nice topic for learning', '<p>Nice topic for learning</p>', '', '', '2015-07-22', '2015-07-22', 'no', '', 'quote', 10),
(54, 133, 121, 'Umaid this is  good idea', '<p>Umaid this is&nbsp; good idea</p>', '', '', '2015-07-22', '2015-07-22', 'no', '', 'reply', 10),
(54, 133, 122, 'Nice Topic', '<p>Good this is excellent idea and good for kids and moms</p>', '', '', '2015-07-22', '2015-07-22', 'no', '', 'quote', 10),
(54, 133, 123, 'Nice Topic', '<p>Excellent idea for learning</p>', '', '', '2015-07-22', '2015-07-22', 'no', '', 'quote', 10),
(53, 145, 124, 'eid', '<p><a style="box-sizing: border-box; margin: 0px; padding: 0px; color: #777777; text-decoration: none; font-family: ''Source Sans Pro'', sans-serif; font-size: 15.3999996185303px; letter-spacing: 1px; line-height: 22px; background-color: #f4f4f4;" href="mom-forum-thread-eid-mubark-to-all">Eid Mubark to All</a></p>', '', '', '2015-07-22', '2015-07-22', 'no', '', 'quote', 32),
(24, 113, 125, 'Welcome everyone..', '<p>Welcome everyone..</p>', '', '', '2015-07-23', '2015-07-28', 'no', '', 'quote', 10),
(53, 1, 129, 'sdsd', 'sdsdsd', '', '', '2015-08-10', '2015-08-10', 'no', '', 'quote', 32),
(39, 31, 130, 'Sarim Aslam', 'My son''s name is Sarim and its meaning is Sharp sword and Brave lion :)', '', '', '2015-08-12', '2015-08-12', 'no', '', 'reply', 29);

-- --------------------------------------------------------

--
-- Table structure for table `forum_threads`
--

DROP TABLE IF EXISTS `forum_threads`;
CREATE TABLE IF NOT EXISTS `forum_threads` (
  `mom_sub_forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_name` varchar(100) NOT NULL,
  `thread_message` text NOT NULL,
  `thread_tags` text NOT NULL,
  `thread_trackback` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL,
  `isStrict` varchar(3) NOT NULL DEFAULT 'no',
  `thread_image` varchar(100) NOT NULL,
  `thread_seo` varchar(100) NOT NULL,
  PRIMARY KEY (`thread_id`),
  KEY `FK_forum_threads` (`user_id`),
  KEY `FK_forums_threads` (`mom_sub_forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `forum_threads`
--

INSERT INTO `forum_threads` (`mom_sub_forum_id`, `user_id`, `thread_id`, `thread_name`, `thread_message`, `thread_tags`, `thread_trackback`, `createdAt`, `updatedAt`, `isActive`, `isStrict`, `thread_image`, `thread_seo`) VALUES
(10, 29, 5, 'Hi All', 'I am Aisha Khan. I have one kid.</p>\r\n<p>This looks like a great platform for moms. &nbsp;I looking forward to interact with other moms :)&nbsp;', '', '', '2015-06-30', '2015-06-30', 'yes', 'no', '', 'hi-all-4'),
(10, 27, 6, 'Hello', 'This is Amna. I am a working women and mother of two children.&nbsp;', '', '', '2015-06-30', '2015-06-30', 'yes', 'no', '', 'hello'),
(17, 27, 7, 'Hi', 'Can anyone advice me what healthy snacks I can make for my 3 years old kid ?', '', '', '2015-06-30', '2015-06-30', 'yes', 'no', '', 'hi'),
(10, 25, 8, 'Zehra Here!', '<p>Hi All!</p>\r\n<p>&nbsp;</p>\r\n<p>Great to see a forum so informative and engaging!&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>I am a mother of a beautiful daughter who is 5 years old :)</p>', '', '', '2015-07-01', '2015-07-01', 'yes', 'no', '', 'zehra-here!'),
(24, 25, 9, 'Eating habits', '<p>Hi Everyone,</p>\r\n<p>&nbsp;</p>\r\n<p>I want to know what healthy habits are you following to ensure your child gets all the nutrients required. Especially in a growing age of 5-6, where burden of studies is increasing with time. I remain constantly worried for my daughter. Please advise!</p>\r\n<p>&nbsp;</p>\r\n<p>Thanks</p>', '', '', '2015-07-01', '2015-07-01', 'yes', 'no', '', 'eating-habits-1436439344'),
(27, 25, 10, 'Dealing with Teen age kids', '<p>Hello Everyone,</p>\r\n<p>My daughter is 5 years old. She''s not yet a teen-ager however I have seen some kids in my family who are in their teen-age, and their overall behaviour concerns me a lot. I have seen them staying in their room all day, being secretic all the time and they don''t prefer sharing anything with their parents. I don''t understand what has led them to drift away so much from their parents. What do you guys think?</p>\r\n<p>Zehra</p>', '', '', '2015-07-01', '2015-07-01', 'yes', 'no', '', 'dealing-with-teen-age-kids'),
(20, 26, 12, 'Healthy diet plan', '<p>Hello ladies,</p>\r\n<p>&nbsp;</p>\r\n<p>I am looking for a nutritious diet plan to following during pregnancy to ensure good health. Please tell me some tried and tested plans only. &nbsp;TIA!</p>', '', '', '2015-07-01', '2015-07-01', 'yes', 'no', '', 'healthy-diet-plan-1436439182'),
(10, 35, 14, 'My Introduction', 'Zoya here, mother of a baby boy! I am hopeful this forum is gonna be helpful for me deal with my 2 year old naughty kid....', '', '', '2015-07-02', '2015-07-02', 'yes', 'no', '', 'my-introduction'),
(10, 84, 17, 'Share your feedback', '<p>Hi All,</p>\r\n<p>Feedback, suggestions and queries are appreciated. Feel free to ask the team anything. Your opinion is valuable for us.</p>\r\n<p>&nbsp;</p>\r\n<p>Regards.</p>', '', '', '2015-07-08', '2015-07-08', 'yes', 'no', '', 'share-your-feedback'),
(25, 88, 19, 'Parenting advice for new moms', '1. Cramming the Crib Too Full \r\n\r\nIt''s tempting to load the crib with baby paraphernalia; it''s all so adorable! But too many toys and other objects can be overstimulating and downright dangerous.\r\nThe Fix \r\n\r\nPillows, stuffed animals, blankets and even crib bumpers can be suffocation hazards. The American Academy of Pediatrics recently issued a statement urging parents not to use sleep positioners, which can increase the risk of babies suffocating. â€œYour best bet is to have a quiet, dark, cool environment for baby to sleep in,â€ says Kim West, author of The Sleep Lady''s Good Night, Sleep Tight. â€œA clean, well-fitting sheet and a firm mattress are all he needs.â€', '', '', '2015-07-08', '2015-07-08', 'yes', 'no', '', 'parenting-advice-for-new-moms'),
(14, 26, 20, 'Need help!', '<p>Hello Fun kids,</p>\r\n<p>My son is 7 years old, can anyone suggest me some good and healthy breakfast items?</p>\r\n<p>Thanks in advance.&nbsp;</p>', '', '', '2015-07-08', '2015-07-09', 'yes', 'no', '', 'need-help!'),
(10, 1, 24, 'welcome to the fun kids mom form', '<p>welcome to the fun kids mom form</p>', '', '', '2015-07-09', '2015-07-09', 'yes', 'no', '', 'welcome-to-the-fun-kids-mom-form'),
(31, 29, 36, 'Wash hands', '<p>For our hygiene and regular cleanliness, waashng hands is really imp for kids and whole family!</p>', '', '', '2015-07-13', '2015-07-14', 'yes', 'no', '', 'wash-hands'),
(22, 29, 37, 'Need Guidance', '<p>Its really important for moms to learn positive parenting. We, as young moms are more lineant and ssometimes very harsh towards our kids and neglect many things. I found this forum really helpful .The blogs are helpful too</p>', '', '', '2015-07-13', '2015-07-14', 'yes', 'no', '', 'need-guidance'),
(31, 30, 38, 'ans', '<p>to Remove dirt from hands and germs . Ask your kids to wash hands properly before eating and also after playing with toys. keep your children safe from germs</p>', '', '', '2015-07-13', '2015-07-14', 'yes', 'no', '', 'ans'),
(29, 30, 39, 'kids names', '<p>Share name of your kids and their meaning!</p>', '', '', '2015-07-13', '2015-07-14', 'yes', 'no', '', 'kids-names'),
(30, 27, 40, 'when is it?', '<p>Share details of eid contest plzzzz</p>\r\n<p>i wanna win a gift hamper for my kid</p>', '', '', '2015-07-13', '2015-07-14', 'yes', 'no', '', 'when-is-it?'),
(32, 26, 41, 'How do you plan to make this Eid Special for your family?', '<p>We&nbsp;<em>arrange family gatherings , have food or make BBQ.&nbsp;</em></p>', '', '', '2015-07-13', '2015-07-14', 'yes', 'no', '', 'how-do-you-plan-to-make-this-eid-special-for-your-family?'),
(11, 35, 42, 'help', '<p>Kindly discus how to prepare bags for our newborns when going out. I always miss out something n face tension afterwards. Plzz help</p>', '', '', '2015-07-14', '2015-07-14', 'yes', 'no', '', 'help'),
(15, 35, 43, 'baby lunch', '<p>For lunch,i give noodles or egg fried rice and mesh potatos and custard to my baby. Its healthy and complete meal.</p>', '', '', '2015-07-14', '2015-07-14', 'yes', 'no', '', 'baby-lunch'),
(19, 83, 44, 'Not feeling energetic post-delivery', '<p>Hi All,</p>\r\n<p>I want to share my concern and i''m looking for some home remedies. I have noticed ever since my delivery i have been feeling really tired and weak all the time. I feel sleepy too all day. I don''t get enough sleep as my baby keeps me awake all night and in the day time there are house chores to do. I don''t know what to do to feel fresh and energetic. any advice??</p>', '', '', '2015-07-14', '2015-07-15', 'yes', 'no', '', 'not-feeling-energetic-post-delivery'),
(23, 83, 45, 'Strict or casual?', '<p>&nbsp;Hey all</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;i want to know what parenting style should we adopt for better upbringing of our children? Should we be strict or should we be eay-going?</p>', '', '', '2015-07-14', '2015-07-15', 'yes', 'no', '', 'strict-or-casual?'),
(16, 83, 46, 'Diet plan', '<p>Hey everyone,</p>\r\n<p>&nbsp;</p>\r\n<p>I want a diet plan to follow which can help me feel energetic but at the same time it should not be fattening. Can anyone please suggest some tried and tested method?</p>', '', '', '2015-07-14', '2015-07-15', 'yes', 'no', '', 'diet-plan'),
(12, 83, 47, 'Cerelac and other food', '<p>I want to know what age is appropriate to start feeding child with cerelac, mashed bananas etc? Should it be started from 6 months or we should wait for a year?</p>', '', '', '2015-07-14', '2015-07-15', 'yes', 'no', '', 'cerelac-and-other-food'),
(13, 30, 48, 'Hyper toodler', '<p>My 3 year old is extremely hyper, it gets so difficult to control him at times.&nbsp;</p>\r\n<p>is there any way to calm him down, make him sleep on time and feed him healthy food because all that he wants is chocolates all the time.</p>', '', '', '2015-07-14', '2015-07-15', 'yes', 'no', '', 'hyper-toodler'),
(26, 30, 49, 'Going back to work after 3 years', '<p>I have been a working woman but i took break after my first baby. now that i am planning to go to work i want to know what are the top-most things i should do for my kid. should i leave him to my mother and sister or should i hire a maid and leave him with my mother in law at our home?&nbsp;</p>', '', '', '2015-07-14', '2015-07-15', 'yes', 'no', '', 'going-back-to-work-after-3-years'),
(32, 105, 50, 'EID MUBARAK ', '<p>First to ready for pray.then make food.every person who like.then all family members play a game.in night go out side</p>', '', '', '2015-07-14', '2015-07-24', 'yes', 'no', '', 'eid-mubarak'),
(32, 122, 51, 'Eid planzzzzz', '<p>Vacations......eidi......food.....ice cream.........animated cartoon films......play land.....going to relative''s and friends.........inviting others......and obviously stories n rhymes with "the fun kids.com.</p>', '', '', '2015-07-16', '2015-07-24', 'yes', 'no', '', 'eid-planzzzzz'),
(32, 114, 52, 'My Plan for this special Eid', '<p style="box-sizing: border-box; margin: 0px 0px 10px; padding: 5px 0px; color: #666666; font-family: ''Source Sans Pro'', sans-serif; font-size: 14px; line-height: 20px;">As v all siblings are married and have kids,v have decided to celebrate this eid in our parents home as v had celebrated in our childhood and recall our childhood memories,i m v excited :-)</p>\r\n<p>&nbsp;</p>', '', '', '2015-07-16', '2015-07-24', 'yes', 'no', '', 'my-plan-for-this-special-eid'),
(32, 133, 53, 'Eid Mubark to All', '<p>Eid Mubark to All</p>', '', '', '2015-07-18', '2015-07-24', 'yes', 'no', '', 'eid-mubark-to-all'),
(10, 31, 55, 'Hi Moms', 'My name is Mashal Mabood. I have a son who will turn 2 in October inshAllah :)', '', '', '2015-08-12', '2015-08-12', 'no', 'no', '', 'hi-moms');

-- --------------------------------------------------------

--
-- Table structure for table `fun_learn`
--

DROP TABLE IF EXISTS `fun_learn`;
CREATE TABLE IF NOT EXISTS `fun_learn` (
  `fun_learn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fun_learn_name` varchar(100) NOT NULL,
  `fun_learn_image` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isFeatured` varchar(3) NOT NULL DEFAULT 'no',
  `fun_learn_code` text NOT NULL,
  `fun_learn_decription` text NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `fun_learn_seo` varchar(100) NOT NULL,
  `fun_learn_title` varchar(100) NOT NULL,
  `meta_tag_keyword` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `fun_learn_home_image` varchar(100) NOT NULL,
  `fun_learn_seo_decription` text NOT NULL,
  PRIMARY KEY (`fun_learn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `fun_learn`
--

INSERT INTO `fun_learn` (`fun_learn_id`, `fun_learn_name`, `fun_learn_image`, `createdAt`, `updatedAt`, `isActive`, `isFeatured`, `fun_learn_code`, `fun_learn_decription`, `slider_image`, `fun_learn_seo`, `fun_learn_title`, `meta_tag_keyword`, `meta_tag_description`, `fun_learn_home_image`, `fun_learn_seo_decription`) VALUES
(1, 'Exploring Continents the Fun Way', 'fun-and-learn-continents.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/135035256" width="100%" height="500"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', '', 'fun-and-learn-continets.png', 'exploring-continents-the-fun-way', 'Exploring the Continents the Fun Way - The Fun Kids Learn', 'the fun kids, pakistani fun learn, continents, exploring the world, fun facts for pakistani kids, geography, facts about the world', 'Did you know that Lion King''s Simba was an inhabitant of Africa? A great way for Pakistani kids to discover fun facts about the world a fun way!', '', ''),
(2, 'Ride the car you build', 'fun-and-learn-Making-car.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/135035258" width="100%" height="500"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ', '', 'fun-and-learn-making-car.png', 'learn-ride-the-car-you-build', 'Ride the Car You Build! The Fun Kids Fun Learn', 'the fun kids, fun learn for pakistani kids, assemble a car, building a car, 3d jigsaw puzzle of car', 'Assemble your very own car in just a few minutes through this informative Pakistani Fun Learn tutorial offered by The Fun Kids!', '', ''),
(3, 'Fly into the Fantasy World', 'fun-and-learn-Making-majic-plan.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/135036185" width="100%" height="500"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', '', 'fun-and-learn-majic-plan.png', 'fly-into-the-fantasy-world', 'Fly Into the Fantasy World - The Fun Kids Fun Learn', 'fun learn for pakistani kids, the fun kids, fantasy, water glider, plane, jigsaw puzzle, interlocking puzzles', 'Learn how to make a water gliding plane through interlinking wood pieces in this Pakistani fun video introduced by TheFunKids Fun Learn ', '', ''),
(4, 'Fly your own Jet', 'fun-and-learn-Making-plan.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/135035255"  width="100%" height="500"   frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', '', 'fun-and-learn-making-plan.png', 'fly-your-own-jet', 'Fly Your Own Jet - The Fun Learn', 'fun learn for pakistni kids, the fun kids, jet plane, airplane, jigaw puzzles, interlocking puzzles, 3d puzzles', 'See how to create a Jet Plane from a set of jigsaw puzzles in this amazing video for Pakistani kids available at The Fun Kids'' Fun Learn!', '', ''),
(5, 'Us & Around Us Our Solar System', 'fun-and-learn-planets.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/135035260" width="100%" height="500"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ', '', 'fun-and-learn-solar-system.png', 'us-around-us-Our-solar-system', 'Us and Around Us | Our Solar System - The Fun Learn', 'the fun kids, fun learn for pakistani kids, solar system, planets, fun facts, beginner''s astronomy', 'Us and Around Us- Our Solar System is a knowledge-based video about the sun and its 8 planets, perfect for a Pakistani child''s first astronomy lesson!', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fun_learn_comment`
--

DROP TABLE IF EXISTS `fun_learn_comment`;
CREATE TABLE IF NOT EXISTS `fun_learn_comment` (
  `fun_learn_comment_id` int(22) NOT NULL AUTO_INCREMENT,
  `fun_learn_id` int(22) NOT NULL,
  `comments` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `user_id` int(22) NOT NULL,
  PRIMARY KEY (`fun_learn_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fun_learn_comment`
--

INSERT INTO `fun_learn_comment` (`fun_learn_comment_id`, `fun_learn_id`, `comments`, `createdAt`, `updatedAt`, `isActive`, `user_id`) VALUES
(1, 3, 'Nice', '0000-00-00', '0000-00-00', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(100) NOT NULL,
  `game_image` varchar(100) NOT NULL,
  `game_file` varchar(100) NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isFeatured` varchar(3) NOT NULL DEFAULT 'no',
  `createdAt` date NOT NULL,
  `updateAt` date NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `seo_game` varchar(100) NOT NULL,
  `game_title` varchar(100) NOT NULL,
  `meta_tag_keyword` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `game_home_image` varchar(100) NOT NULL,
  `game_seo_description` text NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `game_name`, `game_image`, `game_file`, `isActive`, `isFeatured`, `createdAt`, `updateAt`, `slider_image`, `seo_game`, `game_title`, `meta_tag_keyword`, `meta_tag_description`, `game_home_image`, `game_seo_description`) VALUES
(1, 'Find The Shape', 'game-find-the-shape.jpg', 'SHAPES-GAMES-FINISHED.swf', 'yes', 'yes', '2015-06-17', '2015-07-07', 'findtheshapgame.png', 'find-the-shape', 'Find the Shape - The Fun Kids Learning Games', 'find the shape,learning games, educational games, free games download, kids game, games online, jigsaw puzzle, online free games, math games, abc games, children games, puzzle games online\r\n', 'Let your child play with The Fun Kids educational children games, Find the Shape, to boost his memory and recognition. Find more Pakistani learning games at The Fun Kids!', 'kids-games-findtheshape.png', ''),
(2, 'Symmetry Game', 'game-symmetry-game.jpg', 'SYMETRY-GAME-FINISHED.swf', 'yes', 'yes', '2015-06-17', '2015-07-07', 'symmertygame.png', 'symmetry-game', 'Symmetry Games - The Fun Kids Learning Games', 'symmetry games, fit the shape, educational games, learning games, abc games, math games, online puzzle games, puzzle games online', 'Symmetry Game lets your kids match same shapes and improves shape recognition. Find more online puzzle games for kids at TheFunKids!', 'kids-games-symmetry.png', ''),
(3, 'Hangman', 'game-hang-man-game.jpg', 'HangMan.swf', 'yes', 'yes', '2015-07-03', '2015-07-03', 'the-hangman-slider.png', 'hang-man', 'Hang Man - The Fun Kids Learning Games', 'the hang man, learning games, educational games, online puzzle games for kids, games for pakistani kids, online pakistani games', 'The Hang Man must be one of the most popular kids vocabulary and abc games in existence. Play this online puzzle game for Pakistani kids!', 'kids-games-hangman.png', ''),
(4, 'who want to be a smart kids', 'who-want-to-a-smart-kids.jpg', 'TRIVIA-FINAL.swf', 'yes', 'yes', '2015-07-30', '2015-07-30', 'whoo.png', 'who-want-to-be-a-smart-kids', 'Who Wants to be a Smart Kid? The Fun Kids  Children Games', 'smart kids, quiz game, online quizzing game, online quiz for pakistani kids, children games, abc games, math games', 'The Fun Kids Games introduces ''Who Wants to Be a Smart Kid?'', featuring online puzzle games for Pakistani kids to test their IQ!', 'who-want-to-a-smart-kids.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `games_comment`
--

DROP TABLE IF EXISTS `games_comment`;
CREATE TABLE IF NOT EXISTS `games_comment` (
  `game_comment_id` int(22) NOT NULL AUTO_INCREMENT,
  `game_id` int(22) NOT NULL,
  `comments` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `user_id` int(22) NOT NULL,
  PRIMARY KEY (`game_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `golive_admin`
--

DROP TABLE IF EXISTS `golive_admin`;
CREATE TABLE IF NOT EXISTS `golive_admin` (
  `user_id` int(22) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `secretequestion` varchar(100) NOT NULL,
  `secreteanswer` varchar(100) NOT NULL,
  `verificationcode` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updateAt` date NOT NULL,
  `userRole` varchar(100) NOT NULL,
  `isactive` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `golive_admin`
--

INSERT INTO `golive_admin` (`user_id`, `email`, `password`, `fullname`, `secretequestion`, `secreteanswer`, `verificationcode`, `createdAt`, `updateAt`, `userRole`, `isactive`, `description`) VALUES
(1, 'admin@thefunkids.com', 'd7eba635ef246bde41c19a2d83978d1a', 'Administrator', 'what is your birth place?', 'Ranipur', 'bcdf90ab7890npqr234578901234abcd', '2015-06-19', '2015-06-19', 'admin', 'Yes', 'Testing'),
(2, 'azeem.akram78@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Azeem Akram', 'what is your best friend name?', 'Azeem', 'vwxyrstvfghj90abdfghjkmn890axyz', '2015-06-28', '2015-06-28', '', '', ''),
(3, 'nrashid@golive.com.pk', 'e10adc3949ba59abbe56e057f20f883e', 'Nadiya', 'what is your best friend name?', 'nadiya', 'z7890stvwpqrs5678npqr5678z', '2015-06-28', '2015-06-28', '', '', ''),
(4, 'saher@golive.com.pk', 'e10adc3949ba59abbe56e057f20f883e', 'Sahar Najam', 'what is your best friend name?', 'Sahar', '4567abcdyz1234dfghqrsttvwxvwxy', '2015-06-28', '2015-06-28', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `leftaddense`
--

DROP TABLE IF EXISTS `leftaddense`;
CREATE TABLE IF NOT EXISTS `leftaddense` (
  `adds_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_name` varchar(100) NOT NULL,
  `adds_image` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`adds_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leftaddense`
--

INSERT INTO `leftaddense` (`adds_id`, `add_name`, `adds_image`, `createdAt`, `updatedAt`, `isActive`) VALUES
(1, 'add1', 'add12.png', '2015-06-17', '2015-06-17', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `momforum`
--

DROP TABLE IF EXISTS `momforum`;
CREATE TABLE IF NOT EXISTS `momforum` (
  `mom_forum_id` int(22) NOT NULL AUTO_INCREMENT,
  `mom_forum_title` varchar(100) NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isStrict` varchar(3) NOT NULL DEFAULT 'no',
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `mom_formum_seo` varchar(100) NOT NULL,
  PRIMARY KEY (`mom_forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `momforum`
--

INSERT INTO `momforum` (`mom_forum_id`, `mom_forum_title`, `isActive`, `isStrict`, `createdAt`, `updatedAt`, `mom_formum_seo`) VALUES
(1, 'Welcome to Mothering! ', 'yes', 'no', '2015-06-24', '2015-07-03', 'welcome-to-mothering!'),
(2, 'All about Parenting ', 'yes', 'no', '2015-06-24', '2015-07-03', 'all-about-parenting'),
(5, 'Pregnancy ', 'yes', 'no', '2015-06-30', '2015-07-03', 'pregnancy'),
(6, 'Ages and stages', 'yes', 'no', '2015-06-30', '2015-07-03', 'ages-and-stages'),
(7, 'New Moms', 'yes', 'no', '2015-06-30', '2015-07-03', 'new-moms'),
(8, 'Working Moms', 'yes', 'no', '2015-06-30', '2015-07-03', 'working-moms'),
(9, 'Food Recipes for Kids', 'yes', 'no', '2015-06-30', '2015-07-03', 'food-recipes-for-kids'),
(10, 'Eid Contest', 'yes', 'yes', '2015-07-08', '2015-07-14', 'eid-contest'),
(11, 'Hygiene for kids', 'yes', 'no', '2015-07-09', '2015-07-13', 'hygiene-for-kids');

-- --------------------------------------------------------

--
-- Table structure for table `momforum_notification`
--

DROP TABLE IF EXISTS `momforum_notification`;
CREATE TABLE IF NOT EXISTS `momforum_notification` (
  `rhyme_comment_id` int(11) NOT NULL,
  `game_comment_id` int(11) NOT NULL,
  `puzzle_comment_id` int(11) NOT NULL,
  `story_comment_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `thread_reply_id` int(11) NOT NULL,
  UNIQUE KEY `rhyme_comment_id` (`rhyme_comment_id`,`game_comment_id`,`puzzle_comment_id`,`story_comment_id`,`thread_id`,`thread_reply_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `momforum_notification`
--

INSERT INTO `momforum_notification` (`rhyme_comment_id`, `game_comment_id`, `puzzle_comment_id`, `story_comment_id`, `thread_id`, `thread_reply_id`) VALUES
(3, 0, 0, 0, 49, 0);

-- --------------------------------------------------------

--
-- Table structure for table `momsubforum`
--

DROP TABLE IF EXISTS `momsubforum`;
CREATE TABLE IF NOT EXISTS `momsubforum` (
  `mom_forum_id` int(11) NOT NULL,
  `mom_sub_forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `mom_sub_forum_title` varchar(100) NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isStrict` varchar(3) NOT NULL DEFAULT 'no',
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `momforum_seo` varchar(100) NOT NULL,
  `sub_forum_title` varchar(100) NOT NULL,
  `meta_tag_keyword` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `subforum_simlies` varchar(100) NOT NULL,
  PRIMARY KEY (`mom_sub_forum_id`),
  KEY `FK_momsubforum` (`mom_forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `momsubforum`
--

INSERT INTO `momsubforum` (`mom_forum_id`, `mom_sub_forum_id`, `mom_sub_forum_title`, `isActive`, `isStrict`, `createdAt`, `updatedAt`, `momforum_seo`, `sub_forum_title`, `meta_tag_keyword`, `meta_tag_description`, `subforum_simlies`) VALUES
(1, 10, 'New here ? Introduce Yourself !', 'yes', 'no', '2015-06-30', '2015-07-24', 'new-here-?-introduce-yourself-!', 'Mom Forum - New here ? Introduce Yourself ! | The Fun Kids', '', '', 'add-member.png'),
(6, 11, 'Newborns and Infants', 'yes', 'no', '2015-06-30', '2015-07-24', 'newborns-and-infants', 'Mom Forum - Newborns and Infants | The Fun Kids', '', '', 'group.png'),
(6, 12, 'Babies ', 'yes', 'no', '2015-06-30', '2015-07-24', 'babies', 'Mom Forum - Babies  | The Fun Kids', '', '', 'horse-mf.png'),
(6, 13, 'Toddlers ', 'yes', 'no', '2015-06-30', '2015-07-24', 'toddlers', 'Mom Forum - Toddlers  | The Fun Kids', '', '', 'person-mf.png'),
(9, 14, 'Breakfast', 'yes', 'no', '2015-06-30', '2015-07-24', 'breakfast', 'Mom Forum - Breakfast | The Fun Kids', '', '', 'add-member.png'),
(9, 15, 'Lunch', 'yes', 'no', '2015-06-30', '2015-07-24', 'lunch', 'Mom Forum - Lunch | The Fun Kids', '', '', 'group.png'),
(9, 16, 'Dinner', 'yes', 'no', '2015-06-30', '2015-07-24', 'dinner', 'Mom Forum - Dinner | The Fun Kids', '', '', 'horse-mf.png'),
(9, 17, 'Snacks ', 'yes', 'no', '2015-06-30', '2015-07-24', 'snacks', 'Mom Forum - Snacks  | The Fun Kids', '', '', 'person-mf.png'),
(5, 18, 'Week by week', 'yes', 'no', '2015-06-30', '2015-07-24', 'week-by-week', 'Mom Forum - Week by week | The Fun Kids', '', '', 'add-member.png'),
(5, 19, 'Health and Well being ', 'yes', 'no', '2015-06-30', '2015-07-24', 'health-and-well-being', 'Mom Forum - Health and Well being  | The Fun Kids', '', '', 'group.png'),
(5, 20, 'Preparing for a baby', 'yes', 'no', '2015-06-30', '2015-07-24', 'preparing-for-a-baby', 'Mom Forum - Preparing for a baby | The Fun Kids', '', '', 'horse-mf.png'),
(5, 21, 'Labour and Birth', 'yes', 'no', '2015-06-30', '2015-07-24', 'labour-and-birth', 'Mom Forum - Labour and Birth | The Fun Kids', '', '', 'person-mf.png'),
(2, 22, 'Positive Parenting', 'yes', 'no', '2015-06-30', '2015-07-24', 'positive-parenting', 'Mom Forum - Positive Parenting | The Fun Kids', '', '', 'add-member.png'),
(2, 23, 'Parenting Style', 'yes', 'no', '2015-06-30', '2015-07-24', 'parenting-style', 'Mom Forum - Parenting Style | The Fun Kids', '', '', 'group.png'),
(2, 24, 'Advice and Tips', 'yes', 'no', '2015-06-30', '2015-07-24', 'advice-and-tips', 'Mom Forum - Advice and Tips | The Fun Kids', '', '', 'horse-mf.png'),
(7, 25, 'Parenting advice for new moms', 'yes', 'no', '2015-06-30', '2015-07-24', 'parenting-advice-for-new-moms', 'Mom Forum - Parenting advice for new moms | The Fun Kids', '', '', 'person-mf.png'),
(8, 26, 'Parenting advice for working moms', 'yes', 'no', '2015-06-30', '2015-07-24', 'parenting-advice-for-working-moms', 'Mom Forum - Parenting advice for working moms | The Fun Kids', '', '', 'group.png'),
(2, 27, 'Parenting issues', 'yes', 'no', '2015-06-30', '2015-07-24', 'parenting-issues', 'Mom Forum - Parenting issues | The Fun Kids', '', '', 'person-mf.png'),
(8, 28, 'Balancing work and family life', 'yes', 'no', '2015-06-30', '2015-07-24', 'balancing-work-and-family-life', 'Mom Forum - Balancing work and family life | The Fun Kids', '', '', 'add-member.png'),
(7, 29, 'Baby Names ', 'yes', 'no', '2015-06-30', '2015-07-24', 'baby-names', 'Mom Forum - Baby Names  | The Fun Kids', '', '', 'group.png'),
(10, 30, 'Eid Contest ', 'yes', 'no', '2015-07-08', '2015-07-24', 'eid-contest', 'Mom Forum - Eid Contest  | The Fun Kids', '', '', 'horse-mf.png'),
(11, 31, 'Why washing hands is important ?', 'yes', 'yes', '2015-07-09', '2015-07-24', 'why-washing-hands-is-important-?', 'Mom Forum - Why washing hands is important ? | The Fun Kids', '', '', 'person-mf.png'),
(10, 32, 'How do you plan to make this Eid Special for your family?', 'yes', 'yes', '2015-07-13', '2015-07-24', 'how-do-you-plan-to-make-this-eid-special-for-your-family?', 'Mom Forum - How do you plan to make this Eid Special for your family? | The Fun Kids', '', '', 'horse-mf.png');

-- --------------------------------------------------------

--
-- Table structure for table `mom_forum_posts`
--

DROP TABLE IF EXISTS `mom_forum_posts`;
CREATE TABLE IF NOT EXISTS `mom_forum_posts` (
  `mom_sub_forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(100) NOT NULL,
  `post_message` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_trackback` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `FK_forum_threads` (`user_id`),
  KEY `FK_forums_threads` (`mom_sub_forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mom_forum_posts`
--

INSERT INTO `mom_forum_posts` (`mom_sub_forum_id`, `user_id`, `post_id`, `post_name`, `post_message`, `post_tags`, `post_trackback`, `createdAt`, `updatedAt`, `isActive`) VALUES
(1, 1, 1, 'Introduction from me', 'Hi All Iam Azeem AKram and Iam new any one plz guide to use this forum ', '', '', '2015-06-24', '2015-06-24', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `puzzles`
--

DROP TABLE IF EXISTS `puzzles`;
CREATE TABLE IF NOT EXISTS `puzzles` (
  `puzzle_id` int(11) NOT NULL AUTO_INCREMENT,
  `puzzle_name` varchar(100) NOT NULL,
  `puzzle_image` varchar(100) NOT NULL,
  `puzzle_file` varchar(100) NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isFeatured` varchar(3) NOT NULL DEFAULT 'no',
  `createdAt` date NOT NULL,
  `updateAt` date NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `seo_puzzle` varchar(100) NOT NULL,
  `puzzle_title` varchar(100) NOT NULL,
  `meta_tag_keyword` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `puzzle_home_image` varchar(100) NOT NULL,
  PRIMARY KEY (`puzzle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `puzzles`
--

INSERT INTO `puzzles` (`puzzle_id`, `puzzle_name`, `puzzle_image`, `puzzle_file`, `isActive`, `isFeatured`, `createdAt`, `updateAt`, `slider_image`, `seo_puzzle`, `puzzle_title`, `meta_tag_keyword`, `meta_tag_description`, `puzzle_home_image`) VALUES
(5, 'Puzzle Mania 1', 'puzzle-puzzlemaiz-1.jpg', 'PUZZLE-ONE.swf', 'yes', 'yes', '2015-06-20', '2015-06-29', 'puzzlemania1puzzle.png', 'puzzle-mania-1', 'Puzzle Mania 1 - Puzzle Games Online for Pakistani Kids', 'puzzle mania 1, pakistani puzzles, online puzzle games, jigsaw puzzle games, puzzle games for girls, puzzle games for kids', 'Play Puzzle Mania 1, an online puzzle game for kids at The Fun Kids. Free jigsaw puzzle games downloads at TheFunKids', 'game-puzzlemania.jpg'),
(6, 'Puzzle Mania 2', 'puzzle-puzzlemaiz-2.jpg', 'PUZZLE-TWO.swf', 'yes', 'yes', '2015-06-20', '2015-06-29', 'puzzlemania2puzzle.png', 'puzzle-mania-2', 'Puzzle Mania 2 - Online Puzzle Games for Pakistani Kids', 'puzzle mania 2, jigsaw puzzle games, online puzzle games, puzzle games for kids ', 'Play Puzzle Mania 2 and other online puzzle games for kids at our interactive section of puzzles games for kids.', ''),
(7, 'Puzzle Mania 3', 'puzzle-puzzlemaiz-3.jpg', 'PUZZLE-THREE.swf', 'yes', 'yes', '2015-07-08', '2015-07-08', 'puzzlemania3.png', 'puzzle-mania-3', 'Puzzle Mania 3 - Online Puzzle Games for Girls and Boys', 'puzzle mania 3, puzzles, online puzzle games, puzzle games online, jigsaw puzzle games, puzzle games download', 'The Fun Kids online puzzle games bring you Puzzle Mania 3, mind boggling puzzle games for girls and boys! Puzzle games download at The Fun Kids!', '');

-- --------------------------------------------------------

--
-- Table structure for table `puzzles_comment`
--

DROP TABLE IF EXISTS `puzzles_comment`;
CREATE TABLE IF NOT EXISTS `puzzles_comment` (
  `puzzle_comment_id` int(22) NOT NULL AUTO_INCREMENT,
  `puzzle_id` int(22) NOT NULL,
  `comments` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `user_id` int(22) NOT NULL,
  PRIMARY KEY (`puzzle_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `rhymes`
--

DROP TABLE IF EXISTS `rhymes`;
CREATE TABLE IF NOT EXISTS `rhymes` (
  `rhyme_id` int(11) NOT NULL AUTO_INCREMENT,
  `rhyme_name` varchar(100) NOT NULL,
  `rhyme_image` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isFeatured` varchar(3) NOT NULL DEFAULT 'no',
  `rhyme_code` text NOT NULL,
  `rhyme_decription` text NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `rhyme_seo` varchar(100) NOT NULL,
  `rhyme_title` varchar(100) NOT NULL,
  `meta_tag_keyword` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `rhyme_home_image` varchar(100) NOT NULL,
  `rhyme_seo_decription` text NOT NULL,
  PRIMARY KEY (`rhyme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `rhymes`
--

INSERT INTO `rhymes` (`rhyme_id`, `rhyme_name`, `rhyme_image`, `createdAt`, `updatedAt`, `isActive`, `isFeatured`, `rhyme_code`, `rhyme_decription`, `slider_image`, `rhyme_seo`, `rhyme_title`, `meta_tag_keyword`, `meta_tag_description`, `rhyme_home_image`, `rhyme_seo_decription`) VALUES
(1, 'Alphabet Song', 'rhymes-Alphabets-song.jpg', '2015-06-17', '2015-06-17', 'yes', 'no', '<iframe src="https://player.vimeo.com/video/131276904" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'A B C D E F G\r\nH I J K L M N O P\r\nQ R S \r\nT U V \r\nW X Y Z\r\nNow I know my ABC\r\nNext time want you sing with me. \r\n', '', 'alphabet-song', 'The Alphabet Song - Rhyming Poems for Kids in Pakistan', 'alphabet song, rhyming poems for kids, kids rhymes poems, nursery rhymes songs, free download nursery rhymes, nursery rhyme poems, famous poems for kids, rhymes of pakistani kids', 'Play the Alphabet Song for your child through The Fun Kids. Free download nursery rhymes poems for kids in Pakistan at TheFunKids.', 'rhymes-Alphabets-song.jpg', '<strong>The Alphabet Song- Nursery Rhymes Poems for Pakistani Kids</strong>\r\n<br>\r\nThe Alphabet Song is one of the most famous <strong>rhyming poems for kids</strong> used at pre-school and kindergarten level, to teach children the letters of the alphabet. The Alphabet Song was first created and copyrighted in 1835 by Charles Bradley, a music publisher based in Boston, USA and the music was composed by an 18th century composer, Louise Le Maire.\r\n<br>\r\nThe tune of this song is the same tune as Twinkle Twinkle Little Star and Baa Baa Black Sheep! A song was also released in 1966 called the Backward Alphabet that sang the letters in reverse! Listen to these <strong>nursery rhymes poems</strong> and help them learn the alphabet! <strong>Free download nursery rhymes</strong> from <strong>The Fun Kids Rhymes</strong> section today.\r\n'),
(2, 'Twinkle Twinkle Little Star', 'rhymes-Twinkle-twinkle.jpg', '2015-06-17', '2015-06-17', 'yes', 'no', '<iframe src="https://player.vimeo.com/video/131280064" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Twinkle twinkle little star\r\nHow I wonder what you are!\r\nUp above the world so high\r\nLike a diamond in the sky\r\n', '', 'twinkle-twinkle-little-star', 'Twinkle Twinkle Little Star- The Fun Kids Baby Rhymes for Kids', 'twinkle twinkle, twinkle twinkle little star, baby rhymes, kids rhyming poems, kids rhymes songs, nursery poems', 'Twinkle, Twinkle Little Star is one of the famous baby rhymes for kids in Pakistan. Free download nursery rhymes like these at our nursery poems section!', 'rhymes-Twinkle-twinkle.jpg', '<strong>Twinkle Twinkle Little Star Baby Rhymes for Kids in Pakistan</strong><br>\r\n\r\nTwinkle Twinkle Little Star is a popular <strong>baby rhyme</strong> and lullaby of English origin created by Jane Taylor in the early 19th century. The original poem called <strong>The Star</strong> from which this <strong>nursery rhyme poem</strong> has been extracted, actually consisted of 6 stanzas- now however only the first one is widely known! The poem follows the same tune as the Alphabet Song and was composed by many famous composers like Mozart! <strong>Twinkle Twinkle Little Star</strong> has been the target of many parodies- a version of it also appears in the famous storybook Alice in Wonderland and many pop culture groups and bands have created nursery rhymes songs out of its variations. Go to <strong>The Fun Kids Rhymes</strong> page now and let your child look at our <strong>nursery rhymes videos</strong> for Pakistani kids!\r\n'),
(3, 'Itsy Bitsy Spider', 'rhymes-Itsy-Bitsy-Spider.jpg', '2015-06-17', '2015-06-17', 'yes', 'no', '<iframe src="https://player.vimeo.com/video/131279022" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'The Itsy Bitsy Spider went up the water spout\nDown came the rain and wash the spider out\nOut came the sun and dried up all the rain\nAnd the itsy bitsy spider went up the spout again\n', '', 'itsy-bitsy-spider', 'Itsy Bitsy Spider - Rhyming Poems for Kids in Pakistan', 'incy wincy spider, itsy bitsy spider, the fun kids, kids rhymes, nursery rhymes songs, pakistani poem, nursery poems, baby rhymes', 'Listen to the nursery poems like Itsy Bitsy Spider who tried to climb up the water spout. Download nursery rhymes videos the Pakistani fun learning site!', 'rhymes-Itsy-Bitsy-Spider.jpg', '<strong>Itsy Bitsy Spider  Nursery Rhymes Videos</strong>\r\n<br>\r\n\r\nItsy Bitsy Spider, also known as Incy Wincy Spider among many other variations to the title, is one of the most popular children rhymes in Pakistan that is accompanied by finger play. It is also accompanied by a sequence of gestures that mime the words of the song. The <strong>baby rhymes</strong> describes the attempts of a spider to climb up a water spout. In some variations the term kettle spout is alternatively used instead of water spout! The song is one of the most famous poems for kids and is sung by and for children all over the world! The endeavors of the spider to climb up the water spout again and again teach children a lesson to never stop trying hard! Go to <strong>The Fun Kids Rhymes</strong> and <strong>free download nursery rhymes poems</strong>!\r\n</br>\r\n'),
(4, 'Baa Baa Black Sheep', 'rhymes-Baa-Baa-Black-Sheep.jpg', '2015-06-17', '2015-06-17', 'yes', 'no', '<iframe src="https://player.vimeo.com/video/131277218" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Ba Ba Black Sheep \r\nHave you any wool?\r\nYes sir, yes sir, three bags full\r\nOne for the master, one for the dame\r\nAnd for the little boy that lives down the lane\r\n', '', 'baa-baa-black-sheep', 'Baa Baa Black Sheep - Famous Poems for Kids in Pakistan', 'baa baa black sheep, nursery poems, nursery rhymes videos, the fun kids, nursery rhymes songs, download nursery rhymes, baby rhymes, poems for pakistani kids', 'The rhyming poems for kids like Baa Baa Black Sheep are available at TheFunKids Rhymes. Listen and download free nursery rhymes songs in Pakistan!', 'rhymes-Baa-Baa-Black-Sheep.jpg', '<strong> Baa Baa Black Sheep Nursery Rhymes Songs for Kids</strong>\r\n<br>\r\n\r\n\r\n<strong> Baa Baa Black Sheep</strong>  is a very old, classic children rhyme which dates back to the year 1731. Since then, the poem has undergone a few changes. The lyrics of the rhyming poem consists of a request to a sheep for wool and the sheep''s answer to the request. Its simple rhymes and musical arrangement has made it one of the most easily learned poems. The poem has originated from real events in history. Many English scholars believe that the poem was written against the Medieval taxes on wool while others believe it is a hidden reference to slave trade! No matter its origin, the nursery rhyme poem Baa Baa Black Sheep is one of the most beloved <strong>rhyming poems for kids</strong>. Feel free to listen to many other nursery rhyme songs at our Pakistani educational site!\r\n'),
(5, 'One Two Buckle My Shoe', 'rhymes-One-Two-Buckle-My-Shoe.jpg', '2015-06-17', '2015-06-17', 'yes', 'no', '<iframe src="https://player.vimeo.com/video/131277219" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'One, two Buckle my shoe\r\nThree, Four Open the door\r\nFive, Six Pick up the sticks\r\nSeven, Eight now lay them straight \r\nNine, Ten Do it Again.. Do it again.. Do it again\r\nI caught a Fish:\r\nOne, Two buckle my shoe let''s do it all again\r\n1 2 3 4 5.. Once I caught a Fish alive\r\n6 7 8 9 10.. Then I let it go again \r\nWhy did you let it go?\r\nBecause it bit my finger so\r\nWhich finger did it bite?\r\nThis little finger on the right\r\n', '', 'one-two-buckle-my-shoe', 'One Two Buckle My Shoes - Rhyming Poems for Kids in Pakistan', 'one two buckle my shoe, 1 2 buckle my shoe, the fun kids, nursery rhymes songs', 'Watch and free download nursery rhymes videos of One Two Buckle My Shoe from our amazing rhyming poems for kids. Check out TheFunKids nursery rhymes songs.', 'rhymes-One-Two-Buckle-My-Shoe.jpg', '<strong>One, Two, Buckle My Shoe  Nursery Rhymes for Kids</strong>\r\n<br>\r\n<strong>One Two Buckle My Shoe</strong> is an English nursery rhyme and counting-out rhymes to teach little children how to count with ease. This rhyming poem for kids was first recorded and published in 1805 in London. There are several different versions of the poem- in one version the rhymes differ beyond the number twelve. There is some speculation that the poem referred to the art of lace-making; buckle my shoe, shut the door means preparing for work, pick up sticks, lay them sticks refer to wood sticks used on lacemaking devices that are laid across the cloth and a big fat hen might mean the fat pillow that supports the lacework!<br> Listen to many more nursery rhymes poems at TheFunKids, a Pakistani fun learning site!\r\n'),
(6, 'I Am A Little Teapot', 'rhymes-A-Little-Teapot.jpg', '2015-06-17', '2015-06-17', 'yes', 'no', '<iframe src="https://player.vimeo.com/video/131280061" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'I am a little teapot, short and stout\r\nHere is my handle \r\nHere is my spout \r\nWhen I get all steamed up \r\nHear me shout \r\nTip me over & pour me out.\r\n', 'teapot.png', 'i-am-a-little-teapot', 'I am a Little Teapot - Children Rhymes in Pakistan', 'I am a little teapot, the fun kids, nursery rhymes, baby rhymes, rhyming poems for kids', 'Watch and download I am a Little Teapot from our Pakistani fun learning site. Read and learn the lyrics of this beloved rhyming poems for kids!', 'rhymes-A-Little-Teapot.jpg', '<strong> I am a Little Teapot- Baby Rhymes for Kids</strong>\r\n<br>\r\nI am a Little Teapot also known as the Teapot Song is an American <strong>nursery rhyme song</strong> describing a teapot and the heating and pouring of it to make tea. Clarence Kelley ran a school of dance for young children which taught the ''Waltz Clog'' a tap dance routine that proved to be difficult for small kids. George Sanders wrote the Teapot Song to make it easy for young children to perform the steps of a tap dance. Ever since, this <strong>rhyming poem for kids</strong> and its accompanying dance has become immensely popular in America. There is also an extended version to the Teapot Song in which another stanza has been added. Listen to nursery rhymes poems for kids at our fun education site ! <strong>Free download nursery rhymes for kids</strong> here!\r\n'),
(7, '12345 Once I Caught A Fish Alive', 'rhymes-I-Caught-A-Fish-Alive.jpg', '2015-06-17', '2015-06-17', 'yes', 'no', '<iframe src="https://player.vimeo.com/video/131277803" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', '1 2 3 4 5.. Once I caught a Fish alive\r\n6 7 8 9 10.. Then I let it go again \r\nWhy did you let it go?\r\nBecause it bit my finger so\r\nWhich finger did it bite?\r\nThis little finger on the right\r\n', '', '12345-once-i-caught-a-fish-alive', '12345 Once I Caught a Fish Alive -  Nursery Rhymes Poems', '12345 once I caught a fish alive, one two three fore five once I caught a fish alive, the fun kids, nursery rhymes songs, rhymes in pakistan', 'Get your child to listen to 12345 Once I Caught a Fish Alive, one of the most famous poems for kids. Free Download nursery rhymes videos in Pakistan!', 'rhymes-I-Caught-A-Fish-Alive.jpg', '<strong>12345, Once I Caught a Fish Alive- Famous Poems for Kids in Pakistan</strong>\r\n<br>\r\n<strong>1, 2, 3, 4, 5, Once I Caught a Fish Alive</strong>, is an immensely popular English nursery rhymes poem and a counting-out rhyme for children. The poem was first published in 1765, in Mother Goose''s Melody. Since then the song has been sung with many variations. The current song itself has been derived from three popular versions in the 1880s by Henry Bolton. The words of this ever popular song has been designed for the purpose of teaching kids how to count and increasing their numeric skills. Although the poem was originally titled 1, 2, 3, 4, 5, now the poem is most commonly referred as ''Once I Caught a Fish Alive.'' Listen to rhyming poems for kids in Pakistan at <strong>The Fun Kids Rhymes</strong> section! Download for free and hear as many nursery poems as you want!\r\n'),
(8, 'I Am Happy', 'rhymes-I-Am-Happy.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131278215" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'I am h-a-p-p-y.. I am h-a-p-p-y\r\nI know I am, I’m sure I am\r\nI am h-a-p-p-y (x3)\r\nI am l-o-v-e-d\r\nI am l-o-v-e-d\r\nI know I am, I’m sure I am\r\nI am l-o-v-e-d (x3)\r\n', '', 'i-am-happy', 'I am Happy - The Fun Kids Nursery Rhymes Poems', 'I am happy, the fun kids, nursery rhymes songs, nursery rhymes poems, rhyming poems for kids, baby rhymes, rhymes for pakistani kids', 'I am Happy is one of the best nursery rhyme poems for kids at the fun learn site TheFunKids. Listen and free download nursery rhymes for kids in Pakistan!', 'rhymes-I-Am-Happy.jpg', '<strong>I am Happy- Nursery Poems for Kids</strong>\r\n<br>\r\nI am Happy also known as I am with H-A-P-P-Y, is a simple nursery rhyme song about the joys of being happy and being loved! This little song can help your child easily learn the spelling of some common positive emotions! ''I am Happy'' is one of the best known <strong>rhyming poems for kids</strong> about feelings and can help your children understand the good emotions in life. Play this song to your little ones, it is guaranteed to bring a smile to their faces. Go to our <strong>nursery rhymes poems</strong> section and let your child listen to nursery poems that can help increase his vocabulary and help in pronouncing many words! Feel free to browse our Pakistani fun learning website for children rhymes and songs at <strong>The Fun Kids Rhymes</strong> and let your child listen to as many poems and songs as he wants.\r\n'),
(9, 'Mary had a Little Lamb', 'rhymes-Mary-had-a-Little-Lamb.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131278461" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Mary had a little lamb, little lamb, little lamb (x2)\r\nIts fleece was white as snow\r\nAnd everywhere that Mary went.. Mary went.. Mary went (2)\r\nThe lamb was sure to go\r\nIt followed her to school one day.. School one day.. School one day (x2)\r\nThat was against the rule\r\nIt made the children laugh and play.. Laugh and play.. Laugh and play (x2)\r\nTo see a lamb at school\r\n', 'marryslider.png', 'mary-had-a-little-lamb', 'Mary Had a Little Lamb - Rhymes for Kids in Pakistan', 'mary had a little lamb, the fun kids, nursery rhymes songs, rhyming poems for kids, children rhymes, kids rhymes videos', 'Mary Had a Little Lamb is a lovable children rhymes about a little girl whose lamb followed her to school. Free download nursery rhymes at The Fun Kids now!', 'rhymes-Mary-had-a-Little-Lamb.jpg', '<strong>Mary Had a Little Lamb- Famous Poems for Kids in Pakistan</strong>\r\n<br>\r\n<strong>Mary Had a Little Lamb</strong> is an American based English language <strong>nursery rhymes poems</strong> composed in the 19th century. The poem was inspired by an actual event- Mary Sawyer once took her pet lamb to school at the suggestion of her naughty brother. The young nephew of the Reverand Lemuel Capen, John Roulstone, who was visiting school that day saw the lamb and the commotion that it caused and was very amused by the incident- he wrote the nursery poem for little Mary Sawyer the very next day! Since then, this song has become one of the most popular and beloved <strong>rhyming poems for kids</strong> and is a favorite of Pakistani kids. Listen to Mary Had a Little Lamb at <strong>The Fun Kids Rhymes</strong> section and teach your kids as many nursery rhymes poems as you can.\r\n'),
(10, 'Old Mcdonald', 'rhymes-old-macdold.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131224047" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Old mcdonald had a farm E-I-E-I-O \r\nAnd on that farm he has some cows E-I-E-I-O\r\nWith a moo moo here\r\nAnd a moo moo there\r\nHere a moo, there a moo\r\nEverywhere a moo moo\r\nOld MacDonald had a farm\r\nE-I-E-I-O\r\nOld Mcdonal had a farm E-I-E-I-O\r\nAnd on that farm he has some chickens E-I-E-I-O\r\nWith a cluck cluck here, and cluck cluck there \r\nHere cluck, there cluck, everywhere a cluck cluck\r\nMoo moo here, and moo moo there\r\nHere moo, there moo everywhere a moo moo\r\nOld mcdonald had a farm E-I-E-I-O\r\n', 'oldmacdonald.png', 'old-mcdonald', 'Old McDonald Had a Farm - Baby Rhymes for Kids in Pakistan!', 'old mcdonald, old mcdonald had a farm, baby rhymes, rhyming poems for kids, nursery rhymes poems', 'Play and listen to Old McDonald''s beloved nursery rhyme poem for kids in Pakistan about a man named McDonald who owned various animals on his farm!', 'rhymes-old-macdold.jpg', '<strong> Old McDonald Had a Farm- Nursery Rhymes for Pakistani Kids</strong>\r\n <br>\r\n<strong> Old McDonald (or MacDonald) had a Farm</strong>  is a <strong>children rhyme</strong> and nursery poem about a farmer named McDonald who owned a farm and kept many animals there. Each verse is about a particular animal he kept and the noise they make. In some singalong versions, the song is cumulative with all the noises from the previous verses, added to the later verse. A British version of this song is also quite famous. This nursery rhyme is an amazing way for your child to learn to identify what type of animals are present in the farm and what type of noises they make. <strong>The Fun Kids Rhymes</strong> offers you a colorful video of this popular nursery rhyme- so <strong>free download nursery rhyme videos for kids</strong> from this Pakistani fun learn website!\r\n'),
(11, 'Piggy On The Railway Line', 'rhymes-Piggy-On-The-Railway-Line.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131279018" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'I have been working on the railroad\r\nAll the live long day\r\nI''ve been working on the railroad\r\nJust to pass the time away\r\nCan''t you hear the whistle blowin''\r\nRise up so early in the morn\r\nCan''t you hear the captain shouting?\r\nDinah blow your horn\r\nDinah won''t you blow\r\nDinah won''t you blow\r\nDinah won''t you blow your ho-o-o-orn\r\nDinah won''t you blow\r\nDinah won''t you blow\r\nDinah won''t you blow your horn \r\n', '', 'piggy-on-the-railway-line', 'Piggy on the Railway Line - Famous Poem for Kids', 'piggy on the railway line, piggy on the railroad, the fun kids, nursery rhymes, nursery songs, rhyming poems for kids, baby rhymes', 'Watch and listen to the animated video of Piggy on the Railway Line, one of the most famous poems for kids at The Fun Kids Rhymes now!', 'rhymes-Piggy-On-The-Railway-Line.jpg', '<strong>Six Little Ducks- Nursery Rhymes Poems</strong>\r\n<br>\r\n<strong>Six Little Ducks That I Once Knew</strong> is a <strong>famous poem for kids</strong> and playground songs for children, about six ducks of various shapes and sizes who used to go swimming in a river, led by a duck with a feather on its back. This nursery poem is an amazing way to help your child learn simple adjectives in an easy way. The children rhyme of ''The Six Little Duck'' is often accompanied by gestures, finger play and clap based on the actions in the poem. Let your child listen to this fun-filled nursery rhyme, so that they can increase their vocabulary and pronunciation. <br>Enjoy many more rhyming poems for kids at <strong>The Fun Kids Rhymes</strong> section and see you child build up his vocabulary and pronunciation! \r\n'),
(12, 'Six Little Ducks', 'rhymes-Six-Little-Ducks.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131279020" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Six little ducks that I once knew\r\nFat ones, skinny ones,\r\nCute ones, too\r\nBut the one little duck\r\nWith the feather on his back\r\nHe rule the others with his quack, quack, quack \r\nQuack, quack, quack.. Quack, quack, quack\r\nDown to the river they would go.\r\nWibble wobble, wibble wobble to and fro.\r\nBut the one little duck with the feather on his back\r\nHe rule the others with his quack, quack, quack.\r\nQuack, quack, quack-quack, quack, quack\r\nSix little ducks that I once knew\r\nFat ones, skinny ones, cute ones too.\r\nBut the one little duck with the feather on his back\r\nHe rule the others with his quack, quack, quack.\r\nQuack, quack, quack-quack, quack, quack\r\nDown to the river they would go.\r\nWibble wobble, wibble wobble to and fro.\r\nBut the one little duck with the feather on his back\r\nHe rule the others with his quack, quack, quack.\r\nQuack, quack, quack-quack, quack, quack.\r\n', 'sixlilducks.png', 'six-little-ducks', 'Six Little Ducks - The Fun Kids Nursery Rhymes Songs', 'six little ducks, pakistani rhymes, the fun kids, nursery rhymes, nursery songs, rhyming poems for kids, children poems, nursery rhyme songs', 'A sing-along song of the Six Little Ducks, one of the best loved nursery rhymes poems of all times, presented by our Pakistani kids learning site!', 'rhymes-Six-Little-Ducks.jpg', '<strong>Six Little Ducks- Nursery Rhymes Poems</strong>\r\n<br>\r\n<strong>Six Little Ducks That I Once Knew</strong> is a popular children rhymes song and playground poem, about six ducks of various shapes and sizes who used to go swimming in a river, led by a duck with a feather on its back. This nursery poem is an amazing way to help your child learn simple adjectives in an easy way. The children rhyme of ''The Six Little Duck'' is often accompanied by gestures, finger play and clap based on the actions in the poem. Let your child listen to this fun-filled nursery rhyme, so that they can increase their vocabulary and pronunciation. <br>Enjoy many more kids nursery rhymes and poems at this no.1 <strong>Pakistani fun learn website</strong> and see your child build up his vocabulary and pronunciation! \r\n'),
(13, 'Row Row Row Your Boat', 'rhymes-Row-Your-Boat.jpg', '2015-06-17', '2015-06-18', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131279019" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Row, row, row your boat,\r\nGently down the stream.\r\nMerrily, merrily, merrily, merrily,\r\nLife is but a dream.\r\nHoe hoe hoe your row\r\nThrough the summer heat,\r\nMerrily digging but cheerily singing\r\nRaising beets we''ll eat\r\nSave, save save the wheat,\r\nBeets and sugar too,\r\nCorn and potatoes and rice and tomatoes\r\nAre mighty good for you.\r\n', '', 'row-row-row-your-boat', 'Row Row Row Your Boat - Famous Poems for Kids', 'row row row your boat, the fun kids, nursery rhymes songs, pakistani rhymes, poems for pakistani kids', 'Listen and play Row Row Row Your Boat, a beloved children rhyme played as a round and accompanied by rowing gestures!', 'rhymes-Row-Your-Boat.jpg', '<strong>Row Row Row Your Boat- Nursery Rhymes Poems</strong>\r\n<br>\r\nRow, Row, Row Your Boat is a popular <strong>nursery rhyme song</strong> in Pakistan and is often sung in a round with the rhyme being repeated again and again. There has been some speculation that the song may have risen from American minstrelsy or minstrel shows. The song that is sung now first originated in 1852 but with a different tune. The modern version was recorded in 1881 by Eliphalet Oram Lyte and has become one of the most popular songs in children''s literature. The poem is considered to be an action nursery rhyme-  children sit opposite to each other and row forwards and backwards with joined hands! Let your child listen to ''Row Row Row Your Boat'' at <strong>The Fun Kids <strong>Rhyming Poems for Kids</strong>\r\n'),
(14, 'Mr Sun', 'rhymes-Mr-sun.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131279017" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Mr. Sun, Sun.. Mr. Golden Sun\r\nPlease shine down on me\r\nOh Mr. Sun, Sun.. Mr. Golden Sun\r\nHiding behind a tree\r\nThese little children are asking you\r\nTo please come out so we can play with you\r\nOh Mr. Sun, Sun Mr. Golden Sun\r\nPlease shine down on me\r\n', '', 'mr-sun-the-fun-kids-rhymes-poem', 'Mr Sun - The Fun Kids Children Rhymes', 'mr sun, mister sun, the fun kids, nursery rhymes songs, children rhymes, baby rhymes, rhyming poems for kids', 'Mr Sun is an old children''s classic rhyming song available at The Fun Kids. Get nursery rhymes videos free download at our fun learning site.', 'rhymes-Mr-sun.jpg', '<strong> Mr Sun- Nursery Rhymes Poems</strong>\r\n<br>\r\nMr Sun is a famous <strong>nursery rhyme song</strong>- the poem involves a child''s wish for the rain to stop and the sun to come out, so that children can go out and play! The poem ''Mr Sun'' is considered to be a metaphor about the author''s parents who left their son quite early in his life. Although he wishes that the sun (his parents) would come back and shine on him, he also knows that he now has to bear his own responsibilities and of the others around him. The poem ''Mr Sun'' is now considered to be a playful playground song for children all over the world. Go to <strong>The Fun Kids Rhyming Poems for Kids</strong> is where your child can listen to the children rhymes ''Oh Mr. Sun'' and many other nursery rhyme poems for Pakistani kids!\r\n'),
(15, 'Wheels on the Bus', 'rhymes-Wheels-on-the-Bus.jpg', '2015-06-17', '2015-06-17', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/131277623" width="100%" height="541"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'The wheels on the bus go round and round. Round and round. Round and round The wheels on the bus go round and round. All through the town The horn on the bus goes beep, beep, beep Beep, beep, beep Beep, beep, beep. The horn on the bus goes beep, beep, beep All through the town', '', 'wheels-on-the-bus', 'Wheels on the Bus - The Fun Kids Nursery Rhymes Poems', 'wheels on the bus, the fun kids, nursery rhymes song, baby rhymes, children poem, nursery rhymes poems, poems fro Pakistani kids', 'Listen to the Wheels on the Bus and other nursery rhymes videos at the fun learning website for kids in Pakistan- TheFunKids.', 'rhymes-Wheels-on-the-Bus.jpg', '<strong>Wheels on the Bus- Famous Poems for Pakistani Kids</strong>\r\nThe Wheels on the Bus is a folk song that was published around 1939 in United States and is often sung by little children on bus trips to find some entertainment. It has repetitive rhyming stanzas so a large number of children can easily keep up with the song. The nursery rhyme song ''Wheels on the Bus'' is based on another traditional British song ''Here we go around the Mulberry Bush''. The nursery rhyme poem describes the many objects or people on a bus and the noises and movement that they make! This nursery rhyme song makes it easier for kids to learn the actions and noise of objects on the bus and is a fun way to spend time on a bus trip! Feel free to browse through <strong>The Fun Kids Nursery Rhymes</strong> section and listen to ''Wheels on the Bus'' and many other rhyming poems for Pakistani kids!');

-- --------------------------------------------------------

--
-- Table structure for table `rhymesadds`
--

DROP TABLE IF EXISTS `rhymesadds`;
CREATE TABLE IF NOT EXISTS `rhymesadds` (
  `rhyme_add_id` int(11) NOT NULL AUTO_INCREMENT,
  `rhyme_add_name` varchar(100) NOT NULL,
  `rhyme_add_image` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`rhyme_add_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rhymesadds`
--

INSERT INTO `rhymesadds` (`rhyme_add_id`, `rhyme_add_name`, `rhyme_add_image`, `createdAt`, `updatedAt`, `isActive`) VALUES
(1, 'add1', 'tsts.png', '2015-06-17', '2015-06-17', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `rhymes_comment`
--

DROP TABLE IF EXISTS `rhymes_comment`;
CREATE TABLE IF NOT EXISTS `rhymes_comment` (
  `rhyme_comment_id` int(22) NOT NULL AUTO_INCREMENT,
  `rhyme_id` int(22) NOT NULL,
  `comments` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `user_id` int(22) NOT NULL,
  PRIMARY KEY (`rhyme_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rhymes_comment`
--

INSERT INTO `rhymes_comment` (`rhyme_comment_id`, `rhyme_id`, `comments`, `createdAt`, `updatedAt`, `isActive`, `user_id`) VALUES
(1, 12, 'dsdsdd', '2015-08-11', '2015-08-11', 'yes', 145);

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
CREATE TABLE IF NOT EXISTS `stories` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `story_name` varchar(100) NOT NULL,
  `story_image` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `isFeatured` varchar(3) NOT NULL DEFAULT 'no',
  `story_code` text NOT NULL,
  `story_decription` text NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `seo_story` varchar(100) NOT NULL,
  `story_title` varchar(100) NOT NULL,
  `meta_tag_keyword` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `story_home_image` varchar(100) NOT NULL,
  PRIMARY KEY (`story_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`story_id`, `story_name`, `story_image`, `createdAt`, `updatedAt`, `isActive`, `isFeatured`, `story_code`, `story_decription`, `slider_image`, `seo_story`, `story_title`, `meta_tag_keyword`, `meta_tag_description`, `story_home_image`) VALUES
(1, 'Lion and Mouse', 'stories-lion-and-the-mouse.jpg', '2015-06-30', '2015-06-30', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/132179322" width="100%" height="540"   frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Once, when a Lion was asleep. A little Mouse began, running up and down upon him. This soon wakened the Lion, who placed his huge paw, upon him! and opened his big jaws, to swallow him.\r\n\r\n"Pardon, O King!" cried the little Mouse, "Forgive me this time. I shall never repeat it, and I shall never forget your kindness. And who knows, but I may be able to do you a good turn, one of these days?"\r\n\r\nThe Lion was so tickled, at the idea of the Mouse, being able to help him, that he lifted up his paw, and let him go.\r\n\r\nSometime later, a few hunters captured the King, and tied him to a tree, while they went in search of a wagon to carry him on.\r\n\r\nJust then the little Mouse, happened to pass by, and seeing the sad plight in which the Lion was, ran up to him and soon gnawed away the ropes, that bound the King of the Beasts. "Was I not right?" said the little Mouse, very happy to help the Lion. \r\n', 'story-lion-and-mouse.png', 'lion-and-mouse', 'The Lion and the Mouse - Short Moral Stories for Kids', 'lion and mouse, the lion and the mouse, the fun kids, short stories, moral stories for kids, bedtime stories, kids moral stories', 'The Lion and the Mouse is one of the most popular moral stories for kids about the rewards of helping others. Listen to Pakistani bedtime stories!', 'stories-lion-and-the-mouse.jpg'),
(2, 'The Duck Laid Golden Egg Story', 'stories-The-Duck-Laid-Golden-Egg.jpg', '2015-06-30', '2015-06-30', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/132179321" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ', 'Once upon a time, a man and his wife had the good fortune, to have a duck, which laid a golden egg every day. Lucky though they were, they soon began to think, they were not getting rich fast enough.\r\n\r\nThey thought, that if the bird, must be able to lay golden eggs, its insides, must be made of gold. And they thought that, if they could get all that precious metal at once, they would get mighty rich very soon. So the man and his wife, decided to kill the bird.\r\nHowever, upon cutting the duck open, they were shocked to find, that its innards were like that of any other duck! \r\n', 'story-the-golden-duck.png', 'the-duck-laid-golden-egg-story', 'The Duck That Laid the Golden Egg - Kids Moral Stories', 'the duck that laid the golden egg, short stories, moral stories, moral stories for kids, bedtime stories, pakistani kids moral stories', 'The Duck that Laid the Golden Egg is one of the most famous Pakistani kids moral stories. Listen to short bedtime stories at The Fun Kids.', ''),
(3, 'Thirsty Crow', 'stories-The-Thirsty-Crow.jpg', '2015-06-30', '2015-06-30', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/132419361" width="100%" height="540"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'One hot day, a thirsty crow flew all over the fields looking for water. For a long time, he could not find any. He felt very weak, almost lost all hope. Suddenly, he saw a water jug below the tree. He flew straight down to see if there was any water inside. Yes, he could see some water inside the jug!\nThe crow tried to push his head into the jug. Sadly, he found that the neck of the jug was too narrow. Then he tried to push the jug to tilt for the water to flow out but the jug was too heavy.\nThe crow thought hard for a while. Then looking around it, he saw some pebbles. he suddenly had a good idea. he started picking up the pebbles one by one, dropping each into the jug. As more and more pebbles filled the jug, the water level kept rising. Soon it was high enough for the crow to drink. His plan had worked!\nMoral: Think and work hard, you may find solution to any problem.\n', 'story-the-thirsty-crow.png', 'thirsty-crow', 'Thirsty Crow - Moral Stories for Kids', 'the thirsty crow, the fun kids, pakistani stories, short stories, kids moral stories, moral stories for kids, bedtime stories', 'The Thirsty Crow is one of the best bedtime stories for kids in Pakistan about the cleverness of a crow . Listen to moral stories for kids here!', ''),
(4, 'The Tortoise and Rabbit', 'stories-turtoise-and-the-rabbit.jpg', '2015-06-30', '2015-07-22', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/132182476" width="100%" height="540"   frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'Once upon a time, there was a speedy rabbit, who bragged about, how fast he could run. Tired, of hearing him boast, One day a Tortoise, challenged him to a race., All the animals, in the forest, gathered to watch. \r\nThe race begun, and the rabbit, being such a swift runner, soon left the tortoise, far behind. \r\n\r\nThe rabbit ran, down the road for a while, and then he paused to rest. He looked back, at the tortoise, and cried out, "How do you expect, to win this race, when you are walking, along at your slow, slow pace?"\r\nThe tortoise, ignored him, and continues to run.\r\n\r\nThe rabbit, in his over confidence, thought that the tortoise, can never win, so he fell asleep, under a tree to rest, thinking, "There is plenty of time to relax."\r\n\r\nThe Tortoise, walked and walked; never ever stopping, until he came, to the finish line.\r\n\r\nThe animals who were watching, cheered so loudly, for Tortoise, that they woke up rabbit. The rabbit, finally woke, from his nap. "Time to get, going," he thought. And off he went, faster, than he had ever, run before! He dashed, as quickly as anyone ever could, up to the finish line where he met the tortoise who was awaiting his arrival.\r\n\r\nMORAL: SLOW AND STEADY, WINS THE RACE\r\n', 'story-tortoise-and-rabbit.png', 'the-tortoise-and-rabbit', 'The Tortoise and the Rabbit - The Fun Kids Short Stories', 'the tortoise and the rabbit, pakistani stories, moral stories for kids, english short stories, kids moral stories, bedtime stories', 'The Tortoise and the Rabbit and other kids moral stories for Pakistani kids are available at the online audio bedtime stories section at TheFunKids!', 'stories-turtoise-and-the-rabbit.jpg'),
(5, 'The Greedy Mouse', 'stories-The-Greedy-Mouse.jpg', '2015-07-02', '2015-07-02', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/132419360" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ', 'A greedy mouse saw a basket full of corn. He wanted to eat it. So he made a small hole in the basket. He squeezed in through the hole. He ate a lot of corn. He felt full. He was very happy.\r\nNow he wanted to come out. He tried to come out through the small hole. He could not. His belly was full. He tried again. But it was of no use.\r\nThe mouse started crying. A rabbit was passing by. It heard the mouse’s cry and asked: “Why are you crying my friend?”\r\nThe mouse explained: “I made a small hole and came into the basket. Now I am not able to get out through that hole.”\r\nThe rabbit said: “It is because you ate too much. Wait til your belly shrinks”. The rabbit laughed and went away.\r\n\r\nThe mouse fell asleep in the basket. Next morning his belly had shrunk. But the mouse wanted to eat some corn. So he ate and ate. His belly was full once again. He thought: “Oh! Now I will go out tomorrow”.\r\nThe cat was the next passerby. He smelt the mouse in the basket. He jumped in and ate the mouse.\r\n', 'story-the-greedy-mouse.png', 'the-greedy-mouse', 'The Greedy Mouse - The Fun Kids Moral Stories', 'the greedy mouse, pakistani stories, pakistani moral stories, short stories, moral stories for kids, kids moral stories', 'The Greedy Mouse is one of the best short moral stories for kids in Pakistan about the punishment for greed. Read and listen to more bedtime stories here!', ''),
(7, 'The Fox and The Stork ', 'stories-The-Fox-and-the-storck.jpg', '2015-07-16', '2015-07-16', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/133627229" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ', 'Once upon a time there lived a fox she was cunning as well as mischievous. One day he met a stork and\r\n \r\ninvited him to dine at his house â€œdear friend why donâ€™t you come to my house for some delicious beef\r\n \r\nsoup. â€œI would be happy toâ€ said the stork. The fox delivered on his promise of delicious soup. But as sly\r\n \r\nas he was, the fox served the soup in a large flat dish. While he himself could lap up a soup in a jiffy. The\r\n \r\nsad stork could only dip in the tip serve his long bill in the flat platter. â€œI made the soup myself. Is not it\r\n \r\ndelicious? Please enjoyâ€ said the fox. Stork remained silent and pretended to enjoy his meal. At the end\r\n \r\nof the evening however the stork left foxâ€™s house hungry and humiliated. The stork invited the fox to\r\n \r\ndinner later that week. â€œDear fox, please come to my house for dinner, I am cooking meat tonightâ€ said\r\n \r\nthe stork. â€œThank you, dear stork. I had be delighted to comeâ€ said the fox. The stork cooked meat and\r\n \r\nserved it in a long, narrow, necked jar. While the stork could easily munch his way on the meat. The\r\n \r\ncunning fox was forced to be content licking the remains of what left down the sides of the jar. â€œDid you\r\n \r\nenjoy the dinner that I made especially for you my dear friend?â€ asked the stork. The fox remembered\r\n \r\nhis mean trick on the stork and had to admit that the clever stork had outwitted him on this occasion.\r\n \r\nMoral:- We should do to others as we would like them to do to us.\r\n', 'story-the-fox-and-the-stork.png', 'the-fox-and-the-stork', 'The Fox and the Stork - The Fun Kids Bedtime Stories', 'the fox and the stork, the fun kids, short stories, moral stories for kids, Pakistani stories for kids, bedtime stories', 'Let your child read through The fox and the Stork and many popular Pakistani moral stories for kids at The Fun Kids Stories today!', 'stories-The-Fox-and-the-storck.jpg'),
(8, 'The Wind and The Sun', 'stories-The-Wind-and-The-Sun.jpg', '2015-07-16', '2015-07-16', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/133627385" width="100%" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> ', 'A long time ago, the Sun and the North Wind\r\n \r\nwould argue over who was the greatest power\r\n \r\nin the universe. The\r\n \r\nSun would say: "I am the most powerful because\r\n \r\nI can warm the whole world!" But the North\r\n \r\nwind argued, "I am the most powerful because\r\n \r\nI can blow mighty ships at sea!"\r\n \r\n"I say we settle this once and for all," said\r\n \r\nthe Sun.\r\n \r\nAnd so the Sun shined with all its might and\r\n \r\nthe North Wind blew as hard as it could but\r\n \r\nneither could tell who was stronger because\r\n \r\nit was too bright and windy for either one\r\n \r\nto see.\r\n \r\nTogether they agreed they would have to settle\r\n \r\nit with a test.\r\n \r\nQuickly they looked around for something to\r\n \r\ntest their strength on. Below them was a man\r\n \r\ntraveling along the road through the mountains.\r\n \r\nHe was wearing a heavy jacket, which he''d buttoned\r\n \r\nup tightly.\r\n \r\nThe Sun and the North Wind decided the winner\r\n \r\nwould be the first one who could get the traveling\r\n \r\nman to take his jacket off.\r\n \r\nThe North Wind tried his power first, blowing\r\n \r\nwith all his might down the road. But the\r\n \r\nstronger he blew his cold and bellowing winds,\r\n \r\nthe tighter the shivering man held his jacket\r\n \r\naround his body.\r\n \r\nAt last, exhausted, the North Wind gave up.\r\n \r\n"Ok, I may have not been able to make him\r\n \r\ntake off that jacket," said the North Wind,\r\n \r\n"but what makes you think you can do any better?\r\n \r\nIf I couldn''t do it, no one can!"\r\n \r\n"We''ll see about that!" said the Sun. The\r\n \r\nSun beamed a friendly smile down at the traveling\r\n \r\nman, shining on him with his light and warmth.\r\n \r\nThe traveling man immediately took off his\r\n \r\njacket and basked in the warm sunlight. The\r\n \r\ntraveler looked up at the sun and smiled at\r\n \r\nthe beautiful weather the sun had provided.\r\n \r\nAnd so the Sun taught the North Wind an important\r\n \r\nlesson: "Always be kind and warm to others."\r\n', 'story-the-wind-and-the-sun.png', 'the-wind-and-the-sun', 'The Wind and the Sun - The Fun Kids Bedtime Stories', 'the wind and the sun, the fun kids, english stories for kids, moral stories, short stories, bedtime stories, moral stories for kids', 'Browse through our Pakistani fun learn site section and read the Wind and the Sun and many other kids moral stories and bedtime stories.', ''),
(9, 'The Foolish dog', 'stories-The-foolish-dog.jpg', '2015-07-30', '2015-07-30', 'yes', 'yes', '<iframe src="https://player.vimeo.com/video/133627228" width="500" height="540" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', 'A dog was very hungry. He walked here and there looking for food, at last he got a piece of bone, He kept the bone in his mouth, he looked for a safe place to eat the bone. On the way he had to cross a bridge. \r\nAs he was crossing the bridge. He looked in to the water and saw another dog holding a bone in his mouth. He wanted the other bone also so he barked at the dog. Bhao bhao bhao bhao. As he opened his mouth to bark the bone fell into the water. He lost the bone. It was not another dog in the water. It was his own reflection. The Foolish dog had learned his lesson.\r\nMoral: It is very foolish to be greedy.\r\n', 'the-foolish-dog.png', 'the-Foolish-dog', 'The Foolish Dog - The Fun Kids Moral Stories', 'the foolish dog, pakistani stories, bedtime stories, short stories for kids, moral stories for kids, english short stories, kids moral stories', 'Read and listen to The Foolish Dog, one of the most famous kids moral stories in Pakistan available at The Fun Kids Short Bedtime Stories! ', 'stories-The-foolish-dog.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stories_comment`
--

DROP TABLE IF EXISTS `stories_comment`;
CREATE TABLE IF NOT EXISTS `stories_comment` (
  `story_comment_id` int(22) NOT NULL AUTO_INCREMENT,
  `story_id` int(22) NOT NULL,
  `comments` text NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `user_id` int(22) NOT NULL,
  PRIMARY KEY (`story_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stories_comment`
--

INSERT INTO `stories_comment` (`story_comment_id`, `story_id`, `comments`, `createdAt`, `updatedAt`, `isActive`, `user_id`) VALUES
(1, 1, 'how to save this video?', '2015-10-04', '2015-10-04', 'no', 323);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `user_id` int(22) NOT NULL,
  `topic_id` int(22) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'no',
  `topic_description` text NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`user_id`, `topic_id`, `topic_name`, `createdAt`, `updatedAt`, `isActive`, `topic_description`) VALUES
(0, 1, 'Alphabet Fun', '2015-06-19', '2015-06-19', 'yes', 'The quice brown fox jumps over the lazy dog ... The quice brown fox jumps over the lazy dog ... The quice brown fox jumps over the lazy dog ... The quice brown fox jumps over the lazy dog'),
(1, 2, 'Fun Kids game', '0000-00-00', '0000-00-00', 'yes', 'What is your idea about fun kid games');

-- --------------------------------------------------------

--
-- Table structure for table `topmenu`
--

DROP TABLE IF EXISTS `topmenu`;
CREATE TABLE IF NOT EXISTS `topmenu` (
  `menuid` int(22) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(100) NOT NULL,
  `menulink` varchar(100) NOT NULL,
  `isActive` varchar(3) NOT NULL,
  `menuimage` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `updateAt` date NOT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `topmenu`
--

INSERT INTO `topmenu` (`menuid`, `menuname`, `menulink`, `isActive`, `menuimage`, `createdAt`, `updateAt`) VALUES
(1, 'kids-rhymes', 'kids-rhymes.php', 'yes', 'kids-rhymes.png', '2015-06-15', '2015-06-15'),
(2, 'Kids-games', 'kids-games.php', 'yes', 'kids-games.png', '2015-06-15', '2015-06-15'),
(3, 'stories-for-children', 'stories-for-children.php', 'yes', 'stories-for-children.png', '2015-06-15', '2015-06-15'),
(4, 'Puzzles-games', 'puzzles-games.php', 'yes', 'puzzles-games.png', '2015-06-15', '2015-06-15'),
(5, 'MOM-Forum', 'mom-forum.php', 'yes', 'mom-forum.png', '2015-06-15', '2015-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(22) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(22) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `totalkids` int(11) NOT NULL,
  `kidsage` int(11) NOT NULL,
  `user_interest` text NOT NULL,
  `fav_past_time` text NOT NULL,
  `country_id` int(22) NOT NULL,
  `state_id` int(22) NOT NULL,
  `city_id` int(22) NOT NULL,
  `address` text NOT NULL,
  `userimages` varchar(100) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `isActive` varchar(3) NOT NULL,
  `isApproved` varchar(3) NOT NULL,
  `activation` varchar(300) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `verificationcode` varchar(100) NOT NULL,
  `Fuid` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `resitration_type` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `activation` (`activation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=327 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `mobile_number`, `password`, `totalkids`, `kidsage`, `user_interest`, `fav_past_time`, `country_id`, `state_id`, `city_id`, `address`, `userimages`, `gender`, `createdAt`, `updatedAt`, `isActive`, `isApproved`, `activation`, `birth_date`, `verificationcode`, `Fuid`, `user_name`, `resitration_type`) VALUES
(1, 'Azeem Akram', 'azeem.akram78@gmail.com', '03332828275', 'e10adc3949ba59abbe56e057f20f883e', 3, 72, '', '', 0, 0, 0, 'Karachi', 'azeem.jpg', 'male', '2015-06-17', '2015-07-27', 'yes', '', NULL, '0000-00-00', 'dfgh3456bcdfwxyzjkmn890a23454567', 0, 'azeembscs16', ''),
(6, 'Raheel Aslam', 'raheelaslam1234@gmail.com', '+923458505713', 'cc584d2d5a3909ae602c3811b7c20cbd', 2, 89, '', '', 0, 0, 0, 'Karachi', 'photo.jpg', 'male', '2015-06-23', '2015-07-13', 'yes', '', 'abb9319ca3c640e38e09fc87cd0a6a44', '0000-00-00', '03ac87a3534a9c0b27e33cbe2f1fcaff', 0, '', ''),
(19, 'Raheel Aslam', 'raheelaslam357@hotmail.com', '03458505713', 'cc584d2d5a3909ae602c3811b7c20cbd', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-06-25', '2015-07-06', 'yes', '', 'd30815fa5eb4df9bbdfba72e61f8ba6a', '0000-00-00', 'abb9319ca3c640e38e09fc87cd0a6a44', 0, '', ''),
(22, 'Raheel Asam', 'devilzdaddy_raheel@hotmail.com', '+923458505713', 'cc584d2d5a3909ae602c3811b7c20cbd', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-06-25', '2015-06-25', 'yes', '', '138a411db22f0475f2ccce3f3dfb97ac', '0000-00-00', '0abctvwxdfghkmnp7890bcdf2345890a', 0, '', ''),
(23, 'Wajid Ali Khan', 'waji28@gmail.com', '+923212345886', 'e4f86df3df144fc3e379dbe6122e44c2', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-06-27', '2015-07-06', 'yes', '', '7d6fff325e0e2009c99947636e1ca701', '0000-00-00', '1234hjkmdfghcdfgzqrstghjkghjk', 0, '', ''),
(24, 'Tooba Arshad', 'toobaarshan456@outlook.com', '', '3096ac7bed1f38d24dfd5643010a66b2', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-06-28', '2015-07-06', 'yes', '', '1eb1674bdca7417f4a93c0babf3de9fe', '0000-00-00', 'yz345645673456fghjqrst3456dfgh', 0, '', ''),
(25, 'Zehra Kareem	', 'zehra.kareem@yahoo.com', '', '7b5e895f8b335d516192025a7462c7a1', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-06-28', '2015-07-06', 'yes', '', '5964bc7b4eb7ff23d4a1546192c1e9b1', '0000-00-00', 'zabcd0abcbcdfmnpqvwxy6789yz', 0, '', ''),
(26, 'Noor Ahmed', 'noor.ahmed7610@yahoo.com', '', '117704b051d655d351ca37705e46c8a0', 0, 27, '', '', 0, 0, 0, 'Islamabad', '', 'female', '2015-06-28', '2015-07-14', 'yes', '', '8e1c1b19e7c081851c496f9eda80c94a', '0000-00-00', 'vwxycdfgbcdf0abc3456xyzdfghmnpq', 0, '', ''),
(27, 'Amna Ismail', 'amna.ismail62@yahoo.com', '', 'ca16f2118e1e67880b60c972e6ce07b4', 0, 23, '', '', 0, 0, 0, 'Lahore', '', 'female', '2015-06-29', '2015-07-14', 'yes', '', 'fd60a59847de6a439a55bbd1fd117fbf', '0000-00-00', '1234ghjkstvwnpqrcdfgvwxyxyzstvw', 0, '', ''),
(28, 'Amna Ismail', 'amna.ismail62@yahoo.com', '', 'b2fdf341cdecaca14a2a01078b67d4d7', 0, 30, '', '', 0, 0, 0, '', 'baby.jpg', 'female', '2015-06-29', '2015-07-06', 'yes', '', 'd90a183148a6ff12c41aeeda00eb198a', '0000-00-00', 'vwxydfghmnpqrstvmnpq6789tvwx4567', 0, '', ''),
(29, 'Aisha Khan', 'aishakhaan82@yahoo.com', '', 'b2fdf341cdecaca14a2a01078b67d4d7', 0, 46, '', '', 0, 0, 0, 'Hyderabad', '', 'female', '2015-06-29', '2015-07-13', 'yes', '', 'd662f7bc88b3171e29dbaf5e99dcd27e', '0000-00-00', '56781234vwxy5678tvwxxyzvwxypqrs', 0, '', ''),
(30, 'Tooba Arshad', 'toobaarshad456@outlook.com', '', '3096ac7bed1f38d24dfd5643010a66b2', 0, 89, '', '', 0, 0, 0, 'Abbotabad', '', 'female', '2015-06-29', '2015-07-13', 'yes', '', '81cdff2c0c9118b0873c155ca66161ca', '0000-00-00', 'xyzvwxy90abwxyzpqrsjkmndfghkmnp', 0, '', ''),
(31, 'Mashal Mabood', 'mashalmabood@gmail.com', '03219260777', 'aed084e6936cff8642d57df1765daa8c', 1, 26, '', '', 0, 0, 0, 'Karachi', 'IMG_6318.JPG', 'female', '2015-07-01', '2015-08-12', 'yes', '', '4acedcbb17ee5ae7958e488fcc9731a8', '1988-12-25', 'ghjkwxyz0abcvwxypqrsyztvwxxyz', 0, 'MashalMabood', ''),
(32, 'nida zeeshan', 'nida_zeeshan87@yahoo.com', '03216641519', '04f59917982230554365d62af851c0aa', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-01', '2015-07-06', 'yes', '', '689de4d41942b34358512d9346baac3b', '0000-00-00', 'stvwkmnp2345qrst7890npqrzpqrs', 0, '', ''),
(33, 'Maya Khan', 'mahi-sid@hotmail.com', '03472990975', '24460cae155c8c99bc11db76353ab146', 0, 25, '', '', 0, 0, 0, '', '', 'male', '2015-07-02', '2015-07-06', 'yes', '', '1acc2f36f203dd7081d5c183bdb8021e', '0000-00-00', 'yzmnpqxyz678990abbcdf5678pqrs', 0, '', ''),
(35, 'zoya', 'nkanwal11@gmail.com', '', 'b2f55c2eef8c0ef52723dacbc97cf14a', 0, 24, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-07-02', '2015-07-14', 'yes', '', '619b93d44134d2d36866989f4f5de192', '0000-00-00', '7890npqrcdfgqrstvwxyfghj6789stvw', 0, '', ''),
(36, 'Sameel', 'sameelirfan@domain.com', '03343162603  ', '06ebb783b2a11aa2a2896396badda15c', 0, 4, '', '', 0, 0, 0, 'Karachi', '', 'male', '2015-07-02', '2015-07-06', 'yes', '', '57d7fcac1ca6bf71e2158a5b5a4c5e72', '0000-00-00', 'vwxyjkmn6789stvwmnpqdfghbcdfnpqr', 0, '', ''),
(37, 'Mariam Adeel', 'Mariamadeel1987@gmail.com', '', 'd0fade4a299e618e0d9b60bba7be41fa', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-02', '2015-07-06', 'yes', '', 'e9e852e443ffe3a460d1f44765fe1ea3', '0000-00-00', '90ababcdzdfgh6789npqrcdfgbcdf', 0, '', ''),
(38, 'Mariam Adeel', 'mariamadeel@live.com', '', 'd0fade4a299e618e0d9b60bba7be41fa', 0, 43, '', '', 0, 0, 0, '', '', 'female', '2015-07-02', '2015-07-06', 'yes', '', '5fc54eaac2ee596744e71d003858d5bc', '0000-00-00', 'hjkm5678mnpq0abc3456kmnpstvwwxyz', 0, '', ''),
(39, 'saba', 'saba_shaheen20@hotmail.com', '03018499634', '53e217b9ca52de97e9eda25fc1db9191', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', '10ac1b0f9fef815371812f8633bfd153', '0000-00-00', 'tvwxcdfgmnpqrstvxyzhjkm1234kmnp', 0, '', ''),
(40, 'Azeem', 'aas_azeem@hotmail.com', '03332828275', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-03', '2015-07-06', 'yes', '', '1eb05034f98e0c76ec5d2b2418647467', '0000-00-00', 'zcdfgzxyz1234rstvqrst0abc', 0, '', ''),
(41, 'Amna Zaidi', 'zaidiamna87@gmail.com', '03324848438', '889342ded169dfe8eea31a0eb7169566', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', 'bdf0b3a955b076a29e0d2c87038ea17c', '0000-00-00', 'ghjknpqryzcdfgfghjzwxyzkmnp', 0, '', ''),
(42, 'qudsia fatima', 'qudsia_sweet@hotmail.com', '03362573934', '8bd16548af35b6aa9aa8d72850c0caff', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', '640ba5bb892e5e4deeeb48d9e4188709', '0000-00-00', 'wxyztvwxghjknpqrhjkm1234dfghyz', 0, '', ''),
(43, 'Saba Rao', 'srizvi2918@gmail.com', '', 'ad45921e3946cdfeffc516884eb4fb3b', 0, 29, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', '82b525d2f9d0c9f4dbad6a6defd845cf', '0000-00-00', 'ghjkmnpqstvwmnpq3456abcdcdfgghjk', 0, '', ''),
(44, 'sartaj ahmad', 'hasnainraza_1980@hotmail.com', '03002892114', '332d343826e71c8059dba63ed50baea4', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-03', '2015-07-06', 'yes', '', '8dc13542e449b64c0385a998565adde5', '0000-00-00', '2345stvwnpqrmnpqnpqrrstvwxyz6789', 0, '', ''),
(45, 'dua', 'dua_tweety123@yahoo.com', '03454061704', 'ffaa9fb8677be70c564f8b1b330a0537', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', '6a4970e6df1c9677f84e40ddcc18ce3e', '0000-00-00', 'yz0abc3456xyzbcdfcdfg890a0abc', 0, '', ''),
(46, 'uroojnauman', 'uroojnauman147@yahoo.com', '03432009144', 'be629824bef058510aa5f6cae0cb8408', 0, 22, '', '', 0, 0, 0, 'Sukkur', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', '90348fe707120930f03b02a10a322519', '0000-00-00', 'pqrsvwxybcdf7890xyzbcdfkmnpabcd', 0, '', ''),
(47, 'Mrs. Jawed', 'sagaciousm@ymail.com', '03123015654', '93f6fc5a0f788713f1930505fd7c4bc5', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', '3df129d52174225e434c142e3268b772', '0000-00-00', 'hjkm2345kmnpvwxyqrstwxyz3456vwxy', 0, '', ''),
(48, 'Ghazal ', 'ghazal.shaiz@gmsil.com', '03352412986', 'c5978ce8a4d96fcec36ab9875d49d510', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', '479851a3efcd97e4cb27f22b04e785f5', '0000-00-00', '890avwxy90abtvwx1234vwxyfghjnpqr', 0, '', ''),
(49, 'anfal', 'kanwalimran-shaikh@hotmail.com', '+923052263284', '795bba30837cc631f8f6eb94d08417b4', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-03', '2015-07-06', 'yes', '', 'd8b29da240e314c5ed8812ef992adde5', '0000-00-00', 'stvwabcdfghjfghjrstvtvwxnpqr3456', 0, '', ''),
(50, 'sumbul', 'subishahid@yahoo. com', '03152219771', 'f6ae6412f2a06c4cc052c86ca93ccb08', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-03', '2015-07-06', 'yes', '', 'fb3f20c866514c9d2d48ce2a738113bb', '0000-00-00', 'abcdhjkmmnpqcdfghjkmnpqrvwxy5678', 0, '', ''),
(51, 'sana', 'zehra.sana0@gmail.com', '03323651744', 'ed45f9f5ef071ec0ea0cf061437879be', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '0a5eafd72bd75ffdb8966783f97a00cd', '0000-00-00', 'dfghxyz3456mnpq6789pqrsrstvnpqr', 0, '', ''),
(52, 'roosha siraj', 'roosha.saleem110@yahoo.com', '', 'fd074f26aae826d71fb93e06cd298da3', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '272dd16433c36e2b4b01dd58372032d1', '0000-00-00', 'hjkmkmnp3456dfghfghjwxyz5678dfgh', 0, '', ''),
(53, 'irum_gill@gmail.com', 'irum_gill@gmail.com', '03017027605', 'bd9ecdebeba54c63ccfce536a54ada1e', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '3602d2a2be38f2e01a0b63432d392880', '0000-00-00', 'yzabcdhjkmdfghghjkyz5678890a', 0, '', ''),
(54, 'Mujeeb', 'Mujeeb.rahmanpk@yahoo.com', '03136152518', '1e61ed7c09ed343620a34d54ba75562f', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-04', '2015-07-06', 'yes', '', '89bee8439d2b93a7ab6f560568f9ccda', '0000-00-00', 'mnpqbcdf90abwxyz4567fghj0abcdfgh', 0, '', ''),
(55, 'sid faheem', 'sid.faheem@hotmail.com', '+923338638378', 'e4c791b7526540faf803d2f55a1d20de', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '0f41124b8e158832f53da98f439c4fe8', '0000-00-00', 'kmnpcdfgbcdfmnpqyzjkmndfghcdfg', 0, '', ''),
(56, 'mrs.hanif', 'javariyahanif@gmail.com', '03412929161', 'e4da3b7fbbce2345d7772b0674a318d5', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '6878b435d71996533e4aa7513b62f372', '0000-00-00', 'yzxyzrstvdfgh5678fghjxyzghjk', 0, '', ''),
(57, 'khunsa', 'khunsaraheel@yahoo.com', '03334569006', 'da4a15832dcbab8217af8757aae91169', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '7b2f140b7de620b2e05b0fac6f59b860', '0000-00-00', 'vwxy7890pqrsnpqr567890abstvwdfgh', 0, '', ''),
(58, 'HumaHamid', 'Humahamid6@gmail.com', '03458437406', 'ad152f908a77350b8fee1f33789cb216', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '4ffa28d6dcff0af9fbf00475fc31d07e', '0000-00-00', 'hjkmyztvwxkmnptvwxrstvhjkmabcd', 0, '', ''),
(59, 'shafiqurrehman', 'azizi_1958@yahoo.com', '03334218366', '2c71b87dca3cd5684aa0de2eaf6a82bc', 0, 0, '', '', 0, 0, 0, '', '', '', '2015-07-04', '2015-07-06', 'yes', '', '9185d2edddc8059021860398a63d4618', '0000-00-00', 'hjkmqrstxyz4567ghjk0abc23456789', 0, '', ''),
(60, 'jojopaa', 'SHAJUBOY@gmail.com', '03362035052', 'f4c25deb03ce8afa16b92faaaf1ff3d3', 2, 89, '', '', 0, 0, 0, 'Karachi', 'Red_Rose_With_Dew_Clipart.png', 'female', '2015-07-04', '2015-07-06', 'yes', '', '3ef3d30105fd55e67e774f2f0e16ad4d', '0000-00-00', 'fghj2345wxyzjkmn0abcmnpqpqrs7890', 0, '', ''),
(61, 'jojopaa', 'shajumanpk@gmail.com', '03362035052', 'f4c25deb03ce8afa16b92faaaf1ff3d3', 0, 89, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', 'cf66c238ad715716f98f648aa7b50e2a', '0000-00-00', '34564567890abcdfmnpqkmnp890az', 0, '', ''),
(62, 'SANNA IMRAN', 'sanna_pink@hotmail.com', '03335506714', 'c3fc69e0061156c4941c559fea8fe45c', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '3bf7b5a1d44959c7d1f4f32e0f238e74', '0000-00-00', 'cdfgyzkmnpkmnprstvrstvpqrsz', 0, '', ''),
(63, 'Sana', 'sanaanwaar@hotmail.com', '03323392514', 'e5922dcd0b790789ee93374a27c2718d', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-04', '2015-07-06', 'yes', '', '08b34422cbb89b107954fe11ef3fba2f', '0000-00-00', 'qrstwxyz90abstvw7890890astvw0abc', 0, '', ''),
(64, 'ayesha', 'ash.sid@live.com', '03443803597', 'ac98146b2e95be6ba81539d8b32ca136', 0, 28, '', '', 0, 0, 0, 'Badin', '', 'female', '2015-07-05', '2015-07-06', 'yes', '', '66f6176f21f2a1df8f51a135bacfe6ac', '0000-00-00', 'tvwxnpqrstvwnpqr3456tvwxpqrs0abc', 0, '', ''),
(65, 'Nazia', 'Bashirnazia@hotmail.com', '', '9deba5ebdedb054112f88137342380e1', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-05', '2015-07-06', 'yes', '', '6161e6b42015ceaf9ce5b12014463a8a', '0000-00-00', 'rstvhjkmbcdfnpqryz90abtvwx90ab', 0, '', ''),
(68, 'Aamir', 'm.aamirmohsin@gmail.com', '03142200455', '81dc9bdb52d04dc20036dbd8313ed055', 0, 89, '', '', 0, 0, 0, 'Karachi', '1538747_714874441869807_1508439261_n.jpg', 'male', '2015-07-06', '2015-08-13', 'yes', '', '2cac2a305ba1dcff889903059ae747bb', '0000-00-00', '1234qrstfghj890a78905678dfghrstv', 0, 'Aamir', ''),
(71, 'umaid', 'umaid.syed@yahoo.com', '03032102021', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-06', '2015-07-06', 'yes', '', '75b234836d267643e1e7a40cbfbdefc7', '0000-00-00', 'npqrvwxycdfgstvwghjk6789dfghxyz', 0, '', ''),
(72, 'ashii', 'ashiisidrawaqar1988@yahoo.com', '03224509549', '2cb698c1673bb803c5720d07bd0e15a6', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-06', '2015-07-06', 'yes', '', '325761d3ff4cf0a263540ae37ddcc759', '0000-00-00', 'cdfgabcddfghjkmnmnpq1234fghjkmnp', 0, '', ''),
(73, 'hamnawasim', 'hamnawasim@gmail.com', '', '2db59fa426620d8b6ad4f1b3d92ae7d0', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-06', '2015-07-07', 'yes', '', 'f69f76b9c0c30780df242bb18f854fbb', '0000-00-00', 'rstvjkmnmnpq0abc90ab12344567stvw', 0, '', ''),
(74, 'Azeem Akram', 'mureedabbass@hotmail.com', '03003157212', 'e10adc3949ba59abbe56e057f20f883e', 4, 41, '', '', 0, 0, 0, 'Karachi', '', 'male', '2015-07-06', '2015-07-06', 'yes', '', '3e0eb8b5037cc2bff220f8b91b29f228', '0000-00-00', 'mnpqqrsthjkm6789rstvpqrs890a90ab', 0, '', ''),
(75, 'Hira Cheema', 'sunshine101110@gmail.com', '', '0d743bc5e1874f4f4f69ab367891f152', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-06', '2015-07-06', 'yes', '', '90fcf57c5940b099925571104e9ffe67', '0000-00-00', 'bcdfstvwkmnp1234stvwstvw34567890', 0, '', ''),
(76, 'Hassan Askari', 'hassanaskari624@gmail.com', '+923029200136', '8ffe029f4af2a6675f6c7f1af67490c1', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-06', '2015-07-07', 'yes', '', '048543463226f6d955bc6dfef9afd852', '0000-00-00', 'jkmnhjkm890astvwz4567jkmn7890', 0, '', ''),
(77, 'Baba', 'Zubairipk@yahoo.com', '04235958456', 'b45ab53dd60c55df04a95ac43c0b8b90', 0, 46, '', '', 0, 0, 0, 'Lahore', '', 'male', '2015-07-06', '2015-07-06', 'yes', '', '3e3f9ea104a6ef0af8c16b7e269a64f9', '0000-00-00', '6789vwxydfgh5678zcdfgdfgh3456', 0, '', ''),
(78, 'ilsa', 'ilsasubhan07@gmail.com', '03335350921', '3553ef7e7b864537d181a4f216cbf9cc', 0, 89, '', '', 0, 0, 0, '', 'download (17).jpg', 'female', '2015-07-06', '2015-07-07', 'yes', '', '4e92417841acedb8143064c6c5d3ae40', '0000-00-00', 'abcdmnpq90abcdfgstvwmnpqz5678', 0, '', ''),
(79, 'Kinza Nisar Ali', 'zealous_kinza@hotmail.com', '02132443321', '57a8cc392897122be3982bef21fc04b4', 2, 29, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-07-06', '2015-07-07', 'yes', '', 'e55653afc1fd62131d0cbf620984b16a', '0000-00-00', '5678qrst6789kmnppqrs4567fghjqrst', 0, '', ''),
(80, 'veeni', 'veenikhn@yahoo.com', '03003632128', 'e10be246d696b0d25558b2bc5d870bd9', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-06', '2015-07-07', 'yes', '', '06fa4e8528d3f22fb198973408a61093', '0000-00-00', 'vwxyxyzwxyzkmnpbcdfstvwrstvtvwx', 0, '', ''),
(81, 'Nadiya', 'nadiyarashid725@gmail.com', '', 'ecf954b21d0e019d79ad62426a56ffc4', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-07', '2015-07-07', 'yes', '', '945610f6fc0eb469d498a223f4c5ca1c', '0000-00-00', '0abc67893456tvwxtvwx4567dfghtvwx', 0, '', ''),
(82, 'Tooba Tariq', 'toobatariq21@yahoo.com', '03472990975', '6d1b3e853fd7d36f5439242123b057dd', 0, 26, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-07-07', '2015-07-13', 'yes', '', '1de53a6ef225ba60e1e7141b49f0469d', '0000-00-00', 'npqrwxyzfghj7890dfghpqrskmnpcdfg', 0, '', ''),
(83, 'Saher', 'saher_najam@hotmail.com', '', '50814bb2d11972cb58f63e8ece6444cc', 0, 89, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-07-08', '2015-07-14', 'yes', '', '2baa522d51c1af33c8903ca62bdd21d0', '0000-00-00', 'dfgh2345vwxytvwx90ab90abstvwstvw', 0, '', ''),
(84, 'Adeel Qureshi', 'adeel@golive.com.pk', '', 'fa5b18586f8ac63e552c2ad6310c210e', 0, 89, '', '', 0, 0, 0, 'Karachi', '', 'male', '2015-07-08', '2015-07-08', 'yes', '', '736491ab26f8dea305fe74a764c911d6', '0000-00-00', 'stvw90abvwxy2345z5678npqr7890', 0, '', ''),
(85, 'mina liaquat', 'mina.liaquat@gmail.com', '03335432084', '8b05e947b32d48e632b82c58ed1a194c', 0, 28, '', '', 0, 0, 0, 'Islamabad', 'Photo0053.jpg', 'female', '2015-07-08', '2015-07-08', 'yes', '', '27bf9d70266b0a8fb3e17266a448b7da', '0000-00-00', 'mnpqghjkdfgh123478907890xyzfghj', 0, '', ''),
(86, 'Rubina', 'rubinaamin88@gmail.com', '+923215829823', '128593133506eaa324655690124b9b0e', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-08', '2015-07-08', 'yes', '', '870cb14f7f0f5d10f48ad3a1b53dc175', '0000-00-00', '2345qrsttvwx890anpqr0abcz90ab', 0, '', ''),
(87, 'Ahmed', 'ahmedgillani1@hotmail.com', '0331-205-2767', '949b782a3e3f4211c89cde9088689365', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-08', '2015-07-08', 'yes', '', '54e7f7d5162c09eca63d5ba981b8d3ac', '0000-00-00', '890amnpqwxyz890ayzzpqrsvwxy', 0, '', ''),
(88, 'administrator', 'admin@thefunkids.com', '', '0192023a7bbd73250516f069df18b500', 2, 5, '', '', 0, 0, 0, 'Karachi', '', 'male', '2015-07-08', '2015-07-08', 'yes', 'yes', NULL, '0000-00-00', '', 0, '', ''),
(89, 'Sadaat Abbasi', 'sadaqatabbasi0786@gmail.com', '03153030330', '0039fccf71d907ae8517271148637c42', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-09', '2015-07-14', 'yes', '', '720fe98090f4b6af3d01fbb9874ced5a', '0000-00-00', 'kmnpbcdffghjjkmn56787890vwxyjkmn', 0, '', ''),
(90, 'faryha', 'srfaroosh@yahoo.com', '03323510441', '7e0deb8853363a84629ba98fbaa29c55', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-09', '2015-07-14', 'yes', '', 'd8c11ae19646f91dab32f7c02c7e625c', '0000-00-00', 'fghj567890abstvwqrstbcdfvwxypqrs', 0, '', ''),
(91, 'maqsood', 'maqsood_005@yahoo.com', '03008011353', 'cd19aaf33f3ead9ddb125f17aed37fec', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-10', '2015-07-14', 'yes', '', '19da936bbfb1f10097889654a400eefa', '0000-00-00', 'bcdf34564567jkmnxyzpqrs0abcxyz', 0, '', ''),
(92, 'Risk doll', 'riks.doll@facebook.com', 'o3o44374525', '9879083beb3e8445e695fda4628b4c96', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-10', '2015-07-14', 'yes', '', '1bd2433311f640d745732815419a8e97', '0000-00-00', 'pqrsmnpqdfghpqrs90abtvwxrstv90ab', 0, '', ''),
(93, 'Washma ', 'washma102@gmail.com', '', '2fc8a0c5231ac4e022fa8bdbb74e8239', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-11', '2015-07-14', 'yes', '', 'bcfa8b8d4d13e8b062c1b3bfb117ac19', '0000-00-00', 'pqrswxyz0abc2345xyz890arstv6789', 0, '', ''),
(94, 'naila', 'nailawaqar888@outlook.com', '03359497996', 'cb598337e62bfaa5520f1ef87833ea94', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-12', '2015-07-14', 'yes', '', 'cfd63ee12f6b0dc2be789621b112a39c', '0000-00-00', 'stvw890a90ab5678qrstvwxyhjkmvwxy', 0, '', ''),
(95, 'Mrs.Shafaque', 'shafaquebaloch@gmail.com', '03313610456', '65c51312c58bba81a648bbe95c875e1c', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-12', '2015-07-14', 'yes', '', 'cb0d228a098ce4d953f68d808d18a805', '0000-00-00', '345656785678jkmnxyzfghj90abwxyz', 0, '', ''),
(96, 'uzma', 'uzma_noor22@yahoo.com', '03002419017', '0bd211c7f40831e697d330be0718fc36', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-13', '2015-07-14', 'yes', '', '85f57aa2230f7a7aa36fccdd9d6e26af', '0000-00-00', 'rstvqrst90abhjkmvwxydfghxyzmnpq', 0, '', ''),
(97, 'Sana Farooq', 'illusionlife85@gmail.com', '', '60c8dcd54ea7bfcb432b59821838341c', 0, 29, '', '', 0, 0, 0, 'Lahore', '', 'female', '2015-07-14', '2015-07-14', 'yes', '', 'b55118dab93c05cbe0a42b300c35d792', '0000-00-00', 'fghjpqrs90ab90abwxyzjkmnnpqrvwxy', 0, '', ''),
(98, 'erum', 'erum_khi@hotmail.com', '00923332175709', '30691b39c6dd491c5eef184c4a715119', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-14', '2015-07-15', 'yes', '', 'e1140e9d7f2b226d3322f7fbe6f93554', '0000-00-00', 'fghj1234123456785678tvwxmnpqmnpq', 0, '', ''),
(99, 'laiba saeed', 'sadia.manzoor786@hotmail.com', '', '655a23c64ff3ac57b6e3c8ff4762c00b', 0, 11, '', '', 0, 0, 0, 'mirpur', 'imagesCA9H30R2.jpg', 'female', '2015-07-14', '2015-07-15', 'yes', '', '7d12dbaf8d34169126129773f6297469', '0000-00-00', 'tvwxstvw1234vwxy0abchjkmqrst0abc', 0, '', ''),
(100, 'Aamir Mohsin', 'amohsin@golive.com.pk', '03142200455', 'e2fc714c4727ee9395f324cd2e7f331f', 0, 22, '', '', 0, 0, 0, 'Karachi', '1538747_714874441869807_1508439261_n.jpg', 'male', '2015-07-14', '2015-07-24', 'yes', '', 'd1a69833369da7f7fb62c0a496c4d095', '0000-00-00', '890akmnptvwx12343456mnpqnpqrxyz', 0, 'Aamir', ''),
(101, 'HusanKeyMalka', 'husankeymalka@gmail.com', '03142200455', '5babd9cd08dce3e31ca07f9354b5abd8', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-14', '2015-07-14', 'yes', '', '8cebc984dd29ec74b941a690483fe578', '0000-00-00', 'abcd6789mnpqxyz456767894567bcdf', 0, '', ''),
(102, 'saima', 'somi_khan143@Yahoo.com', '+923007002984', '91834eacabf5452ec298302f3456e3a8', 0, 27, '', '', 0, 0, 0, 'Multan', '', 'female', '2015-07-14', '2015-07-14', 'yes', '', '0081bc15dd19ab981f06a6928d9facd0', '0000-00-00', 'stvwmnpq0abc890arstvrstvrstvnpqr', 0, '', ''),
(103, 'nasreen', 'momina.noman@gmail.com', '+923034977454', '1d17421a37617d1689376c62a4ecf49b', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-14', '2015-07-15', 'yes', '', '2a5df7866dc3c943056a8079aa02f655', '0000-00-00', 'kmnpabcdxyzstvw4567kmnpwxyzhjkm', 0, '', ''),
(104, 'Sehar Anwar ', 'Sehrmomina@gmail.com', '03224640984', 'd5d3dea15e21e6e24279df0f1543c0cb', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-14', '2015-07-14', 'yes', '', 'e59259ea20911af01af42511a6608f06', '0000-00-00', 'hjkmdfghyzjkmnwxyzmnpqkmnp5678', 0, '', ''),
(105, 'Aima Irshad', 'aimawaqas76@gmail.com', '03217621104', 'a8b262cdf845e668bf4b73ab44ccbc3f', 0, 0, '', '', 0, 0, 0, '', '2015-07-13_18.38.39.jpg', 'female', '2015-07-14', '2015-07-14', 'yes', '', '672e716cb018afb2d4789d61057d63ce', '0000-00-00', 'dfghvwxy5678fghjfghj7890yz1234', 0, '', ''),
(106, 'Areeba Jawaid', 'jawaid_areeba@yahoo.com', '03472990975', 'd9b1ea1012d0c349532be21677bb41c6', 0, 35, '', '', 0, 0, 0, 'Abbotabad', '', 'female', '2015-07-14', '2015-07-14', 'yes', '', 'ec9040186407472d7e078d88e030a650', '0000-00-00', '7890234590abfghjwxyz0abcmnpqz', 0, '', ''),
(107, 'Shomaila ', 'shamsn@hotmail.com', '', 'd813e683481035be72c2e8b6806d0387', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-15', '2015-07-15', 'yes', '', 'f84fe1cabb2d6fb55fa5867bfcd6ddc9', '0000-00-00', '1234rstvyzmnpq0abczrstvcdfg', 0, '', ''),
(108, 'Nadia', 'nadiyarashid13@hotmail.com', '', 'ecf954b21d0e019d79ad62426a56ffc4', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-15', '2015-07-15', 'yes', '', 'c21aaba2ab0130662f06bfb50c5fb97b', '0000-00-00', 'mnpq5678tvwxjkmn6789ghjkhjkmmnpq', 0, '', ''),
(109, 'waqas', 'washah8@gmail.com', '03333971657', 'd8fc7393953d07588e882f6e5b542a2f', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-15', '2015-07-15', 'yes', '', '89ce19ac74020d3d337812cd5dc27b4e', '0000-00-00', 'fghjz7890fghjstvwcdfgcdfgkmnp', 0, '', ''),
(110, 'Rabeea', 'rabeea412@gmail.com', '03320420354', 'e990592ec1d19e4021f309ca9ee446f7', 3, 32, '', '', 0, 0, 0, 'Lahore', 'IMG_20150712_121224.jpg', 'female', '2015-07-15', '2015-07-22', 'yes', '', '3027679b2b319632729e75ea3ce50ae6', '0000-00-00', '90ab4567kmnp890ahjkm90abrstvnpqr', 0, '', ''),
(111, 'Mahwish', 'mahnad2003@yahoo.com', '', '1aa06851026f094112f03ee50f27bde2', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-15', '2015-07-22', 'yes', '', '666f63ce829cab6e951a744e30855ee6', '0000-00-00', 'ghjk23457890abcd90abwxyztvwxkmnp', 0, '', ''),
(114, 'Sonia Adil', 'soniadil82@gmail.com', '', '4e075844d2e00e4c800c8c62716bed8c', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-15', '2015-07-15', 'yes', '', '1b5543e6207d456a21831e1df677a16e', '0000-00-00', 'rstv78904567xyz3456rstvabcdtvwx', 0, '', ''),
(115, 'Sidra Omair', 'sidraomair.so@gmail.com', '03323316634', 'dfb9fec4d081d2eed7fbfb8fa8d933b4', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-15', '2015-07-22', 'yes', '', 'ded89063568c121b74c881a32c514616', '0000-00-00', '0abcghjkghjk5678dfgh1234hjkmhjkm', 0, '', ''),
(116, 'mehwish ain', 'mehwishain_hussain@hotmail.com', '03322954450', '872b2b8d1b87b3d697ce1b382083e758', 0, 0, '', '', 0, 0, 0, 'thatta', '', 'female', '2015-07-15', '2015-07-22', 'yes', '', 'ea4401ed921d263686328d62b9610568', '0000-00-00', '3456xyz3456ghjk4567stvwjkmnwxyz', 0, '', ''),
(117, 'saim ', 'sumera.choudhry@gmail.com', '0515179590 ', '84458a237843356460c10dd1f0f12e40', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-15', '2015-07-15', 'yes', '', 'd86e303b439ac5508cc0df9f2e4112ab', '0000-00-00', '45670abc34564567jkmnpqrshjkmnpqr', 0, '', ''),
(118, 'Naila', 'naina831@hotmail.com', '', '6a97fb405a3d0b243f6559e2e87c394c', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-15', '2015-07-22', 'yes', '', '7cc00a0db70ba53b2f3349920d25e277', '0000-00-00', '2345bcdfyzpqrs34564567xyzz', 0, '', ''),
(119, 'Nura', 'cake19931993@gmail.com', '', '90f9ac59bfef43ea9d8bd7504dc1b8a9', 0, 0, '', '', 0, 0, 0, 'USA', '', 'female', '2015-07-16', '2015-07-16', 'yes', '', '313100b30031484724ad5fbc5ec7613b', '0000-00-00', 'dfghstvwrstvrstvtvwxrstvnpqr90ab', 0, '', ''),
(120, 'iqra', 'iqraayaz666@yahoo.com', '03212169752', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, '', '', 0, 0, 0, 'Hyderabad', '', 'female', '2015-07-16', '2015-07-16', 'yes', '', '3941c57c54199d6f17a1a4540b6593f1', '0000-00-00', 'pqrskmnpabcd7890yzbcdfjkmnbcdf', 0, '', ''),
(121, 'ranna', 'rsdrm@yahoo.com', '03006352730', 'c6daf0c02bf89706c10ece5f19f7cd41', 0, 30, '', '', 0, 0, 0, 'Multan', '', 'female', '2015-07-16', '2015-07-16', 'yes', '', '5d84c7f293fdc168f35934bb2a8821d3', '0000-00-00', 'bcdf5678qrst7890rstv3456tvwxhjkm', 0, '', ''),
(122, 'eram', 'eramsaba16@gmail.com', '+923014876788', '5b807082e8e5e2d08e56ae8e420cb49c', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-16', '2015-07-16', 'yes', '', '99bb82c4b757d4e195cefc4dd72330e9', '0000-00-00', '5678abcdvwxy4567tvwxpqrs6789wxyz', 0, '', ''),
(123, 'shumaila danish', 'shumailausmani@gmail.com', '923110118179', '70ee6d6280fc5116d3c971a9b6c6c65d', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-16', '2015-07-16', 'yes', '', 'b916c84d720b088af5e79d6de432b3c3', '0000-00-00', 'stvwtvwxzbcdf3456bcdftvwxjkmn', 0, '', ''),
(124, 'm.rehan Arslan', 'mrehanarslan@gmail.com', '03214966588', '9c5cc59f6ef20f1ab5e8743bdcf32be7', 0, 2, '', '', 0, 0, 0, '', 'IMG_2445.JPG', 'male', '2015-07-16', '2015-07-16', 'yes', '', '77fde75dfd2721a8de63d56e78546807', '0000-00-00', 'yzxyzhjkmabcd5678fghj0abcnpqr', 0, '', ''),
(125, 'Anam', 'fragilehoney@hotmail.com', '00923344500527', 'd4b01774649aef8041db32a23d18c427', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-17', '2015-07-22', 'yes', '', '908590a2330ebb2d615a4bf9dd23c0b8', '0000-00-00', '890apqrs4567rstv789056786789mnpq', 0, '', ''),
(126, 'shafeen', 'sshafeen@hotmail.com', '', '36d3b1b64347e19529c8c624c6b8ec6a', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-18', '2015-07-22', 'yes', '', '4ca0c8e4b0d122080843b157444b67d8', '0000-00-00', '2345stvwnpqr1234jkmn0abc0abc7890', 0, '', ''),
(133, 'Azeem Akram Solangi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 975882625765505, '', ''),
(134, 'kiran', 'kiranqasim.kq@gamil.com', '03335485394', 'd93ec75bca4b7ef88df5a6c591654422', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-19', '2015-07-22', 'yes', '', '86a40d4fae766a1e96c30e7dfda57490', '0000-00-00', 'cdfgvwxy2345yzdfgh12342345ghjk', 0, '', ''),
(135, 'Aamir Rasheed', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 920439701354427, '', ''),
(136, 'Asif Nadeem', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 997644390275113, '', ''),
(137, 'Syeda Huma Khan', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 802506299870180, '', ''),
(138, 'Mrsfarah Zubair', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10204938917580744, '', ''),
(139, 'mehwish fazlani', 'mehwishfazlani@hotmail.com', '03333928062', 'bbafcfe117e441b4b9a120e4b9edd700', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-21', '2015-07-22', 'yes', '', '477fe931280d4c5ef12d5d9c214c588d', '0000-00-00', 'qrst90abhjkmcdfgdfghabcdghjk1234', 0, '', ''),
(140, 'Asma Sohail', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10153300060629724, '', ''),
(141, 'Syed Umaid Hamid', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10205009868386157, '', ''),
(142, 'Adeel Qureshi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10206256292518787, '', ''),
(143, 'DrUzma Abidi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 896663723738374, '', ''),
(144, 'nageen afaq', 'nageen1983@yahoo.com', '03072278240', '118305ab6d4d6fd7ed31a8db6261a92b', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-22', '2015-07-22', 'yes', '', 'a42824bd761b90825b102b7dbc9e24fa', '0000-00-00', 'hjkmnpqrvwxy6789mnpq7890jkmnmnpq', 0, '', ''),
(145, 'Shiraz Lakhani', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 870984179617684, '', ''),
(146, 'Aamir1', 'm.aamirmohsin@yahoo.com', '03142200455', 'e2fc714c4727ee9395f324cd2e7f331f', 0, 0, '', '', 0, 0, 0, '', '1.jpg', 'male', '2015-07-22', '2015-07-22', 'yes', '', '5374549e074df01dacc8fb9751cf78b9', '0000-00-00', 'abcd890a3456yz7890fghj78900abc', 0, '', ''),
(147, 'Aamir1', 'psychpulse@hotmail.com', '03142200455', 'e2fc714c4727ee9395f324cd2e7f331f', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-22', '2015-07-23', 'yes', '', 'b302e68f1a86518f99e49e2655efd574', '0000-00-00', 'abcdabcdabcdzz1234rstvxyz', 0, '', ''),
(148, 'Aamir Mohsin', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1012687875421794, '', ''),
(149, 'anaya', 'anaya.ali525@gmail.com', '00923225219290', 'b60f84682a7d00aab83a53e8e7978c3d', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-22', '2015-07-23', 'yes', '', '8fbccc99ac66bc2964238981f874a377', '0000-00-00', 'yz4567mnpq0abc2345abcdyzxyz', 0, '', ''),
(150, 'Faraz Rifaqat', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1458182901167275, '', ''),
(151, 'Hamza Siddique', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1436999593295258, '', ''),
(152, 'Aisha', 'hinaa.quddus@Gmail.com', '03312993925', 'd93ec75bca4b7ef88df5a6c591654422', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-23', '2015-07-27', 'yes', '', '1cca1490539ea022904e904c4cafcce2', '0000-00-00', '67895678z2345wxyzhjkmwxyznpqr', 0, '', ''),
(153, 'Hina Sikander', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1604937179769868, '', ''),
(154, 'Maha Shaikhani', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 481031925412066, '', ''),
(155, 'asif', 'hassanbasri333@gmail.com', '+923213333018', '8d0cf7f63decdc196115a537136f16e5', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-23', '2015-07-27', 'yes', '', '896e858e15244d41b19cbf268d3f74fa', '0000-00-00', 'xyz56782345bcdfyzdfgh4567z', 0, '', ''),
(156, 'shiraz', 'shiraz@golive.com.pk', '03322136181', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-24', '2015-07-24', 'yes', '', '8c3622d7ca0be489a2ccb48bf107bd35', '0000-00-00', 'yzfghjmnpq90ab4567dfghfghjpqrs', 0, 'Aamir', ''),
(159, 'Maliha', 'maizaz12@hotmail.com', '03008486573', '551922a830fc1b2bf1cfde7f2b97df04', 0, 0, '', '', 0, 0, 0, '', 'IMG_23035755793870.jpeg', 'female', '2015-07-24', '2015-07-27', 'yes', '', '2606a06ba0b28514fc42cd4712c56010', '0000-00-00', '5678ghjkmnpq67895678cdfgjkmn1234', 0, 'maliha', ''),
(160, 'allayhyder', 'allayhyder@hotmail.com', '03326982112', '2c246138157f70b11971050b61409562', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-24', '2015-07-27', 'yes', '', '64e63933c0d1f6b6a05c96c149df7c20', '0000-00-00', 'pqrswxyzhjkmhjkmfghj1234mnpqvwxy', 0, 'izan', ''),
(161, 'Nadeem Kiran', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 831345766943955, '', ''),
(162, 'Sadia Kamran', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1478683349111568, '', ''),
(163, 'moaiz', 'monis78639@gmail.com', '03325611393', 'ca7d21e2191b490fb8d7fa9ad35c05fb', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-24', '2015-07-27', 'yes', '', '4875f49bf8d690dd7181b118bb2d8a2f', '0000-00-00', 'dfghpqrs5678fghjcdfg890aghjktvwx', 0, '', ''),
(164, 'shifa patel', 'shifapatel53@gmail.com', '9974873113', '3917f85d70e062dd99b8b24748b147d0', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-24', '2015-07-27', 'yes', '', '44b4fdb7e40385015268b31f83bdaa9d', '0000-00-00', 'rstvcdfgcdfgstvwvwxy4567cdfgtvwx', 0, '', ''),
(165, 'zamal ', 'zamalsalman@yahoo.com', '', '75c243c733bc799e8f00e33a28d4e077', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-25', '2015-07-27', 'yes', '', '48cd8ff018ddf357483af0e06ee2e6fa', '0000-00-00', '890a890az6789npqrrstvwxyzqrst', 0, '', ''),
(166, 'Symbul Khan', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 702558729888223, '', ''),
(167, 'Binish', 'Binishnadeem8@facebook.com', '', '566cc406844bb2d63a64a17fd9e603d4', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-25', '2015-07-27', 'yes', '', '1d23af5590dfa0d911267dead6f7f528', '0000-00-00', '7890vwxymnpqrstvqrst123467896789', 0, '', ''),
(168, 'Syed Mohiuddin Zia', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 850903191660024, '', ''),
(169, 'Sirrayabiha', 'samiya110@hotmail.com', '03213099709', 'fe166fa2cd63cd297dcff85ec1beb18d', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-26', '2015-07-27', 'yes', '', 'bcf0a6ad16c8ed0134c3166d2500ad83', '0000-00-00', '5678zmnpqhjkmjkmn6789ghjk5678', 0, '', ''),
(170, 'Nabeel', 'scorpionbite@hotmail.com', '123', '6127c94780277fa64acb99d9e97e0f87', 0, 89, '', '', 0, 0, 0, 'Mirpur Khas', 'fc-barcelona-barca-barsa-5940.jpg', 'male', '2015-07-27', '2015-08-11', 'yes', '', '6a26fa233072338d90a8d7ac9b54786f', '0000-00-00', 'mnpqtvwx23455678kmnphjkmdfgh890a', 0, 'nabeel', ''),
(171, 'tayeba', 'stayeba@ymail.com', '03458891235', '4840bf6c91558738aa25c2362103b1a6', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-27', '2015-08-11', 'yes', '', 'ec213b23268da18130c9429df2464a22', '0000-00-00', 'bcdf23453456vwxy1234rstvnpqr4567', 0, '', ''),
(172, 'Hira Irfan', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 405958526260708, '', ''),
(173, 'Rana Tahir', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 714228678704317, '', ''),
(174, 'zunaira', 'zunairatariq@gmail.com', '03002467624', '3e1b534f456442af3006ab00df0f4ab5', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-27', '2015-08-11', 'yes', '', 'b9606709a052eb1821b6e9b02eaa5227', '0000-00-00', 'wxyz3456xyz0abc90abwxyztvwxghjk', 0, '', ''),
(175, 'Sidra Aulakh', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 847648011955503, '', ''),
(176, 'Ariela John', 'pastorarielajohn@yahoo.com', '00923007553369', 'f7e27b1c0482ba04c5fe8ae4d1a31c45', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-27', '2015-08-11', 'yes', '', '88cd38605edeb48369a8d5321444ea45', '0000-00-00', '6789hjkmxyz234567892345cdfg6789', 0, '', ''),
(177, 'Ariela John', 'arielajohnministries@yahoo.com', '00923007553369', 'f7e27b1c0482ba04c5fe8ae4d1a31c45', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-27', '2015-08-11', 'yes', '', 'e1070b27d6e1ed62813f3d93e67f32ec', '0000-00-00', '0abc90abmnpqfghjhjkmjkmnbcdfjkmn', 0, '', ''),
(178, 'Ariela John', 'arielajohnministries@gmail.com', '00923007553369', 'f7e27b1c0482ba04c5fe8ae4d1a31c45', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-27', '2015-08-11', 'yes', '', '2af0d5faea637276e663ea258809925b', '0000-00-00', 'ghjkxyzwxyzrstvkmnpnpqr90abghjk', 0, '', ''),
(179, 'Iram Waseem', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1635130476730451, '', ''),
(180, 'iram', 'iramwaseem92@gmail.com', 'o3084422889', '0920c3ae17bc3a4723ebd06c5e16826c', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-27', '2015-08-11', 'yes', '', '2c115918b52467daeff6bab184aa83f6', '0000-00-00', 'zabcdvwxy5678cdfgabcdrstvyz', 0, '', ''),
(181, 'Iram Tariq', 'tlatif74@gmail.com', '+923247630888', '354f1930e2e2a4cc396583c1f15688c2', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-27', '2015-07-27', 'yes', '', '8b3507169eeaa47c05320a6c36e352b2', '0000-00-00', 'pqrs7890cdfg890axyzwxyzghjkbcdf', 0, '', ''),
(182, 'fayyaz', 'mfayyaz.kabir@gmail.com', '03222594970', '004d90ca19f7f3581616afbefe366658', 0, 89, '', '', 0, 0, 0, '', 'Adisa.jpg', 'male', '2015-07-28', '2015-08-11', 'yes', '', '4f664f8d9f556409d43a5094ea1a0d8c', '0000-00-00', 'hjkmkmnp2345mnpqvwxymnpq890astvw', 0, 'adisa', ''),
(183, 'Azeem Abbass', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1591251557808091, '', ''),
(184, 'ZeEshan Ali', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 442702639237355, '', ''),
(185, 'mariam', 'mariamharrison82@yahoo.com', '03002224431', '45d815b34cbcdbce4e324168bdfebcaa', 0, 0, '', '', 0, 0, 0, 'karachi pakistan', '', 'female', '2015-07-28', '2015-08-11', 'yes', '', '66d469c24198a1ee8cbda60fc4e42a36', '0000-00-00', '45677890hjkmtvwxpqrs567845670abc', 0, '', ''),
(186, 'Mariam Harrison', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1605097519751116, '', ''),
(187, 'Connie McGarrah', 'Connie.james@hotmail.com', '4793667105', 'bdeeba5ba004a5c49c95258024aafb24', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-28', '2015-08-11', 'yes', '', '50250a9e281723271603c70c4005a705', '0000-00-00', '4567jkmn5678xyznpqr67891234fghj', 0, '', ''),
(188, 'Mahwish Aziz', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10155880486385323, '', ''),
(189, 'Wajih Asif Rathore', 'Wajih.rathore@yahoo.com', '', '57e307d69cf43919d26e31bff7c55638', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-29', '2015-08-11', 'yes', '', 'a56e4597e499d893af94ed0b05c28e6e', '0000-00-00', '2345dfghbcdfrstvhjkmrstvbcdfpqrs', 0, '', ''),
(190, 'sarvat', 'dsarvat@yahoo.com', '03333182142', 'df49fac823b3ab5418370bfb459603d8', 0, 34, '', '', 0, 0, 0, 'Sukkur', 'IMG_20150729_205237_400.JPG', 'female', '2015-07-29', '2015-08-11', 'yes', '', '90cafbff5b3dfbc3e2bccfb5552f3eaf', '1980-12-10', 'cdfgtvwx0abc5678678990ab3456tvwx', 0, 'hoorain', ''),
(191, 'Hira Umair', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10155957275445374, '', ''),
(192, 'Bushra Ali', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 873118412777265, '', ''),
(193, 'Muhammad Jibran', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10205729261084318, '', ''),
(194, 'dr kulsoom nawaz', 'kulsoom.nawaz98@gmail.com', '03313778386', '0b1e13fbc46c88f7a0121f73ddeade24', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-30', '2015-07-30', 'yes', '', '49ca68d990c347b7dbecd2bcf4e3cc00', '0000-00-00', 'stvwmnpqjkmnghjknpqrkmnprstv2345', 0, '', ''),
(195, 'Kulsoom Nawaz', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 837973806300393, '', ''),
(196, 'zaheer', 'daduwala@gmail.com', '03003642858', 'b9ca12c7cdaef88959c2f42182b338a7', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-30', '2015-08-11', 'yes', '', 'b10c8145ae936d4fe2dfd3753a1295ba', '0000-00-00', '567878905678stvwkmnpabcdpqrscdfg', 0, '', ''),
(197, 'Angle Bush', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1481085902202772, '', ''),
(198, 'Asma Rashid', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 941714232553044, '', ''),
(199, 'tata12345678', 'svebaad@gmail.com', '', '3617a2d14296cbc105aabf0eebf8c74e', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-31', '2015-08-11', 'yes', '', 'ba7a56e66d06339f7b9b9073ec36a6bb', '0000-00-00', '678956782345pqrskmnpstvw7890pqrs', 0, '', ''),
(200, 'Nadia Majid', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 484376371729613, '', ''),
(201, 'Ahmad', 'Ahmad12@domain.com', '03407330518', '6661ad49d66a293332b15d6349bbe4ad', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-07-31', '2015-08-11', 'yes', '', 'c1b294f7c75111f9bd5f64c57804edc4', '0000-00-00', '3456ghjk78902345wxyzjkmnfghjvwxy', 0, '', ''),
(202, 'Zainab Lodhi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1616379485318535, '', ''),
(203, 'jia arif', 'topsecretjia255f@gmail.com', '03125120051', '58667d8e2cc1ff4098db182c10a76e8b', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-31', '2015-08-11', 'yes', '', '5bb794600962cce94cca6c1be36dadcb', '0000-00-00', 'fghjstvwvwxy890a34563456hjkm2345', 0, '', ''),
(204, 'jia arif', 'topsecretjia@gmail.com', '03125120051', '58667d8e2cc1ff4098db182c10a76e8b', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-07-31', '2015-08-11', 'yes', '', '10772f661161050100141bdc6983686d', '0000-00-00', 'zyz3456abcddfghpqrs56785678', 0, '', ''),
(205, 'javeed', 'javeed_aziz@yahoo.com', '03345029539', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, '', '', 0, 0, 0, '', '', '', '2015-08-01', '2015-08-11', 'yes', '', '9fd831148dce80238831d6e5d2decc2b', '0000-00-00', 'z34566789fghjxyz1234xyz4567', 0, '', ''),
(206, 'azra sajid', 'azrasajid54@gmail.com', '03224884653', '46d8a6b9bc474fc2d69f438981e86b96', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-01', '2015-08-11', 'yes', '', '7009d00e885958ea5287366d07122b26', '0000-00-00', 'npqr890arstvtvwx4567xyzxyz90ab', 0, '', ''),
(207, 'UMER', 'Mumer@domain.com', '03452223036', 'ecaf7ac04862411914fadaae69d6cc03', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-01', '2015-08-11', 'yes', '', 'f1e418fa44d679845a349cf464b9ea4f', '0000-00-00', '12340abcvwxy5678vwxystvwkmnpyz', 0, '', ''),
(208, 'Jutt Chadr', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1435523626777999, '', ''),
(209, 'Maria Memon', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1468647376788995, '', ''),
(210, 'Kamran Iqbal Niazi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 733359750109456, '', ''),
(211, 'ali hasan', 'mubasaharhasan01@gmail.com', '03135223899', '2ba3e77f1936c6c305615642cb6a935f', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-01', '2015-08-11', 'yes', '', '5c173d3dac8adc35f381012113464162', '0000-00-00', '2345fghjtvwxqrstfghjvwxy90abmnpq', 0, '', ''),
(212, 'Wajih Rathore', 'wajih.rathore@gmail.com', '', '57e307d69cf43919d26e31bff7c55638', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-01', '2015-08-11', 'yes', '', '2b75928afc35a0fc76c864fdf1a4bbf9', '0000-00-00', 'dfghstvwqrstrstv2345mnpqkmnpfghj', 0, '', ''),
(213, 'bushra', 'bushraw3@gmail.com', '03005131272', 'bfff9396d448e0563f0373ddbbed71ed', 0, 0, '', '', 0, 0, 0, '', '', '', '2015-08-01', '2015-08-11', 'yes', '', '0200c88b67c16a3343260213c08a0b9b', '0000-00-00', 'pqrs4567stvwpqrscdfgtvwxvwxy90ab', 0, '', ''),
(214, 'faizo', 'faatijo@yahoo.com', '03324535379', '2131e644993afb1df163caff55cabf42', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-01', '2015-08-11', 'yes', '', '7d707fba5ce9c61636929b91a8a9a0ba', '0000-00-00', 'vwxymnpqpqrs6789pqrs2345rstv1234', 0, '', ''),
(215, 'Warsa Lakhani', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 496616590514735, '', ''),
(216, 'munira', 'adnan.m.lakhani@gmail.com', '03009289931', 'c6d3721df85d785c68585f26152553ea', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-01', '2015-08-11', 'yes', '', 'a6d371b6a645e19b1b4b2e44f2b00a85', '0000-00-00', '890acdfgtvwxhjkmnpqr3456tvwxghjk', 0, '', ''),
(217, 'zuhair', 'muhammadzainbajwa@gmail.com', '', 'bf5bd1eb9ec20084c050fe41cd341d39', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-01', '2015-08-11', 'yes', '', 'e700d9ffc0cced96c573db79bdfc5502', '0000-00-00', 'pqrspqrs890a4567zmnpq678990ab', 0, '', ''),
(218, 'Muhammad Zain', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1541250116138010, '', ''),
(219, 'Fawaz', 'Asmat.kiran@yahoo.com', '03315624628', '17d7ccd9160c5e7b255855b22966e525', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-02', '2015-08-02', 'yes', '', '8b3faabcc7abc7392965f31341d0499f', '0000-00-00', '1234wxyznpqr0abckmnpnpqrpqrsghjk', 0, '', ''),
(220, 'arham7037', 'arham7037@gmail.com', '03368377656', '4e19a410e031b6eed747e7e56dbb69a8', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-02', '2015-08-11', 'yes', '', '55b0aa5e38ba9d3fdd5b4ae809b98d8f', '0000-00-00', 'wxyz90abnpqrpqrskmnpjkmnnpqrdfgh', 0, '', ''),
(221, 'areej khizer', 'areejkhizer@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-02', '2015-08-11', 'yes', '', '44d545bba77376fd78aca2a74b4c2968', '0000-00-00', 'fghj890apqrsnpqr0abcabcdqrst6789', 0, '', ''),
(222, 'areej khizer', 'khansakhizer@gmail.com', '03214526963', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-02', '2015-08-11', 'yes', '', 'aa9b7955571c51856902b1f3e48c5340', '0000-00-00', 'ghjkqrstxyzz2345rstv4567hjkm', 0, '', ''),
(223, 'Sajila tayyab', 'Sajilatayyab@hotmail.com', '', '64c18dac90a4585afade94a70d85d3d3', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-02', '2015-08-11', 'yes', '', '98d906e3800fd633b2434f346829cdec', '0000-00-00', 'kmnp234590abqrstwxyzmnpqhjkmrstv', 0, '', ''),
(224, 'Sajila tayyab', 'Sajlatayyab@hotmail.com', '03216432785', '9f1e9632bf257fd856aca14c2b2afb65', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-02', '2015-08-11', 'yes', '', 'bc099710a8c2f70ecd16fc99cca035f4', '0000-00-00', '90abdfghabcd5678pqrszjkmnvwxy', 0, '', ''),
(225, 'Hareem tayyab', 'Hareemtayyab@hotmail.com', '', '9f1e9632bf257fd856aca14c2b2afb65', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-02', '2015-08-11', 'yes', '', '8edab0a6366abdf9734668d7735e33d1', '0000-00-00', 'yzhjkmhjkmfghj1234jkmncdfgabcd', 0, '', ''),
(226, 'Saima shahza', 'saimashahzadtrose@yahoo.com', '', '5a4ae23fc31d9d13bffa437080f15b6a', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-03', '2015-08-03', 'yes', '', 'e1f245f99f4815a78a12cd197ad1c347', '0000-00-00', '4567vwxy890afghjkmnpxyzdfghrstv', 0, '', ''),
(227, 'stniirf', 'stniirf@hotmail.com', '03332422124', 'f0d360005a7b4e7c0c79a0a5d69bfdaa', 0, 0, '', '', 0, 0, 0, '', '', '', '2015-08-06', '2015-08-11', 'yes', '', '7226009907c777bc6c63c997b81c23ac', '0000-00-00', '3456fghjyz4567890a90abzghjk', 0, '', ''),
(228, 'Raheel Aslam', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10153473668108055, '', ''),
(229, 'Zabi Warraich', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1611160855815603, '', ''),
(230, 'musabowais', 'goodbrothers@gmail.com', '03411127936', '6777708e68841a44ef2ffc8ee80dbc8b', 0, 0, '', '', 0, 0, 0, 'karachi', '', 'male', '2015-08-08', '2015-08-11', 'yes', '', '8c0cece142b84c90ba66fe0c9dc22e00', '0000-00-00', '6789xyz123490abnpqryzwxyzkmnp', 0, '', ''),
(231, 'Tariq Rashid', 'rasheed.tariq@yahoo.com', '03212280887', 'c1e24850b57fecf1722daf8660c87134', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-09', '2015-08-11', 'yes', '', 'bf3709d6685fdde57bfc301a675141b7', '0000-00-00', 'cdfgzxyzghjkxyztvwxpqrsmnpq', 0, '', ''),
(232, 'Muneer Ahmed Ansari', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10204904820201077, '', ''),
(233, 'Ch Umair', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 127707654243265, '', ''),
(234, 'monica', 'moon_monica13@yahoo.com', '03327813436', '5de06012e4444ae777bf3d0bac28f825', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-11', '2015-08-11', 'yes', '', '71a01378eb53fd81b9c435376ee211b4', '0000-00-00', 'hjkm890ajkmntvwxpqrsyz3456rstv', 0, '', ''),
(235, 'Mehwish Fazlani', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1004014906285712, '', '');
INSERT INTO `users` (`user_id`, `name`, `email`, `mobile_number`, `password`, `totalkids`, `kidsage`, `user_interest`, `fav_past_time`, `country_id`, `state_id`, `city_id`, `address`, `userimages`, `gender`, `createdAt`, `updatedAt`, `isActive`, `isApproved`, `activation`, `birth_date`, `verificationcode`, `Fuid`, `user_name`, `resitration_type`) VALUES
(236, 'usman ahmad', 'www.usmanahmad@gmail.com', '', '72491a495cd3f7447740febc2a4306e1', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-11', '2015-08-20', 'yes', '', 'e8a45640cc6ebbf95b978823d5a45935', '0000-00-00', '6789jkmnghjk6789abcdtvwxxyzqrst', 0, '', ''),
(237, 'aziza', 'azizaakhtar786@gmail.com', '03117185129', '61243c7b9a4022cb3f8dc3106767ed12', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-12', '2015-08-20', 'yes', '', '620842f4d54b53d48de57226c8269e3c', '0000-00-00', 'yz1234yzabcdhjkm2345ghjk1234', 0, '', ''),
(238, 'hassn', 'hassan@domain.com', '9019379', '064ef1e8dad4f759877e0c91e54d6415', 0, 0, '', '', 0, 0, 0, '', '', '', '2015-08-12', '2015-08-20', 'yes', '', 'c2b28cfa7bdc8d3d3a1f4760f8f0372c', '0000-00-00', 'ghjkvwxyqrst890ahjkmmnpqwxyzfghj', 0, '', ''),
(239, 'Zanib Nawaz', 'Zanibnawaz@gmail.com', '03003593846', '13708e1ea7778ff4fcb297864d5fc387', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-12', '2015-08-20', 'yes', '', '162d2cd9ec4aaf25a82e628ce50ef2bc', '0000-00-00', 'jkmnabcddfghabcdtvwxstvwbcdfrstv', 0, '', ''),
(240, 'ayaz', 'muhammadayaz.hit@gmail.com', '03335091642', '755f85c2723bb39381c7379a604160d8', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-13', '2015-08-20', 'yes', '', '4f9a1969027f64972c4c34f4f83f04d2', '0000-00-00', '0abckmnpnpqr4567vwxymnpqhjkm7890', 0, '', ''),
(241, 'Rao Shayyan', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 155678824766148, '', ''),
(242, 'ahsan', 'ahsan303@hotmail.com', '0923009444472', 'a1d511dd57cb6727436706f56be83f21', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-15', '2015-08-20', 'yes', '', '88e85bfb266256574fd57f5c9ed47eb9', '0000-00-00', '7890vwxy3456890aqrstvwxy23452345', 0, '', ''),
(243, 'samreensiddiqui', 'samreensjs@gmail.com', '03111816810', '45b2ce4bf119ff0983fa96a6fc6ab86a', 3, 28, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-08-17', '2015-08-20', 'yes', '', '649ff6cdcb5ff5ae077d5e18ae405b75', '1987-05-06', '6789dfgh0abc56783456vwxy2345xyz', 0, 'myesha', ''),
(244, 'Muhammad Abrar', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1777752942451353, '', ''),
(245, 'sadia zeb', 'sadia_zeb786@yahoo.com', '03446799009', '2ed148c291ad3a5cc7d2f196bffaa033', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-18', '2015-08-20', 'yes', '', 'c109ca2e809b872a0faf78c76af3a0cf', '0000-00-00', 'ghjk45670abcghjkwxyz890a4567hjkm', 0, '', ''),
(246, 'Maiyra Sajjad Maiyra ', 'naheedsajjad123@gmail.com', '', 'ea7c7b3f1dc4cd794d1f85271b0142a9', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-19', '2015-08-20', 'yes', '', '5455f94dcaab89ae380f318ee9d521ff', '0000-00-00', 'yzghjk1234ghjkwxyz90abjkmnnpqr', 0, '', ''),
(247, 'sajjad saeed', 'saeed_sajjad@yahoo.com', '0092 322 4498238', '1f2f3e33771e07b3045bd0ccbe2c164e', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-19', '2015-08-20', 'yes', '', '7598a318a05ade48ea5e3b2826395257', '0000-00-00', 'stvwfghjzvwxynpqrxyzyzrstv', 0, '', ''),
(248, 'Firo Murtaza', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 672462296231485, '', ''),
(249, 'Arfaa Rana', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 412018032322588, '', ''),
(250, 'phantom movie', 'faizanalam990@gmail.com', '03462373990', 'cdcddd9872bad5333b8797a91a992973', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-20', '2015-08-26', 'yes', '', 'a25445cf91ec35903d805896694fe602', '0000-00-00', 'yz2345rstvabcdjkmnvwxycdfgstvw', 0, '', ''),
(251, 'Haleem Udasi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 374308746112280, '', ''),
(252, 'dilawezkhan', 'dilawez1@yahoo.com', '', 'bd612f4c2ca5410ef8a2cce84b13d309', 0, 15, '', '', 0, 0, 0, 'Karachi', '', 'female', '2015-08-21', '2015-08-26', 'yes', '', '41f133801c8060afee8925961c640794', '2000-05-13', '0abc789090abfghj890acdfgmnpqmnpq', 0, 'dilawezkhan', ''),
(253, 'Mahmood ', 'mahmoodhasan185@email.com', '03335120609', '44ab1370eb802e0fd277ebf9be94547b', 0, 0, '', '', 0, 0, 0, '', '', '', '2015-08-21', '2015-08-26', 'yes', '', '5e682ee21fc937e4a4cd2fd90ecdb598', '0000-00-00', 'cdfgtvwxtvwx890avwxyabcd6789kmnp', 0, '', ''),
(254, 'Mahajabeen Mahmood', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 106082919746248, '', ''),
(255, 'raja', 'waqar.ahmad@fccl.com.pk', '+923005376637', '771075c270c34438bd94b585ce5070c6', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-26', '2015-08-26', 'yes', '', '6253127cb95b01fa92045cabc4848111', '0000-00-00', 'rstvbcdf5678vwxy345667893456wxyz', 0, '', ''),
(256, 'dhajjipirbhagaan1', 'dhajjipir@hotmail.com', '923335317846', '7a1cae90a08f92d3f7cd7626069ffa9c', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-26', '2015-08-27', 'yes', '', 'ba5bb7847cf7784fd378bb438fa9a743', '0000-00-00', 'dfghwxyz12347890npqr3456pqrsstvw', 0, '', ''),
(257, 'Tanwir Ahmad', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10207862252974479, '', ''),
(258, 'Ayasir Hameed', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 531105923722085, '', ''),
(259, 'AAZAN HAIDER ', 'memonasifnazeer@hotmail.com', '00923322790682', '80566fdd6ac3e5eb9aa3f12f4e4be26b', 0, 1, '', '', 0, 0, 0, 'Dadu', 'DSCN8820.JPG', 'male', '2015-08-27', '2015-08-27', 'no', '', '9a271c092d8374112f7f4a1c4a1778b1', '2014-06-04', 'qrst890axyz12340abcdfghwxyz3456', 0, 'aazan', ''),
(260, 'Sadia', 'Sadiasheikh3263@gmail.com', '03357675484', '729b3522fd8f7e3cac50da0e2a5cfcd5', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-28', '2015-08-28', 'no', '', '0e25ce3ee84dfd898ad857b56aa09a06', '0000-00-00', '6789tvwxvwxydfgh890az7890890a', 0, '', ''),
(261, 'tariq', 'tariqqazi24@yahoo.com', '03329481249', 'a9eb8abd57d0276aa8eee263ffcc9ecc', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-29', '2015-08-29', 'no', '', '141125ee93f808d98ec01ebd7afc14e7', '0000-00-00', 'mnpq6789dfgh7890dfgh4567890adfgh', 0, '', ''),
(262, 'rizwan', 'ghskuthiala10@yahoo.com', '03348037616', '9193ce3b31332b03f7d8af056c692b84', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-08-29', '2015-08-29', 'no', '', '1e7d240909cd79d1038ea4107c8f46ea', '0000-00-00', 'mnpq1234vwxyjkmndfgh90abhjkmabcd', 0, '', ''),
(263, 'Muhammad Aliyan Hassan', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 730951173699376, '', ''),
(264, 'Tahoor Fatima', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1486832904943859, '', ''),
(265, 'Alishba Rizvi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 135776633433124, '', ''),
(266, 'Rabia M Saqib', 'rabiamsaqib@gmail.com', '03332989254', 'ce8f96b4c9a3414c96f83ea6cdc73a06', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-08-31', '2015-08-31', 'no', '', '181699126d0a9879f33e30d1c6a92891', '0000-00-00', 'dfghkmnphjkm45673456pqrsqrstfghj', 0, '', ''),
(267, 'hiranoor', 'blueyes_ash@yahoo.com', '03224855139', '2af740d0b2e9cfbdc94ef0c01b1d7e54', 0, 0, '', '', 0, 0, 0, '', '', '', '2015-09-01', '2015-09-01', 'no', '', 'db331b97202246a0f2beac27b9606fbb', '0000-00-00', 'qrstabcdabcd4567tvwxzstvwghjk', 0, '', ''),
(268, 'Fahhyd', 'fahhyd@gmail.com', '4271589302', '885e0eef83e25a0d3e990286b89cc1b4', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-01', '2015-09-01', 'no', '', 'c8d2c97ba5de8d4a0d166004a001ef2e', '0000-00-00', 'rstvkmnprstvxyzdfghdfghstvwxyz', 0, '', ''),
(269, 'Kashif Khan', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10153561839428728, '', ''),
(270, 'Sadaf Raza', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1038300566180540, '', ''),
(271, 'sharez', 'sharezkhan.90@gmail.com', '03133093729', 'b2b1f1a36366fe98a2b8ac4208dd5731', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-03', '2015-09-03', 'no', '', '41c8cf4fdb37ec8d6e4e7b413826c172', '0000-00-00', '12346789yzqrst45670abcghjkabcd', 0, '', ''),
(272, 'Ismat Zaidi', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 903965779656545, '', ''),
(273, 'stephan', 'stephanrehmat@gmail.com', '00923128863910', '83bb9eca2a115d953e484e1e50d1da35', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-03', '2015-09-03', 'no', '', '0c2c426ec784604b262a71c99494740d', '0000-00-00', 'rstv5678ghjknpqr5678mnpqpqrsdfgh', 0, '', ''),
(274, 'Sheraz Khan', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 700307830102797, '', ''),
(275, 'dua', 'soon_pari2002@yahoo.com', '03217676619', '97d48ffb7e01f600313168576b7662e6', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-07', '2015-09-07', 'no', '', '6d59819c50ca3fc8627f5baf437d75bc', '0000-00-00', '90ab3456yzxyz90abfghjrstv7890', 0, '', ''),
(276, 'sabina', 'soonpari836@gmail.com', '03217676619', '97d48ffb7e01f600313168576b7662e6', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-07', '2015-09-07', 'no', '', '9df84e512a0569caa5b41a0a4f50a713', '0000-00-00', 'qrsthjkm3456pqrsz890ahjkm4567', 0, '', ''),
(277, 'Amna Samad', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 790370751074007, '', ''),
(278, 'Umbreen Naz', 'umbreennaz77@outlook.com', '03337698476', 'f184bc2191ca66b838fb947cfe1e8ab0', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-07', '2015-09-07', 'no', '', '7f31f2555857cc7d184f3d69ce379437', '0000-00-00', 'yztvwxvwxywxyzstvwzkmnp6789', 0, '', ''),
(279, 'baloch', 'irfanbaloch74@gmail.com', '03133301373', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-08', '2015-09-08', 'no', '', '7934a32791629eb326a722a48471ba4c', '0000-00-00', 'abcdghjknpqrstvwz678945673456', 0, '', ''),
(280, 'Mujtaba Haider', 'mujtaba_haider31@hotmail.com', '03225364955', '66c3c3faddfe63e22199d466cfcf8aa8', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-11', '2015-09-11', 'no', '', '5fcba6a3227a5bc14087607f68c0465e', '0000-00-00', 'ztvwxcdfgbcdf0abccdfgtvwxghjk', 0, '', ''),
(281, 'Rik Noka', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10207352820806826, '', ''),
(282, 'Zeeshan Altaf', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 10154181302861978, '', ''),
(283, 'Eshal', 'Sara_champion@hotmail.com', '03324511108', '86a0ac04dc104dbd79b3b6dd18096374', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-14', '2015-09-14', 'no', '', 'e7d3d134f6d5e638133087c9998aa50d', '0000-00-00', 'cdfgrstv0abcjkmn4567tvwxzkmnp', 0, '', ''),
(284, 'Habiba Khan', 'habiba@golive.com.pk', '923330270670', '7728127b85e41cb48d8cfcfb73b3790b', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-14', '2015-09-14', 'yes', '', '1062c320ca9c26fd5b8e1bb748e9f5fd', '0000-00-00', '0abc0abcstvw6789fghjfghjxyzdfgh', 0, '', ''),
(285, 'Asiya Jauhar', 'asiyajauhar@gmail.com', '03324134008', '8448195475c6d9cc5763df4c817d4dc3', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-15', '2015-09-15', 'no', '', '5d58505951905d2190339bdba1012edb', '0000-00-00', 'dfghyzpqrsqrst6789jkmn890a1234', 0, '', ''),
(286, 'Inshaal Zara', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1503945019899069, '', ''),
(287, 'Talib Jamal', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 1148434308519691, '', ''),
(288, 'Maaz Mateen', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 408757779334300, '', ''),
(289, 'Sundas Arif', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 432822206918109, '', ''),
(290, 'rana faisal ', 'faisalmanzoor183@yahoo.com', '03401001092', '90a1e95dba0d3d9c11e3f220cc4f7879', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-26', '2015-09-26', 'no', '', 'afa1d7700950a688a0c5f3505576de16', '0000-00-00', '0abcnpqrpqrs90ababcdmnpqpqrsghjk', 0, '', ''),
(291, 'Sadaf', 'Sohailsweetking@hotmail.com', '03002265765', '44c53cdf91464110856fed3395dbca97', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-27', '2015-09-27', 'no', '', 'f905a3158b1b7d56c99547614c927a35', '0000-00-00', 'bcdfghjk90abstvwkmnp0abcghjkfghj', 0, '', ''),
(292, 'ey', 'e22428ccf96cda9674a939c209ad1000', 'Karachi', 'sfy', 0, 0, '', '', 0, 0, 0, 'female', '', 'wtu', '2015-09-28', '2015-09-28', 'no', '', '8a974318b4be7c68fb0bf5ce9339d982', '0000-00-00', 'cdfg', 0, '', 'android_app'),
(293, 'ey', 'e22428ccf96cda9674a939c209ad1000', 'Karachi', 'sfy', 0, 0, '', '', 0, 0, 0, 'female', '', 'sty@gmai', '2015-09-28', '2015-09-28', 'no', '', '20853b936bdf29ecb527e21df5705595', '0000-00-00', 'kmnp', 0, '', 'android_app'),
(294, 'abc', '2c5f64ab07ccb3e410aa97fc09687cc3', 'Karachi', 'sgh', 0, 0, '', '', 0, 0, 0, 'female', '', 'sty@gmai', '2015-09-28', '2015-09-28', 'no', '', '18d3b385987739b68534f55a869fffc5', '0000-00-00', 'ghjk', 0, '', 'android_app'),
(295, 'abvsfg', 'a17d29a777773e0c1033bf995a9742f1', 'Karachi', 'sfh', 0, 0, '', '', 0, 0, 0, 'female', '', 'as hksfj', '2015-09-28', '2015-09-28', 'no', '', '49e94b3da58bf00015f7d7603c382d7f', '0000-00-00', 'mnpq', 0, '', 'android_app'),
(296, 'dh', '6fac3ab603bb3fb46e4277786393194c', 'Karachi', 'cb', 0, 0, '', '', 0, 0, 0, 'female', '', 'cb', '2015-09-28', '2015-09-28', 'no', '', '07b055b7fcd4ad2a583ec209d59ed5fe', '0000-00-00', 'wxyz', 0, '', 'android_app'),
(297, 'talib', 'talibjaml75@gmail.com', '03462200265', '202cb962ac59075b964b07152d234b70', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-28', '2015-09-28', 'no', '', 'dd49a65d442648a14b3ddd150c8d54f8', '0000-00-00', '67897890yz0abccdfgkmnprstvvwxy', 0, '', ''),
(298, 'ali', '202cb962ac59075b964b07152d234b70', 'Karachi', 'com', 0, 0, '', '', 0, 0, 0, 'female', '', 'ali.ali@', '2015-09-28', '2015-09-28', 'no', '', '27692ad5694dff1a427af2c87e36b5db', '0000-00-00', 'xyz', 0, '', 'android_app'),
(299, 'muneba', '202cb962ac59075b964b07152d234b70', 'Karachi', '134', 0, 0, '', '', 0, 0, 0, 'female', '', 'muneba.a', '2015-09-28', '2015-09-28', 'no', '', 'd14ba19108c3fc0643ede5ea7d0ea2bd', '0000-00-00', 'bcdf', 0, '', 'android_app'),
(300, 'abc', '827ccb0eea8a706c4c34a16891f84e7b', 'Karachi', '12234', 0, 0, '', '', 0, 0, 0, 'female', '', 'abc@gmai', '2015-09-28', '2015-09-28', 'no', '', '4f4a841107f5673324587b10815d5826', '0000-00-00', '890a', 0, '', 'android_app'),
(301, 'abc', '827ccb0eea8a706c4c34a16891f84e7b', 'Karachi', '12234', 0, 0, '', '', 0, 0, 0, 'female', '', 'abc@gmai', '2015-09-28', '2015-09-28', 'no', '', '5b0ea1293df41ae541713ec67f8e081e', '0000-00-00', 'stvw', 0, '', 'android_app'),
(302, 'jinah', '202cb962ac59075b964b07152d234b70', 'Karachi', '1256', 0, 0, '', '', 0, 0, 0, 'female', '', 'jinah@gm', '2015-09-28', '2015-09-28', 'no', '', '595b7b5597714ab27291dfdf8951b9f1', '0000-00-00', '0abc', 0, '', 'android_app'),
(303, 'muneeba', 'muneba.ashfaq@gmail.com', '03462200265', '202cb962ac59075b964b07152d234b70', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-09-28', '2015-09-28', 'no', '', 'f78f10224ede8716ba107eb753c56d2c', '0000-00-00', 'wxyz2345stvwnpqr6789wxyzfghjghjk', 0, '', ''),
(304, '12', '12@gmail.com', '03462200265', '202cb962ac59075b964b07152d234b70', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-09-28', '2015-09-28', 'no', '', '9df3e6e09b94fcca2e68b670de877eba', '0000-00-00', 'cdfgfghjnpqrmnpqbcdffghj34560abc', 0, '', ''),
(305, 'ali', '7815696ecbf1c96e6894b779456d330e', 'karachi', '0965325', 0, 0, '', '', 0, 0, 0, 'Male', '', 'mune@gma', '2015-09-30', '2015-09-30', 'no', '', '7d3313d4ece5e5c119fa9db7647fdbe8', '0000-00-00', '2345', 0, '', 'android_app'),
(306, 'mun', '7815696ecbf1c96e6894b779456d330e', 'ksfgh', '08055436', 0, 0, '', '', 0, 0, 0, 'Male', '', 'munre@gm', '2015-09-30', '2015-09-30', 'no', '', 'ef8f4287f7a7c17469303ab1a5358eeb', '0000-00-00', 'npqr', 0, '', 'android_app'),
(307, 'ay', 'dfcc9dca8ed7aa668e1dcc2996455191', 'dhjc', '458585', 0, 0, '', '', 0, 0, 0, 'Male', '', 'zg', '2015-09-30', '2015-09-30', 'no', '', '4cd7066337a6a20a0479150d45024bf8', '0000-00-00', '7890', 0, '', 'android_app'),
(308, 'ay', 'dfcc9dca8ed7aa668e1dcc2996455191', 'dhjc', '458585', 0, 0, '', '', 0, 0, 0, 'Male', '', 'zg', '2015-09-30', '2015-09-30', 'no', '', '58c86ae5ebef8b389a71bb4b8c284caa', '0000-00-00', '4567', 0, '', 'android_app'),
(309, 'yd', '1e9582d0218a34b09caef2d8b5a9800b', 'xhcjg', '979', 0, 0, '', '', 0, 0, 0, 'Male', '', 'zhjff', '2015-09-30', '2015-09-30', 'no', '', '37f3163324a97353c8df85ab0057965f', '0000-00-00', 'fghj', 0, '', 'android_app'),
(310, 'wyfhg', 'd0569b3eb307bb3d482bb593a6fa4638', 'jfksy', '38686', 0, 0, '', '', 0, 0, 0, 'Male', '', 'dhv', '2015-09-30', '2015-09-30', 'no', '', '2192e79f0305934df13e36c4e612c813', '0000-00-00', 'tvwx', 0, '', 'android_app'),
(311, 'dhdh', '321df4247bb11639ea088c03fa3995fb', 'at hjfsfg', '78', 0, 0, '', '', 0, 0, 0, 'Female', '', 'dgb', '2015-09-30', '2015-09-30', 'no', '', '24ebb6606ad6a899b680397cb5e53e3a', '0000-00-00', 'cdfg', 0, '', 'android_app'),
(312, 'ydjf', '35d5746a8dc5c1491b7e9ac1d4d8a99b', 'fghh', '8865652', 0, 0, '', '', 0, 0, 0, 'Female', '', 'gxhv', '2015-09-30', '2015-09-30', 'no', '', 'bdfb512d2fd4c724c53152b1690815dd', '0000-00-00', '0abc', 0, '', 'android_app'),
(313, 'sarach', '202cb962ac59075b964b07152d234b70', 'karachi', '088523669', 0, 0, '', '', 0, 0, 0, 'Female', '', 'sarah@gm', '2015-10-01', '2015-10-01', 'no', '', 'e2974f215a52f9708135caef7a7c5aeb', '0000-00-00', 'hjkm', 0, 'sarah', 'android_app'),
(314, 'sarach', '202cb962ac59075b964b07152d234b70', 'karachi', '088523669', 0, 0, '', '', 0, 0, 0, 'Female', '', 'sarah@gm', '2015-10-01', '2015-10-01', 'no', '', '4f364954ecdfee47e1f04db00c9d9141', '0000-00-00', 'cdfg', 0, 'sarah', 'android_app'),
(315, 'ali', '202cb962ac59075b964b07152d234b70', 'karach', '08523369', 0, 0, '', '', 0, 0, 0, 'Male', '', 'ali@gmai', '2015-10-01', '2015-10-01', 'no', '', '3a226ff866ebd2b5cfd825abccd2ebf1', '0000-00-00', 'fghj', 0, 'ali', 'android_app'),
(316, 'ali', '202cb962ac59075b964b07152d234b70', 'karach', '08523369', 0, 0, '', '', 0, 0, 0, 'Male', '', 'ali@gmai', '2015-10-01', '2015-10-01', 'no', '', '88dafca9332a4957ba8a5b2abadde03f', '0000-00-00', 'cdfg', 0, 'ali', 'android_app'),
(317, 'ali', '202cb962ac59075b964b07152d234b70', 'karach', '08523369', 0, 0, '', '', 0, 0, 0, 'Male', '', 'ali@gmai', '2015-10-01', '2015-10-01', 'no', '', '9ee394e8c9420de30f6d01c92e07ebff', '0000-00-00', 'ghjk', 0, 'ali', 'android_app'),
(318, 'ali', '202cb962ac59075b964b07152d234b70', 'karach', '08523369', 0, 0, '', '', 0, 0, 0, 'Male', '', 'ali@gmai', '2015-10-01', '2015-10-01', 'no', '', 'c94fbb3747c78023a9ece29e2241d682', '0000-00-00', 'rstv', 0, 'ali', 'android_app'),
(319, 'ali', '202cb962ac59075b964b07152d234b70', 'karach', '08523369', 0, 0, '', '', 0, 0, 0, 'Male', '', 'ali@gmai', '2015-10-01', '2015-10-01', 'no', '', '27a6804ea872e1577c8245d0b0c1950c', '0000-00-00', 'dfgh', 0, 'ali', 'android_app'),
(320, 'fauzia', 'fauziakhalid.mughal@gmail.com', '03110022669', 'fd9c833cf6addc0b145db2216210e9ef', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-10-03', '2015-10-03', 'no', '', '38e574da0282ad9bf0593f3cd94fbc7a', '0000-00-00', 'kmnp0abc3456tvwxstvwkmnphjkm2345', 0, '', ''),
(321, 'Riaz Ali', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 148895022127215, '', ''),
(322, 'abubakar', 'sidrashaheen331@yahoo.com', '0321456678', '34d302424ba0733ebaa8327fb13f12e8', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-10-03', '2015-10-03', 'no', '', '6319281bc914d9b899606b74a9344e15', '0000-00-00', 'z890ayzstvwqrsttvwxbcdfghjk', 0, '', ''),
(323, 'Amna Shah Yashkuen', '', '', '', 0, 0, '', '', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00', '', '', NULL, '0000-00-00', '', 848741101908605, '', ''),
(324, 'RAJA ADNAN AFZAL', 'adnanraja08@yahoo.com', '03335131807', 'f87dfc65207aa9200a5a32590249c1c2', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-10-04', '2015-10-04', 'no', '', 'df1d95131c185ae20b8cf6aa0311376c', '0000-00-00', 'stvw3456hjkm890ahjkmstvwkmnp2345', 0, '', ''),
(325, 'nafis790@hotmail.com', 'NAFIS790@HOTMAIL.COM', '9202136677260', '19cc88435de70ba35d80908c62aa06dc', 0, 0, '', '', 0, 0, 0, '', '', 'male', '2015-10-04', '2015-10-04', 'no', '', '07230d6f96310d3becf9834aded2ed20', '0000-00-00', 'pqrsvwxyxyz5678wxyzz23454567', 0, '', ''),
(326, 'AyeshaAbbas', 'abbas.ayesha28@gmail.com', '', '2f48cfb5049cb87667a775b9e8f2beef', 0, 0, '', '', 0, 0, 0, '', '', 'female', '2015-10-04', '2015-10-04', 'no', '', 'd8259ec05271b607598eaa1a656c616c', '0000-00-00', 'dfgh890a12346789jkmn1234bcdf4567', 0, '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_topic_comments` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `momsubforum`
--
ALTER TABLE `momsubforum`
  ADD CONSTRAINT `FK_momsubforum` FOREIGN KEY (`mom_forum_id`) REFERENCES `momforum` (`mom_forum_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
