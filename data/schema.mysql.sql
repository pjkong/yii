CREATE TABLE tbl_person (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL
);

BEGIN
  DECLARE i INT DEFAULT 0;
  WHILE i < 10 DO
    INSERT INTO tbl_user (username, password, email) VALUES ('test1', SHA2('pass1', 256), 'test1@example.com');
  SET i = i + 1;
  END WHILE;
END;

