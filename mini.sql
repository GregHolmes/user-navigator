SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Table structure for table `tbl_connections`
--

CREATE TABLE `tbl_connections` (
  `connection_id` int(11) NOT NULL,
  `uid` int(20) NOT NULL,
  `friend_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_connections`
--

INSERT INTO `tbl_connections` (`connection_id`, `uid`, `friend_id`) VALUES
(8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_time` datetime NOT NULL,
  `event_desc` varchar(500) NOT NULL,
  `event_location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `uid`, `event_name`, `event_time`, `event_desc`, `event_location`) VALUES
(1, 1, 'dsgdg', '2016-07-06 22:44:00', 'awesome place', 'Karimannoor, Kerala, India');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_im`
--

CREATE TABLE `tbl_im` (
  `im_id` int(11) NOT NULL,
  `sender` int(20) NOT NULL,
  `receiver` int(20) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_im`
--

INSERT INTO `tbl_im` (`im_id`, `sender`, `receiver`, `message`, `datetime`) VALUES
(11, 1, 1, 'hi there', '2016-04-25 08:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_markers`
--

CREATE TABLE `tbl_markers` (
  `marker_id` int(11) NOT NULL,
  `uid` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `info` text NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `added_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_polylines`
--

CREATE TABLE `tbl_polylines` (
  `polyline_id` int(11) NOT NULL,
  `uid` int(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `encoded_path` text NOT NULL,
  `color` varchar(200) NOT NULL DEFAULT 'blue',
  `alert` varchar(200) NOT NULL DEFAULT 'success',
  `weight` int(11) NOT NULL DEFAULT '2',
  `dashed` int(11) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_polylines`
--

INSERT INTO `tbl_polylines` (`polyline_id`, `uid`, `type`, `title`, `description`, `encoded_path`, `color`, `alert`, `weight`, `dashed`, `timestamp`) VALUES
(1, 1, 'accprone', 'Accident Area', 'Accident #area #warning', 'qfl{@offsMx@yN}GaRqIkO', 'red', 'danger', 7, 1, '2016-04-17 18:24:57'),
(4, 2, 'unmetalled', 'Unmetalled Area', 'Unmetalled Area #Unmetalled Area #Warning #Go_Slow', 'ovj{@ynfsMzE?`DwBrFN', 'green', 'warning', 12, 0, '2016-04-17 18:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `review_id` int(11) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(100) DEFAULT NULL,
  `info` text NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`review_id`, `lat`, `lng`, `info`, `uid`, `time`) VALUES
(6, '9.8929802', '76.72210819999998', 'Awesome Place ', 1, '2016-04-25 06:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `uid` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `username` varchar(10) NOT NULL,
  `user_gender` varchar(10) NOT NULL DEFAULT 'Male',
  `user_birthday` date NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0',
  `phone` varchar(25) NOT NULL DEFAULT 'N/A',
  `facebook` varchar(150) NOT NULL DEFAULT 'N/A',
  `twitter` varchar(150) NOT NULL DEFAULT 'N/A',
  `skype` varchar(150) NOT NULL DEFAULT 'N/A',
  `user_email` varchar(60) NOT NULL DEFAULT 'N/A',
  `password` varchar(100) NOT NULL,
  `avatar` varchar(40) NOT NULL DEFAULT 'avatar.png',
  `online_status` tinyint(1) NOT NULL DEFAULT '0',
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`uid`, `first_name`, `last_name`, `full_name`, `username`, `user_gender`, `user_birthday`, `is_admin`, `phone`, `facebook`, `twitter`, `skype`, `user_email`, `password`, `avatar`, `online_status`, `creation_time`) VALUES
(7, 'Test', 'User', 'Test User', 'test', 'Male', '1994-05-12', 0, 'N/A', 'test', 'test', 'test', 'test@intellinav.com', '098f6bcd4621d373cade4e832627b4f6', 'avatar.png', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_checkins`
--

CREATE TABLE `tbl_user_checkins` (
  `checkin_id` int(11) NOT NULL,
  `uid` int(20) NOT NULL,
  `checkin_story` text NOT NULL,
  `checkin_place` text NOT NULL,
  `checkin_place_id` text NOT NULL,
  `checkin_geometry` text NOT NULL,
  `checkin_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_checkins`
--

INSERT INTO `tbl_user_checkins` (`checkin_id`, `uid`, `checkin_story`, `checkin_place`, `checkin_place_id`, `checkin_geometry`, `checkin_time`) VALUES
(4, 1, 'asdasdad', 'Neyyassery Bus Stop, Neyyassery Road, Thodupuzha, Kerala, India', 'ChIJ_yFVzB3BBzsRH5VlNEm4TyM', '["9.9342767","76.77712259999998"]', '2016-03-01 01:21:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_connections`
--
ALTER TABLE `tbl_connections`
  ADD PRIMARY KEY (`connection_id`),
  ADD UNIQUE KEY `user_id` (`uid`,`friend_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_name` (`event_name`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_im`
--
ALTER TABLE `tbl_im`
  ADD PRIMARY KEY (`im_id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `tbl_markers`
--
ALTER TABLE `tbl_markers`
  ADD PRIMARY KEY (`marker_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `uid_2` (`uid`);

--
-- Indexes for table `tbl_polylines`
--
ALTER TABLE `tbl_polylines`
  ADD PRIMARY KEY (`polyline_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD UNIQUE KEY `review_id` (`review_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `uid_2` (`uid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `uid_3` (`uid`);

--
-- Indexes for table `tbl_user_checkins`
--
ALTER TABLE `tbl_user_checkins`
  ADD PRIMARY KEY (`checkin_id`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_connections`
--
ALTER TABLE `tbl_connections`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_im`
--
ALTER TABLE `tbl_im`
  MODIFY `im_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_markers`
--
ALTER TABLE `tbl_markers`
  MODIFY `marker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_polylines`
--
ALTER TABLE `tbl_polylines`
  MODIFY `polyline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user_checkins`
--
ALTER TABLE `tbl_user_checkins`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_connections`
--
ALTER TABLE `tbl_connections`
  ADD CONSTRAINT `tbl_connections_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `tbl_connections_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD CONSTRAINT `tbl_events_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_im`
--
ALTER TABLE `tbl_im`
  ADD CONSTRAINT `uid2_fk` FOREIGN KEY (`receiver`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`sender`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_markers`
--
ALTER TABLE `tbl_markers`
  ADD CONSTRAINT `tbl_markers_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_polylines`
--
ALTER TABLE `tbl_polylines`
  ADD CONSTRAINT `tbl_polylines_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD CONSTRAINT `tbl_reviews_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_user_checkins`
--
ALTER TABLE `tbl_user_checkins`
  ADD CONSTRAINT `tbl_user_checkins_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);
