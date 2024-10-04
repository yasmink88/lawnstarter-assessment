# WordPress Assessment

This is the assessment for incoming developers aimed toward gauging the experience with WordPress combined with a JavaScript-centric front-end.

Please follow the steps below and turn it in to us when you are done!

> NOTE: Anything marked as 'BONUS' is **NOT** required and is only there if you feel like showing off. That being said, feel free to show off. Have fun with it!

## Setup

Visit our [README](../README.md#Setup) for setup instructions.

## Steps

### Create Content

- [x] Create 1 sample "Welcome" post and 1 page "Homepage" inside of WordPress.
- [x] Create a custom "Movie" post type and create 3 sample Movie posts.
- [x] Create a custom "Genre" taxonomy and attach it to the `movie` post type only.

### Create App
- [x] Create a React app with a standard header w/ nav linking to pages, a standard footer, which talks to WordPress REST API. Create the following page in the React app:
  - [x] Home page - Should show the "Welcome" post only + a link to "Movie" Page
  - [x] Movie page - Should show the 3 "Movie" Posts  
    - Each post should have a featured image, an excerpt and a link to the movie single post page.
    - Bonus points: infinite scroll or pagination.
- [x] Add SCSS compiling in and style your React app.
  - Bonus points: Uglify your JavaScript/SCSS build
- [ ] Add instructions on requirements, installation and running everything to your README file.
- [ ] Bonus point: Create a plugin that will add a simple "PRESS ME" CTA to all "Movie" Posts. 


## Requirements

Visit our [README](../README.md#Requirements) for requirements.

## Information

Visit our [README](../README.md#Information) for information on @wordpress-env and @wordpress-scripts.

## Common Issues

Visit our [README](../README.md#Common-Issues) for help solving common issues.

## Bonus

- Add a WordPress REST cache plugin for GET requests.