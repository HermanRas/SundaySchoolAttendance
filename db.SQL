--#SQLite sondagskooldb
/**
--Command	Description
.show	Displays current settings for various parameters
.databases	Provides database names and files
.quit	Quit sqlite3 program
.tables	Show current tables
.schema	Display schema of table
.header	Display or hide the output table header
.mode Select mode for the output table
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
	active BIT,
    class_id INTEGER);

CREATE TABLE Teacher ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
	name TEXT NOT NULL,
	password TEXT NOT NULL,
    class_id INTEGER NOT NULL,
	access_id INTEGER NOT NULL);

INSERT INTO Teacher ('name','password','class_id','access_id') VALUES ('admin', 'admin', 1, 1);

CREATE TABLE access ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL,
	description TEXT NOT NULL);
	/**
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
INSERT INTO access ('name','description') VALUES ('teacher', 'can do attendance');
INSERT INTO access ('name','description') VALUES (' ', 'N/A');
INSERT INTO access ('name','description') VALUES (' ', 'N/A');
INSERT INTO access ('name','description') VALUES (' ', 'N/A');
INSERT INTO access ('name','description') VALUES ('student admin', 'can add & edit students');
INSERT INTO access ('name','description') VALUES (' ', 'N/A');
INSERT INTO access ('name','description') VALUES (' ', 'N/A');
INSERT INTO access ('name','description') VALUES (' ', 'N/A');
INSERT INTO access ('name','description') VALUES ('admin', 'can do everything');

CREATE TABLE class ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL,
	description TEXT NOT NULL);

INSERT INTO class ('name','description') VALUES ('Kersies', '3-5y');
INSERT INTO class ('name','description') VALUES ('Lampies', '6-8y');
INSERT INTO class ('name','description') VALUES ('Spotlights', '9-12y');
INSERT INTO class ('name','description') VALUES ('Tieners', '13-17');
INSERT INTO class ('name','description') VALUES ('Metrix&Naskool', '18+');


CREATE TABLE attendance ( 
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	classdate date NOT NULL,
    attended BIT NOT NULL,
	student_id INTEGER NOT NULL);
