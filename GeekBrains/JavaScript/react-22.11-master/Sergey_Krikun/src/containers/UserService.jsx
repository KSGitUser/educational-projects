import React, { PureComponent, Fragment } from 'react';
import FetchingSelectedData from 'containers/FetchingSelectedData';

export default class UserService extends PureComponent {
  constructor(props) {
    super(props);
    this.state = {
      commentsUrl: '/comments?email=',
      postsUrl: '/posts?userId=',
      userUrl: '/users?id=',
      urlOfData: 'https://jsonplaceholder.typicode.com',
    };
  }

  makingUrl = () => {
    const { userObject } = this.props;

    this.setState({
      postsUrl: this.state.postsUrl + userObject.id,
      commentsUrl: this.state.commentsUrl + userObject.email,
      userUrl: this.state.userUrl + userObject.id,
    });
  }

  componentWillMount() {
    this.makingUrl();
  }

  render() {
    const { postsUrl, commentsUrl, userUrl, userObject } = this.state;


    return (
      <Fragment>
        <FetchingSelectedData
          postsStringUrl={postsUrl}
          commentsStringUrl={commentsUrl}
          usersStringUrl={userUrl}
          userObject={userObject}
          userPage='true'
        />
      </Fragment>

    );
  }
}
