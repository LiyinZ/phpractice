
CREATE TABLE movies (
	movie_id INT NOT NULL AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	year INT(4) UNSIGNED NOT NULL,
	5_star_rating INT(1) UNSIGNED NOT NULL DEFAULT 0,
	length_min INT(4) UNSIGNED NOT NULL,
	studio VARCHAR(255) NOT NULL,
	PRIMARY KEY (movie_id)
);

INSERT INTO movies (title, year, 5_star_rating, length_min, studio)
VALUES
('Star Wars', 1977, 5, 121, '20th Century Fox'),
("National Lampoon's Animal House", 1978, 3, 109, 'Universal'),
('Jaws', 1975, 4, 125, 'Universal'),
('The Exorcist', 1973, 4, 122, 'Warner Bros.'),
('Grease', 1978, 2, 110, 'Paramount'),
('The Godfather', 1972, 5, 175, 'Paramount'),
('The Towering Inferno', 1974, 3, 165, '20th Century Fox'),
('The Black Hole', 1979, 1, 98, 'Disney'),
('Superman', 1978, 2, 143, 'Warner Bros.'),
('The Godfather Part II', 1974, 5, 200, 'Paramount'),
('Love Story', 1970, 1, 100, 'Paramount'),
('Apocalypse Now', 1979, 4, 153, 'Paramount'),
('Alien', 1979, 4, 117, '20th Century Fox'),
('A Clockwork Orange', 1971, 4, 136, 'Warner Bros.'),
('Taxi Driver', 1976, 4, 113, 'Columbia'),
('The Sting', 1973, 4, 129, 'Universal');