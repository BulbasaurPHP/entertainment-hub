## Top Ten Movies Feature

This feature is designed to allow all registered users to vote on their favourite movie to get it in the top ten movie list. 

## Functionality

The feature functions to increase the value of each db entry's vote column by one every time someone votes for the movie. 
The list of movies in the select form is pulled from the database, and placed inside a web form that will be inputting data into the database again. 
This is all done with PDO as the amount of interaction with the DB is a little unsettling otherwise. 


## Moving Forward

Scaling up, future iterations of this code will have the ability to limit the number of votes people can make a day, as well as offer users with a specific role the opportunity to nominate movies to the list.
The original version of this feature was supposed to connect with the movie db that was pulling omdb api data but that feature was not live long enough to leverage for this feature. I used placeholder movies as an alternative, but pulling the data from a different source will not be too much trouble. 
