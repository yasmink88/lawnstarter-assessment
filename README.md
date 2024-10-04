# WordPress Assessment

This is our assessment for incoming WordPress developers aimed toward gauging experience with WordPress.

Please follow the steps below and turn it in to us when you are done!

> NOTE: Anything marked as 'BONUS' is **NOT** required and is only there if you feel like showing off. That being said, feel free to show off. Have fun with it!

## Setup

> WARNING: This setup assumes a Linux-based system (Linux, macOS, Windows >= 10 w/ WSL) running node version ~18 with
> npm version ~8 and Docker. If you have trouble running anything, it probably has something to do with the above.

1. Fork this repo, clone it to your local and cd into the directory.
2. Run `npm install`
3. Run `npm run env:init`
4. Run `npm run env:launch`
5 Import database backup

**Away We Go!**

In a few minutes, you should have a fresh WordPress install up and running with a simple theme named WordPress Assessment activated. The service assumes it can run on port 8888, so if there's a conflict there, you'll have to edit `.wp-env.json`, run `npm run env:destroy` and then re-run `npm run env:init`.

Any changes made to the `./content/` folder will show up on the WordPress install.

**WP-CLI**

If you need to run any wp-cli commands, it is available via either `npx wp-env run cli [command]` OR, you can use the `./bin/wp.sh` which should make things a bit easier.

## Assessments

* [Assessment](docs/assessment.md) - Please, read the instructions here for further information on what you will build.

## Requirements

- Ideally you'd use the @wordpress/env (Docker-based) setup so that we can all run this on our machines.
- Any JavaScript libraries should be installed via package.json.
- Add installation and instructions for running your code in your README.
- I need to be able to independently run whatever you produce locally, so I can see the same result you want me to see.

**Preferences**

- Please don't include your whole database image (if you need to, you can include a database dump, like `dump.sql`).
- The more automated the better (think fewer steps for the assessor to complete to get things working).

## Information

* [Read about @wordpress/env](https://github.com/WordPress/gutenberg/tree/trunk/packages/env).
* [Read about @wordpress/scripts](https://github.com/WordPress/gutenberg/tree/trunk/packages/scripts).

## Common Issues

* **I have an error about port 8888 being in use.**

  You likely already have something running on port 8888. Stop any web services you may already have running, and try
  again. If that doesn't work, and you're on Mac or Linux, try this:
  ```shell
  lsof -i :8888
  ```
  This should give you an idea of what service you need to stop/kill to be able to run this project.

  If that doesn't work, edit the ports in `.wp-env.json` and start the instructions over.

* **I'm getting an error running npm install.**

  Make sure you're using the right version of `node/npm` as specified above by checking:
  
  ```shell
  node --version
  npm --version
  ```

* **I get an error about not being able to connect to mysql.**

  Most likely, your Docker app is out of date. Download the latest update for Docker, install it and start it again.

  Once that's done and Docker is back up and running, you'll have to rebuild your environment:

  ```shell
  npm run env:stop
  npm run env:destroy
  npm run env:init
  npm run env:launch
  ```