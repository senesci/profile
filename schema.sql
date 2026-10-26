-- Required schema and 1 row for the site to work.
CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, username VARCHAR(100) NOT NULL UNIQUE, pw_hash VARCHAR(250) NOT NULL);
CREATE TABLE IF NOT EXISTS profile (name VARCHAR(250) NOT NULL, body TEXT NOT NULL);
CREATE TABLE IF NOT EXISTS pageviews (user_agent VARCHAR(250) NOT NULL, created_at TIMESTAMP NOT NULL DEFAULT current_timestamp);

INSERT INTO profile (name, body) VALUES ("Edit Me!", "Welcome! Click [here](/admin) to modify your page.");

-- Modify the pw_hash line below with a bcrypt hash of your desired password.
INSERT INTO users (username, pw_hash) VALUES ("admin", "");