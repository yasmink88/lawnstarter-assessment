/**
 * App component.
 * @returns {JSXElement}
 */
import { useState, useEffect } from 'react';
import axios from 'axios';
import Navbar from './Navbar/Navbar';
import Footer from './Footer/Footer';

const HomePage = () => {
  const [post, setPost] = useState([]);
  useEffect(() => {
    axios.get('http://localhost:8888/wp-json/wp/v2/posts')
    .then(response => {
      setPost(response.data);
    })
    .catch(error => console.error(error));    
}, []);


  return (
      <div className="assessment-app">
          <Navbar />
          {post.map(post => (
              <div key={post.id}>
                  <h1>{post.title.rendered}</h1>
                  <div dangerouslySetInnerHTML={{__html:post.content.rendered}}></div>
              </div>
          ))}

          <Footer />
      </div>
  )

    
}

export default HomePage;