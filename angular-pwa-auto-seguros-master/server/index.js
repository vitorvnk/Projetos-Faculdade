const express = require("express");
const bodyParser = require('body-parser');
const cors = require('cors');

const { listarSeguros, salvarSeguro } = require('./seguro-service');
const { adicionaPushSubscriber } = require('./adiciona-push-subscriber');

const app = express();
app.use(bodyParser.json());
app.use(cors({origin: true, credentials: true}));

app.route('/api/seguros')
    .post(salvarSeguro);

app.route('/api/seguros')
    .get(listarSeguros);

app.route('/api/notificacao')
    .post(adicionaPushSubscriber);


const PORT = 9000;
const HOST = 'localhost';

const httpServer = app.listen(PORT, HOST, () => {
    console.log("Servidor funcionando em http://" + HOST + ":" + PORT);
});
