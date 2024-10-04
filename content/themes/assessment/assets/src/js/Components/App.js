/**
 * App component.
 * @returns {JSXElement}
 */
import react from 'react';

import MoviesPage from './Movies';
import HomePage from './Home';

const App = ({page}) => {
    switch (page) {
        case 'movies':
          return <MoviesPage />;
          case 'home' :
         return <HomePage />;
        default:
          return <div>Page not found</div>;
      }

    
}

export default App;