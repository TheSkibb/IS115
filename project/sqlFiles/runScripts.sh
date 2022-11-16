echo 'creating tables..'
{ echo test ; } | mysql -h 172.17.0.2 -u root -p < dropTables.sql
mysql -h 172.17.0.2 -u root -p < createTables.sql
echo 'test'
echo 'tables created'
