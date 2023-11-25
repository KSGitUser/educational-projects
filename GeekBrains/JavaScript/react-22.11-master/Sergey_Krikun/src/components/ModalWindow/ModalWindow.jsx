import './ModalWindow.css';

import React, { PureComponent } from 'react';
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';


export default class ModalExample extends PureComponent {
  constructor(props) {
    super(props);
    this.state = {
      modal: false,
    };

    this.toggle = this.toggle.bind(this);
  }

  toggle() {
    this.setState({
      modal: !this.state.modal,
    });
  }

  componentDidMount() {
    setTimeout(() => {
      this.toggle();
    }, 2000);
  }

  render() {
    return (
      <div>
        <Modal isOpen={this.state.modal} toggle={this.toggle}>
          <ModalHeader toggle={this.toggle}>Start Modal</ModalHeader>
          <ModalBody>
            Hello how are you?
          </ModalBody>
          <ModalFooter>
            <Button color="success" onClick={this.toggle}>Fine</Button>{' '}
            <Button color="danger" onClick={this.toggle}>Bad</Button>{' '}
          </ModalFooter>
        </Modal>
      </div>
    );
  }
}
