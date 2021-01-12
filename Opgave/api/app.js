const express = require('express');
const app = express();

// Here importer vi productRoutes ved at require stien til products.js
const productRoutes = require('./routes/products');

// Her går alle kald igemmen det betyder at hvis man skal kalde apien skal man skrive /products
app.use('/products', productRoutes);

// Module is a variable that represents the current module an exports is an object that wil be exposed as a module. So that means what you assaign to module.exports will be exposed as a module
module.exports = app;

// <?php
// $response = file_get_contents('http://localhost:3000/');
// echo $response;
// ?>