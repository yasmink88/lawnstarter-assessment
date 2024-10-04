/**
 * App component.
 * @returns {JSXElement}
 */
import { useState, useEffect } from 'react';
import axios from 'axios';
import Navbar from './Navbar/Navbar';
import Footer from './Footer/Footer';
const MoviesPage = () => {
    const [movie, setMovie] = useState([]);
    
  useEffect(() => {
      axios.get('http://localhost:8888/wp-json/wp/v2/movies?_embed')
      .then(response => {
        setMovie(response.data);
      })
      .catch(error => console.error(error));    
  }, []);

    return (
        <div className="assessment-app">
            <Navbar />
            <div className="movie-list">
            {movie.map(movie => (
                <div key={movie.id}>
                    <h2>{movie.title.rendered}</h2>
                    <img src={movie._embedded['wp:featuredmedia'][0].source_url} />
                    <div dangerouslySetInnerHTML={{__html:movie.excerpt.rendered}}></div>
                    <a href={movie.slug}>Go to Movie</a>
                </div>
            ))}
            </div>
            <Footer />
        </div>


    )
}

export default MoviesPage;