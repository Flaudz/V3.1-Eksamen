const http = require('http');
const app = require('./app.js');

// process.env accesses nodeJS enveriment variabels and this fx: be set on a server that is hosting the nodejs server.
// If process.env.PORT is not set as it is not we are going with a deafult set port
const port = process.env.PORT || 3000;

// Here we make the server with the http package
const server = http.createServer(app);

// Here the server starts listning at the port we set before
server.listen(port);