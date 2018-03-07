CREATE TABLE `user` (
  `user_id`  INT(11) NOT NULL AUTO_INCREMENT,
  `name`     VARCHAR(255)     DEFAULT NULL,
  `position` VARCHAR(255)     DEFAULT NULL,
  `login`    VARCHAR(128)     DEFAULT NULL,
  `password` VARCHAR(128)     DEFAULT NULL,
  PRIMARY KEY (user_id)
)
  ENGINE = InnoDB;

CREATE TABLE `article` (
  `article_id` INT(11)  NOT NULL AUTO_INCREMENT,
  `title`      VARCHAR(255)      DEFAULT NULL,
  `author`     INT(11)           DEFAULT NULL,
  `date`       DATETIME NOT NULL,
  `text`       TEXT,
  PRIMARY KEY (article_id),
  FOREIGN KEY (author) REFERENCES user (user_id)
)
  ENGINE = InnoDB;

CREATE TABLE tag_name (
  tag_id   INT NOT NULL AUTO_INCREMENT,
  tag_name VARCHAR(128),
  PRIMARY KEY (tag_id)
)
  ENGINE = InnoDB;

CREATE TABLE tag (
  article_id INT NOT NULL,

  tag_id     INT,
  FOREIGN KEY (tag_id) REFERENCES tag_name (tag_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (article_id) REFERENCES article (article_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
  #   ,  PRIMARY KEY (tag_id)
)
  ENGINE = InnoDB;

CREATE TABLE likes (
  article_id INT NOT NULL,
  user_id    INT NOT NULL,

  INDEX (article_id),
  FOREIGN KEY (user_id) REFERENCES user (user_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (article_id) REFERENCES article (article_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  ENGINE = InnoDB;

CREATE TABLE images (
  article_id INT NOT NULL,
  img_path   VARCHAR(255),
  FOREIGN KEY (article_id) REFERENCES article (article_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  ENGINE = InnoDB;

CREATE TABLE comments (
  article_id   INT NOT NULL,
  parent_id    INT NOT NULL,
  comment_id   INT NOT NULL AUTO_INCREMENT,
  comment_text VARCHAR(255),
  author       INT NOT NULL,
#   date DATETIME,

  PRIMARY KEY (comment_id),
  FOREIGN KEY (article_id) REFERENCES article (article_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (author) REFERENCES USER (user_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  ENGINE = InnoDB;