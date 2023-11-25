import './UserPage.css';

import React, { PureComponent } from 'react';
import { connect } from 'react-redux';
import { load as loadComments } from 'actions/comments';

import CommentsNew from 'components/CommentsNew';
import MainArticle from 'components/MainArticle';


class UserPage extends PureComponent {
  static defaultProps = {}

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

  render() {
    const { posts, users, comments, usersUserPage } = this.props;

    if (usersUserPage) {
      const commentsFiltered = comments.filter(
          (comment) => comment.email == usersUserPage.email);

      return (

        <div className="UserPage">
          <div className="user-info-heading">
            <h2>Author page</h2>
            {

              <div className="user-page_item">
                <p className="user-page_name">
                  Name: {usersUserPage.name}
                </p>
                <p className="user-page_user-name">
                  User name: {usersUserPage.username}
                </p>
                <p className="user-page_email">
                  Email: {usersUserPage.email}
                </p>
              </div>
            }
          </div>
          {(posts.length > 0) ?
            <MainArticle
              articleItems={posts}
              authorItems={users}
            />
            : null}
          {(commentsFiltered.length > 0) ?
            <CommentsNew
              commentsList={commentsFiltered}
            />
            : null}
        </div>
      );
    } else {
      return (
        <div>
          Loading...
        </div>
      );
    }
  }
}

function mapStateToProps(state, props) {
  const { userId } = props;

  return {
    posts: state.fetchingData.posts.filter((post) => post.userId === +userId),
    users: state.fetchingData.users,
    usersUserPage: state.fetchingData.users.find((user) => user.id === +userId),
    comments: state.fetchingData.comments,
    loading: state.fetchingData.loading,
  };
} /* определяет на какую часть store подписывается наш компонент,
в state находится все что лежит в store */

function mapDispatchToProps(dispatch, props) {
  return {
    load: (name) => dispatch(loadComments(name)),
  };
}

export default connect(mapStateToProps, mapDispatchToProps)(UserPage);

UserPage.propTypes = {

  authorItems: PropTypes.array,
  comments: PropTypes.array,
  users: PropTypes.array,
  posts: PropTypes.array,
  load: PropTypes.func,
  usersUserPage: PropTypes.array,
};

