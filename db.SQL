--#SQLite regdb
/**
.sqlite

Command	Description
.show	Displays current settings for various parameters
.databases	Provides database names and files
.quit	Quit sqlite3 program
.tables	Show current tables
.schema	Display schema of table
.header	Display or hide the output table header
.mode
Select mode
for
the
output
table
.dump	Dump database in SQL text format


--cleanup
DELETE FROM tblename;
VACUUM;
**/

--create new tables
CREATE TABLE student ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL,
	surname TEXT NOT NULL,
	birthday date,
	age INTEGER,
	houseaddress TEXT,
	mom TEXT,
	momnum TEXT,
	dad TEXT,
	dadnum TEXT,
	churchsms TEXT,
    class_id INTEGER);

CREATE TABLE Teacher ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
	name TEXT NOT NULL,
	password TEXT NOT NULL,
    class_id INTEGER NOT NULL
	access_id INTEGER NOT NULL);

CREATE TABLE access ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL,
	description TEXT NOT NULL);
	/**
    0)
    1) teacher - can do attendance
    2)
    3)
    4)
    5) teacher & student admin
    6)
    7)
    8)
    9) admin - can do all
    **/
CREATE TABLE Class ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL,
	description TEXT NOT NULL);

CREATE TABLE attendance ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	classdate date NOT NULL,
    attended BIT NOT NULL,
	student_id INTEGER NOT NULL);
