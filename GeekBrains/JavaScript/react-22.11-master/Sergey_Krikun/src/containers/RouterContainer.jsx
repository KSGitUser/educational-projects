import React, { Component } from 'react';
import UserPage from 'components/UserPage';

import FetchingSelectedData from 'containers/FetchingSelectedData';

export default class RouterContainer extends Component {
  constructor(props) {
    super(props);
    this.state = {
      numberOfPost: [],
    };
  }

  render() {
    const { match } = this.props;


    switch (match.params.nameOfPage) {
      case 'pageOfArticle':
        return (
          <FetchingSelectedData
            postsStringUrl={`/posts?&id=${match.params.numberOfPost}`}
            usersStringUrl={`/users/${match.params.userId}`}
            commentsStringUrl=
              {`/comments?postId=${match.params.numberOfPost}&_limit=$
              {match.params.limitOfComments}`}
            articleNumber={match.params.numberOfPost}
            pageOfArticle="true"
          />
        );

      case 'authorPage':

        return (
          <UserPage
            usersStringUrl={`/users?id=${match.params.userId}`}
            userId={`${match.params.userId}`}
          />
        );
      default:
        return (
          <FetchingSelectedData
            postsStringUrl='/posts?&_limit=10'
            usersStringUrl="/users"
            mainPage="true"
          />);
    }
  }
}
