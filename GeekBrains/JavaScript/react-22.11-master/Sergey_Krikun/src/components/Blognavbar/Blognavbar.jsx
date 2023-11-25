import './Blognavbar.css';

import React, { Component } from 'react';
import NavMenu from 'components/NavMenu';
import PropTypes from 'prop-types';

import {
  Collapse,
  Navbar,
  NavbarToggler,
  NavbarBrand,
} from 'reactstrap';

export default class Blognavbar extends Component {
  static propTypes = {
    logoString: PropTypes.string,
    logoHref: PropTypes.string,
  }

  constructor(props) {
    super(props);


    this.state = {
      isOpen: false,
      class: 'Blognavbar',
      prevPos: null,
    };
  }


  toggle = () => {
    this.setState({
      isOpen: this.state.isOpen,
    });
  }

  scrollFunction = () => {
    const currentPos = window.pageYOffset;
    if (this.state.prevPos > currentPos) {
      this.setState({ class: 'Blognavbar show-nav' });
    } else {
      this.setState({ class: 'Blognavbar hide-nav' });
    };
    if (currentPos <= 1) {
      this.setState({ class: 'Blognavbar' });
    };
    this.setState((prevState) => ({
      ...prevState,
      prevPos: currentPos,
    }));
  }

  componentDidMount() {
    this.setState((prevState) => ({
      ...prevState,
      prevPos: window.pageYOffset,
    }));
    window.addEventListener('scroll', this.scrollFunction);
  };

  componentWillUnmount() {
    window.removeEventListener('scroll', this.scrollFunction);
  };

  render() {
    const items = [
      {
        key: '1', title: 'HOME',
        href: '/',
      },
      {
        key: '3', title: 'One Atticle with comments',
        href: '/pageOfArticle/2/1/3',
      },
      {
        key: '4', title: 'Author',
        href: '/authorPage/3/3/3',
      },
    ];

    return (
      <div className="navbar-container">
        <Navbar className={this.state.class} dark expand="md">
          <NavbarBrand className="navbar_logo-text" href={this.props.logoHref}>
            {this.props.logoString}</NavbarBrand>
          <NavbarToggler onClick={this.toggle} />
          <Collapse isOpen={this.state.isOpen} navbar>
            <NavMenu items={items} />
          </Collapse>
        </Navbar>
      </div>
    );
  }
}


