# ITWS2110-Team16

======================================================

Final Project: A Gaming Website: GrooveNGame
- Proudly presented by: Matti Henriksen, Vincent Lau, Michelle Li, Davan Murray, Felix Tian (Team 16)


            GrooveNGame: An Indie game gaming website focused on groups of people with 
            common interests to play together and have fun.

- URL for [GrooveNGame](http://itws2110-websix.eastus.cloudapp.azure.com/iit/termProject/)

======================================================

## Project Details
- Website currently features only one game, which is also our pilot game, called "Get the Letter". Since the focus of this project is to demonstrate our skills
in creating a basic but functioning and secure website using all the knowledge we've learned, we have decided to put only one game and push this, alongside the
website's infrastructure, to near-perfection (obviously, nothing is truly perfect).
- "Get the Letter" is a game originated from the Asian rhythm game community that, on the surface, is a word-guessing game.
Players can choose a category of words to form a word list. The system randomly generates a word list by picking a set number of words from
the chosen category, and players can start guessing.
Players take turn to guess single-letters or the entire word, and the game will tell the player whether the letter exists in any word or not, or 
whether they have correctly guessed an entire word. Points are rewards for each successful guess, but points are deducted if a letter guess
causes a word to be fully revealed, aka the player has "detonated" the word.
- Like aforementioned, the website has a fully-functional infrastructure as well as a leaderboard. The infrastructure includes a login system,
a category system and a game-choosing system, which, combined, serves as the core demonstration of the skills we have accumulated throughout the course.
- The leaderboard dynamically updates by pulling data from the database everytime it's loaded.
- Users can create their own custom category and have that saved on the server.
- ONE and ONLY ONE device is required to play the games at the moment. This directly aligns with the core vision of this project, and that is to 
get people PHYSICALLY hang out together and have fun.
- This website currently relies on donations!

======================================================

## Problems/Future Improvements

- Monetization. Yes, reality is harsh, and any website should at least try to generate enough profit to cover its running cost. Future plans of monetization
mainly includes a premium account system, where users can pay a monthly fee to get access to more features, such as avatars and higher word list limit.
- Currently, the custom category created by a user is stored in the same table where all the official categories are stored for the sake of project
demonstration. This means anybody can access any custom-made categories. This is obviously not ideal. We definitely plan to let each user have their own 
dedicated tables in the database for storing their custom categories.
- More games. Yeah, a gaming website needs more than one game. But hey, at least the only game we got is awesome!
- Multi-Device gaming, as in the "Kahoot Style", where players still need to be physically in one place in order to play together. This does make playing
on our website easier while maintaining our visions to this project.

======================================================

## Resources
- https://store.steampowered.com/app/331670/The_Jackbox_Party_Pack/ - JackBox
- https://80.lv/articles/a-look-into-games-ui-from-1960s-to-the-present/ - Game UI History
- https://builtin.com/media-gaming/jackbox-games-design-party-pack - JackBox UI
- https://www.quora.com/Is-there-a-way-to-convert-Python-code-into-JavaScript - Python to JS
- https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/Arrow_functions - Arrow Functions

======================================================