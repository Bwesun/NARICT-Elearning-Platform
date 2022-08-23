CREATE TABLE `admin` (
  `id` int(3) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`id`, `username`, `password`) VALUES 
(1, 'admin', 'admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `course_contents`
-- 

CREATE TABLE `course_contents` (
  `id` int(4) NOT NULL auto_increment,
  `course_id` int(4) NOT NULL,
  `content_title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `course_contents`
-- 

INSERT INTO `course_contents` (`id`, `course_id`, `content_title`, `content`, `file_type`) VALUES 
(4, 5, 'BASIC Basics', '0a9ce59dcc5c439c8b442695683cc2ef.mp4', 'video'),
(6, 1, 'Overview of Java', '0a9ce59dcc5c439c8b442695683cc2ef.mp4', 'video'),
(10, 5, 'Overview of QBASIC Programming', '1..Happy & you know.mp4', 'video'),
(13, 3, 'Intro to C++', '1..Happy & you know.mp4', 'video'),
(15, 6, 'Overview of Python Programming', 'b14e3e0497ef4c81a68c4c750e20d002.mp4', 'video'),
(16, 4, 'History of Java Programming', '0a9ce59dcc5c439c8b442695683cc2ef.mp4', 'video'),
(17, 4, 'Android Intro2', '5 Foolproof Ways to Spot a Liar.3gp', 'video'),
(18, 4, 'Overview of C++', '65a4076175984d51b4c5b5876c49777b.mp4', 'video'),
(19, 4, 'Introduction to Python Programming', 'Eddie_Murphy_-_Red_Light__ft._Snoop_Lion_(Official_Video)(144p).mp4', 'video');

-- --------------------------------------------------------

-- 
-- Table structure for table `course_questions`
-- 

CREATE TABLE `course_questions` (
  `id` int(6) NOT NULL auto_increment,
  `question` varchar(200) NOT NULL,
  `course_title` varchar(200) NOT NULL,
  `course_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `course_questions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `courses`
-- 

CREATE TABLE `courses` (
  `id` int(5) NOT NULL auto_increment,
  `course_title` varchar(300) NOT NULL,
  `course_description` varchar(500) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `courses`
-- 

INSERT INTO `courses` (`id`, `course_title`, `course_description`, `pic`) VALUES 
(3, 'Introduction to C++ Programming', ' Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik vv Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik vv Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik Desvropjoik vv Desvropjoik Desvropjoi', '15894331_1831706257070352_2935968616420076059_n.jpg'),
(4, 'Introduction to Java Programming', 'Java programming description', '10750056_839892096034134_8889874697787345324_o.png');

-- --------------------------------------------------------

-- 
-- Table structure for table `enrolled_courses`
-- 

CREATE TABLE `enrolled_courses` (
  `id` int(4) NOT NULL auto_increment,
  `course_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `enrolled_courses`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `staff`
-- 

CREATE TABLE `staff` (
  `id` int(3) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `staff`
-- 

INSERT INTO `staff` (`id`, `name`, `username`, `password`) VALUES 
(2, 'Blessing Ado Ajala', 'Blessing', 'blessing'),
(5, 'Benjamin Haruna Bala', 'benjamin', 'benjamin'),
(6, 'Matur Innocent Joshua', 'innocent', '1111');

-- --------------------------------------------------------

-- 
-- Table structure for table `subject_contents`
-- 

CREATE TABLE `subject_contents` (
  `id` int(4) NOT NULL auto_increment,
  `subject_id` int(4) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- 
-- Dumping data for table `subject_contents`
-- 

INSERT INTO `subject_contents` (`id`, `subject_id`, `subject_title`, `content`, `file_type`) VALUES 
(21, 2, 'Geometry', 'And we will neva setting for less.mp4', 'video'),
(22, 2, 'Functions', 'doWhile.mp4', 'video'),
(23, 4, 'Architectural Drawing', '9bcc418db7e94b889c55fd9499756fb0.mp4', 'document'),
(24, 5, 'Circle Geometry', 'Delta-Objects-Objects.pdf', 'document'),
(25, 1, 'Art Dreawing', '9bcc418db7e94b889c55fd9499756fb0.mp4', 'video'),
(26, 1, 'Document', '4yrPolyConduct2003.pdf', 'document'),
(27, 5, 'Shape Geometry', '4yrPolyConduct2003.pdf', 'document'),
(29, 7, 'Circle Geometry', 'Control-Flow.pdf', 'document');

-- --------------------------------------------------------

-- 
-- Table structure for table `subjects`
-- 

CREATE TABLE `subjects` (
  `id` int(4) NOT NULL auto_increment,
  `subject_title` varchar(30) NOT NULL,
  `subject_description` longtext NOT NULL,
  `level` varchar(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `subjects`
-- 

INSERT INTO `subjects` (`id`, `subject_title`, `subject_description`, `level`) VALUES 
(1, 'Basic Tech', 'Description on Basic Technology', 'js2'),
(2, 'Mathematics', 'Description on MAthematics', 'js1'),
(3, 'Functions', 'Descrklnljknsfd. hjksksk my madina ', 'js1'),
(4, 'Basic Tech', 'Description', 'js1'),
(5, 'Further Mathematics', 'All Sort of Advanced mathematics for the Senior Secondary School Students', 'ss1'),
(6, 'Further Mathematics', 'Description', 'ss2'),
(7, 'Mathematics', 'Desc;oih/jkafc', 'ss1');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `class` varchar(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `username`, `fullname`, `gender`, `phone`, `email`, `address`, `password`, `class`) VALUES 
(1, 'Blessing', 'Blessing Ado Ajala', 'Female', '09063334420', 'blessing@gmail.com', 'NILEST, Zaria', 'blessing', 'ss1'),
(2, 'innocent', 'Aliyu Hassan Ibrahim', 'Male', '09063334420', 'maturinnocent@gmail.com', 'kuyfgkhj', '1111', 'ss2');
