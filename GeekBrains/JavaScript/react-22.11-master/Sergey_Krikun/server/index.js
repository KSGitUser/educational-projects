const express = require('express');
const cors = require('cors');
/* var request = require('request'); */
const bodyParser = require('body-parser');
const mongoose = require('mongoose');
const hostname = 'http://localhost';

mongoose.connect('mongodb://localhost/test', { useNewUrlParser: true });

const Post = require('./model/post');
const User = require('./model/user');
const Comment = require('./model/comment');


/* node server/ - запустить сервер*/

const app = express();
app.use(cors());
app.use(bodyParser.json());


/* app.get('/posts', (req, res) => {





});  */// req - запрос, res - ответ

/* app.get('/animals/:id', (req, res) => {
  res.send(`Requested id:${req.params.id}`);
}) */



/* app.post('/posts', (req, res) => {
  newObj = req.body;
  res.send('Posts OK');
  return req.body;
}) */

/* app.post('/users', (req, res) => {
  res.send('Users OK');
  return req.body;
}) */


app.get('/posts', async (req, res) => {
  const posts = await Post.find();


  res.json(posts);

});

app.post('/posts', async (req, res) => {
  let post = new Post(req.body);
  post = await post.save();
  res.json(post);
});

app.get('/users', async (req, res) => {
  const user = await User.find();
  res.json(user);
}); // читаем информацию из базы данных mongoDB

app.post('/users', async (req, res) => {
  let user = new User(req.body);
  user = await user.save();
  res.json(user);
}); // получаем информацию из post запроса и записываем в базу mongoDB

app.get('/comments', async (req, res) => {
  const comment = await Comment.find();
  res.json(comment);
});

app.post('/comments', async (req, res) => {
  let comment = new Comment(req.body);
  comment = await comment.save();
  res.json(comment);
});

app.get('/', (req, res) => res.send('Hello World'));




app.listen(3000, () => {
  console.log('Server has been started');
});
