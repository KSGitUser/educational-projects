import { handleActions } from 'redux-actions';
import { loadStarted, loadCompleted, loadFaild } from 'actions/comments';

const initialState = {
  comments: [],
  posts: [],
  users: [],
  loading: false,
};

export default handleActions({
  [loadStarted]: (state, action) => {
    return {
      ...state,
      loading: true,
    };
  }, /* два аргумента state состояние до, action обработчик сигнала,
  возвращаем новое значение нашего состояния */
  [loadCompleted.comments]: (state, action) => {
    return {
      ...state,
      loading: false,
      comments: state.comments.concat(action.payload), /* сюда
      через action.payload  передаем параметр из loadCompleted(comments) -
      comments */
    };
  },
  [loadCompleted.users]: (state, action) => {
    return {
      ...state,
      loading: false,
      users: state.users.concat(action.payload), /* сюда через action.payload
      передаем параметр из loadCompleted(comments) - comments */
    };
  },
  [loadCompleted.posts]: (state, action) => {
    return {
      ...state,
      loading: false,
      posts: state.posts.concat(action.payload), /* сюда через action.payload
      передаем параметр из loadCompleted(comments) - comments */

    };
  },
  [loadFaild]: (state, action) => {
    return {
      ...state,
      loading: false,
    };
  },
}, initialState); /* для обработки action используем функцию handleActions и
передаем два аргумента - 1й это сам обработчик, 2й это состояние */
