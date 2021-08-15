# Sympl-API
A basic API created in PHP using PDO with a combination of procedural and functional programming.

Steps (Usecase)

1. Clone the repo

2. Extract to web server root.

3. Dump SQL file (monitor.sql)

4. Test api with Postman or similar platform.

API Endpoints

USERS
localhost/{name of directory}/api/users

1. GET (all users)
/api/users

2. GET (single user)
/api/users/?id={id}

3. POST (create transaction)
/api/users/
Supply form data

4. POST (update transaction)
/api/users/
Supply form data with {id} filed

TRANSACTIONS
localhost/{name of directory}/api/transactions

1. GET (all transactions)
/api/transactions

2. GET (single transaction)
/api/transactions/?id={id}

3. POST (create transaction)
/api/transactions/
Supply form data

4. POST (update transaction)
/api/transactions/
Supply form data with {id} filed

Enjoy
