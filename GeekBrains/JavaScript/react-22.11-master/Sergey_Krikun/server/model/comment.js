const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const commentsSchema = new Schema(
  {
    "postId": { type: Number, required: false, default: null },
    "id": { type: Number, required: true, default: 1 },
    "name": { type: String, required: false, default: 'Unknown' },
    "email": { type: String, required: false, default: 'Unknown' },
    "body": { type: String, required: false, default: 'Unknown' }
  }
);

module.exports = mongoose.model('Comment', commentsSchema);