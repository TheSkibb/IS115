echo 'dropping tables..'
mysql -h 172.17.0.2 -u root -p < dropTables.sql
echo 'tables dropped!'
echo 'creating tables..'
mysql -h 172.17.0.2 -u root -p < createTables.sql
echo 'tables created!'
