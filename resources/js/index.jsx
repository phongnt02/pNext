import React from 'react';
import ReactDOM from 'react-dom/client';
import { Provider } from "react-redux";
import store from './store';
import App from './app';
import reportWebVitals from './reportWebVitals';
import GlobalStyle from './components/GlobalStyle';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <Provider store={store}>
    <React.StrictMode>
      <GlobalStyle>
        <App/>
      </GlobalStyle>
    </React.StrictMode>
  </Provider>
);

reportWebVitals();
