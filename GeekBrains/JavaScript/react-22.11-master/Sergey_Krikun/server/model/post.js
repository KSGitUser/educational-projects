const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const postSchema = new Schema(
  {
    id: { type: Number, required: true, default: 1 },
    userId: { type: Number, required: true, default: 1 },
    title: { type: String, required: true, default: 'Unknown' },
    body: { type: String, required: false, default: 'Unknown' },
  }
);

module.exports = mongoose.model('Post', postSchema);