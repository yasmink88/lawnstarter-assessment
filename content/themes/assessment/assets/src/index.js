// Dependencies.
import { render } from '@wordpress/element';
import domReady from '@wordpress/dom-ready';

// Components.
import App from './js/Components/App';

// Style.
import './scss/App.scss';

// Render App.
domReady(() => {
    const appElement =  document.querySelector('#app')
    const page = appElement.getAttribute('data-page');
    render(
        <App page={page}/>,
        appElement
    );
});
