# Chocolate Milk Mile

A website and web application for the Chocolate Milk Mile. event details, photography, a sign up page and online payment

## To-Do List
- [ ] Event landing page with details
- [ ] Photos of the event
- [ ] Our Story(History of event along with Noah Farrelly Story) 
- [ ] Media/Contact
- [ ] Event registration
  - [ ] Payment for registration (Stripe Elements + API)

## Installation Instructions
Make sure you're installing this within your Laravel Valet `Sites` directory. This works best.

### For a Fresh Install
1. Ensure you're within your Laravel Valet `Sites` directory. This is where all of the Laravel Sites are served from. This is essential.
2. Clone the `TheFundamentalShape/ChocolateMilkMile` git repository on your local machine by running `git clone https://github.com/TheFundamentalShape/ChocolateMilkMile.git`.
3. This will download a folder titled `ChocolateMilkMile`. You need to change the name of this folder to `cmm` so that BrowserSync will work properly. This is a tool that automatically updates your browser whenever you make a change to your code. It's really helpful, and I won't bore you with how it works or why you need to change the name of the folder to `cmm`. Just do it. \*insert Shia LaBeouf just do it gif here\*
4. Install all of Laravel's dependency libraries via Composer on the command line through the `composer install` command.
3. Install all of the NodeJS dependencies with `npm install`, which is also on the command line.
4. Once all of that installs, you'll want to run the `npm run watch` script once everything above is installed to automatically recompile your CSS and JS whenever a change is made, and automatically reflect those changes in your browser.

> Note: If you run `npm run watch` command and it gets all poopy, run it again. It might have had to pull in some random dependency. Try it again and if it fails again, just tell mom. She won't get mad at you. 

### For an Existing Install (*Which I think you have...*)

Groovy, you already have a copy of this repo downloaded, installed, and running properly! But oh-oh, Louie made yet another change to it! Now what the hell do I do?!

1. Check with GitHub to see if your branch is behind the master branch. You can do this by running `git fetch`.
2. After fetching the status of the GitHub repo, pull in any changes by running `git pull`