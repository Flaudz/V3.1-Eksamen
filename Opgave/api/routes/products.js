// Importing the express package
const express = require('express');
// express.router er noget der følger med express hjælper med at fanger forskellige endpoints
const router = express.Router();
// Import mysql
const mysql = require('mysql');

// Her tilslutter vi databasen
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    database: 'fancyclothes'
});

// Route viser alle produkter
// Hvis man ændre router.get til router.post den sti til handle med post request
// Det er måde man fortæller hvilken slags kald man vil have
router.get('/', (req, res) =>{
    // SQL QUERY
    const query = "SELECT * FROM products";
    // Database call
    connection.query(query, (err, rows, fields) =>{
        res.json(rows);
    });
});

// Laver en ny route til apien som fanger alle produkter som har den sammen id som er i urlen
router.get('/:id', (req, res) =>{
    const id = req.params.id;

    // SQL QUERY
    const query = "SELECT * FROM products WHERE productID = ?";
    // Database call
    connection.query(query, [id], (err, rows, fields) =>{
        res.json(rows);
    });
});

// Module is a variable that represents the current module an exports is an object that wil be exposed as a module. So that means what you assaign to module.exports will be exposed as a module
module.exports = router;