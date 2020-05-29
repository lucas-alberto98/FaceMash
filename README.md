# Facemash

A copy of the facemash that Mark Zuckerberg made in his college days and the one shown in the movie
'The Social Network'.

## How to setup

The images has to be saved in the 'images' folder. 
And the database name should be 'facemash' with the table name 'photos'.
The table 'photos' need to have 4 columns

* id AI, 
* photo(image name), 
* rating(150 for all)
* k.

Script MYSQL
```
CREATE TABLE photos(
	id INT(255) NOT NULL AUTO_INCREMENT,
	photo VARCHAR(255) NOT NULL,
	rating INT(255) DEFAULT 150,
	k INT(255) DEFAULT 0,
	PRIMARY KEY(id)
);

# Example insert
INSERT INTO photos (id, photo, rating, k) VALUES (0, '1.jpg', 150, 0)
```
Test in PHP 7.2.31

## Method used

The Elo rating system is used in the making of the rating system 
More information at (https://en.wikipedia.org/wiki/Elo_rating_system)

Base rating of 150 is assumed.

K is used as follow:-

* 10 for ratings greater than 225.
* 15 for ratings greater than 75 but less than 225.
* 25 for ratings less than 75.

Note:- K and Base ratings vary all the time. I have thanken them just for the sake of simplification.



_Inspired by (https://github.com/noswear94/Facemash)_


