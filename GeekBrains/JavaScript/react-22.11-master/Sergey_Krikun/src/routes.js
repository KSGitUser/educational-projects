import RouterContainer from './containers/RouterContainer';

export default [
  {
    path: '/',
    exact: true,
    component: RouterContainer,
  },
  {
    path: '/:nameOfPage/:userId?/:numberOfPost?/:limitOfComments?',
    exact: true,
    component: RouterContainer,
  },
];
