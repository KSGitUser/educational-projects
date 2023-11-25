import './NavMenu.css';

import React, { Component } from 'react';
import { Nav, NavItem } from 'reactstrap';
import PropTypes from 'prop-types';
import { NavLink, withRouter } from 'react-router-dom';

class NavMenu extends Component {
  static defaultProps = {};


  render() {
    const { items } = this.props;

    return (
      <Nav className="NavMenu ml-auto" navbar>


        {items.map((item) =>
          <NavItem key={item.key}>
            <NavLink className="menu-item__link"
              activeClassName="menu-item__active"
              exact to={item.href}>
              {item.title}
            </NavLink>

          </NavItem>
        )}
      </Nav>
    );
  }
}

export default withRouter(NavMenu);

NavMenu.propTypes = {
  /**
  * an array of objects with parameters for menu
  */
  items: PropTypes.array,
};
