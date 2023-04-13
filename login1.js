var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "myusername",
  password: "mypassword",
  database: "pharamacy"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});
