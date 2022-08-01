const express= require('express');
const controladorCategoria = require('../controller/controller_categoria');
const rutacategoria= express.Router();

rutacategoria.get("",controladorCategoria.mostrarcategoria);

module.exports=rutacategoria;