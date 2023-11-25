import React, { PureComponent, Fragment } from 'react';
import { connect } from 'react-redux';
import { load as loadComments } from 'actions/comments';

import MainArticle from 'components/MainArticle';
import CommentsNew from 'components/CommentsNew';
import PageOfArticle from 'components/PageOfArticle';
import UserService from 'containers/UserService';
import UserPage from 'components/UserPage';

class FetchingSelectedData extends PureComponent {
  constructor(props) {
    super(props);
  }


  componentDidMount = () => {
    const { comments, users, posts, load } = this.props;

    if (comments.length < 1 || comments == undefined) {
      load('comments');
    }
    if (posts.length < 1 || posts == undefined) {
      load('posts');
    }
    if (users.length < 1 || users == undefined) {
      load('users');
    }
  }


  onLoadMore = (content) => {
    const { postsStringUrl, usersStringUrl, commentsStringUrl } = this.props;
    const { page, pageComments } = this.state;
    const postsStringWithPages = `${postsStringUrl}&_page=${page}`;


    if (content == 'Comments') {
      const commentsStringWithPages =
        `${commentsStringUrl}&_page=${pageComments}`;
      this.addPage(content);
      this.fetchData(commentsStringWithPages, 'comments');
      return;
    }

    this.addPage();
    this.fetchData(postsStringWithPages, 'posts');
    this.fetchData(usersStringUrl, 'users');
  }

  addPage = (componentName = '') => {
    this.setState((prevState) => (
      {
        ...prevState,
        [`page${componentName}`]: prevState[`page${componentName}`] + 1,
      }));
  }

  getData() {
    const { postsStringUrl, commentsStringUrl, usersStringUrl }
      = this.props;

    if (postsStringUrl) {
      this.fetchData(postsStringUrl, 'posts');
      this.addPage();
    }
    if (commentsStringUrl) {
      this.fetchData(commentsStringUrl, 'comments');
      this.addPage('Comments');
    }
    if (usersStringUrl) {
      this.fetchData(usersStringUrl, 'users');
    }
  }
  render() {
    const { mainPage, commentsPage, pageOfArticle, articleNumber, getUsers,
      userPage, userObject } = this.props;
    const {
      comments,
      loading,
      users,
      posts,
      commentsTotalItems,
      error } = this.props;

    if (error) {
      return (<p>The error, {error}</p>);
    }
    if (userPage == 'true' || loading) {
      return (
        <Fragment>
          {(users.length === 0) ? 'Loading...' :
            <UserPage
              articleItems={posts}
              commentsItems={comments}
              userItems={users}
              userObject={userObject}
              commentsTotalItems={commentsTotalItems}
            />
          }
        </Fragment>
      );
    }
    if (getUsers == 'true' || loading) {
      return (
        <Fragment>
          {(users.length === 0) ? 'Loading...' :
            <UserService
              userObject={users[0]}
            />
          }
        </Fragment>
      );
    }
    if (commentsPage == 'true') {
      return (
        <Fragment>
          {(comments.length === 0 || loading) ? 'Loading...' :
            <CommentsNew
              commentsList={comments}
              onLoadMore={this.onLoadMore}
              authorItems={users}
              commentsTotalItems={commentsTotalItems}
            />
          }
        </Fragment>
      );
    }
    if (mainPage == 'true') {
      return (

        <div>
          {(posts.length === 0 || users.length === 0 || loading)
            ? 'Loading...'
            :
            <MainArticle
              articleItems={posts}
              loading={loading}
              onLoadMore={this.onLoadMore}
              authorItems={users}>
            </MainArticle>
          }
        </div>
      );
    }
    if (pageOfArticle == 'true') {
      return (
        <Fragment>
          {(posts.length === 0 ||
            users.length === 0 ||
            comments.length === 0 ||
            loading)
            ? 'Loading...' :
            <PageOfArticle
              articleItems={posts}
              authorItems={users}
              comments={comments}
              numberOfArticle={articleNumber}
              onLoadMore={this.onLoadMore}
              commentsTotalItems={commentsTotalItems}>
            </PageOfArticle>}
        </Fragment>
      );
    }
  };
}

function mapStateToProps(state, props) {
  return {
    comments: state.fetchingData.comments,
    posts: state.fetchingData.posts,
    users: state.fetchingData.users,
    loading: state.fetchingData.loading,
  };
} /* определяет на какую часть store подписывается наш компонент,
в state находится все что лежит в store */

function mapDispatchToProps(dispatch, props) {
  return {
    load: (name) => dispatch(loadComments(name)),
  };
}

export default connect(
    mapStateToProps,
    mapDispatchToProps
)(FetchingSelectedData);


