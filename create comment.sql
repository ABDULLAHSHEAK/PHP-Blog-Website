CREATE TABLE `comments`(
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `post_id` BIGINT(20) UNSIGNED NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  `email` VARCHAR(20) NOT NULL,
  `comment` TEXT NOT NULL,
  `status` INT(20) NOT NULL,
  Foreign Key (`post_id`) REFERENCES `post`(`post_id`)
)