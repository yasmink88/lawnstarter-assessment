import React from 'react';
import { useState, useEffect } from 'react';
import axios from 'axios';
import './Navbar.scss';

const Navbar = () => {

  return (
    <nav className="navbar">
      <div className="navbar__logo">
        <a href="/">MyLogo</a>
      </div>
      <ul className="navbar__links">
        <li><a href="/">Home</a></li>
        <li><a href="/all-movies">Movies</a></li>
      </ul>
    </nav>
  );
};

export default Navbar;