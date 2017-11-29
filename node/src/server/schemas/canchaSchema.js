const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const CanchaSchema = new Schema({
    cancha: {
        type: String,
    }
});

const sCancha = mongoose.model('cancha', CanchaSchema);

module.exports = sCancha;