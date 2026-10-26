# profile
Simple mini-CMS to run your own single-page personal profile website. Similar to Linktree.

## Setup
### Requirements
- PHP webserver
- MySQL / MariaDB
## Setup
1. Copy all files over to your webserver.
2. Configure your webserver to always route requests to ``index.php`` via ``.htaccess`` or equivalent.
3. Edit ``config.php`` with your database credentials.
4. Modify ``schema.sql`` with a bcrypt password hash that you want to use to log in. Additionally, modify the username of the first user if desired.
5. Run everything in ``schema.sql`` on your database.
6. Log into (your website)/admin.