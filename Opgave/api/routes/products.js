// Importing the express package
const express = require('express');
// express.router er noget der følger med express hjælper med at fanger forskellige endpoints
const router = express.Router();
// Import mysql
const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'fancyclothes'
});

// Route viser alle 
router.get('/', (req, res) =>{
    // SQL QUERY
    const query = "SELECT * FROM products";
    // Database call
    connection.query(query, (err, rows, fields) =>{
        res.json(rows);
    });
});

// Laver en ny route til apien som fanger alle produkter som 
router.get('/:id', (req, res) =>{
    const id = req.params.id;

    // SQL QUERY
    const query = "SELECT * FROM products WHERE productID = ?";
    // Database call
    connection.query(query, [id], (err, rows, fields) =>{
        res.json(rows);
    });
});

module.exports = router;