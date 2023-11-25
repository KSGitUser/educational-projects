import { createAction } from 'redux-actions';

export const loadComments = createAction('[Comments] Load');
// создаем action с уникальным индентификатором [Comments] Load

export const loadStarted = createAction('[Comments] Load started');
export const loadCompleted = {
  comments: createAction('[Comments] Load completed'),
  posts: createAction('[Posts] Load completed'),
  users: createAction('[Users] Load completed'),
};
export const loadFailed = createAction('[Comments] Load faild');


export const load = (name) => (dispatch) => {
  /*  fetch(`https://jsonplaceholder.typicode.com/${name}`) */
  fetch(`http://localhost:3000/${name}`, { mode: 'cors' })
      .then((response) => response.json())
      .then((data) => {
        dispatch(loadCompleted[name](data));
      })
      .catch((err) => {
        dispatch(loadFailed(err));
      });
};


