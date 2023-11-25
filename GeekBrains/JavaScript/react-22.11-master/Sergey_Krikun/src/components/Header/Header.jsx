import './Header.css';

import React, { Component } from 'react';
import HeaderOverlay from 'components/HeaderOverlay';
import Blognavbar from 'components/Blognavbar';

export default class Header extends Component {
  static defaultProps = {}

  render() {
    return (
      <div className="Header">
        <Blognavbar logoHref="/" logoString="My Blog" />
        <HeaderOverlay />
      </div>
    );
  }
}
