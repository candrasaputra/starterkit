How to install:


Using Migration (original author : Muhammad Aimal <aimal.azmi.13@gmail.com>) :
-----------------------------------------------------

IMPORTANT
=========

- Requires a working DB connection.

- The sorting and naming of the files will be done as 'timestamp' by default.
- This can be changed in config/migration.php throught $config['migration_type'].

- Use the keyword 'modify' when creating a migration to 'alter' a table. 
- This will create a migration file with code to alter table.

Available Methods
=================

index() : The main migration file creation method.

current() : Migrates to the currently set migration version.

latest() : Migrates to the very latest migration version.

rollback($version = 0) : Migrates to the '$version' version.

reset($rollback = TRUE) : Deletes all migration files, Resets the migrations table and calls $this::rollback(0) if $rollback is set to TRUE.

last() : Rollbacks the migrations one step back.

info() : A table showing migrations information.

help() : Displays a help section.

IF YOU WANT MAKE FOREIGN KEY YOU CAN USING db_halper (Original author : Natan Felles <natanfelles@gmail.com>)
---------------------------------------------------------