SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `username` varchar(20) NOT NULL,
    `password` varchar(20) NOT NULL,
    `email` varchar(50) NOT NULL,
    `level` varchar(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'csanders', 'passoword', 'me@me.com', 'Admin');