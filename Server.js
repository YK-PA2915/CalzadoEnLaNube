const express= require("express");
const bodyparser= require
("body-parser");

const servidor = express();

servidor.use(bodyparser.json());
servidor.use(bodyparser.urlencoded({extended:false}));

servidor.set('view engine','ejs');
servidor.set('views',__dirname+'/views');

servidor.use(express.static(__dirname+'/public'));




servidor.post('/editar',(peticion,respuesta)=>{
     let {actua, txt1, txt2, txt3, txt4, txt5, txt6}=peticion.body;
     respuesta.render('/productos');
});




servidor.listen(4000,()=>{
     console.log("El servidor inicio en el puerto 4000");
});