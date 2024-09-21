const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

mongoose.connect('mongodb://localhost:27017/nombre_de_tu_base_de_datos', {
  useNewUrlParser: true,
  useUnifiedTopology: true,
});

const db = mongoose.connection;

db.on('error', console.error.bind(console, 'Error de conexión a la base de datos:'));
db.once('open', () => {
  console.log('Conectado a la base de datos');
});

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

// Definición del esquema de Mongoose
const matriculaSchema = new mongoose.Schema({
  ci: String,
  email: String,
  periodo: String,
  fecha: Date,
  nombres: String,
  apellidos: String,
  fecha_nacimiento: Date,
  sexo: String,
  ciudad: String,
  direccion: String,
  discapacidad: String,
  porcentaje_discapacidad: String,
  tipo_sangre: String,
  nombre_padre: String,
  direccion_padre: String,
  telefono_padre: String,
  nombre_madre: String,
  telefono_madre: String,
  direccion_madre: String,
  estado_civil: String,
});

const Matricula = mongoose.model('Matricula', matriculaSchema);

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/public/index.html');
});

app.post('/matricula', (req, res) => {
  const nuevaMatricula = new Matricula(req.body);
  nuevaMatricula.save((err) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error al guardar la matrícula');
    } else {
      res.status(200).send('Matrícula guardada con éxito');
    }
  });
});

app.listen(port, () => {
  console.log(`Servidor en funcionamiento en http://localhost:${port}`);
});

