CREATE DATABASE IF NOT EXISTS sms_project;

USE sms_project;

CREATE TABLE IF NOT EXISTS accounts (

    id       INT(11) AUTO_INCREMENT = 32,
    type     VARCHAR(50) NOT NULL,
    email    VARCHAR(50) NOT NULL,
    password TEXT NOT NULL,
    name     TEXT NOT NULL,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS attendance (

    id               INT(11) AUTO_INCREMENT = 86,
    attendance_month TEXT NOT NULL,
    attendance_value LONGTEXT NOT NULL,
    modified_date    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    std_id           INT(11) NOT NULL,
    current_session  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS classes (

    id         INT(11) AUTO_INCREMENT = 16,
    title      TEXT NOT NULL,
    section    VARCHAR(50) NOT NULL,
    added_date DATE NOT NULL,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS courses (

    id       INT(11) AUTO_INCREMENT = 8,
    name     TEXT NOT NULL,
    category TEXT NOT NULL,
    duration TEXT NOT NULL,
    date     DATETIME NOT NULL,
    image    TEXT NOT NULL,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS metadata (

    id         INT(11) AUTO_INCREMENT = 77,
    item_id    INT(11) NOT NULL,
    meta_key   TEXT NOT NULL,
    meta_value TEXT NOT NULL,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS posts (

    id            INT(11) AUTO_INCREMENT = 30,
    author        INT(11) NOT NULL DEFAULT 1,
    title         TEXT NOT NULL,
    description   TEXT NOT NULL,
    type          VARCHAR(100) NOT NULL,
    publish_date  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modified_date TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
    status        VARCHAR(50) NOT NULL,
    parent        INT(11) NOT NULL,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS sections (

    id    INT(11) AUTO_INCREMENT = 5,
    title TEXT NOT NULL,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS usermeta (

    id         INT(11) AUTO_INCREMENT = 152,
    user_id    INT(11) NOT NULL,
    meta_key   TEXT NOT NULL,
    meta_value TEXT NOT NULL,

    PRIMARY KEY (id)

) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;