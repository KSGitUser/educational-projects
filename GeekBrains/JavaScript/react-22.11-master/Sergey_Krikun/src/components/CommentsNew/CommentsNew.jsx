import './CommentsNew.css';

import React, { PureComponent } from 'react';

export default class CommentsNew extends PureComponent {
  static defaultProps = { commentsList: []}
  constructor(props) {
    super(props);
  }

  findAuthor = (articleAuthorId) => {
    const { authorItems } = this.props;
    const foundAuthor = authorItems.find((item) => {
      return item.id == articleAuthorId;
    });
    return foundAuthor;
  }

  render() {
    const { commentsList } = this.props;


    return (
      <div className="CommentsNew">
        <h2>List of Comments</h2>

        <ul className="comments-list">
          {commentsList.map((item, idx) =>
            <li className="comment-item" key={idx}>
              <h5>Name: {item.name}</h5>
              <p>Text:</p>
              <p>{item.body}</p>
            </li>)}
        </ul>
      </div>
    );
  }
}
