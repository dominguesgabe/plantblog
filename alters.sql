CREATE DATABASE plant_blog

CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    birth_date DATE
)

CREATE TABLE posts (
    id INT auto_increment NOT NULL,
    image_url varchar(255) NOT NULL,
    reading_time int NOT NULL,
    title varchar(100) NOT NULL,
    description varchar(255) NOT NULL,
    post LONGTEXT NOT NULL,
    created_at DATE DEFAULT current_timestamp() NOT NULL,
    user_id int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)