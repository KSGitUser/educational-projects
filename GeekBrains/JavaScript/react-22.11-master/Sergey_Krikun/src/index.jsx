import React, { Component } from 'react';
// импортируем в каждом файлк jsx
import ReactDOM from 'react-dom'; // нужно импортировать только в точке входа
import { BrowserRouter, Route, Switch } from 'react-router-dom';
// импортировали для роутинга
import { Provider } from 'react-redux'; // подключаем компонент
// - обертка для redux
import routes from './routes';
import store from './store'; // импортируемstore redux
import Header from './components/Header';
import Footer from 'components/Footer';

import './index.css';

import 'bootstrap/dist/css/bootstrap.min.css';

class Layout extends Component {
  constructor(props) {
    super(props);
    this.state = {
      content: 'Aticles_list',
    };
  }

  checkContent(page) {
    this.setState((prevState) => ({
      ...prevState,
      content: page,
    }));
  }

  render() {
    return (
      <div className="layout_main_wrapper">

        <Header />
        <div className="main-content">

          <div>
            <Switch>
              {routes.map((route, idx) => {
                return <Route key={idx} {...route} />;
              })}
            </Switch>
          </div>

          <hr />
        </div>
        <Footer className="footer" />

      </div>
    );
  }
}

ReactDOM.render(
    <Provider store={store}> {/* для redux */}
      <BrowserRouter forceRefresh={false}>
        <Layout />
      </BrowserRouter>
    </Provider>,
    document.getElementById('root'));
