const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const userSchema = new Schema(
  {
    id: { type: Number, required: true, default: 1 },
    name: { type: String, required: false, default: 'Unknown' },
    username: { type: String, required: false, default: 'Unknown' },
    email: { type: String, required: false, default: 'Unknown' },
  }
);

module.exports = mongoose.model('User', userSchema);