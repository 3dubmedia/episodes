DROP TABLE IF EXISTS episodes;

CREATE TABLE episodes (
  id int(11) NOT NULL AUTO_INCREMENT,
  uid int(11) NOT NULL,
  title varchar(255) NOT NULL,
  season int(11) NOT NULL,
  episode int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;