const express = require('express');
const app = express();

const productRoutes = require('./routes/products');

app.use('/products', productRoutes);

module.exports = app;

// <?php
// $response = file_get_contents('http://localhost:3000/');
// echo $response;
// ?>