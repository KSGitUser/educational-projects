import './Footer.css';

import React, { PureComponent } from 'react';
import SocialMediaButtons from 'components/SocialMediaButtons';
import { faFacebookF, faTwitter, faGithub } from
  '@fortawesome/free-brands-svg-icons';

export default class Footer extends PureComponent {
  static defaultProps = {}

  render() {
    const socialIcons = [
      {
        icon: faTwitter,
        href: '#',
      },
      {
        icon: faFacebookF,
        href: '#',
      },
      {
        icon: faGithub,
        href: '#',
      },
    ];

    return (
      <footer className="Footer">
        <SocialMediaButtons icons={socialIcons} />
        <p className="footer-copyright">Copyright © Your Website 2018</p>
      </footer>
    );
  }
}
