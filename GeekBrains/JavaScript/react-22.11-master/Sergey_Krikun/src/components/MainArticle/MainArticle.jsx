import './MainArticle.css';

import React, { PureComponent } from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';

export default class MainArticle extends PureComponent {
  static defaultProps = {
    articleItems: [],
    authorItems: [],
  };

  findAuthor = (articleAuthorId) => {
    const { authorItems } = this.props;
    const foundAuthor = authorItems.find((item) => {
      return item.id == articleAuthorId;
    });
    return foundAuthor;
  }

  render() {
    const { articleItems } = this.props;

    return (
      <div className="MainArticle">
        <h2> List of articles </h2>
        {articleItems.map(
            (item, idx) => <div key={idx} className="mainArticle-item">
              <Link
                to={`/pageOfArticle/${this.findAuthor(item.userId).id}/${item.id}/3`}
                className="mainArticle_item__link item">
                <h4 className="mainArticle_item_title">{item.title}</h4>
                <h5 className="mainArticle_item_sub-title">{item.body}</h5>
                <p>Article number: {item.id}</p>
              </Link>
              <p className="mainArticle-author-string">
              Posted by
                <Link className="mainArticle-author__link"
                  to={`/authorPage/${this.findAuthor(item.userId).id}/${item.id}/3`}>
                  {this.findAuthor(item.userId).name}
                </Link>
              </p>
              <hr />
            </div>)}
        <br />
        <br />
      </div>
    );
  }
}

MainArticle.propTypes = {
  /**
  * an array of objects with parameters(title, content, author, articleDAte)
  * for articles on index page
  */
  articleItems: PropTypes.array,
};
