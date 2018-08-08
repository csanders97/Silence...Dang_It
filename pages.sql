SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `pages` (
	`category` text NOT NULL,
	`type` text NOT NULL,
	`parent` text NOT NULL,
	`html` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=11;

INSERT INTO `pages` (`category`, `type`, `parent`, `html`) VALUES
('Home', 'Main', 'None', '<section class="home"><h1>HOME</h1></section>'),
('About', 'Main', 'None', '<section class="home"><h1>About</h1></section>'),
('Contact', 'Main', 'None', '<section class="home"><h1>Contact</h1></section>'),
('History', 'Sub', 'About', '<section class="home"><h1>History/h1></section>'),
('Mission', 'Sub', 'About', '<section class="home"><h1>Mission</h1></section>'),
('Locations', 'Sub', 'Contact', '<section class="home"><h1>Locations</h1></section>'),
('Email', 'Sub', 'Contact', '<section class="home"><h1>Email</h1></section>');