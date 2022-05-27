var mysql      = require('./mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '20151127_FR',
  database : 'test'
});

exports.module = connection;

connection.connect();

connection.query('SELECT * FROM info', function(err, results, fields) {
  if (err) {
    console.log(err);
    console.log('connection failed');
  }
  console.log(results);
  console.log('connection success');
});

connection.end();

