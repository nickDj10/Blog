-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 10:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(19, 'cat_one'),
(20, 'cat_two'),
(21, 'cat_three'),
(22, 'cat_four'),
(23, 'cat_five');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(9, 60, 'Example', 'email@email', 'This is my comment!', 'approved', '2023-01-06'),
(10, 60, 'example', 'email@email', 'Second comment on this post!', 'approved', '2023-01-06'),
(11, 63, 'User', 'user@email', 'This is first comment on this post!', 'approved', '2023-01-06'),
(12, 62, 'User', 'user@email', 'Comment', 'approved', '2023-01-06'),
(13, 61, 'User', 'user@email', 'Comment\r\n', 'unapproved', '2023-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_author_id` int(3) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_author_id`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(60, 19, 'Title One', 'John Doe', 12, '2023-01-06', 'image_one.jpg', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-size: 14px; font-family: Helvetica;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu vulputate neque. Nam dapibus elit in tortor suscipit, eget fermentum diam dictum. Vivamus dictum lorem vel metus consequat ullamcorper. Nam et dapibus lacus. Quisque et congue enim. Integer non elit risus. Etiam id sagittis urna. Aenean laoreet dui id orci pretium feugiat. Phasellus iaculis, quam quis malesuada rhoncus, quam velit sodales tortor, sed iaculis nisl turpis id odio. Aenean viverra ut ex nec elementum. Aliquam sagittis magna nec velit semper tempus.</span></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><u>Aenean pharetra, urna quis tempor auctor, risus lorem commodo mi, ut consectetur purus turpis condimentum libero. Vestibulum ligula neque, cursus vel luctus eu, vehicula ac neque. Aliquam pulvinar ultricies condimentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras porttitor tempor ligula eget tempus. Vivamus sit amet sodales lacus. Vestibulum ultricies, quam et varius faucibus, arcu est lobortis purus, quis pellentesque tortor metus in ante. Quisque ac elementum diam.</u></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Morbi aliquam fermentum nulla, sed commodo nisi dignissim maximus. Suspendisse potenti. Nam dapibus ex lacus, et eleifend odio luctus ut. Cras non dolor nisl. Suspendisse potenti. Nulla lorem massa, accumsan in elit eu, imperdiet scelerisque libero. Sed molestie nisi nulla, quis gravida diam finibus ac. Aliquam cursus nunc et lorem ullamcorper, at ultrices dui suscipit. Vivamus ultricies dolor in sollicitudin pharetra. Morbi sit amet libero eu mauris porta fermentum. Proin fermentum ultrices lacus. Nunc eu justo quis elit maximus volutpat eget sit amet justo. Maecenas ultrices magna quis velit porttitor, non dignissim nunc laoreet.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><span style=\"font-family: \" courier=\"\" new\";\"=\"\">Maecenas accumsan vel lacus ut facilisis. Maecenas vitae risus ac ante consectetur aliquam. Ut rutrum, orci eget consequat molestie, ipsum tortor maximus lectus, vel pulvinar nunc sapien ac tortor. Integer dolor velit, luctus sit amet lacinia vel, laoreet ac sem. Fusce vehicula posuere lectus, quis interdum arcu tristique quis. Phasellus imperdiet, dolor sit amet sollicitudin finibus, magna nisl blandit elit, eget tempor magna libero luctus orci. Aliquam a nibh in quam congue pellentesque sed non sapien. Sed eget velit nunc.</span></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Aenean scelerisque vel eros non ultricies. Sed dapibus dapibus luctus. Integer egestas nisl vel diam sodales pretium. Fusce pulvinar enim euismod risus feugiat tristique. Duis et massa at nulla accumsan luctus vel at turpis. Vivamus scelerisque sem nec mi ultricies, in varius risus ultrices. Donec euismod semper pretium. Nunc ornare interdum mi et finibus. Duis nunc leo, vestibulum vitae dolor ac, porta lobortis urna. Fusce facilisis orci ut massa vulputate dignissim. Nulla tempus, orci et facilisis efficitur, elit lorem dictum sapien, et lobortis turpis felis vitae lorem.</p>', 'tag, one, post', 0, 'published'),
(61, 20, 'Title Two', 'Chris Clifford', 13, '2023-01-06', 'image_two.jpg', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum justo nibh, cursus in tellus venenatis, porta posuere tortor. In maximus aliquam scelerisque. Donec placerat, elit eget accumsan blandit, massa velit cursus massa, eget fermentum turpis nunc eget tellus. Proin dapibus, ipsum id vehicula venenatis, dolor mi iaculis metus, et tincidunt orci risus sit amet nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean pretium neque et ultricies aliquam. Ut sit amet lacinia urna, ut consectetur tortor. Mauris id congue erat. Fusce viverra feugiat nunc ac malesuada. Morbi sed lorem porta, sollicitudin ligula ac, vehicula elit. Pellentesque finibus semper rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Cras semper tincidunt velit placerat dapibus. Vestibulum ut massa porttitor, mattis sem at, porttitor odio. Nam quis pretium felis. Praesent consequat urna nisi, vitae dictum tortor mollis a. Cras mattis mi eget felis porta sollicitudin. In sollicitudin enim neque, et hendrerit orci interdum in. Cras sit amet ipsum pellentesque, ornare turpis id, pulvinar diam. Vestibulum metus dui, sodales vel nibh sed, convallis venenatis diam. Mauris fringilla justo vel nulla volutpat, quis mollis orci accumsan. Nunc a justo imperdiet, suscipit arcu non, feugiat nisi. Integer feugiat nec diam a tempor. Nunc posuere fermentum lectus, vitae gravida lectus ornare ullamcorper. Vivamus pellentesque hendrerit finibus. Mauris elementum enim nec sapien eleifend, et consectetur metus lobortis. Sed vel quam ligula. Nullam gravida quam in dolor imperdiet maximus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Sed auctor eu odio quis ornare. Curabitur eget risus in magna consectetur fermentum. Ut ullamcorper feugiat molestie. In felis diam, ornare ut tortor nec, tristique auctor nisl. Nam dui felis, finibus in maximus id, aliquet non lectus. Fusce semper ligula vel facilisis auctor. Aliquam dictum enim est, nec blandit ipsum imperdiet sit amet. Duis porttitor ipsum quis mauris fermentum volutpat. Sed sit amet ante lorem.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Quisque quis nibh odio. Maecenas a felis nec tellus porta congue vitae a mauris. Donec id tristique tellus, eu varius arcu. Maecenas est ligula, suscipit id pellentesque a, viverra at sapien. Maecenas fermentum leo sit amet risus consequat malesuada. Donec hendrerit, nibh vitae sodales eleifend, sapien orci auctor leo, et rutrum enim nisl et augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum gravida dapibus libero eu tincidunt. Aliquam erat volutpat. Mauris vel dolor non odio dictum blandit auctor quis velit.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Nam eu nisl lobortis, tristique mauris eget, placerat arcu. Morbi sollicitudin, elit eu iaculis ullamcorper, metus arcu euismod magna, dictum faucibus tellus massa et risus. Donec dapibus vulputate leo. Integer sed ante eu nulla viverra maximus a non velit. Aliquam ornare egestas orci ac consequat. Nullam vel mi id risus pretium rhoncus non blandit nibh. Nullam nec malesuada velit, eget iaculis velit. Proin in eros dictum, pellentesque elit nec, mollis lectus. Pellentesque nulla urna, mattis non metus nec, lacinia elementum massa. Nam dapibus, sapien sit amet auctor pellentesque, nunc nisi tempus leo, nec iaculis erat enim eu lectus. Praesent vel ligula enim. Mauris scelerisque tellus eget nibh efficitur volutpat.</p>', 'post, two ,tag', 0, 'published'),
(62, 21, 'Title Three', 'Brad Vader', 14, '2023-01-06', 'image_five.jpg', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum justo nibh, cursus in tellus venenatis, porta posuere tortor. In maximus aliquam scelerisque. Donec placerat, elit eget accumsan blandit, massa velit cursus massa, eget fermentum turpis nunc eget tellus. Proin dapibus, ipsum id vehicula venenatis, dolor mi iaculis metus, et tincidunt orci risus sit amet nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean pretium neque et ultricies aliquam. Ut sit amet lacinia urna, ut consectetur tortor. Mauris id congue erat. Fusce viverra feugiat nunc ac malesuada. Morbi sed lorem porta, sollicitudin ligula ac, vehicula elit. Pellentesque finibus semper rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Cras semper tincidunt velit placerat dapibus. Vestibulum ut massa porttitor, mattis sem at, porttitor odio. Nam quis pretium felis. Praesent consequat urna nisi, vitae dictum tortor mollis a. Cras mattis mi eget felis porta sollicitudin. In sollicitudin enim neque, et hendrerit orci interdum in. Cras sit amet ipsum pellentesque, ornare turpis id, pulvinar diam. Vestibulum metus dui, sodales vel nibh sed, convallis venenatis diam. Mauris fringilla justo vel nulla volutpat, quis mollis orci accumsan. Nunc a justo imperdiet, suscipit arcu non, feugiat nisi. Integer feugiat nec diam a tempor. Nunc posuere fermentum lectus, vitae gravida lectus ornare ullamcorper. Vivamus pellentesque hendrerit finibus. Mauris elementum enim nec sapien eleifend, et consectetur metus lobortis. Sed vel quam ligula. Nullam gravida quam in dolor imperdiet maximus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Sed auctor eu odio quis ornare. Curabitur eget risus in magna consectetur fermentum. Ut ullamcorper feugiat molestie. In felis diam, ornare ut tortor nec, tristique auctor nisl. Nam dui felis, finibus in maximus id, aliquet non lectus. Fusce semper ligula vel facilisis auctor. Aliquam dictum enim est, nec blandit ipsum imperdiet sit amet. Duis porttitor ipsum quis mauris fermentum volutpat. Sed sit amet ante lorem.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Quisque quis nibh odio. Maecenas a felis nec tellus porta congue vitae a mauris. Donec id tristique tellus, eu varius arcu. Maecenas est ligula, suscipit id pellentesque a, viverra at sapien. Maecenas fermentum leo sit amet risus consequat malesuada. Donec hendrerit, nibh vitae sodales eleifend, sapien orci auctor leo, et rutrum enim nisl et augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum gravida dapibus libero eu tincidunt. Aliquam erat volutpat. Mauris vel dolor non odio dictum blandit auctor quis velit.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Nam eu nisl lobortis, tristique mauris eget, placerat arcu. Morbi sollicitudin, elit eu iaculis ullamcorper, metus arcu euismod magna, dictum faucibus tellus massa et risus. Donec dapibus vulputate leo. Integer sed ante eu nulla viverra maximus a non velit. Aliquam ornare egestas orci ac consequat. Nullam vel mi id risus pretium rhoncus non blandit nibh. Nullam nec malesuada velit, eget iaculis velit. Proin in eros dictum, pellentesque elit nec, mollis lectus. Pellentesque nulla urna, mattis non metus nec, lacinia elementum massa. Nam dapibus, sapien sit amet auctor pellentesque, nunc nisi tempus leo, nec iaculis erat enim eu lectus. Praesent vel ligula enim. Mauris scelerisque tellus eget nibh efficitur volutpat.</p>', 'tag, three, post', 0, 'published'),
(63, 23, 'Title Four', 'Reginald Gump', 15, '2023-01-06', 'image_four.jpg', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum justo nibh, cursus in tellus venenatis, porta posuere tortor. In maximus aliquam scelerisque. Donec placerat, elit eget accumsan blandit, massa velit cursus massa, eget fermentum turpis nunc eget tellus. Proin dapibus, ipsum id vehicula venenatis, dolor mi iaculis metus, et tincidunt orci risus sit amet nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean pretium neque et ultricies aliquam. Ut sit amet lacinia urna, ut consectetur tortor. Mauris id congue erat. Fusce viverra feugiat nunc ac malesuada. Morbi sed lorem porta, sollicitudin ligula ac, vehicula elit. Pellentesque finibus semper rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Cras semper tincidunt velit placerat dapibus. Vestibulum ut massa porttitor, mattis sem at, porttitor odio. Nam quis pretium felis. Praesent consequat urna nisi, vitae dictum tortor mollis a. Cras mattis mi eget felis porta sollicitudin. In sollicitudin enim neque, et hendrerit orci interdum in. Cras sit amet ipsum pellentesque, ornare turpis id, pulvinar diam. Vestibulum metus dui, sodales vel nibh sed, convallis venenatis diam. Mauris fringilla justo vel nulla volutpat, quis mollis orci accumsan. Nunc a justo imperdiet, suscipit arcu non, feugiat nisi. Integer feugiat nec diam a tempor. Nunc posuere fermentum lectus, vitae gravida lectus ornare ullamcorper. Vivamus pellentesque hendrerit finibus. Mauris elementum enim nec sapien eleifend, et consectetur metus lobortis. Sed vel quam ligula. Nullam gravida quam in dolor imperdiet maximus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Sed auctor eu odio quis ornare. Curabitur eget risus in magna consectetur fermentum. Ut ullamcorper feugiat molestie. In felis diam, ornare ut tortor nec, tristique auctor nisl. Nam dui felis, finibus in maximus id, aliquet non lectus. Fusce semper ligula vel facilisis auctor. Aliquam dictum enim est, nec blandit ipsum imperdiet sit amet. Duis porttitor ipsum quis mauris fermentum volutpat. Sed sit amet ante lorem.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Quisque quis nibh odio. Maecenas a felis nec tellus porta congue vitae a mauris. Donec id tristique tellus, eu varius arcu. Maecenas est ligula, suscipit id pellentesque a, viverra at sapien. Maecenas fermentum leo sit amet risus consequat malesuada. Donec hendrerit, nibh vitae sodales eleifend, sapien orci auctor leo, et rutrum enim nisl et augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum gravida dapibus libero eu tincidunt. Aliquam erat volutpat. Mauris vel dolor non odio dictum blandit auctor quis velit.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Nam eu nisl lobortis, tristique mauris eget, placerat arcu. Morbi sollicitudin, elit eu iaculis ullamcorper, metus arcu euismod magna, dictum faucibus tellus massa et risus. Donec dapibus vulputate leo. Integer sed ante eu nulla viverra maximus a non velit. Aliquam ornare egestas orci ac consequat. Nullam vel mi id risus pretium rhoncus non blandit nibh. Nullam nec malesuada velit, eget iaculis velit. Proin in eros dictum, pellentesque elit nec, mollis lectus. Pellentesque nulla urna, mattis non metus nec, lacinia elementum massa. Nam dapibus, sapien sit amet auctor pellentesque, nunc nisi tempus leo, nec iaculis erat enim eu lectus. Praesent vel ligula enim. Mauris scelerisque tellus eget nibh efficitur volutpat.</p>', 'four, blog, post', 0, 'published'),
(64, 22, 'Title Five', 'Admin Admin', 11, '2023-01-06', 'image_two.jpg', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum justo nibh, cursus in tellus venenatis, porta posuere tortor. In maximus aliquam scelerisque. Donec placerat, elit eget accumsan blandit, massa velit cursus massa, eget fermentum turpis nunc eget tellus. Proin dapibus, ipsum id vehicula venenatis, dolor mi iaculis metus, et tincidunt orci risus sit amet nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean pretium neque et ultricies aliquam. Ut sit amet lacinia urna, ut consectetur tortor. Mauris id congue erat. Fusce viverra feugiat nunc ac malesuada. Morbi sed lorem porta, sollicitudin ligula ac, vehicula elit. Pellentesque finibus semper rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Cras semper tincidunt velit placerat dapibus. Vestibulum ut massa porttitor, mattis sem at, porttitor odio. Nam quis pretium felis. Praesent consequat urna nisi, vitae dictum tortor mollis a. Cras mattis mi eget felis porta sollicitudin. In sollicitudin enim neque, et hendrerit orci interdum in. Cras sit amet ipsum pellentesque, ornare turpis id, pulvinar diam. Vestibulum metus dui, sodales vel nibh sed, convallis venenatis diam. Mauris fringilla justo vel nulla volutpat, quis mollis orci accumsan. Nunc a justo imperdiet, suscipit arcu non, feugiat nisi. Integer feugiat nec diam a tempor. Nunc posuere fermentum lectus, vitae gravida lectus ornare ullamcorper. Vivamus pellentesque hendrerit finibus. Mauris elementum enim nec sapien eleifend, et consectetur metus lobortis. Sed vel quam ligula. Nullam gravida quam in dolor imperdiet maximus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Sed auctor eu odio quis ornare. Curabitur eget risus in magna consectetur fermentum. Ut ullamcorper feugiat molestie. In felis diam, ornare ut tortor nec, tristique auctor nisl. Nam dui felis, finibus in maximus id, aliquet non lectus. Fusce semper ligula vel facilisis auctor. Aliquam dictum enim est, nec blandit ipsum imperdiet sit amet. Duis porttitor ipsum quis mauris fermentum volutpat. Sed sit amet ante lorem.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Quisque quis nibh odio. Maecenas a felis nec tellus porta congue vitae a mauris. Donec id tristique tellus, eu varius arcu. Maecenas est ligula, suscipit id pellentesque a, viverra at sapien. Maecenas fermentum leo sit amet risus consequat malesuada. Donec hendrerit, nibh vitae sodales eleifend, sapien orci auctor leo, et rutrum enim nisl et augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum gravida dapibus libero eu tincidunt. Aliquam erat volutpat. Mauris vel dolor non odio dictum blandit auctor quis velit.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Nam eu nisl lobortis, tristique mauris eget, placerat arcu. Morbi sollicitudin, elit eu iaculis ullamcorper, metus arcu euismod magna, dictum faucibus tellus massa et risus. Donec dapibus vulputate leo. Integer sed ante eu nulla viverra maximus a non velit. Aliquam ornare egestas orci ac consequat. Nullam vel mi id risus pretium rhoncus non blandit nibh. Nullam nec malesuada velit, eget iaculis velit. Proin in eros dictum, pellentesque elit nec, mollis lectus. Pellentesque nulla urna, mattis non metus nec, lacinia elementum massa. Nam dapibus, sapien sit amet auctor pellentesque, nunc nisi tempus leo, nec iaculis erat enim eu lectus. Praesent vel ligula enim. Mauris scelerisque tellus eget nibh efficitur volutpat.</p>', 'tag, post, admin', 0, 'drafted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`, `user_image`) VALUES
(11, 'admin', 'admin', 'Admin', 'Admin', 'admin@admin', 'admin', ''),
(12, 'johnd', '12345', 'John', 'Doe', 'someone@example', 'subscriber', ''),
(13, 'chris', '12345', 'Chris', 'Clifford', 'someone@example', 'subscriber', ''),
(14, 'bradV', '12345', 'Brad', 'Vader', 'someone@example', 'subscriber', ''),
(15, 'regG', '12345', 'Reginald', 'Gump', 'someone@example', 'subscriber', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
