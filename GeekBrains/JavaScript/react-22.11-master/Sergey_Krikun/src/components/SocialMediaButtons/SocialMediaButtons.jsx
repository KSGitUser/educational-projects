import './SocialMediaButtons.css';

import React, { PureComponent } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import PropTypes from 'prop-types';

export default class SocialMediaButtons extends PureComponent {
  static defaultProps = {}

  render() {
    const { icons } = this.props;
    let key = 0;
    return (
      <div className="SocialMediaButtons icons-wrapper">
        {icons.map((item) =>
          <a className="icon-item-wrapper" key={key++}
            href={item.href}>
            <FontAwesomeIcon className="cocial-network_icon" icon={item.icon} />
          </a>
        )}
      </div>
    );
  }
}

SocialMediaButtons.propTypes = {
  /**
  * an array of objects with parameters for social media buttons
  */
  icons: PropTypes.array,
};
